@extends('backend.admin.layouts.master')
@section('content')
<div class="row">
    {{-- add user modal--}}
    <div class="modal fade" id="VideoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create latest Video</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.video.add')}}" method="post" id="VideoAddForm"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title <span style="color: red; font-weight:bold">*</span></label>
                            <input type="text" class="form-control" name="title" id="title"
                                placeholder="Enter Your Title">
                            <span class="text-danger error-message" id="title-error"></span>
                        </div>
                        <div class="form-group">
                            <label for="title">Sub Title <span style="color: red; font-weight:bold">*</span></label>
                            <input type="text" class="form-control" name="sub_title" id="sub_title"
                                placeholder="Enter your sub title">
                            <span class="text-danger error-message" id="sub_title-error"></span>
                        </div>
                        <div class="form-group">
                            <label for="title">Url <span style="color:red;font-weight:bold">*</span></label>
                            <input type="text" class="form-control" name="url" id="url" placeholder="Enter your url">
                            <span class="text-danger error-message" id="url-error"></span>
                        </div>



                        <div class="form-group">
                            <label for="status">Status : </label>&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;<input type="radio" id="statusAddOne" name="status" value="1"
                                checked>&nbsp;&nbsp;&nbsp;<label for="statusAddOne">Active</label>
                            &nbsp;&nbsp;&nbsp;<input type="radio" id="statusAddTwo" name="status"
                                value="0">&nbsp;&nbsp;&nbsp;<label for="statusAddTwo">Inactive</label>
                            <span class="text-danger error-message" id="status-error"></span>
                        </div>
                        <button type="submit"
                            style="float:right; margin-bottom:8px; padding-left:25px; padding-right:25px; font-size:15px"
                            class="btn btn-success" id="ads_submit">Submit</button>
                    </form>
                </div>


            </div>
        </div>
    </div>

    {{-- End add user modal--}}


    {{-- news edit modal start --}}

    <!-- Modal -->
    <div class="modal fade" id="VideoEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Latest Video Edit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>
                <div class="modal-body">
                    <form id="videoEditFrom" action="{{ route('admin.video.update') }}" method="POST"
                        class="form-horizontal mt-2 sales-form" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="video_id" id="video_id">
                        <div class="row mb-3">
                            <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                <label class="control-label">Title <span
                                        style="color:red;font-weight:bold">*</span></label>
                                <input id="up_title" name="up_title" class="form-control rounded"
                                    placeholder="car title" type="text">
                                <div class="text-danger  up_title-error"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="title">Sub Title <span style="color:red;font-weight:bold">*</span></label>
                            <input type="text" class="form-control" name="up_sub_title" id="up_sub_title"
                                placeholder="Enter Your Title">
                            <span class="text-danger error-message" id="up_sub_title-error"></span>
                        </div>
                        <div class="form-group">
                            <label for="title">Url <span style="color:red;font-weight:bold">*</span></label>
                            <input type="text" class="form-control" name="up_url" id="up_url"
                                placeholder="Enter Your Title">
                            <span class="text-danger error-message" id="up_url-error"></span>
                        </div>
                        <div class="form-group">
                            <label for="status">Status : </label>&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;<input type="radio" id="statusEditOne" name="status" value="1"
                                checked>&nbsp;&nbsp;&nbsp;<label for="statusEditOne">Active</label>
                            &nbsp;&nbsp;&nbsp;<input type="radio" id="statusEditTwo" name="status"
                                value="0">&nbsp;&nbsp;&nbsp;<label for="statusEditTwo">Inactive</label>
                            <span class="text-danger error-message" id="status-error"></span>
                        </div>
                        <button type="submit" id="ads_update_submit"
                            class="btn btn-primary float-right mt-4">Update</button>
                    </form>
                </div>

            </div>
        </div>
    </div>

    {{-- news edit modal close --}}
    <div class="col-md-12">
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Latest video List</h3>
                    <a href="" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#VideoModal">
                        <i class="fas fa-plus-circle"></i> Add Video</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered table-striped video_table">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Title</th>
                                <th>Sub Title</th>
                                <th>Url</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card-body -->

            <!-- /.card -->

        </section>

    </div>
</div>

@endsection

