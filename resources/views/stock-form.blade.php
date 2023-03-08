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
<br><br>
        <form method="post" action="/stocks/confirm" class="" enctype="multipart/form-data">
            @csrf
            <div class="">

                <p class="text-gray-700 text-sm">
                    <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3"
                           id="name" name="name" type="text" placeholder="stock name">
                </p>
                <p class="text-gray-700 mt-2 text-sm">
{{--                    <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3"
                           id="supplier" name="supplier" type="text" placeholder="stock supplier">--}}
                {!! Form::select('suppliers', $suppliers, null, ['class' => 'form-control appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3','placeholder'=>'Select Supplier','id'=>'supplier', 'name'=>'supplier']) !!}
                <div class="flex items-center justify-end mt-4 top-auto">
                    <a href="{{route('create_supplier')}}" class="btn btn-primary bg-gray-800 text-white text-xs px-2 py-2 rounded-md mb-2 mr-2 uppercase hover:underline">Add a New Supplier</a>
                </div>
                </p>
                <p class="text-gray-500 text-base mt-2">
                    <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3"
                           id="unit" name="unit" type="text" placeholder="unit">
                </p>
                <p class="text-gray-500 text-base mt-2">
                    <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3"
                           id="info" name="info" type="text" placeholder="info">
                </p>
{{--                <p class="text-gray-500 text-base mt-2">
                    {!! Form::select('allergens', $allergens, null,/* array('multiple'),*/ ['class' => 'form-control appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3','placeholder'=>'Select allergens','id'=>'db_allergens', 'name'=>'addMoreAllergenFields[0][allergen]'/*,'multiple'=>'multiple'*/]) !!}
                    <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3"
                           id="allergens" name="allergens" type="text" placeholder="Custom Allergens">
                </p>--}}

                <table  id="dynamicAddRemove">


                    <tr>
                        <select name="addMoreAllergenFields[0][allergen]" id="allergens[0]" class="form-control col-md-12" required>
                                <option value="" disabled selected>Select Allergen(s)</option>
                            @foreach($allergens as $allergen)
                                <option value="{{$allergen}}"=>{{$allergen}}</option>
                            @endforeach
                        </select><br>
                    </td>
                    </tr>
                </table>
                <button type="button" name="add" id="dynamic-ar" class="bg-gray-800 px-2 py-2 text-white text-xs rounded-md uppercase hover:underline">Add Another Allergen</button>


                <div class="flex items-center justify-end mt-4 top-auto">
                    <button type="submit" class="bg-gray-800 text-white text-xs px-2 py-2 rounded-md mb-2 mr-2 uppercase hover:underline">
                        Check Stock
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
        $("#dynamic-ar").click(function () {
            ++i;


            $("#dynamicAddRemove").append('<select name="addMoreAllergenFields['+i+'][allergen]" id="allergens['+1+']" class="form-control col-md-12" required>@foreach($allergens as $allergen)<option value="{{ $allergen}}">{{ $allergen }}</option></td><td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>@endforeach</select><br>'
);
        });
        $(document).on('click', '.remove-input-field', function () {
            $(this).parents('tr').remove();
        });
    </script>
</x-app-layout>
