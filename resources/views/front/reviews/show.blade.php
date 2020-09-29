@extends('front.layouts.app')

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
            <table class="table">
                <tbody>
                    <tr>
                        <th scope="row">ID</th>
                        <td>{{$product->id}}</th>
                    </tr>
                    <tr>
                        <th scope="row">Name</th>
                        <td>{{$product->name}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Price</th>
                        <td>{{$product->price}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Category</th>
                        <td>{{$product->category}}</td>
                    </tr>                    <tr>
                        <th scope="row"></th>
                        <td>{{$product->name}}</td>
                    </tr>      
                    <tr>
                        <th scope="row">Description</th>
                        <td>{{$product->detail}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Action</th>
                        <td>
                            <form method="post" action = "{{route('front.cart.store')}}">
                                @csrf
                                <div class="container">
                                    <input type="hidden" name="product_id" value="{{$product->id}}">
                                </div>

                                <div class="container">
                                    <label>Jumlah</label>
                                    <input type="number" name="count" value="1">
                                </div>

                                <button type="submit" class="btn btn-primary">Add to Cart</button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
