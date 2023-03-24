<div class="">
    <table class="w-full border-separate p-16 text-sm text-cene= text-gray-500 dark:text-gray-400">
        <thead class="text-s text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="px-6 py-3">Allergen Name</th>
            <th scope="col" class="px-6 py-3">Found in (Stock item):</th>
            <th scope="col" class="px-6 py-3">Present in (Recipe):</th>
            <th scope="col" class="px-6 py-3">Supplied by (Supplier):</th>
        </tr>
        @foreach($allergens as $allergen)
            <tr>
                <td class="px-6 py-3">{{$allergen['name']}}</td>
                <td>
                    @foreach($stocks as $stock)
                        {{$stock['name']}}
                    @endforeach
                </td>
                <td>
                    @foreach($recipes as $recipe)
                        {{$recipe['name']}},
                    @endforeach
                </td>
                <td>
                    //supplied by
                </td>
            </tr>
        @endforeach
    </table>
</div>
