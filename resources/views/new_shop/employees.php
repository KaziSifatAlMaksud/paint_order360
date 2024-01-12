<?php
require  public_path().'/s_shop/header.blade.php';
?>
<div class="page-header">
    <h1 class="page-title">
        Employees
    </h1>
    <div class="pull-right">
         <a href="<?php echo PUBLIC_PATH.'/shop/add_emp';?>" class="btn btn-primary" >Add New Employees</a> 
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
                        <table class="table tbale-responsive table-bordered table-striped" id="emp_table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                foreach ($employees as $key => $value) {
                                ?>
                                <tr>
                                    <td><?php echo $value->id;?></td>
                                    <td><?php echo $value->first_name;?></td>
                                    <td><?php echo $value->last_name;?></td>
                                    <td><?php echo $value->phone;?></td>
                                    <td><?php echo $value->email;?></td>
                                    <td class="update_status"><?php echo ($value->status == 1) ? '<a href="" model = "employees" rel="'.$value->id.'" class="label label-success">Active</a>' : '<a href="" model = "employees" rel="'.$value->id.'"  class="label label-danger">In-active</a>';?></td>
                                    <td>
                                        <a class="label full-width label-success" href="emp_details/<?php echo $value->id;?>">View</a>
                                        <a class="label full-width label-info" href="edit_emp/<?php echo $value->id;?>">Edit</a>
                                        <a class="label full-width label-danger" href="<?php echo PUBLIC_PATH.'/shop/delete_emp/'.$value->id;?>">Delete</a>
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
require  public_path().'/s_shop/footer.blade.php';
?>