<?php

namespace App\Http\Controllers;

use App\Models\supplier;
use App\Http\Requests\StoresupplierRequest;
use App\Http\Requests\UpdatesupplierRequest;
use Illuminate\Http\Response;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function suppliers_index()
    {
        $suppliers = Supplier::all();
        return view('suppliers', ['suppliers' => $suppliers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create_supplier()
    {
       return view('supplier-form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoresupplierRequest $request
     * @return Response
     */
    public function store_supplier(StoresupplierRequest $request)
    {
        $supplier = new Supplier;
        $supplier->name = $request->name;
        $supplier->address = $request->address;
        $supplier->phone = $request->phone;
        $supplier->email= $request->email;
        $supplier->save();
        $suppliers = Supplier::all();
        return view('suppliers', ['suppliers' => $suppliers]);
    }

    /**
     * Display the specified resource.
     *
     * @param supplier $supplier
     * @return Response
     */
    public function show(supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param supplier $supplier
     * @return Response
     */
    public function edit(supplier $supplier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatesupplierRequest $request
     * @param supplier $supplier
     * @return Response
     */
    public function update(UpdatesupplierRequest $request, supplier $supplier)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param supplier $supplier
     * @return Response
     */
    public function destroy_supplier(supplier $supplier)
    {
        $supplier->delete();
        $suppliers = Supplier::all();
        return view('suppliers', ['suppliers' => $suppliers]);
    }
}
