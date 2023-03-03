<div>
    <table>
        <tr>
            <th>Supplier ID</th>
            <th>Name</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Email</th>
        </tr>
        @foreach($suppliers as $supplier)
            <tr>
                <td>{{$supplier['id']}}</td>
                <td>{{$supplier['name']}}</td>
                <td>{{$supplier['address']}}</td>
                <td>{{$supplier['phone'] }}</td>
                <td>{{$supplier['email'] }}</td>
            </tr>
        @endforeach
    </table>
</div>
