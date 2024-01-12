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
				 <a href="{{route('invoice')}}"> <i class="fa-solid fa-arrow-left"></i> </a>	
					<span> Send Invoice </span>
					<a href="<?php echo '/main' ?>">   <img src="/image/logo-phone.png" alt="Logo"> </a>   
				</div>
			</div>
		</header>	

    @include('layouts.partials.footer')  
    <div class="container" >
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

                    <form action="{{ route('invoice_savesend2', ['jobs_id' => $jobsinfo->id]) }}" method="POST" enctype="multipart/form-data">
                     @csrf 
                        <fieldset class="m-3">
                    <div class="row mb-3 mt-2">
                            <div class="col-2 d-flex align-items-center justify-content-center">
                                <label class="form-label"> To : </label>
                            </div>
                            <div class="col-10">                     
                                <input name="customer_id" type="text" value="{{$jobs->builder->name}}" class="custom-input" readonly>
                            </div>                    
                        </div>
                        <div class="row mb-3 mt-2">
                            <div class="col-2 d-flex align-items-center justify-content-center">
                                <label class="form-label"> Email : </label>
                            </div>
                            <div class="col-10">                     
                                <input name="send_email" type="text" value="{{$admin_builders->builder_email}}" class="custom-input" >
                            </div>                    
                        </div>
           
                        <!-- Invoice Number -->
                            {{-- --}}
                        <div class="row mb-3">
                            <div class="col-2 d-flex align-items-center justify-content-center">
                                <label class="form-label"><i class="fas fa-file-invoice"> </i> </label>
                            </div>
                            <div class="col-10">
                            <input type="text" class="custom-input" value="@if ($invoice) {{ $invoice->inv_number }} @endif" id="invoiceNumber" name="inv_number" readonly>

                            </div>
                        </div> 

                        <!-- Date -->
                        <div class="row mb-3">
                            <div class="col-2 d-flex align-items-center justify-content-center">
                                <label class="form-label text-center">
                                    <i class="fas fa-calendar-alt"></i>
                                </label>
                            </div>
                            
                        <div class="col-10">
                                <input type="date" class="custom-input" id="dateInput" value="@if ($invoice) {{ $invoice->date}} @endif" name="date">
                            </div>

                        </div>
                        
                
                        <!-- Due Date -->
                        <div class="row mb-3">
                            <div class="col-2 d-flex align-items-center justify-content-center">
                                <label class="form-label"><i class="far fa-clock"></i></label>
                            </div>
                            <div class="col-10">
                                <input type="text" class="custom-input editable" value="@if ($poItem) {{$poItem->ponumber}} @endif" placeholder="Purchase Oder" name="purchase_order">
                            </div>
                        </div>
                
            
                        <!-- Address -->
                        <div class="row mb-3">
                            <div class="col-2 d-flex align-items-center justify-content-center">
                                <label class="form-label"><i class="fas fa-map-marker-alt"></i></label>
                            </div>
                            <input type="hidden" value="@if ($poItem) {{$poItem->job_id}} @endif" name="job_id">
                            <div class="col-10">
                                <input type="text" class="custom-input editable"  value="{{$jobs->address}}" name="address" readonly>
                            </div>           
                        </div>
                                
                    
                
                        <!-- Description -->
                        <div class="row mb-3">
                            <div class="col-2 d-flex align-items-center justify-content-center">
                                <label class="form-label"><i class="fa-regular fa-bookmark"></i></label>
                            </div>
                            <div class="col-10">
                                <input type="text" class="custom-input editable" placeholder="Your description here" value="{{$poItem->description}}" name="description">
                            </div>
                        </div>

                        <!-- Attachment Field -->
                        <div class="row mb-3">
                            <div class="col-2 d-flex align-items-center justify-content-center">
                                <label class="form-label text-center">
                                    <i class="fas fa-paperclip"></i>
                                </label>
                            </div>
                                <div class="col-10">
                                <input type="file" class="form-control" id="attachmentInput" name="attachment">
                                @error('attachment')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                
                        <hr>

                        <!-- Total Due -->
                        <div class="row mb-3">

                            <div class="col-12">
                                <label class="form-label">Job Details:</label>
                            </div>
                            <div class="col-12">
                                <input type="text" class="custom-input editable @error('job_details') is-invalid @enderror" placeholder="Write Here" value="@if ($invoice) {{ $invoice->job_details}} @endif" name="job_details" required>

                                @error('job_details')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <hr/>

                        <div class="row mb-3">
                        <!-- Amount Input -->
                        <div class="col-6">
                            <label class="form-label">Amount:</label>
                        </div>
                        <div class="col-6">
                            <div class="input-group">
                                <span class="input-group-text no-background"><i class="fas fa-dollar-sign"></i></span>
                                <input type="text" id="amountInput" class="custom-input form-control text-right editable" name="amount" value=" @if ($invoice) {{ $invoice->amount}} @else  {{$poItem->price}} @endif" placeholder="Enter Amount">
                            </div>
                        </div>

                            <!-- GST Input -->
                            <div class="col-6">
                                <label class="form-label">GST :</label>
                            </div>
                            <div class="col-6">
                                <div class="input-group">
                                    <span class="input-group-text no-background"><i class="fas fa-dollar-sign"></i></span>
                                    <input type="text" id="gstInput" class="custom-input form-control text-right editable" value="@if ($invoice) {{ $invoice->gst}} @else  {{ $poItem->price * 0.10 }} @endif " name="gst" readonly>
                                </div>
                            </div>
                        </div>

                        <hr/>
                        <!-- Total Due Input -->
                        <div class="row mb-3">
                            <div class="col-6">
                                <label class="form-label">Total Due:</label>
                            </div>
                            <div class="col-6">
                                <div class="input-group">
                                    <span class="input-group-text no-background"><i class="fas fa-dollar-sign"></i></span>
                                    <input type="text" id="totalDueInput" class="custom-input form-control text-right editable" value="@if ($invoice) {{ $invoice->total_due }} @else {{($poItem->price)+( $poItem->price * 0.10) }} @endif " name="total_due" readonly>
                                </div>
                            </div>
                        </div>  
                                

                        @if ($invoice)
                            <input type="text" name="status" value="@if ($invoice) {{ $invoice->status }} @else {{ $invoice->status !== null ? $invoice->status : 1 }} @endif " class="form-control @error('status') is-invalid @enderror" hidden>
                        @else
                            <input type="text" name="status" value="1" class="form-control @error('status') is-invalid @enderror" hidden>
                        @endif

                            <div class="col-12">
                            @if($invoice && $invoice->status == 2)
                            <div class="alert alert-warning">
                                    <p> Click Here if you were paid less then this total </p>
                                {{-- <p class="text-center">Email Has Already Been Sent to Customer.</p> --}}
                            </div>
                            @elseif($invoice && $invoice->status == 1 && $invoice->status !== 3)
                            <button type="submit"  name="action" class="btn btn-primary btn-block btnshow" value="send"> Send Invoice</button>
                            @elseif(!$invoice)
                            <button type="submit"  name="action" class="btn btn-primary btn-block btnshow" value="send&save">Save and Send Invoice</button>
                            @endif                 
                            </div>
                    <div class="row mt-3">
                            <div class="col-4">
                                <button type="submit" name="action" class="btn btn-danger btn-block btnshow" value="delete" >Delete</button>
                            </div>
                            
                            @if($invoice && $invoice->status == 2 && $invoice->status !== 3)
                            <div class="col-4">
                                <button type="submit" name="action" class="btn btn-success btn-block btnshow" value="paid">Got Paid</button>
                            </div>
                            @endif

                            @if($invoice && $invoice->status !== null)
                        
                            <div class="col-4">
                                <button type="submit" name="action" class="btn btn-warning btn-block btnshow" value="update">Edit</button>
                            </div>
                            
                            @else 
                            <div class="col-4">
                                <button type="submit" name="action" class="btn btn-warning btn-block btnshow" value="save">Save</button>
                            </div>
                            @endif                    
                        </div>
                    </fieldset>
                    </form>
         

    </div>

  
    <div style="margin: 20px 0px 300px 0px;"></div>
</body>

<script>
 //for invoice Random Number
    var invoiceNumberInput = document.getElementById("invoiceNumber");
    var existingInvoiceId = invoiceNumberInput.value;
    if (!existingInvoiceId) {
    var randomNumber = Math.floor(Math.random() * 1000000) + 1;
    invoiceNumberInput.value = "INV- "+ randomNumber;
    }
    //Defult todays date..

 var dateInput = document.getElementById("dateInput");
    var currentDate = new Date();
    // Format the current date as YYYY-MM-DD
    var year = currentDate.getFullYear();
    var month = (currentDate.getMonth() + 1).toString().padStart(2, "0");
    var day = currentDate.getDate().toString().padStart(2, "0");
    var formattedDate = year + "-" + month + "-" + day;
    dateInput.value = formattedDate;


</script>


  <script src="{{ asset('js/script.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</html>