<div class=" items-center justify-start mt-4 top-auto">
    <a href="{{route('create_contact')}}" class="btn btn-primary btn-block bg-gray-800 text-white text-xs px-2 py-2 rounded-md mb-2 mr-2 uppercase hover:underline">Add Contact</a>
</div>

<br>
<div class="flex justify-center">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-s text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="px-6 py-3">Name</th>
            <th scope="col" class="px-6 py-3">Address</th>
            <th scope="col" class="px-6 py-3">Phone</th>
            <th scope="col" class="px-6 py-3">Email</th>
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

