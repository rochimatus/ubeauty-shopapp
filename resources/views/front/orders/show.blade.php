@extends('front.layouts.app')
@section('title','Order - UBeauty')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                </ul>
              </div><br />
            @endif
            <div class="container">
                <div class="row row-cols-1 row-cols-md-1">
                    <div class="col mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-text">Mohon lakukan konfirmasi pembayaran ke nomor: +6273214689792, dengan melampirkan bukti transfer ke rekening #0000</h5>
                            </div>
                        </div>
                        <br>
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Order ID     : {{$order->id}}</h5>
                                <table class="table card-text">
                                    <tbody>
                                        <tr>
                                            <td>Ordered At</td>
                                            <td colspan="2">: {{$order->created_at}}</td>
                                        </tr>
                                        <tr>
                                            <td>Payment Status</td>
                                            <td colspan="2">: {{$order->payment_status}}</td>
                                        </tr>
                                        <tr>
                                            <td>Shipping Status</td>
                                            <td colspan="2">: {{$order->shipping_status}}</td>
                                        </tr>
<!--                                         <tr>
                                            <td>Products: </td>
                                            <td></td>
                                        </tr> -->
                                        <p hidden>{{$id = 1}}</p>
                                        @foreach ($detail_orders as $detail_order)
                                        <tr>
                                            <td style="width: 30%">Product #{{$id++}}</td>
                                            <td colspan="2">: {{$detail_order->name}}</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td style="width: 10%">Price</td>
                                            <td>: Rp {{$detail_order->price}}</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>Count</td>
                                            <td>: {{$detail_order->count}}</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>Subtotal</td>
                                            <td>: Rp {{$detail_order->subtotal}}</td>
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <td>Total + Shipping Price</td>
                                            <td colspan="2">: Rp {{$order->total}}</td>
                                        </tr>
                                        <tr>
                                            <td>Note</td>
                                            <td colspan="2">: {{$order->note}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                @if(($order->shipping_status=='received') && !($order->shipping_status=='reviewed'))
                                <form method="post" action="{{route('front.review.store')}}">
                                    @csrf
                                    <input type="hidden" name="order_id" value="{{$order->id}}">
                                    <div class="form-group">
                                        <label>Review</label>
                                        <textarea id="" rows="3" cols="50" name="review" class="form-control"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Add Review</button>
                                </form>
                                @endif
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>

        </div>
    </div>
    <button onclick="goBack()" class="btn btn-primary">Back</button>   
</div>
@endsection
