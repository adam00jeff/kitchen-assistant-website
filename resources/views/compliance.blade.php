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

                            <div class="grid justify-center">@if(Route::currentRouteName() == "compliance")
                                <p>
                                    <a href="{{ route('supplierreport')}}" class="">Supplier Reports</a><br>
                                    <a href="{{ route('allergeninformation')}}" class="">Allergen Information</a><br>
                                    - Contacts List<br>
                                    - Staff Training<br>
                                    - Incident Reports<br>
                                    - Food Hygiene Rating<br>
                                    - Daily/ Monthly Checks<br>
                                </p>
                                     @elseif(Route::currentRouteName() == "supplierreport")
                                    Your Suppliers Report:
                                    <x-supplierreports :$suppliers :$instock :$stock/>
                                    <div class="grid justify-center">
                                    <x-nav-link :href="route('compliance')" :active="request()->routeIs('compliance')">
                                        {{ __('Back to Compliance') }}
                                    </x-nav-link>
                                    </div>
                                    @elseif(Route::currentRouteName() == "allergeninformation"|| Route::currentRouteName() == "allergensearch")
                                    <H2 class="grid text-center">Allergens: </H2>
                                <x-allergensearch :$allergens :$stocks :$suppliers :$recipes/>
                                        On Menu Allergens <br>
                                        On Premises Allergens <br>
                                        <div class="grid justify-center">
                                            <x-nav-link :href="route('compliance')" :active="request()->routeIs('compliance')">
                                                {{ __('Back to Compliance') }}
                                            </x-nav-link>
                                        </div>
                                     @else
                                     Nothing here right now
                                   @endif
                            </div>

                        </div>



                    </div>
                </div>



            </div>

            <x-nav-link :href="route('welcome')" :active="request()->routeIs('back')">
                {{ __('Home') }}
            </x-nav-link>
        </div>
    </div>
</div>
</x-app-layout>
