@extends('front.layouts.master')
@section('content')
<div class="main-content"> 
   
    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="{{ asset('front/images/bg3.jpg')}}">
      <div class="container pt-70 pb-20">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row">
            <div class="col-md-12">
              <h2 class="title text-white">DUEP</h2>
              <ol class="breadcrumb text-left text-black mt-10">
                <li><a href="{{ url('/') }}">Home</a></li>
               
                <li class="active text-gray-silver">DUEP</li>
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
                     <div class="col-md-9">
            <div class="single-service">
              
              <h3 class="text-theme-colored line-bottom text-theme-colored">Post Graduate Diploma in Environmental Law and Policy</h3>
            
              <p>With a more ecologically and socially conscious milieu; it is essential to minimize the adverse impacts of pollution and ecological degradation through proper environmental management and international cooperation. This can be done by not just raising awareness of environmental values but also strengthening the delivery capacity of environmental professionals so that they are well equipped to face the challenges in their stream of work.</p>
              <p>With an aim to provide a better understanding of green law issues poignant worldwide, particularly in the Indian context, NLUD and WWF India will be jointly offering a One Year Post Graduate Diploma in Environmental Law and Policy. The exclusive tailor-made programme provides opportunities for law graduates and professionals working in the field of environment to enrich their understanding of the issues, institutions and initiatives in the field of environmental law and policy.</p>
			 
			  
			  <h4 class="mt-20 mb-20 text-theme-colored">The main objectives of the programme are:</h4>
			  <ul class="list theme-colored">
<li>Provide comprehensive knowledge to the participants in Environmental Law and policy</li>
<li>Increase understanding on key issues related to National as well as International Environmental Law & Policies</li>
<li>Develop knowledge on the International Legal & Policy context on thematic issues related to environment</li>
<li>Develop practical skills to facilitate effective engagement with the Environmental Law</li>
<li>Prepare well-informed professionals in Environmental Law and to upgrade the professional competencies by augmenting the Environmental Law awareness</li>
<li>Promote networking and sharing of experiences among participants to actively contribute towards conservation</li>
</ul>
			  
              <h4 class="line-bottom mt-20 mb-20 text-theme-colored">Programme Structure</h4>
              <ul id="myTab" class="nav nav-tabs boot-tabs">
                <li class="active"><a href="#small" data-toggle="tab">Course I</a></li>
                <li><a href="#medium" data-toggle="tab">Course II</a></li>
                <li><a href="#large" data-toggle="tab">Course III</a></li>
                <li><a href="#largeIV" data-toggle="tab">Course IV</a></li>
                <li><a href="#largeV" data-toggle="tab">Course V</a></li>
                <li><a href="#largeVI" data-toggle="tab">Course VI</a></li>
                <li><a href="#largeVII" data-toggle="tab">Course VII</a></li>
              </ul>
              <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade in active" id="small">
                  <p> Introduction to Environment and Law  </p>
                </div>
                <div class="tab-pane fade" id="medium">
                  <p>International Environmental Law and Policy </p>
                </div>
                <div class="tab-pane fade" id="large">
                 <p>International Environmental Law and Policy II  </p>
                </div>
				<div class="tab-pane fade" id="largeIV">
                 <p>National Environmental Law and Policy </p>
                </div>
				<div class="tab-pane fade" id="largeV">
                 <p>National Environmental Law and Policy II</p>
                </div>
				<div class="tab-pane fade" id="largeVI">
                 <p> Environment Protection Mechanisms  </p>
                </div>
				<div class="tab-pane fade" id="largeVII">
                 <p> Practical Training  </p>
                </div>
              </div>
            </div>
          </div>
		  <div class="col-md-3">
		    <h3 class="text-theme-colored line-bottom text-theme-colored">Last date for submitting applications is 20 September, 2019.</h3>
			
			
			
			<div class="sidebar sidebar-right mt-sm-30">
              <div class="widget">
                <h5 class="widget-title line-bottom">DOWNLOAD</h5>
               <a href="javascript:void(0)" class="btn btn-default btn-theme-colored btn-flat mt-10">Download Prospectus May Batch <i class="fa fa-arrow-circle-right"></i></a>
			<a href="javascript:void(0)" class="btn btn-default btn-theme-colored btn-flat mt-10">Download Prospectus Sep Batch <i class="fa fa-arrow-circle-right"></i></a>
              </div>
        
              <div class="widget">
                <h5 class="widget-title line-bottom">PARTNER:</h5>
                <div class="widget-image-carousel">
                  <div class="item">
                    <img src="{{ asset('front/images/logo-nlu.gif')}}" alt="">
                   
                  </div>
                  
                 
                </div>
              </div>
              <div class="widget">
                <h5 class="widget-title line-bottom">KEY CONTACT</h5>
                <p>
				<strong>Mr. Samraansh Sharma</strong><br>
Course Coordinator- Centre For Environmental Law, WWF-India
				</p>
				<p>Tel: +91 11 41504771<br>
Email: samraansh@wwfindia.net</p>
              </div>
            </div>
		  
		  </div>
           
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection