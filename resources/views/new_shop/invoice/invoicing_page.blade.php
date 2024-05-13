<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Invoice | Orderr360</title>
     <link rel="icon" href="{{ asset('image/favicon.png') }}" />
    <link rel="stylesheet" href="{{ asset('css/style10.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />

    <link rel="stylesheet" href="{{ asset('css/style77.css') }}">





</head>
<body>
    <header>
        <div class="header-row">
            <div class="header-item">
                <a href="{{ '/jobs/' . $jobs->id }}"><i class="fa-solid fa-arrow-left"></i></a>
                <span> Invoiceing </span>
                <a href="<?php echo '/main' ?>"> <img src="/image/logo-phone.png" alt="Logo"> </a>

            </div>
        </div>
    </header>


    @include('layouts.partials.footer')


    <div class="container">
        <div class="newInvoice-bar">
            <a href="{{ route('invoice_create2', ['jobs_id' => $jobs->id]) }}" class="newInvoice-link" id="newInvoice-link">
                Create New Invoices <i class="fa-solid fa-plus ml-3"></i>
            </a>
        </div>

        <!-- Card Content -->
        <div class="card" style="padding: 10px 10px 0px 10px; background-color: #fff9c6;">
            <h4><b>{{ $jobs->address }}</b></h4>
            <p class="text-start reduced-line-height">Here are all the in voices for this address,
                open the ones you want to send</p>
            {{-- <p class="text-left reduced-line-height showinline"><b>Job ID:</b> {{$jobs->id}}</p> --}}
            <p class="text-left reduced-line-height showinline">
                <b>Company Name: </b>
                @if(isset($jobs->admin_builders) && $jobs->users->id === auth()->user()->id && $jobs->admin_builders->company_name)
                {{ $jobs->admin_builders->company_name }}
                @endif
                @if(isset($jobs->users) && isset($jobs->assignedJob) && $jobs->assignedJob->assigned_painter_name == auth()->user()->id && $jobs->users->company_name)
                {{ $jobs->users->company_name }}
                @endif
            </p>
            {{-- <p class="text-left reduced-line-height showinline">
                <b>Job Description: </b>
                @if(isset($jobs->builder_company_name) && $jobs->users->id === auth()->user()->id )
                {{ $jobs->builder_company_name }}
            @endif
            @if(isset($jobs->assignedJob) && $jobs->assignedJob->assigned_painter_name == auth()->user()->id)
            {{ $jobs->builder_company_name }}

            </p> --}}

            {{--
            <p class="reduced-line-height showinline"><b>Extra Message:</b>


                @if(!empty($jobs->assignedJob) && !empty($jobs->assignedJob->assign_job_description))
                @php
                $descriptionParts = explode("\n\n", $jobs->assignedJob->assign_job_description);
                @endphp
                @if(!empty($descriptionParts))
                <ol class="text-left mx-0" style="padding-left: 15px;">
                    @foreach($descriptionParts as $part)
                    @if(!empty($part))
                    <li style="line-height: 1.2; /* Adjust this value for line spacing */">{{ $part }}</li>
            @endif
            @endforeach
            </ol>
            @endif
            @endif
            </p>


            @endif --}}

        </div>



        <!-- End Card Section -->





        @if (!$jobs->poItems->contains(function ($poItem) {
        return $poItem->price && $poItem->description && $poItem->ponumber;
        }))
        {{-- <div class="alert alert-danger mt-5" role="alert">
            No Invoice is Available
        </div> --}}
        @endif


     @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
        <script>
            // Ensure the script runs after the document is fully loaded
            document.addEventListener('DOMContentLoaded', function() {
                setTimeout(function() {
                    window.location.reload(); 
                }, 1000); 
            });
        </script>
    @endif

       @if(session('delete'))
        <div class="alert alert-danger mt-3">
            {{ session('delete') }}
        </div>
        <script>
            // Ensure the script runs after the document is fully loaded
            document.addEventListener('DOMContentLoaded', function() {
                setTimeout(function() {
                    window.location.reload(); 
                }, 1000); 
            });
        </script>
    @endif




        <section class="invoice-doc jobs_area InvoicePortfolio">
            @if($jobs->user_id && $jobs->user_id == auth()->id())
            @foreach ($jobs->poItems as $index => $poItem)
            @if ( $poItem->batch <= 4 && $poItem->price && $poItem->description && $poItem->ponumber)

                <a href="{{ url('/invoiceing/' . $jobs->id . '/' . $poItem->id . '/'. $poItem->batch.'/create') }}">

                    <div class="docs_part1 docs_prt1 position-relative portfolio-item" style="line-height: 1;">
                        <div class="invoice-cart">
                            <h5 class="addressText mt-2 showinline address_text">{{ $jobs->address }}</h5>
                            @php
                            $priceIncludingGST = $poItem->price * 1.10; // Adding 10%
                            @endphp

                            <div class="invoice-cart-border"></div>
                            <p class="text3 mb-1">{{ $poItem->description }} </p>


                            <p class="docs_right jobs_right position-absolute end-0 customerInv " style="margin: -10px 10px 0px 0px;">{{ $poItem->invoice ?  $poItem->invoice->inv_number : '' }}</p>
                            <div>
                                <p class="text3 mb-1">${{ number_format($priceIncludingGST, 2) }}inc gst</p>

                                @if($jobs && $jobs->assign_painter == auth()->id())


                                <p class="text3 bilderName"> {{ $jobs->painter ? $jobs->painter->company_name : '' }} </p>
                                @else

                                <p class="text3 bilderName"> {{ $jobs->admin_builders ? $jobs->admin_builders->company_name : '' }} </p>

                                @endif






                            </div>
                        </div>
                        @foreach ($status as $statu)

                        @if ($statu->status == 0 || $statu->status == 1 && ($statu->id == $poItem->invoice_id ) )

                        <div class="status docs_right jobs_right position-absolute bottom-0 end-0">
                            <a class="map_btn" href="#">Ready</a>
                        </div>
                        @elseif ($statu->status == 2 && $statu->id == $poItem->invoice_id)
                        <div class="status-sent docs_right jobs_right position-absolute bottom-0 end-0">
                            <a class="map_btn" href="#">Sent</a>
                        </div>
                        @elseif ($statu->status == 3 && $statu->id == $poItem->invoice_id)
                        <div class=" docs_right jobs_right position-absolute bottom-0 end-0">
                            <div class="status-paid">
                                <a class="map_btn" href="#">Paid</a>
                            </div>
                        </div>
                        @endif
                        @endforeach

                    </div>
                </a>
                @endif
                @endforeach

                @endif

                @if($jobs && $jobs->assign_painter && $jobs->assign_painter == auth()->id())

                @foreach ($jobs->poItems as $index => $poItem)
                @if ( $poItem->batch >= 5 && $poItem->price && $poItem->description && $poItem->ponumber)

                <a href="{{ url('/invoiceing/' . $jobs->id . '/' . $poItem->id . '/'. $poItem->batch.'/create') }}">

                    <div class="docs_part1 docs_prt1 position-relative portfolio-item" style="line-height: 1;">
                        <div class="invoice-cart">
                            <h5 class="addressText mt-2 showinline address_text">{{ $jobs->address }}</h5>
                            @php
                            $priceIncludingGST = $poItem->price * 1.10; // Adding 10%
                            @endphp

                            <div class="invoice-cart-border"></div>
                            <p class="text3 mb-1">{{ $poItem->description }} </p>

                            <p class="docs_right jobs_right position-absolute end-0 customerInv " style="margin: -18px 10px 0px 0px;">{{ $poItem->invoice ?  $poItem->invoice->inv_number : '' }}</p>




                            <div>
                                <p class="text3">${{ number_format($priceIncludingGST, 2) }} inc gst</p>
                                {{-- @if(isset($jobs->users) && isset($jobs->assignedJob) && $jobs->assignedJob->assigned_painter_name == auth()->user()->id && $jobs->users->company_name)
                                {{ $jobs->users->company_name }}
                                @endif --}}

                                @if($jobs && $jobs->assign_painter == auth()->id())


                                <p class="text3 bilderName"> {{ $jobs->painter ? $jobs->painter->company_name : '' }} </p>
                                @else

                                <p class="text3 bilderName"> {{ $jobs->admin_builders ? $jobs->admin_builders->company_name : '' }} </p>

                                @endif




                            </div>
                        </div>
                        @foreach ($status as $statu)

                        @if ($statu->status == 0 || $statu->status == 1 && ($statu->id == $poItem->invoice_id ) )

                        <div class="status docs_right jobs_right position-absolute bottom-0 end-0">
                            <a class="map_btn" href="#">Ready</a>
                        </div>
                        @elseif ($statu->status == 2 && $statu->id == $poItem->invoice_id)
                        <div class="status-sent docs_right jobs_right position-absolute bottom-0 end-0">
                            <a class="map_btn" href="#">Sent</a>
                        </div>
                        @elseif ($statu->status == 3 && $statu->id == $poItem->invoice_id)
                        <div class=" docs_right jobs_right position-absolute bottom-0 end-0">
                            <div class="status-paid">
                                <a class="map_btn" href="#">Paid</a>
                            </div>
                        </div>
                        @endif
                        @endforeach

                    </div>
                </a>
                @endif
                @endforeach

                @endif


        </section>



        <section class="invoice-doc jobs_area InvoicePortfolio">
            @foreach ($invoices as $invoice)
            <a href="{{ '/manual_invoice_job/' . $invoice->id }}" style="text-decoration: none; color:black;">
                <div class="docs_part1 docs_prt1 position-relative portfolio-item" style="line-height: 1;">
                    <div class="invoice-cart">
                        <h5 class="addressText mt-2 showinline address_text">{{ $invoice->address }}</h5>
                        <div class="invoice-cart-border"></div>
                        <p class="text3">{{ $invoice->description }} </p>
                        <p class="docs_right jobs_right position-absolute end-0 customerInv" style="margin: 0px 10px 0px 0px;">{{ $invoice->inv_number }}</p>
                        <div>
                            <p class="text3"> {{$jobs->assignedJob ? $jobs->assignedJob->assign_job_description : ''  }} </p>






                            <p class=" text3 mt-1 mb-1 "> ${{ number_format($invoice->total_due, 2) }} inc gst</p>
                            <p class="text3 bilderName"> {{ $invoice->customer_id }} </p>
                        </div>
                    </div>


                    @if ($invoice->status == 1)
                    <div class="status docs_right jobs_right position-absolute bottom-0 end-0">
                        <a class="map_btn" href="#">Ready</a>
                    </div>
                    @endif
                    @if ($invoice->status == 2)
                    <div class="status-sent docs_right jobs_right position-absolute bottom-0 end-0">
                        <a class="map_btn" href="#">Sent</a>
                    </div>
                    @endif
                    @if ($invoice->status == 3)
                    <div class=" docs_right jobs_right position-absolute bottom-0 end-0">
                        <div class="status-paid">
                            <a class="map_btn" href="#">Paid</a>
                        </div>
                    </div>
                    @endif
                </div>
            </a>
            @endforeach

        </section>


        <div style="margin: 20px 0px 300px 0px;"></div>


