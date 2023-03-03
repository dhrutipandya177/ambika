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
              <h2 class="title text-white">About</h2>
              <ol class="breadcrumb text-left text-black mt-10">
                <li><a href="{{ url('/') }}">Home</a></li>
               
                <li class="active text-gray-silver">nlud</li>
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
              
              <h2 class="text-uppercase font-weight-600 mt-0 font-28 line-bottom">NLUD</h2>
             <p>The primary objective of the University is to evolve and impart comprehensive and interdisciplinary legal
education that is socially relevant. Through this education, we aim to promote legal and ethical values and
foster the rule of law and the objectives enshrined in the Constitution of India. Furthermore, the University
works toward dissemination of legal knowledge and its role in national development, so that the ability to
analyse and present contemporary issues of public concern and their legal implications for the benefit of the
public is improved. These processes strive to promote legal awareness in the community and to achieve
political, social and economic justice.</p>
 <p>Many believe that the path of liberalization we embarked upon in the early 90s unleashed India’s potential.
Undoubtedly the country has undergone vast changes in all spheres and we see a more confident India
asserting itself on the global stage. However, this progress has come with very significant challenges to the
country. India’s various social classes are yet to be assimilated; their participation in the process of
governance remains fractured. Cumulative progress needs to be fair and equitable. And integral to that is a
legal system that empowers the marginalised, is just and fair in letter and spirit, and most importantly, does
not use the law as a tool of oppression.</p>
 <p>Our sincere endeavor is to make legal education justice education, as an instrument of social, political and
economic change. Each individual who is part of this institution must be remembered for the promotion of
social justice. Our students will not only be shaped as change agents as the country achieves its social and
developmental goals, but will also be equipped to address the imperatives of the new millennium and uphold
the Constitution of India.</p>
              
            </div>
            
          </div>
        </div>
      </div>
    </section>
    <!-- Section: COURSES -->
  </div>
  @endsection