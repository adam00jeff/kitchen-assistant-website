<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class StocksController extends Controller
{
    public function stock_index()
    {
        $stocks = Stock::all();
        return view('stock',['stocks'=>$stocks]);
    }

    public function create()
    {
        return view('stock-form');
    }
    public function store(Request $request)
    {

        $stock = new Stock;
        $stock->name = $request->name;
        $stock->supplier = $request->supplier;
        $stock->unit = $request->unit;
        $stock->info = $request->info;
        $stock->allergens = $request->allergens;

        $stock->save();
        return response()->json(["msg" => "success"]);
    }
}
