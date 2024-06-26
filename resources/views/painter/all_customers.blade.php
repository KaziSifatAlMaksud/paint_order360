
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All customers | Orderr360</title>
     <link rel="icon" href="{{ asset('image/favicon.png') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style77.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style8.css') }}">
    <style>
        /* CSS for larger screens */
    .table {
    width: 100%;
 
    }

        @media screen and (max-width: 600px) {
    .responsive-table {
        /* Adjustments for smaller screens */
        font-size: smaller;
        margin: 5px;
        }
    }

    </style>
</head>
<body> 
  



		<header>
			<div class="header-row">
				<div class="header-item">
				 <a href="<?php echo '/profile' ?>"> <i class="fa-solid fa-arrow-left"></i> </a>	
					<span> Customers </span>
					<a href="<?php echo '/main' ?>">   <img src="/image/logo-phone.png" alt="Logo"> </a>   
				</div>
			</div>
		</header>	

        @include('layouts.partials.footer')  
       <div class="container" >
   
        <div class="newInvoice-bar">
            <a href="<?php echo '/customer/create' ?>" class="newInvoice-link" id="newInvoice-link" >Add New Customer <i class="fa-solid fa-plus ml-3"></i></a>
        </div>

         @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
  
        <table class="table responsive-table">
        <thead>
            <tr>
            <th scope="col" colspan="4"> All Customers</th>
            
            </tr>
             <tr>
            {{-- <th scope="col">id</th> --}}
            <th scope="col">Com. Name</th>
             <th scope="col">Name</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>  
                      
            </tr>
        </thead>
        <tbody>
            @foreach($customers as $customer)
          <tr>
                {{-- <th scope="row">1</th> --}}
                <td>{{$customer->companyName}}</td>
                <td>{{$customer->name}}</td>
                
                <td> 
                    <a href="{{ route('customer.update', ['id' => $customer->id]) }}">                  
                        <i class="fa-solid fa-pen-to-square"></i>  
                    </a>      
                </td>           
                <td>     
                    <a href="{{ route('customer.delete', ['id' => $customer->id]) }}" onclick="confirmAndSubmit()">            
                        <i class="fa-solid fa-trash" style="color: #ff0000;"></i>
                    </a>
                </td>
             
            </tr> 
            @endforeach
        </tbody>
        </table>
        </div>

  <div style="margin: 20px 0px 300px 0px;"></div>

<script>
    function confirmAndSubmit() {
        var confirmation = confirm("Do you really want to delete this Customers?");
        if (confirmation) {
            document.getElementById('deleteJobForm').submit();
        }
    }
</script>
<script src="{{ asset('js/script.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>


</html>
