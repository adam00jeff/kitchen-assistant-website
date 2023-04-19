<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Http\Requests\StoreBusinessRequest;
use App\Http\Requests\UpdateBusinessRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class BusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index(): void
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create(): void
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreBusinessRequest $request
     * @return void
     */
    public function store(StoreBusinessRequest $request): void
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Business $business
     * @return void
     */
    public function show(Business $business): void
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Business $business
     * @return void
     */
    public function edit(Business $business): void
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateBusinessRequest $request
     * @param Business $business
     * @return void
     */
    public function update(UpdateBusinessRequest $request, Business $business): void
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Business $business
     * @return RedirectResponse
     */
    public function destroy_business(Business $business): RedirectResponse
    {
        $business->delete();
        $business = Business::all();
        return redirect()->back();
    }
}
