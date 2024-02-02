<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

      <meta name="csrf-token" content="{{ csrf_token() }}"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Customer</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style77.css') }}">
     <link rel="stylesheet" href="{{ asset('css/style8.css') }}">
</head>
<body>
    
 
  
		<header>
			<div class="header-row">
				<div class="header-item">
				 <a href="{{ url()->previous() }}"> <i class="fa-solid fa-arrow-left"></i> </a>	
					<span>  <h2>{{ isset($customer) ? 'Edit' : 'Create' }} Customer</h2>  </span>
					<a href="<?php echo '/main' ?>">   <img src="/image/logo-phone.png" alt="Logo"> </a>   
				</div>
			</div>
		</header>	

  

    <div class="container" >
         @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
   @if(session('go_back'))
    <script>
        setTimeout(function() {  
            window.location.href = '/customers';
        }, 1000);
    </script>
@endif



     
      <form id="customerForm" action="{{ route('customer.store') }}" method="POST">
        @csrf

        <fieldset class="m-3">
            <h3>Customer Information</h3>

            @if(isset($customer))
            <input type="hidden" name="id" value="{{ $customer->id }}">
            @endif

        
    
            <div class="mt-5 pt-5">
                <label for="companyName" class="form-label">Customer Company Name: <span class="text-danger " style="font-size: 1.2em">*</span></label>
                <input type="text" class="custom-input" id="companyName" required value=" {{ isset($customer) ? $customer->companyName : '' }}"  required name="companyName">
            </div>
    
            <div class="mt-3">
                <label for="name" class="form-label">Customer Name: <span class="text-danger " style="font-size: 1.2em">*</span> </label>
                <input type="text" class="custom-input" id="name" required  value="{{ isset($customer) ? $customer -> name : '' }} " required  name="name">
            </div>
    
            <div class="mt-3">
                <label for="email" class="form-label">Customer Email Address : <span class="text-danger " style="font-size: 1.2em">*</span></label>
                <input type="email" class="custom-input" id="email" required  value=" {{ isset($customer) ? $customer -> email : '' }} " required name="email">
            </div>
    
            <div class=" mt-3">
                <label for="mobile" class="form-label">Mobile Number:<span class="text-danger " style="font-size: 1.2em">*</span> </label>
                <input type="text" class="custom-input" id="mobile"   value=" {{ isset($customer) ? $customer -> mobile : ' ' }}" required name="mobile">
            </div>
    
         
            <div class="mt-3">
                <label for="abn" class="form-label">ABN: <span class="text-danger " style="font-size: 1.2em">*</span> </label>
                <input type="text" class="custom-input" id="abn"  value=" {{ isset($customer) ? $customer -> abn : ' ' }} " required name="abn">
            </div>
    
            <div class="mt-3">
                <label for="billingAddress" class="form-label">Address: <span class="text-danger " style="font-size: 1.2em">*</span></label>
                <input type="text" class="custom-input" id="billingAddress"  value=" {{ isset($customer) ? $customer -> billingAddress : '' }} "     name="billingAddress" required>
            </div>

            <div class=" mt-3">
                <label for="billingAddress" class="form-label">Gate Code:</label>
                <input type="text" class="custom-input" id="gst"  value=" {{ isset($customer) ? $customer -> gst : '' }} "   name="gst">
            </div>

        <div class="mt-3">
            <label for="schedule" class="form-label">Payment Schedule:</label>
            <select class="custom-input" id="schedule" name="schedule">

                <option value="5" {{ isset($customer) && $customer->schedule == '5' ? 'selected' : '' }}>5 days</option>
                <option value="7" {{ isset($customer) && $customer->schedule == '7' ? 'selected' : '' }}>1 week</option>
                <option value="14" {{ isset($customer) && $customer->schedule == '14' ? 'selected' : '' }}>2 weeks</option>
                 <option value="14" {{ isset($customer) && $customer->schedule == '21' ? 'selected' : '' }}>3 weeks</option>
                  <option value="14" {{ isset($customer) && $customer->schedule == '30' ? 'selected' : '' }}>1 Month</option>

                <!-- Add more options as needed -->
            </select>
        </div>
            <input type="hidden" name="action" id="formAction" value="save">

    
     
            @if(isset($customer))
                <div class="d-flex mt-5 justify-content-center">
                <button type="submit" class="btn btn-success w-50" name="action" value="update"> Update</button>
                </div>
            @else
             <div class="d-flex mt-5 justify-content-center">
                <button type="submit" class="btn btn-primary w-50" name="action" value="save"> Submit</button>
            </div>
            @endif
         
    
          
        </fieldset>
    </form>
    
    </div>    
    <div style="margin: 20px 0px 200px 0px;"> 
    
    </div>       
    
</body>

    

<script src="scrpit.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>




</html>