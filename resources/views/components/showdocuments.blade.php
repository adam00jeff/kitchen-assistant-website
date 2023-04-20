<div>@csrf
@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <strong>{{ $message }}</strong>
    </div>
@endif
</div>
<div class="flex justify-center">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-s text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="px-6 py-3">Name</th>
            <th scope="col" class="px-6 py-3">Document Type</th>
            <th scope="col" class="px-6 py-3">Document Date</th>
            <th scope="col" class="px-6 py-3">Renewal Date</th>
            <th scope="col" class="px-6 py-3"></th>
            <th scope="col" class="px-6 py-3">Document Preview</th>
        </tr>
        @foreach($documents as $document)
            <tr>
                <td>{{$document['display_name']}}</td>
                <td>{{$document['type'] }}</td>
                <td>{{$document['doc_date'] }}</td>
                <td>{{$document['renewal_date'] }}</td>
                <td>
                    <form method="POST" action="/documents/{{$document->id}}">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <div class="flex items-center justify-start mt-4 top-auto form-group">
                            <input type="submit" class="btn btn-primary btn-block bg-gray-800 text-white text-xs px-2 py-2 rounded-md mb-2 mr-2 uppercase hover:underline destroy_document" value="Delete">
                        </div>
                    </form>
                </td>
                <td>
                <iframe src="{{URL::to('/')}}{{$document['file_location']}}" width="100%" height="100%"></iframe>
                </td>
            </tr>
        @endforeach
    </table>
</div>
