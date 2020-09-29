@extends('back.layouts.app')

@section('title', 'User List - Admin UBeauty')

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
            <h1 class="m-0 text-dark">Users</h1>
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
                            <th scope="col" style="width: 10%">ID</th>
                            <th scope="col" style="width: 30%">Username</th>
                            <th scope="col" style="width: 15%">Role</th>
                            <th scope="col">Action</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->role}}</td>
                            <td><a href="{{route('back.user.show', $user->id)}}" class="btn btn-primary"><i class="fas fa-eye"></i> Show</a></td>
                            <td><a href="{{route('back.user.edit', $user->id)}}" class="btn btn-warning"><i class="fas fa-pen"></i> Edit</a></td>
                            <td>
                                <form method="post" action = "{{route('back.user.destroy', $user->id)}}">
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
        {{ $users->render() }}
    </ul>
</nav>
@endsection
