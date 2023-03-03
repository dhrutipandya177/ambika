@extends('front.layouts.master')
@section('content')
    <div class="main-content">

        <!-- Section: inner-header -->
        <section class="inner-header divider parallax layer-overlay overlay-dark-5"
                 data-bg-img="{{ asset('front/images/bg3.jpg') }}">
            <div class="container pt-70 pb-20">
                <!-- Section Content -->
                <div class="section-content">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="title text-white">Apply TO Our Course</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Section: login -->

        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-push-3">
                        <form name="applynowform" id="applynowform" class="applynowform" method="post">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="course">Select Course</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="course" id="course1" value="PGDELP"
                                            {{ (isset($course) && $course == 'PGDELP')?'CHECKED':''}}>
                                        <label class="form-check-label" for="course1">
                                            Post Graduate Diploma in Environmental Law and Policy
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="course" id="course2"
                                               value="PGDUEML" {{ (isset($course) && $course == 'PGDUEML')?'CHECKED':''}}>
                                        <label class="form-check-label" for="course2">
                                            Post Graduate Diploma in Urban Environmental Management & Law
                                        </label>
                                    </div>
                                    <div class="form-check disabled">
                                        <input class="form-check-input" type="radio" name="course" id="course3"
                                               value="PGDTEL" {{ (isset($course) && $course == 'PGDTEL')?'CHECKED':''}}>
                                        <label class="form-check-label" for="course3">
                                            Post Graduate Diploma in Tourism and Environmental Law
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="name">Name</label>
                                    <input name="name" id="name" class="form-control" type="text" value="{{old('name')}}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Parent Name</label>
                                    <input name="parent_name" id="parent_name" class="form-control" type="text"
                                           value="{{old('parent_name')}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="address">Address</label>
                                    <textarea class="form-control" name="address" id="address" rows="4"
                                              cols="6">{{old('address')}}</textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="pincode">Pincode</label>
                                    <input id="pincode" name="pincode" class="form-control" type="number" min="0"
                                           value="{{old('pincode')}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="telephone">Telephone</label>
                                    <input id="telephone" name="telephone" class="form-control" type="text"
                                           value="{{old('telephone')}}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="mobileno">Mobile No</label>
                                    <input id="mobileno" name="mobileno" class="form-control" type="text"
                                           value="{{old('mobileno')}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="emailid">Email Id</label>
                                    <input id="emailid" name="emailid" class="form-control" type="email"
                                           value="{{old('email')}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="pursue_course_through">Pursue Course Through</label><br>
                                    <input id="pursue_course_through" name="pursue_course_through" value="1" type="radio"
                                        {{ (old('pursue_course_through') == 1)?'checked':''}}>Distance Education
                                    &nbsp;&nbsp; <input id="pursue_course_through" name="pursue_course_through" type="radio"
                                                        value="2" {{ (old('pursue_course_through') == 2)?'checked':''}}>Online Education
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Date Of Birth</label>
                                    <input type="date" name="dob" id="dob" class="form-control" value="{{ old('dob')}}">
                                </div>
                                <div class="col-md-6">
                                    <label>Nationality</label>
                                    <input type="text" name="nationality" id="nationality" class="form-control"
                                           value="{{ old('nationality')}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="gender">Gender</label><br>
                                    <input id="gender" name="gender" type="radio" value="male"
                                        {{ (old('gender') == 'male')?'checked':''}}>Male &nbsp;&nbsp; <input id="gender"
                                                                                                             name="gender" type="radio" value="female"
                                        {{ (old('gender') == 'female')?'checked':''}}>Female
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="profile_image">Profile Image</label><br>
                                    <input id="profile_images" name="profile_images" type="file" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="resume">Resume</label><br>
                                    <input id="resume" name="resume" type="file" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="degree_certificate">Degree Certificate</label><br>
                                    <input id="degree_certificate" name="degree_certificate" type="file"
                                           class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="provisional_certificate">Provisional Certificate</label><br>
                                    <input id="provisional_certificate" name="provisional_certificate" type="file"
                                           class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-dark btn-lg btn-block mt-15" type="submit"
                                        value="Register Now" name="register_button" id="register_button">Register Now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>



    </div>
@endsection
@section('js')
    <script>
      // $(document).ready(function() {
      $("#applynowform").validate({
        errorClass   : 'invalid-feedback animated fadeInDown',
        errorElement : 'div',
        rules        : {
          name                   : {
            required: true,
          },
          parent_name            : {
            required: true,
          },
          address                : {
            required: true,
          },
          pincode                : {
            required: true,
          },
          telephone              : {
            required: true,
          },
          mobileno               : {
            required: true,
          },
          emailid                : {
            required: true,
          },
          pursue_course_through  : {
            required: true,
          },
          dob                    : {
            required: true,
          },
          nationality            : {
            required: true,
          },
          gender                 : {
            required: true,
          },
          profile_images         : {
            required: true,
            extension: "jpg|jpeg|png|ico|bmp"
          },
          resume                 : {
            required: true,
            extension: "doc|docx|pdf|txt"
          },
          degree_certificate     : {
            required: true,
            extension: "doc|docx|pdf|txt"
          },
          provisional_certificate: {
            required: true,
            extension: "doc|docx|pdf|txt"
          },
        },
        submitHandler: function (form) {
          submitForm();
        },
        highlight    : function (element, errorClass, validClass) {
          $(element).parents("div.form-control").addClass(errorClass).removeClass(validClass);
        },
        unhighlight  : function (element, errorClass, validClass) {
          $(element).parents(".error").removeClass(errorClass).addClass(validClass);
        }
      });
      // });
      function submitForm(){
        var data = new FormData(document.getElementById('applynowform'));
        $('#register_button').attr("disabled", true);
        $.ajax({
          type: 'POST',
          headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
          url: '{{ route('submitapplication') }}',
          data: data,
          cache: false,
          contentType: false, //must, tell jQuery not to process the data
          processData: false,
          success: function (response) {
            var data = response;
            if(data.status == 1){
              toastr.success(data.msg, 'CEL');
              //oTable.draw();
              $('#applynowform').trigger("reset");
              window.location.replace("{{ route('thankyou') }}");
            }else{
              var myArr = data.msg;
              console.log(myArr);
              $.each(myArr, function( index, value ) {
                console.log(value);
                toastr.error(value, 'CEL');
              });
            }
            $('#register_button').attr("disabled", false);
          },
          error: function(jqXHR, textStatus, errorThrown) {

          },
        });
      }
    </script>
@endsection
