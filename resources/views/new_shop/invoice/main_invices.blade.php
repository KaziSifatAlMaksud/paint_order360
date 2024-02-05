<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>| Shop</title>
<link rel="stylesheet" href="{{ asset('css/style10.css') }}">  
  <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
      integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
     <style>


:root {
    --clr: #222327;
    --bg:#f5f5f5;
    --body-bg: #ebebeb;
    --nav-colo: #fff;
    --orang: orangered;
    --bg-orang: #ffddaa;
    --newInvoice-bg: #66ff5b;
    --dueInvoice-bf:#ff7070;
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

.navigation ul{
    margin-bottom: 0!important;
    padding-left: 0rem !important;
    display: flex;
    width: 100%;
    
}
.navigation ul li{    
    position: relative;
    list-style: none;
    width: 30%;
    height: 70px;
    z-index: 1;
}
.navigation ul li a{
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
 
    /* text-align: center; */
    font-weight: 500;
}
.navigation ul li a .icon{
    position: relative;
    display: block;
    line-height: 75px;
    font-size: 1.5em;
    text-align: center;
    transition: 0.5s;
    color: var(--clr);

}
.navigation ul li.active a .icon{
    transform: translateY(-15px);
    padding: 0px 25px 0px 25px;
    border-radius: 50%; 
    font-size: 20px;
    color: var(--orang);
 

}

.navigation ul li a .text{
    position: absolute;
    color: var(--orang);
    font-weight: bold;
    font-size: 1em;
    letter-spacing: 0.05em;
    /* transition: 0.5s; */
    opacity: 0;
    transform: translateY(20px);
}
.navigation ul li.active a .text{
    opacity: 1;
    transform: translateY(10px);
}

/* Navigation End Update*/


</style>

  </head>

  <body>
   
          @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}           
            </div>
        @endif
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
 

    <main >

  
      <!-- card -->
      <section style="padding-top: 90px;">
        <div class="filter custom-border rounded-4">
            <table class="align-middle">
              <tbody>
                <tr>
                  <td>Ready to send</td>
                  <td ><span >3</span></td>
                  <td> = $2,0000.00</td>
                </tr>
                <tr>
                  <td>Sent out</td>
                  <td ><span>15</span></td>
                  <td> = $14,0000.00</td>
                </tr>
                <tr>
                  <td>Late invoices</td>
                  <td ><span>2</span></td>
                  <td> = $3,0000.00</td>
                </tr>
              </tbody>
            </table>
        </div>
           <div class="search-bar" >
            <i class="fas fa-search search-icon"></i>
            <input type="text" class="search-input" id="search-invoice" placeholder="Search Address or Customer" oninput="filterCards2()">
        </div>
        {{-- <div class="search-bar mt-3">
          <input type="text" class="search-input bg-white" id="search-input" placeholder="Address or Customer" oninput="filterCards()">
          <i class="fas fa-search search-icon"></i>
      </div> --}}
        <div class="px-2 border-custom"></div>
      </section>

      <section class="invoice-doc jobs_area">

			<div class="jobs_house">
				<img src="images/house.png" alt="">
			</div>
            @foreach($invoices as $invoice)
                

                <div class="docs_part1 docs_prt1 position-relative">
                    <div class="invoice-cart">
                        <h5 class="address_text mt-2">{{ $invoice->address}}</h5>
                        <div class="invoice-cart-border"></div>
                            <p class="text2">{{$invoice->description}} </p>
                        <div>
                            <p class="text3"><strong>${{number_format( $invoice->total_due, 2)}}inc gst</strong></p>
                            <p class="text3"><strong> {{$invoice->customer_id}} </strong></p>
                        </div>
                    </div>
                     @if($invoice->status == 1 )
                    <div class="status docs_right jobs_right position-absolute bottom-0 end-0">
                        <a class="map_btn" href="#">Ready</a>
                    </div>
                      @elseif($invoice->status == 2) 
                      <div class="status-sent docs_right jobs_right position-absolute bottom-0 end-0">
					        <a class="map_btn" href="#">Sent</a>
				        </div>

                        {{-- <div class="px-3 d-flex align-items-center docs_right jobs_right position-absolute bottom-0 end-0">
                        <div class="status-late">
                            <a class="map_btn" href="#">Late</a>
                        </div>
                        <p class="mb-0 fw-bold">3 days</p>
                        </div> --}}
                     @elseif( $invoice->status == 3)
                    <div class=" docs_right jobs_right position-absolute bottom-0 end-0">
                        <div class="status-paid">
                            <a class="map_btn" href="#">Paid</a>
                        </div>
                    </div>
                
                    @endif   
                </div>
            @endforeach  
          
		</section>



      <div style="margin: 20px 0px 300px 0px;"></div>
        </main> 
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>
    <script src="./profile.js"></script>
  </body>
</html>







    <div class="container" style="padding-top: 30px">
            
            
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
                                <p class="text-left showinline" id="customer-title"> {{$invoice->customer_id}}</p>
                                <p class="text-left showinline"> {{$invoice->description}} </p>
                            </div>
                            <div class="col-6 reduced-line-height">
                                {{-- <p class="text-right"><b>Start:</b> <br>  <?php echo (new DateTime($invoice->date))->format('d-m-Y'); ?> </p> --}}
                                <p class="text-right">{{$invoice->inv_number}} </p>
                                <p class="text-right font-weight-bold">${{number_format( $invoice->total_due, 2)}}</p>
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
                             <p class="text-right font-weight-bold">${{number_format( $invoice->total_due, 2)}}</p>
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
                             <p class="text-right font-weight-bold">${{ number_format( $invoice->total_due, 2)}}</p>
                         </div>
                     </div>
                      </a>  
               </div>     
                @endif         
            @endforeach           
            <!-- End Card Section -->   
        </div>
 
    </div>
</body>


</html>