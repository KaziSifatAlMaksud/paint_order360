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
                <a href="{{ url()->previous() }}"> <i class="fa-solid fa-arrow-left"></i> </a>
                <span>  Invoice </span>
                <a href="<?php echo '/main' ?>">   <img src="/image/logo-phone.png" alt="Logo"> </a>   
            </div>
        </div>
    </header>	


@include('layouts.partials.footer')  
        
      

    <div class="container" style="padding-top: 30px">
        <div class="filter">
            <ul class="invoice-flters">
                <li id="filter-all" class="filter-active">All</li>
                <li id="filter-ready" class="filter-inactive">Ready</li>
                <li id="filter-unpaid" class="filter-inactive">Unpaid</li>
                <li id="filter-paid" class="filter-inactive">Paid</li>
            </ul>
        </div>
        
    
        <div class="search-bar" >
            <i class="fas fa-search search-icon"></i>
            <input type="text" class="search-input" id="search-invoice" placeholder="Search Address or Customer" oninput="filterCards2()">
        </div>
      
         @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
                  {{-- <p>Invoice ID: {{ session('invoiceId') }}</p> --}}
            </div>

        @endif
        <div class="portfolio-container">
            <!-- Card Content -->
            
            
             @foreach($invoices as $invoice)
                @if($invoice->status == 1 )
               <div  class="card InvoicePortfolio invoice-item  filter-ready">
                <a href="{{ '/manual_invoice/' . $invoice->id }}">
                <div  class="cardhaderInvoice-link">
                    <h5 class="text-left ml-2 mt-1 showinline" style="width: 70%" id="expandable-title">{{ $invoice->address}}</h5>
                    <button type="button" class="invoiceReadynotification-button">Ready</button>
                </div>
                        <p class="text-center mt-2">This invoice is ready to send to Customer</p>
      
                        <div class="row p-1">
                            <div class="col-6 reduced-line-height">
                                <p class="text-left showinline"> {{$invoice->customer_id}}</p>
                                <p class="text-left showinline"> {{$invoice->description}} </p>
                            </div>
                            <div class="col-6 reduced-line-height">
                                {{-- <p class="text-right"><b>Start:</b> <br>  <?php echo (new DateTime($invoice->date))->format('d-m-Y'); ?> </p> --}}
                                <p class="text-right">{{$invoice->inv_number}} </p>
                                <p class="text-right font-weight-bold">${{$invoice->total_due}}</p>
                            </div>
                        </div>
                
                    </a>    
                </div>
                @elseif($invoice->status == 2)   
                 <div class="card InvoicePortfolio invoice-item  filter-unpaid">
                    <a href="{{ '/manual_invoice/' . $invoice->id }}">
                <div  class="cardhaderInvoice-unpaid">
                 <h5 class="text-left ml-2 mt-1 showinline" style="width: 70%" id="expandable-title">{{ $invoice->address}}</h5>
                 <button type="button" class="invoiceReadynotification-unpaid">Unpaid</button>
                </div>
   
                <p class="text-center mt-2">Waiting for payment, I paid click received</p>
                           
                     <div class="row p-1">

                        <h6 class=" col-12 text-left">  <b>SENT: </b><?php echo (new DateTime($invoice->send_to))->format('d-m-Y'); ?> </h6>
                         <div class="col-6 reduced-line-height">
                             <p class="text-left showinline">{{$invoice->customer_id}}</p>
                             <p class="text-left showinline">{{$invoice->description}} </p>
                         </div>
                         <div class="col-6 reduced-line-height">
                             {{-- <p class="text-right"><b>Start:</b> <br><?php echo (new DateTime($invoice->date))->format('d-m-Y'); ?> </p> --}}
                             <p class="text-right"> {{$invoice->inv_number}}</p>
                             <p class="text-right font-weight-bold">${{$invoice->total_due}}</p>
                         </div>
                     </div>
                 </a>   
             </div>   
              @elseif( $invoice->status == 3) 
                <div class="card InvoicePortfolio invoice-item  filter-paid">
                   <a href="{{ '/manual_invoice/' . $invoice->id }}"> 
                <div  class="cardhaderInvoice-paid">
                 <h5 class="text-left ml-2 mt-1 showinline" style="width: 70%" id="expandable-title">{{ $invoice->address}}</h5>
                 <button type="button" class="invoiceReadynotification-paid">Paid</button>
                </div>
 
                <p class="text-center mt-2"><b>PAID ON : </b><?php echo (new DateTime($invoice->updated_at))->format('d-m-Y'); ?></p>
                           
                     <div class="row p-1">
                        {{-- <h6 class=" col-12 text-left"> <b>PAID ON : </b><?php echo (new DateTime($invoice->updated_at))->format('d-m-Y'); ?> </h6> --}}
                         <div class="col-6 reduced-line-height">
                           
                             <p class="text-left showinline">{{$invoice->customer_id}}</p>
                             <p class="text-left showinline"> {{$invoice->description}} </p>
                         </div>
                         <div class="col-6 reduced-line-height">
                             <p class="text-right">  {{$invoice->inv_number}}</p>
                             <p class="text-right font-weight-bold">${{$invoice->total_due}}</p>
                         </div>
                     </div>
                      </a>  
               </div>     
                @endif         
            @endforeach 

            {{-- @foreach($jobs as $job)
                @if($job->poitem)
                     <div  class="card InvoicePortfolio invoice-item  filter-ready">
                <a href="{{ '/invoiceing/' . $job->id }}">
                <div  class="cardhaderInvoice-link">
                    <h5 class="text-left ml-2 mt-1 showinline" style="width: 95%" id="expandable-title">{{ $job->address}}</h5>
              
                </div>
                        <p class="text-center mt-2">This invoice is ready to send to cuestomer</p>
      
                        <div class="row p-1">
                            <div class="col-6 reduced-line-height">
                                <p class="text-left showinline">  </p>
                                <p class="text-left showinline"> {{$job->poitem->description}} </p>
                            </div>
                            <div class="col-6 reduced-line-height">
                                <p class="text-right"> INV0</p>
                                <p class="text-right font-weight-bold">${{$job->price}}</p>
                            </div>
                        </div>
                
                    </a>    
                </div> 
                @endif
            @endforeach --}}

           
            <!-- End Card Section -->   
        </div>
        <div style="margin: 20px 0px 300px 0px;"></div>
    </div>
</body>

<script>
    window.addEventListener('scroll', function() {
        var headerHeight = document.querySelector('.header-row').offsetHeight;
        var filterElement = document.querySelector('.filter');
        var searchBarElement = document.querySelector('.search-bar');

        if (window.pageYOffset > headerHeight) {
            // If the page is scrolled down past the header height, fix the filter and search bar to the top
            filterElement.classList.add('fixed-top');
            searchBarElement.classList.add('fixed-top');
        } else {
            // If the page is scrolled back to the top, remove the fixed position
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