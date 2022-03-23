<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Item;
use Illuminate\Support\Str;
// use Faker\Factory as Faker;

class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Item::class;

    public function definition()
    {
        // $faker = Faker::create();

        return [
            'name_fa' => $this->faker->name,
            'name_en' => $this->faker->name,
            'description_fa' => $this->faker->text,
            'description_en' => $this->faker->text,
            'size' => random_int(1,100),
            'alloy' => $this->faker->name,
            'category_id' => '1',
        ];
    }
}
