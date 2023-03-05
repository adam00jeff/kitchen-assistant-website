<div class="flex justify-center">
    <table class="align-middle">
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
                <td>
                    <form method="POST" action="/business/{{$business->id}}">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <div class="flex items-center justify-start mt-4 top-auto form-group">
                            <input type="submit" class="btn btn-primary btn-block bg-gray-800 text-white text-xs px-2 py-2 rounded-md mb-2 mr-2 uppercase hover:underline destroy_business" value="Delete">
                        </div>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</div>
