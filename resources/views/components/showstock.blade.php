<div>
    <table>
        <tr>
            <th>Stock ID</th>
            <th>Name</th>
            <th>Supplier</th>
            <th>Unit</th>
            <th>Info</th>
            <th>Allergens</th>
        </tr>
        @foreach($stocks as $stock)
            <tr>
                <td>{{$stock['id']}}</td>
                <td>{{$stock['name']}}</td>
                <td>{{$stock['supplier'] }}</td>
                <td>{{$stock['unit'] }}</td>
                <td>{{$stock['info']}}</td>
                <td>{{$stock['allergens']}}</td>
            </tr>
        @endforeach
    </table>
</div>
