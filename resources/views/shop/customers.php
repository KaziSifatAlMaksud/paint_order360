<?php
require  public_path().'/s_shop/header.blade.php';
?>
<style type="text/css" media="print">

  @page 
  {
  margin:none !important;
  /*  margin:0px !important;*/
  size: auto !important;
  
  }
 
  #site-navbar-collapse,footer,.ph
  {
    width: 0px !important;
    display: none !important;
  }
</style>  
<div class="page-header">
    <h1 class="site_name" ><?php echo $shopName;?></h1>
    <h1 class="page-title">
        Customers ( <?php echo $customers;?> )
    </h1>
    <div class="pull-right">
         <!-- <a href="<?php //echo PUBLIC_PATH.'/shop/add_emp';?>" class="btn btn-primary" >Add New Employees</a>  -->
    </div>
    <br />
 
</div>
<div class="panel">
    <div class="panel-body container-fluid">
        <div class="row row-lg">
            <div class="col-md-12 mb_10 ph">
                <div class="col-md-6">
                    <h4>Please select a painter</h4>
                   <!-- <select id="painter_select" class="form-control">
                        <option value="" selected disabed hidden>Select</option>
                        <?php 
                            /*foreach ($customers as $key => $value) {
                                echo '<option value="'.$value->user_id.'" >'.$value->first_name.' '.$value->last_name.'</option>';
                            }*/ 
                        ?>
                    </select>-->
                     <select id="painter_select" class="selectpicker with-ajax" name="users[]" data-live-search="true"></select>
                </div>
            </div>
            <div class="col-md-12">
                <div class="col-md-6">
                    <table class="table table-bordered">
                        <thead>
                            <th colspan="2" class="text-center">Painter Detail</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Painters First Name</td>
                                <td class="first_name"></td>
                            </tr>
                             <tr>
                                <td>Painters Last Name</td>
                                <td class="last_name"></td>
                            </tr>
                             <tr>
                                <td>Company Name</td>
                                <td class="company_name"></td>
                            </tr>
                             <tr>
                                <td>Address</td>
                                <td class="address"></td>
                            </tr>
                             <tr>
                                <td>Phone Number</td>
                                <td class="phone"></td>
                            </tr>
                             <tr>
                                <td>Email</td>
                                <td class="email"></td>
                            </tr>
                             
                        </tbody>
                    </table>
                </div>
                <div class="col-md-6">
                   <table class="table table-bordered">
                        <thead>
                            <th colspan="2" class="text-center">Financials</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td >Spent this week</td>
                                <td class="this_week"></td>
                            </tr>
                            <tr>
                                <td>Last months</td>
                                <td class="last_month"></td>
                            </tr>
                            <tr>
                                <td>Monthly average</td>
                                <td class="monthly_avg"></td>
                            </tr>
                            <tr>
                                <td>Last financial year</td>
                                <td class="last_year"></td>
                            </tr>
                            <tr>
                                <td>This year</td>
                                <td class="this_year"></td>
                            </tr>
                          
                        </tbody>
                    </table>
                </div>
            </div>
             <div class="col-md-6">
                <strong><h2 class="mt-70 media-heading">Builder Details</h2></strong>
                <div class="">
                    <table class="table table-bordered table-inverse no-more-tables">
                        <thead>
                            <tr>
                                <th>Account number</th>
                                <th>Builders</th>
                            </tr>
                        </thead>
                        <tbody class="builders_data">
                            
                        </tbody>
                    </table>
                </div>
            </div>
             <div class="col-md-4 no-print ph">
                    <button type="button" class="btn btn-primary pull-right" target="_blank" onclick="myFunction()" style="margin-right: 5px;">
                         <i class="fa fa-print"></i> Print
                    </button>
            </div>
            
        </div>
    </div>
</div>
<?php
require  public_path().'/s_shop/footer.blade.php';
?>
<script>
function myFunction() {
    window.print();
}
</script>