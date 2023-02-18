<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewContact;
//to do installare email

class OrderController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $plateArray = json_decode($request->cart, true);
        $data = $request->all();

        /* 
 price
 phone
 email
 full_name
 description
 addr   ess
 status
        */
        $validator = Validator::make($data, [
            'full_name' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'phone' => 'required',
            'description' => 'nullable'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        }

        $newOrder = new Order();
        $newOrder->fill($data);
        $newOrder->save();

        foreach ($plateArray as $plate) {
            $newOrder->plates()->attach($plate['id'], array('quantity' => $plate['quantity']));
        }

        //Mail::to('info@l=boolpress.com')->send(new NewContact($newOrder));

        return response()->json([
            'success' => true
        ]);
    }
}
