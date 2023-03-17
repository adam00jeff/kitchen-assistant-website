<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-center text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Welcome {{ Auth::user()->name }}
            <br> Admin View
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div>
                        All Businesses:
                        <x-showbusiness :businesses="$businesses"/>
                        <br>
                        All Users
                        <x-showusers :users="$users"/>
                        <br>
                        All Recepies
                        <x-showrecepies :$recipes="$recipes"/>
                        <br>
                        All Stocks
                        <x-showstock :stocks="$stocks"/>
                        <br>
                        All Documents
                       <x-showdocuments :documents="$documents"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


