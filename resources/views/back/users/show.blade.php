@extends('back.layouts.app')

@section('title', 'User Detail - Admin UBeauty')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <h1 class="text-center">Detail User</h1>
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
                        <th scope="row" style="width: 15%">ID</th>
                        <td style="width: 1%"> : </td>
                        <td colspan="2">{{$user->id}}</td>
                    </tr>
                    <tr>
                        <th scope="row" style="width: 15%">Name</th>
                        <td style="width: 1%"> : </td>
                        <td colspan="2">{{$user->name}}</td>
                    </tr>
                    <tr>
                        <th scope="row" style="width: 15%">Phone</th>
                        <td style="width: 1%"> : </td>
                        <td colspan="2">{{$user->phone}}</td>
                    </tr>
                    <tr>
                        <th scope="row" style="width: 15%">Email</th>
                        <td style="width: 1%"> : </td>
                        <td colspan="2">{{$user->email}}</td>
                    </tr>
                    <tr>
                        <th scope="row" style="width: 15%">Role</th>
                        <td style="width: 1%"> : </td>
                        <td colspan="2">{{$user->role}}</td>
                    </tr>
                    <tr>
                        <th scope="row" style="width: 15%">Action</th>
                        <td style="width: 1%"></td>
                        <td>
                            <form method="post" action = "{{ $user->id }}">
                                <a href="{{route('back.user.edit', $user->id)}}" class="btn btn-warning"><i class="fas fa-pen"></i> Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</button>
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <a href="{{route('back.user.index')}}" class="btn btn-secondary">Back</a>
                        </th>
                        <td colspan="2"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
