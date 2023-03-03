@extends('front.layouts.master')
@section('content')
<div class="main-content"> 
   
  <!-- Section: home -->
  <section id="home">
    <div class="container-fluid p-0 bgv">
      
      <!-- Slider Revolution Start -->
  <div class="col-md-9 p-0">
      <div class="rev_slider_wrapper">
        <div class="rev_slider" data-version="5.0">
          <ul>

            <!-- SLIDE 1 -->
            <li data-index="rs-1" data-transition="slidingoverlayhorizontal" data-slotamount="default" data-easein="default" data-easeout="default" data-masterspeed="default" data-thumb="{{ asset('front/images/bg3.jpg')}}" data-rotate="0" data-saveperformance="off" data-title="Slide 1" data-description="">
              <!-- MAIN IMAGE -->
              <img src="{{ asset('front/images/bg3.jpg')}}"  alt=""  data-bgposition="center 10%" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-bgparallax="10" data-no-retina>
              <!-- LAYERS -->

              <!-- LAYER NR. 1 -->
             

              <!-- LAYER NR. 2 -->
          


             
            </li>

            <!-- SLIDE 2 -->
            <li data-index="rs-2" data-transition="slidingoverlayhorizontal" data-slotamount="default" data-easein="default" data-easeout="default" data-masterspeed="default" data-thumb="{{ asset('front/images/bg2.jpg')}}" data-rotate="0" data-saveperformance="off" data-title="Slide 2" data-description="">
              <!-- MAIN IMAGE -->
              <img src="{{ asset('front/images/bg2.jpg')}}"  alt=""  data-bgposition="center 40%" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-bgparallax="10" data-no-retina>
              <!-- LAYERS -->

              <!-- LAYER NR. 1 -->
      

              <!-- LAYER NR. 2 -->
                 

        

            
            </li>

            <!-- SLIDE 3 -->
            <li data-index="rs-3" data-transition="slidingoverlayhorizontal" data-slotamount="default" data-easein="default" data-easeout="default" data-masterspeed="default" data-thumb="{{ asset('front/images/bg4.jpg')}}" data-rotate="0" data-saveperformance="off" data-title="Slide 3" data-description="">
              <!-- MAIN IMAGE -->
              <img src="{{ asset('front/images/bg4.jpg')}}"  alt=""  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-bgparallax="10" data-no-retina>
              <!-- LAYERS -->

              <!-- LAYER NR. 1 -->
              

              <!-- LAYER NR. 2 -->
           

             

        
            </li>

          </ul>
        </div>
        <!-- end .rev_slider -->
      </div>
      </div>
  <div class="col-md-3 bgv">
  <div class="our-vision">
  <h4>Our Vision</h4>
  <p>Apart from handling and furthering WWF-India's conservation work involving policy analysis, campaigning and legal interventions on environmental issues, CEL serves as a resource centre for teaching environmental law and research in national, regional and international context.</p>
  <p><img alt="" src="{{ asset('front/images/logo-nlu.gif')}}" width="90" class="img-responsive"></p>
  </div>
  
  </div>
      <!-- end .rev_slider_wrapper -->
      <script>
        
      </script>
      <!-- Slider Revolution Ends -->

    </div>
  </section>
<div class="container">
<div class="row">
          <div class="col-md-12">
    <div class="next-update"> <marquee>The Centre for Environmental Law (CEL) was established in 1993 as an integral part of WWF-India.</marquee></div>
    </div>
    </div>
    </div>
    <hr>
  <!-- Section: About -->
  <section id="about" class="">
    <div class="container" style="padding-top:0px;">
 
      <div class="section-content">
        <div class="row">
          <div class="col-md-6">
            <h6 class="letter-space-4 text-gray-darkgray text-uppercase mt-0 mb-0">About</h6>
            <h2 class="text-uppercase font-weight-600 mt-0 font-28 line-bottom">Centre for Environmental<br> Law</h2>
            <h4 class="text-theme-colored">The Centre for Environmental Law (CEL) was established in 1993 as an integral part of WWF-India.</h4>
            <p>Apart from handling and furthering WWF-India's conservation work involving policy analysis, campaigning and legal interventions on environmental issues, CEL serves as a resource centre for teaching environmental law and research in national, regional and international context.</p>
            <a class="btn btn-theme-colored btn-flat btn-lg mt-10 mb-sm-30" href="about-us.html">Know More →</a>
          </div>
          <div class="col-md-6">
            <div class="video-popup">                
              <a href="#" data-lightbox-gallery="youtube-video" title="Video">
                <img alt="" src="{{ asset('front/images/5.jpg')}}" class="img-responsive img-fullwidth">
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Section: COURSES -->
  <section id="courses" class="bg-lighter">
    <div class="container pb-60">
      <div class="section-title mb-10">
      <div class="row">
        <div class="col-md-8">
          <h2 class="mt-0 text-uppercase font-28 line-bottom line-height-1">Our <span class="text-theme-color-2 font-weight-400">COURSES</span></h2>
       </div>
      </div>
      </div>
      <div class="section-content">
        <div class="row">
          <div class="col-md-12">
            <div class="owl-carousel-3col" data-dots="true">
             
              <div class="item">
                <div class="service-block mb-md-30 bg-white">
                  <div class="thumb"> <img alt="featured project" src="{{ asset('front/images/5(1).jpg')}}" class="img-responsive img-fullwidth">
                 
                  </div>
                  <div class="content text-left flip p-25 pt-0">
                    <h4 class="line-bottom mb-10">PGDELP</h4>
                    <p>Whether in the visible strands of urban life, like deteriorating infrastructure and housing  or the invisible heartache .</p>
                   <a class="btn btn-dark btn-theme-colored btn-sm text-uppercase mt-10" href="{{ route('DUEP') }}">view details</a>
                   <a class="btn btn-dark btn-theme-colored btn-sm text-uppercase mt-10" href="{{ route('apply-now','PGDELP') }}">Apply Now</a>
                 </div>
                </div>
              </div>
              <div class="item">
                <div class="service-block mb-md-30 bg-white">
                  <div class="thumb"> <img alt="featured project" src="{{ asset('front/images/6.jpg')}}" class="img-responsive img-fullwidth">
                  
                  </div>
                  <div class="content text-left flip p-25 pt-0">
                    <h4 class="line-bottom mb-10">PGDUEML</h4>
                    <p>Tourism industry is one of the most significant industries globally, despite the ups and downs  in world .</p>
                    <a class="btn btn-dark btn-theme-colored btn-sm text-uppercase mt-10" href="{{ route('PGDUEML') }}">view details</a>
                    <a class="btn btn-dark btn-theme-colored btn-sm text-uppercase mt-10" href="{{ route('apply-now','PGDUEML') }}">Apply Now</a>
                 </div>
                </div>
              </div>
       <div class="item ">
                <div class="service-block bg-white">
                  <div class="thumb"> <img alt="featured project" src="{{ asset('front/images/4.jpg')}}" class="img-fullwidth">
                  
                  </div>
                  <div class="content text-left flip p-25 pt-0">
                    <h4 class="line-bottom mb-10">PGDTEL</h4>
                    <p>With a more ecologically and socially conscious milieu; it is essential to minimize the adverse impacts of pollution .</p>
                    <a class="btn btn-dark btn-theme-colored btn-sm text-uppercase mt-10" href="{{ route('PGDTEL') }}">view details</a>
                    <a class="btn btn-dark btn-theme-colored btn-sm text-uppercase mt-10" href="{{ route('apply-now','PGDTEL') }}">Apply Now</a>
                  </div>
                </div>
              </div>
           
           
            </div>
          </div>
    
        </div>
      </div>
    </div>
  </section>
