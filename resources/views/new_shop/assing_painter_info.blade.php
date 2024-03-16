<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Profile</title>

    <!-- Fav Icon -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="images/favicon.ico" />

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

        .custom-input {
            background: #fff !important;
        }

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

        .showinline {
            white-space: nowrap;
            width: 90%;
            overflow: hidden;
            font-weight: bold;
            text-overflow: ellipsis;

        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
            backdrop-filter: blur(5px);
        }

        .modal-content {
            background-color: #fefefe;
            padding: 20px;
            border: 1px solid #888;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            width: 80%;
            max-width: 600px;
            position: relative;
            margin: 10% auto;
        }

        .close {
            color: #a00;
            margin: 15px;
            font-size: 28px;
            font-weight: bold;
            position: absolute;
            top: -10px;
            right: 0;
            border-radius: 20%;
            padding: 5px;
            cursor: pointer;
            transition: color 0.3s;
            z-index: 10;
        }


        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            transform: scale(1.1);
        }

    </style>
</head>
<body>


    <header>
        <div class="header-row">
            <div class="header-item">
                <a href="#"> </a>
                <span> @if (!empty($company_name))
                    {{ $company_name }}

                    @else
                    Company Name
                    @endif
                </span>

                <a href="<?php echo '/main' ?>"> <img src="/image/logo-phone.png" alt="Logo"> </a>
            </div>
        </div>
    </header>

    @include('layouts.partials.footer')
    <!-- slider -->
    <section class="nav-bar px-1 py-4">
        <div class="modal fade" id="fullscreenModal" tabindex="-1" role="dialog" aria-labelledby="fullscreenModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <button type="button" class="btn-close p-3" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="modal-body">
                        <img src="" class="fullscreen-image" alt="Fullscreen Image" id="fullscreenImage">
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section>
        <div class="custom-border card mx-3  mb-4 rounded-4" style="margin-top: 70px;">
            <div class="card-body">


                <p>This feature will send this job to a painter you chose, hey will have asses to the plans and colour sheet BUT not any purchase order you have, you can also chose if you or they buy the paint</p>

            </div>
        </div>
    </section>

    <!-- card -->
    <section>
        <div class="custom-border card mx-3  rounded-4">
            <div class="card-body">


                <!-- ----- Job detail------ -->
                <div id="job-content" class="content active">
                    @if($job)
                    <div class="py-2 mb-2">
                        <h3>{{$job->address ? $job->address : ''}}</h3>

                    </div>
                    <div class="d-flex gap-2 justify-content-between">
                        <div class="d-flex flex-column gap-2">
                            <div class="d-flex align-items-center gap-2">
                                <img src="/image/icon1/126169 1.png" style="height: 25px" />
                                <p class="mb-0">$ {{ $job->price ? number_format($job->price, 2) : '0.00' }} inc gst</p>
                            </div>
                            @php
                            $startDate = \Carbon\Carbon::parse($job->start_date);
                            $diffInDays = now()->diffInDays($startDate);
                            $diffText = $diffInDays >= 0 ? "(in $diffInDays days)" : "($diffInDays days ago)";
                            @endphp

                            <div class="d-flex align-items-center gap-2">
                                <img src="/image/icon1/4793321 1.png" style="height: 25px" />
                                <p class="mb-0"> {{ $startDate->isoFormat('D MMM, YYYY') }} {{ $diffText }} </p>
                            </div>
                            <div class="d-flex align-items-center gap-2">
                                <img src="/image/icon1/meter.png" style="height: 25px" />
                                <p class="mb-0">{{ $job->house_size ? $job->house_size . 'm2' : '' }}</p>
                            </div>
                        </div>
                        <div class="d-flex flex-column align-items-center">
                            <img class="company-logo" src="/image/icon1/GJ-Gardner-Homes-e1595894281740 5.png" style="height: 30px" />
                            <p>Gate Code: {{$job->admin_builders ? $job->admin_builders->gate : ' ' }} </p>
                            <p class="text-center">Supervisor : {{$job->superviser ? $job->superviser->name : ''}} </p>
                        </div>
                    </div>
                    <div>
                        <p>
                            {{$job->builder_company_name ? $job->builder_company_name : '' }}
                        </p>
                    </div>
                    @else
                    <h3> Dont Have Job Infromation Nothing to Assign</h3>
                    @endif
                </div>

                <!-- ------ Assign Painter ----- -->
                <div id="paint-content" class="content">
                    <div class="py-2 mb-2">
                        <h3>Assigned painter : Job details</h5>
                    </div>
                    <div class="d-flex justify-content-between">
                        <div class="d-flex flex-column gap-2">
                            <div class="d-flex align-items-center gap-2">
                                <img src="/image/icon1/1995396 1.png" style="height: 25px" />
                                <p class="mb-0">Magic Touch painters</p>
                            </div>
                            <div class="d-flex align-items-center gap-2">
                                <img src="/image/icon1/1295109 1.png" style="height: 25px" />
                                <p class="mb-0">$200.00 inc gst</p>
                            </div>
                        </div>
                        <div class="d-flex flex-column align-items-center">
                            <img class="company-logo" src="/image/icon1/GJ-Gardner-Homes-e1595894281740 5.png" style="height: 30px" />
                        </div>
                    </div>
                    <div class="pt-2">
                        <p class="mb-0">This price labour only.</p>
                        <p>
                            Painter needs to order the paint for this job using this app
                            (paint order comes to you )
                        </p>
                        <p class="mb-1">Extra Message:</p>
                        <input type="text" class="w-100" />
                    </div>
                </div>
                <!-- Profit Page -->
                <div id="page-content" class="content">
                    <div class="d-flex justify-content-between py-2 mb-4">
                        <h3>Cost & profit on this job</h3>
                        <img class="company-logo" src="/image/icon1/GJ-Gardner-Homes-e1595894281740 5.png" style="height: 30px" />
                    </div>
                    <div class="fw-medium">
                        <p>
                            Your Price:
                            <span style="color: #10be0d">original price, eg $500.00</span>
                        </p>
                        <p>Painter Price : <span>$200.00 this is input field</span></p>
                        <p>Paint Cost : <span>$30.00</span></p>
                        <p>
                            Total Profit $100.00 = give % of profit from
                            <span style="color: #10be0d">original price &</span>
                            <span style="color: #9105ff">less Paint Cost</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- <form id="form1" method="POST"> --}}
    <form method="POST" action="{{ route('assignJob.Store', ['id' => $job->id]) }}">
        @csrf
        <!-- select painter job -->
        <section>
            <div class="custom-border card mx-3 mb-4 mt-4 rounded-4">
                <div class="card-body">
                    <div id="page-content" class="content active">
                        <div class="d-flex justify-content-between py-2 mb-4">
                            <h3>Cost & Profit on This Job </h3>

                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                ADD Painter
                            </button>


                            <div class="modal " style="z-index: 999999;" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            ...
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Understood</button>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            {{-- end the model here  --}}


                        </div>
                        <div class="fw-medium">

                            @csrf {{-- Include CSRF token for security --}}
                            <div class="mb-3">
                                <label for="assigned_painter_name" class="form-label">Select Painter:<span style="color: red;">*</span></label>
                                <select name="assigned_painter_name" id="assigned_painter_name" class="custom-input" required>
                                    <option value="" selected>Select an option</option>
                                    @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->first_name }} - {{ $user->company_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="newPrice" class="form-label">New Price inc GST: <span style="color: red;">*</span> </label>
                                <input type="number" id="newPrice" name="assign_price_job" class="custom-input" placeholder="Enter new price" value="{{ old('assign_price_job') }}">
                            </div>
                            <div class="mb-3" hidden>
                                <label for="paintCost" class="form-label">Paint Cost</label>
                                <input type="number" id="paintCost" name="paint_cost" placeholder="Paint Cost" class="custom-input" value="{{ old('paint_cost') }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="extrasMessage" class="form-label">Extras Message to Painter (optional)</label>
                                <input type="text" id="extrasMessage" name="assign_job_description" class="custom-input" placeholder="Enter message" value="{{ old('assign_job_description') }}">
                            </div>
                            <div class="text-center"> {{-- Center button with Bootstrap class --}}
                                <p class="btn btn-primary" {{-- type="submit"  --}} id="nextbtnsubmit" onclick="showCostSection()">Next</p>
                            </div>



                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Modal -->




        <!-- Cost & Profit on this job -->
        <section id="cost" class="d-none">
            <div class=" custom-border card mx-3  mb-4 mt-4 rounded-4">
                <div class="card-body">
                    <div id="page-content" class="content active">
                        <div class="d-flex justify-content-between py-2 mb-4">
                            <h3>Cost & profit on this job</h3>
                            <img class="company-logo" src="/image/icon1/GJ-Gardner-Homes-e1595894281740 5.png" style="height: 30px" />
                        </div>
                        <div class="fw-medium">
                            <p>
                                Your Price:
                                <span> ${{$job->price ? $job->price : '' }} </span>
                            </p>
                            <p>Painter Price : <span id="displayPainterPrice"></span></p>
                            <p>Paint Cost : <span id="displayPaintCost"></span></p>
                            <p>
                                Total Profit : <span id="displayTotalProfit"></span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- 
     select who pays for and orders the paint -->
        <section id="sectionfirst">
            <div id="first-q" class="custom-border card mx-3 mb-4 mt-4 rounded-4 d-none">
                <h3 class="pt-4 px-2 text-center">Select who pays for and orders the paint</h3>
                <div id="page-content" class="content active">
                    <div class="d-flex flex-column align-items-stretch px-2">
                        <p class="mb-3 text-center fs-6 pt-3 text-decoration-underline">Does the Painter Buy the Paint?</p>
                        <div class="mt-auto d-flex justify-content-between">
                            <p class="w-25 btn btn-warning" onclick=" showstartbtn(); setAnswer(1, 1);">Yes</p>
                            <p onclick="showSecondQues(); setAnswer(1, 0);" class="w-25 btn btn-danger">No</p>
                        </div>
                    </div>

                    <div id="quesTwo" class="d-none flex-column align-items-stretch px-2">
                        <p class="mb-3 text-center fs-6 pt-5 text-decoration-underline">Does the Painter orders the paint or me ?</p>
                        <div class="mt-auto d-flex justify-content-between">
                            <p class="w-25 btn btn-warning" onclick=" showstartbtn(); setAnswer(2, 1);">Me</p>
                            <p class="w-25 btn btn-danger" onclick="showThirdQues();setAnswer(2, 0);">Painter</p>
                        </div>
                    </div>

                    <div id="quesThird" class="d-none flex-column align-items-stretch px-2">
                        <p class="mb-3 text-center fs-6 pt-5 text-decoration-underline">Is Paint order is sent to me or paint shop ?</p>
                        <div class="mt-auto d-flex justify-content-between">
                            <p class="w-25 btn btn-warning" onclick=" showstartbtn(); setAnswer(3, 1)">Me</p>
                            <p class="w-25 btn btn-danger" onclick="showstartbtn();setAnswer(3, 0);">Shop</p>

                        </div>
                    </div>
                    <input type="hidden" name="status" value="1">
                    <input type="hidden" name="Q_1" id="answer1">
                    <input type="hidden" name="Q_2" id="answer2">
                    <input type="hidden" name="Q_3" id="answer3">

                    <center style="margin-bottom: 20px;">
                        <P class="btn btn-success" hidden id="addInvoicePaidLessButton">Start</P>
                    </center>
                </div>
        </section>


        </div>
        </section>

        <div id="amountNotesModal" class="modal  mt-5 pt-4">
            <div class="modal-content">
                <span class="close">&times;</span>

                <div id="job-content" class="content active">
                    <div class="py-2 mb-2">
                        <h3> {{$job->address ? $job->address : ''}} </h3>
                    </div>
                    <div class="d-flex gap-2 justify-content-between">

                        <div class="d-flex flex-column gap-2">

                            <div class="d-flex align-items-center gap-2">
                                <img src="/image/icon1/126169 1.png" style="height: 25px" />
                                <p class="mb-0">Original Price: <span>{{ $job->price ? number_format($job->price, 2) : '' }}</span> inc gst</p>

                            </div>

                            <div class="d-flex align-items-center gap-2">
                                <img src="/image/icon1/126169 1.png" style="height: 25px" />
                                <p class="mb-0">Painter Price: <span id="displayPainterPrice2"></span></p>
                            </div>

                            <div class="d-flex align-items-center gap-2">
                                <img src="/image/icon1/126169 1.png" style="height: 25px" />
                                <p class="mb-0">Paint Cost: <span id="displayPaintCost2"></span></p>

                            </div>
                            <div class="d-flex align-items-center gap-2">
                                <img src="/image/icon1/4793321 1.png" style="height: 25px" />
                                <p class="mb-0">{{date('j M, Y', strtotime( $job->start_date))}} </p>

                            </div>
                            <div class="d-flex align-items-center gap-2">
                                <img src="/image/icon1/meter.png" style="height: 25px" />
                                <p class="mb-0"> {{$job->house_size}}</p>
                            </div>
                            <div>
                                <p>
                                    <b>Job Details: </b> <br>
                                    {{$job->builder_company_name ? $job->builder_company_name : ''}}

                                </p>
                                <p>
                                    <b>Extra Message: </b> <br>
                                    <span id="extrasMessages"></span>

                                </p>
                            </div>
                        </div>

                    </div>
                    <div>
                        <p>
                            <center> <b> Send to Painter ? </b></center>
                        </p>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-6 text-center">
                        <button type="submit" class="btn btn-success btn-lg">Yes</button>
                    </div>
                    <div class="col-6 text-center">
                        <p class="btn btn-danger btn-lg nobtn" onclick="closebtn()">No</p>
                    </div>
                </div>
            </div>

        </div>

    </form>
    <div style="margin: 20px 0px 300px 0px;"></div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        // Function to show the second question
        function showSecondQues() {
            var quesTwo = document.getElementById("quesTwo");
            quesTwo.classList.remove("d-none");
            quesTwo.classList.add("d-flex");
        }

        // Function to show the third question
        function showThirdQues() {
            var quesThird = document.getElementById("quesThird");
            quesThird.classList.remove("d-none");
            quesThird.classList.add("d-flex");
        }

        // Function to show the start button
        function showstartbtn() {
            var element = document.getElementById('addInvoicePaidLessButton');
            element.removeAttribute('hidden');
        }

        // Function to set answer
        function setAnswer(questionNumber, answerValue) {
            document.getElementById(`answer${questionNumber}`).value = answerValue;
        }

        // Function to handle close button
        function closebtn() {
            var span = document.getElementsByClassName("nobtn")[0];
            span.onclick = function() {
                modal.style.display = "none";
            }
            modal.style.display = "none";

        }

        document.addEventListener("DOMContentLoaded", function() {
            // Initially hide the sectionfirst
            var sectionFirst = document.getElementById("sectionfirst");
            var sectionVisible = false;

            function showSectionFirst() {
                sectionFirst.style.display = "block";
                sectionVisible = true;
            }

            var nextButton = document.getElementById("nextButton");

            nextButton.addEventListener("click", function() {
                if (!sectionVisible) {
                    showSectionFirst();
                }
            });
        });

        // Function to show cost section and calculate paint cost
        function showCostSection() {
            var costSection = document.getElementById("cost");
            var firstQ = document.getElementById("first-q");
            costSection.classList.remove("d-none");
            firstQ.classList.remove("d-none");
        }

        // Event listener to calculate paint cost based on new price
        document.getElementById('newPrice').addEventListener('input', function() {
            var newPrice = parseFloat(this.value);
            if (!isNaN(newPrice)) {
                document.getElementById('paintCost').value = newPrice * 0.30;
            } else {
                document.getElementById('paintCost').value = '';
            }
        });

        // Function to handle modal display
        var modal = document.getElementById("amountNotesModal");
        var btn = document.getElementById("addInvoicePaidLessButton");
        var span = document.getElementsByClassName("close")[0];
        btn.onclick = function() {
            modal.style.display = "block";
        }

        span.onclick = function() {
            modal.style.display = "none";
        }

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

        // Event listener to handle form submission
        document.getElementById('nextbtnsubmit').addEventListener('click', function(event) {
            // Prevent form submission
            event.preventDefault();

            // Get values from form inputs
            const painterPrice = parseFloat(document.getElementById('newPrice').value);
            const paintCost = parseFloat(document.getElementById('paintCost').value);
            const extrasMessage = document.getElementById('extrasMessage').value;
            const formatter = new Intl.NumberFormat('en-US', {
                style: 'decimal'
                , minimumFractionDigits: 2
                , maximumFractionDigits: 2
            , });

            // Display calculated values
            document.getElementById('displayPainterPrice').innerText = `$${formatter.format(painterPrice)}`;
            document.getElementById('displayPaintCost').innerText = `$${formatter.format(paintCost)}`;
            document.getElementById('displayPainterPrice2').innerText = `$${formatter.format(painterPrice)}`;
            document.getElementById('displayPaintCost2').innerText = `$${formatter.format(paintCost)}`;
            document.getElementById('extrasMessages').innerText = extrasMessage;

            // Calculate total profit
            const jobPrice = parseFloat('{{ $job->price ?? '
                0 ' }}'); // Ensure jobPrice is a valid JS variable
            const totalProfit = jobPrice - (painterPrice + paintCost);
            document.getElementById('displayTotalProfit').innerText = `$${formatter.format(totalProfit)}`;
        });

    </script>





</body>
</html>
