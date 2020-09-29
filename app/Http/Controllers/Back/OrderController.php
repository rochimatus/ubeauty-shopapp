<?php

namespace App\Http\Controllers\Back;

use Gate;
use DB;
use App\Order;
use App\Product;
use App\User;
use App\DetailOrder;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::orderBy('id', 'desc')->paginate(15);
        //dd($orders);
        return view('back.orders.index', compact('orders'));
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
        $order = Order::find($id);

        $detail_orders = DB::table('detail_orders')
            ->join('products', 'products.id', '=', 'detail_orders.product_id')
            ->where('detail_orders.order_id', $id)
            ->select('products.name', 'products.id','products.price','detail_orders.*')
            ->get();

        $user = User::find($order->user_id);

        return view('back.orders.show', compact('order','user','detail_orders'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::find($id);
        return view('back.orders.edit', compact('order'));
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
        $request->validate([
            'id' => 'required',
            'user_id' => 'required',
            'payment_status' => 'required',
            'shipping_status' => 'required',
        ]);
        // dd($request);
        //$order = Order::find($id);
        // $order->payment_status = $request->payment_status;
        // $order->shipping_status = $request->shipping_status;
        // $order->save();

        Order::where('id', $id)
                ->update([
                    'id' => $request->input('id'),
                    'user_id' => $request->input('user_id'),
                    'payment_status' => $request->input('payment_status'),
                    'shipping_status' => $request->input('shipping_status')
                ]);
        return redirect('/admin/order')->with('success', 'Detail Order Telah Dirubah!');
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
