<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-center text-xl text-gray-800 dark:text-gray-200 leading-tight">
           Welcome {{ Auth::user()->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="grid justify-center">
                    @if(Route::currentRouteName() == "welcome")
                    <a href="{{ route('overduedocuments')}}" class="hover:bg-blue-200"><h1>Overdue Documents</h1></a>
                    @endif
                    @if(Route::currentRouteName() == "overduedocuments")
                        <x-nav-link :href="route('welcome')">
                            {{ __('Hide Overdue Documents') }}
                        </x-nav-link>
                        <x-overduedocuments :$documents/>
                    @endif
                    <h1>UpComing Documents</h1>
                    <h1>Recent Incidents</h1>
                    <h1>Something Else</h1>
                </div>


                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


