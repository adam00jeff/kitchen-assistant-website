<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-center text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ Auth::user()->name }}'s stock
        </h2>
    </x-slot>
    <div class="py-12">

    @include('layouts.stock_navigation')
    <div class="flex justify-center items-center p-2">
        <!-- if to catch errors and report to user -->
        @if ($errors->any())
            <div class="bg-red-600 border-solid rounded-md border-2 border-red-700">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="text-lg text-gray-100">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <!-- main form for new product -->
        <!-- main form for new product -->
        <?php $query = "ham, butter";?>
        test

        <a href="{{ route('confirm_stock', $query) }}" class="btn btn-warning btn-block text-center" role="button">Add to cart</a> </p>    </div>
{{--
        <form method="post" action="/stock/store" class="" enctype="multipart/form-data">
            @csrf
            <div class="">
                <p class="text-gray-700 text-sm">
                    <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3"
                           id="name" name="name" type="text" placeholder="stock name">
                </p>
                <p class="text-gray-700 mt-2 text-sm">
                    <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3"
                           id="supplier" name="supplier" type="text" placeholder="stock supplier">
                </p>
                <p class="text-gray-500 text-base mt-2">
                    <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3"
                           id="unit" name="unit" type="text" placeholder="unit">
                </p>
                <p class="text-gray-500 text-base mt-2">
                    <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3"
                           id="info" name="info" type="text" placeholder="info">
                </p>
                <p class="text-gray-500 text-base mt-2">
                    <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3"
                           id="allergens" name="allergens" type="text" placeholder="allergens">
                </p>

                <div class="flex items-center justify-end mt-4 top-auto">
                    <button type="submit" class="bg-gray-800 text-white text-xs px-2 py-2 rounded-md mb-2 mr-2 uppercase hover:underline">
                        Check Stock
                    </button>
                </div>
            </div>
        </form>
--}}
    </div>
    </div>
</x-app-layout>
