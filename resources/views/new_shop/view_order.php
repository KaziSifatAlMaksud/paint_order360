<?php
require  public_path() . '/s_shop/header.blade.php';

?>
<style type="text/css" media="print">
  @page {
    margin: none !important;
    /*  margin:0px !important;*/
    size: auto !important;

  }

  #site-navbar-collapse,
  footer,
  .ph {
    width: 0px !important;
    display: none !important;
  }
</style>

<div class="page-header">
  <h3 class="site_name"><?php echo $shopName; ?></h3>
  <hr class="no_margin">
  <h1 class="page-title"> <strong>Order From :</strong> <?php echo @$ordersdetails[0]->company_name . ', ' . @$ordersdetails[0]->first_name . ' ' . @$ordersdetails[0]->last_name . ', ' . @$ordersdetails[0]->phone ?></h1>
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
    <!-- <a href="<?php //echo $this->webroot.'shop/Admins/add' 
                  ?>" class="btn btn-primary" >Add New Painter</a> -->
  </div>
  <br />

</div>
<div class="panel">
  <div class="panel-body container-fluid">
    <div class="row row-lg1">
      <hr class="no_margin">
      <h3 class="text-center"> <strong>Order Number : <font class="redcolor"><?php echo @$ordersdetails[0]->o_id; ?></font></strong></h3>
      <hr class="">
      <?php $or_st = @$ordersdetails[0]->o_status; ?>
      <div class="col-md-5 border_2">
        <div class="col-md-12 border text-center border_1 ">
          <h5> <strong> Order Details </strong></h5>
        </div>
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
            echo '<span class="label label-primary"> Delivered </span>';
          } elseif ($or_st == 3) {
            echo ' <span class="label label-success"> Completed </span>';
          } elseif ($or_st == 4) {

            echo '<span class="label label-danger"> Canceled </span>';
          }
          ?>
          <?php if ($or_st != 3 || $or_st != 4) { ?>
            <span class="pull-right"><i class=" edit_class fa fa-pencil" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#myModal"></i></span>
          <?php } ?>
        </div>
        <!-- 2nd row -->
        <div class="col-md-6 border border_1 half_width">
          <h5> <strong> Price </strong></h5>
        </div>
        <div class="col-md-6 border_1 half_width">
          <p><?php echo (@$ordersdetails[0]->price == '0.00') ? 'Pricing to be entered.' : '$' . @$ordersdetails[0]->price; ?></p>
        </div>
        <!-- 3rd row -->
        <div class="col-md-6 border border_1 half_width">
          <h5> <strong> Pick Up / Delivery </strong></h5>
        </div>
        <div class="col-md-6 border_1 half_width">
          <p><?php if (@$ordersdetails[0]->pickup == 0) echo 'From Shop';
              elseif (@$ordersdetails[0]->pickup == 1) echo 'Deliver To Home : ' . @$ordersdetails[0]->u_address;
              else echo 'Deliver To Job Address: ' . @$ordersdetails[0]->address; ?></p>
        </div>
      </div>

      <div class="col-md-2 no-print ph">
        <form name="price-from" method="post">
          <div class="form-group">
            <h5> <strong>Please enter price for total order : </strong></h5>
            <input type="number" name="price" value="<?php (@$ordersdetails[0]->price == 0.00) ? '' : @$ordersdetails[0]->price; ?>" step="0.01" min="0" required class="form-control price_input">
          </div>
          <div class="form-group">
            <input type="submit" name="update_price" value="Update" class="form-control btn btn-primary">
          </div>
        </form>
      </div>

      <div class="col-md-5 border_2">
        <!-- first ror -->
        <div class="col-md-12 border text-center border_1 ">
          <h5> <strong> Job Details </strong></h5>
        </div>
        <div class="col-md-6 border border_1 half_width">
          <h5> <strong> Job Address </strong></h5>
        </div>
        <div class="col-md-6 border_1 half_width">
          <p><?php echo @$ordersdetails[0]->address; ?></p>
        </div>
        <!-- 2nd row -->
        <div class="col-md-6 border border_1 half_width">
          <h5> <strong> Customer Name </strong></h5>
        </div>
        <div class="col-md-6 border_1 half_width">
          <p><?php echo @$ordersdetails[0]->customer_name; ?></p>
        </div>
        <!-- 3rd row -->
        <div class="col-md-6 border border_1 half_width">
          <h5> <strong> Account </strong></h5>
        </div>
        <div class="col-md-6 border_1 half_width">
          <p><?php echo @$ordersdetails[0]->account_no; ?></p>
        </div>
      </div>


      <div class="col-md-12 full-width text-center">
        <?php
        if (@$ordersdetails[0]->type == 0) {
        ?>
          <!-- Example Basic -->
          <div class="example-wrap">
            <div class="example table-responsive">
              <table class="table table-bordered table-striped tbale-responsive" id="vieworder">
                <thead>
                  <tr>
                    <th>Area</th>
                    <th>Product</th>
                    <th>Color</th>
                    <!--   <th>Sheen</th> -->
                    <th>Size</th>
                    <th>Amount</th>
                    <!-- <th>Tint</th> -->
                    <th>Brand</th>
                    <th>Notes</th>
                    <th class="ph">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  foreach ($ordersdetails as $key => $value) {
                  ?>
                    <tr>
                      <td><input type="text" class="no_border" id="area_<?php echo $value->id; ?>" value="<?php echo $value->area; ?>" readonly></td>
                      <td><input type="text" class="no_border" id="product_<?php echo $value->id; ?>" value="<?php echo $value->product; ?>" readonly></td>
                      <td><input type="text" class="no_border" id="color_<?php echo $value->id; ?>" value="<?php echo $value->color; ?>" readonly></td>
                      <td>
                        <select disabled id="size_<?php echo $value->id; ?>" class="form-control no_border">
                          <option value="" selected disabled>Not Ordered</option>
                          <option <?php echo ($value->size == 15) ? 'selected' : '' ;?> value="15">15 L</option>                                                                <option <?php echo  ($value->size == 1) ? 'selecvalue="1">15 L</option>
                                       <option <?php echo  ($value->size == 2) ? 'selected' : '';?> value="2">10                                       <option <?php echo  ($value->size == 3) ? 'selue="3">4 L</option>
                                            <option <?php echo  ($value->size == 4) ? 'seld' : '';?> value="4">2 L                               <oion <?$value->size == 5) ? 'se' : '';?> value="5">1 L</option>
ue->id;?>" cl ass=" form-control no_border">
                                
                                i=0; $i   <=20 ; $ i+) { 
                                 ==  0){
                                     <option value="" selected disabled>Not Ordered</option>';
                                  }e
                                                                   n <?php echo ($value->qty == $i) ? 'selected' : '';?> val ue="<?php echo $i;?>"><? php echo $i;?></op tion>
                          <?php
                            }
                                                                                     </sect>
                          </
                                                          t disabled id="brand_<?php echo $value->id;?>" cl ass=" form-control no_border" >
                               n value="" selected disabled>Not Ordered</option>

                                foreach ($brands as $bkey => $bvalue) { ?>
                                <on <?php echo ($value->brand == $bvalue->id) ? "selected": "";  ?> value="<?php echo $bvalue->id;?>"><? php echo $bvalue->name;?></op tion>
                                } ?>
                              ct>
                              //echo $value->b_name;?>
                            ?>
      </td>          </td>
                <td><input type="text" class="no_border" id="note_<?php echo $value->id;?>" va lue="<?php echo $value->note;?>" re adonly></td>
                      <td class="ph">
                              ss=" edit_class edit_item fa fa-pencil" data-id="<?php echo $value->id;?>" >< /i>
                              ss="pull-right fa fa-times del_row del_row_<?php echo $value->id;?>" da ta-id="<?php echo $value->id;?>" on click="return(confirm('Are you sure you want to delete this row ?'))" ></i>
                            <iss="fa fa-check edit_btn btn btn-sm btn-info" data-btid="<?php echo $value->id;?>" id ="btn_<?php echo $value->id;?>" st yle="display:none" ></i>
                            
                          
                        } ?>
                      y>
                    e>
                 <
               <
              }elseif (@$ord ersdetails[0]->type == 1){?>
                  idth="200px" style="padding: 20px 0px;" class=" pop" src="<?php echo PUBLIC_PATH.'/upl o ads/'.$orde r sdetails[0]->photo;?>">
                 } ?>
           <
           <lass="col-md-12 no-print ph pull-right">
              a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a> -->
        <input type="hidden" id="order_id" value="<?php echo @$ordersdetails[0]->order_id;?>">
               name="mail-form" method="post" action="">
                if(@$ord ersdetails[0]->type == 0){ ?>  
                 n type="button" class="btn btn-info add_row pull-right" onclick="return(confirm('Are you sure you want to add new row ?'))"  styl="margin-left: 5px;"><i class="fa fa-plus"></i>Add</button>
                } ?>
              <bn type="submit" name="delete" onclick="return(confirm('Are you sure you want to delete this order ?'))" class="btn btn-danger pull-right" style="margin-left: 5px;"><i class="fa fa-times"></i>Delete</button>
            <butn type="submit" name="send_mail" class="btn btn-success pull-right"><i class="fa fa-envelope"></i> Mail
          </button>
                n type="button" class="btn btn-primary pull-right" target="_blank" onclick="myFunction()" style="margin-right: 5px;">
                  ss="fa fa-print"></i> Print
              </on>
              >
            
        div>
    </v>