</div>
@endsection
@section('js')
    <script src="{{ asset('front/revolution/jquery.themepunch.tools.min.js')}}"></script>
    <script src="{{ asset('front/revolution/jquery.themepunch.revolution.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('front/revolution/revolution.extension.actions.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('front/revolution/revolution.extension.carousel.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('front/revolution/revolution.extension.kenburn.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('front/revolution/revolution.extension.layeranimation.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('front/revolution/revolution.extension.migration.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('front/revolution/revolution.extension.navigation.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('front/revolution/revolution.extension.parallax.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('front/revolution/revolution.extension.slideanims.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('front/revolution/revolution.extension.video.min.js')}}"></script>
    <script>
     $(document).ready(function(e) {
            $(".rev_slider").revolution({
              sliderType:"standard",
              sliderLayout: "auto",
              dottedOverlay: "none",
              delay: 5000,
              navigation: {
                  keyboardNavigation: "off",
                  keyboard_direction: "horizontal",
                  mouseScrollNavigation: "off",
                  onHoverStop: "off",
                  touch: {
                      touchenabled: "on",
                      swipe_threshold: 75,
                      swipe_min_touches: 1,
                      swipe_direction: "horizontal",
                      drag_block_vertical: false
                  },
                arrows: {
                  style:"zeus",
                  enable:true,
                  hide_onmobile:true,
                  hide_under:600,
                  hide_onleave:true,
                  hide_delay:200,
                  hide_delay_mobile:1200,
                  tmp:'<div class="tp-title-wrap">    <div class="tp-arr-imgholder"></div> </div>',
                  left: {
                    h_align:"left",
                    v_align:"center",
                    h_offset:30,
                    v_offset:0
                  },
                  right: {
                    h_align:"right",
                    v_align:"center",
                    h_offset:30,
                    v_offset:0
                  }
                },
                bullets: {
                  enable:true,
                  hide_onmobile:true,
                  hide_under:600,
                  style:"metis",
                  hide_onleave:true,
                  hide_delay:200,
                  hide_delay_mobile:1200,
                  direction:"horizontal",
                  h_align:"center",
                  v_align:"bottom",
                  h_offset:0,
                  v_offset:30,
                  space:5,
                  tmp:'<span class="tp-bullet-img-wrap">  <span class="tp-bullet-image"></span></span><span class="tp-bullet-title">Image 1</span>'
                }
              },
              responsiveLevels: [1240, 1024, 778],
              visibilityLevels: [1240, 1024, 778],
              gridwidth: [1170, 1024, 778, 480],
              gridheight: [500, 768, 960, 720],
              lazyType: "none",
              parallax: {
                  origo: "slidercenter",
                  speed: 1000,
                  levels: [5, 10, 15, 20, 25, 30, 35, 40, 45, 46, 47, 48, 49, 50, 100, 55],
                  type: "scroll"
              },
              shadow: 0,
              spinner: "off",
              stopLoop: "on",
              stopAfterLoops: 0,
              stopAtSlide: -1,
              shuffle: "off",
              autoHeight: "off",
              fullScreenAutoWidth: "off",
              fullScreenAlignForce: "off",
              fullScreenOffsetContainer: "",
              fullScreenOffset: "0",
              hideThumbsOnMobile: "off",
              hideSliderAtLimit: 0,
              hideCaptionAtLimit: 0,
              hideAllCaptionAtLilmit: 0,
              debugMode: false,
              fallbacks: {
                  simplifyAll: "off",
                  nextSlideOnWindowFocus: "off",
                  disableFocusListener: false,
              }
            });
          });
    </script>
@endsection
