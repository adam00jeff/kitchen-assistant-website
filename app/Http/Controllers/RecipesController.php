<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\Stock;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecipesController extends Controller
{
    /**
     * gets recipes from db that match business ID
     * @return Application|Factory|View
     */
    public function recipes_index(): View|Factory|Application
    {
        $id = Auth::user()->business_id;
        $recipes = Recipe::all()->where('business_id', $id);
        $busid = Auth::user()->business_id;
        $stocks = Stock::all()->where('business_id', $busid);
        return view('recipes', ['recipes' => $recipes, 'stocks' => $stocks]);
    }

    /**
     * shows form to create recipe
     * @return Application|Factory|View
     */
    public function create_recipe(): View|Factory|Application
    {
        $busid = Auth::user()->business_id;
        $stocks = Stock::all()->where('business_id', $busid);
        return view('recipes-form', ['stocks' => $stocks]);
    }

    /**
     * stores newly created recipe in database
     * @param Request $request
     * @return Application|Factory|View
     */
    public function store_recipe(Request $request): View|Factory|Application
    {
        $busid = Auth::user()->business_id;
        $id = Auth::id();
//        validation for ingredients and methods
        $validated = $request->validate([
            'name' => 'required|max:255',
            'addMoreIngredients' => 'required',
            'rmethod' => 'required'
        ], [
//            custom validation messages for user
            'name.required' => 'A Recipe Name is Required',
            'addMoreIngredients.required' => 'At least 1 Ingredient is Required',
            'method.required' => 'At least 1 Method Step is Required'
        ]);
        $req = array();
        $qty = $request->quantity;
        $i = 1;
//        gets array of ingredients from form
        foreach ($request->addMoreIngredients as $k => $v) {
            foreach ($v as $k2 => $v2) {
                $req[][$v2] = " " . $qty[$i];
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
        $stocks = Stock::all()->where('business_id', $busid);
        return view('recipes', ['recipes' => $recipe, 'stocks' => $stocks]);
    }

    /**
     * removes seleced recipe from the db
     * @param Recipe $recipe
     * @return Application|Factory|View
     */
    public function destroy_recipe(recipe $recipe)
    {
        $busid = Auth::user()->business_id;
        $recipe->delete();
        $recipes = Recipe::all();
        $stocks = Stock::all()->where('business_id', $busid);
        return view('recipes', ['recipes' => $recipes, 'stocks' => $stocks]);
    }
}
