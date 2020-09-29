@extends('back.layouts.app')
@section('title', 'Add Product - Admin UBeauty')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if ($errors->any())
              <div class="card card-primary">
                <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                </ul>
              </div><br />
            @endif
            <form method="post" action="{{route('back.product.store')}}" enctype="multipart/form-data">
                <div class="card-body">
                @csrf
                    <div class="form-group">
                        <label>Name</label>
                        <input type="" name="name" class="form-control" value="{{ old('name') }}">
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input type="number" name="price" class="form-control" value="{{ old('price') }}">
                    </div>
                    <div class="form-group">
                        <label>Category</label>
                        <select class="form-control" name="category_id">
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}" >{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea id="" rows="4" cols="50" name="detail" class="form-control">{{ old('detail') }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-plus"></i> Add Product</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
