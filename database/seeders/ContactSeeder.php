<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Contact::create([
            'name' => "Local EHO Contact",
            'address' => "local EHO Office",
            'phone' => "0113 113 113",
            'email' => "email@EHO.com",
            'business_id' => 1,
        ]);
    }
}
