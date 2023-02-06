<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Plate;
use App\Models\Restaurant;
use App\Models\Type;
use Faker\Generator as Faker;

class PlateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $types = Type::all()->pluck('id')->all();
        $restaurants = Restaurant::all()->pluck('id')->all();
        $lorem = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.';
        $plates = ['Pasta', 'Pizza', 'Lasagne', 'Risotto', 'Polenta', 'Polpette', 'Arancine', 'Bistecca', 'Hamburger'];
        foreach ($plates as $key => $plate) {
            $newPlate = new Plate();
            $newPlate->name = $plate;
            $newPlate->description = $lorem;
            $newPlate->ingredients = $lorem;
            //image
            $newPlate->price = $faker->randomFloat(2, 5, 60);
            $newPlate->visibility = $faker->boolean();
            $newPlate->type = $faker->randomElement($types);
            $newPlate->restaurant_id = $faker->randomElement($restaurants);
            $newPlate->save();
        }
    }
}
