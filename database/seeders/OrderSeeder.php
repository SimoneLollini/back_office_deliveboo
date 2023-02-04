<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 10; $i++) {
            $newOrder = new Order();
            $newOrder->price = $faker->randomFloat(2, 5, 60);;
            $newOrder->phone = $faker->randomNumber(5, true);;
            $newOrder->description = $faker->randomHtml(1, 1);;
            $newOrder->full_name = $faker->name();
            $newOrder->adress = $faker->address();
            $newOrder->status = $faker->boolean();
            $newOrder->save();
        }
    }
}
