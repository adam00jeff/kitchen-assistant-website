<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;
use App\Models\Allergen;
use App\Models\Contact;
use App\Models\Recipe;
use App\Models\Stock;
use App\Models\supplier;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    /**
     * Gets contact information and relevant other data
     *
     * @return Application|Factory|View
     */
    public function contact_information(): View|Factory|Application
    {
        $id = Auth::user()->business_id;
        $allergens = Allergen::all();
        $suppliers = Supplier::all();
        $busid = Auth::user()->business_id;
        $stocks = Stock::all()->where('business_id', $busid);
        $contacts = Contact::all()->where('business_id', $busid);
        $recipes = Recipe::all()->where('business_id', $id);
        return view('compliance', ['allergens' => $allergens, 'stocks' => $stocks, 'suppliers' => $suppliers, 'recipes' => $recipes, 'contacts' => $contacts]);
    }

    /**
     * Show the form for creating a new contact.
     *
     * @return Application|Factory|View
     */
    public function create_contact(): View|Factory|Application
    {
        return view('contact-form');
    }

    /**
     * Store a newly created contact in storage.
     *
     * @param StoreContactRequest $request
     * @return Application|Factory|View
     */
    public function store_contact(StoreContactRequest $request): View|Factory|Application
    {
        $id = Auth::user()->business_id;
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->address = $request->address;
        $contact->phone = $request->phone;
        $contact->email = $request->email;
        $contact->business_id = $id;
        $contact->save();
        $contacts = DB::table('contacts')->where('business_id', $id)->latest('created_at')->first();
        return view('compliance', ['contacts' => $contacts]);
    }

    /**
     * Display the specified resource.
     *
     * @param Contact $contact
     * @return void
     */
    public function show(Contact $contact): void
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Contact $contact
     * @return void
     */
    public function edit(Contact $contact): void
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateContactRequest $request
     * @param Contact $contact
     * @return void
     */
    public function update(UpdateContactRequest $request, Contact $contact): void
    {
        //
    }

    /**
     * Remove the specified contact from storage.
     *
     * @param Contact $contact
     * @return Application|Factory|View
     */
    public function destroy_contact(contact $contact): View|Factory|Application
    {
        $contact->delete();
        $contacts = Contact::all();
        return view('compliance', ['contacts' => $contacts]);
    }
}
