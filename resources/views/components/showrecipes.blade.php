<div class="">
    <table class="w-full border-separate p-16 text-sm text-cene= text-gray-500 dark:text-gray-400">
        <thead class="text-s text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="px-6 py-3">Recipe Name</th>
            <th scope="col" class="px-6 py-3">Ingredients</th>
            <th scope="col" class="px-6 py-3">Method</th>
        </tr>
        @foreach($recipes as $recipe)
            <tr>
                <td class="px-6 py-3">{{$recipe['name']}}</td>

                <td class="px-6 py-3">
                    @if(is_string($recipe['ingredients'])){{$recipe['ingredients']}}
                        @else{{--<textarea>--}} @foreach($recipe['ingredients'] as $ingredient)
                            @foreach($ingredient as $k => $v)
                                @php($unit = "")
                                @foreach($stocks as $key => $value)
                                    @if($value->name==$k)
                                   <?php $unit = $value->serving_unit ?>
                                @endif
                            @endforeach
                                {{$k}}{{$v}} {{$unit}}<br>
                            @endforeach
                        @endforeach{{--</textarea>--}}
                    @endif</td>
                <td class=""><textarea>@foreach($recipe['method'] as $m)
{{ $m }}
@endforeach</textarea></td>
                <td>
                    <form method="POST" action="/recipes/{{$recipe->id}}">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <div class="flex items-center justify-start mt-4 top-auto form-group">
                            <input type="submit" class="btn btn-primary btn-block bg-gray-800 text-white text-xs px-2 py-2 rounded-md mb-2 mr-2 uppercase hover:underline destroy_recipe" value="Delete">
                        </div>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</div>
