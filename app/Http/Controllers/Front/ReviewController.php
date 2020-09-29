<?php

namespace App\Http\Controllers\Front;

use App\Order;
use Auth;
use DB;
use Gate;
use App\Review;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $this->isCustomer();

        $request->validate([
            'order_id'=>'required',
            'review'=>'required',
        ]);

        $user = Auth::user();

        $products = DB::table('detail_orders')
                            ->where('order_id', $request->order_id)
                            ->select('product_id')
                            ->get();

        compact('products');
        //var_dump($products_id);

        foreach ($products as $product){
            $review = new Review([
                'user_id' => $user->id,
                'product_id'=> $product->product_id,
                'text' => $request->review,
            ]);

            $review->save();
        }

        $order = Order::find($request->order_id);
        $order->shipping_status = 'reviewed';
        $order->save();
        
        return redirect('/order')->with('success', 'Success adding review');
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

    private function isCustomer()
    {
        if(!Gate::allows('customer')){
            abort(404, "Sorry you can't do this");
        }
    }
}
