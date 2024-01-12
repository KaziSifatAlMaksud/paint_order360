<?php
require  public_path().'/painter/header.php';


/*echo '<pre>';
print_r($ordersdetails);*/
?>
<style type="text/css" media="print">
@media print {

    @page {

        margin: none !important;
        /*  margin:0px !important;*/
        size: auto !important;
    }

    .painter_name {

        display: block !important;
    }

    #wrapper.toggled {

        padding-left: 0px !important;

    }

    #wrapper.toggled #sidebar-wrapper {
        width: 0px !important;
    }

    .navbar,
    footer,
    .ph {
        width: 0px !important;
        display: none !important;
    }
}
</style>
<style>
    @media (max-width: 768px) {
        .display-screen {
            display: none !important;
        }
    }

    @media (min-width: 769px) {
        .display-size {
            display: none !important;
        }
    }

    .set-margin {
        margin: 20px;
    }

    .margin-x {
        margin-left: 20px;
        margin-right: 20px;
    }

    .padding-y {
        padding-top: 20px;
        padding-bottom: 20px;
    }

    .flex-container {
        display: flex;
        /* justify-content: space-between; */
    }
    .margin-padding-0{
        margin-bottom: 0px;
        padding-bottom: 0px;
    }
</style>

<div id="page-content-wrapper">
    <div class="header-hide">

        <span class="hamb-top"></span>
        <span class="hamb-middle"></span>
        <span class="hamb-bottom"></span>
        </button>
        <div class="container-fluid-main">
            <div class="div">
                <a href="<?php echo PUBLIC_PATH.'/real_invoice'?>">
                    <img src="/image/logo.png" />

                </a>
            </div>
            <h2>View Order</h2>
        </div>
    </div>
    <div class="container-fluid display-screen">
        <div class="row">
            <div class="col-lg-12">
                <div class="bottombar">
                    <div class="page-header">
                        <h3 class="painter_name">
                            <?php echo @$_Painter_user->first_name .' '.@$_Painter_user->last_name ;?></h3>
                        <hr class="no_margin">
                        <h3 class="page-title ml-20">
                            <strong>Order at :</strong> <?php echo @$ordersdetails[0]->name ;?>
                        </h3>
                        <h4 class="text-center"> <strong>Order Number : </strong>
                            <font class="redcolor"> <?php echo @$ordersdetails[0]->o_id;?></font>
                        </h4>
                    </div>
                    <div class="panel">
                        <div class="panel-body container-fluid">
                            <div class="row1 row-lg1">
                                <hr class="no_margin">

                                <hr class="">
                                <?php  $or_st = @$ordersdetails[0]->o_status; ?>
                                <div class="col-md-6 col-xs-12 col-sm-12 border_2">
                                    <!-- first ror -->
                                    <div class="col-md-6 border border_1 half_width">
                                        <h4> <strong>Date </strong>
                                    </div>
                                    <div class="col-md-6 border_1 border_left half_width">
                                        <p>
                                            <?php if(!empty(@$ordersdetails[0]->created)){
                                        $show_date = $ordersdetails[0]->created;
                                    }else{
                                        $show_date = time();
                                    } 
                                    echo date("d-m-Y",$show_date); 
                                ?>
                                        </p>
                                    </div>

                                    <div class="col-md-6 border border_1 half_width">
                                        <h4> <strong> Order Status </strong></h4>
                                    </div>
                                    <div class="col-md-6 border_1 border_left half_width">
                                        <?php                     
                                if($or_st == 0 ){
                                    echo '<span class="label label-warning"> Pending </span>';
                                }elseif ($or_st == 1) {
                                    echo '<span class="label label-info"> In-progress </span>';
                                }
                                elseif ($or_st == 2) {
                                    echo '<span class="label label-primary"> Delivered </span>';
                                }
                                elseif ($or_st == 3) {
                                    echo ' <span class="label label-success"> Completed </span>';
                                } elseif ($or_st == 4) {
    
                                    echo '<span class="label label-danger"> Canceled </span>';
                                }
                            ?>

                                    </div>
                                    <!-- 2nd row -->
                                    <!--  <div class="col-md-6 border border_1 half_width">
                           <h5> <strong> Price </strong></h5>     
                        </div> 
                        <div class="col-md-6 border_1 border_left half_width">
                            <p><?php echo (@$ordersdetails[0]->price == '0.00') ? 'Price will be declear soon by shop.' : '$'.@$ordersdetails[0]->price;?></p>
                        </div>  -->
                                    <!-- 3rd row -->
                                    <div class="col-md-6 border border_1 half_width">
                                        <h4> <strong> Pick Up / Delivery</strong></h4>
                                    </div>
                                    <div class="col-md-6 border_1 border_left half_width">
                                        <p><?php if(@$ordersdetails[0]->pickup == 0) echo 'From Shop'; elseif(@$ordersdetails[0]->pickup == 1) echo '<h4>Deliver To Home</h4>'; else echo '<h4>Deliver To Job Address</h4>';?>
                                        </p>
                                    </div>

                                    <!-- job details-->
                                    <div class="col-md-12 border text-center border_1 ">
                                        <h2 class="full-width"> <strong> Job Details </strong></h2>
                                    </div>

                                    <div class="col-md-6 border border_1 half_width">
                                        <h4> <strong> Job Address </strong></h4>
                                    </div>
                                    <div class="col-md-6 border_1 border_left half_width">
                                        <h4><?php echo @$ordersdetails[0]->address;?></h4>
                                    </div>

                                    <div class="col-md-6 border  border_1 half_width">
                                        <h4> <strong> Customer Name </strong></h4>
                                    </div>
                                    <div class="col-md-6 border_1 border_left half_width">
                                        <h4><?php echo @$ordersdetails[0]->customer_name;?></h4>
                                    </div>

                                    <div class="col-md-6 border border_1 half_width">
                                        <h4> <strong> Account</strong></h4>
                                    </div>
                                    <div class="col-md-6 border_1 border_left half_width">
                                        <h4><?php echo @$ordersdetails[0]->builder_name . ' ' .@$ordersdetails[0]->account_no ;?></h4>
                                    </div>

                                </div>




                                <div class="col-md-4 col-xs-12 col-sm-12 mt-20 no-print ph">
                                    <input type="hidden" id="order_id"
                                        value="<?php echo @$ordersdetails[0]->order_id;?>">

                                    <!--    <form name="mail-form" method="post" action="">
                        <button type="button" class="btn btn-primary pull-right" target="_blank" onclick="myFunction()" style="margin-right: 5px;">
                        <i class="fa fa-print"></i> Print
                        </button>   -->
                                    <?php 
                        
                        if(@$ordersdetails[0]->type == 0){
                        
                        ?>
                                    <!--         <button type="submit" name="re-order" class="btn btn-orange pull-right"  style="margin-right: 5px;border-radius: 4px !important;"><i class="fa fa-shopping-cart"></i> Re-order</button>     -->
                                    <?php } ?>
                                    </form>
                                </div>

                                <div class="col-md-12 full-width text-center mt-20">
                                    <?php
                    //if(@$ordersdetails[0]->type == 0){
                    ?>
                                    <h4> Scrol side ways to see all </h4>
                                    <!-- Example Basic -->
                                    <div class="example-wrap">
                                        <div class="example table-responsive">
                                            <table class="table table-bordered table-striped table-responsive"
                                                id="vieworder">
                                                <thead>
                                                    <tr>
                                                        <th>Product</th>
                                                        <th>Color</th>
                                                        <th>Size</th>
                                                        <th>Amount</th>
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
                                                        <td>
                                                            <p><?php echo $value->product;?></p>
                                                        </td>
                                                        <td>
                                                            <p><?php echo $value->color;?></p>
                                                        </td>
                                                        <td>
                                                            <?php 
                                            
                                                if($value->size == 1){
                                                    echo '15 L';
                                                }elseif($value->size == 2){
                                                    echo '10 L';
                                                }elseif($value->size == 3){
                                                    echo '4 L';
                                                }elseif($value->size == 4){
                                                    echo '2 L';
                                                }elseif($value->size == 5){
                                                    echo '1 L';
                                                }
                                            ?>
                                                        <td>
                                                            <?php echo $value->qty?>
                                                        </td>
                                                        <td>
                                                            <?php echo $value->b_name;?>
                                                        </td>
                                                        <td>
                                                            <p><?php echo $value->note;?></p>
                                                        </td>
                                                        <td>
                                                            <p><?php echo $value->area;?></p>
                                                        </td>
                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <?php if(@$ordersdetails[0]->type == 1){?>
                                    <img width="200px" style="padding: 20px 0px;" class="pop"
                                        src="<?php echo PUBLIC_PATH.'/uploads/'.$ordersdetails[0]->photo;?>">
                                    <?php } ?>
                                </div>

                            </div>
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>

    <div class="display-size ">
    <div class="row card "  style="margin-top:10px;margin-left:15px;margin-right:15px !important;border-radius:15px; font-size:18px; border: solid #FEB653;">
           <!---   text aligment -->
    <div class="col" style="margin-left:10px;">
               <!-- <p class="margin-padding-0"><strong>Order No</strong> : <font class=""> <?php echo @$ordersdetails[0]->o_id; ?></font>   -->

                <!--
                </h1>


                <p class="margin-padding-0"><strong>Address</strong> : <font class=""> <?php echo @$ordersdetails[0]->o_id; ?></font>
                <p class=" " href="real_show_invoice/<?php echo $value->id; ?>">
                                                <?php echo $value->address ? $value->address : $user->address; ?>
                                    </p>
                <p class="margin-padding-0"><strong>Order At</strong> : <font class=""> <?php echo @$ordersdetails[0]->name; ?></font>
                </p>



                
                <p class="margin-padding-0"><strong>Date</strong> : <font class=""> <?php if (!empty(@$ordersdetails[0]->created)) {
                                                                                            $show_date = $ordersdetails[0]->created;
                                                                                        } else {
                                                                                            $show_date = time();
                                                                                        }
                                                                                        echo date("d-m-Y", $show_date);
                                                                                        ?></font>
                </p>

                                                                                   

             <!--   <p class="margin-padding-0"><strong>Order Status</strong> : <font class=""> <?php
                                                                                                if ($or_st == 0) {
                                                                                                    echo '<span class="label label-warning"> Pending </span>';
                                                                                                } elseif ($or_st == 1) {
                                                                                                    echo '<span class="label label-info"> In-progress </span>';
                                                                                                } elseif ($or_st == 2) {
                                                                                                    echo '<span class="label label-primary"> Delivered </span>';
                                                                                                } elseif ($or_st == 3) {
                                                                                                    echo ' <span class="label label-success"> Completed </span>';
                                                                                                } elseif ($or_st == 4) {

                                                                                                    echo '<span class="label label-danger"> Canceled </span>';
                                                                                                }
                                                                                                ?></font>  
                </p>
                <p class="margin-padding-0"><strong>Pick Up / Delivery </strong> : <font class=""> <?php if (@$ordersdetails[0]->pickup == 0) echo 'From Shop';
                                                                                                        elseif (@$ordersdetails[0]->pickup == 1) echo '<span>Deliver To Home</span>';
                                                                                                        else echo '<h4>Deliver To Job Address</h4>'; ?></font>
                </p>

                -->

                <p class="margin-padding-0"><strong>Job Address</strong> : <font class=""> <?php echo @$ordersdetails[0]->address; ?></font>
                </p>
                <p class="margin-padding-0"><strong>Invoice To</strong> : <font class=""> <?php echo @$ordersdetails[0]->customer_name; ?></font>
                </p>
               
                <p class="margin-padding-0"><strong>PO Number</strong> : <font class=""> <?php echo @$ordersdetails[0]->po_number; ?></font>
                </p>
                <br>
                <p class="margin-padding-0"><strong>Job Description</strong> : <font class=""> <?php echo @$ordersdetails[0]->job_description; ?></font>
                </p>
               <br>
                <p class="margin-padding-0"><strong>Price</strong> : <font class=""> <?php echo @$ordersdetails[0]->price; ?></font>
                </p>
                 <br>

                 <a href='/real_pdf'>Click to send Invoice <img src="/image/PDF_file_icon.svg.png" alt="User Image" style="width:45px; height:60px;"></a>



                   <!--

                <p class=""><strong>Account</strong> : <font class=""> <?php echo @$ordersdetails[0]->brand . ' ' .  @$ordersdetails[0]->builder_name . ' ' . @$ordersdetails[0]->account_no; ?></font>
                </p>
            </div>
        </div>     -->
        <?php

        foreach ($ordersdetails as $key => $value) {
        ?>

        <!-- this is the cards with the paint order in it  -->

            <!-- <div class="row card "  style="display: flex; justify-content: space-between;margin-top:20px;margin-left:15px;margin-right:15px !important;border-radius:15px;font-size:19px">
                <div class="col-6" style="margin:20px">
                   
                <span class=""> <?php echo $value->b_name; ?> : <?php echo $value->color; ?></span><br>
                <span class=""><?php echo $value->product; ?> </span><br>
                   
                    <span class="">Notes : <?php echo $value->note; ?></span>
                </div>
                <div class="col-6"  style="margin-left: auto; margin-top:55px; margin-right:35px;color:black;">
                    <span > <?php

                                                                                            if ($value->size == 1) {
                                                                                                echo '15 L';
                                                                                            } elseif ($value->size == 2) {
                                                                                                echo '10 L';
                                                                                            } elseif ($value->size == 3) {
                                                                                                echo '4 L';
                                                                                            } elseif ($value->size == 4) {
                                                                                                echo '2 L';
                                                                                            } elseif ($value->size == 5) {
                                                                                                echo '1 L';
                                                                                            }
                                                                                            ?> *  <?php echo $value->qty ?></span>
                </div>
            </div> -->


        <?php } ?>





        
    </div>
</div>






</div>





<?php
require  public_path().'/painter/footer.php';
?>
<script>
function myFunction() {
    window.print();
}
</script>


