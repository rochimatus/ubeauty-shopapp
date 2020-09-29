@extends('back.layouts.app')

@section('title', 'Product Detail - Admin UBeauty')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <h1 class="text-center">Detail Product</h1>
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
                        <th scope="row">ID</th>
                        <td style="width: 1%"> : </td>
                        <td colspan="2">{{$product->id}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Name</th>
                        <td style="width: 1%"> : </td>
                        <td colspan="2">{{$product->name}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Price</th>
                        <td style="width: 1%"> : </td>
                        <td colspan="2">Rp {{$product->price}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Category</th>
                        <td style="width: 1%"> : </td>
                        <td colspan="2">{{$category->name}}</td>
                    </tr>                    
                    <tr>
                        <th scope="row">Image</th>
                        <td style="width: 1%"> : </td>
                        <td><img src = "{{ asset('uploads/' . $product->image) }}" style="max-height:300px"></td>
                    </tr>
                    <tr>
                        <th scope="row" style="width: 20%">Description</th>
                        <td style="width: 1%"> : </td>
                        <td colspan="2">{{$product->detail}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Action</th>
                        <td style="width: 1%"></td>
                        <td>
                            <form method="post" action = "{{ $product->id }}">
                                <a href="{{route('back.product.edit', $product->id)}}" class="btn btn-warning"><i class="fas fa-pen"></i> Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</button>
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <a href="{{route('back.product.index')}}" class="btn btn-secondary">Back</a>
                        </th>
                        <td colspan="2"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
