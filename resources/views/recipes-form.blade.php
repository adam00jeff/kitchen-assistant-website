<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-center text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ Auth::user()->name }}'s recipes
        </h2>
    </x-slot>

    <div class="py-12">
        @include('layouts.recipe_navigation')
        <div class="grid justify-center items-center p-2">
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
                        </tr>
                    </table>
                    <button type="button" name="add" id="dynamic-ar-ingredient" class="bg-gray-800 px-2 py-2 text-white text-xs rounded-md uppercase hover:underline">Add Ingredient from Stock</button>

                    <p class="text-gray-500 text-base mt-2">
                        <label>Method</label>

                    <table  id="dynamicAddRemoveStep" class="p-2">
                        <tr>
                            <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3"
                                   id="rmethod[0]" name="rmethod[0]" type="text" placeholder="Step 1">
                        </tr>
                    </table>
                    <button type="button" name="addStep" id="dynamic-ar-step" class="bg-gray-800 px-2 py-2 text-white text-xs rounded-md uppercase hover:underline">Add Another Step</button>
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
        let i = 0;
        let x =1;
        let step = 2;
        let stepcount=2;
        let deletecount=0;
        let newstep =0;
        $("#dynamic-ar-ingredient").click(function () {
            ++i;
            $("#dynamicAddRemoveIngredient").append(
                '<tr><td><select name="addMoreIngredients['+i+'][stock]" id="stock['+1+']" class="form-control col-md-12" required>@foreach($stocks as $stock)<option value="{{ $stock['name']}}">{{ $stock['name']}}</option>@endforeach</select></td><td><input class="block bg-grey-lighter text-grey-darker border rounded"id="quantity['+i+']" name="quantity['+i+']" type="text" placeholder="quantity ({{$stock['serving_unit']}})"></td><td></td><td><button type="button" class="remove-input-field">Delete</button></td></tr><br>');
        });
        $("#dynamic-ar-step").click(function () {
            $("#dynamicAddRemoveStep").append(
                '<tr><td><input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" id="rmethod['+x+']" name="rmethod['+x+']" type="text" placeholder="Step '+step+'"></td><td></td><td><button type="button" class="remove-step-field">Delete</button></td></tr><br>');
            ++x;
            ++step;
            ++stepcount;
        });
        $(document).on('click', '.remove-step-field', function () {
            $(this).parents('tr').remove();
            ++deletecount;
            newstep = stepcount-deletecount;
            if (step >= newstep){
                newstep++;
            }
            step = newstep;
        });
        $(document).on('click', '.remove-input-field', function () {
            $(this).parents('tr').remove();
        });
    </script>
</x-app-layout>


