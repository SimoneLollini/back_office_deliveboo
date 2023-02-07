<?php

namespace Database\Seeders;

use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 1; $i < 21; $i++) {
            $newUser = new User();
            $newUser->name = Str::random(10);
            $newUser->email = Str::random(10) . '@gmail' . 'com';
            $newUser->password = 'password';
            $newUser->save();

            $user = $newUser::find($i);

            $newRestaurant = new Restaurant();
            $newRestaurant->name = $faker->name();
            $newRestaurant->phone = $faker->e164PhoneNumber();
            $newRestaurant->piva = $faker->numerify('###########');
            $newRestaurant->address = $faker->address();
            $user->restaurant()->save($newRestaurant);
        }
    }
}
