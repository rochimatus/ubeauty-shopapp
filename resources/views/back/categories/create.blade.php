@extends('back.layouts.app')

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
            <form method="post" action="{{route('back.category.store')}}">
                @csrf
                <br>
                <div class="form-group">
                    <label>Category Name</label>
                    <input type="" name="name" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary"><i class="fas fa-plus"></i> Add Category</button>
            </form>
        </div>
    </div>
</div>
@endsection
