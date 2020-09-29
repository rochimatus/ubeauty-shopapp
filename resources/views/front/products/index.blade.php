@extends('front.layouts.app')
@section('title','Product - UBeauty')

@section('content')


<!-- product list part start-->
<section class="section_padding">
  <div class="container">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
    <div class="row ">
        <div class="row">
            <div class="col-md-3">
                <div class="product_sidebar">
                    <div class="single_sedebar">
                        <form action="{{ route('front.product.index') }}">
                            <input type="hidden" name="filter" id="inputCategory">
                            <input type="hidden" name="sortBy" id="inputSort">
                            <input type="hidden" name="orderBy" id="inputAcdc">
                            <button type="submit" class="btn btn-primary">Filter</button>
                        </form>
                    </div>                              
                    <div class="single_sedebar">
                        <div class="select_option sort_by_product">
                            <div class="select_option_list" id="filter-category">Filter by Category <i class="right fas fa-caret-down"></i> </div>
                            <div class="select_option_dropdown" id="option-category">
                                <p><a class="cobaCategory">All</a></p>
                                @foreach($categories as $category)
                                <p><a class="cobaCategory" data-id ="{{$category->id}}" >{{$category->name}}</a></p>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="single_sedebar">
                        <div class="select_option sort_by_product">
                            <div class="select_option_list" id="filter-sort">Sort by Product<i class="right fas fa-caret-down"></i> </div>
                            <div class="select_option_dropdown">
                                @foreach(['id', 'name', 'price'] as $col)
                                <p><a class="cobaSort" data-id="{{$col}}">{{$col}}</a></p>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="single_sedebar">
                        <div class="select_option sort_by_product">
                            <div class="select_option_list" id="filter-acdc">Order by<i class="right fas fa-caret-down"></i> </div>
                            <div class="select_option_dropdown">
                                @foreach(['asc', 'desc'] as $order)
                                <p><a class="cobaAcdc" data-id="{{$order}}">{{$order}}</a></p>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
              <div class="product_list">
                  <div class="row">
                    @foreach($products as $product)
                      <div class="col-lg-4 col-sm-4">
                          <div class="single_product_item">
                              <img src="{{ asset('uploads/' . $product->image) }}" alt="responsive-image" class="img-fluid rounded" style="width: 100%">
                              <h3> <a href="{{route('front.product.show', $product->id)}}">{{$product->name}}</a> </h3>
                              <p>Rp {{$product->price}}</p>
                          </div>
                      </div>
                    @endforeach
                  </div>
                  {{ $products->links() }}
              </div>
          </div>
      </div>
    </div>
  </div>
</section>
<!-- product list part end-->

@endsection

