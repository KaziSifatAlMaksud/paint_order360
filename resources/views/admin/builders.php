<?php
require  public_path().'/admin/header.blade.php';
?>
<div class="page-header">
    <h1 class="page-title">
        Builders
    </h1>
    <div class="pull-right">
        <a href="<?php echo PUBLIC_PATH.'/admin/add_builder/'.$user_id;?>" class="btn btn-primary" >Add New Builder</a> 
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
                                    <th>Painter Name</th>
                                    <th>Builder Name</th>
                                    <th>Account Number</th>
                                    <!-- <th>Status</th> -->
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 

                                foreach ($builders as $key => $value) {
                                ?>
                                <tr>
                                    <td><?php echo $value->id;?></td>
                                    <td><?php echo $value->first_name ." ".$value->last_name;?></td>
                                    <td><?php echo $value->name;?></td>
                                    <td><?php echo $value->account_no;?></td>
                                    <!-- <td class="update_status"><?php //echo ($value->status == 1) ? '<a href="" model = "users" rel="'.$value->id.'" class="label label-success">Active</a>' : '<a href="" model = "users"  rel="'.$value->id.'"  class="label label-danger">In-active</a>';?></td> -->
                                    <td> 
                                        <a class="label full-width label-info" href="<?php echo PUBLIC_PATH.'/admin/'?>edit_builder/<?php echo $value->id;?>">Edit</a>
                                        <a class="label full-width label-danger" href="<?php echo PUBLIC_PATH.'/admin/delete/builders/'.$value->id;?>">Delete</a>
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