<?php

namespace App\Http\Controllers;

use App\Models\Stock;
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

    public function create()
    {
        return view('stock-form');
    }

    public function confirm()
    {
        $appid = "9787f4f0";
        $appkey = "5b11621e62674c09602b3d94977c8172";
        $endpoint = "https://trackapi.nutritionix.com/v2/natural/nutrients";

        $response = Http::withHeaders([
   /*         "Content-Type:application/json",*/
            "x-app-id"=>$appid,
            "x-app-key"=>$appkey
        ])->post('https://trackapi.nutritionix.com/v2/natural/nutrients',[
            "query" => "1kg Bramley apples,
                        140g golden caster sugar,
                        ½ tsp cinnamon,
                        3 tbsp flour",
            "timezone" => "US/Eastern"
        ])/*->collect()*/;
/*        dd($response);*/
/*        return view('stock-confirm');*/
        $data = $response;
        return view('stock-confirm', ['data' => $data]);
    }

    public function store(Request $request)
    {
        $id = Auth::id();
        $busid = Auth::user()->business_id;
        $validated = $request->validate([
            'name' => 'required|max:255',
            'supplier' => 'required|numeric',//supplier ID for now, to be replaced with plain text entry
            'unit' => 'required|max:50',
            'allergens' => 'required|max:500'
        ]);
        $stock = new Stock;
        $stock->name = $request->name;
        $stock->supplier = $request->supplier;
        $stock->unit = $request->unit;
        $stock->info = $request->info;
        $stock->allergens = $request->allergens;
        $stock->user_id = $id;
        $stock->business_id = $busid;
        $stock->save();
        return response()->json(["msg" => "success"]);
        /*        return \Redirect::route('stock_confirm');*/
    }


}

