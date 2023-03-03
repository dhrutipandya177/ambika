@extends('layouts.admin.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="float-right page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Admin</a></li>
                        <li class="breadcrumb-item active">Notification Management</li>
                    </ol>
                </div>
                <h5 class="page-title">Notification Management</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <h4 class="header-title">Notification Management</h4>
                            </div>
                            <div class="col-4">
                                <a class="btn btn-success pull-right" href="javascript:void(0)" data-toggle="modal" data-target="#addNotificationModal" id="add_notification_modal" title="Add Service">Add</a>
                            </div>
                        </div>
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                        <br>
                        <div class="table-responsive">
                            <table id="adv_table" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade bs-example-modal-center"  id="addNotificationModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form id="add_notificationform" name="add_notificationform" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-body">
                       <div class="row">
                            <div class="col-12">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" name="title" id="title" placeholder="Enter tip of the day title">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="description">Description</label>
                                <textarea class="form-control" name="description" id="description" placeholder="Enter tip of the day description"></textarea>
                            </div>
                        </div>
                       {{-- <div class="row">
                            <div class="col-12">
                                <label for="image">Image</label>
                                <input type="file" class="form-control" name="image" id="image" >
                            </div>
                        </div>--}}
                        @if(!empty($users))
                          <div class="row">
                            <div class="col-12">
                                <label for="users">Users</label>
                                <select name="users[]" id="users" class="form-control" multiple="multiple">
                                  <option value="" disabled="disabled">Select Users</option>
                                  @foreach($users as $user)
                                  <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->phone_no }})</option>
                                  @endforeach
                                </select>
                            </div>

                          </div>
                        @endif
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">No</button>
                        <button type="submit" name="addbutton" class="btn btn-success" id="addbutton">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript">
      $(document).ready(function(){
        oTable= $('#adv_table').DataTable({
          processing: true,
          serverSide: true,
          bPaginate: true,
          "columnDefs": [
            { "orderable": false, "targets": [0] },
            { "orderable": true, "targets": [1, 2, 3] }
          ],
          //sPaginationType: "full_numbers",
          ajax : "{{ route('notification.get-data') }}",
          columns: [
            {data: 'title', name: 'title'},
            {data: 'description', name: 'description'},
            {data: 'date', name: 'date'},
            {data: 'action' , name : 'action', orderable : false ,searchable: false},
          ]
        });
      })
      $("#add_notificationform").validate({
        rules: {
          notification_type: {
            required: true,
          },
          title: {
            required: true,
          },
          description: {
            required: true,
          }
        },
        messages: {
          title: {
            required: "Please enter a title.",
          },
          description: {
            required: "Please enter a description.",
          }
        },
        invalidHandler: function (form, validator) {
          //
        },
        submitHandler: function (form) {
          addNotification();
        }
      });
      function addNotification(){
        var notification_data = $("#add_notificationform").serialize();
        var form = $('#add_notificationform')[0];
        var data = new FormData(form);
        $('#addbutton').attr("disabled", true);
        $.ajax({
          type: 'POST',
          headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
          url: '{{ route('notification.store') }}',
          data: data,
          processData: false,  // Important!
          contentType: false,
          cache: false,
          success: function (response) {
            var data = response;
            if(data.status == 1){
              toastr.success(data.msg, 'Easy Save');
              window.location.reload();
            }else{
              var myArr = JSON.parse(data.msg);
              $.each(myArr, function( index, value ) {
                toastr.error(value, 'Easy Save');
              });
            }
            $('#addbutton').attr("disabled", false);
          },
          error: function(jqXHR, textStatus, errorThrown) {

          },
        });
      }
      function deleteNotification(id){
        Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.value) {
            $.ajax({
              type: 'POST',
              headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
              url: '{{ route('notification.delete') }}',
              data: {id:id},
              success: function (response) {
                var data = response;
                if(data.status == 1){
                  Swal.fire(
                   'Deleted!',
                   data.msg,
                   'success'
                  )
                  oTable.draw();
                }else{
                  var myArr = JSON.parse(data.msg);
                  $.each(myArr, function( index, value ) {
                    toastr.error(value, 'Quiz');
                  });
                }
              },
              error: function(jqXHR, textStatus, errorThrown) {

              },
            });
          }
        })
      }
    </script>
@endsection
