<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class aboutusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('aboutus')->updateOrInsert([
            "history_en" => null,
            "history_fa" => null,
            "factory_phone"=> null,
            "office_phone"=> null,
            "office_address_en" => null,
            "office_address_fa" => null,
            "factory_address_en" => null,
            "factory_address_fa" => null,
            "google_location_factory" => null,
            "google_location_office" => null,
            "image_name" => null,
        ]);
    }
}
