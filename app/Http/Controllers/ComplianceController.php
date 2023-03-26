<?php

namespace App\Http\Controllers;
use App\Models\Allergen;
use App\Models\Contact;
use App\Models\Document;
use App\Models\Recipe;
use App\Models\Stock;
use App\Models\supplier;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class ComplianceController extends Controller
{
    public function compliance_index()
    {
        $id = Auth::user()->business_id;
        $documents = Document::all()->where('business_id',$id);
        $users = User::all()->where('business_id',$id);
        $suppliers = Supplier::all();
        $stocks = Stock::all();
        $contacts = Contact::all();
        return view('compliance',['documents'=>$documents,'stocks'=>$stocks, 'suppliers' => $suppliers, 'contacts'=>$contacts, 'users'=>$users]);
    }
    public function supplier_reports()
    {
        $id = Auth::user()->business_id;
        $documents = Document::all()->where('business_id',$id);
        $suppliers = Supplier::all()->toArray();
        $stocksarray = Stock::all()->toArray();
        $stocks = Stock::all();
        $i=0;
        $filtered = collect();
        $instock = collect();
        foreach ($stocksarray as $s){
            $p = $s['supplier'];
            $n = $s['name'];
            $filtered->put($n,$p);
        }
       foreach($filtered as $name => $supplierID){
                if($instock->contains($name,$supplierID)){
                    /*do nothing*/
                    $i++;
                } else {
                $value = Supplier::query()->where('id',$supplierID)->get()->toArray();
                $instock->put($value[0]['id'],$value[0]);
                    $i++;
                        }
        }
        return view('compliance',['suppliers' => $suppliers,"documents"=>$documents,'stocks'=>$stocks, 'instock'=>$instock]);
    }
    public function allergen_information()
    {
        $id = Auth::user()->business_id;
        $allergens = Allergen::all();
        $suppliers = Supplier::all();
        $stocks = Stock::all();
        $recipes = $recipes = Recipe::all()->where('business_id',$id);
        return view('compliance',['allergens' => $allergens, 'stocks'=>$stocks,'suppliers' => $suppliers, 'recipes'=>$recipes]);
    }
    public function staff_training()
    {
        $id = Auth::user()->business_id;
        $documents = Document::all()->where('business_id',$id);
        $suppliers = Supplier::all();
        $stocks = Stock::all();
        $contacts = Contact::all();
        $users = User::all()->where('business_id',$id);
        return view('compliance',['documents'=>$documents,'stocks'=>$stocks, 'suppliers' => $suppliers, 'contacts'=>$contacts, 'users'=>$users]);
    }

    public function allergen_search(Request $request)
    {
        $search = $request->input('search');
        $id = Auth::user()->business_id;
  /*      $stocks = Stock::all()->toArray();*/
        $stocks = Stock::query()->where('allergens', 'LIKE', "%" . $search . "%")
            /*            ->orWhere('***', 'LIKE', "%" . $search . "%")
                        ->orWhere('***', 'LIKE', "%" . $search . "%")*/
            ->get();
            $suppliers = collect();
        foreach($stocks as $stock) {
            $value = $stock->supplier;
            $suppliers->push(Supplier::query()->where('id', $value)->get());

        }

        $recipes = Recipe::all()->where('business_id',$id);
        $searchedrecipes = collect();
        foreach ($recipes as $recipe){
            foreach ($stocks as $s) {
                $stockname = $s -> name;
                $ing = $recipe->ingredients;
                foreach ($ing as $key => $value){
                    foreach($value as $ingredient=>$v){
                        if( $ingredient == $stockname){
                            if(!$searchedrecipes->contains('name',$recipe->name))
                            $searchedrecipes->push($recipe);
                            }
                    }
                }
            }
        }
        //ddd($searchedrecipes);
        //get recipes that have ingreditents matching stocks

        //get the search value from the request
        //search in the allergen table for matches
        $allergens = Allergen::query()->where('name', 'LIKE', "%" . $search . "%")
/*            ->orWhere('***', 'LIKE', "%" . $search . "%")
            ->orWhere('***', 'LIKE', "%" . $search . "%")*/
            ->get();
        return view('compliance', ['allergens' => $allergens, 'stocks'=>$stocks,'suppliers' => $suppliers, 'recipes'=>$searchedrecipes]);
    }
}
