<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-center text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ Auth::user()->name }}'s stock Suppliers
        </h2>
    </x-slot>

    <div class="py-12">
        @include('layouts.stock_navigation')
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex items-center justify-start mt-4 top-auto">
                        <a href="{{route('create_supplier')}}" class="btn btn-primary btn-block bg-gray-800 text-white text-xs px-2 py-2 rounded-md mb-2 mr-2 uppercase hover:underline">Add Supplier</a>
                    </div>
                    <div>
                        <x-showsuppliers :suppliers="$suppliers"/>
                    </div>
                    <x-nav-link :href="route('welcome')" :active="request()->routeIs('back')">
                        {{ __('Back') }}
                    </x-nav-link>
                </div>
            </div>
        </div>
</x-app-layout>
