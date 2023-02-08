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


        \App\Models\User::factory(10)->create();
        \App\Models\Stock::factory(10)->create();
        \App\Models\Recepie::factory(10)->create();
        \App\Models\Document::factory(10)->state(new Sequence(
            ['renewal_period'=>'annual'],
            ['renewal_period'=>'quarterly']
        ))->create();


        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
