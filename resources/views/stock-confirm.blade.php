<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-center text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ Auth::user()->name }}'s stock
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                Nutritionix API response<br>
                <?php $keys = $data;?>
                @foreach($keys['foods'] as $i)
                   food: {{$i['food_name']}}<br>
                   serving size :{{$i['serving_qty']}}{{$i['serving_unit']}}<br>
                   serving callories :{{$i['nf_calories']}}<br>
                    @foreach($i['full_nutrients'] as $j)
                        @foreach($nutrients as $n)
                            @if($j['attr_id']==$n['attr_id']&&$j['value']!=0)
                                    {{$n['name']}} {{$j['value'] }} {{$n['unit']}}<br>
                            @endif
                        @endforeach


                    @endforeach
               @endforeach
Item Name: {{session('name')}}<br>
Unit: {{session('unit')}}<br>
Allergens: {{session('allergens')}}<br>
Info: {{session('info')}}<br>
</div>
</div>
</div>



{{--
<div class="py-12">
@include('layouts.stock_navigation')
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
<div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
<div class="p-6 text-gray-900 dark:text-gray-100">
<div>
   <form method="POST" action="/stock" class="" enctype="multipart/form-data">
       @csrf
       <div class="">
           <p class="text-gray-700 text-sm">
               <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3"
                      id="name" name="name" type="text" placeholder="{{$session->name}}">
           </p>
           <p class="text-gray-700 mt-2 text-sm">
               <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3"
                      id="supplier" name="supplier" type="text" placeholder="{{$session->supplier}}">
           </p>
           <p class="text-gray-500 text-base mt-2">
               <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3"
                      id="unit" name="unit" type="text" placeholder="{{$session->unit}}">
           </p>
           <p class="text-gray-500 text-base mt-2">
               <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3"
                      id="info" name="info" type="text" placeholder="{{$session->info}}">
           </p>
           <p class="text-gray-500 text-base mt-2">
               <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3"
                      id="allergens" name="allergens" type="text" placeholder="{{$session->allergens}}">
           </p>

           <div class="flex items-center justify-end mt-4 top-auto">
               <button type="submit" class="bg-gray-800 text-white text-xs px-2 py-2 rounded-md mb-2 mr-2 uppercase hover:underline">
                   Add New
               </button>
           </div>
       </div>
   </form>
</div>

</div>
<x-nav-link :href="route('welcome')" :active="request()->routeIs('back')">
{{ __('Back') }}
</x-nav-link>
</div>
</div>
</div>
--}}
{{--/*<?php

$appid = "9787f4f0";
$appkey = "5b11621e62674c09602b3d94977c8172";
$endpoint = "https://trackapi.nutritionix.com/v2/natural/nutrients";

function sendRequest( $endpoint, $appkey,$appid)
{
$curl = curl_init($endpoint);
curl_setopt($curl, CURLOPT_URL, $endpoint);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$headers = array(
"Content-Type:application/json",
"x-app-id:".$appid,
"x-app-key:".$appkey
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
$data = array(
"query" => "1kg Bramley apples,
140g golden caster sugar,
½ tsp cinnamon,
3 tbsp flour",
"timezone" => "US/Eastern"

);
$testdata = json_encode($data);
curl_setopt($curl, CURLOPT_POSTFIELDS, $testdata);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$resp = curl_exec($curl);
curl_close($curl);
return $resp;


}
$response = sendRequest($appkey, $endpoint, $appkey,$appid);
echo "Response from API: " . $response . "\r\n";


?>*/--}}
</x-app-layout>
