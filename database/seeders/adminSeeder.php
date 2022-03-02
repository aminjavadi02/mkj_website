<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Hash;

class adminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->updateOrInsert([
            "name"=>'admin',
            "email"=>"admin@example.com",
            "password"=>Hash::make('12345678'),
        ]);
    }

    
}
