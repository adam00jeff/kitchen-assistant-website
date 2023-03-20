<?php

namespace App\Http\Controllers;
use App\Models\Document;
use App\Models\Stock;
use App\Models\supplier;
use Illuminate\Support\Facades\Auth;


class ComplianceController extends Controller
{
    public function compliance_index()
    {
        $id = Auth::user()->business_id;
        $documents = Document::all()->where('business_id',$id);
        $suppliers = Supplier::all();
        return view('compliance',['documents'=>$documents,'suppliers' => $suppliers]);
    }
    public function supplier_reports()
    {
        $id = Auth::user()->business_id;
        $documents = Document::all()->where('business_id',$id);
        $suppliers = Supplier::all();
        $stocks = Stock::all();
        $i=0;
        $filtered = collect();
        $currentsuppliers = collect();
        $test = collect();
        foreach ($stocks as $s){
            $filtered->push($s->only(['id','supplier']));
        }
        foreach($filtered as $f){
            if($test->contains('id',$f['supplier'])){

            }
            else {
                $test->push(Supplier::query()->where('id', $f['supplier'])->get());
            }
        }
        return view('compliance',['suppliers' => $suppliers,"documents"=>$documents,'currentsuppliers'=>$currentsuppliers,'stock'=>$stocks]);
    }

}
