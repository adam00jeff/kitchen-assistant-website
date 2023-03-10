<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Document;
use Illuminate\Support\Facades\Hash;

class DocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Document::create([
            'name' => "1678034417_Hazard Analysis and Critical Control Point HACCP.pdf",
            'display_name' => "HCCAP plan",
            'type' => "compliance",
            'file_location'=>"/storage/uploads/1678034417_Hazard Analysis and Critical Control Point HACCP.pdf",
            'doc_date'=>'2020-01-01',
           'renewal_period'=>'annual',
           'user_id'=>1,
           'business_id'=>1
        ]);
        Document::create([
            'name' => "1678034450_sfbb-diary-07-diary-and-4-weekly-review-fixed_0.pdf",
            'display_name' => "Safer Food Better Business - Diary",
            'type' => "Guidance",
            'file_location'=>"/storage/uploads/1678034450_sfbb-diary-07-diary-and-4-weekly-review-fixed_0.pdf",
            'doc_date'=>'2024-12-09',
            'renewal_period'=>'annual',
            'user_id'=>1,
            'business_id'=>1
        ]);
        Document::create([
            'name' => "1678034470_fsa1782002guidance.pdf",
            'display_name' => "FSA Traceability Guidance",
            'type' => "Guidance",
            'file_location'=>"/storage/uploads/1678034470_fsa1782002guidance.pdf",
            'doc_date'=>'2021-08-01',
            'renewal_period'=>'annual',
            'user_id'=>1,
            'business_id'=>1
        ]);
    }
}
