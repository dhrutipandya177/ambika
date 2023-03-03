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
            <h1 class="pagetitle__heading">Gallery</h1>
            <!--<h1 class="pagetitle__heading">Serving Impressive List Of Long Term Clients</h1>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Company</a></li>
                <li class="breadcrumb-item active" aria-current="page">Leadership</li>
              </ol>
            </nav>-->
          </div><!-- /.col-lg-8 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.page-title -->


    <!-- ========================
        Team
    ========================== -->
    <section id="team" class="team  text-center pt-120 pb-50">
      <div class="container gallary-inr">
       @if(!empty($gallery))
        @foreach($gallery as $galleryInfo)
        <h2 class="heading__title">{{ $galleryInfo->name }}</h2>
        <div class="row">
          <!-- Member #1 -->
          @if(!empty($galleryInfo->gallary_images))
          @foreach($galleryInfo->gallary_images as $galleryImage)
          <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="member">
              <div class="member__img gal-bx">
                <a href="{{ $galleryImage->image_url }}" rel="lightbox[{{$galleryInfo->name}}]"><img src="{{ $galleryImage->image_url }}" alt="gallery img" style="width:234px; height:156px;"></a>
              </div><!-- /.member-img -->
            </div><!-- /.member -->
          </div><!-- /.col-lg-4 -->
          @endforeach
          @else
            <p>Gallery Image Not Found.</p>
          @endif
        </div> <!-- /.row -->
        @endforeach
      @else
        <p>Gallery Not Found.</p>
      @endif
      </div><!-- /.container -->
    </section><!-- /.team end  -->
    
@endsection