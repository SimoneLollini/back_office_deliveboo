<?php

namespace Database\Seeders;

use App\Models\Restaurant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 10; $i++) {
            $newRestaurant = new Restaurant();
            $newRestaurant->name = $faker->name();
            $newRestaurant->phone = $faker->e164PhoneNumber();
            $newRestaurant->piva = $faker->numerify('###########');
            $newRestaurant->address = $faker->address();
            $newRestaurant->save();
        }
    }
}
