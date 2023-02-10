<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePlateRequest;
use App\Http\Requests\UpdatePlateRequest;
use App\Models\Plate;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PlateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $auth_user = Auth::user()->id;
        $user_restaurant = Restaurant::find(Auth::id());
        $user_id = Restaurant::find($auth_user)->user_id;
        $plates = DB::table('plates')->where('restaurant_id', '=', $user_id)->orderByDesc('id')->paginate(4);
        return view('Admin.Plates.index', compact('plates', 'user_restaurant'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_restaurant = Restaurant::find(Auth::id());

        return view('Admin.Plates.create', compact('user_restaurant'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePlateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePlateRequest $request)
    {

        //dd($request);
        $val_data = $request->validated();
        if ($request->hasFile('plate_image')) {
            $plate_image = Storage::disk('public')->put('uploads', $val_data['plate_image']);
            $val_data['plate_image'] = $plate_image;
        }

        if (array_key_exists("visibility", $val_data) and $val_data['visibility'] = 1) {
            $val_data['visibility'] = true;
        } else {
            $val_data['visibility'] = false;
        }
        $val_data['restaurant_id'] = Auth::user()->id;

        $plate = Plate::create($val_data);
        return to_route('admin.plates.index')->with('message', "Piatto aggiunto correttamente");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Plate $plate
     * @return \Illuminate\Http\Response
     */
    public function show(Plate $plate)
    {

        $user_restaurant = Restaurant::find(Auth::id());
        return view('admin.plates.show', compact('plate', 'user_restaurant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Plate $plate
     * @return \Illuminate\Http\Response
     */
    public function edit(Plate $plate)
    {
        $user_restaurant = Restaurant::find(Auth::id());
        return view('admin.plates.edit', compact('plate', 'user_restaurant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\UpdatePlateRequest  $request
     * @param  App\Models\Plate $plate
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePlateRequest $request, Plate $plate)
    {
        $user_restaurant = Restaurant::find(Auth::id());
        $val_data = $request->validated();
        if ($request->hasFile('plate_image')) {
            if ($plate->plate_image) {
                Storage::delete($plate->plate_image);
            }
            $plate_image = Storage::disk('public')->put('uploads', $val_data['plate_image']);
            $val_data['plate_image'] = $plate_image;
        }

        if (array_key_exists("visibility", $val_data) and $val_data['visibility'] = 1) {
            $val_data['visibility'] = true;
        } else {
            $val_data['visibility'] = false;
        }


        $plate->update($val_data);
        return to_route('admin.plates.index')->with('message', "Piatto aggiornato correttamente");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\Models\Plate $plate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plate $plate)
    {
        if ($plate->cover_image) {
            Storage::delete($plate->cover_image);
        }


        $plate->delete();
        return to_route('admin.plates.index')->with('message', "Piatto cancellato correttamente");
    }
}
