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
            color: black;

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
            margin-top: 10%;
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
            margin-bottom: 5px;
            padding-bottom: 5px;
            border-bottom: 4px solid #da7805;
        }

        .table-bordered {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        .table-bordered td,
        .table-bordered th {
            /* border: 1px solid #dee2e6; */
            text-align: left;
            padding: 8px;
        }

        /* .table-bordered tr:nth-child(even) {
            background-color: #dddddd;
        } */


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
                <td style="border: none !important; ">
                    <h3 style="margin: 0 !important;">
                        Dear {{ isset($invoices) && count($invoices) > 0 ? $invoices[0]->customer_id : '' }}
                        ,</h3>

                </td>
            </tr>
            <tr>
                <td style="border: none !important; ">

                    <p style="margin: 0 !important;">This is a list of outstanding amounts due.</p>

                </td>
            </tr>
        </table>
        <br>
        <br>
        <div style="background-color: #da7805; height: 2px; width: 80%; margin: 0 auto;"></div>

        <br>
        <Br>

        <div class="body-section">
            <div class="row">
                <div class="col-8">
                    <h2 class="sub-heading"> Outstanding Invoices </h2>
                </div>
                <div class="col-4">

                </div>
            </div>
        </div>

        <div class="body-section">
            <br>
            <table class="table-bordered">
                <thead style="background: #da7805; color:#fff;">
                    <tr>
                        <th>Job</th>
                        <th>Invoice Number</th>
                        <th style="text-align: right;">Paid</th>

                        <th style="text-align: right;">Due</th>

                    </tr>
                </thead>
                <tbody>
                    @php
                    $totalDue = 0;
                    $totalPaid = 0;
                    $totalAfterSubtraction = 0;
                    @endphp

                    @foreach ($invoices as $invoice)
                    @php
                    // $totalDue += $invoice->total_due ?? 0;
                    $totalPaid += $invoice->total_payments ?? 0;
                    $totalAfterSubtraction += ($invoice->total_due ?? 0) - $invoice->total_payments;
                    @endphp
                    <tr>
                        <td>{{ $invoice->address ?? '' }}</td>


                        {{-- <td align="right">${{ number_format($invoice->total_due ?? '', 2) }}</td> --}}
                        <td align="right"> {{$invoice->inv_number}} </td>

                        <td style="text-align: right;">$ {{ number_format($invoice->total_payments ?? '', 2) }} </td>

                        <td style="text-align: right;">${{ number_format(($invoice->total_due ?? 0) - ($invoice->total_payments ?? 0), 2) }}</td>

                    </tr>
                    @endforeach
                    <tr style="background: ">
                        <td></td>
                        <td align="right"> </td>
                        <td align="right"></td>
                        <td align="right"></td>
                    </tr>


                    <tr style="background: ; border-top: 2px solid #da7805;">

                        <td><b>Sub Total:</b></td>
                        <td></td>
                        {{-- <td align="right"> <b> $ {{ number_format($totalDue, 2) }} </b> </td> --}}
                        <td style="text-align: right;"> <b> $ {{ number_format( $totalPaid, 2) }}</b></td>
                        <td style="text-align: right;"> <b> $ {{ number_format($totalAfterSubtraction, 2) }} </b> </td>
                    </tr>

                </tbody>
            </table>
            <br>
            <br>


            <br>
            <br>

            <p>Please respond to my email and advise as to when and how <br>
                much you will be paying, all the above are over due now</p>


        </div>
    </div>
</body>

</html>
