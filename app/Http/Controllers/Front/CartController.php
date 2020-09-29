<?php

namespace App\Http\Controllers\Front;

use Gate;
use DB;
use App\Cart;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->isCustomer();

        $user = Auth::id();
        $carts = DB::table('carts')
                        ->join('products', 'products.id', '=', 'carts.product_id')
                        ->where('carts.user_id', '=', $user)
                        ->orderBy('carts.id', 'desc')
                        ->select('products.image as image', 'products.name as product_name', 'products.price', 'carts.*')
                        ->get();

        return view('front.carts.index', compact('carts'));
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
            'product_id' => 'required',
            'count'=>'required',
        ]);

        $user_id = Auth::id();
        $cart = Cart::where('product_id', $request->product_id)
                    ->where('user_id', $user_id)
                    ->select('*')
                    ->first();

        if($cart) {
            $count = $cart->count;
            $cart->count = $count + $request->count;
        } else{
            $cart = new Cart([
                'user_id' => $user_id,
                'product_id' => $request->get('product_id'),
                'count'=>$request->get('count'),
            ]);
        }

        $cart->save();

        return redirect('/product')->with('success', 'Added to cart!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cart  $cart
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
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->isCustomer();

        $cart = Cart::find($id);
        $cart->delete();

        return redirect('/cart')->with('success', 'One Product has been removed from cart');
    }

    private function isCustomer()
    {
        if(!Gate::allows('customer')){
            abort(404, "Sorry you can't do this");
        }
    }
}
