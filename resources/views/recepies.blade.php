<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-center text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ Auth::user()->name }}'s recepies
        </h2>
    </x-slot>

    <div class="py-12">
        @include('layouts.recepie_navigation')
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 text-gray-900 dark:text-gray-100">
                                <div>
                                    <table>
                                        <tr>
                                            <th>Recepie ID</th>
                                            <th>Name</th>
                                            <th>Ingredients</th>
                                            <th>Method</th>
                                        </tr>
                                        @foreach($recepies as $recepie)
                                            <tr>
                                                <td>{{$recepie['id']}}</td>
                                                <td>{{$recepie['name']}}</td>
                                                <td>{{ $recepie['ingredients'] }}</td>
                                                <td>{{ $recepie['method'] }}</td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>

                            </div>
                            <x-nav-link :href="route('recepies')" :active="request()->routeIs('recepies')">
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
