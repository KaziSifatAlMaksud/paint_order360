<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>360 Painting</title>

    <!-- Fav Icon -->
    <link rel="icon" href="images/favicon.ico" />

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
            --orang: orangered;
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
                <a href="<?php echo '/invoice' ?>"> <i class="fa-solid fa-arrow-left"></i> </a>
                <span> Report </span>
                <a href="<?php echo '/main' ?>"> <img src="/image/logo-phone.png" alt="Logo"> </a>
            </div>
        </div>
    </header>

    @include('layouts.partials.footer')

    <main class="vh-100 position-relative">


        <!-- card -->
        <section>
            <div class="card mx-1 shadow rounded-4" style="margin-top: 90px;">
                <div class="card-body">
                    <div class="cart-btn d-flex align-items-center justify-content-between toggle-card" style="height: 60px">
                        <div class="d-flex flex-column align-items-center" id="job">
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
                    <div id="job-content" class="yearly-page content active">
                        <h6 class="text-center mt-4">
                            Yearly report of Profit and costs from 1st jan
                        </h6>
                        <p class="mb-2 fw-bold">Income by customer</p>

                        <table class="table responsive-table" style="width: 100%; border-collapse: collapse; overflow: hidden;">

                            <thead>
                                <tr>
                                    <th class="fs-6">Builder Name</th>
                                    <th class="fs-6" style="text-align: right;">Sub-Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($invoiceSums as $customer)
                                <tr data-customer-id="{{ $customer->customer_id }}">
                                    <td class="fs-6" style="text-align: left;"> {{ $customer->customer_id }} </td>
                                    <td class="fs-6" style="text-align: right;">$ {{ number_format($customer->total_price, 2) }}</td>
                                </tr>
                                @endforeach
                                <tr data-customer-id="{{ $customer->customer_id }}">
                                    <td class="fs-6" style="text-align: left;"> <b> Total Income: </b> <br>
                                        <p class="date mb-4">1st jan to today yearly</p>

                                    </td>
                                    <td class="fs-6" style="text-align: right;"> <b> $ {{ number_format($customer->total_price, 2) }} </b> </td>
                                </tr>
                            </tbody>
                        </table>


                        {{-- <div class="px-3 shadow my-4">
                            <hr />
                        </div> --}}

                        <div class="total-expense">
                            <p class="px-4 mb-1 fw-bold">Total expense and profit</p>
                            <div class="px-4 mb-4">
                                <div class="d-flex w-100">
                                    <p class="cost">Total Income</p>
                                    <p class="t-income">$<span>107.00</span></p>
                                </div>
                                <div class="d-flex w-100">
                                    <p class="cost">Paint Cost</p>
                                    <p class="">$<span>540.00</span></p>
                                </div>
                                <div class="d-flex w-100">
                                    <p class="cost">Labour Costs</p>
                                    <p class="">$<span>780.00</span></p>
                                </div>
                                <div class="d-flex w-100">
                                    <p class="cost">Total Costs</p>
                                    <p class="">$<span>170.00</span></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ------ Quarterly ----- -->
                    <div id="paint-content" class="content Quarterly">
                        <h6 class="text-center mt-4">
                            Yearly report of Profit and costs from 1st jan
                        </h6>
                        <p class="mb-1 fw-bold">Income by customer</p>
                        <div class="customers-income mb-4">
                            <div class="single-customer d-flex justify-content-between">
                                <p class="cus-name">Mac jones homes</p>
                                <p class="cus-income">$<span>107.00</span></p>
                            </div>
                            <div class="single-customer d-flex justify-content-between">
                                <p class="cus-name">jones homes</p>
                                <p class="cus-income">$<span>540.00</span></p>
                            </div>
                            <div class="single-customer d-flex justify-content-between">
                                <p class="cus-name">Sunny</p>
                                <p class="cus-income">$<span>780.00</span></p>
                            </div>
                            <div class="single-customer d-flex justify-content-between">
                                <p class="cus-name">Mac jones homes</p>
                                <p class="cus-income">$<span>170.00</span></p>
                            </div>
                        </div>

                        <div class="total-income d-flex justify-content-between">
                            <p class="cus-name fw-bold mb-0">Total income</p>
                            <p class="cus-income mb-0">$<span>170.00</span></p>
                        </div>
                        <div class="my-4">
                            <hr />
                        </div>
                    </div>

                    <!-- per job Page -->
                    <div id="page-content" class="content">
                        <div class="cart-btn d-flex align-items-center justify-content-between toggle-type" style="height: 60px">
                            <h6>Cost & Profit</h6>
                            <div id="price" class="active" onclick="toggleTab('price')">
                                <h6>Price $</h6>
                            </div>
                            <div id="percentage" onclick="toggleTab('percentage')">
                                <h6>Percentage %</h6>
                            </div>
                        </div>

                        <div id="price-content" class="content-type active">
                            <table class="price-content-table" style="width:100%">
                                <tr>
                                    <th style="width:50%">Job</th>
                                    <th>Job Price</th>
                                    <th>Paint</th>
                                    <th>Labour</th>
                                    <th>Profit</th>
                                </tr>
                                <tbody id="dataBody"></tbody>
                            </table>

                            <div class="mx-auto pt-4">
                                <table style="width:100%">
                                    <tr>
                                        <th style="width:50%">Total</th>
                                        <th>Job Price</th>
                                        <th>Paint</th>
                                        <th>Labour</th>
                                        <th>Profit</th>
                                    </tr>
                                    <tr>
                                        <th style="width:40%">40 houses</th>
                                        <th>$500</th>
                                        <th>$700</th>
                                        <th>$400</th>
                                        <th>$500</th>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div id="percentage-content" class="content-type">
                            <table class="price-content-table" style="width:100%">
                                <tr>
                                    <th style="width:50%">Job</th>
                                    <th>Job Price</th>
                                    <th>Paint</th>
                                    <th>Labour</th>
                                    <th>Profit</th>
                                </tr>
                                <tbody id="percentageBody"></tbody>
                            </table>

                            <div class="mx-auto pt-4">
                                <table style="width:100%">
                                    <tr>
                                        <th style="width:50%">Total</th>
                                        <th>Job Price</th>
                                        <th>Paint</th>
                                        <th>Labour</th>
                                        <th>Profit</th>
                                    </tr>
                                    <tr>
                                        <th style="width:40%">40 houses</th>
                                        <th>50%</th>
                                        <th>70%</th>
                                        <th>40%</th>
                                        <th>50%</th>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- footer nav -->
    </main>
    <div style="margin: 20px 0px 300px 0px;"></div>
    <script src="{{ asset('js/profile.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>
