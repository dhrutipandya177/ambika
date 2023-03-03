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
                        <h2 class="title text-white">Alumni</h2>
                        <ol class="breadcrumb text-left text-black mt-10">
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li class="active text-gray-silver">Alumni</li>
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
                            <h3 class="text-theme-colored line-bottom text-theme-colored">Alumni Page</h3>
                        </div>
                    </div>
                </div>
                <div class="row mb-15">
                    <div class="col-sm-6 col-md-4">
                        <div class="thumb"> <img alt="featured project" src="{{ asset('front/images/p1.jpg')}}" class="img-fullwidth"></div>
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <h4 class="line-bottom mt-0 mt-sm-20">Manpreet Singh</h4>
                        <ul class="review_text list-inline">
                            <li>
                                <h4 class="mt-0"><span class="text-theme-color-2">Designation : </span>Eligibility
                                    Officer, Refugee Status Determination Unit
                                    Org. Affiliation: United Nations High Commissioner for Refugees
                                    Course Completed: Post Graduate Diploma in Environmental Law and Policy </h4>
                            </li>

                        </ul>
                        <p>The course content is comprehensive as to cover all aspects of International Environmental
                            Law and policies. It does cover the Environmental issues and further developments in that
                            sector. The course is designed in a way which gradually built up knowledge and anyone who is
                            having least understanding of this subject matter can be benefited and gain immense added
                            knowledge. .</p>

                    </div>
                </div>
                <div class="row mb-15">
                    <div class="col-sm-6 col-md-4">
                        <div class="thumb"> <img alt="featured project" src="{{ asset('front/images/p1.jpg') }}" class="img-fullwidth"></div>
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <h4 class="line-bottom mt-0 mt-sm-20">Manpreet Singh</h4>
                        <ul class="review_text list-inline">
                            <li>
                                <h4 class="mt-0"><span class="text-theme-color-2">Designation : </span>Eligibility
                                    Officer, Refugee Status Determination Unit
                                    Org. Affiliation: United Nations High Commissioner for Refugees
                                    Course Completed: Post Graduate Diploma in Environmental Law and Policy </h4>
                            </li>

                        </ul>
                        <p>The course content is comprehensive as to cover all aspects of International Environmental
                            Law and policies. It does cover the Environmental issues and further developments in that
                            sector. The course is designed in a way which gradually built up knowledge and anyone who is
                            having least understanding of this subject matter can be benefited and gain immense added
                            knowledge. .</p>

                    </div>
                </div>

            </div>
        </div>
    </section>
</div>
@endsection