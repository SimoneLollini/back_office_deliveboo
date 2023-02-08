<?php

namespace Database\Seeders;

use App\Models\Restaurant;
use App\Models\User;
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
        $users = User::all()->pluck('id')->all();
        for ($i = 1; $i < 11; $i++) {
            $newRestaurant = new Restaurant();
            $newRestaurant->cover_image = null;
            $newRestaurant->name = $faker->name();
            $newRestaurant->phone = $faker->e164PhoneNumber();
            $newRestaurant->piva = $faker->numerify('###########');
            $newRestaurant->address = $faker->address();

            $newRestaurant->save();
        }
    }
}
// 