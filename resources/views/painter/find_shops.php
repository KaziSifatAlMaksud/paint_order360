<?php
require  public_path() . '/painter/header.php';
require  public_path() . '/painter/sidebar-2.php';
$Painter_user = Session::get('Painter_user');
?>
<!-- Page Content -->
<div id="page-content-wrapper">
    <div class="header-hide">
        <span class="hamb-top"></span>
        <span class="hamb-middle"></span>
        <span class="hamb-bottom"></span>
        </button>
        <div class="container-fluid-main">
            <div class="div">
                <a href="<?php echo PUBLIC_PATH . '/main' ?>">
                    <img src="{{ asset('/image/logo.png') }}">
                </a>
            </div>
            <h2>Previous Orders</h2>
        </div>
    </div>
    <div class="container-fluid last-order">
        <div class="row">
            <div class="col-lg-12">
                <div class="topbar">
                    <h2>Nearest Shops</h2>
                    <p class="color-gray">Here you can see the nearest shop to your location.</p>
                </div>
                <div class="bottombar mt-70">
                    <!--<h2>Nearest Shops<a href="#"><i class="fa fa-angle-down" aria-hidden="true"></i></a></h2>-->
                    <div class="table-responsive table">
                        <table class="table table-inverse" id="shop_table">
                            <thead>
                                <tr>
                                    <th>Shop Name</th>
                                    <th>Shop Address</th>
                                    <!--<th>Shop Email</th>-->
                                    <th>Shop Phone</th>
                                    <th>Distance</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($shops as $key => $value) {  ?>
                                    <tr>
                                        <td><?php echo $value->name; ?></td>
                                        <td><?php echo $value->address; ?></td>
                                        <!--<td><?php //echo $value->email;
                                                ?></td>-->
                                        <td><?php echo $value->phone; ?></td>
                                        <td><?php echo $value->distance . ' Miles'; ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /#page-content-wrapper -->
<?php
require  public_path() . '/painter/footer.php';
?>