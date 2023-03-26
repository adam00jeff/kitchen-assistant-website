<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-center text-xl text-gray-800 leading-tight">
            Welcome {{ Auth::user()->name }}
            <br> Admin View
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="">
                <div class="">
                    <div class="text-center font-bold text-red-600"> Warning: removing a Business or User will cascade delete their related stock, recipes and documents.<br>
                            Removing a Business will remove all associated users and cascade delete their items.
                    </div>
                        <div class="grid  justify-center">
                        All Businesses:
                        <x-showbusiness :businesses="$businesses"/>
                        <br>
                        All Users:
                        <x-showusers :users="$users" :$documents/>
                        <br>
                        All Recipes:
                        <x-showrecipes :recipes="$recipes" :$stocks/>
                        <br>
                        All Stocks:
                        <x-showstock :stocks="$stocks" :suppliers="$suppliers" :nutrients="$nutrients"/>
                        <br>
                        All Documents:
                       <x-showdocuments :documents="$documents"/>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>


