<?php

namespace Database\Seeders;

use App\Models\business;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class BusinessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Business::create([
            'name' => "test business",
            'address' => "a test address",
            'phone' => "0113113113",
            'id'=>'1'
        ]);
    }
}
