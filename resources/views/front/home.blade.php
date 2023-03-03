@extends('front.layouts.master')
@section('content')

<!-- ============================
        Slider
    ============================== -->
    <!--<section id="slider1" class="slider slider-1">-->
    <section id="sliderlayout2" class="slider slider-layout2">  
      <div class="carousel owl-carousel carousel-arrows carousel-dots" data-slide="1" data-slide-md="1"
        data-slide-sm="1" data-autoplay="true" data-nav="true" data-dots="true" data-space="0" data-loop="true"
        data-speed="3000" data-transition="fade" data-animate-out="fadeOut" data-animate-in="fadeIn">
        @if(!empty($homeSlider))
          @foreach($homeSlider as $slide)
            <div class="slide-item align-v-h bg-overlay">
              <div class="bg-img"><img src="{{ $slide->image_url }}" alt="slide img"></div>
              <div class="container">
                <div class="row">
                  <div class="col-sm-12 col-md-12 col-lg-12 col-xl-9">
                    <div class="slide__content">
                      <h2 class="slide__title">{{ $slide->name }}</h2>
                      <p class="slide__desc">{{ $slide->description }}</p>
                      @if($slide->button1!="")
                      <a href="{{ $slide->button1_link }}" class="btn btn__primary btn__hover2 mr-30">
                        <i class="icon-arrow-right"></i><span>{{ $slide->button1 }}</span>
                      </a>
                      @endif

                      @if($slide->button2!="")
                      <a href="{{ $slide->button2_link }}" class="btn btn__white btn__bordered">
                        <i class="icon-arrow-right"></i><span>{{ $slide->button2 }}</span>
                      </a>
                      @endif
                    </div><!-- /.slide-content -->
                  </div><!-- /.col-xl-9 -->
                </div><!-- /.row -->
              </div><!-- /.container -->
            </div><!-- /.slide-item -->
          @endforeach
        @endif
    </section><!-- /.slider -->
    
    <!-- ========================
      About layout 1
    =========================== -->
    <section id="aboutLayout1" class="about about-layout1 pt-70 pb-0">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-6">
            <div class="about__img">
              <img src="{{ asset('front/images/about/1.jpg') }}" alt="about" class="img-fluid">
              <div class="cta__banner">
                <div class="cta__icon">
                  <i class="icon-factory-2"></i>
                </div>
                <h5 class="cta__title">Building The Future, Restoring The Past</h5>
                <p class="cta__desc">One of the World's leading Industry Corporation!</p>
                <a href="#" class="btn btn__white btn__link">
                  <i class="icon-arrow-right"></i>
                </a>
              </div>
            </div><!-- /.about__img -->
          </div><!-- /.col-lg-6 -->
          <div class="col-sm-12 col-md-12 col-lg-6">
            <div class="heading heading-2 mt-50 mb-30">
              <span class="heading__subtitle">High quality Services For Industries!</span>
              <h2 class="heading__title">Ambica Enterprise Is an Industrial product supplier with  Full Range Of Services In The Sphere of industries.</h2>
              <p class="heading__desc">To develop our quality strengths we have established a corporate mandate to maintain strong core values reflect our company's honesty.</p>
            </div><!-- /heading -->
            <!--<a href="#" class="btn btn__secondary mr-30">
              <i class="icon-arrow-right"></i><span>Have A Project!</span>
            </a>
            <img src="assets/images/about/singnture.png" alt="singnture" class="signature">-->
          </div><!-- /.col-lg-6 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section>

    <!-- ========================
      About Layout 2
    =========================== -->
    <section id="aboutLayout2" class="about about-layout2 pt-120 pb-80">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="heading heading-2 text-center mb-40">
              <span class="heading__subtitle">We are Ambica Enterprise leading name in all type of Industrial product Supplier.</span>
              <h2 class="heading__title">Profile</h2>
            </div>
            <div class="row">
              <p class="text__block-desc">Established in the year <b>2020</b>, we “<b>Ambica Enterprise</b>” are a prominent firm that is engaged in <b>manufacturing</b> & supplying a wide range of Industrial Product Like <b>MS/GI Pipe Fittings, PPGI/PPGL Profile sheet, Structure Less Dom, UPVC Profile Roofing Sheet, Spanish Tile Profile sheet, PPGI/PPGL  Tile Profile sheet, Turbo Air Ventilator, Roofing Accessories<b> etc.</p>
              
              <p>In addition, we also provide <b>Fabrication structure Work</b> and to our client. which is executed as per the specifications and requirements of the client in order to achieve the desired results. Under the leadership of “<b>Mr. Viren Parmar</b>” <b>(MD)</b>, we have gained a remarkable and strong position in the market.</p>

              <!--<p class="text__block-desc">Established in the year<b> 2010,</b> we <b>“Solid Dom System”</b> are a prominent firm that is engaged in <b>manufacturing</b> a wide range of <b>PEB Structure, Air Ventilator, Profile Sheet, </b>etc. Located in<b> Surat (Gujarat, India),</b> we are <b>Partnership</b> firm and manufacture the offered products as per the set industry norms. In addition, we also provide We are provide<b> Fabrication Job Work </b>and<b> Profile Sheet Roofing Service </b>to our client<b>.</b> which is executed as per the specifications and requirements of the client in order to achieve the desired results. Under the headship of<b> “Mr. Viren Parmar” (Partner),</b> we have gained a remarkable and strong position in the market. <br><br>We have a robust infrastructural facility that is technologically advanced and spread over vast land area. Our infrastructure is further segmented into comprehensive units which enable us to manage the facility in an efficient manner. We have recruited qualified, skilled and experienced professionals who assist us to manage these units. We have flourished in this industry due to the sincere efforts of our competent professionals and our hi-tech production unit. The offered range is manufactured by our expert professionals using standard quality basic material and latest machines. This range is highly acknowledged in the market for its remarkable features like sturdiness, high strength, perfect finish, durability and easy-installation. Additionally, to serve the variegated demands of the clients, we offer this range in diverse specifications.<br><br>The provided services are widely regarded for their hassle-free and well-planned execution within the committed budget and time. Additionally, our offered range is examined against various predefined quality parameters in order to deliver a defect-free range from our side. Moreover, we offer this range to our clients’ at market-leading prices.</p>

              <p class="text__block-desc">We have a robust infrastructural facility that is technologically advanced and spread over vast land area. Our infrastructure is further segmented into comprehensive units which enable us to manage the facility in an efficient manner. We have recruited qualified, skilled and experienced professionals who assist us to manage these units. We have flourished in this industry due to the sincere efforts of our competent professionals and our hi-tech production unit. The offered range is manufactured by our expert professionals using standard quality basic material and latest machines. This range is highly acknowledged in the market for its remarkable features like sturdiness, high strength, perfect finish, durability and easy-installation. Additionally, to serve the variegated demands of the clients, we offer this range in diverse specifications.</p>

              <p class="text__block-desc">The provided services are widely regarded for their hassle-free and well-planned execution within the committed budget and time. Additionally, our offered range is examined against various predefined quality parameters in order to deliver a defect-free range from our side. Moreover, we offer this range to our clients’ at market-leading prices.</p>-->  
            </div><!-- /.row -->
          </div><!-- /.col-xl-7 -->
        </div><!-- /.row -->

        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="heading heading-2 text-center mb-40">
               <span class="heading__subtitle"></span>
              <h2 class="heading__title">QUALITY POLICY</h2>
            </div>
            <div class="row">
              <p class="text__block-desc">We at Ambica Enterprise are committed for continuous improvement in the quality system. We shall endeavour for customer satisfaction by providing quality through on time delivery, enhancement in turnover & trained motivated employees at all level.</p>
            </div><!-- /.row -->
          </div><!-- /.col-xl-7 -->
        </div><!-- /.row -->

      </div><!-- /.container -->
    </section><!-- /.About Layout 2 -->

    
    <!-- =====================
        Features numberd 
      ======================== -->
    <section id="featuresNumberd" class="features-numberd pt-0">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="carousel owl-carousel carousel-dots" data-slide="3" data-slide-md="3" data-slide-sm="1"
              data-autoplay="true" data-nav="false" data-dots="true" data-space="30" data-loop="true" data-speed="700">
              <div class="feature-numberd-item">
                <div class="feature__numberd-item-icon">
                  <i class="icon-eco"></i>
                </div>
                <h3 class="feature__numberd-item-number">01</h3>
                <h4 class="feature__numberd-item-title">Nature of Business <br> Manufacturer/Supplier</h4>
              </div><!-- /.feature-numberd-item -->
              <!--<div class="feature-numberd-item">
                <div class="feature__numberd-item-icon">
                  <i class="icon-worker"></i>
                </div>
                <h3 class="feature__numberd-item-number">02</h3>
                <h4 class="feature__numberd-item-title">Total Number of Employees<br> 11 to 25 People </h4>
              </div>--><!-- /.feature-numberd-item -->
              <div class="feature-numberd-item">
                <div class="feature__numberd-item-icon">
                  <i class="icon-management"></i>
                </div>
                <h3 class="feature__numberd-item-number">02</h3>
                <h4 class="feature__numberd-item-title">Year of Establishment <br> 2020</h4>
              </div><!-- /.feature-numberd-item -->
              <!--<div class="feature-numberd-item">
                <div class="feature__numberd-item-icon">
                  <i class="icon-parcel"></i>
                </div>
                <h3 class="feature__numberd-item-number">04</h3>
                <h4 class="feature__numberd-item-title">Legal Status of Firm <br>Partnership Firm</h4>
              </div>--><!-- /.feature-numberd-item -->
              <div class="feature-numberd-item">
                <div class="feature__numberd-item-icon">
                  <i class="icon-gear"></i>
                </div>
                <h3 class="feature__numberd-item-number">03</h3>
                <h4 class="feature__numberd-item-title">GST Number <br> 24EOTPP5023P1Z6</h4>
              </div><!-- /.feature-numberd-item -->
            </div> <!-- /.carousel -->
          </div><!-- /.col-lg-12 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.Features-numberd -->

    <!-- ========================
        services Layout 2
    =========================== -->
    <section id="servicesLayout2" class="services services-layout2 pt-120 pb-90 bg-gray">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-8 offset-lg-2">
            <div class="heading heading-2 text-center mb-40">
              <span class="heading__subtitle">The Best Industry And Company Services</span>
              <h2 class="heading__title">High Performance Services For Multiple Industries And Technologies!</h2>
            </div><!-- /.heading -->
          </div><!-- /.col-lg-10 -->
        </div>
        <div class="row">
          <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="service-item">
              <div class="service__content">
                <div class="service__icon"><i class="icon-tank-2"></i></div>
                <h4 class="service__title">Our Mission</h4>
                <p class="service__desc">Best Quality And Total Customer Satisfaction</p>
                
              </div><!-- /.service-content -->
            </div><!-- /.service-item -->
          </div><!-- /.col-lg-4 -->
          <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="service-item">
              <div class="service__content">
                <div class="service__icon"><i class="icon-manufacturing-plant"></i></div>
                <h4 class="service__title">Why Us?</h4>
                <p class="service__desc">Being a foremost company in the national market, we are engaged in providing a qualitative range of products that we provide in diverse specifications in order to attain the complete satisfaction of the clients within given time frame. Owing to the following unique reasons, we are able to achieve a massive success in this industry:</p>
                
              </div><!-- /.service-content -->
            </div><!-- /.service-item -->
          </div><!-- /.col-lg-4 -->
          <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="service-item">
              <div class="service__content">
                <div class="service__icon"><i class="icon-factory-2"></i></div>
                <h4 class="service__title">Our Vision</h4>
                <p class="service__desc">Your Trust Our Work.</p>
                
              </div><!-- /.service-content -->
            </div><!-- /.service-item -->
          </div><!-- /.col-lg-4 -->
        </div><!-- /.row-->
        
      </div><!-- /.container -->
    </section><!-- /.services Layout 2 -->

    

@endsection
