<div class="flex justify-center">
    <table class="align-middle">
        <tr>
            <th>User ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Admin?</th>
        </tr>
        @foreach($users as $user)
            <tr>
                <td>{{$user['id']}}</td>
                <td>{{$user['name']}}</td>
                <td>{{$user['email'] }}</td>
                <td>{{$user['is_admin'] }}</td>
                <td>
                    <form method="POST" action="/users/{{$user->id}}">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <div class="flex items-center justify-start mt-4 top-auto form-group">
                            <input type="submit" class="btn btn-primary btn-block bg-gray-800 text-white text-xs px-2 py-2 rounded-md mb-2 mr-2 uppercase hover:underline destroy_user" value="Delete">
                        </div>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</div>
