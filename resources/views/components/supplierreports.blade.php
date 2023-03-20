<div>
    <div class="border">
        On-Premises Suppliers:
        <div class="flex justify-center">
            <table class="align-middle">
                <tr>
                    <th>Supplier ID</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Email</th>
                </tr>
                @foreach($instock as $supplier)
                    <tr>
                        <td>{{$supplier['id']}}</td>
                        <td>{{$supplier['name']}}</td>
                        <td>{{$supplier['address']}}</td>
                        <td>{{$supplier['phone'] }}</td>
                        <td>{{$supplier['email'] }}</td>
                        <td>
                            <form method="POST" action="/suppliers/{{$supplier['id']}}">
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
    <div class="border">
        <p>
        Full Supplier List:
        <x-showsuppliers :$suppliers/>
        </p>
    </div>
</div>
