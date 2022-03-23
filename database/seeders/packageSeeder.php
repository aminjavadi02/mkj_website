<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class packageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('packages')->updateOrInsert([
            'name_fa' => 'بسته بندی جدید',
            'name_en' => 'new package',
        ]);
    }
}
