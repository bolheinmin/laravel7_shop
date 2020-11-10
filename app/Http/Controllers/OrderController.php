<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pending_orders = Order::where('status',0)->get();
        $confirmed_orders = Order::where('status',1)->get();

        return view('order.index',compact('pending_orders','confirmed_orders'));

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
        
        $myOrder = json_decode($request->order);
        $notes = $request->notes;
        $date = date('Y-m-d');
        $totalAmount = 0;
        $orderno = "ord-".uniqid();

        foreach($myOrder as $row)
        {
            if($row->discount != null || $row->discount != 0)
            {
                $totalAmount += $row->discount * $row->qty;
            }
            else
            {
                $totalAmount += $row->price * $row->qty;
            }
        }

        $order = new Order();
        $order->orderno = $orderno;
        $order->order_date = $date;
        $order->total_amount = $totalAmount;
        $order->notes = $notes; 
        $order->user_id = Auth::id();
        $order->save();

        foreach($myOrder as $row)
        {
            $order->items()->attach($row->id,
            [
                'qty'=>$row->qty
            ]);
        }

        return "success";

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('order.show',compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
    public function confirm($id)
    {
        $order = Order::find($id);
        $order->status = 1;
        $order->save();

        return redirect()->route('order.index');
    }

    public function cancle($id)
    {
        $order = Order::find($id);
        $order->delete();

        return redirect()->route('order.index');
    }

}
