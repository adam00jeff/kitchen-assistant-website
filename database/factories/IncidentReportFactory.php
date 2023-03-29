<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\IncidentReport>
 */
class IncidentReportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'date_of_report' => $this->faker->dateTimeBetween('-1 month'),
            'date_of_incident' => $this->faker->dateTimeBetween('-2 month'),
            'time_of_incident' => $this->faker->time(),
            'incident_type'=>$this->faker->randomElement(['Customer Incident','Staff Incident','Food Incident','Stock/ Supplier Incident','Workplace Incident','Other']),
            'severity'=>$this->faker->randomElement(['High','Medium','Low']),
            'location'=>$this->faker->randomElement(['Front of House','Back of House','Outside Building']),
            'description'=>$this->faker->sentences(4,true),
            'action_taken'=>$this->faker->sentences(4,true),
            'reported_by'=>'test',
            'user_id'=> rand(1,5),
            'business_id'=> rand(1,5)
        ];
    }
}
