@extends('layouts.app')

@section('content')

	<header>
			<div class="header-row">
				<div class="header-item">
				 <a href="#">  </a>	
					<span> Profile </span>
					<a href="<?php echo '/main' ?>">   <img src="/image/logo-phone.png" alt="Logo"> </a>   
				</div>
			</div>
	</header>	

{{-- @include('layouts.partials.language') --}}


    @include('layouts.partials.footer')  
  


<div class="container">

 <section class="docs_area">
    <a href="<?php echo '/edit_profile' ?>">  
    <div class="docs_part docs_prt1">
        <div class="docs_left ">
            <h4> <b>Edit Profile </b> </h4>
            <p>change your <br> personal details</p>
        </div>
        <div class="docs_right">
            <img src="image/icon1/icon-5.png" alt="">
        </div>
    </div>
    </a>

    <a href="<?php echo '/paint_Acount ' ?>">  
        <div class="docs_part docs_prt1">
            <div class="docs_left ">
                <h4> <b>Paint Accounts </b></h4>
                <p>Change or add your paint <br> account details</p>
            </div>
            <div class="docs_right">
                <img src="image/icon1/icon-6.png" alt="">
            </div>
        </div>
    </a>
    <a href="<?php echo '/subcontractors' ?>"> 
    <div class="docs_part docs_prt1">
        {{-- <div class="docs_left docs_cnt3"> --}}
            <div class="docs_left ">
            <h4> <b> Add Subcontractors </b> </h4>
            <p>Conect this app to others <br> painters you will use as <br>subcontrators</p>
        </div>
        <div class="docs_right">
            <img src="image/icon1/icon-7.png" alt="">
        </div>
    </div>
    </a>
    <a href="<?php echo '/customers' ?>">  
    <div class="docs_part docs_prt1">
         {{-- <div class="docs_left docs_cnt3"> --}}
        <div class="docs_left">
            <h4> <b> Add your Customers </b> </h4>
            <p>Connect this app to <br> others boss that you get <br> work from</p>
        </div>
        <div class="docs_right">
            <img src="image/icon1/icon-8.png" alt="">
        </div>
    </div>
    </a>
</section>
<!-- docs_area end -->
<div class="d-flex justify-content-center">
    <a href="/logout" class="btn btn-danger">
        <i class="fas fa-sign-out-alt"></i> Logout
    </a>
</div>



</div>
<div style="margin: 20px 0px 300px 0px;"></div>

@endsection
    @section('js')


    <script src="{{ asset('js/script.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    
    
    @endsection