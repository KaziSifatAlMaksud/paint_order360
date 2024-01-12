<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <style>
        body {
            margin: 0;
            padding: 0;
            mso-line-height-rule: exactly;
            min-width: 100%;
        }

        .wrapper {
            display: table;
            table-layout: fixed;
            width: 100%;
            min-width: 620px;
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }

        body,
        .wrapper {
            background-color: #ffffff;
        }

        /* Basic */
        table {
            border-collapse: collapse;
            border-spacing: 0;
        }

        table.center {
            margin: 0 auto;
            width: 75% !important;
        }

        td {
            padding: 0;
            vertical-align: top;
        }

        .spacer,
        .border {
            font-size: 1px;
            line-height: 1px;
        }

        .spacer {
            width: 100%;
            line-height: 16px
        }

        .border {
            background-color: #e0e0e0;
            width: 1px;
        }

        .padded {
            padding: 0 24px;
        }

        img {
            border: 0;
            -ms-interpolation-mode: bicubic;
        }

        .image {
            font-size: 12px;
        }

        .image img {
            display: block;
        }

        strong,
        .strong {
            font-weight: 700;
        }

        h1,
        h2,
        h3,
        p,
        ol,
        ul,
        li {
            margin-top: 0;
        }

        ol,
        ul,
        li {
            padding-left: 0;
        }

        a {
            text-decoration: none;
            color: #616161;
        }

        .btn {
            background-color: #2196F3;
            border: 1px solid #2196F3;
            border-radius: 2px;
            color: #ffffff;
            display: inline-block;
            font-family: Roboto, Helvetica, sans-serif;
            font-size: 14px;
            font-weight: 400;
            line-height: 36px;
            text-align: center;
            text-decoration: none;
            text-transform: uppercase;
            width: 200px;
            height: 36px;
            padding: 0 8px;
            margin: 0;
            outline: 0;
            outline-offset: 0;
            -webkit-text-size-adjust: none;
            mso-hide: all;
        }

        /* Top panel */
        .title {
            text-align: left;
            min-width: 750px;
        }

        .subject {
            text-align: right;
        }

        .title,
        .subject {
            width: 300px;
            padding: 8px 0;
            color: #616161;
            font-family: Roboto, Helvetica, sans-serif;
            font-weight: 400;
            font-size: 12px;
            line-height: 14px;

        }

        /* Header */
        .logo {
            padding: 16px 0;
        }

        /* Logo */
        .logo-image {}

        /* Main */
        .main {
            -webkit-box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.12), 0 1px 2px 0 rgba(0, 0, 0, 0.24);
            -moz-box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.12), 0 1px 2px 0 rgba(0, 0, 0, 0.24);
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.12), 0 1px 2px 0 rgba(0, 0, 0, 0.24);
        }

        /* Content */
        .columns {
            margin: 0 auto;
            width: 600px;
            background-color: #ffffff;
            font-size: 14px;
        }

        .column {
            text-align: left;
            background-color: #ffffff;
            font-size: 14px;
        }

        .column-top {
            font-size: 24px;
            line-height: 24px;
        }

        .content {
            width: 100%;
        }

        .column-bottom {
            font-size: 8px;
            line-height: 8px;
        }

        .content h1 {
            margin-top: 0;
            margin-bottom: 16px;
            color: #212121;
            font-family: Roboto, Helvetica, sans-serif;
            font-weight: 400;
            font-size: 20px;
            line-height: 28px;
            min-width: 800px;
        }

        .content p {
            margin-top: 0;
            margin-bottom: 16px;
            color: #212121;
            font-family: Roboto, Helvetica, sans-serif;
            font-weight: 400;
            font-size: 16px;
            line-height: 24px;
        }

        .content .caption {
            color: #616161;
            font-size: 12px;
            line-height: 20px;
            min-width: 800px;
        }

        /* Footer */
        .signature,
        .subscription {
            vertical-align: bottom;
            width: 300px;
            padding-top: 8px;
            margin-bottom: 16px;
        }

        .signature {
            text-align: left;
        }

        .subscription {
            text-align: right;
        }

        .signature p,
        .subscription p {
            margin-top: 0;
            margin-bottom: 8px;
            color: #616161;
            font-family: Roboto, Helvetica, sans-serif;
            font-weight: 400;
            font-size: 12px;
            line-height: 18px;
            min-width: 780px;
        }

        @media only screen and (min-width: 0) {
            .wrapper {
                text-rendering: optimizeLegibility;
            }
        }

        @media only screen and (max-width: 620px) {
            [class=wrapper] {
                min-width: 302px !important;
                width: 100% !important;
            }

            [class=wrapper] .block {
                display: block !important;
            }

            [class=wrapper] .hide {
                display: none !important;
            }

            [class=wrapper] .top-panel,
            [class=wrapper] .header,
            [class=wrapper] .main,
            [class=wrapper] .footer {
                width: 302px !important;
            }

            [class=wrapper] .title,
            [class=wrapper] .subject,
            [class=wrapper] .signature,
            [class=wrapper] .subscription {
                display: block;
                float: left;
                width: 300px !important;
                text-align: center !important;
            }

            [class=wrapper] .signature {
                padding-bottom: 0 !important;
            }

            [class=wrapper] .subscription {
                padding-top: 0 !important;
            }
        }

        @import url(https://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100);

        body {
            background-color: #ebebeb;
            font-family: "Roboto", helvetica, arial, sans-serif;
            font-size: 16px;
            font-weight: 400;
            text-rendering: optimizeLegibility;
        }

        /*** Table Styles **/

        .table.nofill {
            border-radius: 3px;
            border-collapse: collapse;
            height: 320px;
            margin: auto;
            max-width: 900px;
            padding: 5px;
            width: 100%;
        }

        .table>thead>tr>th,
        .table>tbody>tr>th,
        .table>tfoot>tr>th,
        .table>thead>tr>td,
        .table>tbody>tr>td,
        .table>tfoot>tr>td {
            padding: 22px
        }

        .table.nofill th {
            color: #27303e;
            border-bottom: 2px solid #27303e;
            font-size: 16px;
            font-weight: 400;
            vertical-align: middle;
        }

        .table.nofill tr {
            border-top: 1px solid #C9D1D8;
        }

        .table.nofill tr:first-child {
            border-top: none;
        }

        .table tr:last-child {
            border-bottom: 1px solid #C9D1D8;
        }

        .table td {
            vertical-align: top;
            color: #576475;
            font-weight: 400;
            -webkit-transition: all 0.3s;
            -moz-transition: all 0.3s;
            transition: all 0.3s;
            font-size: 16px;
            background-color: white;
            min-width: 100px;
        }

        .table td:first-child {
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            border-radius: 3px;
        }

        .table td {
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            border-radius: 3px;
            border-left: 1px solid #C9D1D8 !important;
        }

        .table-striped tbody>tr:nth-child(2n+2)>td,
        .table-striped tbody>tr:nth-child(2n+2)>th {
            background-color: #fafafa;
            border: none;
        }

        tbody.table-hover tr:hover>td,
        .table-hover tbody tr:hover>th {
            background-color: rgba(86, 98, 108, 0.2);
        }

        th.text-left {
            text-align: left;
        }

        th.text-center {
            text-align: center;
        }

        th.text-right {
            text-align: right;
        }

        td.text-left {
            text-align: left;
        }

        td.text-center {
            text-align: center;
        }

        td.text-right {
            text-align: right;
        }
    </style>
</head>

<body>
    <center class="wrapper">
        <table class="top-panel center" width="602" border="0" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td class="border" colspan="2">&nbsp;</td>
                </tr>
            </tbody>
        </table>
        <div class="spacer">&nbsp;</div>
        <table class="main center" width="602" border="0" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td class="column">
                        <div class="column-top">&nbsp;</div>
                        <table class="content" border="0" cellspacing="0" cellpadding="0">
                            <tbody>
                                <tr>
                                    <td class="padded">
                                        <h1 style="margin-bottom:10px;">Hello!</h1>
                                        <h1>A new order has been received.</h1>
                                        <p>Shop Name : {{ !empty($orderData[0]->name) ? $orderData[0]->name : '' }} </p>
                                        <p>Customer Name : {{ !empty($orderData[0]->customer_name) ? $orderData[0]->customer_name.', ' .$orderData[0]->first_name : '' }}</p>
                                        <p>Date :
                                            <?php if (!empty(@$orderData[0]->created)) {
                                                $show_date = $orderData[0]->created;
                                            } else {
                                                $show_date = time();
                                            }
                                            echo date("d-m-Y", $show_date);
                                            ?>
                                        </p>
                                        <p>Pick Up / Delivery : <?php if (@$orderData[0]->pickup == 0) echo 'From Shop';
                                                                elseif (@$orderData[0]->pickup == 1) echo '<span>Deliver To Home</span>';
                                                                else echo '<span>Deliver To Job Address</span>'; ?>
                                        </p>
                                        <p>Job Address : <?php echo @$orderData[0]->address; ?></p>
                                        <p>Order Status : <?php
                                                            if (@$orderData[0]->o_status == 0) {
                                                                echo '<span class="label label-warning"> Pending </span>';
                                                            } elseif (@$orderData[0]->o_status == 1) {
                                                                echo '<span class="label label-info"> In-progress </span>';
                                                            } elseif (@$orderData[0]->o_status == 2) {
                                                                echo '<span class="label label-primary"> Delivered </span>';
                                                            } elseif (@$orderData[0]->o_status == 3) {
                                                                echo ' <span class="label label-success"> Completed </span>';
                                                            } elseif (@$orderData[0]->o_status == 4) {
                                                                echo '<span class="label label-danger"> Canceled </span>';
                                                            }
                                                            ?></p>
                                        <p>Account : <?php echo @$ordersdetails[0]->builder_brand . ' ' . @$ordersdetails[0]->builder_name . ' ' . @$ordersdetails[0]->account_no; ?></p>
                                        @if(!empty($ordersdetails[0]->photo))
                                        <img width="200px" style="padding: 20px 0px;" class=" pop" src="<?php echo URL::to('/') . '/uploads/' . $ordersdetails[0]->photo; ?>">
                                        @endif

                                        <body>
                                            <table class="table nofill table-striped " style="width: 100%; ">
                                                <thead style="background-color:#f57c1f">
                                                    <tr>
                                                        <th>Product</th>
                                                        <th>Color</th>
                                                        <th>Size</th>
                                                        <th>Amount</th>
                                                        <th>Brand</th>
                                                        <th>Notes</th>
                                                        <th>Area</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="table-hover">
                                                    <?php
                                                    foreach ($orderData as $key => $value) {
                                                    ?>
                                                        <tr>
                                                            <td>
                                                                <p><?php echo $value->product; ?></p>
                                                            </td>
                                                            <td>
                                                                <p><?php echo $value->color; ?></p>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                if ($value->size == 101) {
                                                                    echo 'None';
                                                                } elseif ($value->size == 102) {
                                                                    echo 'Call Me';
                                                                } else {
                                                                    echo $value->size . ' L';
                                                                }
                                                                // echo $value->size . ' L';
                                                                // if ($value->size == 1) {
                                                                //     echo '15 L';
                                                                // } elseif ($value->size == 2) {
                                                                //     echo '10 L';
                                                                // } elseif ($value->size == 3) {
                                                                //     echo '4 L';
                                                                // } elseif ($value->size == 4) {
                                                                //     echo '2 L';
                                                                // } elseif ($value->size == 5) {
                                                                //     echo '1 L';
                                                                // }
                                                                ?>
                                                            <td style="text-align:center;">
                                                                <?php
                                                                if ($value->size != 102) {
                                                                    echo $value->qty;
                                                                }
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $value->b_name; ?>
                                                            </td>
                                                            <td>
                                                                <p><?php echo $value->note; ?></p>
                                                            </td>
                                                            <td>
                                                                <p><?php echo $value->area; ?></p>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </body>
                                        <br>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="column-bottom ">&nbsp;</div>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="spacer ">&nbsp;</div>
    </center>
</body>

</html>