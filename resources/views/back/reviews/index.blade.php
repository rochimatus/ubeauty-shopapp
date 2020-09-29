@extends('back.layouts.app')

@section('title', 'Review List - Admin UBeauty')

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
            <h1 class="m-0 text-dark">Reviews</h1>
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
                            <th scope="col" class="text-center" style="width: 12%">ID Review</th>
                            <th scope="col" class="text-center" style="width: 15%">Username</th>
                            <th scope="col" class="text-center" style="width: 20%">Product Name</th>
                            <th scope="col" class="text-center" style="width: 30%">Review</th>
                            <th scope="col" colspan="3">Action</th>
                        </tr>
                        </thead>
                    <tbody>
                        @foreach($reviews as $review)
                        <tr>
                            <td class="text-center">{{$review->id}}</td>
                            <td class="text-center">{{$review->user}}</td>
                            <td class="text-center">{{$review->name}}</td>
                            <td class="text-center">{{$review->text}}</td>
                            <td><a href="{{route('back.review.show', $review->id)}}" class="btn btn-primary"><i class="fas fa-eye"></i> Show</a></td>
                            <td>
                                <form method="post" action = "{{route('back.review.destroy', $review->id)}}">
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
        {{ $reviews->render() }}
    </ul>
</nav>
@endsection
