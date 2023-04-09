<?php

namespace Database\Seeders;

use App\Models\Business;
use App\Models\Document;
use App\Models\Recipe;
use App\Models\Stock;
use App\Models\supplier;
use App\Models\User;
use App\Models\IncidentReport;
use Database\Factories\IncidentReportFactory;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * Calls Seeder Class for each table
     * Calls Factory Class for each seeder, if required
     * @return void
     */
    public function run()
    {
        /**
         * Calls the Business seeder to seed any required Businesses
         * Seeds the Business table with 5 businesses
         * Ensures Business ids are given an even spread for testing
         */
        $this->call(BusinessSeeder::class);
        Business::factory(5)->state(new Sequence(
            ['id'=>2],
            ['id'=>3],
            ['id'=>4],
            ['id'=>5],
            ['id'=>6],))->create();
        /**
         * Calls the User seeder to seed any required Users
         * Seeds the User table with 30 users
         * Ensures Business ids are given an even spread for testing
         */
        $this->call(UserSeeder::class);
        User::factory(30)->state(new Sequence(
            ['business_id'=>2],
            ['business_id'=>3],
            ['business_id'=>4],
            ['business_id'=>5],
            ['business_id'=>6]))->create();
        /**
         * Seeders called for dependencies on following factories
         * Seeders called where factories are not required
         */
        $this->call(NutrientSeeder::class);
        $this->call(StockSeeder::class);
        $this->call(RecipeSeeder::class);
        $this->call(DocumentSeeder::class);
        $this->call(ContactSeeder::class);
        $this->call(AllergenSeeder::class);
        $this->call(SupplierSeeder::class);
        /**
         * Calls the Incident Report seeder to seed any required reports
         * Seeds the IncidentReport table with 25 reports
         */
        $this->call(IncidentReportSeeder::class);
        IncidentReport::factory(25)->create();
        /**
         *  Calls the recipe factory 50 times to create recipes
         *  Assigns recipes to the first 5 users in table for testing
         */
        Recipe::factory(50)->state(new Sequence(
            ['user_id'=>1],
            ['user_id'=>2],
            ['user_id'=>3],
            ['user_id'=>4],
            ['user_id'=>5],))->create();
        /**
         * Calls the Supplier factory to create 10 suppliers
         */
        Supplier::factory(10)->create();
    }
}
