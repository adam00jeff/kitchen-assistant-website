<div class=" items-center justify-start mt-4 top-auto">
    <a href="{{route('create_contact')}}" class="btn btn-primary btn-block bg-gray-800 text-white text-xs px-2 py-2 rounded-md mb-2 mr-2 uppercase hover:underline">Add Contact</a>
</div>


<div class="flex justify-center">
    <div>
    <table class="align-middle">
        <tr>
            <th>Name</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Email</th>
        </tr>
        @foreach($contacts as $contact)
            <tr>
                <td>{{$contact['name']}}</td>
                <td>{{$contact['address']}}</td>
                <td>{{$contact['phone'] }}</td>
                <td>{{$contact['email'] }}</td>
                <td>
                    <form method="POST" action="/contactslist/{{$contact['id']}}">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <div class="flex items-center justify-start mt-4 top-auto form-group">
                            <input type="submit" class="btn btn-primary btn-block bg-gray-800 text-white text-xs px-2 py-2 rounded-md mb-2 mr-2 uppercase hover:underline destroy_stock" value="Delete">
                        </div>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    </div>
</div>

