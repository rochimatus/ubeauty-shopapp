@extends('front.layouts.app')
@section('title','Order - UBeauty')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">            
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="row">
                <div class="container">
                    <div class="cols-md-1">
                        @foreach ($orders as $order)
                        <div class="col mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Order ID : {{$order->id}} | Ordered at : {{$order->created_at}}</h5>
                                    <table class="table card-text">
                                        <tbody>
                                            <tr>
                                                <td style="width: 20%">Payment Status</td>
                                                <td>: {{$order->payment_status}}</td>
                                            </tr>
                                            <tr>
                                                <td>Shipping Status</td>
                                                <td>: {{$order->shipping_status}}</td>
                                            </tr>
                                            <tr>
                                            <td>Total</td>
                                                <td>: {{$order->total}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <a href="{{route('front.order.show', $order->id)}}" class="btn btn-primary">Detail</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <nav>
                <ul class="pagination justify-content-end" style="padding-right: 50px">
                    {{ $orders->render() }}
                </ul>
            </nav>
        </div>
    </div>
</div>
@endsection
