<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(StockSeeder::class);
        $this->call(RecepieSeeder::class);
        $this->call(DocumentSeeder::class);
        $this->call(BusinessSeeder::class);


        \App\Models\User::factory(5)->create();
        \App\Models\Business::factory(5)->create();
        \App\Models\Stock::factory(50)->state(new Sequence(
            ['user_id'=>1],
            ['user_id'=>2],
            ['user_id'=>3],
            ['user_id'=>4],
            ['user_id'=>5],

        ))->create();
        \App\Models\Recepie::factory(50)->state(new Sequence(
            ['user_id'=>1],
            ['user_id'=>2],
            ['user_id'=>3],
            ['user_id'=>4],
            ['user_id'=>5],

        ))->create();
        \App\Models\Document::factory(50)->state(new Sequence(
            ['renewal_period'=>'annual'],
            ['renewal_period'=>'quarterly']
        ))->state(new Sequence(
            ['user_id'=>1],
            ['user_id'=>2],
            ['user_id'=>3],
            ['user_id'=>4],
            ['user_id'=>5],

        ))->create();


        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
