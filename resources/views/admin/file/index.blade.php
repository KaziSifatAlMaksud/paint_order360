<?php
require  public_path() . '/admin/header.blade.php';
?>
<div class="page-header">
    <h1 class="page-title">
        Website Setting
    </h1>
    <div class="pull-right">
        <!-- <a href="{{route('admins.website_setting.create')}}" class="btn btn-primary">Add New Product</a> -->
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
                                    <th>ID</th>
                                    <th>Key</th>
                                    <th>Value</th>
                                    <th>Action</th>
                                </tr>

                            </thead>
                            <tbody>
                                @foreach ($websiteSetting as $key => $value)
                                <tr>
                                    <td><?php echo $value->id; ?></td>
                                    <td><?php echo $value->key; ?></td>
                                    <td><?php echo $value->value; ?></td>
                                    <td>
                                        <a class="label full-width label-info" href='{{route("admins.website_setting.edit", ["website_setting" => $value->id])}}'>Edit</a>

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
<?php
require  public_path() . '/admin/footer.blade.php';
?>