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
            <h1 class="pagetitle__heading">{{ $productInfo->name }}</h1>
            <!--<h1 class="pagetitle__heading">Serving Impressive List Of Long Term Clients</h1>-->
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0);">{{ $productInfo->category_info->name }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('get-category-products-list',base64_encode($productInfo->subcategory_info->id)) }}">{{ $productInfo->subcategory_info->name }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $productInfo->name }}</li>
              </ol>
            </nav>
          </div><!-- /.col-lg-8 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.page-title -->

<!-- =========================
      portfolio carousel layout 2
      =========================== -->
   
    <section id="portfolioCarouselLayout2" class="portfolio-carousel portfolio-carousel-layout2 pt-120 pb-100 bg-gray">
      <div class="container product-details">
        @if(!empty($productInfo->product_images))
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="carousel owl-carousel carousel-dots" data-slide="3" data-slide-md="2" data-slide-sm="1"
              data-autoplay="true" data-nav="false" data-dots="true" data-space="30" data-loop="true" data-speed="800">
              @foreach($productInfo->product_images as $productImage)
              <div class="portfolio-item">
                <div class="portfolio__img">
                  <a href="{{ $productImage->image_url }}" rel="lightbox['product']"><img src="{{ $productImage->image_url }}" alt="product img" width="250" height="250"></a>
                </div><!-- /.portfolio-img -->
                <!--<div class="portfolio__content">
                  <h4 class="portfolio__title"><a href="#">Floride Chemicals Factory</a></h4>
                  <div class="portfolio__cat">
                    <a href="#">Chemicals</a><a href="#">oil & Gas</a>
                  </div>
                </div>-->
              </div><!-- /.portfolio-item -->
              @endforeach
            </div><!-- /.carousel -->
          </div><!-- /.col-lg-12 -->
        </div><!-- /.row -->
        @endif

        <div class="row heading heading-2 mb-40">
          <div class="col-sm-12 col-md-12 col-lg-12">
            <h5 class="text__block-title">Description</h5>
            <div class="product_desc">{!! html_entity_decode($productInfo->description) !!}</div>
            <!--<p class="heading__desc">{!! html_entity_decode($productInfo->description) !!}</p>
            <p class="heading__desc">{!! htmlspecialchars_decode($productInfo->description) !!}</p>-->
            <!--<p class="member__desc">Rs. {{ $productInfo->price }}</p>-->
          </div><!-- /heading -->
        </div><!-- /.row -->

        <div class="row">
        	<div class="col-sm-12 col-md-12 col-lg-12">
	        	<div class="text__block mb-40">
	              <h5 class="text__block-title">Product Specification</h5>
	              <div class="features-list mb-30">
	              <div class="row">
	                
	                  
	                  @if(!empty($productInfo->product_heights))
	                  <div class="col-sm-12 col-md-12 col-lg-2">
		                  <div class="feature-item1 feature-list-item">
		                    <div class="feature__content">
		                      <h4 class="feature__title">Height</h4>
		                      	<ul class="feature__desc">
		                      		@foreach($productInfo->product_heights as $height)
		                      		<li>{{ $height->height }} {{ $height->unit }}</li>	
		                      		@endforeach
		                      	</ul>	
		                    </div><!-- /.feature-content -->
		                  </div><!-- /.feature-item -->
	                  </div><!-- /.col-lg-6 -->
	                  @endif
	                  
	                  @if(!empty($productInfo->product_widths))
	                  <div class="col-sm-12 col-md-12 col-lg-2">
		                  <div class="feature-item feature-list-item">
		                    <div class="feature__content">
		                      <h4 class="feature__title">Width</h4>
		                      	<ul class="feature__desc">
		                      		@foreach($productInfo->product_widths as $width)
		                      		<li>{{ $width->width }} {{ $width->unit }}</li>	
		                      		@endforeach
		                      	</ul>	
		                    </div><!-- /.feature-content -->
		                  </div><!-- /.feature-item -->
	                  </div><!-- /.col-lg-6 -->
	                  @endif

	                  @if(!empty($productInfo->product_lengths))
	                  <div class="col-sm-12 col-md-12 col-lg-2">
		                  <div class="feature-item feature-list-item">
		                    <div class="feature__content">
		                      <h4 class="feature__title">Length</h4>
		                      	<ul class="feature__desc">
		                      		@foreach($productInfo->product_lengths as $length)
		                      		<li>{{ $length->length }} {{ $length->unit }}</li>	
		                      		@endforeach
		                      	</ul>	
		                    </div><!-- /.feature-content -->
		                  </div><!-- /.feature-item -->
	                  </div><!-- /.col-lg-6 -->
	                  @endif

	                  @if(!empty($productInfo->product_thickness))
	                  <div class="col-sm-12 col-md-12 col-lg-2">
		                  <div class="feature-item feature-list-item">
		                    <div class="feature__content">
		                      <h4 class="feature__title">Thickness</h4>
		                      	<ul class="feature__desc">
		                      		@foreach($productInfo->product_thickness as $thickness)
		                      		<li>{{ $thickness->thickness }} {{ $thickness->unit }}</li>	
		                      		@endforeach
		                      	</ul>	
		                    </div><!-- /.feature-content -->
		                  </div><!-- /.feature-item -->
	                  </div><!-- /.col-lg-6 -->
	                  @endif

	                  @if(!empty($productInfo->product_sizes))
	                  <div class="col-sm-12 col-md-12 col-lg-2">
		                  <div class="feature-item feature-list-item">
		                    <div class="feature__content">
		                      <h4 class="feature__title">Size</h4>
		                      	<ul class="feature__desc">
		                      		@foreach($productInfo->product_sizes as $size)
		                      		<li>{{ $size->size }} {{ $size->unit }}</li>	
		                      		@endforeach
		                      	</ul>	
		                    </div><!-- /.feature-content -->
		                  </div><!-- /.feature-item -->
	                  </div><!-- /.col-lg-6 -->
	                  @endif

	                  @if(!empty($productInfo->product_colors))
	                  <div class="col-sm-12 col-md-12 col-lg-2">
		                  <div class="feature-item feature-list-item">
		                    <div class="feature__content">
		                      <h4 class="feature__title">Colors</h4>
		                      	<ul class="feature__desc">
		                      		@foreach($productInfo->product_colors as $color)
		                      		<li>{{ $color->color }}</li>	
		                      		@endforeach
		                      	</ul>	
		                    </div><!-- /.feature-content -->
		                  </div><!-- /.feature-item -->
	                  </div><!-- /.col-lg-6 -->
	                  @endif	
	                
	              </div><!-- /.row -->
	            </div>
	            </div><!-- /.text-block -->
        	</div>	
        </div>	

        @if($productInfo->profile_drawing_image!="")
        <div class="row">
        	<div class="col-sm-12 col-md-12 col-lg-12">
	        	<div class="text__block mb-40">
	              <h5 class="text__block-title">Profile Drawing</h5>
	              <img src="{{ $productInfo->profile_drawing_image_url }}" />
	            </div><!-- /.text-block -->
        	</div>	
        </div>
        @endif

        @if($productInfo->order_drawing_image!="")
        <div class="row">
        	<div class="col-sm-12 col-md-12 col-lg-12">
	        	<div class="text__block mb-40">
	              <h5 class="text__block-title">Order Drawing</h5>
	              <img src="{{ $productInfo->order_drawing_image_url }}" />
	            </div><!-- /.text-block -->
        	</div>	
        </div>
        @endif

        
      </div><!-- /.container -->
    </section><!-- /.portfolio carousel -->
    

@endsection