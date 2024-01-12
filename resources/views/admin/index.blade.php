<?php
require  public_path().'/admin/header.blade.php';
?>
<div id="main-wrapper">
    <div class="row">
       <a href="<?php echo PUBLIC_PATH.'/admin/painters';?>">
        <div class="col-lg-3 col-md-6">
          <!-- Widget -->
          <div class="widget">
            <div class="widget-content padding-20 bg-blue-600 white">
              <div class="counter counter-lg counter-inverse">
                <div class="counter-label text-uppercase font-size-16">We have</div>
                <div class="counter-number-group">
                  <span class="counter-number"><?php echo $data['activeuser']; ?></span>
                  <span class="counter-icon margin-left-10"><i class="icon wb-users" aria-hidden="true"></i></span>
                </div>
                <div class="counter-label text-uppercase font-size-16">Painters</div>
              </div>
            </div>
          </div>
          <!-- End Widget -->
        </div>
        </a>

        <a href="<?php echo PUBLIC_PATH.'/admin/shops';?>">
        <div class="col-lg-3 col-md-6">
          <div class="widget">
            <div class="widget-content padding-20 bg-red-600 white">
              <div class="counter counter-lg counter-inverse">
                <div class="counter-label text-uppercase font-size-16">We have</div>
                <div class="counter-number-group">
                  <span class="counter-number"><?php echo $data['activeshop']; ?></span>
                  <span class="counter-icon margin-left-10"><i class="icon wb-users" aria-hidden="true"></i></span>
                </div>
                <div class="counter-label text-uppercase font-size-16">Shops</div>
              </div>
            </div>
          </div>
        </div>
        </a>
          
           <a href="<?php echo PUBLIC_PATH.'/admin/orders';?>">
          <div class="col-lg-3 col-md-6">
          <div class="widget">
            <div class="widget-content padding-20 bg-green-600 white">
              <div class="counter counter-lg counter-inverse">
                <div class="counter-label text-uppercase font-size-16">We have</div>
                <div class="counter-number-group">
                  <span class="counter-number"><?php echo $data['total_orders']; ?></span>
                  <span class="counter-icon margin-left-10"><i class="icon fa fa-cube" aria-hidden="true"></i></span>
                </div>
                <div class="counter-label text-uppercase font-size-16">Orders</div>
              </div>
            </div>
          </div>
        </div>
            </a>
          <a href="<?php echo PUBLIC_PATH.'/admin/orders';?>">
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
         </a>

    </div><!-- Row -->
</div><!-- Main Wrapper -->
<?php
require  public_path().'/admin/footer.blade.php';
?>