</div>

<!-- Modal -->
  <divlass="modal fade" id="myModal" role="dialog">
    <d class="modal-dialog modal-sm">
    
  -- Modal content-->
      div lass="modal-content">
        <divlass="modal-header">
          <butn type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 ass="modal-title">Update Order Status</h4>
        </di
        <divlass="modal-body">
        <form name="update_order_form" method="post">
            <divlass="form-group">
              <selt name="order_status" required class="form-control">
                <?ph               if($or_s t == 0 ){
)
                     <option selected value="0">Pending</option>
                            <option value="1">In-progress</option>
                            <option value="2">Delivered</option>
                            <option value="3">Completed</option>
                            <option value="4">Canceled</option>';
                    f  ($or_st == 1 || $or_st == 2) {
                      <option '.(($or _ st == 1) ? " selected " : " ").' val u e="1">In-progress</option>
                            <option '.(($or _ st == 2) ? " selected " : " ").' val u e="2">Delevired</option>
                            <option value="3">Completed</option>
                            <option value="4">Canceled</option>';
              }
      ($or_st == 3) {
                     e<option  selected value="3">Completed</option>';
                   }if ($or_st == 4) {

                      <option selected value="4">Canceled</option>';
               }
             ?>
              </sect>
           </div
            <divlass="form-group">
             <inpu type="submit" <?php echo ($or_st == 3 || $or_st == 4 ) ? 'isabled' : '';?> cla ss="form-control btn btn-primary" name="update_order" value="Update">
            </di
        </form>
        </di
      </di
      </di
  </di

