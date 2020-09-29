<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function landingpage()
    {
        $categories = Category::all();
        $products = Product::all(); 

        return view('welcome', compact('categories', 'products'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function search(Request $request)
    {
        $q = '';

        if($request != null){
            $q = ($request->q != null) ? $request->q : '';
        }

        $products = Product::addSelect(['category' => Category::select('name')
            ->whereColumn('id', 'products.id')
            ->orWhereColumn('categories.name', 'like', '%'.$q.'%')
        ])
        ->where('name', 'like', '%'.$q.'%')
        ->orderBy($sortBy, $orderBy)
        ->simplePaginate(20);

        // $products = Category::select('category' => 'name')
        //                     ->addSelect(['name' => Product::select('name')
        //                         ->whereColumn('category_id', 'categories.id')
        //                         ->orWhereColumn('categories.name', 'like', '%'.$q.'%')
        //                         ])
        //                     ->where('name', 'like', '%'.$q.'%')
        //                     ->orderBy($sortBy, $orderBy)
        //                     ->paginate(20);

        return view('front.products.index', compact('products', 'q', 'orderBy', 'sortBy'));
    }
}
