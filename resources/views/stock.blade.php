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
                        <table>
                            <tr>
                                <th>Stock ID</th>
                                <th>Name</th>
                                <th>Supplier</th>
                                <th>Unit</th>
                                <th>Info</th>
                                <th>Allergens</th>
                            </tr>
                        @foreach($stocks as $stock)
                            <tr>
                                <td>{{$stock['id']}}</td>
                                <td>{{$stock['name']}}</td>
                                <td>{{$stock['supplier'] }}</td>
                                <td>{{$stock['unit'] }}</td>
                                <td>{{$stock['info']}}</td>
                                <td>{{$stock['allergens']}}</td>
                            </tr>
                        @endforeach
                        </table>
                    </div>

                </div>
                <x-nav-link :href="route('welcome')" :active="request()->routeIs('back')">
                    {{ __('Back') }}
                </x-nav-link>
            </div>
        </div>
    </div>
</x-app-layout>
