<?php

namespace App\Http\Controllers;

use App\Models\Nutrient;
use App\Models\Stock;
use App\Models\Supplier;
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
        return view('stock', ['stocks' => $stocks]);
    }
    public function get_suppliers()
    {
        $suppliers = Supplier::all();
        return view('suppliers', ['suppliers' => $suppliers]);

    }

    public function create()
    {
        return view('stock-form');
    }

    public function confirm(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'supplier' => 'required|numeric',//supplier ID for now, to be replaced with plain text entry
            'unit' => 'required|max:50',
            'allergens' => 'required|max:500'
        ]);
        $gotquery = $request->name;
        /*        $sess = session()->get('sess',[]);*/
        $sess = [
            "name" => $request->name,
            "unit" => $request->unit,
            "supplier" => $request->supplier,
            "info" => $request->info,
            "allergens" => $request->allergens
        ];
        session()->put(/*'sess',*/ $sess);
        /*        session()->put($request->unit);
                session()->put($request->info);
                session()->put($request->allergens);*/
        /*        $stock->supplier = $request->supplier;
                $stock->unit = $request->unit;
                $stock->info = $request->info;
                $stock->allergens = $request->allergens;
                $stock->user_id = $id;
                $stock->business_id = $busid;*/
        /*"1kg Bramley apples,
                    140g golden caster sugar,
                    ½ tsp cinnamon,
                    3 tbsp flour";*/
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
        $nutrients = Nutrient::all()->sortBy('type');
        return view('stock-confirm', ['data' => $data, 'nutrients' => $nutrients]);
    }

    public function store(Request $request)
    {

        $id = Auth::id();
        $busid = Auth::user()->business_id;
        $nutrients = session('nutrients');
        $photo = session('photo');
        $serving_unit = session('serving_unit');
        $serving_qty = session('serving_qty');
/*        ddd($photo);*/
/*        $validated = $request->validate([
            'name' => 'required|max:255',
            'supplier' => 'required|numeric',//supplier ID for now, to be replaced with plain text entry
            'unit' => 'required|max:50',
            'allergens' => 'required|max:500'
        ]);*/
        $stock = new Stock;
        $stock->name = $request->name;
        $stock->supplier = $request->supplier;
        $stock->serving_unit = $serving_unit;
        $stock->serving_qty = $serving_qty;
        $stock->info = $request->info;
        $stock->allergens = $request->allergens;
        $stock->callories=$request->callories;
        $stock->user_id = $id;
        $stock->business_id = $busid;
        $stock->nutrients = $nutrients;
        $stock->image = $photo;

        $stock->save();
        return view('stock', ['stocks' => $stock]);
    }
    public function destroy_stock(Stock $stock)
    {
        $stock->delete();
        $id = Auth::id();
        $busid = Auth::user()->business_id;
        $stocks = Stock::all()->where('business_id', $busid);
        return view('stock', ['stocks' => $stocks]);
    }
}
