<div>
    <table>
        <tr>
            <th>Document ID</th>
            <th>Name</th>
            <th>Document Type</th>
            <th>File Link</th>
            <th>Document Date</th>
            <th>Renewal Date</th>
        </tr>
        @foreach($documents as $document)
            <tr>
                <td>{{$document['id']}}</td>
                <td>{{$document['name']}}</td>
                <td>{{$document['type'] }}</td>
                <td>{{$document['file_location'] }}</td>
                <td>{{$document['doc_date'] }}</td>
                <td>{{$document['renewal_period'] }}</td>
            </tr>
        @endforeach
    </table>
</div>
