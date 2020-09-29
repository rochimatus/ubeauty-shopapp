@extends('front.layouts.app')
@section('title','Cart - UBeauty')

@section('content')
<section class="cart_area section_padding">
    <div class="container">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
      <div class="cart_inner">
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Product</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Total</th>
                <th scope="col">Option</th>
              </tr>
            </thead>
            <tbody>
                <p hidden>{{$temp = 0}}</p>
                @foreach($carts as $cart)
              <tr>
                <td>
                  <div class="media">
                    <div class="d-flex">
                      <img src="{{ asset('uploads/' . $cart->image) }}" alt="" />
                    </div>
                    <div class="media-body">
                      <p>{{$cart->product_name}}</p>
                    </div>
                  </div>
                </td>
                <td>
                   <p hidden>{{$temp = $temp + ($cart->price * $cart->count)}}</p>
                  <h5>Rp{{$cart->price}}</h5>
                </td>
                <td>
                    <h5>{{$cart->count}}</h5>
                </td>
                <td>
                  <h5>Rp{{$cart->price * $cart->count}}</h5>
                </td>                       
                <td>
                    <form action="{{route('front.cart.destroy', $cart->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-icon">
                            <i class="fas fa-trash-alt icon-col"></i>
                        </button>
                    </form>
                </td>
              </tr>
                @endforeach
              <tr>
                <td></td>
                <td></td>
                <td>
                  <h5>Subtotal</h5>
                </td>
                <td>
                  <h5>Rp {{$temp}}</h5>
                </td>
                <td></td>
              </tr>
            </tbody>
          </table>
          <div class="checkout_btn_inner float-right">
            <a class="btn_1" href="{{route('front.product.index')}}">Continue Shopping</a>
            <a class="btn_1 checkout_btn_1" href="{{route('front.order.create')}}" type="submitx">Proceed to checkout</a>
          </div>
        </div>
      </div>
  </section>
@endsection
