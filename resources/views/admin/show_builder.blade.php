<?php
require  public_path() . '/admin/header.blade.php';
?>
<div class="page-header">
    <h1 class="page-title">
        Builders List
    </h1>
    <div class="pull-right">
        <a href="{{route('admins.admin_builder.create')}}" class="btn btn-primary">Create New Builder</a>
    </div>
    <br />
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
                                    <th>Compnay Name</th>
                                    <th>Builder Email</th>
                                    <th>Brand</th>
                                    <!-- <th>Address</th> -->
                                    <th>Phone Number</th>
                                    <!-- <th>Abn</th>
                                        <th>Created At</th> -->
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($builders as $key => $value) {
                                ?>
                                    <tr id="builder-tr-{{$value->id}}">
                                        <td><?php echo $value->company_name; ?></td>
                                        <td><?php echo $value->builder_email; ?></td>
                                        <td> <?php echo $value->brand ? $value->brand->name : '' ?></td>
                                        {{--<td> <?php echo $value->address; ?></td> --}}
                                        <td> <?php echo $value->phone_number; ?></td>
                                        {{-- <td> <?php echo $value->abn; ?></td>--}}
                                        {{-- <td> <?php echo $value->created_at; ?></td>--}}
                                        <td>
                                            <a class="label full-width label-primary superviser-create" href="{{route('admins.superviser.index',['id' => $value->id])}}">Supervisers</a>
                                            <a class="label full-width label-info" href="{{route('admins.admin_builder.edit', ['admin_builder' => $value->id]) }}">Edit</a>
                                            <a class="label full-width label-danger builder-delete-button" data-builder-id="{{$value->id}}">Delete</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php
require  public_path() . '/admin/footer.blade.php';
?>

<script>
    $(document).on('click', '.builder-delete-button', function(e) {
        var id = $(this).data("builder-id");
        var url = "{{route('admins.admin_builder.destroy',['admin_builder' =>'_id_'])}}";
        url = url.replace('_id_', id);

        $.ajax(url, {
            type: 'delete', // http method 
            data: {
                '_token': "{{csrf_token()}}"
            }, // http method 
            success: function(data, status, xhr) {
                $("#builder-tr-" + id).fadeOut();
            },
            error: function(jqXhr, textStatus, errorMessage) {
                // $('p').append('Error' + errorMessage);
            }
        });
    });
</script>