<?php
require  public_path() . '/custom_settings.php';

$_Painter_user = Null;

if (Session::has('Painter_user')) {
    $_Painter_user = Session::get('Painter_user');
}

?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Paint Shop</title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="Codrops" />
  

    <link rel="apple-touch-icon" href="<?php echo PUBLIC_PATH; ?>/image/favicon.png">
    <link rel="shortcut icon" href="<?php echo PUBLIC_PATH; ?>/image/favicon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <link rel="stylesheet" href="<?php echo PUBLIC_PATH; ?>/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo PUBLIC_PATH; ?>/css/font-awesome.css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo PUBLIC_PATH; ?>/css/progressively.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo PUBLIC_PATH; ?>/css/image-upload.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo PUBLIC_PATH; ?>/css/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--For include html file-->
    <script src="https://www.w3schools.com/lib/w3.js"></script>
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
    </style>
</head>

<body>
    

    <div id="wrapper" class="toggled">
        <div class="overlay"></div>
          
        

        <?php
        if (Session::has('message')) {
        ?>
            <div class="row visible-ie8 alert_msg">
                <div class="">
                    <div class="alert <?php echo Session::get('alert-class', 'alert-info') ?> alert-dismissable">
                        <button id="p_close" class="close" aria-hidden="true" data-dismiss="alert" type="button" style="color:black">×</button>
                        <?php echo Session::get('message'); ?>
                    </div>
                </div>
            </div>
            
            <script type="text/javascript">
                setTimeout("CallButton()", 2000)

                function CallButton() {
                    document.getElementById("p_close").click();
                }
            </script>
        <?php
        }   
        ?>

                
