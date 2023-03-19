<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Stock;
use App\Models\supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComplianceController extends Controller
{
    public function compliance_index()
    {
        $id = Auth::user()->business_id;
        $documents = Document::all()->where('business_id',$id);
        $suppliers = Supplier::all();
        return view('compliance',['documents'=>$documents],['suppliers' => $suppliers]);
    }
    public function supplier_reports()
    {
        $id = Auth::user()->business_id;
        $documents = Document::all()->where('business_id',$id);
        $suppliers = Supplier::all();
        $stocks = Stock::all();
        return view('compliance',['suppliers' => $suppliers],['documents'=>$documents],['stock'=>$stocks]);
    }

}
