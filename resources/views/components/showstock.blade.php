<div class="flex justify-center">
    <table class="align-middle">
        <tr class="border-gray-700">
            <th scope="col" class="px-6 py-3">Stock ID</th>
            <th scope="col" class="px-6 py-3">Image</th>
            <th scope="col" class="px-6 py-3">Name</th>
            <th scope="col" class="px-6 py-3">Supplier</th>
            <th scope="col" class="px-6 py-3">Serving Unit</th>
            <th scope="col" class="px-6 py-3">Info</th>
            <th scope="col" class="px-6 py-3">Allergens</th>
            <th scope="col" class="px-6 py-3">Full Nutrients</th>
            <th scope="col" class="px-6 py-3">Remove</th>
        </tr>
        @foreach($stocks as $stock)
            @php($nutrient_array=$stock['nutrients'])
             <tr>
                <td>{{$stock['id']}}</td>
                 <td><img src="{{$stock['image']}}" alt="" class="m-5 w-20 max-w-xs"></td>
                <td>{{$stock['name']}}</td>
                <td>{{$stock['supplier'] }}</td>
                <td>{{$stock['serving_unit'] }}</td>
                <td>{{$stock['info']}}</td>
                <td>{{$stock['allergens']}}</td>
                 <td><textarea>@foreach($nutrient_array as $key=>$na){{$key}}{{$na['value']}}{{$na['unit']}}
@endforeach
                     </textarea>
                 </td>
                 <td>
                     <form method="POST" action="/stock/{{$stock->id}}">
                         {{ csrf_field() }}
                         {{ method_field('DELETE') }}

                         <div class="flex items-center justify-start mt-4 top-auto form-group">
                             <input type="submit" class="btn btn-primary btn-block bg-gray-800 text-white text-xs px-2 py-2 rounded-md mb-2 mr-2 uppercase hover:underline destroy_stock" value="Delete">
                         </div>
                     </form>
                 </td>
        @endforeach
    </table>
</div>
{{--
<div class="flex items-center justify-start mt-4 top-auto">
    <a href="{{route('stock')}}" class="btn btn-primary btn-block bg-gray-800 text-white text-xs px-2 py-2 rounded-md mb-2 mr-2 uppercase hover:underline">Add Supplier</a>
</div>--}}
