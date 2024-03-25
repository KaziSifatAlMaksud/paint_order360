<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> | Shop </title>
    <style>
        body {
            background-color: #F6F6F6;
            margin: 0;
            padding: 0;
            font-family: sans-serif;
            color: gray;

        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            margin: 0;
            padding: 0;
        }

        p {
            margin: 0;
            padding: 0;
        }

        .brand-section {
            margin-top: 50px;
            line-height: 1.6;
            padding-bottom: 20px
        }

        .container {
            width: 80%;
            margin-right: auto;
            margin-left: auto;
        }

        .logo {
            width: 50%;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
        }

        .col-6 {
            width: 50%;
            flex: 0 0 auto;
        }

        .col-4 {
            width: 20%;
            flex: 0 0 auto;
        }

        .heading {
            font-size: 20px;
            margin-bottom: 08px;
        }

        .sub-heading {
            color: #262626;
            margin-bottom: 05px;
        }

        .table-bordered {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        .table-bordered td,
        .table-bordered th {
            border: 1px solid #dee2e6;
            text-align: left;
            padding: 8px;
        }

        .table-bordered tr:nth-child(even) {
            background-color: #dddddd;
        }


        .text-right {
            text-align: end;
        }

        .w-20 {
            width: 20%;
        }

        .float-right {
            float: right;
        }

    </style>
</head>

<body>

    <div class="container">

        <table style="margin-bottom: 20px!; border-collapse: collapse; border: none !important; width: 100%; margin-top: 40px;">
            <tr>
                <td>
                    <h1 style="color: #5086e6 !important; ">{{$company_name}}</h1>
                </td>
                <td style="text-align: end !important;">
                    <h3 style="margin: 0 !important; color: #000!important;">Tax Invoice</h3>
                </td>
            </tr>
            <tr>
                <td style="border: none !important; ">
                    <p style="margin: 0 !important;">{{$user_address}}</p>
                    <p style="margin: 0 !important;">ABN: {{$abn}}</p>
                    <p style="margin: 0 !important;">{{$user_name}}: {{$user_phone}}</p>
                </td>
                <td style="border: none !important; margin-top: 15px!important;">
                    <p style="margin: 0 !important;">
                        {{-- <b>INVOICE # </b>  --}}
                        <span style="color: #5086e6 !important;"> {{$inv_number}} </span> </p> <br>
                    <p style="margin: 0 !important;"><b>Type Of work done:</b> <span style="color: #5086e6 !important;"> {{$description}}</span></p>
                </td>
            </tr>
        </table>
        <br>
        <br>
        <br>

        <div class="body-section">
            <div class="row">
                <div class="col-8">
                    <p class="sub-heading"><b>Send Date:</b> <span style="color: #5086e6 !important;"> {{ date('d F, Y', strtotime($date)) }} </span> </p>
                    <p class="sub-heading"><b> Bill To:</b> <span style="color: #5086e6 !important;"> {{$customer_id}} </span> </p>
                </div>
                <div class="col-4">

                </div>
            </div>
        </div>
        <hr>
        <div class="body-section">

            <p> <b>Job Address: </b>
                <span style="color: #5086e6 !important;"> {{$address}}. </span>
            </p>
            <br>
            <table class="table-bordered">
                <thead>
                    <tr style="background-color: #5086e6; color:#fff;">
                        <th>Product</th>
                        <th class="w-20">Price</th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><b>Purchase Order:</b><span style="color: #5086e6 !important;"> {{ $purchase_order }} </span> </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td> <span style="color: #5086e6 !important;">{{$job_details}} </span> </td>
                        <td class="text-right">$

                            {{ number_format($amount, 2) }}
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 20px"></td>
                        <td style="padding: 20px"></td>
                    </tr>
                    <tr>
                        <td style="padding: 20px"></td>
                        <td style="padding: 20px"></td>
                    </tr>

                    <tr>
                        <td class="text-right">Amount:</td>
                        <td class="text-right">$

                            {{ number_format($amount, 2) }}
                        </td>
                    </tr>

                    <tr>
                        <td class="text-right">Gst:</td>
                        <td class="text-right">$
                            {{ number_format($gst, 2) }}

                        </td>
                    </tr>
                    <tr>
                        <td class="text-right"><b>Balance Due:</b></td>
                        <td class="text-right"><b> $

                                {{ number_format($total_due, 2) }}
                            </b></td>
                    </tr>
                </tbody>
            </table>
            <br>
            <br>
            <br>
            <!-- Bank Details BSB: 062-709  Ac: 10387726 -->
        </div>
    </div>
</body>

</html>
