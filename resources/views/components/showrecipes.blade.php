<div>
    <table>
        <tr>
            <th>Recipe ID</th>
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
            </tr>
        @endforeach
    </table>
</div>
