<div>
    <!-- Let all your things have their places; let each part of your business have its time. - Benjamin Franklin -->
    <!--Search Bar -->
    <div class="flex rounded-xl m-5 shadow-2xl rounded-sm bg-yellow-300 border-blue-300">
        <form action="{{ route('allergensearch') }}" method="GET">
            <input type="text" name="search" placeholder="Search stock for Allergen"
                   class="font-semibold p-1 mt-4 m-2 text-gray-600 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out"/>
            <button type="submit"
                    class="font-semibold p-1 mt-4 m-2 text-gray-600 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                Search
            </button>
        </form>
    </div>
    <div>
        @if(Route::currentRouteName() == "allergensearch")
        <x-searchedallergens :$allergens :$stocks :$suppliers :$recipes />
        @endif
    </div>
</div>
