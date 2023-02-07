<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Plate;
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
            $newOrder->price = $faker->randomFloat(2, 5, 60);
            $newOrder->phone = $faker->e164PhoneNumber();
            $newOrder->description = $faker->randomHtml(1, 1);
            $newOrder->full_name = $faker->name();
            $newOrder->address = $faker->address();
            $newOrder->status = $faker->boolean();
            $newOrder->save();
            $plates = $faker->randomElements([1, 2, 3], 3); //gestisco la tabella pivot
            $quantity = $faker->randomElement([1, 2, 3, 4, 5]); //gestisco la tabella pivot
            $newOrder->plates()->attach($plates, array('quantity' => $quantity)); //gestisco la tabella pivot
        }
    }
}
