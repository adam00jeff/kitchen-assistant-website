<?php use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
?>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-center text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ Auth::user()->name }}'s stock
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                <div>
                    <h2>Please Confrim Stock Information</h2>
                    {{--need to save nutrient array to $session for retreival in controller--}}
                    <?php $keys = $data; ?>
                    @foreach($keys['foods'] as $i)
                            <?php $foods = $i;
                            $photos = $foods['photo'];
                            $apinutrients = $i['full_nutrients'];
                            $nutrient_array = array(); ?>
                        @foreach($i['full_nutrients'] as $j)
                            @foreach($nutrients as $n)
                                @if($j['attr_id']==$n['attr_id']&&$j['value']!=0)
                                        <?php $nutrient_array = Arr::add($nutrient_array, $n['name'], array('value' => $j['value'], 'unit' => $n['unit'])) ?>
                                @endif
                            @endforeach
                        @endforeach
                        @php($nutrient_collection = new Collection($nutrient_array))
                        @php(session(['nutrients'=>$nutrient_array]))
                        @php(session(['photo'=>$photos['thumb']]))
                        {{--might need a foreach here for stock items with multiple food types--}}
                        <form method="POST" action="{{route('store_stock')}}" class="" enctype="multipart/form-data">
                            @csrf
                            <div class="">
                                <p class="text-gray-700 text-sm">
                                    <img src="{{$photos['thumb']}}" alt="" class="m-5 w-20 max-w-xs">
                                    <label for="name">Name</label>
                                    <input
                                        class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3"
                                        id="name" name="name" type="text" value="{{$i['food_name']}}" placeholder="">
                                </p>
                                <p class="text-gray-700 mt-2 text-sm">
                                    <label for="supplier">Supplier</label>
                                    <input
                                        class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3"
                                        id="supplier" name="supplier" type="text" value="{{$supplier['name']}}">

                                </p>
                                <p class="text-gray-500 text-base mt-2">
                                    <label for="serving_unit">Unit</label>
                                    <input
                                        class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3"
                                        id="serving_unit" name="serving_unit" type="text"
                                        value="{{$i['serving_unit']}}">
                                </p>
                                <p class="text-gray-500 text-base mt-2">
                                    <label for="serving_size">Serving Size</label>
                                    <input
                                        class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3"
                                        id="serving_size" name="serving_size" type="text"
                                        value="{{$i['serving_qty']}} {{$i['serving_unit']}}">
                                    @php(session(['serving_unit'=>$i['serving_unit']]))
                                    @php(session(['serving_qty'=>$i['serving_qty']]))
                                </p>
                                <p class="text-gray-500 text-base mt-2">
                                    <label for="info">Info</label>
                                    <input
                                        class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3"
                                        id="info" name="info" type="text" value="{{session('info')}}">
                                </p>
                                <p class="text-gray-500 text-base mt-2">
                                    <label for="callories">Callories (per serve)</label>
                                    <input
                                        class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3"
                                        id="callories" name="callories" type="text" value="{{$i['nf_calories']}}">
                                </p>
                                <p class="text-gray-500 text-base mt-2">
                                    <label for="allergens">Allergens</label>
                                    <input
                                        class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3"
                                        id="allergens" name="allergens" type="text" value="{{session('allergens')}}, {{session('db_allergens')[0]['name']}}">
                                </p>
                                <p class="text-gray-500 text-base mt-2">
                                    <label for="Nutrients">Full Nutrients</label>
                                    <textarea
                                        class="scrollabletextbox appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3"
                                        id="nutrients" name="nutrients" type="text" value="">@foreach($nutrient_array as $key=>$na){{$key}}{{$na['value']}}{{$na['unit']}}
@endforeach
                               </textarea>
                                <div class="flex items-center justify-end mt-4 top-auto">
                                    <button type="submit"
                                            class="bg-gray-800 text-white text-xs px-2 py-2 rounded-md mb-2 mr-2 uppercase hover:underline">
                                        Add New
                                    </button>
                                </div>
                            </div>
                        </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    {{--
        Item Name: {{session('name')}}<br>
        Unit: {{session('unit')}}<br>
        Allergens: {{session('allergens')}}<br>
        Info: {{session('info')}}<br>--}}{{--



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
</x-app-layout>
