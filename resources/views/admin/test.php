<?php
require  public_path().'/admin/header.blade.php';
?>
<div class="page-header">
    <h1 class="page-title">
        Brands
    </h1>
    <div class="pull-right">
        <a href="<?php echo PUBLIC_PATH.'/admin/add_brand' ?>" class="btn btn-primary" >Add New Brand</a>
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
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                 foreach ($brands as $key => $value) {
                                ?>
                                <tr>
                                    <td><?php echo $value->id;?></td>
                                    <td><?php echo $value->name;?></td>
                                    <td> 
                                        <a class="label label-info full-width" href="edit_brand/<?php echo $value->id;?>">edit</a> 
                                        <a class="label full-width label-danger" href="<?php echo PUBLIC_PATH.'/admin/delete/brands/'.$value->id;?>">Delete</a>
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