<div>
    <table>
        <tr>
            <th>Recepie ID</th>
            <th>Name</th>
            <th>Ingredients</th>
            <th>Method</th>
        </tr>
        @foreach($recipes as $recipe)
            <tr>
                <td>{{$recipe['id']}}</td>
                <td>{{$recipe['name']}}</td>
                <td>{{ $recipe['ingredients'] }}</td>
                <td>{{ $recipe['method'] }}</td>
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
