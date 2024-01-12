<?php
require  public_path() . '/admin/header.blade.php';
?>
<div class="page-header">
    <h1 class="page-title">
        Superviser List
    </h1>
    <div class="pull-right">
        <a class="btn btn-primary" data-toggle="modal" data-target="#superviserModal">Create New Superviser</a>
    </div>
    <br/>
</div>
<div class="panel">
    <div class="panel-body container-fluid">
        <div class="row row-lg">
            <div class="col-md-12">
                <!-- Example Basic -->
                <div class="example-wrap">
                    <div class="example table-responsive">
                        <table class="table table-bordered table-striped tbale-responsive">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($supervisers as $key => $value)
                                <tr id="superviser-tr-{{$value->id}}">
                                    <td>{{ $value->name}}</td>
                                    <td>{{ $value->email}}</td>
                                    <td> {{ $value->phone}}</td>
                                    <td>
                                        <a class="label full-width label-info superviser-edit-button" data-superviser-id="{{ $value->id}}" data-toggle="modal" data-target="#superviserEditModal">Edit</a>
                                        <a class="label full-width label-danger superviser-delete-button" data-superviser-id="{{ $value->id}}">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="superviserModal" tabindex="-1" role="dialog" aria-labelledby="superviserModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form id="supervise-add-form" action="javascript:void(0)">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="superviserModalLabel">Add Supervisor to this Company</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="builder_id" id="builder-id" value="{{$builderId}}">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Name </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="name" placeholder="Supervisor Name" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Email: </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="email" placeholder="Supervisor Email" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Phone Number: </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="phone" placeholder="Phone Number" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="form-group">
                        <div class="col-sm-12 text-center"><br>
                            <button type="submit" class="btn btn-primary" id="superviser-add">Add</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="superviserEditModal" tabindex="-1" role="dialog" aria-labelledby="superviserEditModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document"> 
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="superviserEditModalLabel">Edit Superviser</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="superviser-edit-body">
                 
                </div>
                <div class="modal-footer">
               
                </div>
            </div> 
    </div>
</div>

<script>  
    $(document).on('click', '#superviser-add', function(e) {
        var id = $("#builder-id").val();
        var url = "{{route('admins.superviser.store')}}";
        var form = $("#supervise-add-form");
        $.ajax(url, {
            type: 'POST', // http method
            data: form.serialize(), // data to submit
            success: function(data, status, xhr) {
                $("#superviserModal").modal("hide");  
                $("#supervise-add-form")[0].reset();
                location.reload();
            },
            error: function(jqXhr, textStatus, errorMessage) {
                console.log(jqXhr);
                // $('p').append('Error' + errorMessage);
            }
        });
    });
     
    $(document).on('click', '.superviser-edit-button', function(e) {
        var id = $(this).data("superviser-id");
        var url = "{{route('admins.superviser.edit',['id' =>'_id_'])}}";
        url = url.replace('_id_', id); 
         
        $.ajax(url, {
            type: 'GET', // http method 
            success: function(data, status, xhr) {
               $("#superviser-edit-body").html(data);
            },
            error: function(jqXhr, textStatus, errorMessage) {
                // $('p').append('Error' + errorMessage);
            }
        });
    });

    $(document).on('click', '.superviser-delete-button', function(e) {
        var id = $(this).data("superviser-id");
        var url = "{{route('admins.superviser.destroy',['id' =>'_id_'])}}";
        url = url.replace('_id_', id); 
         
        $.ajax(url, {
            type: 'delete', // http method 
            data: {'_token': "{{csrf_token()}}"}, // http method 
            success: function(data, status, xhr) { 
              $("#superviser-tr-"+id).fadeOut();
            },
            error: function(jqXhr, textStatus, errorMessage) {
                // $('p').append('Error' + errorMessage);
            }
        });
    });

    $(document).on('click', '#superviser-edit', function(e) {
        var id = $(this).data("superviser-id");
        var url = "{{route('admins.superviser.update',['id' =>'_id_'])}}";
        url = url.replace('_id_', id); 
        var form = $("#supervise-edit-form");
        $.ajax(url, {
            type: 'PUT', // http method
            data: form.serialize(), // data to submit
            success: function(data, status, xhr) {
                $("#superviserEditModal").modal("hide");  
                $("#supervise-edit-form")[0].reset();
                location.reload();
            },
            error: function(jqXhr, textStatus, errorMessage) {
                // $('p').append('Error' + errorMessage);
            }
        });
    });
</script>

<?php
require  public_path() . '/admin/footer.blade.php';
?>