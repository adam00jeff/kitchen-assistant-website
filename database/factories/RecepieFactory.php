<?php

namespace Database\Factories;

use App\Models\Recepie;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Recepie>
 */
class RecepieFactory extends Factory
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
            'ingredients' => $this->faker->words(6,true),
            'method' => $this->faker->words(80,true),
            'user_id'=> rand(1,5),
            'business_id'=> rand(1,5)
        ];
    }

}
