<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-center text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ Auth::user()->name }}'s stock
        </h2>
    </x-slot>

    <div class="py-12">
        @include('layouts.stock_navigation')
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div>
                        <form method="POST" action="/stock" class="" enctype="multipart/form-data">
                            @csrf
                            <div class="">
                                <p class="text-gray-700 text-sm">
                                    <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3"
                                           id="name" name="name" type="text" placeholder="{{$session->name}}">
                                </p>
                                <p class="text-gray-700 mt-2 text-sm">
                                    <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3"
                                           id="supplier" name="supplier" type="text" placeholder="{{$session->supplier}}">
                                </p>
                                <p class="text-gray-500 text-base mt-2">
                                    <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3"
                                           id="unit" name="unit" type="text" placeholder="{{$session->unit}}">
                                </p>
                                <p class="text-gray-500 text-base mt-2">
                                    <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3"
                                           id="info" name="info" type="text" placeholder="{{$session->info}}">
                                </p>
                                <p class="text-gray-500 text-base mt-2">
                                    <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3"
                                           id="allergens" name="allergens" type="text" placeholder="{{$session->allergens}}">
                                </p>

                                <div class="flex items-center justify-end mt-4 top-auto">
                                    <button type="submit" class="bg-gray-800 text-white text-xs px-2 py-2 rounded-md mb-2 mr-2 uppercase hover:underline">
                                        Add New
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
                <x-nav-link :href="route('welcome')" :active="request()->routeIs('back')">
                    {{ __('Back') }}
                </x-nav-link>
            </div>
        </div>
    </div>
</x-app-layout>
