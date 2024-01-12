<?php
require  public_path().'/painter/header.php';


?>
<style type="text/css">
.s_h {
  width: 100px;
}
</style>
<div id="page-content-wrapper">
    <div class="header-hide">
        
        <span class="hamb-top"></span>
  <span class="hamb-middle"></span>
  <span class="hamb-bottom"></span>
    </button>
        <div class="container-fluid-main">
            <h2>Ordering</h2>
        </div>
    </div>
    <div class="container-fluid last-order">
        <div class="row">
            <div class="col-lg-12">
                <div class="topbar">
                    {{-- <h2>Welcome : <?php echo $_Painter_user->first_name.' '.$_Painter_user->last_name;?></h2> --}}
                </div>
                <div class="bottombar mt-70">
                  <div class="tab_btn">
                      <button onclick="changeTab(1);" id="tab_btn1" value="1" class="btn btn-warning custom_btn custom_btn3">Details</button>
                      <button onclick="changeTab(2);" id="tab_btn2" value="2" class="btn custom_btn custom_btn3">Order</button>
                      <button onclick="changeTab(3);" id="tab_btn3" value="3" class="btn  custom_btn3">Delivery</button>
                  </div>
                    <form class="col s12 upper-form no-more" method="post" >
                        <div class="row tab1">
                            <div class="input-field col col-lg-4 col-md-6 col-xs-12">
                                <input id="address" required type="text" name="address" class="validate">
                                <label for="address">Job Address</label>
                            </div>
                            <div class="input-field col col-lg-4 col-md-6 col-xs-12">
                                <input id="cust_name" required name="customer_name" type="text" class="validate">
                                <label for="cust_name">Customer Name</label>
                            </div>
                          <!--  <div class="input-field col col-lg-3 col-md-6 col-xs-12">
                                <input id="order_number" type="tel" class="validate">
                                <label for="order_number">Order Number</label>
                            </div> -->
                            <div class="input-field col col-lg-4 col-md-6 col-xs-12">
                                <select required class="select-amount" name="builder">
                                    <?php 
                                        
                                        if(count($builders) > 0){
                                            foreach($builders as $build_key => $build_value ) { ?>
                                    
                                                <option value="<?php echo $build_value->id;?>" ><?php echo $build_value->name.' '.$build_value->account_no;?></option>
                                    <?php } }else{ ?>
                                        <option selected disabled hidden >Please add new Builder from profile</option>
                                    <?php } ?>
                                </select>
                                <label>Select An Account</label>
                            </div>
                          <div class="col-md-12 col-xs-12"> 
                            <button onclick="changeTab(2);" value="2" class=" tab_btn btn btn-warning">Next</button>
                          </div>
                        </div>
                  
                    <div class="web_form">
                    <?php
                    /**

                        Outside Array  

                    */
                    ?>

                        <!--outside colour-->
                        <div id="outside" class="no-more-tables pull-left visible-lg table-responsive" style="width: 100%;">
                            <table class="col-md-12 table-bordered  table-condensed table-responsive cf">
                                <thead class="cf">
                                    <tr>
                                        <!-- <th>Outside Colours</th> -->
                                        <th>Product</th>
                                         <th>Colour Name</th>
                                        <!-- <th>Sheen</th> -->
                                        <th>Size</th>
                                        <th>Amount</th>
                                        <!-- <th>Tint</th> -->
                                        <th>Brand</th>
                                        <th>Notes</th>
                                        <th>For What Area</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach($outside as $key => $value):  ?>
                                    <tr>
                                        <!-- <td data-title="Outside Colours"><?php //echo $value ?></td> -->
                                        <td data-title="Product"  class="border1px">
                                            <div class="input-field col s12">
                                                <input id="product" type="text" data-key="<?php echo $key;?>" name="outside[<?php echo $value;?>][product]" class="validate clickget os_<?php echo $key;?>">
                                            </div>
                                        </td>
                                        <td data-title="Colour Name"  class="border1px">
                                            <div class="input-field col s12">
                                                <input id="color-name" name="outside[<?php echo $value;?>][color]" data-key="<?php echo $key;?>" type="text" class=" clickget os_<?php echo $key;?> validate">
                                            </div>
                                        </td>
                                     <!--    <td data-title="Sheen">
                                            <div class="select-style">
                                                <select name="outside[<?php //echo $value;?>][sheen]" data-key="<?php //echo $key;?>" class="clickget os_<?php //echo $key;?>">
                                                  <option value="" selected disabled>Select</option>
                                                  <option value="1">Mat</option>
                                                  <option value="2">Low Sheen</option>
                                                  <option value="3">Full Gloss</option>
                                                  <option value="4">Other</option>
                                                </select>
                                            </div>
                                        </td> -->
                                        <td data-title="Size">
                                            <div class="">
                                                <select  name="outside[<?php echo $value;?>][size]"  data-key="<?php echo $key;?>" class=" form-control s_h clickget os_<?php echo $key;?>">  
                                                  <option value="" selected disabled>Select</option>
                                                  <option value="1">15 L</option>
                                                  <option value="2">10 L</option>
                                                  <option value="3">4 L</option>
                                                  <option value="4">2 L</option>
                                                  <option value="5">1 L</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Amount">
                                            <div class="">
                                                <select  name="outside[<?php echo $value;?>][qty]" data-key="<?php echo $key;?>" class=" form-control s_h clickget os_<?php echo $key;?>">
                                                   <?php
                                                  for ($i=0; $i <=20 ; $i++) { 
                                                    if($i == 0){
                                                      echo '<option value="" selected disabled>Select</option>';
                                                    }else{
                                                      echo '<option value="'.$i.'">'.$i.'</option>';
                                                    }
                                                  }
                                                  ?>
                                                </select>
                                            </div>
                                        </td>
                                        
                                        <!-- <td data-title="Tint">
                                            <div class="select-style">
                                                <select name="outside[<?php //echo $value;?>][tint]" >
                                                    <option value="150">150%</option>
                                                    <option value="125">125%</option>
                                                    <option selected value="100">100%</option>
                                                    <option value="75">75%</option>
                                                    <option value="50">50%</option>
                                                </select>
                                            </div>
                                        </td> -->
                                        <td data-title="Brand">
                                            <div class="">
                                                <select name="outside[<?php echo $value;?>][brand]" data-key="<?php echo $key;?>" class=" form-control s_h clickget os_<?php echo $key;?>">
                                              <option value="" selected disabled>Select</option>
                                              
                                              <?php foreach ($brands as $bkey => $bvalue) {
                                                  
                                                  echo '<option value="'.$bvalue->id.'">'.$bvalue->name.'</option>';
                                              } ?>

                                        </select>
                                            </div>
                                        </td>
                                        <td data-title="Notes"  class="border1px" >
                                            <div class="input-field col s12">
                                                <input id="notes" name="outside[<?php echo $value;?>][note]" type="text"  class=" validate " placeholder="Optional">
                                            </div>
                                        </td>
                                        <td data-title="For What Area"  class="border1px">
                                            <div class="input-field col s12">
                                                <input id="area"  name="outside[<?php echo $value;?>][area]" type="text" class="validate" placeholder="Optional">
                                            </div>
                                        </td>
                                    </tr>
                                   
                                   <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <!--Inside Colour-->

