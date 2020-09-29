@extends('front.layouts.app')
@section('title','Order - UBeauty')

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
            <form method="post" action="{{route('front.order.store')}}">
                @csrf
                <div class="form-group">
                    <label class="font-weight-bold">Username : </label>
                    <label>{{$user->name}}</label>
                </div>
                <div class="form-group">
                    <label class="font-weight-bold">Address</label>
                    <textarea id="" rows="3" cols="50" name="address" class="form-control"></textarea>
                </div>
                <label class="font-weight-bold">To Buy Product : </label>
                <div class="container">
                    <div class="cols-md-3">
                        <p hidden>{{$temp = 0}}</p>
                        @foreach ($carts as $cart)
                        <div class="col mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">{{$cart->name}}</h5>
                                    <table class="table card-text">
                                        <tbody>
                                            <tr>
                                                <td>Product Sum: </td>
                                                <td>{{$cart->count}}</td>
                                            </tr>
                                            <tr>
                                                <td>Price: </td>
                                                <td>Rp {{$cart->subtotal}}</td>
                                                <p hidden>{{$temp = $temp + $cart->subtotal}}</p>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="form-group">
                    <label class="font-weight-bold">Total to Pay + Shipment :</label>
                    <label>Rp {{$temp + 5000}}</label>
                    <input type="hidden" name="total" class="form-control" value="{{$temp}}">
                </div>
                <div class="form-group">
                    <label class="font-weight-bold">Note</label>
                    <textarea id="" rows="3" cols="50" name="note" class="form-control"></textarea>
                </div>
                <button type="submit" class="btn btn-primary"><i class="fas fa-plus"></i> Add Order</button>
            </form>
        </div>
    </div>
</div>
@endsection