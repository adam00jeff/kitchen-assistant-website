<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-center text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ Auth::user()->name }}'s recipes
        </h2>
    </x-slot>

    <div class="py-12">
        @include('layouts.recipe_navigation')
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 text-gray-900 dark:text-gray-100">
                                <div>
                                    <x-showrecipes :recipes="$recipes"/>
                                </div>

                            </div>
                            <x-nav-link :href="route('recipes')" :active="request()->routeIs('recipes')">
                                {{ __('Back') }}
                            </x-nav-link>
                        </div>
                    </div>


                </div>

                <x-nav-link :href="route('welcome')" :active="request()->routeIs('back')">
                    {{ __('Back') }}
                </x-nav-link>
            </div>
        </div>
    </div>
</x-app-layout>