<?php
/**

    Outside Array  end

    Inside Array start

*/
?>


                        <div id="inside" class="no-more-tables mt-50 pull-left visible-lg table-responsive" style="width: 100%;">
                            <table class="col-md-12 table-bordered  table-condensed cf">
                                <thead class="cf">
                                    <tr>
                                        <!-- <th>inside colours</th> -->
                                        <th>Product</th>
                                        <th>Colour Name</th>
                                        <!-- <th>Sheen</th> -->
                                        <th>Size</th>
                                        <th>Amount</th>
                                        <!-- <th>Tint</th> -->
                                        <th>Brand</th>
                                        <th>Notes</th>
                                        <th>For What Area</th>
                                    </tr>
                                </thead>
                                <tbody>
                              <?php 
                            //  $inside = [];
                              foreach($inside as $key => $value):  ?>
                                    <tr>
                                        <!-- <td data-title="inside colours"><?php //echo $value  ?></td> -->
                                        <td data-title="Product"  class="border1px">
                                            <div class="input-field col s12">
                                                <input id="product" type="text" name="inside[<?php echo $value;?>][product]" data-key="<?php echo $key.'_1';?>" class="clickget os_<?php echo $key.'_1';?> validate" >
                                            </div>
                                        </td>
                                         <td data-title="Colour Name"  class="border1px">
                                            <div class="input-field col s12">
                                                <input id="color-name" type="text" name="inside[<?php echo $value ?>][color]" data-key="<?php echo $key.'_1';?>" class=" validate clickget os_<?php echo $key.'_1';?>">
                                            </div>
                                        </td>
                                        <input type="hidden" value="<?php echo $value ?>"/>
                                         <!-- <td data-title="Sheen">
                                            <div class="select-style">
                                                <select name="inside[<?php //echo $value;?>][sheen]" data-key="<?php //echo $key.'_1';?>" class="clickget os_<?php //echo $key.'_1';?>">
                                                  <option value="" selected disabled>Select</option>
                                                  <option value="Mat">Mat</option>
                                                  <option value="Low Sheen">Low Sheen</option>
                                                  <option value="Full Gloss">Full Gloss</option>
                                                  <option value="Other">Other</option>
                                                </select>
                                            </div>
                                        </td> -->
                                        <td data-title="Size">
                                            <div class="">
                                                <select name="inside[<?php echo $value ?>][size]" data-key="<?php echo $key.'_1';?>" class="clickget form-control s_h os_<?php echo $key.'_1';?>">
                                                  <option value="" selected disabled>Select</option>
                                                  <option value="1">15 L</option>
                                                  <option value="2">10 L</option>
                                                  <option value="3">4 L</option>
                                                  <option value="4">2 L</option>
                                                  <option value="5">1 L</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td data-title="Amount">
                                            <div class="">
                                                <select name="inside[<?php echo $value ?>][qty]" data-key="<?php echo $key.'_1';?>" class="clickget form-control s_h  os_<?php echo $key.'_1';?>">
                                                  <?php
                                                  for ($i=0; $i <=20 ; $i++) { 
                                                    if($i == 0){
                                                      echo '<option value="" selected disabled>Select</option>';
                                                    }else{
                                                      echo '<option value="'.$i.'">'.$i.'</option>';
                                                    }
                                                  }
                                                  ?>
                                                </select>
                                            </div>
                                        </td>
                                       
                                       <!--  <td data-title="Tint">
                                            <div class="select-style">
                                                <select name="inside[<?php //echo $value ?>][Tint]" data-key="<?php //echo $key.'_1';?>" class=" validate clickget os_<?php echo $key.'_1';?>">
                                                  <option value="150%">150%</option>
                                                  <option value="125%">125%</option>
                                                  <option selected value="100%">100%</option>
                                                  <option value="75%">75%</option>
                                                  <option value="50%">50%</option>
                                                </select>
                                            </div>
                                        </td> -->
                                        <td data-title="Brand">
                                            <div class="">
                                                <select name="inside[<?php echo $value ?>][Brand]" data-key="<?php echo $key.'_1';?>" class=" form-control s_h  validate clickget os_<?php echo $key.'_1';?>">
                                              <option value="" selected disabled>Select</option>
                                               <?php foreach ($brands as $bkey => $bvalue) {
                                                  
                                                  echo '<option value="'.$bvalue->id.'">'.$bvalue->name.'</option>';
                                              } ?>
                                        </select>
                                            </div>
                                        </td>
                                        <td data-title="Notes" class="border1px">
                                            <div class="input-field col s12">
                                                <input id="notes" type="text" name="inside[<?php echo $value;?>][note]" class="validate" placeholder="Optional">
                                            </div>
                                        </td>
                                        <td data-title="For What Area" class="border1px">
                                            <div class="input-field col s12">
                                                <input id="area" type="text" name="inside[<?php echo $value;?>][area]" class="validate" placeholder="Optional">
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                </div>
<?php
/**

   mobile view start

*/
?>                      <!--mobile view start-->
                        <div class="mobile-view hidden-lg mobile_form tab2">

                              <div id="cell">
                                <div id="outside" class="no-more-tables pull-left hidden-lg">
                                    <table class="col-md-12 table-bordered table-condensed cf">
                                        <tbody>
                                           <!--  <tr class="outside-color">
                                                <td colspan="2">
                                                    <div class="input-field col s12">
                                                        <input id="outside-color" type="text" class="validate" placeholder="" value="Colour1">
                                                    </div>
                                                </td>
                                            </tr> -->
                                          <!--   <tr class="outside-color-heading">
                                                <td colspan="2">
                                                    <div class="input-field col s12">

                                                      <p>Color</p>
                                                      
                                                    </div>
                                                </td>
                                            </tr> -->
                                            <tr>
                                                <td class="full_td" colspan="2">
                                                    <div class="input-field col s12">
                                                        <input id="color" name="color[]" type="text" class=" form-control validate" placeholder="Colour Name ?">
                                                    </div>
                                                </td>
                                                
                                               
                                            </tr>
                                            <tr>
                                                <td class="full_td" colspan="2">
                                                    <div class="input-field col s12">
                                                        <input name="product[]" id="product" type="text" class=" form-control validate" placeholder="Product">
                                                    </div>
                                                </td>
                                                
                                            </tr>
                                             <tr>

                                               <td class="full_td" colspan="2">
                                                   <label>What size would you like</label>
                                                    <div class="select-style">
                                                        <select  name="size[]" class="form-control">
                                                          <option value="" selected hidden disabled>Select</option>
                                                          <option value="1">15 L</option>
                                                          <option value="2">10 L</option>
                                                          <option value="3">4 L</option>
                                                          <option value="4">2 L</option>
                                                          <option value="5">1 L</option>
                                                        </select>
                                                    </div>
                                                </td>
                                               
                                            </tr>
                                            <tr>
                                                <td data-title="" class="half_td full_td">
                                                  <label>How many would you like</label>
                                                    <div class="select-style">
                                                       <select name="qty[]" class="form-control">
                                                        <?php
                                                        for ($i=0; $i <=20 ; $i++) { 
                                                          if($i == 0){
                                                            echo '<option value="" selected disabled>Select</option>';
                                                          }else{
                                                            echo '<option value="'.$i.'">'.$i.'</option>';
                                                          }
                                                        }
                                                        ?>
                                                      </select>
                                                    </div>
                                                </td>
                                                <td class=" half_td full_td" colspan="2">
                                                 <label>Brand</label>
                                                    <div class="select-style">
                                                        <select name="brand[]" class="form-control" >
                                                          <option value="" selected hidden disabled>Select</option>
                                                           <?php foreach ($brands as $bkey => $bvalue) {
                                                  
                                                              echo '<option value="'.$bvalue->id.'">'.$bvalue->name.'</option>';
                                                            } ?>
                                                      </select>
                                                    </div>
                                                </td>
                                                
                                            </tr>
                                                    
                                            <tr>
                                                <td class="full_td" colspan="2">
                                                    <div class="input-field col s12">
                                                        <input id="notes" name="note[]" type="text" class=" form-control validate" placeholder="Notes">
                                                    </div>
                                                </td>
                                            </tr> 
                                            <!-- <tr>
                                                <td colspan="2">
                                                    <div class="input-field col s12" colspan="2"> 
                                                        <input id="for_what" name="for_what[]" class="form-control validate" type="text" placeholder="For What">
                                                    </div>
                                                </td>
                                                
                                            </tr> -->
                                            <!-- <tr>
                                                <td>
                                                    <div class="select-style">
                                                        <select>
                                                          <option value="" selected hidden disabled>Sheen</option>
                                                          <option value="1">Mat</option>
                                                          <option value="2">Low Sheen</option>
                                                          <option value="3">Full Gloss</option>
                                                          <option value="4">Other</option>
                                                        </select>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="select-style">
                                                        <select>
                                                          <option value="" selected hidden disabled>Tint</option>
                                                          <option value="1">150%</option>
                                                          <option value="2">125%</option>
                                                          <option value="3">100%</option>
                                                          <option value="4">75%</option>
                                                          <option value="5">50%</option>
                                                        </select>
                                                    </div>
                                                </td>
                                            </tr> -->
                                           
                                        </tbody>
                                    </table>
                                </div>
                              </div>
                          
                            <div class="clearfix"></div>
                            <div class="more-entry">
                                <div class="radio">
                                    <!-- <input class="with-gap" name="f1" type="radio" id="more-paint" onclick="changeval1()" /> -->
                                    
                                    <label for="more-paint">More Paint</label>
                                    <i class="fa fa-plus " style="color: #f57c1f;" name="f1" id="more-paint" onclick="changeval1()" /></i>
                                </div>
                              <!--  <div class="radio">
                                    <input class="with-gap" name="f1" type="radio" id="f2" value="finish_order.html" onclick="openLink(this)" />
                                    <label for="f2">Finish Order<img src="image/sidemnu/Detail_Hover.png"></label>
                                </div>  -->

                                 <div class="col-md-12 col-xs-12"> 
                                  <button onclick="changeTab(3);" value="3" class=" tab_btn btn btn-warning">Next</button>
                                </div>
                            </div>
                        </div>
                        <!--mobile view end-->
