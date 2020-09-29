@extends('back.layouts.app')

@section('title', 'Review Detail - Admin UBeauty')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <h1 class="text-center">Detail Review</h1>
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
                        <th scope="row" style="width: 20%">ID Review</th>
                        <td style="width: 1%"> : </td>
                        <td colspan="2">{{$review->id}}</td>
                    </tr>
                    <tr>
                        <th scope="row" style="width: 20%">User ID</th>
                        <td style="width: 1%"> : </td>
                        <td colspan="2">{{$review->user_id}}</td>
                    </tr>
                    <tr>
                        <th scope="row" style="width: 20%">Username</th>
                        <td style="width: 1%"> : </td>
                        <td colspan="2">{{$user->name}}</td> 
                    </tr>
                    <tr>
                        <th scope="row" style="width: 20%">Product ID</th>
                        <td style="width: 1%"> : </td>
                        <td colspan="2">{{$review->product_id}}</td>
                    </tr>
                    <tr>
                        <th scope="row" style="width: 20%">Product Name</th>
                        <td style="width: 1%"> : </td>
                        <td colspan="2">{{$product->name}}</td>
                    </tr>
                    <tr>
                        <th scope="row" style="width: 20%">Review</th>
                        <td style="width: 1%"> : </td>
                        <td colspan="2">{{$review->text}}</td>
                    </tr>
                    <tr>
                        <th scope="row" style="width: 20%">Created At</th>
                        <td style="width: 1%"> : </td>
                        <td colspan="2">{{$review->created_at}}</td>
                    </tr>
                    <tr>
                        <th scope="row" style="width: 20%">Updated At</th>
                        <td style="width: 1%"> : </td>
                        <td colspan="2">{{$review->updated_at}}</td>
                    </tr>
                    <tr>
                        <th scope="row" style="width: 20%">Action</th>
                        <td style="width: 1%"></td>
                        <td>
                            <form method="post" action = "{{ $review->id }}">
                                @csrf
                                @method('DELETE') 
                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</button>
                            </form>
                        </td>
                    </tr><tr>
                        <th scope="row">
                            <a href="{{route('back.order.index')}}" class="btn btn-secondary">Back</a>
                        </th>
                        <td colspan="2"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
