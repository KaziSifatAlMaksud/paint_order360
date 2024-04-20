<?php
require  public_path() . '/custom_settings.php';



//echo '<pre>';
    if (isset($_paint_shop['name'])) {
    $nameArray = explode(" ", $_paint_shop['name']);
    }

// $nameArray = explode(" ", $_paint_shop->name);

$shopName = '';

foreach ($nameArray as $key => $value) {
    if ($key == 0) {
        $shopName = '<font color="#f57c1f">' . ucfirst($value) . '</font>';
    } elseif ($key == 1) {
        $shopName .= '<font color="skyblue">' . ucfirst($value) . '</font>';
    } else {
        $shopName .= '<font color="navy">' . ucfirst($value) . '</font>';
    }
}

//print_r($unseen);

//die;
?>
<!DOCTYPE html>
<html class="no-js before-run" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="bootstrap admin template">
    <meta name="author" content="">
    <title><?php echo APP_NAME ?> | Shop</title>

    <link rel="apple-touch-icon" href="<?php echo PUBLIC_PATH; ?>/image/favicon.png">
    <link rel="shortcut icon" href="<?php echo PUBLIC_PATH; ?>/image/favicon.png">
    <!-- Stylesheets -->
    <link rel="stylesheet" href="<?php echo PUBLIC_PATH . '/assets' ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo PUBLIC_PATH . '/assets' ?>/css/bootstrap-extend.min.css">
    <link rel="stylesheet" href="<?php echo PUBLIC_PATH . '/assets' ?>/css/site.min.css">
    <link rel="stylesheet" href="<?php echo PUBLIC_PATH . '/assets' ?>/vendor/animsition/animsition.css">
    <link rel="stylesheet" href="<?php echo PUBLIC_PATH . '/assets' ?>/vendor/asscrollable/asScrollable.css">
    <link rel="stylesheet" href="<?php echo PUBLIC_PATH . '/assets' ?>/vendor/switchery/switchery.css">
    <link rel="stylesheet" href="<?php echo PUBLIC_PATH . '/assets' ?>/vendor/intro-js/introjs.css">
    <link rel="stylesheet" href="<?php echo PUBLIC_PATH . '/assets' ?>/vendor/slidepanel/slidePanel.css">
    <link rel="stylesheet" href="<?php echo PUBLIC_PATH . '/assets' ?>/vendor/bootstrap-datepicker/bootstrap-datepicker.css">
    <link rel="stylesheet" href="<?php echo PUBLIC_PATH . '/assets' ?>/vendor/flag-icon-css/flag-icon.css">
    <link rel="stylesheet" href="<?php echo PUBLIC_PATH . '/assets' ?>/vendor/alertify-js/alertify.css">
    <!-- Fonts -->
    <link rel="stylesheet" href="<?php echo PUBLIC_PATH . '/assets' ?>/fonts/font-awesome/font-awesome.css">
    <link rel="stylesheet" href="<?php echo PUBLIC_PATH . '/assets' ?>/fonts/web-icons/web-icons.min.css">
    <link rel="stylesheet" href="<?php echo PUBLIC_PATH . '/assets' ?>/fonts/brand-icons/brand-icons.min.css">
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>
    <link rel="stylesheet" href="<?php echo PUBLIC_PATH . '/assets' ?>/vendor/toastr/toastr.css">
    <!-- <link rel="stylesheet" href="<?php //echo PUBLIC_PATH.'/assets' 
                                        ?>/pages/profile.css"> -->
    <link rel="stylesheet" href="<?php echo PUBLIC_PATH . '/assets' ?>/vendor/clockpicker/clockpicker.css">
    <link rel="stylesheet" href="<?php echo PUBLIC_PATH . '/assets' ?>/vendor/cropper/cropper.css">
    <link rel="stylesheet" href="<?php echo PUBLIC_PATH . '/assets' ?>/vendor/multi-select/multi-select.css">
    <link rel="stylesheet" href="<?php echo PUBLIC_PATH . '/assets' ?>/vendor/select2/select2.css">
    <link rel="stylesheet" href="<?php echo PUBLIC_PATH ?>/datetimepicker/build/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="<?php echo PUBLIC_PATH ?>/datetimepicker/build/css/bootstrap-datetimepicker.css">
    <link rel="stylesheet" href="<?php echo PUBLIC_PATH ?>/datetimepicker/build/css/bootstrap-datetimepicker-standalone.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">


    <script src="<?php echo PUBLIC_PATH . '/assets' ?>/vendor/jquery/jquery.js"></script>
    <script src="<?php echo PUBLIC_PATH . '/assets' ?>/vendor/bootstrap/bootstrap.js"></script>
    <script src="<?php echo PUBLIC_PATH . '/assets' ?>/vendor/bootstrap-datepicker/bootstrap-datepicker.js"></script>
    <script src="<?php echo PUBLIC_PATH . '/assets' ?>/vendor/clockpicker/bootstrap-clockpicker.min.js"></script>
    <script src="<?php echo PUBLIC_PATH . '/assets' ?>/vendor/cropper/cropper.min.js"></script>
    <script src="<?php echo PUBLIC_PATH . '/assets' ?>/vendor/multi-select/jquery.multi-select.js"></script>
    <script src="<?php echo PUBLIC_PATH . '/assets' ?>/vendor/select2/select2.min.js"></script>
    <script src="<?php echo PUBLIC_PATH . '/assets' ?>/vendor/alertify-js/alertify.js"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />
    <link rel="stylesheet" href="<?php echo PUBLIC_PATH . '/assets' ?>/css/ajax-bootstrap-select.css" />

    <script src="<?php echo PUBLIC_PATH . '/assets' ?>/vendor/animsition/jquery.animsition.js"></script>
    <script src="<?php echo PUBLIC_PATH . '/assets' ?>/vendor/mousewheel/jquery.mousewheel.js"></script>


    <style type="text/css">
        .product-image-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.9);
            z-index: 9999;
            display: none;
        }

        .product-image-overlay .product-image-overlay-close {
            display: block;
            position: absolute;
            top: 20px;
            left: 20px;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            border: 1px solid #eee;
            line-height: 35px;
            font-size: 20px;
            color: #eee;
            text-align: center;
            cursor: pointer;
        }

        .product-image-overlay img {
            width: auto;
            max-width: 80%;
            position: absolute;
            top: 50%;
            left: 50%;
            height: 363px;
            -webkit-transform: translate(-50%, -50%);
            -moz-transform: translate(-50%, -50%);
            -o-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }

        .alert-dismissable {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 999;
            width: 50%;
            padding: 41px 38px;
        }

        a.ph.shop-logo {
            width: 65px;
            display: block;
            height: 65px;
        }

        a.ph.shop-logo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
        }

        .navbar-brand.navbar-brand-center {
            padding: 0px 15px;
        }

    </style>
    <!--
        <script src="<?php echo PUBLIC_PATH . '/assets' ?>/vendor/blueimp-file-upload/jquery.fileupload-ui.js"></script>
        <script src="<?php echo PUBLIC_PATH . '/assets' ?>/vendor/blueimp-file-upload/jquery.fileupload.js"></script>
        -->


    <!--[if lt IE 9]>
          <script src="<?php echo PUBLIC_PATH . '/assets' ?>/vendor/html5shiv/html5shiv.min.js"></script>
          <![endif]-->

    <!--[if lt IE 10]>
          <script src="<?php echo PUBLIC_PATH . '/assets' ?>/vendor/media-match/media.match.min.js"></script>
          <script src="<?php echo PUBLIC_PATH . '/assets' ?>/vendor/respond/respond.min.js"></script>
          <![endif]-->

    <!-- Scripts -->
    <script src="<?php echo PUBLIC_PATH . '/assets' ?>/vendor/modernizr/modernizr.js"></script>
    <script src="<?php echo PUBLIC_PATH . '/assets' ?>/vendor/breakpoints/breakpoints.js"></script>
    <script>
        Breakpoints();

    </script>
