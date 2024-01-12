<?php
require  public_path() . '/admin/header.blade.php';
?>
<div class="page-header">
    <h1 class="page-title">
    Advertisement Section
    </h1>
    <div class="pull-right">
        <a href="{{route('admins.product.create')}}" class="btn btn-primary">Add New Product</a>
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
                                    <th>Title</th>
                                    <th>price</th>
                                    <th>image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>


                            </thead>
                            <tbody>
                                <?php
                                foreach ($products as $key => $value) {
                                ?>
                                    <tr>
                                        <td><?php echo $value->id; ?></td>
                                        <td><?php echo $value->title; ?></td>
                                        <td><?php echo $value->price; ?><?php echo $value->sale_price ? ' - ' . $value->sale_price : ''; ?> </td>

                                        <td>
                                            @if ($value->img)
                                            <img src="{{ asset('/uploads/'.$value->img) }}" style="max-width: 100px; max-height: 100px;">
                                            @endif
                                        </td>
                                        <td class="update_status"><?php echo ($value->status == 1) ? '<a href="" rel="' . $value->id . '" model = "products"  class="label label-success">Active</a>' : '<a href=""  model = "products" rel="' . $value->id . '"  class="label label-danger">In-active</a>'; ?></td>
                                        <td>
                                            <a class="label full-width label-info" href='{{route("admins.product.edit", ["product" => $value->id])}}'>Edit</a>
                                            <form action='{{route("admins.product.destroy", ["product" => $value->id])}}' method="post">
                                                @method('delete')
                                                @csrf
                                                <button class="label full-width label-info border-0" type="submit"> Delete</button>
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