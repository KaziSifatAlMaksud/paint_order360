<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Invoice | Orderr360</title>
     <link rel="icon" href="{{ asset('image/favicon.png') }}" />
    <!--icon link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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

        .modal-dialog-scrollable .modal-content {
            max-height: 150% !important;
        }


        .selected {
            border-bottom: 5px solid #ff6107;
            font-size: blod;

            text-align: center;
            transition: 0.15s all ease-out;
        }





        .btn1 {
            background-color: #ff6107;
            border-radius: 40px;
            padding: 0px 15px 0px 15px !important;
            color: white;

        }

        .btn1:hover {
            background-color: #ff6207cf;
            border-radius: 40px;
            padding: 0px 15px 0px 15px !important;
            color: white;

        }


        .btn2 {
            background-color: #15c9c9;
            border-radius: 40px;
            padding: 0px 15px 0px 15px !important;
            color: white;

        }

        .price-content-table th,
        td {
            font-size: 17px;
            padding: 4px;
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

        .redDot {

            display: inline-block;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            margin-right: 10px;
            background-color: red;
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



<body style="background-color: #e6e6e6!imporant;">



    <header style=" margin-top: -100px!important;">
        <div class="header-row">
            <div class="header-item">
                <a href="{{ route('invoice')}}" style="color: black;"> <i class="fa-solid fa-arrow-left"></i> </a>

                <span> Outstanding Report </span>

                <a href="<?php echo '/main'; ?>"> <img src="/image/logo-phone.png" alt="Logo"> </a>
            </div>
        </div>
    </header>




    @include('layouts.partials.footer')
    <main class="position-relative">

        <!-- card -->



        <section class="mt-5" style="margin-top: 100px!important;">


            <div class="card mx-1 mt-5 shadow rounded-4">
                @if(session('success'))
                <div class="alert alert-success mb-4">
                    {{ session('success') }}
                </div>
                @endif

                @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
                @endif

                <div class="card-body px-2">
                    <div id="job-content" class="yearly-page content active">
                        <h3 class="mt-2">
                            Outstanding Statement
                        </h3>
                        <p class=" mb-4 ">Sent invoices and Late invoice</p>

                        <!--------  this is the table for outstanding by customer statement -  ---->

                        <div>
                            <table class="table responsive-table" style="width: 100%; border-collapse: collapse; overflow: hidden;">

                                <thead>
                                    <tr>
                                        <th>Builder</th>
                                        <th style="text-align: right;">Sub-Total</th>
                                        <th style="text-align: right;">Action</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    @php
                                    $total = 0;
                                    @endphp

                                    @foreach ($invoiceSums as $customer)
                                    <tr data-customer-id="{{ $customer->customer_id }}">

                                        <td style="text-align: left;">
                                            {{ $customer->customer_id }}
                                        </td>
                                        <td style="text-align: right;">$ {{ number_format($customer->total_price, 2) }}</td>

                                        @php
                                        $total += $customer->total_price;

                                        @endphp

                                        <td>
                                            <div class="d-flex justify-content-end gap-2 align-items-center">

                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn1 btn  open-modal" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-customer-id="{{ $customer->customer_id }}" data-customer-email="{{ $customer->send_email }}">
                                                    OPEN
                                                </button>
                                            </div>
                                        </td>

                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td style="text-align: left"> <b>Total: </b> </td>
                                        <td style="text-align: right"> <b> $ {{ number_format($total, 2) }} </b> </td>


                                        <td></td>
                                    </tr>
                                    </tr>
                                    <!-- Add more rows as needed -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Model code..  --}}


        <!-- Modal -->
        <div class="modal" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable h-50">
                <div class="modal-content" style="margin-top: 40px;">

                    <div class="modal-header">
                        <h5 class="modal-title col-8 text-start" id="tittle"> </h5>
                        <button type="button" class="col-4 btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">


                        <div class="row">
                            <div class="col-12 pb-2">
                                <p><b>Statement of sent Invoices & Late Invoices:</b><br>Red dot indicates late invoices: <span style="margin: 0px;" class="redDot"></span></p>
                            </div>
                        </div>


                        <div id="outstanding-invoices" style="display: block;">
                            <!-- table start -->
                            <table class="table responsive-table" style="font-size: 16px;">


                                <thead class="thead-dark bg-orange">
                                    <tr>
                                        <th scope="col" width="35%" style="text-align: left;">Address Job</th>

                                        <th scope="col" width="30%" style="text-align: right;">Invoice ID</th>

                                        <th scope="col" width="40%" style="text-align: right;">Due</th>

                                    </tr>
                                </thead>
                                <tbody style="font-size: 10px;" id="invoiceTableBody"> </tbody>

                            </table>
                        </div>
                        <div id="late-invoices" style="display: none;">
                            <!-- table start -->
                            <table class="table responsive-table">
                                <thead class="thead-dark bg-orange">
                                    <tr>
                                        <th scope="col" style="text-align: left;">Address Job</th>
                                        <th scope="col" style="text-align: right;">Invoice ID</th>
                                        <th scope="col" style="text-align: right;">Due</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <!-- email model -->
                        <form id="send_email_form" action="{{ route('email_send_outstantind') }}" method="POST">
                            @csrf
                            <input type="hidden" name="customer_id" value="">
                            <input type="hidden" name="email" value="">
                            <button type="submit" class="btn btn-primary">Send Email</button>
                        </form>
                        <!-- email model off -->
                    </div>
                </div>
            </div>
        </div>

    </main>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Event listener for buttons to open modal
            document.querySelectorAll('.open-modal').forEach(button => {
                button.addEventListener('click', function(event) {
                    event.preventDefault();
                    const customerId = this.getAttribute('data-customer-id');
                    const customerEmail = this.getAttribute('data-customer-email');
                    var tittle = document.getElementById('tittle').innerHTML = customerId;

                    // AJAX request to get invoice data
                    var xhr = new XMLHttpRequest();
                    xhr.open('GET'
                        , `/invoices/send_statement_by_id?customer_id=${customerId}&customer_email=${customerEmail}`
                        , true);
                    xhr.onload = function() {
                        if (xhr.status >= 200 && xhr.status < 300) {
                            const data = JSON.parse(xhr.responseText);
                            populateModal(data, customerId, customerEmail);
                        } else {
                            console.error('Request failed with status', xhr.status);
                        }
                    };
                    xhr.send();
                });
            });
        });

        function populateModal(data, customerId, customerEmail) {
            const tableBody = document.getElementById('invoiceTableBody');
            tableBody.innerHTML = ''; // Clear existing rows

            data.invoices.forEach((invoice, index) => {
                let row = document.createElement('tr');
                let formattedTotalDue = parseFloat(invoice.total_due - invoice.total_payments).toFixed(2);
                formattedTotalDue = '$ ' + formattedTotalDue.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");

                let redDotHtml = ''; // Initialize redDotHtml

                if (invoice.isLate) {
                    // Add a red dot if the invoice is late
                    redDotHtml = '<span class="redDot"></span>';
                }

                row.innerHTML = `
     <td style="text-align: left; font-size: 15px;">${redDotHtml}${invoice.address} </td>


     <td style="text-align: right; font-size: 15px;">${invoice.inv_number}</td>
     <td style="text-align: right; font-size: 15px;">${formattedTotalDue}</td>
     `;

                tableBody.appendChild(row);
            });

            // Update form values for sending emails
            const form = document.getElementById('send_email_form');
            form.querySelector('input[name="customer_id"]').value = customerId;
            form.querySelector('input[name="email"]').value = customerEmail;
        }

    </script>



    <script>
        // document.addEventListener("DOMContentLoaded", function() {
        //     const outstandingInvoices = document.getElementById("outstanding-invoices");
        //     const lateInvoices = document.getElementById("late-invoices");

        //     // Toggle visibility of cards and manage selected class
        //     document.querySelector(".col-6:nth-child(1)").addEventListener("click", function() {
        //         outstandingInvoices.style.display = "block";
        //         lateInvoices.style.display = "none";
        //         document.querySelector(".col-6:nth-child(1)").classList.add("selected");
        //         document.querySelector(".col-6:nth-child(2)").classList.remove("selected");
        //     });

        //     document.querySelector(".col-6:nth-child(2)").addEventListener("click", function() {
        //         outstandingInvoices.style.display = "none";
        //         lateInvoices.style.display = "block";
        //         document.querySelector(".col-6:nth-child(2)").classList.add("selected");
        //         document.querySelector(".col-6:nth-child(1)").classList.remove("selected");
        //     });
        // });

    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
