<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Plate;
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
        $plates = ['Pasta', 'Pizza', 'Lasagne', 'Risotto', 'Polenta', 'Polpette', 'Arancine', 'Bistecca', 'Hamburger'];
        foreach ($plates as $plate) {
            $newPlate = new Plate();
            $newPlate->name = $plate;
            //$newPlate->description = $faker->randomHtml(1, 1);
            //$newPlate->ingredients = $faker->randomHtml(0, 1);
            //image
            $newPlate->price = $faker->randomFloat(2, 5, 60);
            $newPlate->visibility = $faker->boolean();
            //$newPlate->type = $faker->randomHtml(0, 1);
            //$newPlate->restaurant_id = $faker->numberBetween(0, 100);
            $newPlate->save();
        }
    }
}
