<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePlateRequest;
use App\Http\Requests\UpdatePlateRequest;
use App\Models\Plate;
use Illuminate\Http\Request;

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
        $plates = DB::table('plates')->paginate(5);

        return view('Admin.Plates.index', compact('plates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Plates.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param   App\Http\Requests\StorePlateRequest $request
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
        $plate = Plate::create($val_data);

        //Many to many relationship
        // if ($request->has('technologies')) {
        //     $plate->technologies()->attach($val_data['technologies']);
        // }


        return to_route('admin.plates.index')->with('message', "Project added successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  App\Models\Plate $plate
     * @return \Illuminate\Http\Response
     */
    public function show(Plate $plate)
    {
        return view('admin.plates.show', compact('plate'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Plate $plate
     * @return \Illuminate\Http\Response
     */
    public function edit(Plate $plate)
    {
        return view('admin.plates.edit', compact('plate'));
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
        $val_data = $request->validated();
        if ($request->hasFile('plate_image')) {
            if ($plate->plate_image) {
                Storage::delete($plate->plate_image);
            }
            $plate_image = Storage::disk('public')->put('uploads', $val_data['plate_image']);
            $val_data['plate_image'] = $plate_image;
        }


        $plate->update($val_data);

        //Many to many relationship
        //if ($request->has('technologies')) {
        //$plate->technologies()->sync($val_data['technologies']);
        //} else {
        //$plate->technologies()->sync([]);
        //}

        return to_route('admin.plates.index')->with('message', "Project updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\Models\Plate $plate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plate $plate)
    {
        //
    }
}