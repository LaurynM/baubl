<?php

namespace baubl\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function ship(Request $request)
    {
        Mail::to('lauryn@thecodefix.com')->send(new OrderShipped($request));
        echo 'email sent!';
    }
    
    public function create(Request $request)
    {
        $order = $this->create([
        // return Order::create([
            "length" => $length-> input('length'),
            "cord" => $cord->input('cord'),
            "value" => $value->input('value'),
            "weight" => $weight->input('weight'),
            "colors" => $colors->input('colors')
        ]);
    }
    public function store(Request $request)
    {
        // Validate the request...

        $order = new Order;

        $order->length = $request->length;
        $order->cord = $request->cord;
        $order->value = $request->value;
        $order->weight = $request->weight;
        $order->colors = $request->name;

        $order->save();
    }

    public function show()
    {
        return view('emails.mailme');
    }
}
