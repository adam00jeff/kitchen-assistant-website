<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Stock>
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
        return [
        'name' => $this->faker->word(),
        'supplier' => rand(1,10),
        'unit' => $this->faker->word(),
        'info' => $this->faker->words(6,true),
        'allergens' => $this->faker->words(5, true),
            'user_id'=> rand(1,5),
            'business_id'=> rand(1,5)
        ];
    }
}
