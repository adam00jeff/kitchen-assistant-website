<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-center text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ Auth::user()->name }}'s stock
        </h2>
    </x-slot>

{{--    @php($data = array($stocks))
    @php(array_push($data, $suppliers))--}}
    <div class="py-12">
        @include('layouts.stock_navigation')
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div>
                        @if(Route::currentRouteName() == "store_stock")
                            <h1>New Stock Item</h1>
                            <x-show_single_stock :$stocks :$suppliers/> {{--really want to also pass $suppliers here, doesnt seem to work--}}
                        @else <x-showstock  :$stocks :$suppliers/>
                        @endif
                    </div>

                </div>
                @if(Route::currentRouteName() == "store_stock")
                    <x-nav-link :href="route('stock')" :active="request()->routeIs('stock')">
                        {{ __('Back') }}
                    </x-nav-link>
                @else
                    <x-nav-link :href="route('welcome')" :active="request()->routeIs('back')">
                    {{ __('Back') }}
                    </x-nav-link>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>
