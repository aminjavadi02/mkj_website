<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Item;

class itemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1;$i<=50;$i++){
            if(Item::find($i)==null){
                $item = Item::newFactory()->create();
            }
        }

    }
}
