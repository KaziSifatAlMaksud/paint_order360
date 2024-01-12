<?php
require  public_path() . '/custom_settings.php';
?>
<!DOCTYPE html>
<html class="no-js before-run" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="bootstrap admin template">
    <meta name="author" content="">

    <title><?php echo APP_NAME ?> | Admin | Login </title>

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
    <link rel="stylesheet" href="<?php echo PUBLIC_PATH . '/assets' ?>/vendor/flag-icon-css/flag-icon.css">
    <link rel="stylesheet" href="<?php echo PUBLIC_PATH . '/assets' ?>/vendor/toastr/toastr.css">


    <!-- Page -->
    <link rel="stylesheet" href="<?php echo PUBLIC_PATH . '/assets' ?>/css/pages/login.css">
    <!-- <link rel="stylesheet" href="<?php //echo $this->webroot;
                                        ?>css/style.php"> -->

    <!-- Fonts -->
    <link rel="stylesheet" href="<?php echo PUBLIC_PATH . '/assets' ?>/fonts/web-icons/web-icons.min.css">
    <link rel="stylesheet" href="<?php echo PUBLIC_PATH . '/assets' ?>/fonts/brand-icons/brand-icons.min.css">
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>
    <style>
        .form-group {
            margin-bottom: 20px;
            float: left;
            width: 100%;
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
        .logo-wrapper img {
            width: 100%;
            height: 100%;
        }
        .logo-wrapper {
            max-width: 80px;
            max-height: 80px;
            margin: 0 auto;
        }
    </style>

    <script src="<?php echo PUBLIC_PATH . '/assets' ?>/vendor/jquery/jquery.js"></script>
    <script src="<?php echo PUBLIC_PATH . '/assets' ?>/vendor/bootstrap/bootstrap.js"></script>

    <script src="<?php echo PUBLIC_PATH . '/assets' ?>/vendor/modernizr/modernizr.js"></script>
    <script src="<?php echo PUBLIC_PATH . '/assets' ?>/vendor/breakpoints/breakpoints.js"></script>
    <script>
        Breakpoints();
    </script>
</head>

<body class="page-login layout-full">
    <!--[if lt IE 8]>
              <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
          <![endif]-->
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
    ?>

    <!-- Page -->
    <div class="page animsition vertical-align text-center" data-animsition-in="fade-in" data-animsition-out="fade-out">>
        <div class="page-content vertical-align-middle">
            <div class="brand">
                <!-- <img class="brand-img" width="100px" src="<?php // echo PUBLIC_PATH
                                                                ?>/image/logo.png" alt="..."> -->
                <h1 class="brand-text"><?php //echo APP_NAME 
                                        ?></h1>
            </div>

            <div id="page-content-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="topbar">
                                <h1 class="mt-70">
                                    <div class="logo-wrapper"><img src="<?php echo PUBLIC_PATH ?>/image/logo-phone.png"></div>
                                </h1>
                                <p class="color-gray">Welcome back Champion</p>
                            </div>
                            <div class="mt-70">
                                <div class="row">
                                    <form method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label class="label">Email</label>
                                            <input type="email" class="form-control" name="email" required placeholder="Email">
                                        </div>
                                        <div class="form-group">
                                            <label class="label">Password</label>
                                            <input type="password" class="form-control" name="password" required placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" value="Login" name="login_admin" class="btn btn-info">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /#page-content-wrapper -->

            <?php //echo $this->element('admin/login-footer'); 
            ?>
        </div>
    </div>
    <!-- End Page -->


    <!-- Core  -->
    <script src="<?php echo PUBLIC_PATH . '/assets' ?>/vendor/animsition/jquery.animsition.js"></script>
    <script src="<?php echo PUBLIC_PATH . '/assets' ?>/vendor/asscroll/jquery-asScroll.js"></script>
    <script src="<?php echo PUBLIC_PATH . '/assets' ?>/vendor/mousewheel/jquery.mousewheel.js"></script>
    <script src="<?php echo PUBLIC_PATH . '/assets' ?>/vendor/asscrollable/jquery.asScrollable.all.js"></script>
    <script src="<?php echo PUBLIC_PATH . '/assets' ?>/vendor/ashoverscroll/jquery-asHoverScroll.js"></script>

    <!-- Plugins -->
    <script src="<?php echo PUBLIC_PATH . '/assets' ?>/vendor/switchery/switchery.min.js"></script>
    <script src="<?php echo PUBLIC_PATH . '/assets' ?>/vendor/intro-js/intro.js"></script>
    <script src="<?php echo PUBLIC_PATH . '/assets' ?>/vendor/screenfull/screenfull.js"></script>
    <script src="<?php echo PUBLIC_PATH . '/assets' ?>/vendor/slidepanel/jquery-slidePanel.js"></script>

    <script src="<?php echo PUBLIC_PATH . '/assets' ?>/vendor/jquery-placeholder/jquery.placeholder.js"></script>

    <!-- Scripts -->
    <script src="<?php echo PUBLIC_PATH . '/assets' ?>/js/core.js"></script>
    <script src="<?php echo PUBLIC_PATH . '/assets' ?>/js/site.js"></script>

    <script src="<?php echo PUBLIC_PATH . '/assets' ?>/js/sections/menu.js"></script>
    <script src="<?php echo PUBLIC_PATH . '/assets' ?>/js/sections/menubar.js"></script>
    <script src="<?php echo PUBLIC_PATH . '/assets' ?>/js/sections/sidebar.js"></script>

    <script src="<?php echo PUBLIC_PATH . '/assets' ?>/js/configs/config-colors.js"></script>
    <script src="<?php echo PUBLIC_PATH . '/assets' ?>/js/configs/config-tour.js"></script>

    <script src="<?php echo PUBLIC_PATH . '/assets' ?>/js/components/asscrollable.js"></script>
    <script src="<?php echo PUBLIC_PATH . '/assets' ?>/js/components/animsition.js"></script>
    <script src="<?php echo PUBLIC_PATH . '/assets' ?>/js/components/slidepanel.js"></script>
    <script src="<?php echo PUBLIC_PATH . '/assets' ?>/js/components/switchery.js"></script>
    <script src="<?php echo PUBLIC_PATH . '/assets' ?>/js/components/jquery-placeholder.js"></script>
    <script src="<?php echo PUBLIC_PATH . '/assets' ?>/vendor/toastr/toastr.js"></script>
    <script src="<?php echo PUBLIC_PATH . '/assets' ?>/js/components/toastr.js"></script>

    <script>
        (function(document, window, $) {
            'use strict';

            var Site = window.Site;
            $(document).ready(function() {

                $(".alert_msg").show().delay(30000).fadeOut();
                Site.run();
            });
        })(document, window, jQuery);

        $(document).ready(function() {

            $(".alert_msg").show().delay(30000).fadeOut();

        });
    </script>
    <script src="<?php echo PUBLIC_PATH . '/assets' ?>/js/tweb.js"></script>

</body>

</html>