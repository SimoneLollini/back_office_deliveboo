<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            $newOrder = new Order();
            $newOrder->price = 5;
            $newOrder->phone = '3201239439';
            $newOrder->description = 'lorem ipsum qualcosa';
            $newOrder->full_name = 'lorem ipsum qualcosa';
            $newOrder->adress = 'via del procinto 57, Milano';
            $newOrder->status = true;
            $newOrder->save();
        }
    }
}
