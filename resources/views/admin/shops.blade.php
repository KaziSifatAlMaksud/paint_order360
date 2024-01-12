<?php
require  public_path().'/admin/header.blade.php';
?>
<div class="page-header">
    <h1 class="page-title">
        Shops
    </h1>
    <div class="pull-right">
         <a href="<?php echo PUBLIC_PATH.'/admin/add_shop';?>" class="btn btn-primary" >Add New Shop</a> 
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
                                    <th>Shop Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                foreach ($shops as $key => $value) {
                                ?>
                                <tr>
                                    <td><?php echo $value->id;?></td>
                                    <td><?php echo $value->name;?></td>
                                    <td><?php echo $value->phone;?></td>
                                    <td><?php echo $value->email;?></td>
                                    <td class="update_status"><?php echo ($value->status == 1) ? '<a href="" rel="'.$value->id.'" model = "shop"  class="label label-success">Active</a>' : '<a href=""  model = "shop" rel="'.$value->id.'"  class="label label-danger">In-active</a>';?></td>
                                    <td>
                                        <a class="label full-width label-primary" href="shop_details/<?php echo $value->id;?>">View</a>
                                        <a class="label full-width label-info" href="edit_shop/<?php echo $value->id;?>">Edit</a>
                                        <a class="label full-width label-danger" href="<?php echo PUBLIC_PATH.'/admin/delete/shop/'.$value->id;?>">Delete</a>
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
require  public_path().'/admin/footer.blade.php';
?>