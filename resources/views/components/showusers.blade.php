<div>
    <table>
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
            </tr>
        @endforeach
    </table>
</div>
