<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecipesController extends Controller
{
    public function recipe_index()
    {
        $id = Auth::user()->business_id;
        $recipes = Recipe::all()->where('business_id',$id);
        return view('recipes',['recipes'=>$recipes]);
    }

    public function create()
    {
        return view('recipes-form');
    }
    public function store(Request $request)
    {        $busid = Auth::user()->business_id;
        $id = Auth::id();
        $validated = $request->validate([
            'name' => 'required|max:255',
            'ingredients' => 'required|max:255',//supplier ID for now, to be replaced with plain text entry
            'rmethod'=>'required|max:1000'
        ]);

        $recipe = new Recipe;
        $recipe->name = $request->name;
        $recipe->ingredients = $request->ingredients;
        $recipe->method = $request->rmethod;
        $recipe->user_id = $id;
        $recipe->business_id = $busid;
        $recipe->save();
        return response()->json(["msg" => "success"]);
    }
}
