<?php
require  public_path().'/painter/header.php';


?>
<!-- Page Content -->
<div id="page-content-wrapper">
    <div class="header-hide">
        
        <span class="hamb-top"></span>
		<span class="hamb-middle"></span>
		<span class="hamb-bottom"></span>
    </button>
        <div class="container-fluid-main">
            
            <h2><img src="image/logo.png"></h2>
        </div>
    </div>
    <div class="container-fluid-main">
        <div class="row">
            <div class="col-lg-12">
                <div class="topbar">
                    <!-- <h2>Eastwood Paint Shop</h2> -->
                    <h2 class=""><?php echo ($_Painter_user) ? 'Hello! , '.$_Painter_user->first_name.' '.@$_Painter_user->last_name : '';?></h2>
                    <!--<p class="color-gray">Please select your type of painting</p>-->
                </div>
                <div class="mt-70">
                    <div class="row">
                        <div class="paint col-lg-6">
                            <img src="image/new_house.png" class="img-responsive">
                            <div class="content">
                                <!-- <h4>New Housing</h4> -->
                                <a href="<?php echo PUBLIC_PATH.'/new_order';?>"><button class="btn-orange outer rounded">Order Paint</button></a>
                            </div>
                        </div>
                       <!--  <div class="paint col-lg-6">
                            <img src="image/commercial.png" class="img-responsive">
                            <div class="content">
                                <h4>Commercial Painting</h4>
                                <button class="btn-orange outer rounded">Order Paint</button>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /#page-content-wrapper -->
<?php
require  public_path().'/painter/footer.php';
?>