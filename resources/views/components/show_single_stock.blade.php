@php($stock=$stocks)
@php($nutrient_array=$stock['nutrients'])
<div>
    <table>
        <tr>
            <th>Stock ID</th>
            <th>Name</th>
            <th>Supplier</th>
            <th>Unit</th>
            <th>Info</th>
            <th>Allergens</th>
        </tr>
            <tr>
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
                        <input type="submit" class="btn btn-danger destroy_stock" value="Delete">
                    </div>
                </form>
            </td>
            </tr>
    </table>
</div>
