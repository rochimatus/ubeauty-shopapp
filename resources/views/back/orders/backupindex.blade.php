@extends('back.layouts.app')

@section('title', 'Order List')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-0">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Orders</h1>
          </div>
          <!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="card">
        <div class="card-header">
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center" style="width: 10%">ID Order</th>
                            <th scope="col" class="text-center" style="width: 9%">User ID</th>
                            <th scope="col" style="width: 15%">Payment Status</th>
                            <th scope="col" style="width: 15%">Shipping Status</th>
                            <th scope="col" class="text-center" style="width: 10%">Total</th>
                            <th scope="col" class="text-center">Created At</th>
                            <th scope="col" colspan="3" >Action</th>
                        </tr>
                        </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <td class="text-center">{{$order->id}}</td>
                            <td class="text-center">{{$order->user_id}}</td>
                            <td>{{$order->payment_status}}</td>
                            <td>{{$order->shipping_status}}</td>
                            <td class="text-center">Rp {{$order->total}}</td>
                            <td class="text-center">{{$order->created_at}}</td> 
                            <td><a href="{{route('back.order.show', $order->id)}}" class="btn btn-primary"><i class="fas fa-eye"></i> Show</a></td>
                            <td><a href="{{route('back.order.edit', $order->id)}}" class="btn btn-warning"><i class="fas fa-pen"></i> Edit</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
