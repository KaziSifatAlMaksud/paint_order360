
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit Builder | Orderr360</title>
     <link rel="icon" href="{{ asset('image/favicon.png') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style77.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style8.css') }}">
</head>

<?php
require  public_path().'/painter/header.php';

?>
  
		<header>
			<div class="header-row">
				<div class="header-item">
				 <a href="<?php echo '/main' ?>"> <i class="fa-solid fa-arrow-left"></i> </a>	
					<span> Edit Accounts </span>
					<a href="<?php echo '/profile' ?>">   <img src="/image/logo-phone.png" alt="Logo"> </a>   
				</div>
			</div>
		</header>	

        @include('layouts.partials.footer') 

        <div id="page-content-wrapper">
            <div class="container-fluid edit-detail">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="topbar">
                    
                          <center>   <p class="color-gray align-center">Here you can edit the information of Account number, paint brand & the builder its coneccted to.</p> </center>
                        </div>
                        <div class="bottombar mt-70">
                            <!-- Left-aligned -->
                            <div class="media">
                                <form class="col-12" method="post" enctype="multipart/form-data">
                                    @csrf
                                 <div class="media-left">
                                   
                                </div>
                                <div class="media-body">
                                    <div class="mb-0">
                                            <div class="row">
                                                <div class="input-field col s10">
                                                    <input id="name" required  name="name" value="<?php echo $builder->name;?>" type="text" class="validate">
                                                    <label for="name">Builder Name</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="input-field col-12">
                                                     <input id="account_no" required  name="account_no" value="<?php echo $builder->account_no;?>" type="text" class="validate">
                                                    <label for="account_no">Account No.</label>
                                                </div>
                                                <div class="input-field col-12">
                                                     <input id="brand" required  name="brand" value="<?php echo $builder->brand;?>" type="text" class="validate">
                                                    <label for="brand">Account No.</label>
                                                </div>
                                                
                                                <div class="input-field col-12">
                                               <button type="sumbit" class="btn-orange large btn w-100">Update</button>
                                                </div>
                                                
                                            </div>
                                            
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->
        <script src="{{ asset('js/script.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>


<?php
require  public_path().'/painter/footer.php';
?>