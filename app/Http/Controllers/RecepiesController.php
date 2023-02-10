<?php

namespace App\Http\Controllers;

use App\Models\Recepie;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecepiesController extends Controller
{
    public function recepie_index()
    {
        $id = Auth::id();
        $recepies = Recepie::all()->where('user_id',$id);
        return view('recepies',['recepies'=>$recepies]);
    }

    public function create()
    {
        return view('recepies-form');
    }
    public function store(Request $request)
    {
        $id = Auth::id();
        $validated = $request->validate([
            'name' => 'required|max:255',
            'ingredients' => 'required|max:255',//supplier ID for now, to be replaced with plain text entry
            'rmethod'=>'required|max:1000'
        ]);

        $recepie = new Recepie;
        $recepie->name = $request->name;
        $recepie->ingredients = $request->ingredients;
        $recepie->method = $request->rmethod;
        $recepie->user_id = $id;
        $recepie->save();
        return response()->json(["msg" => "success"]);
    }
}
