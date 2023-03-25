<div class="">
    <table class="w-full border-separate p-16 text-sm text-cene= text-gray-500 dark:text-gray-400">
        <thead class="text-s text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="px-6 py-3">Allergen Name</th>
            <th scope="col" class="px-6 py-3">Present in (Recipe):</th>
            <th scope="col" class="px-6 py-3">Found in (Stock item):</th>
            <th scope="col" class="px-6 py-3">Supplied by (Supplier):</th>
        </tr>
        <?php
            $menuallergens = collect();

            $these = collect();
            //get a list of recipes used
        foreach ($recipes as $recipe){
            //find the ingredients in each recipe
            foreach($recipe->ingredients as $key => $ingredient){
                foreach ($ingredient as $name => $quantity){
                    //find stock item matching the ingredient
                    //check if stock item exists
                    if($stocks->contains('name',$name)){
                        //get the correct stock object
                        $t = $stocks->where('name',$name);
                        //get the allergens of the stock
                        foreach ($t as $keys=>$v){
                            //iterate through the allergens, adding to array
                            foreach ($v->allergens as $a => $b){
                                if(!$menuallergens->contains($b)){
                                    $menuallergens->push($b);
                            }
                            }
                        }
                }
                }
            }
        } ?>
        @foreach($menuallergens as $allergen)
            <tr>
                <td class="px-6 py-3">{{$allergen}}</td>
                <td><?php
                        $allergenrecipes = collect();
                        foreach ($recipes as $recipe){
                            foreach($recipe->ingredients as $ingredient){
                                foreach($ingredient as $k=>$v){
                                    if($stocks->contains('name',$k)) {
                                        $t = $stocks->where('name',$k);
                                        //get the allergens of the stock
                                        foreach ($t as $keys=>$v){
                                            //iterate through the allergens, adding to array
                                            foreach ($v->allergens as $a => $b){
                                                if ($b == $allergen){
                                                    if(!$allergenrecipes->contains($recipe))
                                                        $allergenrecipes->push($recipe);
                                                }
                                                }
                                                }
                                            }
                                        }
                                    }
                                    }
                        ?>
@foreach($allergenrecipes as $allergenrecipe)
                    {{$allergenrecipe->name}}<br>
                    @endforeach
                </td>
                <td>

                    @foreach($stocks as $stock)
                        {{$stock['name']}}<br>
                    @endforeach
                </td>

                <td>
                    @foreach($suppliers as $supplier)
    {{--                    {{$supplier[0]['name']}},<br>--}}
                    @endforeach
                </td>
            </tr>
        @endforeach
    </table>
    <x-nav-link :href="route('allergeninformation')" :active="request()->routeIs('allergeninformation')">
        {{ __('Clear Search Results') }}
    </x-nav-link>
</div>
