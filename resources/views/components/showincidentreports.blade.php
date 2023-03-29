<div class="flex justify-center">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-s text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="px-6 py-3">Report Date</th>
            <th scope="col" class="px-6 py-3">Incident Date</th>
            <th scope="col" class="px-6 py-3">Incident Time</th>
            <th scope="col" class="px-6 py-3">Severity</th>
            <th scope="col" class="px-6 py-3">Incident Type</th>
            <th scope="col" class="px-6 py-3">Location</th>
            <th scope="col" class="px-6 py-3">Description</th>
            <th scope="col" class="px-6 py-3">Action Taken</th>
            <th scope="col" class="px-6 py-3">Reported By:</th>
            @can('admin-view')
            <th scope="col" class="px-6 py-3">Delete:</th>
            @endcan
        </tr>
        @if(Route::currentRouteName() == "incidentreports"||Route::currentRouteName() == "recentincidents")
            @foreach($incidentreports as $incidentreport)
                <tr @if($incidentreport->severity=='High') class="bg-red-400 text-gray-700 " @elseif($incidentreport->severity=='Medium')class="bg-orange-400" @elseif($incidentreport->severity=='Low') class="bg-yellow-200" @endif>
                    <td class="">{{$incidentreport->date_of_report}}</td>
                    <td>{{$incidentreport->date_of_incident}}</td>
                    <td>{{$incidentreport->time_of_incident}}</td>
                    <td>{{$incidentreport->severity}}</td>
                    <td>{{$incidentreport->incident_type}}</td>
                    <td>{{$incidentreport->location}}</td>
                    <td>{{$incidentreport->description}}</td>
                    <td>{{$incidentreport->action_taken}}</td>
                    <td>{{$incidentreport->reported_by}}</td>
                    @can('admin-view')
                    <td>
                        <form method="POST" action="/incidentreports/{{$incidentreport->id}}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <div class="flex items-center justify-start mt-4 top-auto form-group">
                                <input type="submit" class="btn btn-primary btn-block bg-gray-800 text-white text-xs px-2 py-2 rounded-md mb-2 mr-2 uppercase hover:underline destroy_stock" value="Delete">
                            </div>
                        </form>
                    </td>
                    @endcan
                </tr>
        @endforeach
    </table>
</div>
</div>
@elseif(Route::currentRouteName() == "store_incidentreport")

    <x-nav-link :href="route('incidentreports')">
        {{ __('Back to Incident Reports') }}
    </x-nav-link><br>
    <x-nav-link :href="route('compliance')">
        {{ __('Back to Compliance') }}
    </x-nav-link>
@endif


