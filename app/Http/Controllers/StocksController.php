<?php

namespace App\Http\Controllers;

use App\Models\Nutrient;
use App\Models\Stock;
use App\Models\Supplier;
use App\Models\Allergen;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

class StocksController extends Controller
{
    public function stock_index()
    {
        $id = Auth::id();
        $busid = Auth::user()->business_id;
        $stocks = Stock::all()->where('business_id', $busid);
        $nutrients = Nutrient::all()->sortBy('type');
        $suppliers = Supplier::pluck('name','id')->toArray();
        return view('stock', ['stocks' => $stocks,'suppliers'=>$suppliers, 'nutrients'=>$nutrients]);
    }


    public function create()
    {
        $suppliers = Supplier::pluck('name','id');
        $allergens = Allergen::pluck('name','id');
        return view('stock-form', ['suppliers'=>$suppliers,'allergens'=>$allergens]);
    }

    public function confirm(Request $request)
    {
/*        ddd($request);*/
        $validated = $request->validate([
            'name' => 'required|max:255',
            'supplier' => 'required|numeric',//supplier ID for now, to be replaced with plain text entry
            'unit' => 'required|max:50'
        ]);
        $gotquery = $request->name;
        $getsupplier = Supplier::query()->where('id','=',$request->supplier)->get();
        $thissupplier = $getsupplier->toArray();
        $supplier =$thissupplier['0'];

        $sess = [
            "name" => $request->name,
            "unit" => $request->unit,
            "supplier" => $supplier,
            "info" => $request->info,
            "allergens" => $request->addMoreAllergenFields
/*            "db_allergens" => Allergen::query()->where('id','=',$request->db_allergens)->get()->toArray()*/
        ];
        session()->put($sess);
        $appid = "9787f4f0";
        $appkey = "5b11621e62674c09602b3d94977c8172";
        $endpoint = "https://trackapi.nutritionix.com/v2/natural/nutrients";
        $response = Http::withHeaders([
            "x-app-id" => $appid,
            "x-app-key" => $appkey
        ])->post($endpoint, [
            "query" => $gotquery,
            /*            "include_subrecepie" => true,*/
            "ingredient_statement" => true,
            "locale" => "en_GB",
            "timezone" => "GB"
        ]);
        $data = json_decode($response, true);
        $allergens = Allergen::all();
        $usrallergens = $request->addMoreAllergenFields;
        $nutrients = Nutrient::all()->sortBy('type');
        return view('stock-confirm', ['data' => $data, 'nutrients' => $nutrients, 'supplier'=>$supplier,'allergens'=>$allergens, 'usrallergens'=>$usrallergens]);
    }

    public function store(Request $request)
    {
        $a = session('allergens');
        $allergens = array();
        foreach ($a as $k=>$v){
            foreach($v as $k=> $v){
                array_push($allergens,$v);
            }
        }
        $id = Auth::id();
        $busid = Auth::user()->business_id;
        $s = Supplier::query()->where('name','=',$request->supplier)->get();
        $s1 = $s->toArray();
        $supplier = $s1['0'];
        $nutrients = session('nutrients');
        $photo = session('photo');
        $serving_unit = session('serving_unit');
        $serving_qty = session('serving_qty');
        $stock = new Stock;
        $stock->name = $request->name;
        $stock->supplier = $supplier['id'];
        $stock->serving_unit = $serving_unit;
        $stock->serving_qty = $serving_qty;
        $stock->info = $request->info;
        $stock->allergens = $allergens;

        $stock->callories=$request->callories;
        $stock->user_id = $id;
        $stock->business_id = $busid;
        $stock->nutrients = $nutrients;
        $stock->image = $photo;
        $stock->save();
        $suppliers = Supplier::pluck('name','id');
        $nutrients = Nutrient::all()->sortBy('type');
        return view('stock', ['stocks' => $stock, 'suppliers'=>$suppliers, 'nutrients'=>$nutrients]);
    }
    public function destroy_stock(Stock $stock)
    {
        $stock->delete();
        $id = Auth::id();
        $busid = Auth::user()->business_id;
        $stocks = Stock::all()->where('business_id', $busid);
        return redirect()->route('stock', ['stocks' => $stocks])->with('success','deleted');
    }
}
