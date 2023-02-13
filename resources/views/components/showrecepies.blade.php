<div>
    <table>
        <tr>
            <th>Recepie ID</th>
            <th>Name</th>
            <th>Ingredients</th>
            <th>Method</th>
        </tr>
        @foreach($recepies as $recepie)
            <tr>
                <td>{{$recepie['id']}}</td>
                <td>{{$recepie['name']}}</td>
                <td>{{ $recepie['ingredients'] }}</td>
                <td>{{ $recepie['method'] }}</td>
            </tr>
        @endforeach
    </table>
</div>
