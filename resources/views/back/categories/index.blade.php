@extends('back.layouts.app')

@section('title', 'Category List - Admin UBeauty')

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
            <h1 class="m-0 text-dark">Categories</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">
                <a href="{{route('back.category.create')}}" class="btn btn-primary"><i class="fas fa-plus"></i> Add Category</a></li>
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
                            <th scope="col" style="width: 10%">ID</th>
                            <th scope="col" style="width: 20%">Category</th>
                            <th scope="col">Action</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                    <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            <td><a href="{{route('back.category.edit', $category->id)}}" class="btn btn-warning"><i class="fas fa-pen"></i> Edit</a></td>
                            <td>
                                <form method="post" action="{{route('back.category.destroy', $category->id)}}" class="d-inline">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</button>
                                </form>
                            </td>
                            <td scope="col"></td>
                            <td scope="col"></td>
                            <td scope="col"></td>
                            <td scope="col"></td>
                            <td scope="col"></td>
                            <td scope="col"></td>
                            <td scope="col"></td>
                            <td scope="col"></td>
                            <td scope="col"></td>
                            <td scope="col"></td>
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
        {{ $categories->render() }}
    </ul>
</nav>

@endsection