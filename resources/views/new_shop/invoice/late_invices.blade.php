<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Name</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style8.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style77.css') }}">
    <style>
        /* CSS for fixed position */
        .fixed-top {
            position: fixed;
            top: 0;
            margin-top: 75px;
            width: 100%;
            z-index: 999;
        }

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



    <div class="container" style="padding-top: 30px">


        <div class="search-bar">
            <i class="fas fa-search search-icon"></i>
            <input type="text" class="search-input" id="search-invoice" placeholder="Search Here" oninput="filterCards2()">
        </div>

        {{-- {{$results}}
        {{$customerInvoices}} --}}
        <div class="portfolio-container">
            <!-- Card Content -->
            {{-- {{$lateInvoices}} --}}
            @foreach($lateInvoices as $invoice)
            @if($invoice->status == 2)
            @php
            $sendDate = new DateTime($invoice->send_to);
            $currentDate = new DateTime();
            $customerFound = false;
            $daysLate = 0;

            foreach ($results as $customer) {
            if ($invoice->customer_id === $customer->company_name) {
            $scheduleDays = (int) $customer->schedule; // Cast to integer and ensure it's a valid number
            if ($scheduleDays > 0) {
            $dueDate = clone $sendDate;
            $dueDate->modify("+$scheduleDays days"); // Proper concatenation
            $interval = $currentDate->diff($dueDate);
            $daysLate = $interval->days;

            if ($currentDate >= $dueDate) {
            $customerFound = true;
            break; // Break the loop if the matching customer is found
            }
            }
            }
            }
            @endphp


            <div class="card InvoicePortfolio invoice-item filter-unpaid">
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
            </div>
            @endif
            @endforeach



            <!-- End Card Section -->
        </div>
        <div style="margin: 20px 0px 300px 0px;"></div>
    </div>
    <script>
        window.addEventListener('scroll', function() {
            var headerHeight = document.querySelector('.header-row').offsetHeight;
            var filterElement = document.querySelector('.filter');
            var searchBarElement = document.querySelector('.search-bar');
            if (window.pageYOffset > headerHeight) {
                filterElement.classList.add('fixed-top');
                searchBarElement.classList.add('fixed-top');
            } else {
                filterElement.classList.remove('fixed-top');
                searchBarElement.classList.remove('fixed-top');
            }
        });

    </script>


    <script src="{{ asset('js/script.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</html>