</body>





<script src="{{ asset('js/script.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>



</html>































{{-- @foreach($invoices as $invoice)
            @if($invoice->job_id && $invoice->status == 1 )
            <div class="card InvoicePortfolio invoice-item  filter-ready">
                <a href="{{ '/manual_invoice/' . $invoice->id }}">
<div class="cardhaderInvoice-link">
    <h5 class="text-left ml-2 mt-1 showinline" style="width: 70%" id="expandable-title">{{ $invoice->address}}</h5>
    <button type="button" class="invoiceReadynotification-button">Ready</button>
</div>
<p class="text-center mt-2">This invoice is ready to send to cuestomer</p>

<div class="row p-1">
    <div class="col-6 reduced-line-height">
        <p class="text-left showinline"> {{$invoice->customer_id}}</p>
        <p class="text-left showinline"> {{$invoice->description}} </p>
    </div>
    <div class="col-6 reduced-line-height">
        <p class="text-right"><b>Start:</b> <br> <?php echo (new DateTime($invoice->date))->format('d-m-Y'); ?> </p>
        <p class="text-right">{{$invoice->inv_number}} </p>
        <p class="text-right font-weight-bold">${{$invoice->total_due}}</p>
    </div>
</div>

</a>
</div>
@elseif($invoice->job_id && $invoice->status == 2)
<div class="card InvoicePortfolio invoice-item  filter-unpaid">
    <a href="{{ '/manual_invoice/' . $invoice->id }}">
        <div class="cardhaderInvoice-unpaid">
            <h5 class="text-left ml-2 mt-1 showinline" style="width: 70%" id="expandable-title">{{ $invoice->address}}</h5>
            <button type="button" class="invoiceReadynotification-unpaid">Unpaid</button>
        </div>

        <p class="text-center mt-2">waiting or payment, i paid click receaved</p>

        <div class="row p-1">

            <h6 class=" col-12 text-left"> <b>SENT: </b><?php echo (new DateTime($invoice->updated_at))->format('d-m-Y'); ?> </h6>
            <div class="col-6 reduced-line-height">
                <p class="text-left showinline">{{$invoice->customer_id}}</p>
                <p class="text-left showinline">{{$invoice->description}} </p>
            </div>
            <div class="col-6 reduced-line-height">

                <p class="text-right"> {{$invoice->inv_number}}</p>
                <p class="text-right font-weight-bold">${{$invoice->total_due}}</p>
            </div>
        </div>
    </a>
</div>
@elseif($invoice->job_id && $invoice->status == 3)
<div class="card InvoicePortfolio invoice-item  filter-paid">
    <a href="{{ '/manual_invoice/' . $invoice->id }}">
        <div class="cardhaderInvoice-paid">
            <h5 class="text-left ml-2 mt-1 showinline" style="width: 70%" id="expandable-title">{{ $invoice->address}}</h5>
            <button type="button" class="invoiceReadynotification-paid">Paid</button>
        </div>

        <p class="text-center mt-2"><b>PAID ON : </b><?php echo (new DateTime($invoice->updated_at))->format('d-m-Y'); ?></p>

        <div class="row p-1">
            <h6 class=" col-12 text-left"> <b>PAID ON : </b><?php echo (new DateTime($invoice->updated_at))->format('d-m-Y'); ?> </h6>
            <div class="col-6 reduced-line-height">

                <p class="text-left showinline">{{$invoice->customer_id}}</p>
                <p class="text-left showinline"> {{$invoice->description}} </p>
            </div>
            <div class="col-6 reduced-line-height">
                <p class="text-right"> {{$invoice->inv_number}}</p>
                <p class="text-right font-weight-bold">${{$invoice->total_due}}</p>
            </div>
        </div>
    </a>
</div>
@endif
@endforeach --}}
