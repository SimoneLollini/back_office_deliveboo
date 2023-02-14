<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index()
    {
        return response()->json([
            'success' => true,
            'results' => Restaurant::with(['types', 'plates'])->orderBy('id')->paginate(6)
        ]);
    }

    public function show($id)
    {

        $restaurant = Restaurant::with('types', 'plates')->where('id', $id)->first();

        if ($restaurant) {
            return response()->json([
                'success' => true,
                'results' => $restaurant
            ]);
        } else {
            return response()->json([
                'success' => false,
                'results' => 'Restaurant Not Found'
            ]);
        }
    }

    public function types($types)
    {

        $types = explode("+", $types);

        $restaurants = Restaurant::with('types', 'plates')->get();

        $filtered_restaurants = [];

        foreach ($restaurants as $restaurant) {

            $restaurant_types = $restaurant->types;

            $names = [];

            foreach ($restaurant_types as $value) {

                $name = $value->name;

                array_push($names, $name);
            }

            $result = array_intersect($names, $types);

            if (count($result) === count($types)) {

                array_push($filtered_restaurants, $restaurant);
            }
        };


        if ($filtered_restaurants) {
            return response()->json([
                'success' => true,
                'results' => $filtered_restaurants
            ]);
        } else {
            return response()->json([
                'success' => false,
                'results' => 'Questa tipologia di ristorante non esiste o non risulta abbinato alcun ristorante'
            ]);
        }
    }
}
