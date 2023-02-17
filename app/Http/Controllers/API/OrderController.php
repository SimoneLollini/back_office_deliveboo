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
        $allPlates = $request->plates;
        $data = $request->all();

        /* 
          $table->float('price', 5, 2)->required();
            $table->string('phone', 12)->required();
            $table->string('email')->required();
            $table->string('full_name')->required();
            $table->text('description')->nullable();
            $table->string('address')->required();
            $table->boolean('status')->nullable();
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
        foreach ($allPlates as $plate) {
            $newOrder->plates()->attach($plate);
        }
        //$newOrder->plates()->attach($allPlates);
        //Mail::to('info@l=boolpress.com')->send(new NewContact($newOrder));

        return response()->json([
            'success' => true
        ]);
    }
}
