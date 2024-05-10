<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
       <title>Send Invoice | Orderr360</title>
     <link rel="icon" href="{{ asset('image/favicon.png') }}" />

    <!--icon link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
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

        .slider-container {
            position: relative;
            overflow: hidden;
            width: 80%;
            /* Adjust width as needed */
            margin: 0 auto;
        }

        .slider {
            display: flex;
            transition: transform 0.5s ease;
        }

        .customer-card {
            flex: 0 0 auto;
            margin-right: 50px;
            padding: 10px 10px 5px 10px;
            cursor: pointer;
        }

        .customer-card.selected {
            /* background-color: #ccc; */
            border-bottom: 4px solid #ff6107;
            font-size: 14px;
            font-weight: bold;
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
            border: none;
            padding: 8px;
        }

        .customer-details {
            display: none;
            margin-top: 10px;
            padding: 10px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .prev,
        .next {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: #ffff;
            border: none;
            font-size: 24px;
            cursor: pointer;
        }

        .prev {
            left: 10px;
        }

        .next {
            right: 10px;
        }
    </style>
</head>



<body>



    @include('layouts.partials.footer')
    <main class=" position-relative" style="margin-top: 120px!important;">
        <header style="margin-top: -120px!important;">
            <div class="header-row">
                <div class="header-item">
                    <a href="<?php echo '/invoice'; ?>"> <i class="fa-solid fa-arrow-left"></i> </a>
                    <span> Report </span>
                    <a href="<?php echo '/main'; ?>"> <img src="/image/logo-phone.png" alt="Logo"> </a>
                </div>
            </div>
        </header>
        <!-- card -->
        <section class="mt-5">
            <div class="card mt-5 mx-1 shadow rounded-4">
                <div class="card-body">

                    <div id="job-content" class="yearly-page content active">
                        <!-- slider section start  -->
                        <div class="slider-container mt-4 mb-4">
                            <div class="slider">

                                @foreach ($customers as $customer)
                                    <div class="customer-card"
                                        onclick="showCustomerDetails('{{ htmlspecialchars($customer->customer_id) }}')">
                                        {{ htmlspecialchars($customer->customer_id) }}
                                    </div>
                                @endforeach



                            </div>
                            <button class="prev" onclick="moveSlider(-1)">&#10094;</button>
                            <button class="next" onclick="moveSlider(1)">&#10095;</button>
                        </div>


                        <div class="row px-4 mt-4 mb-4">
                            <div class="col-6 text-center">
                                <p>Outstanding Invoices:</p>
                            </div>
                            <div class="col-6 text-center">
                                <p>Late Invoices:</p>
                            </div>
                        </div>



                        <div id="customerDetails" class="customer-details"></div>


                        <!-- slider section end  -->

                        <div class="px-4">

                            <table style="width: 100%; border-collapse: collapse; overflow: hidden;">
                                <thead style="background-color: #ff6107; padding: 40px;">
                                    <tr>
                                        <th style="width: 10%;">Job</th>
                                        <th style="width: 20%;">Job Price</th>
                                        <th style="width: 20%;" class="showinline">Outstanding Invoices
                                        </th>
                                        <th style="width: 10%;">Status</th>
                                        <th style="width: 10%;">Amount Due</th>
                                    </tr>

                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Lot 5 Mark St, Liverpool</td>
                                        <td>$500</td>
                                        <td>Lot 5 Mark St, Liverpool</td>
                                        <td>Due</td>
                                        <td>$500</td>
                                    </tr>
                                    <tr>
                                        <td>Lot 34 No 44 Sam Peters Ave, Cabrra</td>
                                        <td>$200</td>
                                        <td>Lot 34 No 44 Sam Peters Ave, Cabrra</td>
                                        <td>Due</td>
                                        <td>$200</td>
                                    </tr>
                                    <tr>
                                        <td>244 Markstantrmost Peterson Ave L</td>
                                        <td>$100</td>
                                        <td>244 Markstantrmost Peterson Ave L</td>
                                        <td>Due</td>
                                        <td>$100</td>
                                    </tr>
                                    <tr>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>Paid</td>
                                        <td>$150</td>
                                    </tr>
                                    <tr>
                                        <td colspan="4">Total Due:</td>
                                        <td>$10,000</td>
                                    </tr>
                                    <tr>
                                        <td colspan="4">Total Due:</td>
                                        <td>$20,000</td>
                                    </tr>
                                    <tr>
                                        <td colspan="4">Total Due:</td>
                                        <td>$11,000</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="px-3 shadow my-4">
                            <hr />
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- footer nav -->
    </main>


    <script>
        let currentIndex = 0;
        const slideWidth = 120; // Width of each customer card
        const slider = document.querySelector('.slider');
        const customerDetails = document.getElementById('customerDetails');

        function moveSlider(direction) {
            const maxIndex = Math.ceil(slider.scrollWidth / slideWidth) - 1;
            currentIndex = Math.min(Math.max(currentIndex + direction, 0), maxIndex);
            const newPosition = -currentIndex * slideWidth;
            slider.style.transform = `translateX(${newPosition}px)`;
        }

        function showCustomerDetails(customerId) {

            customerDetails.textContent = 'Details of Customer: ' + customerId;
            customerDetails.style.display = 'block';
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="./profile.js"></script>
</body>

</html>
