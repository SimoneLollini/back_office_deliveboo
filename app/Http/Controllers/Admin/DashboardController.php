<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Type;

class DashboardController extends Controller
{
    public function index()
    {
        $types = Type::all();
        $user_restaurant = Restaurant::find(Auth::id());
        return view('dashboard', compact('user_restaurant', 'types'));
    }
}