<!DOCTYPE html>
</html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Report | Orderr360</title>
        <link rel="icon" href="{{ asset('image/favicon.png') }}" />


    <!--icon link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />

    <link rel="stylesheet" href="{{ asset('css/style10.css') }}">
    <style>
        :root {
            --clr: #222327;
            --bg: #f5f5f5;
            --body-bg: #ebebeb;
            --nav-colo: #fff;
            --orang: #ff6107;
            --bg-orang: #ffddaa;
            --newInvoice-bg: #66ff5b;
            --dueInvoice-bf: #ff7070;
            --yollo: #f9f14d;
            --bg-yollo: #fffcb4;
            --green: #17ff21;
            --bg-green: #b8ffc3;
        }

        header {
            /* position: relative; */
            position: fixed;
            width: 100%;
            margin: 0;
            background-color: #ffffff;
            border-radius: 0px 0px 20px 20px;
            box-shadow: 0px 5px 5px rgba(0, 0, 0, 0.2);
            padding: 5px 0;
            margin-bottom: 10px;
            z-index: 10;
        }


        .header-row {
            margin: 0 5px;
        }

        .header-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin: 0 10px;

        }

        .header-item i {
            font-size: 30px;
        }

        .header-item span {
            font-size: 25px;
            text-shadow: 0px 4px 5px rgba(0, 0, 0, 0.25);
        }

        .header-item img {
            width: 100%;
            max-width: 60px;
        }

        .header-item {
            font-size: 25px;
            text-shadow: 0px 4px 5px rgba(0, 0, 0, 0.25);
        }

        /* Navigation Update*/



        .navigation {
            display: flex;
            justify-content: flex-end;
            position: fixed;
            align-items: center;
            justify-content: end;
            width: 100%;
            bottom: 0;
            background: #fff;
            border-radius: 20px 20px 0px 0px;
            box-shadow: 0px 10px 36px rgba(0, 0, 0, 0.3);
            z-index: 3;
        }

        .navigation ul {
            margin-bottom: 0 !important;
            padding-left: 0rem !important;
            display: flex;
            width: 100%;

        }

        .navigation ul li {
            position: relative;
            list-style: none;
            width: 30%;
            height: 70px;
            z-index: 1;
        }

        .navigation ul li a {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;

            /* text-align: center; */
            font-weight: 500;
        }

        .navigation ul li a .icon {
            position: relative;
            display: block;
            line-height: 75px;
            font-size: 1.5em;
            text-align: center;
            transition: 0.5s;
            color: var(--clr);

        }

        .navigation ul li.active a .icon {
            transform: translateY(-15px);
            padding: 0px 25px 0px 25px;
            border-radius: 50%;
            font-size: 20px;
            color: var(--orang);


        }

        .navigation ul li a .text {
            position: absolute;
            color: var(--orang);
            font-weight: bold;
            font-size: 1em;
            letter-spacing: 0.05em;
            /* transition: 0.5s; */
            opacity: 0;
            transform: translateY(20px);
        }

        .navigation ul li.active a .text {
            opacity: 1;
            transform: translateY(10px);
        }

        /* Navigation End Update*/

    </style>




</head>

