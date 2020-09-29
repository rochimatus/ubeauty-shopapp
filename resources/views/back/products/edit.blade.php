@extends('back.layouts.app')

@section('title', 'Edit Product - Admin UBeauty')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                </ul>
              </div><br />
            @endif
            <!-- <form method="post" action="{{route('back.product.edit', '$product->id')}}"> -->
            <form method="post" action="/admin/product/{{ $product->id }}" enctype="multipart/form-data">
                @method('PATCH')
                @csrf
                <br>
                <div class="form-group">
                    <label>Name</label>
                    <input type="" name="name" class="form-control" value="{{ $product->name }}">
                </div>
                <div class="form-group">
                    <label>Price</label>
                    <input type="number" name="price" class="form-control" value="{{ $product->price }}">
                </div>
                <div class="form-group">
                    <label>Category</label>
                    <select class="form-control" name="category_id">
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}" @if($category->id == $product->category_id) selected @endif >{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
<!--                     <label>Image</label> -->
                    <div class="row">
                        <div class="col col-md-4">
                            <img src="{{asset('uploads/' . $product->image)}}" style="height: 200px">
                        </div>             
                        <div class="col" style="margin-top: 10%">
                            <label>Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>

                    </div>
                </div>
                <div class="form-group">
                    <label>Text</label>
                    <textarea id="" rows="4" cols="50" name="detail" class="form-control"> {{ $product->detail }}</textarea>
                </div>
                <button type="submit" class="btn btn-info"><i class="fas fa-check"></i> Save</button>
            </form>
        </div>
    </div>
</div>
@endsection
