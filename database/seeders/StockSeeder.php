<?php

namespace Database\Seeders;

use App\Models\Nutrient;
use App\Models\Stock;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Container\Container;

class StockSeeder extends Seeder
{
    /**
     * The current Faker instance.
     *
     * @var \Faker\Generator
     */
    protected $faker;

    /**
     * Create a new seeder instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->faker = $this->withFaker();
    }

    /**
     * Get a new Faker instance.
     *
     * @return \Faker\Generator
     */
    protected function withFaker()
    {
        return Container::getInstance()->make(Generator::class);
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $appid = "9787f4f0";
        $appkey = "5b11621e62674c09602b3d94977c8172";
        $endpoint = "https://trackapi.nutritionix.com/v2/natural/nutrients";
        $gotquery = "apple rice grape mango chocolate flour lemon sugar walnuts white-chocolate, tomatoes, oregano thyme basil olives oil salt pepper";
        $response = Http::withHeaders([
            "x-app-id" => $appid,
            "x-app-key" => $appkey
        ])->post($endpoint, [
            "query" => $gotquery,
            /*            "include_subrecepie" => true,*/
            "ingredient_statement" => true,
            "locale" => "en_GB",
            "timezone" => "GB"
        ]);
        $data = json_decode($response, true);
        $keys = $data;
        $nutrients = Nutrient::all()->sortBy('type')->toArray();
                    foreach($keys['foods'] as $i) {
                        $photos = $i['photo'];
                        Stock::create([
                            'name' => $i['food_name'],
                            'supplier' => rand(1,10),
                            'serving_unit' => $i['serving_unit'],
                            'serving_qty' => $i['serving_qty'],
                            'info' => "some information on this item",
                            'callories' => $i['nf_calories'],
                            'nutrients'=> $i['full_nutrients'],
                            'allergens' => $this->faker->words(5, true),
                            'image' => $photos['thumb'],
                            'user_id'=> rand(1,5),
                            'business_id'=> rand(1,5)
                        ]);
                    }

    }
}
