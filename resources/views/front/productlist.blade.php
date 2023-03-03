@extends('front.layouts.master')
@section('content')

<!-- ========================
       page title 
    =========================== -->
    <section id="pageTitle" class="page-title page-title-layout3 bg-overlay bg-parallax">
      <div class="bg-img"><img src="{{ asset('front/images/page-titles/3.jpg') }}" alt="background"></div>
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-12 col-xl-8">
            <span class="pagetitle__subheading">{{ $categoryName }}</span>
            <h1 class="pagetitle__heading">{{ $subcategoryName }}</h1>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0);">{{ $categoryName }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $subcategoryName }}</li>
              </ol>
            </nav>
          </div><!-- /.col-lg-8 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.page-title -->

    <!-- ========================
        Team
    ========================== -->
    <section id="team" class="team  text-center pt-120 pb-50">
      <div class="container">
        <div class="row">
          @if(!empty($productList))
          @foreach($productList as $product)
          <!-- Member #1 -->
          <div class="col-sm-6 col-md-4 col-lg-4">
            <div class="member">
              <div class="member__img">
                <a href="{{ route('get-product-details', base64_encode( $product->id)) }}" >
                @if(!empty($product->product_images))
                  <img src="{{ $product->product_images[0]->image_url }}" alt="product img" width="350" height="350">
                @else
                  <img src="{{ asset('front/images/No-image-found.jpg') }}" alt="product img" width="350" height="350">
                @endif
                </a>
                <!--<div class="member__hover">
                  <div class="member__content-inner">
                    <ul class="social__icons  justify-content-center list-unstyled">
                      <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                      <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                      <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    </ul>
                  </div>
                </div>-->
              </div><!-- /.member-img -->
              <div class="member__info">
                <h5 class="member__name"><a href="{{ route('get-product-details', base64_encode( $product->id)) }}" >{{ $product->name }}</a></h5>
                <!--<p class="member__desc">Rs. {{ $product->price }}</p>-->
                <p class="member__desc"><a href="{{ route('get-product-details', base64_encode( $product->id)) }}" >View More</a></p>
              </div><!-- /.member-info -->
            </div><!-- /.member -->
          </div><!-- /.col-lg-4 -->
          @endforeach
          @else
          <p class="member__desc">Products are not found!</p>
          @endif
        </div> <!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.team end  -->

@endsection