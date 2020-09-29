@extends('back.layouts.app')

@section('title', 'Product List -  Admin UBeauty')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
        <div class="row mb-0">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Products</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">
                <a href="{{route('back.product.create')}}" class="btn btn-primary"><i class="fas fa-plus"></i> Add Product</a></li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    
    <div class="card">
        <div class="card-header">
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Category</th>
                            <th scope="col">Action</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td style="width: 5%">{{$product->id}}</td>
                            <td style="width: 25%">{{$product->name}}</td>
                            <td style="width: 15%">Rp {{$product->price}}</td>
                            <td style="width: 15%">{{$product->category}}</td>
                            <td style="width: 10%"><a href="{{route('back.product.show', $product->id)}}" class="btn btn-primary"><i class="fas fa-eye"></i> Show</a></td>
                            <td style="width: 10%"><a href="{{route('back.product.edit', $product->id)}}" class="btn btn-warning"><i class="fas fa-pen"></i> Edit</a></td>
                            <td style="width: 15%">
                                <form method="post" action = "{{route('back.product.destroy', $product->id)}}">
                                    @csrf
                                    @method('DELETE') 
                                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<nav>
    <ul class="pagination justify-content-end" style="padding-right: 50px">
        {{ $products->render() }}
    </ul>
</nav>
@endsection
