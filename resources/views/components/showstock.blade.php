<div class="">
    <table class="w-full border-separate p-16 text-sm text-cene= text-gray-500 dark:text-gray-400">
        <thead class="text-s text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
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
            @php($s = $stock['supplier'])
             <tr>
                <td>{{$stock['id']}}</td>
                 <td><img src="{{$stock['image']}}" alt="" class="m-5 w-20 max-w-xs"></td>
                <td>{{$stock['name']}}</td>
                <td>{{$suppliers[$s] }}</td>
                <td>{{$stock['serving_unit'] }}</td>
                <td>{{$stock['info']}}</td>
                <td>{{$stock['allergens']}}</td>
                 <td><textarea>@foreach($nutrient_array as $key=>$na){{$key}}{{$na['value']}}{{$na['unit']}}
@endforeach
                     </textarea>
                 </td>
                 <td>
                     <form method="POST" action="/stock/{{$stock['id']}}">
                         {{ csrf_field() }}
                         {{ method_field('DELETE') }}
                         <div class="flex items-center justify-center mt-4 top-auto form-group">
                             <input type="submit" class="btn btn-primary bg-gray-800 text-white text-xs px-2 py-2 rounded-md mb-2 mr-2 uppercase hover:underline destroy_stock" value="Delete">
                         </div>
                     </form>
                 </td>
        @endforeach
    </table>
</div>

