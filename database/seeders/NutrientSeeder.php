<?php

namespace Database\Seeders;

/*use Illuminate\Database\Console\Seeds\WithoutModelEvents;*/
use Illuminate\Database\Seeder;
use App\Models\Nutrient;
use SebastianBergmann\Type\FalseType;

class NutrientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Nutrient::truncate();

        $csvFile = fopen(base_path("public/storage/csv/Nutritionix_Full_Nutrient.csv"),"r");

        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !==FALSE) {
            if (!$firstline){
                Nutrient::create([
                    "attr_id"=>$data['0'],
                    "name"=>$data['3'],
                    "unit"=>$data['4']
                ]);
            }
            $firstline = false;
        }
        fclose($csvFile);
    }
}
