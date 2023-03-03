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
              <h2 class="title text-white">Result</h2>
              <ol class="breadcrumb text-left text-black mt-10">
                <li><a href="javascript:void(0)">Home</a></li>
               
                <li class="active text-gray-silver">Result</li>
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
            <div class="single-service">
              
              <h3 class="text-theme-colored line-bottom text-theme-colored">Result Page</h3>
            
              <h5><em>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo unde, <span class="text-theme-color-2">Result Page</span> corporis dolorum blanditiis ullam officia <span class="text-theme-color-2">our university </span>natus minima fugiat repellat! Corrupti voluptatibus aperiam voluptatem. Exercitationem, placeat, cupiditate.</em></h5>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore suscipit, inventore aliquid incidunt, quasi error! Natus esse rem eaque asperiores eligendi dicta quidem iure, excepturi doloremque eius neque autem sint error qui tenetur, modi provident aut, maiores laudantium reiciendis expedita. Eligendi</p>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore voluptatem officiis quod animi possimus a, iure nam sunt quas aperiam non recusandae reprehenderit, nesciunt cumque pariatur totam repellendus delectus? Maxime quasi earum nobis, dicta, aliquam facere reiciendis, delectus voluptas, ea assumenda blanditiis placeat dignissimos quas iusto repellat cumque.</p>
              <h4 class="line-bottom mt-20 mb-20 text-theme-colored">All Courses Idea</h4>
              <ul id="myTab" class="nav nav-tabs boot-tabs">
                <li class="active"><a href="#small" data-toggle="tab">Categories</a></li>
                <li><a href="#medium" data-toggle="tab">Categories</a></li>
                <li><a href="#large" data-toggle="tab">Categories</a></li>
              </ul>
              <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade in active" id="small">
                  <table class="table table-bordered"> 
                    <tr>
                      <td class="text-center font-16 font-weight-600 bg-theme-color-2 text-white" colspan="4">Prices For All Lesson Type</td>
                    </tr>
                    <tr> <th>Coures Type</th> <th>Class time</th> <th>Course Duration</th> <th>Price</th> </tr>
                    <tbody> 
                      <tr> <th scope="row">Applied Psychology</th> <td>45 minutes</td> <td>3 years</td> <td>$810</td> </tr>
                      <tr> <th scope="row">Business Administration (MBA)</th> <td>45 minutes</td> <td>2 years</td> <td>$940</td> </tr>
                      <tr> <th scope="row">Computer Science (BSc)</th> <td>1 Hours</td> <td>4 years</td> <td>$1180</td> </tr>
                      <tr> <th scope="row">Development Studies (MDS)</th> <td>1 Hours</td> <td>5 years</td> <td>$1400</td> </tr> 
                      <tr> <th scope="row">Engineering Technology (BSc)</th> <td>30 minutes</td> <td>3 years</td> <td>$600</td> </tr> 
                    </tbody> 
                  </table>
                </div>
                <div class="tab-pane fade" id="medium">
                  <table class="table table-bordered"> 
                    <tr>
                      <td class="text-center font-16 font-weight-600 bg-theme-color-2 text-white" colspan="4">Prices For All Lesson Type</td>
                    </tr>
                    <tr> <th>Coures Type</th> <th>Class time</th> <th>Course Duration</th> <th>Price</th> </tr>
                    <tbody> 
                      <tr> <th scope="row">Applied Psychology</th> <td>45 minutes</td> <td>3 years</td> <td>$810</td> </tr>
                      <tr> <th scope="row">Business Administration (MBA)</th> <td>45 minutes</td> <td>2 years</td> <td>$940</td> </tr>
                      <tr> <th scope="row">Computer Science (BSc)</th> <td>1 Hours</td> <td>4 years</td> <td>$1180</td> </tr>
                      <tr> <th scope="row">Development Studies (MDS)</th> <td>1 Hours</td> <td>5 years</td> <td>$1400</td> </tr> 
                      <tr> <th scope="row">Engineering Technology (BSc)</th> <td>30 minutes</td> <td>3 years</td> <td>$600</td> </tr> 
                    </tbody> 
                  </table>
                </div>
                <div class="tab-pane fade" id="large">
                  <table class="table table-bordered"> 
                    <tr>
                      <td class="text-center font-16 font-weight-600 bg-theme-color-2 text-white" colspan="4">Prices For All Lesson Type</td>
                    </tr>
                    <tr> <th>Coures Type</th> <th>Class time</th> <th>Course Duration</th> <th>Price</th> </tr>
                    <tbody> 
                      <tr> <th scope="row">Applied Psychology</th> <td>45 minutes</td> <td>3 years</td> <td>$810</td> </tr>
                      <tr> <th scope="row">Business Administration (MBA)</th> <td>45 minutes</td> <td>2 years</td> <td>$940</td> </tr>
                      <tr> <th scope="row">Computer Science (BSc)</th> <td>1 Hours</td> <td>4 years</td> <td>$1180</td> </tr>
                      <tr> <th scope="row">Development Studies (MDS)</th> <td>1 Hours</td> <td>5 years</td> <td>$1400</td> </tr> 
                      <tr> <th scope="row">Engineering Technology (BSc)</th> <td>30 minutes</td> <td>3 years</td> <td>$600</td> </tr> 
                    </tbody> 
                  </table>
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