@push('js')
<script>
    // description editor js close
    // news add data
    $(document).ready(function(){
        $(function() {
    var table = $('.video_table').DataTable({
    dom: "lBfrtip",
    buttons: ["copy", "csv", "excel", "pdf", "print"],

    pageLength: 25,
    processing: true,
    serverSide: true,
    searchable: true,
    "ajax": {
        "url": "{{ route('admin.video.show') }}",
        "datatype": "json",
        "dataSrc": "data",
        "data": function(data) {

        }
    },

    drawCallback: function(settings) {
        $('#is_check_all').prop('checked', false);
    },

    columns: [
        {
        name: 'DT_RowIndex',
        data: 'DT_RowIndex',
        sWidth: '3%'
    },


    {
        data: 'title',
        name: 'title',
        sWidth: '20%'
    },
    {
        data: 'sub_title',
        name: 'sub_title',
        sWidth: '20%'
    },
    {
        data: 'url',
        name: 'url',
        sWidth: '20%'
    },
    {
        data: 'status',
        name: 'status',
        sWidth: '10%'
    },

        {
            data: 'action',
            name: 'action',
            sWidth: "15%",
            orderable: false,
            searchable: false
        },

    ],
    lengthMenu: [
        [10, 25, 50, 100, 500, 1000, -1],
        [10, 25, 50, 100, 500, 1000, "All"]
    ],
});
table.buttons().container().appendTo('#exportButtonsContainer');

$(document.body).on('click', '#is_check_all', function(event) {
    alert('Checkbox clicked!');
    var checked = event.target.checked;
    if (true == checked) {
        $('.check1').prop('checked', true);
    }
    if (false == checked) {
        $('.check1').prop('checked', false);
    }
});

$('#is_check_all').parent().addClass('text-center');

$(document.body).on('click', '.check1', function(event) {

    var allItem = $('.check1');

    var array = $.map(allItem, function(el, index) {
        return [el]
    })

    var allChecked = array.every(isSameAnswer);

    function isSameAnswer(el, index, arr) {
        if (index === 0) {
            return true;
        } else {
            return (el.checked === arr[index - 1].checked);
        }
    }

    if (allChecked && array[0].checked) {
        $('#is_check_all').prop('checked', true);
    } else {
        $('#is_check_all').prop('checked', false);
    }
});

//Submit filter form by select input changing
$(document).on('change', '.submitable', function() {

    table.ajax.reload();

});


});
        $.ajaxSetup({
         headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
       });

    $(document).on('submit','#VideoAddForm', function (e) {
    e.preventDefault();
    var formData = new FormData($(this)[0]);
        $('#ads_submit').text('Loading...');
            // Clear previous validation errors
        var errorFields = ['title'];
        errorFields.forEach(function (field) {
        $('#' + field + '-error').text('');
         });

          var form = this;

    // Set the content of the editor to an empty string
    $.ajax({
        processData: false,
        contentType: false,
        url: $(this).attr('action'),
        type: $(this).attr('method'),
        data: formData,
        success: function (res) {
            console.log(res);
            $('.error-message').html('');
            if (res.errors) {
                $.each(res.errors, function (key, value) {
                    $('#' + key + '-error').html(value[0]);
                });
                $('#ads_submit').text('Submit');
            }

            if (res.status === 'success') {
               
                $('.video_table').DataTable().draw(false);
                toastr.success(res.message);
                $('#VideoModal').modal('hide');
                $('#ads_submit').text('Submit');
                form.reset();
            }
        },

        error: function (xhr) {
            var errors = xhr.responseJSON.errors;
            $.each(errors, function (key, value) {
                $('#' + key + '-error').text(value[0]);
            });
            $('#ads_submit').text('Submit');
        }
    });
});


// faq delete
$(document).on('click', "#video_delete", function(e){
    e.preventDefault();
    let id = $(this).data('id');
    $.confirm({
        title: 'Delete Confirmation',
        content: 'Are you sure?',
        buttons: {
            cancel: {
                text: 'No',
                btnClass: 'btn-danger',
                action: function () {

                }
            },
            confirm: {
                text: 'Yes',
                btnClass: 'btn-primary',
                action: function () {

                    $.ajax({
                        url: "{{ route('admin.video.delete') }}",
                        type: 'post',
                        data: {
                            id: id
                        },
                        success: function (response) {
                            if (response.status == "success") {
                                toastr.success(response.message);
                                $('.video_table').DataTable().draw(false);
                            }
                        },
                        error: function (error) {
                            // Show Toastr error message
                            toastr.error(error.responseJSON.message);
                        }
                    });
                }
            }
        }
    });
});

// news show



         let editor;

        $(document).on('click', '.editvideo', function(e) {
                e.preventDefault();
                
                let id = $(this).data('id');
                let title = $(this).data('title');
                let sub_title = $(this).data('sub_title');
                let url = $(this).data('url')
                let status = $(this).data('status');
                
                $('input[name="status"][value="' + status + '"]').prop('checked', true);
                $('#video_id').val(id);
                $('#up_title').val(title);
                $('#up_sub_title').val(sub_title);
                $('#up_url').val(url);
                
               
                $('#VideoEdit').modal('show');
                
            });
            // news edit code
            $(document).on('submit', '#videoEditFrom', function(e) {
                e.preventDefault();
                var formData = new FormData($(this)[0]);
                $('#ads_update_submit').text('Loading...');
                  // Clear previous validation errors
                    var errorFields = ['up_title'];
                    errorFields.forEach(function (field) {
                    $('.' + field + '-error').text('');
                    });


                $.ajax({
                    url: $(this).attr('action'),
                    type: $(this).attr('method'),
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(res) {
                        console.log(res);
                        if (res.errors) {
                            $.each(res.errors, function (key, value) {
                                $('.' + key + '-error').html(value[0]);
                            });
                            $('#ads_update_submit').text('Submit');
                        }

                        if (res.status === 'success') {
                        toastr.success(res.message);
                        $('#VideoEdit').modal('hide');
                        $('.video_table').DataTable().draw(false);
                        $('#ads_update_submit').text('Update');
                        }

                    },
                    error: function (xhr) {
                        console.log(xhr);
                }
                });
            });


               // status change
           $(document).on('change', '.add-action-select', function(e){
                e.preventDefault();
                let id = $(this).data('id');
                $.ajax({
                    url:"{{route('admin.video.status.change')}}",
                    method:"post",
                    data:{id:id},
                    success:function(res){
                        console.log(res)
                        toastr.success(res.message);
                        $('.video_table').DataTable().draw(false);
                    }
                })
            });








    })


</script>

@endpush