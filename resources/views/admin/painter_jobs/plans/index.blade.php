<?php
require  public_path() . '/admin/header.blade.php';
?>
<div class="page-header">
    <h1 class="page-title">
        plans
    </h1>
    <div class="pull-right">
        <a href="{{route('admins.plans.create', ['painterJob'=> $painterJob->id])}}" class="btn btn-primary">Add New Image</a>
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
                        <table class="table table-bordered table-striped tbale-responsive" id="painter_table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($gallaryPlans as $key => $value) {
                                ?>
                                    <tr>
                                        <td><?php echo $value->id; ?></td>
                                        <td>
                                            <img src="{{ asset('/gallery_images/'.$value->img_url) }}" style="width: 50px;">
                                        </td>
                                        <td>

                                            <form action="{{route('admins.plans.destroy', ['painterJob'=> $painterJob->id, 'plan' => $value->id])}}" method="Post">
                                                @csrf
                                                @method('delete')
                                                <button class="label full-width label-danger" type="sumbit">Delete</button>
                                            </form>
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
<?php
require  public_path() . '/admin/footer.blade.php';
?>