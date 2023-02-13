<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\Sequence;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Document>
 */
class DocumentFactory extends Factory
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
            'type' => $this->faker->word(),
            'file_location' => 'a_path_to_the_file.file',
            'doc_date' =>$this->faker->date,
            'renewal_period'=>$this->faker->word(),
            'user_id'=> rand(1,5)/*state(new Sequence(
                ['annual'],['quarterly'],['bi-annual']
            ))*/
            ,
            'business_id'=> rand(1,5)
        ];
    }
}
