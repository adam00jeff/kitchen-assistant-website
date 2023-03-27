<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-center text-xl text-gray-800 dark:text-gray-200 leading-tight">
           Welcome {{ Auth::user()->name }}
        </h2>
    </x-slot>
<?php
    if(!$overduedocuments->isEmpty()){
        $overduecount = $overduedocuments->count();
    }
    if(!$upcomingdocuments->isEmpty()){
        $upcomingcount = $upcomingdocuments->count();
    }
    ?>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="flex-cols-2 items-center">
                    @if(Route::currentRouteName() == "welcome")
                        <div class="p-3 mb-6">
                    <a href="{{ route('overduedocuments')}}" @if(!$overduedocuments->isEmpty()) class="text-xl p-4" @else class="text-xl p-4" @endif>Overdue Documents @if(!$overduedocuments->isEmpty())<label class="bg-red-300 text-center text-xl pt-1 p-2 border rounded-2xl"> ( {{$overduecount}} )</label>@endif</a>
                        </div>
                    @endif
                    @if(Route::currentRouteName() == "overduedocuments")
                        <div class="p-3 mb-6">
                        <x-nav-link :href="route('welcome')">
                            {{ __('Hide Overdue Documents') }}
                        </x-nav-link>
                        <x-overduedocuments :$overduedocuments/>
                        </div>
                    @endif
                        @if(Route::currentRouteName() == "welcome")
                            <div class="p-3 mb-6">
                                <a href="{{ route('upcomingdocuments')}}" @if($upcomingdocuments->isEmpty()) class="text-xl p-4" @else class=" text-xl p-4" @endif>Upcoming Documents @if(!$upcomingdocuments->isEmpty())<label class="bg-orange-300 text-center text-xl pt-1 p-2 border rounded-2xl"> ( {{$upcomingcount}} )</label>@endif</a>
                            </div>
                        @endif
                        @if(Route::currentRouteName() == "upcomingdocuments")
                            @php($overduedocuments = $upcomingdocuments)
                            <div class="p-3 mb-6">
                                <x-nav-link :href="route('welcome')">
                                    {{ __('Hide Upcomming Documents') }}
                                </x-nav-link>
                                <x-overduedocuments :$overduedocuments/>
                            </div>
                        @endif
                    <h1 class=" p-2 text-blue-600">Recent Incidents</h1>
                    <h1 class=" p-2 text-blue-600">Something Else</h1>
                </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


