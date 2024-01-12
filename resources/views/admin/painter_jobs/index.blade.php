<?php
require  public_path() . '/admin/header.blade.php';
?>

<style>
    .cst-address {
        color: red;
        font-weight: 500;
        text-align: center !important;
    }
    td.data-cols span {
    width: 50%;
    display: inline-block;
    float: left;
    text-align: left;
}
</style>
<div class="page-header">
    <h1 class="page-title">
        Jobs Uploaded that came from builders / shows all painters
    </h1>
    <div class="pull-right">
        <a href="{{route('admins.painterJob.create')}}" class="btn btn-primary">Upload to Painter profile a new job</a>
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
                        <table class="table tbale-responsive table-bordered table-striped" id="painter_table">
                            <thead>
                                <tr>
                                    <th>Painter name</th>
                                    <th>Job Address</th>
                                    <th>Plans gallery</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                    foreach ($jobs as $key => $value) {
                                        if ($value->parent_id == null || $value->parent_id == '') {
                                    ?>
                                        <tr>
                                            <td><?php echo $value->painter ? $value->painter->first_name . ' ' . $value->painter->last_name : ''; ?></td>
                                            <td class="data-cols">
                                                <span>
                                                    <?php echo $value->address; ?>
                                                </span>
                                                <span class="cst-address">Master</span>
                                            </td>
                                            <td><a class="label full-width label-primary" href="{{route('admins.plans.index', ['painterJob' => $value->id])}}">Upload image of plans</a></td>
                                            <td class="update_status"><?php echo ($value->status == 1) ? '<a href="" rel="' . $value->id . '" model="painter_jobs" class="label label-success">Active</a>' : '<a href="" model="painter_jobs" rel="' . $value->id . '" class="label label-danger">In-active</a>'; ?></td>
                                            <td>
                                                <a class="label full-width label-info" href='{{route("admins.painterJob.edit", ["painterJob" => $value->id])}}'>Edit the Order from builder</a>
                                                <a class="label full-width label-warning border-0 delete-btn" data-target="#exampleModal" data-id=<?php echo $value->id; ?>> Delete</a>
                                            </td>
                                        </tr>
                                    <?php 
                                        } else {
                                            // Show the row for other index values here
                                        }
                                    } 
                                    ?>
                {{-- old code for index code --}}
                                {{-- <?php
                                foreach ($jobs as $key => $value) {
                                ?>
                                @if()
                                    <tr>
                                        <td><?php echo $value->painter ? $value->painter->first_name . ' ' . $value->painter->last_name : ''; ?></td>
                                        <td class="data-cols">
                                            <span>
                                                <?php echo $value->address; ?>
                                            </span>
                                            <span class="cst-address"> <?php echo ($value->parent_id == null || $value->parent_id == '') ?'Master' : $value->index ?></span>
                                        </td>
                                        <td><a class="label full-width label-primary" href="{{route('admins.plans.index', ['painterJob' => $value->id])}}">Upload image of plans</a></td>
                                        <td class="update_status"><?php echo ($value->status == 1) ? '<a href="" rel="' . $value->id . '" model = "painter_jobs"  class="label label-success">Active</a>' : '<a href=""  model = "painter_jobs" rel="' . $value->id . '"  class="label label-danger">In-active</a>'; ?></td>
                                        <td><a class="label full-width label-info" href='{{route("admins.painterJob.edit", ["painterJob" => $value->id])}}'>Edit the Order from builder</a>
                                            <a class="label full-width label-warning border-0 delete-btn" data-target="#exampleModal" data-id=<?php echo $value->id; ?>> Delete</a>
                                        </td>
                                    </tr>
                                <?php } ?> --}}

                   {{-- old code for index code  is end --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <input type='hidden' class='hidden-field' value="">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                Are You Sure To This Action
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    Close
                </button>
                <a type="button" class="btn btn-primary delete-record" href="<?php echo PUBLIC_PATH . '/admin/delete_painter/' ?>">Yes</a>
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