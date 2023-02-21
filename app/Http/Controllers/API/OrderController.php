<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Mail\Mail\ConfirmationMail;
use App\Mail\Mail\NewContact as MailNewContact;
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

        $validator = Validator::make($data, [
            'full_name' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'phone' => 'required|min:10|max:12',
            'description' => 'nullable',
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

        Mail::to('admin@laravel.it')->send(new MailNewContact($newOrder));

        Mail::to('user@mail.com')->send(new ConfirmationMail());

        return response()->json([
            'success' => true
        ]);
    }
}
