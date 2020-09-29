<?php

namespace App\Http\Controllers\Back;

use App\Product;
use App\Category;
use DB;
use Gate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = DB::table('products')
                        ->join('categories', 'products.category_id', '=', 'categories.id')
                        ->select('products.*', 'categories.name as category')
                        ->orderBy('products.id', 'desc')
                        ->paginate(15);

        return view('back.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!Gate::allows('admin')){
            abort(404, "Sorry you can't do this");
        }

        $categories = Category::all();
        return view('back.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'price'=>'required | numeric',
            'category_id' => 'required',
            'image' => 'required | mimes:jpeg,jpg,bmp,png',
            'detail' => 'required',
        ]);
  
        $fileName = time().'.'.$request->image->extension();  
   
        $request->image->move(public_path('uploads'), $fileName);


        $product = new Product([
            'name' => $request->get('name'),
            'price'=>$request->get('price'),
            'category_id' => $request->get('category_id'),
            'image' => $fileName,
            'detail' => $request->get('detail'),
        ]);

        $product->save();
        return redirect('/admin/product')->with('success', 'Product saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        $category = Category::find($product->category_id);

//dd($product);

        return view('back.products.show', compact('product', 'category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!Gate::allows('admin')){
            abort(404, "Sorry you can't do this");
        }

        $product = Product::find($id);
        $categories = Category::all();
        //dd($product, $categories);
        return view('back.products.edit', compact('product', 'categories'));
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
            'name'=>'required',
            'price'=>'required | numeric',
            'category_id' => 'required',
            'image' => 'mimes:jpeg,jpg,bmp,png',
            'detail' => 'required',
        ]);
        if($request->image == null){
            $product = Product::find($id);
            $fileName = $product->image;
        }else{
            $fileName = time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads'), $fileName);
        }

        Product::where('id', $id)
                ->update([
                    'name' => $request->name,
                    'price' => $request->price,
                    'category_id' => $request->category_id,
                    'image' => $fileName,
                    'detail' => $request->detail
                ]);

        return redirect('/admin/product')->with('success', 'Product Updated!');
    }

    /**DELETE
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);
        return redirect('/admin/product')->with('Success', 'Product Deleted!');
    }
}
