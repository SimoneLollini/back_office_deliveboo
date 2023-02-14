<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Plate;
use Illuminate\Http\Request;

class PlateController extends Controller
{
    public function index()
    {
        return response()->json([
            'success' => true,
            'results' => Plate::all()
        ]);
    }
}
