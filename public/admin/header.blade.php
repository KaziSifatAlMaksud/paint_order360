<?php
require  public_path() . '/custom_settings.php';
$_paint_admin = Null;
if (Session::has('paint_admin')) {
    $_paint_admin = Session::get('paint_admin');
}
?>
<!DOCTYPE html>
<html class="no-js before-run" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="bootstrap admin template">
    <meta name="author" content="">
    <title><?php echo APP_NAME ?> | Admin</title>
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
    <script src="<?php echo PUBLIC_PATH . '/assets' ?>/vendor/jquery/jquery.js"></script>
    <script src="<?php echo PUBLIC_PATH . '/assets' ?>/vendor/bootstrap/bootstrap.js"></script>
    <script src="<?php echo PUBLIC_PATH . '/assets' ?>/vendor/bootstrap-datepicker/bootstrap-datepicker.js"></script>
    <script src="<?php echo PUBLIC_PATH . '/assets' ?>/vendor/clockpicker/bootstrap-clockpicker.min.js"></script>
    <script src="<?php echo PUBLIC_PATH . '/assets' ?>/vendor/cropper/cropper.min.js"></script>
    <script src="<?php echo PUBLIC_PATH . '/assets' ?>/vendor/multi-select/jquery.multi-select.js"></script>
    <script src="<?php echo PUBLIC_PATH . '/assets' ?>/vendor/select2/select2.min.js"></script>
    <script src="<?php echo PUBLIC_PATH . '/assets' ?>/vendor/alertify-js/alertify.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
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

        .photo_order_icon {
            width: 20px;
            height: 20px;
        }

        option.single_value {
            display: none;
        }

        option.single_value.active,
        option.single_value.show {
            display: block;
        }

        .navbar-brand a {
            width: 70px;
            height: 70px;
            display: block;
            margin: 0 auto;
        }

        .navbar-brand-logo {
            margin-top: 0px !important;
        }

        .navbar-brand {
            padding: 4px 10px;
        }

        ul.nav.navbar-toolbar {
            padding-top: 7px;
        }

        .navbar-brand a img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
        }

        body.site-menubar-unfold {
            padding-top: 82px;
        }

        .site-menubar {
            top: 82px;
        }

        .navbar-brand {
            height: 82px;

        }
        .po-wrap {
            padding: 8px;
            border: solid 1px #000;
            margin-bottom: 35px;
        }
        .po-wrap:last-child {
            margin-bottom: 0px;
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
        <div class="navbar-header">
            <button type="button" id="change" class="navbar-toggle hamburger hamburger-close navbar-toggle-left hided" data-toggle="menubar">
                <span class="sr-only">Toggle navigation</span>
                <span class="hamburger-bar"></span>
            </button>
            <button type="button" class="navbar-toggle collapsed" data-target="#site-navbar-collapse" data-toggle="collapse">
                <i class="icon wb-more-horizontal" aria-hidden="true"></i>
            </button>
            <button type="button" class="navbar-toggle collapsed" data-target="#site-navbar-search" data-toggle="collapse">
                <span class="sr-only">Toggle Search</span>
                <i class="icon wb-search" aria-hidden="true"></i>
            </button>
            <div class="navbar-brand navbar-brand-center" style="width: 100%;" data-toggle="gridmenu">
                <a href="<?php echo PUBLIC_PATH; ?>/admin/dashboard">
                    <img id="logo" width="100%" class="navbar-brand-logo" src="<?php echo PUBLIC_PATH ?>/image/logo-phone.png" title="<?php echo APP_NAME; ?>"></a>
                <span class="navbar-brand-text"><?php //echo APP_NAME 
                                                ?></span>
            </div>
        </div>
        <div class="navbar-container container-fluid">
            <!-- Navbar Collapse -->
            <div class="collapse navbar-collapse navbar-collapse-toolbar" id="site-navbar-collapse">
                <!-- Navbar Toolbar -->
                <ul class="nav navbar-toolbar">
                    <li class="hidden-float" id="toggleMenubar">
                        <a data-toggle="menubar" href="#" role="button">
                            <i class="icon hamburger hamburger-arrow-left">
                                <span class="sr-only">Toggle menubar</span>
                                <span class="hamburger-bar"></span>
                            </i>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo PUBLIC_PATH . '/admin/dashboard' ?>">
                            <img src="{{ asset('/image/logo.png') }}">
                        </a>
                    </li>
                    <li class="hidden-xs" id="toggleFullscreen">
                        <a class="icon icon-fullscreen" data-toggle="fullscreen" href="#" role="button">
                            <span class="sr-only">Toggle fullscreen</span>
                        </a>
                    </li>
                </ul>
                <!-- End Navbar Toolbar -->

                <!-- Navbar Toolbar Right -->
                <ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">
                    <li class="dropdown">
                        <a class="navbar-avatar" href="<?php echo PUBLIC_PATH . '/admin/logout' ?>">
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
    require  public_path() . '/admin/sidebar.php';
    ?>