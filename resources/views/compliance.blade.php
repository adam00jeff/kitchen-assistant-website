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
                            <div>@if(Route::currentRouteName() == "compliance")
                                <p>
                                    <a href="{{ route('supplierreport')}}" class="">Supplier Reports</a><br>
                                    - Allergen Information <br>
                                    - Contacts List<br>
                                    - Staff Training<br>
                                    - Incident Reports<br>
                                    - Food Hygiene Rating<br>
                                    - Daily/ Monthly Checks<br>
                                </p>
                                     @elseif(Route::currentRouteName() == "supplierreport")
                                    Your Suppliers Report:
                                    <x-supplierreports :$suppliers :$currentsuppliers/>
                                     @else
                                     Nothing here right now
                                @endif
                            </div>

                        </div>
                        <x-nav-link :href="route('compliance')" :active="request()->routeIs('compliance')">
                            {{ __('Back to Compliance') }}
                        </x-nav-link>
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
