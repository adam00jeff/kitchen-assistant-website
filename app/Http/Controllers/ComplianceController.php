<?php

namespace App\Http\Controllers;

use App\Models\Allergen;
use App\Models\Business;
use App\Models\Contact;
use App\Models\Document;
use App\Models\IncidentReport;
use App\Models\Recipe;
use App\Models\Stock;
use App\Models\supplier;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class ComplianceController extends Controller
{
    /**
     * Gets relevant compliance information
     * finds info related to business ID in tables
     * @return Application|Factory|View
     */
    public function compliance_index(): View|Factory|Application
    {
        $id = Auth::user()->business_id;
        $allergens = Allergen::all();
        $documents = Document::all()->where('business_id', $id);
        $users = User::all()->where('business_id', $id);
        $suppliers = Supplier::all();
        $incidentreports = IncidentReport::all()->where('business_id', $id);
        $busid = Auth::user()->business_id;
        $stocks = Stock::all()->where('business_id', $busid);
        $contacts = Contact::all();
        return view('compliance', ['allergens'=>$allergens,'documents' => $documents, 'stocks' => $stocks, 'suppliers' => $suppliers, 'contacts' => $contacts, 'users' => $users, 'incidentreports' => $incidentreports]);
    }

    /**
     * Gets suppliers, documents and stock
     * passes to arrays where required
     * finds which stock items are from wich supplier and passes to view
     * @return Application|Factory|View
     */
    public function supplier_reports(): View|Factory|Application
    {
        $allergens = Allergen::all();
        $id = Auth::user()->business_id;
        $documents = Document::all()->where('business_id', $id);
        $suppliers = Supplier::all()->toArray();
        $stocksarray = Stock::all()->toArray();
        $busid = Auth::user()->business_id;
        $stocks = Stock::all()->where('business_id', $busid);
        /**
         * set up variables for associating stock with suppliers
         */
        $i = 0;
        $filtered = collect();
        $instock = collect();
        /**
         * get only supplier id's for stock and pass to collection
         */
        foreach ($stocksarray as $s) {
            $p = $s['supplier'];
            $n = $s['name'];
            $filtered->put($n, $p);
        }
        /**
         * get check if collection contains entry already
         */
        foreach ($filtered as $name => $supplierID) {
            if ($instock->contains($name, $supplierID)) {
                /**
                 * do nothing
                 */
                $i++;
//                 if entry does not exist it adds as new array entry
            } else {
                $value = Supplier::query()->where('id', $supplierID)->get()->toArray();
                $instock->put($value[0]['id'], $value[0]);
                $i++;
            }
        }
        return view('compliance', ['suppliers' => $suppliers, "documents" => $documents, 'stocks' => $stocks, 'instock' => $instock]);
    }
    /**
     * Gets allergens and related information from db
     * @return Application|Factory|View
     */
    public function allergen_information(): View|Factory|Application
    {
        $id = Auth::user()->business_id;
        $allergens = Allergen::all();
        $suppliers = Supplier::all();
        $busid = Auth::user()->business_id;
        $stocks = Stock::all()->where('business_id', $busid);
        $recipes = $recipes = Recipe::all()->where('business_id', $id);
        return view('compliance', ['allergens' => $allergens, 'stocks' => $stocks, 'suppliers' => $suppliers, 'recipes' => $recipes]);
    }

    /**
     * gets all documents to associated with staff members
     * @return Application|Factory|View
     */
    public function staff_training(): View|Factory|Application
    {
        $id = Auth::user()->business_id;
        $documents = Document::all()->where('business_id', $id);
        $businesses = Business::all()->where('id', $id);
        $suppliers = Supplier::all();
        $busid = Auth::user()->business_id;
        $stocks = Stock::all()->where('business_id', $busid);
        $contacts = Contact::all();
        $users = User::all()->where('business_id', $id);
        return view('compliance', ['businesses' => $businesses, 'documents' => $documents, 'stocks' => $stocks, 'suppliers' => $suppliers, 'contacts' => $contacts, 'users' => $users]);
    }

    /**
     * allows users to search allergen database and view information on their use and supply
     * @param Request $request
     * @return Application|Factory|View
     */
    public function allergen_search(Request $request): View|Factory|Application
    {
        $search = $request->input('search');
        $id = Auth::user()->business_id;
        $busid = Auth::user()->business_id;
//        finds stock items which have allergens matching the search string
        $stocks = Stock::query()->where('business_id', $busid)->where('allergens', 'LIKE', "%" . $search . "%")
            ->get();
//        created new collection for grouping data to suppliers
        $suppliers = collect();
//        iterates through selected stock, adding to collection
        foreach ($stocks as $stock) {
            $value = $stock->supplier;
            $suppliers->push(Supplier::query()->where('id', $value)->get());
        }
        $recipes = Recipe::all()->where('business_id', $id);
//        creates new collection for recipes with searched allergen
        $searchedrecipes = collect();
        foreach ($recipes as $recipe) {
            foreach ($stocks as $s) {
//                compares stock allergen to stock in recipe
                $stockname = $s->name;
                $ing = $recipe->ingredients;
                foreach ($ing as $key => $value) {
                    foreach ($value as $ingredient => $v) {
                        if ($ingredient == $stockname) {
//                            adds found allergen if not already present
                            if (!$searchedrecipes->contains('name', $recipe->name))
                                $searchedrecipes->push($recipe);
                        }
                    }
                }
            }
        }
//        gets allergens from DB matching search query
        $allergens = Allergen::query()->where('name', 'LIKE', "%" . $search . "%")
            ->get();
        return view('compliance', ['allergens' => $allergens, 'stocks' => $stocks, 'suppliers' => $suppliers, 'recipes' => $searchedrecipes]);
    }
}
