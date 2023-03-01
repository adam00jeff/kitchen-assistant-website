<?php

namespace Database\Factories;

use App\Models\Stock;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Stock>
 */
class StockFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $nutrient_array = array(
            "Protein"=>array(
                "value"=>0.1284,
                "unit"=>"g"),
            "Total lipid (fat)"=>array(
                "value"=>0.1284,
                "unit"=>"g"),
          );

        return [
        'name' => $this->faker->word(),
        'supplier' => rand(1,10),
        'serving_unit' => $this->faker->word(),
        'serving_qty' => rand(1,10),
        'info' => $this->faker->words(6,true),
            'callories' => rand(1,500),
'nutrients'=>$nutrient_array,
            /*          'nutrients'=> '{\"Protein\":{"value":0.1284,"unit":"g"},"Total lipid (fat)":{"value":3.93,"unit":"g"},"Carbohydrate, by difference":{"value":7.7664,"unit":"g"},"Ash":{"value":0.0792,"unit":"g"},"Energy":{"value":67.2,"unit":"kcal"},"Water":{"value":0.066,"unit":"g"},"Sugars, total":{"value":7.6164,"unit":"g"},"Calcium, Ca":{"value":4.08,"unit":"mg"},"Iron, Fe":{"value":0.0036,"unit":"mg"},"Magnesium, Mg":{"value":0.48,"unit":"mg"},"Phosphorus, P":{"value":3.84,"unit":"mg"},"Potassium, K":{"value":6.12,"unit":"mg"},"Sodium, Na":{"value":16.2,"unit":"mg"},"Zinc, Zn":{"value":0.0144,"unit":"mg"},"Copper, Cu":{"value":0.0004,"unit":"mg"},"Manganese, Mn":{"value":0.0002,"unit":"mg"},"Selenium, Se":{"value":0.096,"unit":"\u00c2\u00b5g"},"Vitamin A, IU":{"value":138.24,"unit":"IU"},"Retinol":{"value":37.68,"unit":"\u00c2\u00b5g"},"Vitamin A, RAE":{"value":38.28,"unit":"\u00c2\u00b5g"},"Carotene, beta":{"value":7.68,"unit":"\u00c2\u00b5g"},"Vitamin E (alpha-tocopherol)":{"value":0.1128,"unit":"mg"},"Vitamin C, total ascorbic acid":{"value":0.024,"unit":"mg"},"Thiamin":{"value":0.001,"unit":"mg"},"Riboflavin":{"value":0.0082,"unit":"mg"},"Niacin":{"value":0.0035,"unit":"mg"},"Pantothenic acid":{"value":0.0161,"unit":"mg"},"Vitamin B-6":{"value":0.0011,"unit":"mg"},"Folate, total":{"value":0.24,"unit":"\u00c2\u00b5g"},"Vitamin B-12":{"value":0.0132,"unit":"\u00c2\u00b5g"},"Vitamin K (phylloquinone)":{"value":0.336,"unit":"\u00c2\u00b5g"},"Folate, food":{"value":0.24,"unit":"\u00c2\u00b5g"},"Folate, DFE":{"value":0.24,"unit":"\u00c2\u00b5g"},"Cholesterol":{"value":12.48,"unit":"mg"},"Fatty acids, total trans":{"value":0.0809,"unit":"g"},"Fatty acids, total saturated":{"value":2.4678,"unit":"g"},"4:00":{"value":0.1421,"unit":"g"},"6:00":{"value":0.0865,"unit":"g"},"8:00":{"value":0.0509,"unit":"g"},"10:00":{"value":0.1108,"unit":"g"},"12:00":{"value":0.118,"unit":"g"},"14:00":{"value":0.3774,"unit":"g"},"16:00":{"value":1.0426,"unit":"g"},"18:00":{"value":0.4804,"unit":"g"},"20:00":{"value":0.0034,"unit":"g"},"18:1 undifferentiated":{"value":0.9776,"unit":"g"},"18:2 undifferentiated":{"value":0.1109,"unit":"g"},"18:3 undifferentiated":{"value":0.0358,"unit":"g"},"16:1 undifferentiated":{"value":0.067,"unit":"g"},"20:01":{"value":0.0025,"unit":"g"},"Fatty acids, total monounsaturated":{"value":1.0757,"unit":"g"},"Fatty acids, total polyunsaturated":{"value":0.1466,"unit":"g"},"17:00":{"value":0.0138,"unit":"g"},"18:1 t":{"value":0.0736,"unit":"g"},"18:2 CLAs":{"value":0.0066,"unit":"g"},"16:1 c":{"value":0.0236,"unit":"g"},"18:1 c":{"value":0.4187,"unit":"g"},"18:2 n-6 c,c":{"value":0.0534,"unit":"g"},"Fatty acids, total trans-monoenoic":{"value":0.0736,"unit":"g"},"Fatty acids, total trans-polyenoic":{"value":0.0073,"unit":"g"},"18:3 n-3 c,c,c (ALA)":{"value":0.0078,"unit":"g"}}',*/
        'allergens' => $this->faker->words(5, true),
            'image' => $this->faker->image,
        'user_id'=> rand(1,5),
        'business_id'=> rand(1,5)
        ];
    }
}
