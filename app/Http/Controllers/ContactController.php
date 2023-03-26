<?php

namespace App\Http\Controllers;

use App\Models\Allergen;
use App\Models\Contact;
use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;
use App\Models\Recipe;
use App\Models\Stock;
use App\Models\supplier;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function contact_information()
    {
        $id = Auth::user()->business_id;
        $allergens = Allergen::all();
        $suppliers = Supplier::all();
        $busid = Auth::user()->business_id;
        $stocks = Stock::all()->where('business_id', $busid);
        $contacts = Contact::all();
        $recipes = $recipes = Recipe::all()->where('business_id',$id);
        return view('compliance',['allergens' => $allergens, 'stocks'=>$stocks,'suppliers' => $suppliers, 'recipes'=>$recipes, 'contacts'=>$contacts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_contact()
    {
        return view('contact-form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreContactRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store_contact(StoreContactRequest $request)
    {
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->address = $request->address;
        $contact->phone = $request->phone;
        $contact->email= $request->email;
        $contact->save();
        $contacts = Supplier::all();
        return view('compliance', ['contacts' => $contacts]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateContactRequest  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateContactRequest $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy_contact(contact $contact)
    {
        $contact->delete();
        $contacts = Contact::all();
        return view('compliance', ['contacts' => $contacts]);
    }
}
