<?php

namespace App\Http\Controllers;
use App\Models\Allergen;
use App\Models\Document;
use App\Models\Recipe;
use App\Models\Stock;
use App\Models\supplier;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class ComplianceController extends Controller
{
    public function compliance_index()
    {
        $id = Auth::user()->business_id;
        $documents = Document::all()->where('business_id',$id);
        $suppliers = Supplier::all();
        return view('compliance',['documents'=>$documents,'suppliers' => $suppliers]);
    }
    public function supplier_reports()
    {
        $id = Auth::user()->business_id;
        $documents = Document::all()->where('business_id',$id);
        $suppliers = Supplier::all()->toArray();
        $stocks = Stock::all()->toArray();
        $i=0;
        $filtered = collect();
        $instock = collect();
        foreach ($stocks as $s){
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
        return view('compliance',['suppliers' => $suppliers,"documents"=>$documents,'stock'=>$stocks, 'instock'=>$instock]);
    }
    public function allergen_information()
    {
        $id = Auth::user()->business_id;
        $allergens = Allergen::all();
        $suppliers = Supplier::all();
        return view('compliance',['allergens'=>$allergens,'suppliers' => $suppliers]);
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
        $suppliers = Supplier::all();
        $recipes = Recipe::all()->where('business_id',$id);
        //get the search value from the request
        //search in the allergen table for matches
        $allergens = Allergen::query()->where('name', 'LIKE', "%" . $search . "%")
/*            ->orWhere('***', 'LIKE', "%" . $search . "%")
            ->orWhere('***', 'LIKE', "%" . $search . "%")*/
            ->get();
        return view('compliance', ['allergens' => $allergens, 'stocks'=>$stocks,'suppliers' => $suppliers, 'recipes'=>$recipes]);
    }
}