<?php
/**

   mobile view end

*/
?>                  <div class="tab3">
                     <div class=" row mt-s-30 ">
                        <div class="col-sm-6 col-xs-12 col-md-3">
                            <div class=" mt-50">

                                <p class="redcolor">Please select a shop</p>
                                <select name="shop_id" class="form-control" required >
                                  <option value="" selected hidden disabled>Select</option>
                                  <?php 
                                  foreach ($shops as $key => $value) {
                                   
                                    echo '<option class="form-control" value="'.$value->id.'">'.$value->name.'</option>';
                                  }
                                  ?>
                                </select>
                            </div>
                        </div>
                      </div>
                        <div class="clearfix"></div>
                        <div class="mt-50 row mt-s-30 ">
                            <div class="col-sm-12 no-more">

                              <p class="redcolor"> If your are finished making your order. Please choose a delivery option</p>

                                <div class="pick-one pull-left w-100">
                                    <ul class="list-inline pull-left">
                                        <li>
                                            <p class="pull-left">
                                                <input class="with-gap" value="0" required name="pickup" type="radio" id="test1" />
                                                <label for="test1"><img src="image/icon/shop_center.png">Pick up paint from shop</label>
                                            </p>
                                        </li>
                                        <li>
                                            <p class="pull-left">
                                                <input class="with-gap"  value="1" name="pickup" type="radio" id="test2" />
                                                <label for="test2"><img src="image/icon/home.png">Deliver to my home</label>
                                            </p>
                                        </li>
                                        <li>
                                            <p class="pull-left">
                                                <input class="with-gap"  value="2" name="pickup" type="radio" id="test3" />
                                                <label for="test3"><img src="image/icon/ambulance_round.png">Deliver to this job address</label>
                                            </p>
                                        </li>
                                    </ul>
                                    <!-- <button class="btn btn-orange medium ronded pull-right">Go</button> -->
                                    <input type="submit" value="GO" class="btn btn-orange medium ronded pull-right">
                                </div>
                            </form>
                           </div>
                        </div>
                        
                        </div>

                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /#page-content-wrapper -->
<?php
require  public_path().'/painter/footer.php';
?>