<?php

namespace App\Http\Controllers;

use App\Models\Recepie;
use App\Models\Stock;
use Illuminate\Http\Request;

class RecepiesController extends Controller
{
    public function recepie_index()
    {
        $recepies = Recepie::all();
        return view('recepies',['recepies'=>$recepies]);
    }

    public function create()
    {
        return view('recepies-form');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'ingredients' => 'required|max:255',//supplier ID for now, to be replaced with plain text entry
            'rmethod'=>'required|max:1000'
        ]);

        $recepie = new Recepie;
        $recepie->name = $request->name;
        $recepie->ingredients = $request->ingredients;
        $recepie->method = $request->rmethod;
        $recepie->save();
        return response()->json(["msg" => "success"]);
    }
}
