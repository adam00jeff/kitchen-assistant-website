<?php

namespace App\Http\Controllers;


use App\Models\Document;
use App\Models\Recepie;
use App\Models\Stock;
use App\Models\User;
use App\Models\Business;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::id();
        $businesses = Business::all();
        $users = User::all();
        $recepies = Recepie::all();
        $stocks = Stock::all();
        $documents = Document::all();
        return view('admin_panel',[
            'businesses'=>$businesses,
            'users'=>$users,
            'recepies'=>$recepies,
            'stocks'=>$stocks,
            'documents'=>$documents
        ]);

    }
}
