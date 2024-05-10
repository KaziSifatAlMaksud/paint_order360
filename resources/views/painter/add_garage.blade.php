<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Garage Paint Inventory  | Orderr360</title>
     <link rel="icon" href="{{ asset('image/favicon.png') }}" />
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
					<span>  <h4>{{ isset($customer) ? 'Edit' : 'Add' }}  Inventory </h4> </span>
					<a href="<?php echo '/main' ?>">   <img src="/image/logo-phone.png" alt="Logo"> </a>   
				</div>
			</div>
		</header>	
    @include('layouts.partials.footer')  
  


    <div class="container" >
   
        
        <div class="newInvoice-bar ">
            <a href="<?php echo '/new_order' ?>" class="newInvoice-link" id="newInvoice-link">Add New Paint colour <i class="fa-solid fa-plus ml-3"></i></a>
        </div>


         @if(session('success'))
            <div class="alert alert-success mt-2">
                {{ session('success') }}
            </div>
        @endif
      


 
        @foreach ($garagePaints as $garagePaint)
          <!-- Card Content -->
            <div  class="card" style="padding: 10px;">       
                <div class="row">
                    <div class="col-5">
                        <p> <b>{{$garagePaint->product}} </b></p>
                        <p> Color: {{$garagePaint->color}} </p>
                    </div>
                    <div class="col-7">
                         <p class=" text-right w-100" style="padding-right: 15px;"> <b>Size:</b> {{$garagePaint->size}}L  *  <b>Quantity:</b> {{$garagePaint->quantity}} </p>
                        <div class="row">
                            <div class="col-6">
                           <button class="btn btn-warning btn-block btnshow" onclick="window.location='{{ route('new_oder.edit', $garagePaint->id) }}'">Edit</button>
                            </div>
                            <div class="col-6">
                            <form id="deleteForm" action="{{ route('garage-paints.destroy', $garagePaint->id) }}" method="post">
                                @csrf
                                @method('delete')
                                   <button type="button" class="btn btn-danger btn-block btnshow" onclick="confirmDelete()">Delete</button>
                                </form>
                              
                            </div>
                        </div>
                    </div>
                </div>                       
            </div>
             @endforeach
            <!-- End Card Section -->  
    
    </div>    
     <div style="margin: 20px 0px 300px 0px;"></div>
    
    </div>       
    
</body>

<script>
    function confirmDelete() {
        if (window.confirm("Are you sure you want to delete this garage paint?")) {
            document.getElementById('deleteForm').submit();
        } else {
            return false; // Prevent form submission if the user clicks "Cancel"
        }
    }
</script>

<script src="scrpit.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</html>