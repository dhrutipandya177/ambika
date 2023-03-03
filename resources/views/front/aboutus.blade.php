@extends('front.layouts.master')
@section('content')

<!-- ========================
       page title 
    =========================== -->
    <section id="pageTitle" class="page-title page-title-layout1 bg-overlay bg-parallax">
      <div class="bg-img"><img src="{{ asset('front/images/page-titles/1.jpg') }}" alt="background"></div>
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-12 col-xl-7">
            <h1 class="pagetitle__heading">About Us</h1>
            <p class="pagetitle__desc">We are Ambica Enterprise leading name in all type of Industrial product Supplier.</p>
            <!--<a href="#" class="btn btn__primary btn__hover2">
              <i class="icon-arrow-right"></i><span>Our Services</span>
            </a>-->
          </div><!-- /.col-xl-7 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.page-title -->

    <!-- ========================
      About Layout 2
    =========================== -->
    <section id="aboutLayout2" class="about about-layout2 pt-120 pb-80">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-12 col-xl-7">
            <div class="heading heading-2 mb-50">
              <span class="heading__subtitle">High quality Services For Industries!</span>
              <h2 class="heading__title">Ambica Enterprise Is an Industrial product supplier with  Full Range Of Services In The Sphere of industries.</h2>
            </div><!-- /heading -->
            <div class="row">
              <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="about__text mr-30">
                  <p>To develop our quality strengths we have established a corporate mandate to maintain strong core values reflect our company's honesty.</p>
                </div>
                <!--<img src="assets/images/about/singnture.png" alt="singnture" class="signature">-->
              </div><!-- /.col-lg-6 -->
              <div class="col-sm-6 col-md-6 col-lg-6">
                <p>We are Ambica Enterprise leading name in all type of Industrial product Supplier. Our beginning was by marketing roof sheets of leading Indian brands and our own brands.</p>
                <p>Now we are associated with many leading indian brands and our own brands. Now we are associated with many leading brands in Industrial products.</p>
                <!--<a href="#" class="btn btn__secondary mt-20">
                  <i class="icon-arrow-right"></i><span>Have A Project!</span>
                </a>-->
              </div><!-- /.col-lg-6 -->
            </div><!-- /.row -->
          </div><!-- /.col-xl-7 -->
          <div class="col-sm-12 col-md-10 col-lg-8 col-xl-5 position-static">
            <div class="row mt-50 about__imgs-container">
              <div class="col-7">
                <div class="about__img">
                  <img src="{{ asset('front/images/about/2.jpg') }}" alt="about" class="img-fluid w-100">
                  <div class="cta__banner">
                    <div class="cta__icon">
                      <i class="icon-factory-2"></i>
                    </div>
                    <h5 class="cta__title mb-0">Building The Future, Restoring The Past</h5>
                  </div><!-- /.cta__banner -->
                </div><!-- /.about-img -->
              </div><!-- /.col-7 -->
              <div class="col-5">
                <div class="about__img mt-40">
                  <img src="{{ asset('front/images/about/3.jpg') }}" alt="about" class="img-fluid w-100">
                </div><!-- /.about-img -->
              </div><!-- /.col-5 -->
            </div><!-- /.row -->
          </div><!-- /.col-xl-5 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.About Layout 2 -->

    <!-- =====================
        Features numberd 
      ======================== -->
    <section id="featuresNumberd" class="features-numberd pt-0">
      <div class="container aboutus">
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="carousel owl-carousel carousel-dots" data-slide="5" data-slide-md="3" data-slide-sm="1"
              data-autoplay="true" data-nav="false" data-dots="true" data-space="30" data-loop="true" data-speed="700">
              <div class="feature-numberd-item">
                <!--<img src="{{ asset('front/images/icons/honesty.png') }}" alt="honesty" class="img-fluid w-100">-->
                 <div class="feature__numberd-item-icon">
                  <!--<i class="icon-eco"></i>-->
                  <span class="aboutus-info"><img src="{{ asset('front/images/icons/honesty.png') }}" alt="Honesty" class="img-fluid"></span>
                 </div>
                <h3 class="feature__numberd-item-number">01</h3>
                <h4 class="feature__numberd-item-title">Honesty</h4>
              </div><!-- /.feature-numberd-item -->
              <div class="feature-numberd-item">
                <div class="feature__numberd-item-icon">
                  <!--<i class="icon-worker"></i>-->
                  <span class="aboutus-info"><img src="{{ asset('front/images/icons/transparent.png') }}" alt="Transparency" class="img-fluid"></span>
                </div>
                <h3 class="feature__numberd-item-number">02</h3>
                <h4 class="feature__numberd-item-title">Transparency</h4>
              </div><!-- /.feature-numberd-item -->
              <div class="feature-numberd-item">
                <div class="feature__numberd-item-icon">
                  <!--<i class="icon-management"></i>-->
                  <span class="aboutus-info"><img src="{{ asset('front/images/icons/commitment.png') }}" alt="Commitment" class="img-fluid"></span>
                </div>
                <h3 class="feature__numberd-item-number">03</h3>
                <h4 class="feature__numberd-item-title">Commitment</h4>
              </div><!-- /.feature-numberd-item -->
              <div class="feature-numberd-item">
                <div class="feature__numberd-item-icon">
                  <!--<i class="icon-parcel"></i>-->
                  <span class="aboutus-info"><img src="{{ asset('front/images/icons/quality.png') }}" alt="Quality" class="img-fluid"></span>
                </div>
                <h3 class="feature__numberd-item-number">04</h3>
                <h4 class="feature__numberd-item-title">Quality Assurance</h4>
              </div><!-- /.feature-numberd-item -->
              <div class="feature-numberd-item">
                <div class="feature__numberd-item-icon">
                  <!--<i class="icon-gear"></i>-->
                  <span class="aboutus-info"><img src="{{ asset('front/images/icons/customer.png') }}" alt="Customer Satisfaction" class="img-fluid"></span>
                </div>
                <h3 class="feature__numberd-item-number">05</h3>
                <h4 class="feature__numberd-item-title">Customer Satisfaction</h4>
              </div><!-- /.feature-numberd-item -->
            </div> <!-- /.carousel -->
          </div><!-- /.col-lg-12 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.Features-numberd -->



    <!-- ========================
      About Layout 2
    =========================== -->
    {{--
    <section id="aboutLayout2" class="about about-layout2 pt-120 pb-80">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-12 col-xl-5">
            <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-12">
                <p>We are Ambica Enterprise leading name in all type of Industrial product Supplier. Our beginning was by marketing roof sheets of leading Indian brands and our own brands.</p>
                <p>Now we are associated with many leading indian brands and our own brands. Now we are associated with many leading brands in Indutrial products.</p>
              </div><!-- /.col-lg-6 -->
            </div><!-- /.row -->
          </div><!-- /.col-xl-7 -->
          <div class="col-sm-12 col-md-12 col-lg-7">
            <div class="contact__panel-wrap">
                <div class="contact__panel contact__panel-layout2">
                  @include('front.inquiry')
                </div>
            </div> 
          </div>       
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.About Layout 2 -->
    --}}

    
@endsection