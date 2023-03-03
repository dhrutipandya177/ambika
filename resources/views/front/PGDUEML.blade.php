@extends('front.layouts.master')
@section('content')
<div class="main-content">
  <!-- Section: inner-header -->
  <section class="inner-header divider parallax layer-overlay overlay-dark-5"
    data-bg-img="{{ asset('front/images/bg3.jpg')}}">
    <div class="container pt-70 pb-20">
      <!-- Section Content -->
      <div class="section-content">
        <div class="row">
          <div class="col-md-12">
            <h2 class="title text-white">PGDUEML</h2>
            <ol class="breadcrumb text-left text-black mt-10">
              <li><a href="{{ url('/') }}">Home</a></li>

              <li class="active text-gray-silver">PGDUEML</li>
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

              <h3 class="text-theme-colored line-bottom text-theme-colored">Post Graduate Diploma in Urban Environmental
                Management & Law</h3>

              <h5>Whether in the visible strands of urban life, like deteriorating infrastructure and housing, or the
                invisible heartache of poverty and deprivation, it is the urban administrator who faces the most
                difficult task today. The local body is responsible for delivering some semblance of a decent life to
                its citizens even against a million odds.</h5>
              <p>Therefore, strengthening the delivery capacity of urban administrators and elected representatives is
                crucial for harmonious civil and environmental governance. One of the best ways to tackle a situation
                like this is to strengthen the human resource pool by creating efficient urban mangers.</p>
              <p>In this context, Centre for Environmental Law (CEL), WWF India has initiated an academic programme
                titled ‘PG Diploma in Urban Environmental Management’.</p>
              <p>CEL entered into a Memorandum of Understanding with National Law University, Delhi (NLUD) to jointly
                run the programme which is specifically designed for the benefit of students as well as urban
                administrators, urban mangers and working professionals involved with improving living conditions and
                quality of life in urban areas.</p>
              <p>The course is offered in both ‘distance and ‘online’ mode of study.</p>
              <p>The new interdisciplinary programme is aimed towards strengthening the professional capacity and
                developing a human resource pool of efficient urban managers and administrators by providing an in-depth
                knowledge and understanding of the existing urban laws, by-laws and policies.</p>
              <p>Not only will the programme make the learners familiar with the existing legal and policy
                prescriptions, but will also provide them with practical faculty for addressing crucial urban problems
                at both policy and implementation level.</p>
              <h4 class="mt-20 mb-20 text-theme-colored">The main objectives of the programme are:</h4>
              <ul class="list theme-colored">
                <li>Provide comprehensive knowledge of the existing urban legal and policy framewoks to the learners.
                </li>
                <li>Enable learners to propose such changes as are necessary in these laws to find convergence with
                  urban environmental management practices.</li>
                <li>Facilitate a platform for managing the current urban issues in a broader perspective of
                  environmental governance and sustainable development.</li>
                <li>Train the urban professionals to optimally utilize financial and technical resources or materials
                  ensuring good governance locally, regionally and nationally.</li>
              </ul>

              <h4 class="line-bottom mt-20 mb-20 text-theme-colored">Programme Structure</h4>
              <ul id="myTab" class="nav nav-tabs boot-tabs">
                <li class="active"><a href="#small" data-toggle="tab">Course I</a></li>
                <li><a href="#medium" data-toggle="tab">Course II</a></li>
                <li><a href="#large" data-toggle="tab">Course III</a></li>
                <li><a href="#largeIV" data-toggle="tab">Course IV</a></li>
                <li><a href="#largeV" data-toggle="tab">Course V</a></li>
                <li><a href="#largeVI" data-toggle="tab">Course VI</a></li>
              </ul>
              <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade in active" id="small">
                  <p>Introduction to Urban Governance-Concepts and Practices </p>
                </div>
                <div class="tab-pane fade" id="medium">
                  <p>Laws and Policies pertaining to Environment </p>
                </div>
                <div class="tab-pane fade" id="large">
                  <p>Laws and Policies pertaining to Urbanisation </p>
                </div>
                <div class="tab-pane fade" id="largeIV">
                  <p>Urban Legal and Policy Frameworks </p>
                </div>
                <div class="tab-pane fade" id="largeV">
                  <p>Urban Development and Environment Protection Mechanisms in India </p>
                </div>
                <div class="tab-pane fade" id="largeVI">
                  <p>Project and Practical Training </p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <h3 class="text-theme-colored line-bottom text-theme-colored">Last date for submitting applications is 20
              September, 2019.</h3>



            <div class="sidebar sidebar-right mt-sm-30">
              <div class="widget">
                <h5 class="widget-title line-bottom">DOWNLOAD</h5>
                <a href="javascript:void(0)" class="btn btn-default btn-theme-colored btn-flat mt-10">Download
                  Prospectus May Batch <i class="fa fa-arrow-circle-right"></i></a>
                <a href="javascript:void(0)" class="btn btn-default btn-theme-colored btn-flat mt-10">Download
                  Prospectus Sep Batch <i class="fa fa-arrow-circle-right"></i></a>
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