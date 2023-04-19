<?php

namespace App\Http\Controllers;


use App\Models\Document;
use App\Models\Recipe;
use App\Models\Stock;
use App\Models\User;
use App\Models\Business;
use App\Models\Supplier;
use App\Models\Nutrient;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Populates the admin view with db information
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $id = Auth::id();
        $businesses = Business::all();
        $users = User::all();
        $recipes = Recipe::all();
        $stocks = Stock::all();
        $documents = Document::all();
        /**
         * gets only supplier name and ID pairs
         */
        $suppliers = Supplier::pluck('name','id')->toArray();
        $nutrients = Nutrient::all()->sortBy('type');
        return view('admin_panel',[
            'businesses'=>$businesses,
            'users'=>$users,
            'recipes'=>$recipes,
            'stocks'=>$stocks,
            'documents'=>$documents,
            'suppliers'=>$suppliers,
            'nutrients'=>$nutrients
        ]);

    }
}
