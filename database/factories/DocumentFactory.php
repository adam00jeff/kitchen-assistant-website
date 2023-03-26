<?php

namespace Database\Factories;

use App\Models\Document;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\Sequence;

/**
 * @extends Factory<Document>
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
            'renewal_date'=>$this->faker->dateTimeBetween('-1 month','+1 month'),
            'user_id'=> rand(1,5)/*state(new Sequence(
                ['annual'],['quarterly'],['bi-annual']
            ))*/
            ,
            'business_id'=> rand(1,5)
        ];
    }
}
