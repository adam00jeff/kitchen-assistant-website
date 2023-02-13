<div>
    <table>
        <tr>
            <th>Business ID</th>
            <th>Name</th>
            <th>Address</th>
            <th>Phone Number</th>
        </tr>
        @foreach($businesses as $business)
            <tr>
                <td>{{$business['id']}}</td>
                <td>{{$business['name']}}</td>
                <td>{{$business['address'] }}</td>
                <td>{{$business['phone'] }}</td>
            </tr>
        @endforeach
    </table>
</div>
