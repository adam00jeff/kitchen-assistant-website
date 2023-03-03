<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Business;
use App\Models\Document;
use App\Models\Recepie;
use App\Models\Stock;
use App\Models\supplier;
use App\Models\User;
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
        $this->call(BusinessSeeder::class);
        Business::factory(5)->state(new Sequence(
            ['id'=>2],
            ['id'=>3],
            ['id'=>4],
            ['id'=>5],
            ['id'=>6],

        ))->create();
        $this->call(UserSeeder::class);
        $this->call(StockSeeder::class);
        $this->call(RecepieSeeder::class);
        $this->call(DocumentSeeder::class);
        $this->call(NutrientSeeder::class);
        $this->call(AllergenSeeder::class);
        $this->call(SupplierSeeder::class);


        User::factory(5)->state(new Sequence(
            ['business_id'=>2],
            ['business_id'=>3],
            ['business_id'=>4],
            ['business_id'=>5],
            ['business_id'=>6],

        ))->create();

        Stock::factory(50)->state(new Sequence(
            ['user_id'=>1],
            ['user_id'=>2],
            ['user_id'=>3],
            ['user_id'=>4],
            ['user_id'=>5]))->state(new Sequence(
            ['image'=>"https://nix-tag-images.s3.amazonaws.com/159_thumb.jpg"],
            ['image'=>"https://nix-tag-images.s3.amazonaws.com/653_thumb.jpg"],
            ['image'=>"https://nix-tag-images.s3.amazonaws.com/834_thumb.jpg"],
            ['image'=>"https://nix-tag-images.s3.amazonaws.com/115_thumb.jpg"],
            ['image'=>"https://nix-tag-images.s3.amazonaws.com/320_thumb.jpg"]
        ))->create();
        Recepie::factory(50)->state(new Sequence(
            ['user_id'=>1],
            ['user_id'=>2],
            ['user_id'=>3],
            ['user_id'=>4],
            ['user_id'=>5],

        ))->create();
        Document::factory(50)->state(new Sequence(
            ['renewal_period'=>'annual'],
            ['renewal_period'=>'quarterly']
        ))->state(new Sequence(
            ['user_id'=>1],
            ['user_id'=>2],
            ['user_id'=>3],
            ['user_id'=>4],
            ['user_id'=>5],

        ))->create();
        Supplier::factory(10)->create();


        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
