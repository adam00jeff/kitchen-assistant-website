<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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
        $id = Auth::id();
        $validated = $request->validate([
            'name' => 'required|max:255',
            'supplier' => 'required|numeric',//supplier ID for now, to be replaced with plain text entry
            'unit'=>'required|max:50',
            'allergens'=>'required|max:500'
        ]);

        $stock = new Stock;
        $stock->name = $request->name;
        $stock->supplier = $request->supplier;
        $stock->unit = $request->unit;
        $stock->info = $request->info;
        $stock->allergens = $request->allergens;
        $stock->user_id = $id;
        $stock->save();
        return response()->json(["msg" => "success"]);
    }
}
