<div class="">
    <table class="w-full border-separate p-16 text-sm text-cene= text-gray-500 dark:text-gray-400">
        <thead class="text-s text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            @if(Route::currentRouteName() == "admin_panel")
            @can('edit-user')
            <th scope="col" class="px-6 py-3">User ID</th>
                <th scope="col" class="px-6 py-3">Admin?</th>
            @endcan
            @endif
            <th scope="col" class="px-6 py-3">Name</th>
            <th scope="col" class="px-6 py-3">Email</th>
                <th> </th>
                <th scope="col" class="px-6 py-3">Training Record</th>

        </tr>
        @foreach($users as $user)
            <tr>
                @if(Route::currentRouteName() == "admin_panel")
                @can('edit-user')
                <td>{{$user['id']}}</td>
                    <td>{{$user['is_admin'] }}</td>
                @endcan
                @endif
                <td>{{$user['name']}}</td>
                <td>{{$user['email'] }}</td>
                    @can('edit-user')
                <td>
                    @if(Route::currentRouteName() == "admin_panel")
                    <form method="POST" action="/users/{{$user->id}}">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <div class="flex items-center justify-start mt-4 top-auto form-group">
                            <input type="submit" class="btn btn-primary btn-block bg-gray-800 text-white text-xs px-2 py-2 rounded-md mb-2 mr-2 uppercase hover:underline destroy_user" value="Delete">
                        </div>
                    </form>
                    @endif
                </td>
                    @endcan
                <td>
                    <?php
                        foreach ($documents as $document) {
                            if($document->type=='Staff Training'){
                               ?> <iframe src="{{URL::to('/')}}{{$document['file_location']}}" width="100%" height="100%"></iframe> <?php
                        }}

                    ?>
                </td>
            </tr>
        @endforeach
    </table>
</div>
