@extends('back.layouts.app')

@section('title', 'Edit Order - Admin UBeauty')

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
            <form method="post" action="{{route('back.order.update', $order->id)}}">
                @method('PATCH')
                @csrf
                <br>
                <div class="form-group">
                    <label>Order ID</label>
                    <input type="" name="id" class="form-control" value="{{ $order->id }}" readonly="readonly">
                </div>
                <div class="form-group">
                    <label>User ID</label>
                    <input type="number" name="user_id" class="form-control" value="{{ $order->user_id }}" readonly="readonly">
                </div>
                <div class="form-group">
                    <label>Payment Status</label>
                    <select class="form-control" name="payment_status">
                        <?php $deafult_ps = $order->payment_status; ?>
                        <option value="waiting" <?php echo($deafult_ps == 'waiting')? 'selected="selected"':''; ?>>Waiting</option>
                        <option value="paid" <?php echo($deafult_ps == 'paid')? 'selected="selected"':''; ?>>Paid</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Shipping Status</label>
                    <select class="form-control" name="shipping_status">
                        <?php $deafult_ss = $order->shipping_status; ?>
                        <option value="watiing" <?php echo($deafult_ss == 'waiting')? 'selected="selected"':''; ?>>Waiting</option>
                        <option value="in_transit" <?php echo($deafult_ss == 'in_transit')? 'selected="selected"':''; ?>>In Transit</option>
                        <option value="delivered" <?php echo($deafult_ss == 'delivered')? 'selected="selected"':''; ?>>Delivered</option>
                        <option value="received" <?php echo($deafult_ss == 'received')? 'selected="selected"':''; ?>>Received</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-info"><i class="fas fa-check"></i> Save</button>
            </form>
        </div>
    </div>
</div>
@endsection
