@extends('layouts.admin.master')

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="float-right page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Celt</a></li>
                        <li class="breadcrumb-item active">Question Management</li>
                    </ol>
                </div>
                <h5 class="page-title">Question Management</h5>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <h4 class="header-title">Question Managment</h4>
                                @can('questions-create')
                                    <a class="btn btn-success pull-right" href="javascript:void(0)" data-toggle="modal" data-target="#addQuestion" title="Add Currency">Add</a>
                                @endcan
                            </div>
                        </div>
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                        <br>
                        <table id="question_table" class="table table-bordered dt-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <td>Question</td>
                                <td>Question Image</td>
                                <td>Sub Topic</td>
                                <td>Option 1</td>
                                <td>Option 2</td>
                                <td>Option 3</td>
                                <td>Option 4</td>
                                <td>Answer</td>
                                <td>Time</td>
                                <td>Points</td>
                                <td>Action</td>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- Add Topics -->
    <div class="modal fade bs-example-modal-center"  id="addQuestion" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form method="post" id="add_question" name="add_question">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title mt-0">Add Question</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Topic:</strong>
                                    <select name="topic_id" id="topic_id" class="form-control" onchange="getSubTopic()">
                                        <option value="">Select Topic</option>
                                        @if(count($topic) > 0)
                                            @foreach($topic as $t)
                                                <option value="{{ $t->id }}">{{ $t->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Sub Topic:</strong>
                                    <select name="sub_topic_id" id="sub_topic_id" class="form-control">
                                        <option value="">Select Sub Topic</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Question:</strong>
                                    <input type="text" name="question" id="question" placeholder="Enter Question" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Question Image:</strong>
                                    <input type="file" name="question_image" id="question" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Option 1:</strong>
                                    <input type="text" name="option1" id="option1" placeholder="Enter option 1" class="form-control">
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Option 2:</strong>
                                    <input type="text" name="option2" id="option2" placeholder="Enter option 2" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Option 3:</strong>
                                    <input type="text" name="option3" id="option3" placeholder="Enter option 3" class="form-control">
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Option 4:</strong>
                                    <input type="text" name="option4" id="option4" placeholder="Enter option 4" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Correct Answer:</strong>
                                    <select name="correct_answer" id="correct_answer" class="form-control">
                                        <option value="1">Option 1</option>
                                        <option value="2">Option 2</option>
                                        <option value="3">Option 3</option>
                                        <option value="4">Option 4</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Time(In Seconds):</strong>
                                    <input type="number" min="0" name="time" id="time" placeholder="Enter time" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Points:</strong>
                                    <input type="number" min="0" name="points" id="points" placeholder="Enter points" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="add_question_button" name="add_question_button">Add</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Update Topics -->
    <div class="modal fade bs-example-modal-center"  id="editQuestion" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form method="post" id="edit_question" name="edit_question">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title mt-0">Update Question</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <input type="hidden" id="question_id" name="question_id">
                                    <strong>Topic:</strong>
                                    <select name="topic_id" id="topic_id" class="form-control topic_id" onchange="getSubTopicEdit()">
                                        <option value="">Select Topic</option>
                                        @if(count($topic) > 0)
                                            @foreach($topic as $t)
                                                <option value="{{ $t->id }}">{{ $t->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Sub Topic:</strong>
                                    <select name="sub_topic_id" id="sub_topic_id" class="form-control sub_topic_id">
                                        <option value="">Select Sub Topic</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Question:</strong>
                                    <input type="text" name="question" id="question" placeholder="Enter Question" class="form-control question">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Question Image:</strong>
                                    <input type="file" name="question_image" id="question" class="form-control">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <img class="mdi-image-album" src="" id="imageview" name="imageview" height="100px" width="100px" style="display: none">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Option 1:</strong>
                                    <input type="text" name="option1" id="option1" placeholder="Enter option 1" class="form-control option1">
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Option 2:</strong>
                                    <input type="text" name="option2" id="option2" placeholder="Enter option 2" class="form-control option2">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Option 3:</strong>
                                    <input type="text" name="option3" id="option3" placeholder="Enter option 3" class="form-control option3">
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Option 4:</strong>
                                    <input type="text" name="option4" id="option4" placeholder="Enter option 4" class="form-control option4">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Correct Answer:</strong>
                                    <select name="correct_answer" id="correct_answer" class="form-control correct_answer">
                                        <option value="1">Option 1</option>
                                        <option value="2">Option 2</option>
                                        <option value="3">Option 3</option>
                                        <option value="4">Option 4</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Time(In Seconds):</strong>
                                    <input type="number"  name="times" id="times" placeholder="Enter time" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Points:</strong>
                                    <input type="number" min="0" name="points" id="points" placeholder="Enter points" class="form-control points">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="edit_question_button" name="edit_question_button">Save</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function(){
            oTable=$('#question_table').DataTable({
                processing: true,
                serverSide: true,
                bPaginate: true,
                "columnDefs": [
                    { "orderable": false, "targets": [0] },
                    { "orderable": true, "targets": [1, 2] }
                ],
                //sPaginationType: "full_numbers",
                ajax : "{{ route('getquestiondata') }}",
                columns: [
                    //{data:'id',name:'id'},
                    {data: 'question', name: 'question'},
                    {data: 'question_image', name: 'question_image'},
                    {data: 'sub_topic_name', name: 'sub_topic_name'},
                    {data: 'option1', name: 'option1'},
                    {data: 'option2', name: 'option2'},
                    {data: 'option3', name: 'option3'},
                    {data: 'option4', name: 'option4'},
                    {data: 'answer', name: 'answer'},
                    {data: 'time', name: 'time'},
                    {data: 'points', name: 'points'},
                    {data: 'action' , name : 'action', orderable : false ,searchable: false},
                ]
            });
        });
        $("#add_question").validate({
            errorClass: 'invalid-feedback animated fadeInDown',
            errorElement: 'div',
            rules: {
                topic_id: {
                    required: true,
                },
                sub_topic_id: {
                    required: true,
                },
                question: {
                    required: true,
                },
                question_image: {
                    extension: "jpg|jpeg|png|ico|bmp"
                },
                option1: {
                    required: true,
                },
                option2: {
                    required: true,
                },
                option3: {
                    required: true,
                },
                option4: {
                    required: true,
                },
                correct_answer: {
                    required: true,
                },
                times: {
                    required: true,
                },
                points: {
                    required: true,
                },
            },
            submitHandler: function (form) {
                addQuestion();
            },
            highlight: function(element, errorClass, validClass) {
                $(element).parents("div.form-control").addClass(errorClass).removeClass(validClass);
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).parents(".error").removeClass(errorClass).addClass(validClass);
            }
        });
        function addQuestion(){
            //var amenities_data = $("#add_amenities_form").serialize();
            var question_data = new FormData(document.getElementById('add_question'));
            $('#add_question_button').attr("disabled", true);
            $.ajax({
                type: 'POST',
                headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                url: '{{ route('question.store') }}',
                data: question_data,
                cache: false,
                contentType: false, //must, tell jQuery not to process the data
                processData: false,
                success: function (response) {
                    var data = response;
                    if(data.status == 1){
                        toastr.success(data.msg, 'Quiz');
                        oTable.draw();
                        $('#add_question').trigger("reset");
                        $('#addQuestion').modal('hide');
                        $('body').removeClass('modal-open');
                        $('.modal-backdrop').remove();
                        //window.location.reload();
                    }else{
                        var myArr = JSON.parse(data.msg);
                        $.each(myArr, function( index, value ) {
                            toastr.error(value, 'Quiz');
                        });
                    }
                    $('#add_question_button').attr("disabled", false);
                },
                error: function(jqXHR, textStatus, errorThrown) {

                },
            });
        }
        function editQuestion(id){
            $.ajax({
                type: 'POST',
                headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                url: '{{ route('question.edit') }}',
                data: {id:id},
                success: function (response) {
                    var data = response;
                    if(data.status == 1){

                        $('.sub_topic_id').val(data.question.sub_topic_id);
                        $('.question').val(data.question.question);
                        $('.option1').val(data.question.option1);
                        $('.option2').val(data.question.option2);
                        $('.option3').val(data.question.option3);
                        $('.option4').val(data.question.option4);
                        $('.correct_answer').val(data.question.answer);
                        $('#times').val(data.question.time);
                        $('.points').val(data.question.points);
                        $('#question_id').val(data.question.id);
                        $('#imageview').hide();
                        if(data.question.question_image){
                            $('#imageview').show();
                            $('#imageview').attr('src',data.question.question_image);
                        }
                        $('.topic_id').val(data.question.topic_id).change();
                        $('#editQuestion').modal();
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
        $("#edit_question").validate({
            errorClass: 'invalid-feedback animated fadeInDown',
            errorElement: 'div',
            rules: {
                topic_id: {
                    required: true,
                },
                sub_topic_id: {
                    required: true,
                },
                question: {
                    required: true,
                },
                question_image: {
                    extension: "jpg|jpeg|png|ico|bmp"
                },
                option1: {
                    required: true,
                },
                option2: {
                    required: true,
                },
                option3: {
                    required: true,
                },
                option4: {
                    required: true,
                },
                correct_answer: {
                    required: true,
                },
                time: {
                    required: true,
                },
                points: {
                    required: true,
                },
            },
            submitHandler: function (form) {
                updateQuestion();
            },
            highlight: function(element, errorClass, validClass) {
                $(element).parents("div.form-control").addClass(errorClass).removeClass(validClass);
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).parents(".error").removeClass(errorClass).addClass(validClass);
            }
        });
        function updateQuestion(){
            //var amenities_data = $("#add_amenities_form").serialize();
            var question_data = new FormData(document.getElementById('edit_question'));
            $('#edit_question_button').attr("disabled", true);
            $.ajax({
                type: 'POST',
                headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                url: '{{ route('question.update') }}',
                data: question_data,
                cache: false,
                contentType: false, //must, tell jQuery not to process the data
                processData: false,
                success: function (response) {
                    var data = response;
                    if(data.status == 1){
                        toastr.success(data.msg, 'Quiz');
                        oTable.draw();
                        $('#edit_question').trigger("reset");
                        $('#editQuestion').modal('hide');
                        $('body').removeClass('modal-open');
                        $('.modal-backdrop').remove();
                        //window.location.reload();
                    }else{
                        var myArr = JSON.parse(data.msg);
                        $.each(myArr, function( index, value ) {
                            toastr.error(value, 'Quiz');
                        });
                    }
                    $('#edit_question_button').attr("disabled", false);
                },
                error: function(jqXHR, textStatus, errorThrown) {

                },
            });
        }
        function deleteQuestion(id){
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
                        url: '{{ route('question.delete') }}',
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

        function getSubTopic(){
            var topic=$('#topic_id').val();
            $('#sub_topic_id').empty().append('<option value="">select sub topic</option>');
            $.ajax({
                type: 'POST',
                headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                url: '{{ route('question.getSubTopic') }}',
                data: {topic:topic},
                //cache: false,
                //contentType: false, //must, tell jQuery not to process the data
                //processData: false,
                success: function (response) {
                    var data = response;
                    if (data != '') {
                        for (i in data) {
                            $("#sub_topic_id").append("<option value='" + data[i].id + "'>" + data[i].title + "</option>");
                        }
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {

                },
            });
        }

        function getSubTopicEdit(){
            var topic=$('.topic_id').val();
            var question_id=$('#question_id').val();
            $('.sub_topic_id').empty().append('<option value="">select sub topic</option>');
            $.ajax({
                type: 'POST',
                headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                url: '{{ route('question.getSubTopicEdit') }}',
                data:  { topic : topic, question_id : question_id },
                success: function (response) {
                    var data = response;
                    var subtopic=data.subtopic;
                    if (subtopic != '') {
                        for (i in subtopic) {
                            console.log(subtopic[i]);
                            if(subtopic[i].id == data.question.sub_topic_id){
                                $(".sub_topic_id").append("<option value='" + subtopic[i].id + "' selected>" + subtopic[i].title + "</option>");
                            }else{
                                $(".sub_topic_id").append("<option value='" + subtopic[i].id + "'>" + subtopic[i].title + "</option>");
                            }
                        }
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {

                },
            });
        }
    </script>
@endsection
