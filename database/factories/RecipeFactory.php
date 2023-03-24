<?php

namespace Database\Factories;

use App\Models\Recipe;
use App\Models\Stock;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends Factory<Recipe>
 */
class RecipeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $steps = ['Step One','Step Two','Step Three','Step Four','Step Five','Step Six','Step Seven','Step Eight','Step Nine'];
        $stock = Stock::pluck('name')->toArray();
        $fnl = array();
        foreach ($stock as $s){
            $fnl[] = $s." ".$this->faker->numberBetween(25,2000);
        }

        return [
            'name' => $this->faker->word(),
            'ingredients' => Arr::random($fnl,rand(1,9)),
            'method' => Arr::random($steps,rand(1,9)),
            'user_id'=> rand(1,5),
            'business_id'=> rand(1,5)
        ];
    }

}
