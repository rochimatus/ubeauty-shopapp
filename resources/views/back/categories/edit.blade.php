@extends('back.layouts.app')

@section('title', 'Edit Category - Admin UBeauty')

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
            <form method="post" action="{{route('back.category.update', $category->id)}}">
                @method('PUT')
                @csrf
                <br>
                <div class="form-group">
                    <label>Name</label>
                    <input type="" name="name" class="form-control" value="{{$category->name}}">
                </div>
                <button type="submit" class="btn btn-info"><i class="fas fa-check"></i> Save</button>
            </form>
        </div>
    </div>
</div>
@endsection
