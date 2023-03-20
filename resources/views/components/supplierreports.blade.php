<div>
    <div class="border">
        On-Premises Suppliers:
        <div class="flex justify-center">
            <table class="align-middle">
                <tr>
                    <th>Name</th>
{{--                    <th>Address</th>--}}
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Stock Supplied</th>
                    <th>Allergens Present</th>
                </tr>
                @foreach($instock as $supplier)
                    <tr>
                        <td>{{$supplier['name']}}</td>
{{--                        <td>{{$supplier['address']}}</td>--}}
                        <td>{{$supplier['phone'] }}</td>
                        <td>{{$supplier['email'] }}</td>
                        <td><?php foreach($stock as $k=>$v){
                                    if ($v['supplier']==$supplier['id']) {
                                        ?>{{$v['name']}}, <?php
                                    }
                                    }?></td>
                        <td><?php foreach($stock as $k=>$v){
                            if ($v['supplier']==$supplier['id']) {
                                ?>{{$v['allergens']}}, <?php
                                                  }
                                                  }?></td>
{{--                        <td>
                            <form method="POST" action="/suppliers/{{$supplier['id']}}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <div class="flex items-center justify-start mt-4 top-auto form-group">
                                    <input type="submit" class="btn btn-primary btn-block bg-gray-800 text-white text-xs px-2 py-2 rounded-md mb-2 mr-2 uppercase hover:underline destroy_stock" value="Delete">
                                </div>
                            </form>
                        </td>--}}
                    </tr>
                @endforeach
            </table>
        </div>

    </div>
    <div class="border">
        <p>
        <div class="grid justify-center">
            <x-nav-link :href="route('compliance')" :active="request()->routeIs('compliance')">
                {{ __('Back to Compliance') }}
            </x-nav-link>
        </div>
        <h2>Full Supplier List:</h2>
        <x-showsuppliers :$suppliers/>
        </p>
    </div>
</div>
