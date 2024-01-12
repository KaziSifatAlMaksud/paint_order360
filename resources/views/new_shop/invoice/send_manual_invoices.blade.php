
@extends('layouts.app')



    @section('style')
     <style>
    .popup {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .close_btn{
        margin: 10px;
        
    }
    .popup-content {
        background: white;
        padding: 20px;
        border-radius: 5px;
    }
    </style>


    @endsection

@section('content')
    
    
		<header>
			<div class="header-row">
				<div class="header-item">
				 <a href="{{ route('invoice')}}"> <i class="fa-solid fa-arrow-left"></i> </a>
					<span> Send Invoice </span>
					<a href="<?php echo '/main' ?>">   <img src="/image/logo-phone.png" alt="Logo"> </a>   
				</div>
			</div>
		</header>	

    @include('layouts.partials.footer')  

    <div class="container">
        @if(session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
              @if(session('go_back'))
            <script>
                setTimeout(function() {
                    window.location.href = '/invoice/all?reload=true';
                 }, 1000);
            </script>
        @endif
        @endif
        <form action="{{ route('manual_invoice_store', ['id' => $invoice->id]) }}" method="POST" enctype="multipart/form-data">
             @csrf 
    <fieldset class="m-3">
               <div class="row mb-3 mt-2">
                    <div class="col-2 d-flex align-items-center justify-content-center">
                        <label class="form-label"> To : </label>
                    </div>
                    <div class="col-10">                     
                           <input name="customer_id" type="text" value="{{$invoice->customer_id}}" class="custom-input" readonly>
                    </div>                    
                </div>
                <div class="row mb-3 mt-2">
                    <div class="col-2 d-flex align-items-center justify-content-center">
                        <label class="form-label"> Email <span style="color:red;">*</span> : </label>
                    </div>
                    
                      
                  
                    <div class="col-10">                     
                           <input name="send_email" type="text" value="{{$invoice->send_email}}" class="custom-input" >
                    </div>                    
                </div>
            
                 <!-- Invoice Number -->
                   
                 <div class="row mb-3">
                    <div class="col-2 d-flex align-items-center justify-content-center">
                        <label class="form-label"><i class="fas fa-file-invoice"> </i> <span style="color:red;">*</span> </label>
                    </div>
                    <div class="col-10">
                     <input type="text" class="custom-input" value="@if ($invoice) {{ $invoice->inv_number }} @endif" id="invoiceNumber" name="inv_number" readonly>

                    </div>
                </div> 


                 <div class="row mb-3">
                    <div class="col-2 d-flex align-items-center justify-content-center">
                        <label class="form-label"><i class="fas fa-file-invoice"> </i> <span style="color:red;">*</span> </label>
                    </div>
                   <div class="col-10">
                        <input type="date" class="custom-input" id="dateInput" value="{{ $invoice ? $invoice->date : '' }}" name="date">
                   </div>
                </div> 

                <!-- Due Date -->
                <div class="row mb-3">
                    <div class="col-2 d-flex align-items-center justify-content-center">
                        <label class="form-label"><i class="far fa-clock"></i></label>
                    </div>
                    <div class="col-10">
                        <input type="text" class="custom-input editable" value="{{$invoice->purchase_order}}" placeholder="Purchase Oder" name="purchase_order">
                    </div>
                </div>
        
     
                <!-- Address -->
                <div class="row mb-3">
                    <div class="col-2 d-flex align-items-center justify-content-center">
                        <label class="form-label"><i class="fas fa-map-marker-alt"></i> <span style="color:red;">*</span> </label>
                    </div>
                    <input type="hidden" value="" name="job_id">
                    <div class="col-10">
                        <input type="text" class="custom-input editable"  value="{{$invoice->address}}" name="address" required>
                    </div>           
                </div>
                        
               
        
                <!-- Description -->
                <div class="row mb-3">
                    <div class="col-2 d-flex align-items-center justify-content-center">
                        <label class="form-label"><i class="fa-regular fa-bookmark"></i> <span style="color:red;">*</span> </label>
                    </div>
                    <div class="col-10">
                        <input type="text" class="custom-input editable" placeholder="Your description here" value="{{$invoice->description}}" name="description" required>
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
                        <input type="text" class="custom-input editable @error('job_details') is-invalid @enderror" value="{{$invoice->job_details}}" placeholder="Extra description (Optional)" name="job_details">

                        @error('job_details')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
    

             <div class="row mb-3">
            <!-- Amount Input -->
            <div class="col-6">
                <label class="form-label">Amount <span style="color:red;">*</span> :</label>
            </div>
            <div class="col-6">
                <div class="input-group">
                    <span class="input-group-text no-background"><i class="fas fa-dollar-sign"></i> </span>
                    <input type="text" id="amountInput" class="custom-input form-control text-right editable" name="amount" value="{{$invoice->amount}}" placeholder="Enter Amount">
                </div>
            </div>

            <!-- GST Input -->
            <div class="col-6">
                <label class="form-label">GST :</label>
            </div>
            <div class="col-6">
                <div class="input-group">
                    <span class="input-group-text no-background"><i class="fas fa-dollar-sign"></i></span>
                    <input type="text" id="gstInput" class="custom-input form-control text-right editable" value="{{ $invoice->gst }}" name="gst" readonly>
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
                    <input type="text" id="totalDueInput" class="custom-input form-control text-right editable" value="{{ $invoice->total_due }}" name="total_due" readonly>
                </div>
            </div>
        </div>          
                
        <!-- Status filde -->
        @if ($invoice)
            <input type="text" name="status" value="{{ $invoice->status !== null ? $invoice->status : 1 }}" class="form-control @error('status') is-invalid @enderror" hidden>
        @else
            <input type="text" name="status" value="1" class="form-control @error('status') is-invalid @enderror" hidden>
        @endif

         <div class="col-12">
            @if($invoice && $invoice->status == 2)
             <div class="alert alert-warning">
                <p class="text-center">Email Has Already Been Sent to Customer.</p>
             </div>
            @elseif($invoice && $invoice->status == 1 && $invoice->status !== 3)
             <button type="submit"  name="action" class="btn btn-primary btn-block btnshow" value="send"> Send Invoice</button>
            @elseif($invoice && $invoice->status != 3)
             <button type="submit"  name="action" class="btn btn-primary btn-block btnshow" value="send&save">Save and Send Invoice</button>
            @endif
                       
                    </div>
                <div class="row mt-3">
                    <div class="col-4">
                        <button type="submit" name="action" class="btn btn-danger btn-block btnshow" id="deleteButton" value="delete" >Delete</button>
                    </div>
                    
                    
                     <div class="col-4">
                         @if($invoice && $invoice->status == 2 && $invoice->status !== 3)
                        <button type="submit" name="action" class="btn btn-success btn-block btnshow" value="paid">Got Paid</button>
                        @endif
                    </div>
               

                    
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
   
     
       
    
   @endsection
  @section('js')
<script>

   document.getElementById('deleteButton').addEventListener('click', function(event) {
        // Show a confirmation dialog
        var confirmDeletion = confirm('Are you sure you want to delete this invoice?');
        if (!confirmDeletion) {
            event.preventDefault();
        }
    });
    var dateInput = document.getElementById("dateInput");
    if (!dateInput.value) {
        var currentDate = new Date();
        // Format the current date as YYYY-MM-DD
        var year = currentDate.getFullYear();
        var month = (currentDate.getMonth() + 1).toString().padStart(2, "0");
        var day = currentDate.getDate().toString().padStart(2, "0");
        var formattedDate = year + "-" + month + "-" + day;
        dateInput.value = formattedDate;
    }

</script>


  <script src="{{ asset('js/script.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    @endsection