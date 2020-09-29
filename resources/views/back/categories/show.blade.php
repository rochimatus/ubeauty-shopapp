@extends('layouts.app')

@section('title', 'Category Detail - Admin UBeauty')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <table class="table">
                <tbody>
                    <tr>
                        <th scope="row">ID</th>
                        <td>{{$category->id}}</th>
                    </tr>
                    <tr>
                        <th scope="row">Name</th>
                        <td>{{$category->name}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Action</th>
                        <td>
                            <a href="{{route('back.category.edit', $category->id)}}" class="btn btn-warning">Edit</a>
                            <a href="{{route('back.category.destroy', $category->id)}}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
