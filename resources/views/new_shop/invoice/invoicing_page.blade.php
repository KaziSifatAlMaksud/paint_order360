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

</head>
<body>
    
 
      <header>
			<div class="header-row">
				<div class="header-item">
                    <a href="{{ '/jobs/' . $jobs->id }}"><i class="fa-solid fa-arrow-left"></i></a>

				 {{-- <a href="{{ url()->previous() }}"> <i class="fa-solid fa-arrow-left"></i> </a>	 --}}
					<span> Invoiceing </span>
					<a href="<?php echo '/main' ?>">   <img src="/image/logo-phone.png" alt="Logo"> </a>   
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
            <div  class="card" style="padding: 10px 10px 0px 10px; background-color: #fff9c6;">                
              <h4><b>{{ $jobs->address }}</b></h4>
               <p class="text-start reduced-line-height">Here are all the in voices for this address,
                open the ones you want to send</p>
                <p class="text-left reduced-line-height showinline"><b>Job ID:</b> {{$jobs->id}}</p>  

               <p class="text-left reduced-line-height showinline"> <b>Company Name : </b> 
                
                @if(isset($jobs->admin_builders) && $jobs->admin_builders->company_name)
                    {{ $jobs->admin_builders->company_name }}
                @else
                    {{ '' }}
                @endif

            </p>    
              <p class="text-left reduced-line-height showinline"> <b>Job Discription: </b> 
                
                  @if($jobs->builder_company_name)
                    {{ $jobs->builder_company_name }}
                @endif
            </p>                 
            </div>
          
           
            <!-- End Card Section -->  
    
            @if (!$jobs->poItems->contains(function ($poItem) {
                return $poItem->price && $poItem->description && $poItem->ponumber;
            }))
                <div class="alert alert-danger mt-5" role="alert">
                    No Invoice is Available
                </div>
            @endif

       
   @foreach ($jobs->poItems as $index => $poItem)
        @if ($poItem->price && $poItem->description && $poItem->ponumber)
            <div class="card">
                <a href="{{ url('/invoiceing/' . $jobs->id . '/' . $poItem->id . '/'. $poItem->batch.'/create') }}">                         
                    <div class="row" style="padding: 10px 10px 0px 10px;">
                        <div class="col-8">    
                            <p class="text-left showinline">{{ $poItem->description }}</p>  
                            @php
                                $priceIncludingGST = $poItem->price * 1.10; // Adding 10%
                            @endphp

                            <p class="text-left showinline"><b>Price inc gst:</b> ${{ number_format($priceIncludingGST, 2) }}</p>
                   
                            {{-- <p class="text-left showinline"><b>Price inc gst:</b> ${{ $poItem->price }}</p> --}}
                        </div>
                        <div class="col-4 text-right font-weight-bold mt-2">
               
                             @foreach ($status as $statu)
                         
                                        @if ($statu->status == 0 || $statu->status == 1 && ($statu->id == $poItem->invoice_id ) )
                                            <button type="button" class="invoiceReadynotification-button2">Ready</button>
                                        @elseif ($statu->status == 2 && $statu->id == $poItem->invoice_id)

                                            <button type="button" class="invoiceReadynotification-unpaid2">Unpaid</button>
                                             <p style="margin-top: 40px; "> SEND: <?php echo (new DateTime($poItem->updated_at))->format('d-m-Y'); ?></p> 

                                        @elseif ($statu->status == 3 && $statu->id == $poItem->invoice_id)
                                            <button type="button" class="invoiceReadynotification-paid2">Paid</button>
                                                 <p style="margin-top: 40px; "> Paid: <?php echo (new DateTime($poItem->updated_at))->format('d-m-Y'); ?></p> 
                                        @endif
                 
                            @endforeach
                           
                        </div>
                        
                    </div>
                </a>  
            </div>
        @endif
    @endforeach 


