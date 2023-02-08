<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRestaurantRequest;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Validator;
use App\Models\Type;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { {
            $restaurants = Restaurant::orderByDesc('id')->get();
            return view('admin.restaurants.index', compact('restaurants'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();
        return view('admin.restaurants.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRestaurantRequest $request)
    {
        $user_restaurant = Restaurant::where('user_id', Auth::user()->id)->exists();
        if ($user_restaurant) {
            return to_route('admin.dashboard')->with('message', "Non puoi aggiungere un altro ristorante!");
        } else {
            $val_data = $request->validated();
            $val_data['user_id'] = Auth::user()->id;
            $restaurant = Restaurant::create($val_data);
            $restaurant->types()->attach($request['type_id']);
        }

        return to_route('admin.dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant)
    {
        return view('admin.restaurants.show', compact('restaurant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {
        return view('admin.restaurants.edit', compact('restaurant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($request, Restaurant $restaurant)
    {

        return to_route('admin.restaurants.index')->with('message', "$restaurant->title update successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        if ($restaurant->id) {
            Storage::delete($restaurant->id);
        }
        $restaurant->delete();
        return to_route('admin.restaurants.index')->with('message', "$restaurant->name deleted successfully");
    }
}
