<div class="">
    <script src="{{ asset('js/my.js') }}"></script>
    <table >
        <tr class="border-gray-700">
            <th>Stock ID</th>
            <th>Image</th>
            <th>Name</th>
            <th>Supplier</th>
            <th>Serving Unit</th>
            <th>Info</th>
            <th>Allergens</th>
            <th>Full Nutrients</th>
            <th>Remove</th>
        </tr>
        @foreach($stocks as $stock)
            @php($nutrient_array=$stock['nutrients'])
{{--        {{print_r($nutrient_array)}}--}}

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

                         <div class="form-group">
                             <input type="submit" class="btn btn-danger destroy_stock" value="Delete {{$stock->id}}">
                         </div>
                     </form>

                 </td>
                 <td>
{{--                     <a href="{{ route('destroy_stock', $stock->id) }}" class="btn btn-xs btn-info pull-right">Edit</a>--}}
{{--                     <button value="{{$stock['id']}}" type="button" class="p-5 bg-gray-600 border-gray-700 destroy_stock">Delete{{$stock['id']}}</button>--}}
                 </td>
        @endforeach
{{--        @else
@foreach($nutrient_array as $key=>$na){{$na['value']}}{{$na['unit']}}
            <h1> New Stock Item Added</h1>
            <tr>
                <td>{{$stocks['id']}}</td>
                <td>{{$stocks['name']}}</td>
                <td>{{$stocks['supplier'] }}</td>
                <td>{{$stocks['unit'] }}</td>
                <td>{{$stocks['info']}}</td>
                <td>{{$stocks['allergens']}}</td>
            </tr>
        @endif--}}
    </table>
</div>
