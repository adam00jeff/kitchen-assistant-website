@php($stock=$stocks)
@php($nutrient_array=$stock['nutrients'])


<div class="">
    <table class="w-full border-separate p-16 text-center text-sm text-gray-500 dark:text-gray-400">
        <thead class="text-s text-gray-700 text-center uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr class="border-gray-700">
            <th scope="col" class="px-6 py-3">Stock ID</th>
            <th scope="col" class="px-6 py-3">Name</th>
            <th scope="col" class="px-6 py-3">Picture</th>
            <th scope="col" class="px-6 py-3">Supplier</th>
            <th scope="col" class="px-6 py-3">Unit</th>
            <th scope="col" class="px-6 py-3">Info</th>
            <th scope="col" class="px-6 py-3 text-right">Allergens</th>
            <th scope="col" class="px-6 py-3 text-right">Nutrients</th>
        </tr>
            <tr>
        <tr>
            <td>{{$stock['id']}}</td>
            <td><img src="{{$stock['image']}}" alt="" class="m-5 w-20 max-w-xs"></td>
            <td>{{$stock['name']}}</td>
            <td>{{$stock['supplier'] }}</td>
            <td>{{$stock['serving_unit'] }}</td>
            <td>{{$stock['info']}}</td>
            <td>
                <?php if($stock['allergens']!=null){
                foreach ($stock['allergens'] as $k => $v){?>
                {{$v}} <?php
                       }
                       }
                       ?>
            </td>
            <td><textarea>@foreach($nutrient_array as $key=>$na){{$key}}{{$na['value']}}{{$na['unit']}}
@endforeach
                     </textarea>
            </td>
            <td>
                <form method="POST" action="/stock/{{$stock->id}}">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}

                    <div class="form-group">
                        <input type="submit" class="btn btn-danger destroy_stock" value="Delete">
                    </div>
                </form>
            </td>
            </tr>
    </table>
</div>
