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
        $suppliers = Supplier::all()->toArray();
        $stocks = Stock::all()->toArray();
        $i=0;
        $filtered = collect();
        $currentsuppliers = collect();
        $instocksuppliers = collect();
        foreach ($stocks as $s){
            $p = $s['supplier'];
            $n = $s['name'];
            $filtered->put($n,$p);
        }
        if (!$instocksuppliers->isEmpty()) {
            /*do nothing */
        }
        else foreach($filtered as $k => $v){
                if($instocksuppliers->contains($k,$v)){
                    /*do nothing*/
                }
            else {
                $value = Supplier::query()->where('id',$v)->get()->toArray();
                $instocksuppliers->push($value[0]);
            }
        }
        return view('compliance',['suppliers' => $suppliers,"documents"=>$documents,'currentsuppliers'=>$currentsuppliers,'stock'=>$stocks, 'instocksuppliers'=>$instocksuppliers]);
    }

}
