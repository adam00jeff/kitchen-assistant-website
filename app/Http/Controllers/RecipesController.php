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
        $busid = Auth::user()->business_id;
        $stocks = Stock::all()->where('business_id', $busid);
        return view('recipes',['recipes'=>$recipes, 'stocks'=>$stocks]);
    }

    public function create_recipe()
    {
        $busid = Auth::user()->business_id;
        $stocks = Stock::all()->where('business_id', $busid);
        return view('recipes-form',['stocks' => $stocks]);
    }

    public function store_recipe(Request $request)
    {        $busid = Auth::user()->business_id;
        $id = Auth::id();
        $validated = $request->validate([
            'name' => 'required|max:255',
           'addMoreIngredients' => 'required'
        ]);
        $req = array();
        $qty = $request->quantity;
        $i=1;
        foreach ($request->addMoreIngredients as $k=>$v){
            foreach ($v as $k2 => $v2) {
                $req[][$v2] = " ".$qty[$i];
            }
        $i++;
        }
/*        ddd($request->rmethod);*/
        $recipe = new Recipe;
        $recipe->name = $request->name;
        $recipe->ingredients = $req;
        $recipe->method = $request->rmethod;
        $recipe->user_id = $id;
        $recipe->business_id = $busid;
        $recipe->save();
        $stocks = Stock::all()->where('business_id', $busid);
        return view('recipes', ['recipes' => $recipe, 'stocks'=> $stocks]);
    }
    public function destroy_recipe(recipe $recipe)
    {
        $busid = Auth::user()->business_id;
        $recipe->delete();
        $recipes = Recipe::all();
        $stocks = Stock::all()->where('business_id', $busid);
        return view('recipes', ['recipes' => $recipes, 'stocks'=> $stocks]);
    }
}
