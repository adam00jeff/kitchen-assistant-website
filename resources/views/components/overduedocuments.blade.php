
<div class="flex justify-center">
    @if($overduedocuments->isEmpty())
        <p class="bg-green-400 border-solid rounded-md p-3 border-2 border-green-400">
    No Documents Are @if(Route::currentRouteName() == "upcomingdocuments")Upcoming @elseif(Route::currentRouteName()== "overduedocuments")Overdue @endif
        </p>
    @else
        @if(Route::currentRouteName() == "upcomingdocuments")<table class="w-full text-sm text-left text-grey-400 border-solid rounded-full p-3 border-2 border-orange-400">
        @elseif(Route::currentRouteName()== "overduedocuments")<table class="w-full text-sm text-left text-grey-400 border-solid rounded-full p-3 border-2 border-red-400">
        @endif
        @if(Route::currentRouteName() == "upcomingdocuments")        <thead class="text-s uppercase bg-orange-200 ">
                @elseif(Route::currentRouteName()== "overduedocuments")        <thead class="text-s uppercase bg-red-200 ">
                @endif
        <tr>
            <th scope="col" class="px-6 py-3">Name</th>
            <th scope="col" class="px-6 py-3">Document Type</th>
            <th scope="col" class="px-6 py-3">Renewal Date</th>
            <th scope="col" class="px-6 py-3">Document Preview</th>
        </tr>
        @foreach($overduedocuments as $document)
            <tr>
                <td>{{$document['display_name']}}</td>
                <td>{{$document['type'] }}</td>
                <td class="text-center text-xl border-white">{{$document['renewal_date'] }}</td>
                <td>
                    <iframe src="{{URL::to('/')}}{{$document['file_location']}}" width="100%" height="100%"></iframe>
                </td>
            </tr>
        @endforeach
    </table>
    @endif
</div>
