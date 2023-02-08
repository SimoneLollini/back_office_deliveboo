<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\type;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            'italiano', 'internazionale', 'cinese', 'giapponese', 'messicano', 'indiano', 'pesce', 'carne',
            'pizza', 'vegano', 'altro'
        ];

        foreach ($types as $type) {
            $new_type = new Type();
            $new_type->name = $type;
            $new_type->save();
        }
    }
}
