@extends('back.layouts.app')

@section('title', 'Edit User - Admin UBeauty')

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
            <form method="post" action="{{route('back.user.update', $user->id)}}">
            <!-- <form method="post" action="/admin/users/{{ $user->id }}"> -->
                @method('PATCH')
                @csrf
                <br>
                <div class="form-group">
                    <label>ID</label>
                    <input type="" name="id" class="form-control" value="{{ $user->id }}" readonly="readonly">
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input type="" name="name" class="form-control" value="{{ $user->name }}" readonly="readonly">
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input type="" name="phone" class="form-control" value="{{ $user->phone }}">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="" name="email" class="form-control" value="{{ $user->email }}">
                </div>
                <div class="form-group">
                    <label>Role</label>
                    <input type="" name="role" class="form-control" value="{{ $user->role }}" readonly="readonly">
                </div>
                <button type="submit" class="btn btn-info"><i class="fas fa-check"></i> Save</button>
            </form>
        </div>
    </div>
</div>
@endsection
