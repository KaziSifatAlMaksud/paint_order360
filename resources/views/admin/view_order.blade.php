<?php
require  public_path() . '/admin/header.blade.php';
/*echo '<pre>';
print_r($ordersdetails);

die;*/
?>
<style type="text/css" media="print">
    @page {
        margin: none !important;
        /*  margin:0px !important;*/
        size: auto !important;
    }

    #sidebar,
    .navbar,
    footer,
    .ph {
        width: 0px !important;
        display: none !important;
    }
</style>

<div class="page-header">
    <hr class="no_margin">
    <h1 class="page-title"> <strong>Order Number : <font class="redcolor"><?php echo @$ordersdetails[0]->o_id; ?></font> </strong></h5>
        <br>
        <h1 class="page-title"> <strong>Order By Painter :</strong> <?php echo  @$ordersdetails[0]->first_name . ' ' . @$ordersdetails[0]->last_name ?></h1>
        <br>
        <h1 class="page-title"> <strong>Order at this store :</strong> <?php echo @$ordersdetails[0]->name ?></h1>
        <br>
        <h1 class="page-title"> <strong>Date :</strong>
            <?php if (!empty(@$ordersdetails[0]->created)) {
                $show_date = $ordersdetails[0]->created;
            } else {
                $show_date = time();
            }
            echo date("d-m-Y", $show_date);
            ?>
        </h1>
        <hr class="no_margin">

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
                <hr class="no_margin">
                <!--<h5 class="text-center"> <strong>Order Number : <font class="redcolor"><?php echo @$ordersdetails[0]->o_id; ?></font> </strong></h5>   -->
                <hr class="">
                <?php $or_st = @$ordersdetails[0]->o_status; ?>
                <div class="col-md-12 border_2">
                    <!-- first ror -->
                    <div class="col-md-6 border border_1 half_width">
                        <h5> <strong> Order Status </strong></h5>
                    </div>
                    <div class="col-md-6 border_1 half_width">
                        <?php
                        if ($or_st == 0) {
                            echo '<span class="label label-warning"> Pending </span>';
                        } elseif ($or_st == 1) {
                            echo '<span class="label label-info"> In-progress </span>';
                        } elseif ($or_st == 2) {
                            echo '<span class="label label-primary"> Delevired </span>';
                        } elseif ($or_st == 3) {
                            echo ' <span class="label label-success"> Completed </span>';
                        } elseif ($or_st == 4) {
                            echo '<span class="label label-danger"> Canceled </span>';
                        }
                        ?>
                        <?php if ($or_st != 3 || $or_st != 4) { ?>
                            <!-- <span class="pull-right"><i class=" edit_class fa fa-pencil" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#myModal"></i></span> -->
                        <?php } ?>
                    </div>
                    <!-- 2nd row -->
                    <div class="col-md-6 border border_1 half_width">
                        <h5> <strong> Price </strong></h5>
                    </div>
                    <div class="col-md-6 border_1 half_width">
                        <p><?php echo (@$ordersdetails[0]->price == "0.00") ?  'Price will be updated by shop.' : '$' . @$ordersdetails[0]->price; ?></p>
                    </div>
                    <!-- 3rd row -->
                    <div class="col-md-6 border border_1 half_width">
                        <h5> <strong> Pick Up / Delivery </strong></h5>
                    </div>
                    <div class="col-md-6 border_1 half_width">
                        <p><?php if (@$ordersdetails[0]->items == 0) echo 'From Shop';
                            elseif (@$ordersdetails[0]->items == 1) echo 'Deliver To Home: ' . @$ordersdetails[0]->u_address;
                            else echo 'Deliver To Job Address: ' . @$ordersdetails[0]->address; ?></p>
                    </div>
                    <!-- 4th row -->
                    @if($ordersdetails && isset($ordersdetails[0]) && $ordersdetails[0]->type == 1)
                    <div class="col-md-6 border border_1 half_width">
                        <h5> <strong>Size </strong></h5>
                    </div>
                    <div class="col-md-6 border_1 half_width">
                        <p> <?php
                                echo $ordersdetails[0]->size.'  L';
                        // if ($ordersdetails[0]->size == 1) {
                        //         echo '15 L';
                        //     } elseif ($ordersdetails[0]->size == 2) {
                        //         echo '10 L';
                        //     } elseif ($ordersdetails[0]->size == 3) {
                        //         echo '4 L';
                        //     } elseif ($ordersdetails[0]->size == 4) {
                        //         echo '2 L';
                        //     } elseif ($ordersdetails[0]->size == 5) {
                        //         echo '1 L';
                        //     }
                             ?></p>
                    </div>
                    <!-- 5th row -->
                    <div class="col-md-6 border border_1 half_width">
                        <h5> <strong>Quantity </strong></h5>
                    </div>
                    <div class="col-md-6 border_1 half_width">
                        <p><?php echo (@$ordersdetails[0]->qty != "") ? @$ordersdetails[0]->qty : ''; ?></p>
                    </div>
                    @endif
                    <!-- 6th row -->
                    <div class="col-md-6 border border_1 half_width">
                        <h5> <strong> Paint Account </strong></h5>
                    </div>
                    <div class="col-md-6 border_1 half_width">
                        <p><?php echo @$ordersdetails[0]->builder_brand . ' ' . @$ordersdetails[0]->builder_name . ' ' . @$ordersdetails[0]->account_no; ?></p>
                    </div>
                </div>

                <div class="col-md-12 full-width text-center">
                    <!-- Example Basic -->
                    <?php
                    if (@$ordersdetails[0]->type == 0) {
                    ?>
                        <div class="example-wrap">
                            <div class="example table-responsive">
                                <table class="table table-responsive table-bordered" id="">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Color</th>
                                            <!-- <th>Sheen</th> -->
                                            <th>Size</th>
                                            <th>Amount</th>
                                            <!-- <th>Tint</th> -->
                                            <th>Brand</th>
                                            <th>Notes</th>
                                            <th>Area</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($ordersdetails as $key => $value) {
                                        ?>
                                            <tr>
                                                <td><?php echo $value->product; ?></td>
                                                <td><?php echo $value->color; ?></td>
                                                <!-- <td><?php //echo $value->s_name;
                                                            ?></td> -->
                                                <td><?php echo $value->size . ' L'; ?></td>
                                                <td><?php echo $value->qty; ?></td>
                                                <!-- <td><?php //echo $value->tint.'%';
                                                            ?></td> -->
                                                <td><?php echo $value->b_name; ?></td>
                                                <td><?php echo $value->note; ?></td>
                                                <td><?php echo $value->area; ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    <?php } elseif (@$ordersdetails[0]->type == 1) { ?>
                        <img width="200px" style="padding: 20px 0px;" class=" pop" src="<?php echo PUBLIC_PATH . '/uploads/' . $ordersdetails[0]->photo; ?>">
                    <?php } ?>
                    <div class="row no-print ph">
                        <form name="mail-form" method="post" action="">
                            @csrf
                            <button type="submit" name="delete" value="delete" onclick="return(confirm('Are you sure you want to delete this order ?'))" class="btn btn-danger pull-right" style="margin-left: 5px;"><i class="fa fa-cross"></i>Delete</button>
                            <button type="submit" name="send_mail" value="send_mail" class="btn btn-success pull-right"><i class="fa fa-envelope"></i> Mail
                            </button>
                            <button type="button" class="btn btn-primary pull-right" target="_blank" onclick="myFunction()" style="margin-right: 5px;">
                                <i class="fa fa-print"></i> Print
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
require  public_path() . '/admin/footer.blade.php';
?>
<script>
    function myFunction() {
        window.print();
    }
</script>