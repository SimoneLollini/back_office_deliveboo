<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Plate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Models\Restaurant;
use Illuminate\Support\Arr;

class OrderController extends Controller
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

        // $plates = Plate::find($user_id);

        $plates = Restaurant::find(19)->plates()->get();

        // dd($plates);

        $ordered = [];

        // solo un piatto disponibile
        // $order_plate = DB::table('order_plate')->where('plate_id', '=', $plates->id)->get();

        // dd($order_plate);

        foreach ($plates as $plate) {

            // dd($plate);
            $order_plate = DB::table('order_plate')->where('plate_id', '=', $plate->id)->get();

            array_push($ordered, $order_plate);
        }

        $ordered = Arr::collapse($ordered);


        // dd($ordered);

        $all_orders = Order::all();

        // $my_orders = $orders->where('id', '=', $order_plate['order_id']);

        $orders = [];

        foreach ($ordered as $order) {

            // dd($order);
            $my_orders = Order::where('id', $order->order_id);

            if (!in_array($my_orders, $orders)) {

                array_push($orders, $my_orders);
            }
        }

        // dd($orders);
        $collection = collect($orders)->sortDesc()->paginate(6);

        return view('Admin.Orders.index', compact('collection', 'user_restaurant'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
