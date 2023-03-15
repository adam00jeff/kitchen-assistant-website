<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-center text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ Auth::user()->name }}'s recipes
        </h2>
    </x-slot>

    <div class="py-12">
        @include('layouts.recipe_navigation')
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
            <form method="POST" action="/recipes" class="" enctype="multipart/form-data">
                @csrf
                <div class="">
                    {{--Name--}}
                    <p class="text-gray-700 text-sm">
                        <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3"
                               id="name" name="name" type="text" placeholder="recipe name">
                    </p>

                    <table  id="dynamicAddRemoveIngredient" class="p-2">
                        <tr>
{{--                            <select name="addMoreIngredients[0][ingredient]" id="ingredients[0]" class="form-control col-md-12 mb-3" required>
                                <option value="" class=""disabled selected>Select Ingredient(s)</option>
                                @foreach($stocks as $stock)
                                    <option value="{{$stock['id']}}}">{{$stock['name']}}</option>
                                @endforeach
                            </select><br>
                            </td>--}}
                        </tr>
                    </table>
                    <button type="button" name="add" id="dynamic-ar-ingredient" class="bg-gray-800 px-2 py-2 text-white text-xs rounded-md uppercase hover:underline">Add Ingredient from Stock</button>

                    <p class="text-gray-500 text-base mt-2">
                        <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3"
                               id="rmethod" name="rmethod" type="text" placeholder="method">
                    </p>


                    <div class="flex items-center justify-end mt-4 top-auto">
                        <button type="submit"
                                class="bg-gray-800 text-white text-xs px-2 py-2 rounded-md mb-2 mr-2 uppercase hover:underline">
                            Add New
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
        var i = 0;
        $("#dynamic-ar-ingredient").click(function () {
            ++i;
            $("#dynamicAddRemoveIngredient").append(
                '<tr><td><select name="addMoreIngredients['+i+'][ingredient]" id="ingredients['+1+']" class="form-control col-md-12" required>@foreach($stocks as $stock)<option value="{{ $stock['id']}}">{{ $stock['name']}}</option>@endforeach</select></td><td><input class="block bg-grey-lighter text-grey-darker border rounded"id="quantity" name="quantity" type="text" placeholder="quantity ({{$stock['serving_unit']}})"></td><td></td><td><button type="button" class="remove-input-field">Delete</button></td></tr><br>');
        });
        $(document).on('click', '.remove-input-field', function () {
            $(this).parents('tr').remove();
        });
    </script>
</x-app-layout>


{{--                    <div class="flex items-center justify-end mt-4 top-auto">
                        <button type="submit" class="bg-gray-800 text-white text-xs px-2 py-2 rounded-md mb-2 mr-2 uppercase hover:underline">
                            Continue
                        </button>
                    </div>--}}
{{--Ingredients - needs select from stock and + stock button--}}
{{--                    <p class="text-gray-700 mt-2 text-sm">
                        <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3"
                               id="ingredients" name="ingredients" type="text" placeholder="ingredients">
                    </p>--}}

{{--Method, also should be dynamic--}}
