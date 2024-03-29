<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecipesController extends Controller
{
    public function recipes_index()
    {
        $id = Auth::user()->business_id;
        $recipes = Recipe::all()->where('business_id',$id);
        return view('recipes',['recipes'=>$recipes]);
    }

    public function create_recipe()
    {
        $stocks = Stock::all();
        return view('recipes-form',['stocks' => $stocks]);
    }
    public function store_recipe(Request $request)
    {        $busid = Auth::user()->business_id;
        $id = Auth::id();
        $validated = $request->validate([
            'name' => 'required|max:255',
            /*'ingredients' => 'required|max:255',//supplier ID for now, to be replaced with plain text entry*/
            'rmethod'=>'required|max:1000'
        ]);

        $req = $request->addMoreIngredients;
        $qty = $request->quantity;
        /*ddd($qty);*/
        $i=1;
        foreach ($req as $k=>$v){
            foreach ($v as $k2 => $v2) {
                $req[$k][$k2] = $v2." ".$qty[$i];
            }
        $i++;
    }
        $recipe = new Recipe;
        $recipe->name = $request->name;
        $recipe->ingredients = $req;
        $recipe->method = $request->rmethod;
        $recipe->user_id = $id;
        $recipe->business_id = $busid;
        $recipe->save();
        return response()->json(["msg" => "success"]);
    }
    public function destroy_recipe(recipe $recipe)
    {
        $recipe->delete();
        $recipes = Recipe::all();
        return view('recipes', ['recipes' => $recipes]);
    }
}
