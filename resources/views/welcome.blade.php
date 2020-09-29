@extends('layouts.app')
@section('title','UBeauty')

@section('content')

<!-- slider Area Start -->
<div class="slider-area ">
    <!-- Mobile Menu -->
    <div class="slider-active">
        <div class="single-slider slider-height" data-background="front/img/hero/1welcome2.jpg">
            <div class="container">
                <div class="row d-flex align-items-center justify-content-between">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 d-none d-md-block">
                        <div class="hero__img" data-animation="bounceIn" data-delay=".4s">
                            <img src="front/img/hero/hero_man.png" alt="">
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-5 col-md-5 col-sm-8">
                        <div class="hero__caption">
                            <span data-animation="fadeInRight" data-delay=".4s">HOT Discount</span>
                            <h1 data-animation="fadeInRight" data-delay=".6s">Summer <br> Collection</h1>
                            <p data-animation="fadeInRight" data-delay=".8s">Best Skin Care By 2020!</p>
                            <!-- Hero-btn -->
                            <div class="hero__btn" data-animation="fadeInRight" data-delay="1s">
                                <a href="{{route('front.product.index')}}" class="btn hero-btn">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- slider Area End-->

<!-- Latest Products Start -->
<section class="latest-product-area section-padding">
    <div class="container">
        <div class="row product-btn d-flex justify-content-end align-items-end">
            <!-- Section Tittle -->
            <div class="col-xl-4 col-lg-5 col-md-5">
                <div class="section-tittle mb-30">
                    <h2>Latest Products</h2>
                </div>
            </div>
            <div class="col-xl-8 col-lg-7 col-md-7">
            </div>
        </div>
        <!-- Nav Card -->
        <div class="tab-content" id="nav-tabContent">
            <!-- card one -->
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <div class="row">
                    <?php $i = 0; ?>
                    @foreach($categories as $category)
                    <?php if ($i == 4) {
                        break;
                    } ?>
                    <div class="col-xl-3 col-lg-3 col-md-6">
                        <div class="single-product mb-60">
                            <div class="product-img">
                                <img src = "front/img/categori/category_serum.jpg" class="img-fluid">
                                <div class="new-product">
                                    <span>New</span>
                                </div>
                            </div>
                            <div class="product-caption">
                                <h4><a href="#">{{$category->name}}</a></h4>
                            </div>
                        </div>
                    </div>
                    <?php $i++; ?>
                    @endforeach
                </div>
            </div>
        <!-- End Nav Card -->
        </div>
    </div>
</section>
<!-- Latest Products End -->

<!-- Best Products -->
<section class="padding-bottom">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="container list-category">
                    <div class="list-group">
                        @foreach($categories as $category)
                        <a href="#" class="list-group-item list-group-item-action">{{$category->name}}</a>
                        @endforeach
                    </div>
                </div>           
            </div>
            <div class="col-md-9">
                <div class="section-tittle mb-30">
                    <h2>Product Promo</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Best Products End -->

<!-- Best Product Start -->
<section class="padding-bottom">
    <div class="best-product-area lf-padding" >
       <div class="product-wrapper bg-height" style="background-image: url('front/img/categori/card.png')">
            <div class="container position-relative">
                <div class="row justify-content-between align-items-end">
                    <div class="product-man position-absolute  d-none d-lg-block">
                        <img src="front/img/categori/card-man.png" alt="">
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-2 d-none d-lg-block">
                        <div class="vertical-text">
                            <span>Gurlz</span>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-8">
                        <div class="best-product-caption">
                            <h2>Find The Best Product<br> from Our Shop</h2>
                            <p>Designers who are interesten creating state ofthe.</p>
                            <a href="{{route('front.product.index')}}" class="black-btn">Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>
       </div>
       <!-- Shape -->
       <div class="shape d-none d-md-block">
           <img src="assets/img/categori/card-shape.png" alt="">
       </div>
    </div>
</section>
<!-- Best Product End-->

<!-- All Products -->
<section class="padding-bottom latest-product-area">   
    <div class="container">
        <div class="row">
            @foreach($products as $product)
            <div class="col-xl-3 col-lg-3 col-md-6">
                <div class="single-product mb-60">
                    <div class="product-img">
                        <img src = "{{ asset('uploads/' . $product->image) }}" class="img-fluid rounded">
                    </div>
                    <div class="product-caption">
                        <h4><a href="#">{{$product->name}}</a></h4>
                    </div>
                    <div class="price">
                        <ul>
                            <li>Rp {{$product->price}}</li>
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- All Products End -->

<!-- Gallery Start-->
<section class="padding-bottom">
    <div class="gallery-wrapper lf-padding">
        <div class="gallery-area">
            <div class="container-fluid">
                <div class="row justify-content-md-center">
                    <div class="col-md-2">
                        <div class="img-responsive">
                            <img src="front/img/hero/itzy-1.jpg" class="img-fluid rounded" alt="">
                        </div> 
                    </div>
                    <div class="col-md-2">
                        <div class="img-responsive">
                            <img src="front/img/hero/itzy-2.jpg" class="img-fluid rounded" alt="">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="img-responsive">
                            <img src="front/img/hero/itzy-3.jpg" class="img-fluid rounded" alt="">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="img-responsive">
                            <img src="front/img/hero/itzy-4.jpg" class="img-fluid rounded" alt="">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="img-responsive">
                            <img src="front/img/hero/itzy-5.jpg" class="img-fluid rounded" alt="">
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Gallery End-->
@endsection
