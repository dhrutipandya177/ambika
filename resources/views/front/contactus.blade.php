@extends('front.layouts.master')
@section('content')

  <!-- ========================= 
            Google Map
    =========================  -->
    {{-- <section id="googleMap" class="google-map p-0">
      <div id="map" style="height: 440px;"></div>
      <script src="assets/js/google-map.js"></script>
      <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY" async defer></script>
      <!-- CLICK HERE (https://developers.google.com/maps/documentation/embed/get-api-key) TO  LERAN MORE ABOUT GOOGLE MAPS API KEY -->
    </section><!-- /.GoogleMap --> --}}

   <!-- ========================
       page title 
    =========================== -->
    <section id="pageTitle" class="page-title page-title-layout1 bg-overlay bg-parallax">
      <div class="bg-img"><img src="{{ asset('front/images/page-titles/1.jpg') }}" alt="background"></div>
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-12 col-xl-7">
            <h1 class="pagetitle__heading">Contact Us</h1>
            <!--<p class="pagetitle__desc">We are Ambica Enterprise leading name in all type of Industrial product Supplier.</p>-->
            <!--<a href="#" class="btn btn__primary btn__hover2">
              <i class="icon-arrow-right"></i><span>Our Services</span>
            </a>-->
          </div><!-- /.col-xl-7 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.page-title --> 

  <!-- ==========================
        contact layout 1
    =========================== -->
   
    <section id="contactLayout1" class="contact contact-layout1 pt-0">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="contact__panel">
              <div class="contact__panel-banner">
                <img src="{{ asset('front/images/banners/2.jpg') }}" alt="banner img">
                <div class="cta__banner">
                  <p class="cta__desc"><strong>We will get back to you shortly.</strong></p>
                  <!--<div class="contact__number d-flex align-items-center">
                    <i class="icon-phone"></i>
                    <a href="tel:+918866447210">+9188664–47210</a>
                  </div>-->
                </div>
              </div>
              @include('front.inquiry')
            </div><!-- /.contact__panel -->
          </div><!-- /.col-lg-12 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.contact layout 1 -->

    <!-- ==========================
       Contact Info
    ============================ -->
    <section id="contactInfo" class="contact contact-info pt-0">
      <div class="container">
        <div class="row">
          <!-- Contact panel #1 -->
          <div class="col-sm-12 col-md-6 col-lg-6">
            <div class="contact-info-box">
              <h4 class="contact__info-box-title">Management</h4>
              <ul class="contact__info-list list-unstyled">
                <li><b>Chairman:</b> Mr. Ghanshyam Parmar</li>
                <li><b>Managing Director:</b> Mr. Viren Parmar</li>
                <li><b>CEO:</b> Mr. Shubham Parmar</li>
              </ul><!-- /.contact__info-list -->
            </div><!-- /.contact-info-box -->
          </div><!-- /.col-lg-4 -->
          <!-- Contact panel #2 -->
          <div class="col-sm-12 col-md-6 col-lg-6">
            <div class="contact-info-box">
              <h4 class="contact__info-box-title">Contact detail</h4>
              <ul class="contact__info-list list-unstyled">
                <li>Email: <a href="milto:ambicaent1119@gmail.com">ambicaent1119@gmail.com</a></li>
                <li>Location: Bharuch, Gujarat, India.</li>
                <li>Phone: +91 9924121119</li>
                <li>Phone: +91 8866447210</li>
              </ul><!-- /.contact__info-list -->
            </div><!-- /.contact-info-box -->
          </div><!-- /.col-lg-4 -->
          <!-- Contact panel #3 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.Contact Info -->  

@endsection