{{-- 
       @foreach ($jobs->poItems as $index => $poItem)
            @foreach ($status as $statu)
            @if ($statu->status == 0 || $statu->status == 1 && ($statu->id == $poItem->invoice_id ) )
               <div  class="card InvoicePortfolio invoice-item  filter-ready">
               <a href="{{ url('/invoiceing/' . $jobs->id . '/' . $poItem->id . '/'. $poItem->batch.'/create') }}">  
                <div  class="cardhaderInvoice-link">
                    <h5 class="text-left ml-2 mt-1 showinline" style="width: 70%" id="expandable-title">{{ $jobs->address }}</h5>
                    <button type="button" class="invoiceReadynotification-button">Ready</button>
                </div>
                        <p class="text-center mt-2">This invoice is ready to send to cuestomer</p>
      
                        <div class="row p-1">
                            <div class="col-6 reduced-line-height">
                                <p class="text-left showinline"> </p>
                                <p class="text-left showinline"> {{ $poItem->description }} </p>
                            </div>
                            <div class="col-6 reduced-line-height">
                                <p class="text-right"><b>Start:</b> <br> </p>
                                <p class="text-right"> </p>
                                <p class="text-right font-weight-bold">$</p>
                            </div>
                        </div>
                
                    </a>    
                </div>
                @elseif ($statu->status == 2 && $statu->id == $poItem->invoice_id)
                 <div class="card InvoicePortfolio invoice-item  filter-unpaid">
                    <a href="{{ url('/invoiceing/' . $jobs->id . '/' . $poItem->id . '/'. $poItem->batch.'/create') }}">  
                <div  class="cardhaderInvoice-unpaid">
                 <h5 class="text-left ml-2 mt-1 showinline" style="width: 70%" id="expandable-title"></h5>
                 <button type="button" class="invoiceReadynotification-unpaid">Unpaid</button>
                </div>
   
                <p class="text-center mt-2">waiting or payment, i paid click receaved</p>
                           
                     <div class="row p-1">

                        <h6 class=" col-12 text-left">  <b>SENT:  </h6>
                         <div class="col-6 reduced-line-height">
                             <p class="text-left showinline">  </p>
                             <p class="text-left showinline">  </p>
                         </div>
                         <div class="col-6 reduced-line-height">
                           
                             <p class="text-right"> </p>
                             <p class="text-right font-weight-bold">$</p>
                         </div>
                     </div>
                 </a>   
             </div>   
              @elseif ($statu->status == 3 && $statu->id == $poItem->invoice_id)
                <div class="card InvoicePortfolio invoice-item  filter-paid">
                  <a href="{{ url('/invoiceing/' . $jobs->id . '/' . $poItem->id . '/'. $poItem->batch.'/create') }}"> 
                <div  class="cardhaderInvoice-paid">
                 <h5 class="text-left ml-2 mt-1 showinline" style="width: 70%" id="expandable-title"></h5>
                 <button type="button" class="invoiceReadynotification-paid">Paid</button>
                </div>
 
                <p class="text-center mt-2"><b>PAID ON : </p>
                           
                     <div class="row p-1">
                        <h6 class=" col-12 text-left"> <b>PAID ON : </b></h6>
                         <div class="col-6 reduced-line-height">
                           
                             <p class="text-left showinline">  </p>
                             <p class="text-left showinline">  </p>
                         </div>
                         <div class="col-6 reduced-line-height">
                             <p class="text-right">   </p>
                             <p class="text-right font-weight-bold">$ </p>
                         </div>
                     </div>
                      </a>  
               </div>     
                @endif 
                   @endforeach        
        @endforeach  --}}

        <hr>
        <hr>


               
             @foreach($invoices as $invoice)
                @if($invoice->job_id && $invoice->status == 1 )
               <div  class="card InvoicePortfolio invoice-item  filter-ready">
                <a href="{{ '/manual_invoice/' . $invoice->id }}">
                <div  class="cardhaderInvoice-link">
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
                                <p class="text-right"><b>Start:</b> <br>  <?php echo (new DateTime($invoice->date))->format('d-m-Y'); ?> </p>
                                <p class="text-right">{{$invoice->inv_number}} </p>
                                <p class="text-right font-weight-bold">${{$invoice->total_due}}</p>
                            </div>
                        </div>
                
                    </a>    
                </div>
                @elseif($invoice->job_id && $invoice->status == 2)   
                 <div class="card InvoicePortfolio invoice-item  filter-unpaid">
                    <a href="{{ '/manual_invoice/' . $invoice->id }}">
                <div  class="cardhaderInvoice-unpaid">
                 <h5 class="text-left ml-2 mt-1 showinline" style="width: 70%" id="expandable-title">{{ $invoice->address}}</h5>
                 <button type="button" class="invoiceReadynotification-unpaid">Unpaid</button>
                </div>
   
                <p class="text-center mt-2">waiting or payment, i paid click receaved</p>
                           
                     <div class="row p-1">

                        <h6 class=" col-12 text-left">  <b>SENT: </b><?php echo (new DateTime($invoice->updated_at))->format('d-m-Y'); ?> </h6>
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
              @elseif($invoice->job_id && $invoice->status == 3) 
                <div class="card InvoicePortfolio invoice-item  filter-paid">
                   <a href="{{ '/manual_invoice/' . $invoice->id }}"> 
                <div  class="cardhaderInvoice-paid">
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
                             <p class="text-right">  {{$invoice->inv_number}}</p>
                             <p class="text-right font-weight-bold">${{$invoice->total_due}}</p>
                         </div>
                     </div>
                      </a>  
               </div>     
                @endif         
            @endforeach 
            {{-- <div class="green">
                            <li>  <a href="{{ asset('/uploads/' . $poItem->file) }}" target="_blank">P.O {{ $index + 1 }}</a> </li>
            </div>
             <!-- End Card Section --> 
                <!-- Card Content -->
                <div class="card ">
                
                    <div class="row" style="padding: 10px 10px 0px 10px;">
                
                        <div class="col-6">
                            <p class="text-left showinline">Maintenance Work</p>
                            <p class="text-left showinline"> Price: $237.00 </p>
                        </div>
                        <div class="col-6 text-right font-weight-bold mt-2">
                            <p>Start: <br> 23/04/23</p>
                        </div>
                    </div>
                
                </div>
                <!-- End Card Section -->
                    <!-- Card Content -->
                    <div class="card ">
                    
                        <div class="row" style="padding: 10px 10px 0px 10px;">
                    
                            <div class="col-6">
                                <p class="text-left showinline">External painting</p>
                                <p class="text-left showinline"> Price: $237.00 </p>
                            </div>
                            <div class="col-6 text-right font-weight-bold mt-2">
                                <p>Start: <br> 23/04/23</p>
                            </div>
                        </div>
                    
                    </div>  --}}
                    <!-- End Card Section -->

        <div style="margin: 20px 0px 300px 0px;"></div>
    </div>
</body>

    



    <script src="{{ asset('js/script.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    


</html>