<div id="newRow" style="display:none">
  <table>
  <tr>
      <td><i  nput type="text" style=" width: 100%; " required class="product"></td>
    <td><i  nput type="text" style=" width: 100%; " required class="color"></td>
    <td>
          <select required class="form-control size">  
        <option value="" selected disabled>Select</option>
          <option value="1">15 L</option>
          <option value="2">10 L</option>
          <option value="3">4 L</option>
          <option value="4">2 L</option>
          <option value="5">1 L</option>
        </select>
    <td>
        <selec  t required class="qty form-control">
          <?php
            for i=0; $i   <=20 ; $ i+) { 
             if($==  0){
                 echo<option value="" selected disabled>Select</option>';
              }els}e
           ?>
              <option value="<?php echo $i;?>"><? php echo $i;?></op tion>
          <?php
            }
          }
          ?>
        </select>
    </  td>
    <t  d>
        <select required class="brand form-control" >
         <option value="" selected disabled>Select</option>
          <?php foreach ($brands as $bkey => $bvalue) { ?>
            <option value="<?php echo $bvalue->id;?>"><? php echo $bvalue->name;?></op tion>
          <?php } ?> 
       </select>
    </  td>
    <t  d><input type="text" style=" width: 100%; " class="note"></td>
    <t  d><input type="text" style=" width: 100%; " class="area"></td>
    <t  d class="ph">
        <i class="fa fa-check btn btn-sm add_btn btn-info" ></i>
    </  td>
  </tr  >
  </table>
</div>

<?php
require  public_path().'/s_s h op/footer.blade.php';
?>
<script>
functi  on myFunction() {
    window.print();
}
</s  cript>
<?php 

/echo '<pre>'; print_r($ordersdetails); die;

?>