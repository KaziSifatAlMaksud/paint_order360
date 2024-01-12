<?php
require  public_path() . '/s_shop/header.blade.php';

?>
<div class="page-header">
    <h1 class="page-title">
        Orders
    </h1>
    <div class="pull-right">
        <!-- <a href="<?php //echo $this->webroot.'admin/Admins/add' 
                        ?>" class="btn btn-primary" >Add New Painter</a> -->
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
                                    <th>#Order Number</th>
                                    <th>Painter Name</th>
                                    <th>Company</th>
                                    <th>Phone</th>
                                    <th>Items In Order</th>
                                    <th>Order Date</th>
                                    <th>Order Status</th>
                                    <!--<th>Pick Up / Delivery</th>-->
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
require  public_path() . '/s_shop/footer.blade.php';
?>