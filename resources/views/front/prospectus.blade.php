@extends('front.layouts.master')
@section('content')
<div class="main-content"> 
   
    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="{{ asset('front/images/bg3.jpg') }}">
      <div class="container pt-70 pb-20">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row">
            <div class="col-md-12">
              <h2 class="title text-white">About</h2>
              <ol class="breadcrumb text-left text-black mt-10">
                <li><a href="javascript:void(0)">Home</a></li>
               
                <li class="active text-gray-silver">Course</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Section: About -->
    <section id="about" class="">
      <div class="container">
	 
        <div class="section-content">
          <div class="row">
            <div class="col-md-12">
              
              <h2 class="text-uppercase font-weight-600 mt-0 font-28 line-bottom">Course</h2>
         
              
            </div>
			
              
               
                <div class="col-md-4">
                  <div class="service-block mb-md-30 bg-white">
                    <div class="thumb"> <img alt="featured project" src="{{ asset('front/images/5(1).jpg') }}" class="img-responsive img-fullwidth">
                   
                    </div>
                    <div class="content text-left flip p-25 pt-0">
                      <h4 class="line-bottom mb-10">PGDELP</h4>
                      <p>Whether in the visible strands of urban life, like deteriorating infrastructure and housing  or the invisible heartache .</p>
                     <a class="btn btn-dark btn-theme-colored btn-sm text-uppercase mt-10" href="pgd-whether.html">view details</a><br>
					 <a href="#" class="btn btn-default btn-theme-colored btn-flat mt-10">Download May Prospectus <i class="fa fa-arrow-circle-right"></i></a>
					 <a href="#" class="btn btn-default btn-theme-colored btn-flat mt-10">Download September Prospectus <i class="fa fa-arrow-circle-right"></i></a>
                   </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="service-block mb-md-30 bg-white">
                    <div class="thumb"> <img alt="featured project" src="{{ asset('front/images/6.jpg') }}" class="img-responsive img-fullwidth">
                    
                    </div>
                    <div class="content text-left flip p-25 pt-0">
                      <h4 class="line-bottom mb-10">PGDUEML</h4>
                      <p>Tourism industry is one of the most significant industries globally, despite the ups and downs  in world .</p>
                     <a class="btn btn-dark btn-theme-colored btn-sm text-uppercase mt-10" href="pgd-tourism.html">view details</a>
					 <br>
					 <a href="#" class="btn btn-default btn-theme-colored btn-flat mt-10">Download May Prospectus <i class="fa fa-arrow-circle-right"></i></a>
					 <a href="#" class="btn btn-default btn-theme-colored btn-flat mt-10">Download September Prospectus <i class="fa fa-arrow-circle-right"></i></a>
                   </div>
                  </div>
                </div>
				 <div class="col-md-4 ">
                  <div class="service-block bg-white">
                    <div class="thumb"> <img alt="featured project" src="{{ asset('front/images/4.jpg') }}" class="img-fullwidth">
                    
                    </div>
                    <div class="content text-left flip p-25 pt-0">
                      <h4 class="line-bottom mb-10">PGDTEL</h4>
                      <p>With a more ecologically and socially conscious milieu; it is essential to minimize the adverse impacts of pollution .</p>
                     <a class="btn btn-dark btn-theme-colored btn-sm text-uppercase mt-10" href="pgd-policy.html">view details</a>
					 <br>
					 <a href="{{ asset('front/images/PGDTEL-may2020.doc') }}" class="btn btn-default btn-theme-colored btn-flat mt-10" >Download May Prospectus <i class="fa fa-arrow-circle-right"></i></a>
					 <a href="#" class="btn btn-default btn-theme-colored btn-flat mt-10">Download September Prospectus <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                </div>
             
             
           
            
          </div>
        </div>
      </div>
    </section>
    <!-- Section: COURSES -->
  </div>
@endsection