@extends('layouts.app')

@section('style')
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
@endsection

@section('content')
    
 
    
    <header>
        <div class="header-row">
            <div class="header-item">
                <a href="#"> </a>	
                <span>  Invoice </span>
                <a href="<?php echo '/main' ?>">   <img src="/image/logo-phone.png" alt="Logo"> </a>   
            </div>
        </div>
    </header>	


@include('layouts.partials.footer')  
        
      

    <div class="container" style="padding-top: 30px">
        
    
        {{-- <div class="newInvoice-bar">
            <a href="<?php echo '/invoice/create' ?>" class="newInvoice-link" id="newInvoice-link">Create New Invoices<i class="fa-solid fa-plus ml-3"></i></a>
        </div> --}}


        {{-- <div class="dueInvoice-bar">
            <a href="<?php echo '/invoices/late' ?>" class="dueInvoice-link" id="newInvoice-link">See Over due Invoices </a>
            <button type="button" class=" notification-button"> @if($due_invoice) {{ $due_invoice }} @else 0 @endif </button>
        </div> --}}
         @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>

        @endif
     
        <div class="portfolio-container mt-2">
            <!-- Card Content -->
            
         <a href="<?php echo '/invoice/create' ?>" id="card">    
            <div class="docs_part docs_prt1 ">
                <div class="docs_left jobs_cnt">
                    <h4> <b> Make Invoice </b></h4>
                    <p>Make & send new invoice & add new customer. </p>
                </div>
                <div class="docs_right">
                    <img src="/image/icon1/hghg.png" >
                </div>
            </div>
        </a> 

        <a href="<?php echo '/invoice/all' ?>"  id="card">   
            <div class="docs_part docs_prt1 ">
                <div class="docs_left jobs_cnt">
                    <h4> <b> See Invoice  </b> </h4>
                    <p> Here you can see all sent, unpaid and Paid invoices. </p>
                </div>
                <div class="docs_right">
                    <img src="/image/icon1/fgfg.png" alt="" >
                </div>
            </div>
        </a> 

            <a href="<?php echo '/invoices/late' ?>" class="dueInvoice-link" id="newInvoice-link">
            <div class="docs_part docs_prt1">
                <div class="docs_left jobs_cnt">
                    <div class="row">
                      <div class="col-10">
                            <h4 style="text-align: left; color:black;"><b > Late Invoices </b></h4>
                      </div>
                      <div class="col-2">

                          <button style="margin-left:-100px;   border: 5px solid white!important;" type="button" class="notification_btn"> @if($totalLateInvoices) {{ $totalLateInvoices }} @else 0 @endif </button>
                     
                      </div>
                    </div>
                     
                    
                    <p style="text-align: left;">Keep an eye on over due Invoices & send reminder.</p>
                </div>
                
                <div class="docs_right" style="padding: 0px!important; margin: 0px; ">
                    <img src="/image/icon1/l-invoice.png" >
                </div>
            </div>
        </a> 
        <a href="<?php echo '/invoices/report' ?>" class="dueInvoice-link" id="newInvoice-link">
            <div class="docs_part docs_prt1">
                <div class="docs_left jobs_cnt">
                    <div class="row">
                      <div class="col-10">
                            <h3 style="text-align: left; color:black;"><b > Reports & Statements </b></h3>
                      </div>
                    </div>
                     
                 
                    <p style="text-align: left;">See how much invome & spending cost for the year or month.</p>
                </div>
                
                <div class="docs_right" style="padding: 0px!important; margin: 0px; ">
                    <img src="/image/icon1/report.png" >
                </div>
            </div>
        </a> 
           
           
            <!-- End Card Section -->   
        </div>
        <div style="margin: 20px 0px 300px 0px;"></div>
    </div>
@endsection

@section('js')

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
    
@endsection