<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>| Shop</title>
    <link rel="stylesheet" href="{{ asset('css/style10.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />

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
            margin-top: 0px;
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


    <header>
        <div class="header-row">
            <div class="header-item">
                <a href="<?php echo '/invoice' ?>"> <i class="fa-solid fa-arrow-left"></i> </a>
                <span> Late Invoices </span>
                <a href="<?php echo '/main' ?>"> <img src="/image/logo-phone.png" alt="Logo"> </a>
            </div>
        </div>
    </header>



    @include('layouts.partials.footer')
    <main class="px-2">
        <section style="padding-top: 80px;">

            <div class="search-bar mt-2">
                <i class="fas fa-search search-icon"></i>
                <input type="text" class="search-input " id="search-input" placeholder="Search Address or Customer" oninput="filterCards()">
            </div>
            <div class="px-2 border-custom"></div>

        </section>
        @foreach($lateInvoices as $invoice)

        @if($invoice->status == 2)
        @php
        $sendDate = new DateTime($invoice->send_to);
        $currentDate = new DateTime();
        $customerFound = false;
        $daysLate = 0;

        foreach ($results as $customer) {
        if ($invoice->customer_id === $customer->company_name) {
        $scheduleDays = (int) $customer->schedule;
        if ($scheduleDays > 0) {
        $dueDate = clone $sendDate;
        $dueDate->modify("+$scheduleDays days");
        $interval = $currentDate->diff($dueDate);
        $daysLate = $interval->days;

        if ($currentDate >= $dueDate) {
        $customerFound = true;
        break;
        }
        }
        }
        }
        @endphp

        <section class="invoice-doc jobs_area InvoicePortfolio">



            <a href="{{ '/manual_invoice/' . $invoice->id }}" style="text-decoration: none; color:black;">
                <div class="docs_part1 docs_prt1 position-relative portfolio-item" style="line-height: 1;">
                    <div class="invoice-cart">
                        <h5 class="address_text mt-2 showinline" id="expandable-title">{{ $invoice->address }}</h5>

                        <div class="invoice-cart-border"></div>
                        <p class="text3">{{ $invoice->description }} </p>

                        <p class="docs_right jobs_right position-absolute end-0 customerInv" style="margin: -10px 10px 0px 0px;">{{ $invoice->inv_number }}</p>

                        <div>
                            <p class="text3 mt-1"> ${{ number_format($invoice->total_due, 2) }} inc gst </p>

                            <p class="text3 bilderName mt-1">{{ $invoice->customer_id }} </p>

                        </div>
                    </div>

                    <div class=" docs_right jobs_right position-absolute bottom-1 end-0 " style="margin: -20px 10px 0px 0px;">


                        <a class="status-late text-light fw-blod text-center" style="text-decoration: none; " href="#"> <b>Late </b></a> <b>


                            {{ $daysLate }} days
                        </b>

                    </div>
                </div>
            </a>

        </section>






        {{-- <div class="search-bar">
            <i class="fas fa-search search-icon"></i>
            <input type="text" class="search-input" id="search-invoice" placeholder="Search Here" oninput="filterCards2()">
        </div> --}}

        {{-- {{$results}}
        {{$customerInvoices}} --}}




        {{-- <div class="card InvoicePortfolio invoice-item filter-unpaid">
                <a href="{{ '/manual_invoice/' . $invoice->id }}">
        <div class="cardhaderInvoice-unpaid">
            <h5 class="text-left ml-2 mt-1 showinline" style="width: 70%" id="expandable-title">{{ $invoice->address }}</h5>
            <button type="button" class="invoiceReadynotification-unpaid">Unpaid</button>
        </div>
        <p class="text-center mt-2">waiting for payment, if paid click received</p>
        <div class="row p-1">
            <h6 class="col-12 text-left"><b>SENT: </b>{{ $sendDate->format('d-m-Y') }}</h6>
            <div class="col-6 reduced-line-height">
                <p class="text-left showinline" id="customer-title">{{ $invoice->customer_id }}</p>

                <p class="text-left showinline">{{ $invoice->description }}</p>
            </div>
            <div class="col-6 reduced-line-height">
                <b>
                    {{ $daysLate }} days late
                </b>
                <p class="text-right" id="customer-inv">{{ $invoice->inv_number }}</p>

                <p class="text-right font-weight-bold">${{ $invoice->total_due }}</p>
            </div>
        </div>
        </a>
        </div> --}}
        @endif
        @endforeach



        <!-- End Card Section -->
        {{-- </div> --}}
        <div style="margin: 20px 0px 300px 0px;"></div>
    </main>


    <script src="{{ asset('js/script.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</html>
