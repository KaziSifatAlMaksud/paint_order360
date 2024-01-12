<?php
require  public_path() . '/admin/header.blade.php';
?>
<div class="page-header">
    <h1 class="page-title">
        This is all register user/painter see the job from the builders uploaded and the orders painter do them selfs
    </h1>
    <div class="pull-left"> <br>
        <a href="<?php echo PUBLIC_PATH . '/admin/add_painter'; ?>" class="btn btn-success">Register A New Painter</a>
        <br>
        <div class="pull-left">
            <a href="{{route('admins.painterJob.create')}}" class="btn btn-primary">Upload job from builder to Painter profile </a>
        </div>
        <a class="label full-width label-primary" href="{{route('admins.orders')}}">Orders made by painters - see all orders</a>
        <a class="label full-width label-warning" href="{{route('admins.painterJob.index')}}">see all upload / Upload new Jobs from builder</a>
    </div>
    <br />
</div>
<br><br><br><br><br>
<div class="panel">
    <div class="panel-body container-fluid">
        <div class="row row-lg">
            <div class="col-md-12">
                <!-- Example Basic -->
                <div class="example-wrap">
                    <div class="example table-responsive">
                        <table class="table tbale-responsive table-bordered table-striped" id="painter_table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>PAINTER</th>
                                    <th>PAINTER</th>
                                    <th>JOBS & ORDERS</th>
                                    <th>PAINTER</th>
                                    <th>PAINTER PROFILE</th>
                                </tr>
                            </thead>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Comapany Name</th>
                                    <th>Orders that painter himself did and Jobs uploaded from builders</th>
                                    <th>Status</th>
                                    <th>Edit Painter profile / Add paint account</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($painters as $key => $value) {
                                ?>
                                    <tr>
                                        <td><?php echo $value->id; ?></td>
                                        <td><?php echo $value->first_name; ?> <?php echo $value->last_name; ?></td>
                                        <td><?php echo $value->company_name; ?></td>
                                        <td>
                                            <a class="label full-width label-primary" href="{{route('admins.orders', ['painter' => $value->id])}}">See order this painter made</a>
                                            <a class="label full-width label-warning" href="{{route('admins.painterJob.index', ['painter' => $value->id])}}">see all upload to this painer from builder</a>
                                        </td>
                                        <td class="update_status"><?php echo ($value->status == 1) ? '<a href="" model = "users" rel="' . $value->id . '" class="label label-success">Active</a>' : '<a href="" model = "users"  rel="' . $value->id . '"  class="label label-danger">In-active</a>'; ?></td>
                                        <td>
                                            <a class="label full-width label-primary" href="painter_details/<?php echo $value->id; ?>">Painters Profile/ paint accounts</a>
                                            <!-- <a class="label full-width label-info" href="edit_painter/<?php echo $value->id; ?>">Edit painters details</a>  -->
                                            <a class="label full-width label-danger delete-btn" data-target="#exampleModal" data-id=<?php echo $value->id; ?>>Delete profile and jobs</a>
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
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Panter</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are You Sure To Delete
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a type="button" class="btn btn-primary delete-record" href="<?php echo PUBLIC_PATH . '/admin/delete/users/' ?>">Delete</a>
            </div>
        </div>
    </div>
</div>
<script>
    $('.delete-btn').on('click', function() {
        var id = $(this).attr('data-id');
        var url = $('.delete-record').attr('href');
        var delete_url = url + id;
        $('.delete-record').attr('href', delete_url)
        $('#deleteModal').modal('show');
    });
</script>
<?php
require  public_path() . '/admin/footer.blade.php';
?>