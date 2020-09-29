<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use DB;
use Gate;
use Auth;
use App\Cart;
use App\Order;
use App\DetailOrder;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $user;

    public function index()
    {
        $this->isCustomer();

        $user = Auth::user();
        $orders = Order::where('user_id', $user->id)->orderBy('id', 'desc')->paginate(10);

        return view('front.orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->isCustomer();

        $user = Auth::user();
        //mengambil data produk yang ada di cart milik user yang sedang login sekarang
        //serta menghitung subtotal untuk tiap produknya
        $carts = DB::table('products')
                    ->join('carts', 'products.id', '=', 'carts.product_id')
                    ->where('carts.user_id', '=', $user->id)
                    ->orderByDesc('carts.updated_at')
                    ->select(DB::raw('carts.count as count, products.name, products.price, carts.count * products.price as subtotal'))
                    ->get();

        return view('front.orders.create', compact('carts', 'user'));
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
            'address'=>'required',
            'total'=>['required', 'numeric'],
        ]);

        if($request->note == null)
            $request->note = '';
        
        $ongkir = 5000;
        $user = Auth::user();
        //ambil semua yang di dalam keranjang
        $carts = DB::table('products')
            ->join('carts', 'products.id', '=', 'carts.product_id')
            ->where('carts.user_id', '=', $user->id)
            ->orderByDesc('carts.updated_at')
            ->select(DB::raw('carts.count as count, products.id, carts.count * products.price as subtotal'))
            ->get();
        compact('carts');

        //buat order baru
        $order = new Order([
            'user_id' => $user->id,
            'address' => $request->address,
            'total' => $request->total + $ongkir,
            'note' => $request->note,
        ]);

        if($order->save()){
            //hapus yang di dalam keranjang
            Cart::where('user_id', $user->id)->delete();

            //buat detail order tiap produk yg di keranjang            
            foreach ($carts as $cart){
                $detailOrder = new DetailOrder([
                    'order_id' => $order->id,
                    'product_id'=>$cart->id,
                    'count' => $cart->count,
                    'subtotal' => $cart->subtotal,
                ]);

                $detailOrder->save();
            }
        }
        return redirect('/order')->with('success', 'Order succed!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->isCustomer();

        $order = Order::find($id);

        $detail_orders = DB::table('detail_orders')
            ->join('products', 'products.id', '=', 'detail_orders.product_id')
            ->where('detail_orders.order_id', $id)
            ->select('products.name', 'products.price', 'detail_orders.*')
            ->get();

        return view('front.orders.show', compact('order', 'detail_orders'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
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
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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

    private function isCustomer()
    {
        if(!Gate::allows('customer')){
            abort(404, "Sorry you can't do this");
        }
    }
}
