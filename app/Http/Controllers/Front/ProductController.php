<?php

namespace App\Http\Controllers\Front;

use App\Product;
use App\Category;
use DB;
use Gate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // print_r($_GET);die;
        $sortBy = 'id';
        $orderBy = 'desc';
        $q = '';
        $filter = '';

        if($request != null){
            $sortBy = ($request->sortBy != null) ? $request->sortBy : 'id';
            $orderBy = ($request->orderBy != null) ? $request->orderBy : 'asc';
            $q = ($request->q != null) ? $request->q : '';
            $filter = ($request->filter != null) ? $request->filter : '';

        }

        $products = Product::addSelect(['category' => Category::select('name')
            ->whereColumn('id', 'products.id')
        ])
        ->where('name', 'like', '%'.$q.'%')
        ->whereHas('category', function ($query) use ($filter){
            $query->where('id', 'like', '%'.$filter.'%');
        })
        ->orderBy($sortBy, $orderBy)
        ->paginate(20);

        $categories = Category::all();
        return view('front.products.index', compact('products', 'categories','q', 'orderBy', 'sortBy', 'filter'));
        
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
        $product = DB::table('products')
                        ->join('categories', 'products.category_id', '=', 'categories.id')
                        ->where('products.id', '=', $id)
                        ->select('products.*', 'categories.name as category')
                        ->first();

        $reviews = DB::table('reviews')
                        ->join('users', 'users.id', '=', 'reviews.user_id')
                        ->where('reviews.product_id', $id)
                        ->select('reviews.text', 'users.name as name')
                        ->get();

        return view('front.products.show', compact('product', 'reviews'));
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

    public function search(Request $request)
    {
        //
    }

}