<body>

    <header style="margin-top: -90px!important;">
        <div class="header-row">
            <div class="header-item">
                <a href="<?php echo '/invoice' ?>"> <i class="fa-solid fa-arrow-left text-black"></i> </a>
                <span> Report </span>
                <a href="<?php echo '/main' ?>"> <img src="/image/logo-phone.png" alt="Logo"> </a>
            </div>
        </div>
    </header>

    @include('layouts.partials.footer')

    <main class="vh-100 position-relative">


        <!-- card -->
        <section>
            <div class="card mx-1 shadow rounded-4" style="margin-top: 90px; ">
                <div class="card-body px-1 " style=" margin-bottom: 300px;">
                    <div class="cart-btn d-flex align-items-center justify-content-between toggle-card px-2" style="height: 60px;">
                        <div class="d-flex flex-column align-items-center active" id="job">

                            <img src="/image/icon1/calendar.png" alt="calendar.png" />
                            <p>Yearly Page</p>
                        </div>
                        <div class="painter-btn d-flex flex-column align-items-center" id="paint">
                            <img src="/image/icon1/calendar.png" alt="calendar.png" />
                            <p>Quarterly Page</p>
                        </div>
                        <div class="d-flex flex-column align-items-center" id="page">
                            <img src="/image/icon1/graph.png" alt="job.png" />
                            <p>Per job page</p>
                        </div>
                    </div>
                    <!-- ----- yearly------ -->
                    <div id="job-content" class="yearly-page content active"   >
                        <h6 class="text-center mt-4">
                            Yearly report of Profit and costs from 1st jan


                        </h6>
                        <div class="row">
                           
                            <div class="col-12">
                                <select id="yearFilterforCustomer" class="form-select mb-2" aria-label="Select Year" style="border-color: #ff6107;">
                                    <option value="">Select Year</option>
                                    <option value="2024">2024</option>
                                    <option value="2023">2023</option>
                                    <option value="2022">2022</option>
                                    <option value="2021">2021</option>
                                    <!-- Add more years as needed -->
                                </select>
                            </div>
                        </div>



                        <p class="mb-2 fw-bold">Income by customer</p>

                        <table class="table responsive-table" style="width: 100%; border-collapse: collapse; overflow: hidden;">

                            <thead>
                                <tr>
                                    <th class="fs-6">Builder Name</th>
                                    <th class="fs-6" style="text-align: right;">Sub-Total</th>
                                </tr>
                            </thead>


                            <tbody id="filter_table_tbody1">

                               
                            </tbody>


                        </table>

                       <div class="mt-3 mb-3">
                            <h6 class="mb-3 fw-bold text-center">  Total Expense and Profit</h6>
                            <table class="table  w-100">
                                <tbody>
                                    <tr class="row-spacing">
                                        <td class="fs-6">Total Income:</td>
                                        <td class="fs-6 text-right" id="total_income"></td>
                                    </tr>
                                    <tr class="row-spacing">
                                        <td class="fs-6">Paint Cost:</td>
                                        <td class="fs-6 text-right" id="paint_cost" ></td>
                                    </tr>
                                    <tr class="row-spacing">
                                        <td class="fs-6">Labour Cost:</td>
                                        <td class="fs-6 text-right" id="labour_cost"></td>
                                    </tr>
                                    <tr class="row-spacing">
                                        <td class="fs-6">Total Cost:</td>
                                        <td class="fs-6 text-right" id="total_cost"></td>
                                    </tr>
                                    <tr class="row-spacing">
                                        <td class="fs-6"><strong>Total Profit:</strong></td>
                                        <td class="fs-6 text-right" ><strong id="total_pofit"></strong></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        
                    </div>

                    <!-- ------ Quarterly ----- -->
                    <div id="paint-content" class="content">
                        <p class="mb-2 mt-3 fw-bold text-center">Income by customer</p>
                        <div class="row">
                            <div class="col-6">
                                <select id="dateRangeFilter" class="form-select mb-2" aria-label="Default select example" style="border-color: #ff6107;">
                                    <option value="">Select Range</option>
                                    <option value="Q1">Jan - Mar</option>
                                    <option value="Q2">Apr - Jun</option>
                                    <option value="Q3">Jul - Sep</option>
                                    <option value="Q4">Oct - Dec</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <select id="yearFilter" class="form-select mb-2" aria-label="Select Year" style="border-color: #ff6107;">
                                    <option value="">Select Year</option>
                                    <option value="2024">2024</option>
                                    <option value="2023">2023</option>
                                    <option value="2022">2022</option>
                                    <option value="2021">2021</option>
                                    <!-- Add more years as needed -->
                                </select>
                            </div>




                        </div>

                        <table class="table responsive-table" id="filter_table" style="width: 100%; border-collapse: collapse; overflow: hidden;">
                            <thead>
                                <tr>
                                    <th class="fs-6">Builder Name</th>
                                    <th class="fs-6" style="text-align: right;">Sub-Total</th>
                                </tr>
                            </thead>
                            <tbody id="filter_table_tbody">

                                {{-- @isset($invoiceSumas)

                                @foreach($invoiceSumas as $customer)
                                {{$customer}}

                                <tr data-customer-id="{{ $customer->customer_id }}">
                                    <td class="fs-6" style="text-align: left;">{{ $customer->customer_id ?? 'N/A' }}</td>
                                    <td class="fs-6" style="text-align: right;">$ {{ number_format($customer->total_price, 2) }}</td>
                                </tr>
                                @endforeach
                                @endisset --}}
                            </tbody>
                        </table>

                        <div class="my-4">
                            <hr />
                        </div>
                    </div>



                    <!-- per job Page -->
                    <div id="page-content" class="content">
                        <div class="cart-btn d-flex align-items-center justify-content-between toggle-type mt-4 px-2" style="height: 60px">

                            <h6>Cost & Profit</h6>
                            <div id="price" class="active" onclick="toggleTab('price')">
                                <h6>Price $</h6>
                            </div>
                            <div id="percentage" onclick="toggleTab('percentage')">
                                <h6>Percentage %</h6>
                            </div>
                        </div>

                        <div id="price-content" class="content-type active">
                            <table class="price-content-table" style="width:100%; margin-bottom: 500px;">

                                <tr>
                                    <th style="width:48%">Job</th>
                                    <th style="text-align: right;">J.Price</th>
                                    <th style="text-align: right;">Paint</th>
                                    <th style="text-align: right;">Labour</th>
                                    <th style="text-align: right;">Profit</th>
                                </tr>
                                <tbody id="">
                                    @php
                                    $totalfinalSum = 0;
                                    $totallabarSum = 0;

                                    @endphp

                                    @foreach($jobs as $job )
                                    
                                    <tr>
                                        <td>{{ $job ? $job->address : '' }}</td>
                                        @if ($job && $job->assign_painter == auth()->user()->id)
                                            <td style="text-align: right;">{{ $job ? number_format($job->assignedJob->assign_price_job ?? 0) : '' }}</td>
                                            <td style="text-align: right;">{{ $job ? number_format($job->assignedJob->paint_cost ?? 0) : '' }}</td>
                                            <td style="text-align: right;">0</td>
                                              @php
                                                    $assignPainterPrice = $job->assignedJob->assign_price_job ?? 0;
                                                    $paintCost = $job->assignedJob->paint_cost ?? 0;
                                                    $profitPrice = $assignPainterPrice - $paintCost;

                                                    $totallabarSum += 0;
                                                    $totalfinalSum += $profitPrice;
                                                @endphp
                                                <td style="text-align: right;">{{ number_format($profitPrice) }}</td>
                                        @else
                                            <td style="text-align: right;">{{ $job ? number_format($job->price) : '' }}</td>
                                            <td style="text-align: right;">{{ $job ? number_format($job->price * 0.3 ) : '' }}</td>
                                             <td style="text-align: right;">{{ $job && $job->assignedJob ? number_format($job->assignedJob->assign_price_job) : 0 }}</td>
                                            @php
                                                $discountedPrice = $job->price * 0.7;
                                                $assignPrice = $job->assignedJob->assign_price_job ?? 0.00;
                                                $finalPrice = $discountedPrice - $assignPrice;
                                                $assignPrice = $job && $job->assignedJob ? $job->assignedJob->assign_price_job : 0.00;
                                                $totallabarSum += $assignPrice;
                                                $totalfinalSum += $finalPrice;
                                                @endphp 
                                            <td style="text-align: right;">{{ number_format($finalPrice) }}</td>
                                        @endif                                        

                                      
                                    
                                    </tr>
                                    @endforeach

                                    <tr>
                                        <td>
                                            <b style="font-size: 13px;">{{ $jobsCount ?? '' }} Houses - </b>
                                        </td>
                                        <td style="text-align: right;">

                                            <b style="font-size: 12px; text-align: right;">{{ number_format($totalPrice) ?? '' }}</b>

                                        </td>
                                        <td style="text-align: right;">
                                            <b style="font-size: 12px; text-align: right;">{{ number_format($totalPrice * 0.30) ?? '' }}</b>
                                        </td>

                                        <td style="text-align: right;">
                                            <b style="font-size: 12px; text-align: right;">{{ number_format($totallabarSum)  ?? '' }}</b>

                                        </td>


                                        <td style="text-align: right;">
                                            <b style="font-size: 12px; text-align: right;">{{ number_format($totalfinalSum)  ?? '' }}</b>
                                        </td>


                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div id="percentage-content" class="content-type">
                         <table class="price-content-table" style="width:100%;margin-bottom: 200px;">
                                <tr>
                                    <th style="width:50%">Job</th>
                                    <th style="text-align: right;">J.Price</th>
                                    <th style="text-align: right;">Paint</th>
                                    <th style="text-align: right;">Labour</th>
                                    <th style="text-align: right;">Profit</th>
                                </tr>
                                <tbody id="percentageBody">
                                    @php
                                        $totalfinalSum = 0;
                                        $totallabarSum = 0;
                                        $totalPaintPercentage = 0;
                                        $totalLabourPercentage = 0;
                                        $totalProfitPercentage = 0;
                                        $jobCount = count($jobs);
                                    @endphp

                                    @foreach($jobs as $job )
                                    <tr>
                                        <td>{{ $job ? $job->address : '' }}</td>
                                        @if ($job && $job->assign_painter == auth()->user()->id)
                                            <td style="text-align: right;">{{ $job ? number_format($job->assignedJob->assign_price_job ?? 0) : '' }}</td>
                                            @php
                                                $paintCost = $job->assignedJob->paint_cost ?? 0;
                                                $assignPainterPrice = $job->assignedJob->assign_price_job ?? 0;
                                                $paintPercentage = ($assignPainterPrice > 0) ? ($paintCost / $assignPainterPrice) * 100 : 0;
                                                $totalPaintPercentage += $paintPercentage;

                                                $labourPercentage = 0; // Since labour is 0 for this case
                                                $totalLabourPercentage += $labourPercentage;

                                                $profitPrice = $assignPainterPrice - $paintCost;
                                                $profitPercentage = ($assignPainterPrice > 0) ? ($profitPrice / $assignPainterPrice) * 100 : 0;
                                                $totalProfitPercentage += $profitPercentage;
                                            @endphp
                                            <td style="text-align: right;">{{ number_format($paintPercentage, 2) }}%</td>
                                            <td style="text-align: right;">{{ number_format($labourPercentage, 2) }}%</td>
                                            <td style="text-align: right;">{{ number_format($profitPercentage, 2) }}%</td>
                                        @else
                                            <td style="text-align: right;">{{ $job ? number_format($job->price) : '' }}</td>
                                            @php
                                                $paintCost = $job->price * 0.3;
                                                $assignPainterPrice = $job->assignedJob->assign_price_job ?? 0;
                                                $paintPercentage = ($assignPainterPrice > 0) ? ($paintCost / $assignPainterPrice) * 100 : 0;
                                                $totalPaintPercentage += $paintPercentage;

                                                $labourPercentage = ($job->price > 0) ? ($assignPainterPrice / $job->price) * 100 : 0;
                                                $totalLabourPercentage += $labourPercentage;

                                                $profitPrice = $job->price - ($paintCost + $assignPainterPrice);
                                                $profitPercentage = ($job->price > 0) ? ($profitPrice / $job->price) * 100 : 0;
                                                $totalProfitPercentage += $profitPercentage;
                                            @endphp
                                            <td style="text-align: right;">{{ number_format($paintPercentage, 2) }}%</td>
                                            <td style="text-align: right;">{{ number_format($labourPercentage, 2) }}%</td>
                                            <td style="text-align: right;">{{ number_format($profitPercentage, 2) }}%</td>
                                        @endif
                                    </tr>
                                    @endforeach
                                    @php
                                        $averagePaintPercentage = ($jobCount > 0) ? $totalPaintPercentage / $jobCount : 0;
                                        $averageLabourPercentage = ($jobCount > 0) ? $totalLabourPercentage / $jobCount : 0;
                                        $averageProfitPercentage = ($jobCount > 0) ? $totalProfitPercentage / $jobCount : 0;
                                    @endphp
                                    <tr>
                                        <td>
                                            <b style="font-size: 13px;">{{ $jobsCount ?? '' }} Houses -</b>
                                        </td>
                                        <td style="text-align: right;">
                                            <b style="font-size: 12px; text-align: right;">{{ number_format($totalPrice) ?? '' }}</b>
                                        </td>
                                        <td style="text-align: right;">
                                            <b style="font-size: 12px; text-align: right;">{{ number_format($averagePaintPercentage, 2) }}%</b>
                                        </td>
                                        <td style="text-align: right;">
                                            <b style="font-size: 12px; text-align: right;">{{ number_format($averageLabourPercentage, 2) }}%</b>
                                        </td>
                                        <td style="text-align: right;">
                                            <b style="font-size: 12px; text-align: right;">{{ number_format($averageProfitPercentage, 2) }}%</b>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>






                        </div>



                    </div>
                </div>
            </div>
        </section>
        {{-- <div style="margin: 20px 0px 300px 0px;"></div> --}}

        <!-- footer nav -->
    </main>
    {{-- <div style="margin: 20px 0px 300px 0px;"></div> --}}
    <script src="{{ asset('js/profile.js') }}"></script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        function sendFilterRequest() {
            var selectedQuarter = $('#dateRangeFilter').val();
            var selectedYear = $('#yearFilter').val();

            if (selectedQuarter && selectedYear) {
                $.ajax({
                    url: '/invoices/report/filter_inv'
                    , type: 'GET'
                    , data: {
                        'dateRange': selectedQuarter
                        , 'year': selectedYear
                    }
                    , success: function(response) {
                        var rows = '';

                        let totalPriceSum = 0;

                        response.invoiceSumas.forEach(function(data1) {
                            totalPriceSum += Number(data1.total_price); // Increment the total sum

                            // Existing code to add rows to the table
                            rows += '<tr data-customer-id="' + data1.customer_id + '">' +
                                '<td class="fs-6" style="text-align: left;">' + (data1.customer_id ? data1.customer_id : 'N/A') + '</td>' +
                                '<td class="fs-6" style="text-align: right;">$ ' + Number(data1.total_price).toLocaleString(undefined, {
                                    minimumFractionDigits: 2
                                    , maximumFractionDigits: 2
                                }) + '</td>' +


                                '</tr>';
                        });

                        // Adding a final row to display the total sum
                        rows += '<tr>' +
                            '<td class="fs-6" style="text-align: left;"><strong>Total</strong></td>' +
                            '<td class="fs-6" style="text-align: right;"><strong>$ ' + Number(totalPriceSum).toLocaleString(undefined, {
                                minimumFractionDigits: 2
                                , maximumFractionDigits: 2
                            }) + '</strong></td>' +


                            '</tr>';

                        // Now you can insert 'rows' into your HTML table where needed.





                        $('#filter_table_tbody').html(rows);



                    }
                    , error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            }
        }

        // Attach the event listener for dropdown changes directly
        $(document).ready(function() {
            $('#dateRangeFilter, #yearFilter').on('change', sendFilterRequest);
        });


        // Function to fetch random data
        function randomData() {
            $.ajax({
                url: '/invoices/report/price_data'
                , type: 'GET'
                , success: function(response) {
                    $('#dataBody').html(response.html);
                }
                , error: function(xhr, status, error) {
                    console.error("Error fetching data: ", error);
                }
            });
        }

        // Call randomData to load data initially
        randomData();

    </script>




<script>
    function sendCustomerFilterRequest() {
        var selectedYear = $('#yearFilterforCustomer').val();
        if (selectedYear) {
            $.ajax({
                url: '/invoices/report/filter_customer', // Make sure this matches your actual route
                type: 'GET'
                , data: {
                    'year': selectedYear
                }
                , success: function(response) {
                    var rows = '';
                    let totalPriceSum = 0;
                    let totallaverCost = 0;
                    let totalCost = 0;
        
                    if (response.invoiceLaborSumas && response.invoiceLaborSumas.length > 0) {
                        totallaverCost = response.invoiceLaborSumas[0].assign_total_price;
                    }
                
                    // Update the variable names in the response handling code to match the JSON key
                    response.invoiceCustomerSumas.forEach(function(data1) {                      

                        totalPriceSum += Number(data1.total_price);
                        rows += '<tr data-customer-id="' + (data1.customer_id || 'N/A') + '">' +
                            '<td class="fs-6" style="text-align: left;">' + (data1.customer_id || 'N/A') + '</td>' +
                            '<td class="fs-6" style="text-align: right;">$ ' + Number(data1.total_price).toLocaleString(undefined, {
                                minimumFractionDigits: 2
                                , maximumFractionDigits: 2
                            }) + '</td>' +
                            '</tr>';
                    });
                    // Calculate the total cost
                     totalCost = parseFloat(totallaverCost) + (parseFloat(totalPriceSum) * 0.30);
                    let totalProfit = 0.00;
                totalProfit = totalPriceSum - totalCost;
                    rows += '<tr>' +
                        '<td class="fs-6" style="text-align: left;"><strong>Total:</strong></td>' +
                        '<td class="fs-6" style="text-align: right;"><strong>$ ' + Number(totalPriceSum).toLocaleString(undefined, {
                            minimumFractionDigits: 2
                            , maximumFractionDigits: 2
                        }) + '</strong></td>' +
                        '</tr>';
                    $('#filter_table_tbody1').html(rows);

                    $('#total_income').html('$ ' + Number(totalPriceSum).toLocaleString(undefined, {
                        minimumFractionDigits: 2,
                        maximumFractionDigits: 2
                    }));
               
                    $('#paint_cost').html('$ ' + Number(totalPriceSum * 0.30).toLocaleString(undefined, {
                        minimumFractionDigits: 2,
                        maximumFractionDigits: 2
                    }));
                      $('#labour_cost').html('$ ' + Number(totallaverCost).toLocaleString(undefined, {
                        minimumFractionDigits: 2,
                        maximumFractionDigits: 2
                    }));

         
                     $('#total_cost').html('$' + Number(totalCost).toLocaleString('en-US', {
                        minimumFractionDigits: 2,
                        maximumFractionDigits: 2
                    }));
                      $('#total_pofit').html('$ ' + Number(totalProfit).toLocaleString(undefined, {
                        minimumFractionDigits: 2,
                        maximumFractionDigits: 2
                    }));
                
                                
                }
                , error: function(xhr, status, error) {
                    console.error(`Error fetching data: ${error}`);
                }
            });
        } else {
            console.error('No year selected for filtering');
        }
    }

    // Attach the event listener to the year filter element
    $(document).ready(function() {
        $('#yearFilterforCustomer').on('change', sendCustomerFilterRequest);
    });

</script>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>
