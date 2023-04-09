<?php

namespace Database\Seeders;

use App\Models\Allergen;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AllergenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Allergen::truncate();
        $csvFile = fopen(base_path("public/storage/csv/Allergens.csv"),"r");
        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !==FALSE) {
            if (!$firstline){
                Allergen::create([
                    "name"=>$data['0']
                ]);
            }
            $firstline = false;
        }
        fclose($csvFile);
    }
}
