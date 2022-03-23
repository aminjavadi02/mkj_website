<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class categorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->updateOrInsert([
            'name_fa' => 'دسته بندی فلان',
            'name_en' => 'folan category',
            'parent_id' => null,
        ]);
    }
}
