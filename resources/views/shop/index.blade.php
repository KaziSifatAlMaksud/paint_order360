<?php
require  public_path().'/s_shop/header.blade.php';

?>
<div id="main-wrapper">
    <div class="row">
        
       <a href="<?php echo PUBLIC_PATH.'/shop/orders';?>">
        <div class="col-lg-3 col-md-6">
          <!-- Widget -->
          <div class="widget">
            <div class="widget-content padding-20 bg-blue-600 white">
              <div class="counter counter-lg counter-inverse">
                <div class="counter-label text-uppercase font-size-16">We have</div>
                <div class="counter-number-group">
                  <span class="counter-number"><?php echo @$data['total_orders']; ?></span>
                  <span class="counter-icon margin-left-10"><i class="icon fa fa-cubes" aria-hidden="true"></i></span>
                </div>
                <div class="counter-label text-uppercase font-size-16">Orders</div>
              </div>
            </div>
          </div>
          <!-- End Widget -->
        </div>
        </a>
        
         <a href="<?php echo PUBLIC_PATH.'/shop/employees';?>">
        <div class="col-lg-3 col-md-6">
          <div class="widget">
            <div class="widget-content padding-20 bg-red-600 white">
              <div class="counter counter-lg counter-inverse">
                <div class="counter-label text-uppercase font-size-16">We have</div>
                <div class="counter-number-group">
                  <span class="counter-number"><?php echo @$data['employees']; ?></span>
                  <span class="counter-icon margin-left-10"><i class="icon wb-users" aria-hidden="true"></i></span>
                </div>
                <div class="counter-label text-uppercase font-size-16">Active Employess</div>
              </div>
            </div>
          </div>
        </div>
          </a>
         <div class="col-lg-3 col-md-6">
          <div class="widget">
            <div class="widget-content padding-20 bg-green-600 white">
              <div class="counter counter-lg counter-inverse">
                <div class="counter-label text-uppercase font-size-16">We have</div>
                <div class="counter-number-group">
                  <span class="counter-number"><?php echo @$data['customers']; ?></span>
                  <span class="counter-icon margin-left-10"><i class="icon fa fa-users" aria-hidden="true"></i></span>
                </div>
                <div class="counter-label text-uppercase font-size-16">Customers</div>
              </div>
            </div>
          </div>
        </div>

          <div class="col-lg-3 col-md-6">
          <div class="widget">
            <div class="widget-content padding-20 bg-purple-600 white">
              <div class="counter counter-lg counter-inverse">
                <div class="counter-label text-uppercase font-size-16">We have</div>
                <div class="counter-number-group">
                  <span class="counter-number"><?php echo '$'. number_format(@$data['earning']); ?></span>
                  <span class="counter-icon margin-left-10"><i class="icon fa fa-money" aria-hidden="true"></i></span>
                </div>
                <div class="counter-label text-uppercase font-size-16">Earning</div>
              </div>
            </div>
          </div>
        </div> 

        

    </div><!-- Row -->
</div><!-- Main Wrapper -->
<?php
require  public_path().'/s_shop/footer.blade.php';
?>