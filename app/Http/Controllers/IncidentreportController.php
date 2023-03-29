<?php

namespace App\Http\Controllers;

use App\Models\Allergen;
use App\Models\Recipe;
use App\Models\Stock;
use App\Models\supplier;
use Illuminate\Http\Request;
use App\Models\Incidentreport;
use Illuminate\Support\Facades\Auth;

class IncidentreportController extends Controller
{
    public function incident_reports()
    {
        $id = Auth::user()->business_id;
        $allergens = Allergen::all();
        $suppliers = Supplier::all();
        $busid = Auth::user()->business_id;
        $stocks = Stock::all()->where('business_id', $busid);
        $recipes = Recipe::all()->where('business_id',$id);
        return view('compliance',['allergens' => $allergens, 'stocks'=>$stocks,'suppliers' => $suppliers, 'recipes'=>$recipes]);
    }
}
