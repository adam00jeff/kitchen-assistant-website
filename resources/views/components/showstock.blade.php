<div>
    <table>
        <tr>
            <th>Stock ID</th>
            <th>Image</th>
            <th>Name</th>
            <th>Supplier</th>
            <th>Serving Unit</th>
            <th>Info</th>
            <th>Allergens</th>
        </tr>
        @foreach($stocks as $stock)
             <tr>
                <td>{{$stock['id']}}</td>
                 <td><img src="{{$stock['image']}}" alt="" class="m-5 w-20 max-w-xs"></td>
                <td>{{$stock['name']}}</td>
                <td>{{$stock['supplier'] }}</td>
                <td>{{$stock['serving_unit'] }}</td>
                <td>{{$stock['info']}}</td>
                <td>{{$stock['allergens']}}</td>

            </tr>
        @endforeach
{{--        @else
            <h1> New Stock Item Added</h1>
            <tr>
                <td>{{$stocks['id']}}</td>
                <td>{{$stocks['name']}}</td>
                <td>{{$stocks['supplier'] }}</td>
                <td>{{$stocks['unit'] }}</td>
                <td>{{$stocks['info']}}</td>
                <td>{{$stocks['allergens']}}</td>
            </tr>
        @endif--}}
    </table>
</div>
