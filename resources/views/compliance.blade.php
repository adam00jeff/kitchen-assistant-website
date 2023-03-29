<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-center text-xl text-gray-800 dark:text-gray-200 leading-tight">
{{ Auth::user()->name }}'s Compliance
</h2>
</x-slot>

<div class="py-12">
{{--    @include('layouts.document_navigation')--}}{{--might need this at later stage--}}
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            @if(Route::currentRouteName() == "compliance")
                            <div class="flex justify-center">
                                <p>
                                    <a href="{{ route('supplierreport')}}" class="">Supplier Reports</a><br>
                                    <a href="{{ route('allergeninformation')}}" class="">Allergen Information</a><br>
                                    <a href="{{ route('contactslist')}}" class="">Contacts List</a><br>
                                    <a href="{{ route('stafftraining')}}" class="">Staff Training Records</a><br>
                                    <a href="{{ route('incidentreports')}}" class="">Incident Reports</a><br>
                                    - Food Hygiene Rating<br>
                                    - Daily/ Monthly Checks<br>
                                </p>
                            </div>
                            @elseif(Route::currentRouteName() == "supplierreport")
                                <div>
                                <h2>Your Suppliers Report:</h2><br>
                                    <x-supplierreports :$suppliers :$instock :$stocks />
                                    <x-nav-link :href="route('compliance')" :active="request()->routeIs('compliance')">
                                        {{ __('Back to Compliance') }}
                                    </x-nav-link>
                                </div>
                            @elseif(Route::currentRouteName() == "allergensearch")
                                <div class="">
                                    <H2 >Allergens: </H2>
                                    <x-allergensearch :$allergens :$stocks :$suppliers :$recipes/>
                                        <x-nav-link :href="route('compliance')" :active="request()->routeIs('compliance')">
                                            {{ __('Back to Compliance') }}
                                        </x-nav-link>
                                    </div>
                            @elseif(Route::currentRouteName() == "allergeninformation")
                                     <div>
                                    <H2 >Allergens: </H2>
                                <x-allergensearch :$allergens :$stocks :$suppliers :$recipes/>
                                    On Menu Allergens: <br>
                                <x-onmenuallergens :$allergens :$stocks :$suppliers :$recipes/>
                                <x-nav-link :href="route('compliance')" :active="request()->routeIs('compliance')">
                                                {{ __('Back to Compliance') }}
                                            </x-nav-link>
                                         </div>
                            @elseif(Route::currentRouteName() == "contactslist")
                                <div>
                                    <h2>Contacts</h2><br>
                                    <x-showcontacts :$contacts />
                            <h2>Suppliers</h2>
                                <x-showsuppliers :$suppliers />
                                </div>
                            @elseif(Route::currentRouteName() == "store_contact")
                                <div>
                                    <h2>Contact Stored Successfully</h2>
                                    <x-showcontacts :$contacts />
                                </div>
                            @elseif(Route::currentRouteName() == "stafftraining")
                                <div>
                                    <h1 class="flex justify-center">Staff Training</h1>
                                    <p>
                                    You Should ensure each Staff Member has an upto date training record:
                                <x-showusers :$users :$documents :$businesses/>
                                    </p>

                                    <x-nav-link :href="route('compliance')" :active="request()->routeIs('compliance')">
                                        {{ __('Back to Compliance') }}
                                    </x-nav-link>
                                </div>
                            @elseif(Route::currentRouteName() == "incidentreports")
                                <div>
                                    <h1 class="flex justify-center">Incident Reports</h1>
                                    <div class="flex items-center justify-start mt-4 top-auto">
                                        <a href="{{route('create_incidentreport')}}" class="btn btn-primary btn-block bg-gray-800 text-white text-xs px-2 py-2 rounded-md mb-2 mr-2 uppercase hover:underline">New Incident</a>
                                    </div>
                                    <p>
                                        <x-showincidentreports :$incidentreports/>
                                    </p>

                                    <x-nav-link :href="route('compliance')" :active="request()->routeIs('compliance')">
                                        {{ __('Back to Compliance') }}
                                    </x-nav-link>
                                </div>
                            @else
                                     Nothing here right now
                            @endif
                                </div>

                        <x-nav-link :href="route('welcome')" :active="request()->routeIs('back')">
                            {{ __('Home') }}
                        </x-nav-link>
                    </div>

                        </div>



                    </div>


                </div>


            </div>

        </div>
    </div>
</div>
</x-app-layout>
