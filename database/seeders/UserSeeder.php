<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => "test",
            'email' => "test@test.com",
            'password' => Hash::make("1234"),
            'is_admin'=>true,
            'business_id'=>'1'
        ]);
        User::create([
            'name' => "user",
            'email' => "user@user.com",
            'password' => Hash::make("1234"),
            'is_admin'=>false,
            'business_id'=>'1'
        ]);
    }
}
