<?php

namespace Database\Factories;

use App\Models\Stock;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Stock>
 */
class StockFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $nutrient_array = array(
            "Protein"=>array(
                "value"=>0.1284,
                "unit"=>"g"),
            "Total lipid (fat)"=>array(
                "value"=>0.1284,
                "unit"=>"g"),
          );

        return [
        'name' => $this->faker->word(),
        'supplier' => rand(1,10),
        'serving_unit' => $this->faker->word(),
        'serving_qty' => rand(1,10),
        'info' => $this->faker->words(6,true),
            'callories' => rand(1,500),
        'nutrients'=>array(
            "Protein"=>array(
                "value"=>0.1284,
                "unit"=>"g"),
            "Total lipid (fat)"=>array(
                "value"=>0.1284,
                "unit"=>"g"),
        ),
        'allergens' => $this->faker->words(5, true),
            'image' => $this->faker->image,
        'user_id'=> rand(1,5),
        'business_id'=> rand(1,5)
        ];
    }
}
