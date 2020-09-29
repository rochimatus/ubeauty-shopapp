@extends('back.layouts.app')

@section('title', 'Order Detail - Admin UBeauty')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <h1 class="text-center">Detail Order</h1>
      </div>
    </div>
    
    <div class="card">
        <div class="card-body p-0">
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
            <table class="table">
                <tbody>
                    <tr>
                        <th scope="row" style="width: 20%">ID Order</th>
                        <td style="width: 1%"> : </td>
                        <td colspan="2">{{$order->id}}</td>
                    </tr>
                    <tr>
                        <th scope="row" style="width: 20%">User ID</th>
                        <td style="width: 1%"> : </td>
                        <td colspan="2">{{$order->user_id}}</td>
                    </tr>
                    <tr>
                        <th scope="row" style="width: 20%">Username</th>
                        <td style="width: 1%"> : </td>
                        <td colspan="2">{{$user->name}}</td>
                    </tr>
                    @foreach ($detail_orders as $detail_order)
                    <tr>
                        <th style="width: 20%">Product  |   ID :  {{$detail_order->id}}</th>
                        <td style="width: 1%"> : </td>
                        <td colspan="2">{{$detail_order->name}}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td style="width: 10%">Price</td>
                        <td>: Rp {{$detail_order->price}}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>Count</td>
                        <td>: {{$detail_order->count}}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>Subtotal</td>
                        <td>: Rp {{$detail_order->subtotal}}</td>
                    </tr>
                    @endforeach                    
                    <tr>
                        <th scope="row" style="width: 20%">Payment Status</th>
                        <td style="width: 1%"> : </td>
                        <td colspan="2">{{$order->payment_status}}</td>
                    </tr>
                    <tr>
                        <th scope="row" style="width: 20%">Shipping Status</th>
                        <td style="width: 1%"> : </td>
                        <td colspan="2">{{$order->shipping_status}}</td>
                    </tr>
                    <tr>
                        <th scope="row" style="width: 20%">Address</th>
                        <td style="width: 1%"> : </td>
                        <td colspan="2">{{$order->address}}</td>
                    </tr>
                    <tr>
                        <th scope="row" style="width: 20%">Note</th>
                        <td style="width: 1%"> : </td>
                        <td colspan="2">{{$order->note}}</td>
                    </tr>
                    <tr>
                        <th scope="row" style="width: 20%">Total</th>
                        <td style="width: 1%"> : </td>
                        <td colspan="2">{{$order->total}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Action</th>
                        <td style="width: 1%"></td>
                        <td>
                            <a href="{{route('back.order.edit', $order->id)}}" class="btn btn-warning"><i class="fas fa-pen"></i> Edit</a>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <a href="{{route('back.order.index')}}" class="btn btn-secondary">Back</a>
                        </th>
                        <td colspan="2"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