</head>

<body>
    <nav class="site-navbar navbar navbar-default navbar-fixed-top navbar-mega" role="navigation">
        <div class="">
            <!--   <button type="button" class="navbar-toggle hamburger hamburger-close navbar-toggle-left hided"
                        data-toggle="menubar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="hamburger-bar"></span>
                </button> 
              
                <button type="button" class="navbar-toggle collapsed" data-target="#site-navbar-search"
                        data-toggle="collapse">
                    <span class="sr-only">Toggle Search</span>
                    <i class="icon wb-search" aria-hidden="true"></i>
                </button>-->
            <button type="button" class="navbar-toggle ph collapsed" data-target="#site-navbar-collapse" data-toggle="collapse">
                <i class="icon wb-more-horizontal" aria-hidden="true"></i>
            </button>
            <div class="navbar-brand navbar-brand-center" data-toggle="gridmenu">
                <a class="ph shop-logo" href="<?php echo PUBLIC_PATH; ?>/shop/dashboard">
                    <!-- <strong><?php //echo $shopName;
                                    ?></strong> -->

                    <img src="<?php echo PUBLIC_PATH; ?>/image/logo-phone.png">
                </a>
                <br>
                <!-- <span class="navbar-brand-text"> ( <?php //echo $shopName 
                                                        ?> )</span> -->
            </div>
        </div>

        <div class="navbar-container container-fluid">
            <!-- Navbar Collapse -->
            <div class="collapse navbar-collapse navbar-collapse-toolbar" id="site-navbar-collapse">
                <!-- Navbar Toolbar -->
                <ul class="nav navbar-toolbar">
                    <!--  <li class="hidden-float" id="toggleMenubar">
                            <a data-toggle="menubar" href="#" role="button">
                                <i class="icon hamburger hamburger-arrow-left">
                                    <span class="sr-only">Toggle menubar</span>
                                    <span class="hamburger-bar"></span>
                                </i>
                            </a>
                        </li> -->
                    <!-- <li class="hidden-xs" id="toggleFullscreen">
                            <a class="icon icon-fullscreen" data-toggle="fullscreen" href="#" role="button">
                                <span class="sr-only">Toggle fullscreen</span>
                            </a>
                        </li> -->

                    <li class="site-menu-item">
                        <a class="animsition-link" href="<?php echo PUBLIC_PATH . '/shop/dashboard' ?>" data-slug="dashboard">
                            <i class="site-menu-icon fa fa-dashboard" aria-hidden="true"></i>
                            <span class="site-menu-title">Dashboard</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a class="animsition-link" href="<?php echo PUBLIC_PATH . '/shop/today_orders' ?>" data-slug="admins-listing">
                            <i class="site-menu-icon fa fa-cubes" aria-hidden="true"></i>
                            <span class="site-menu-title">Today's Orders </span><span id="badge"></span>
                        </a>
                        <input type="hidden" id="badge1" value="">
                    </li>
                    <li class="site-menu-item">
                        <a class="animsition-link" href="<?php echo PUBLIC_PATH . '/shop/orders' ?>" data-slug="users-listing">
                            <i class="site-menu-icon fa fa-cubes" aria-hidden="true"></i>
                            <span class="site-menu-title">All Orders</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a class="animsition-link" href="<?php echo PUBLIC_PATH . '/shop/customers' ?>" data-slug="articles-listing">
                            <i class="site-menu-icon wb-users" aria-hidden="true"></i>
                            <span class="site-menu-title">Customers</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a class="animsition-link" href="<?php echo PUBLIC_PATH . '/shop/employees' ?>" data-slug="articles-listing">
                            <i class="site-menu-icon wb-users" aria-hidden="true"></i>
                            <span class="site-menu-title">Employees</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a class="animsition-link" href="<?php echo PUBLIC_PATH . '/shop/order/order_details' ?>" data-slug="articles-listing">


                            <i class=" site-menu-icon fa fa-print" aria-hidden="true"></i>



                            <span class="site-menu-title">Print Order</span>
                        </a>
                    </li>

                    <!-- <li class="site-menu-item">
                                <a class="animsition-link" href="<?php echo PUBLIC_PATH . '/shop/contact_us' ?>" data-slug="articles-listing">
                                    <i class="site-menu-icon wb-users" aria-hidden="true"></i>
                                    <span class="site-menu-title">Contact-Us</span>
                                </a>
                            </li> -->
                    <!-- <li class="site-menu-item">
                                <a class="animsition-link" href="" data-slug="articles-listing">
                                    <i class="site-menu-icon fa fa-cubes" aria-hidden="true"></i>
                                    <span class="site-menu-title">Marketing</span>
                                </a>
                            </li>-->

                </ul>
                <!-- End Navbar Toolbar -->

                <!-- Navbar Toolbar Right -->
                <ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">
                    <li class="dropdown">
                        <a class="navbar-avatar" href="<?php echo PUBLIC_PATH . '/shop/logout' ?>">
                            <i class="icon wb-power"></i> Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <?php
    if (Session::has('message')) {
    ?>
    <div class="row visible-ie8 alert_msg">
        <div class="">
            <div class="alert <?php echo Session::get('alert-class', 'alert-info') ?> alert-dismissable">
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button" style="color:black">×</button>
                <?php echo Session::get('message'); ?>
            </div>
        </div>
    </div>
    <?php
    }
    require  public_path() . '/s_shop/sidebar.blade.php';

    ?>
