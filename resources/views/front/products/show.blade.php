@extends('front.layouts.app')
@section('title','Product - UBeauty')

@section('content')

<section class="">
    <div class="container mb-4 whole-wrap">
        <div class="row">
            <div class="col-md-4">
                <img src="{{ asset('uploads/' . $product->image) }}" class="img-fluid rounded">
            </div>
            <div class="col-md-7  offset-1 box_1170">
                <div class="row">
                    <p>Name</p>
                </div>
                <div class="row mb-2">
                    <h3>{{$product->name}}</h3>
                </div> 
                <div class="row"></div>
                <div class="row mb-2">
                    <p>Rp {{$product->price}}</p>
                </div>
                <div class="row mb-2">
                    <p>{{$product->category}}</p>
                </div>
                <div class="row mb-2">
                    <div class="card_area">
                        <form method="post" action="{{route('front.cart.store')}}">
                            <div class="product_count_area">
                                <p>Quantity</p>
                                <div class="product_count d-inline-block">
                                    @csrf
                                        <input type="hidden" name="product_id" value="{{$product->id}}">
                                    <span class="product_count_item inumber-decrement"> <i class="ti-minus"></i></span>
                                    <input class="product_count_item input-number" name="count" type="text" value="1" min="0" max="10">
                                    <span class="product_count_item number-increment"> <i class="ti-plus"></i></span>
                                </div>
                            </div>
                            <div class="add_to_cart">
                                  <button type="submit" class="btn_3">add to cart</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-3">
                <p><b>Description</b></p>
            </div>
            <div class="col-md-9">
                <p>{{$product->detail}}</p>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-3">
                <p><b>Reviews</b></p>
            </div>
            <div class="col-md-9">
                @foreach($reviews as $review)
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">User : {{$review->name}}</h6>
                            <p class="card-text">{{$review->text}}</p>
                        </div>
                    </div>
                    <br>
                @endforeach
            </div>
        </div>
    </div>
</section>

@endsection
