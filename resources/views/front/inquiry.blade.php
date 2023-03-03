@if(isset($listProducts))
<form name="contact_us" id="contact_us" method="post" action="{{ route('inquiry-store') }}" class="contact__form-panel">
  {{-- @csrf --}}
  {{ csrf_field() }}
  <div class="row">
    @if ($message = Session::get('success'))
          <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert"
                      aria-label="Close"><span aria-hidden="true">&times;</span>
              </button>
              {{ $message }}
          </div>
      @endif

      @if (count($errors) > 0)
          @if($errors->any())
              <div class="alert alert-danger alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert"
                          aria-label="Close"><span aria-hidden="true">&times;</span>
                  </button>
                  {{$errors->first()}}
              </div>
          @endif
      @endif
    <div class="col-sm-12 contact__form-panel-header">
      <h4>Get In Touch</h4>
      <p>Complete control over products allows us to ensure our customers receive the best quality
        prices
        and service.</p>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-12">
      <div class="form-group"><input type="text" name="name" value="" class="form-control" placeholder="Name" required /></div>
    </div><!-- /.col-lg-6 -->
    <div class="col-sm-12 col-md-12 col-lg-12">
      <div class="form-group"><input type="email" name="email" value="" class="form-control" placeholder="Email" required /></div>
    </div><!-- /.col-lg-6 -->
    <div class="col-sm-12 col-md-12 col-lg-12">
      <div class="form-group"><input type="text" name="phone" value="" class="form-control" placeholder="Phone" required /></div>
    </div><!-- /.col-lg-6 -->

    <div class="col-sm-6 col-md-6 col-lg-6" style="display:none;">
      <div class="form-group">
        <input type="hidden" name="product_id" value="0" />
      </div>
    </div>

    @if(!empty($listProducts))
    <!--<div class="col-sm-6 col-md-6 col-lg-6">
      <div class="form-group">
        <select name="product_id" class="form-control form-group w-100" required > 
          <option>Select Your Product</option>
          @foreach($listProducts as $product)
          <option value="{{ $product->id }}">{{ $product->name }}</option>
          @endforeach
        </select>
      </div>
    </div>--><!-- /.col-lg-6 -->
    @endif
    <div class="col-sm-4 col-md-4 col-lg-4">
      <div class="form-group"><input type="text" name="city" value="" class="form-control" placeholder="City" /></div>
    </div><!-- /.col-lg-6 -->
    <div class="col-sm-4 col-md-4 col-lg-4">
      <div class="form-group"><input type="text" name="state" value="" class="form-control" placeholder="State" /></div>
    </div><!-- /.col-lg-6 -->
    <div class="col-sm-4 col-md-4 col-lg-4">
      <div class="form-group"><input type="text" name="country" value="" class="form-control" placeholder="Country" /></div>
    </div><!-- /.col-lg-6 -->
    <div class="col-sm-12 col-md-12 col-lg-12">
      <div class="form-group">
        <textarea name="description" class="form-control" placeholder="Additional Details!"></textarea>
      </div>
    </div><!-- /.col-lg-12 -->
    <div class="col-sm-12 col-md-12 col-lg-12">
      <button type="submit" name="submit" value="Submit Request" id="submit_inquiry" class="btn btn__secondary btn__block">
        <span>Submit Request</span><i class="icon-arrow-right"></i>
      </button>
    </div><!-- /.col-lg-12 -->
  </div><!-- /.row -->
</form>
@endif

@section('js')
<script>
  // $(document).ready(function() {
    $("#contact_us").validate({
        errorClass   : 'invalid-feedback animated fadeInDown',
        errorElement : 'div',
        /*submitHandler: function (form) {
          submitForm();
        },*/
        highlight    : function (element, errorClass, validClass) {
          $(element).parents("div.form-control").addClass(errorClass).removeClass(validClass);
        },
        unhighlight  : function (element, errorClass, validClass) {
          $(element).parents(".error").removeClass(errorClass).addClass(validClass);
        }
    });

    /*function submitForm(){
        var data = new FormData(document.getElementById('contact_us'));
        $('#submit_inquiry').attr("disabled", true);
        $.ajax({
          type: 'POST',
          headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
          url: '{{ route('inquiry-store') }}',
          data: data,
          cache: false,
          contentType: false, //must, tell jQuery not to process the data
          processData: false,
          success: function (response) {
            var data = response;
            if(data.success == true){
              window.location.replace("{{ route('inquiry-store') }}");
            }else{
              
            }
            $('#submit_inquiry').attr("disabled", false);
          },
          error: function(jqXHR, textStatus, errorThrown) {

          },
        });
      }*/



  // });
 </script>   
@endsection