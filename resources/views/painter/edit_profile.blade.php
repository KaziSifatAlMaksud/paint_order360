<?php
require  public_path() . '/painter/header.php';
?>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('css/style77.css') }}">
<link rel="stylesheet" href="{{ asset('css/style8.css') }}">

<style>
    #wrapper .toggled {
    padding-left: 0px !important;
}

</style>

	<header>
			<div class="header-row">
				<div class="header-item">
				 <a href="{{ url()->previous() }}"> <i class="fa-solid fa-arrow-left"></i> </a>	
					<span> Detalis Info </span>
					<a href="<?php echo '/main' ?>">   <img src="/image/logo-phone.png" alt="Logo"> </a>   
				</div>
			</div>
		</header>	
<!-- Page Content -->
    
    <div class="container-fluid edit-detail">
        <div class="row">
            <div class="col-lg-12">
                <div class="topbar pt-5" style="margin-top:90px;">
                    <h1>Update your Detalis Page</h1>
                    <p class="color-gray">Here you can update your presonal detalis.</p>
                        </div>    
                    <div class="bottombar mt-70">
                        <!-- Left-aligned -->
                        <div>
                            <form class="col s12" method="post" enctype="multipart/form-data">
                                @csrf
                                <div>
                                    <label for="file-input">
                                        <h4>Click here to upload your photo</h4>
                                        <center class="b-shadow big-profile" id="profile_img_bg" style="background-image: url( <?php echo ($user->photo != '') ? PUBLIC_PATH . '/uploads/' . $user->photo : 'image/no_img.png' ?>);"></center>
                                    </label>
                                    <input type="file" style="display:none" accept="image/*" class="select" id="file-input" name="user_image">
                                </div>
                                <div >
                                    <div class="mt-5">
                                        <div class="row">
                                            <div class="input-field col-12">
                                                <input id="first_name" name="first_name" type="text" value="<?php echo $user->first_name; ?>" class="validate">
                                                <label for="first_name">First Name</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col-12">
                                                <input id="last_name" name="last_name" type="text" value="<?php echo $user->last_name; ?>" class="validate">
                                                <label for="last_name">Last Name</label>
                                            </div>
                                        </div>
                        
                                        <div class="row">
                                            <div class="input-field col-12">
                                                <div class="input-search">
                                                    <label for="textarea1">Home Address to deliver paint</label>
                                                    <input type="text" class="form-control" name="address" placeholder="Location..." id="autocomplete" onFocus="geolocate()" required value="<?php echo !empty($user->address) ? $user->address : ''; ?>">
                                                    <input type="hidden" name="latitude" id="latitude" value="<?php echo !empty($user->latitude) ? $user->latitude : ''; ?>">
                                                    <input type="hidden" name="longitude" id="longitude" value="<?php echo !empty($user->longitude) ? $user->longitude : ''; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                                <div class="input-field col-12">
                                                    <label   for="icon_telephone">Phone Number</label>
                                                    <input id="icon_telephone" name="phone" value="<?php echo $user->phone; ?>" type="tel" class="validate">
                                                   
                                                </div>
                                               
                                        </div>
                                        <div class="row">
                                                 <div class="input-field col-12">
                                                    <input id="email" type="email"  name="email" value="<?php echo $user->email; ?>" class="validate">
                                                    <label for="email" data-error="wrong" data-success="right">Email</label>
                                                </div>
                                        </div>
                                        <div class="row">
                                                                                             
                                                 <div class="input-field col-12">
                                                    <input id="company_name" name="company_name" type="text" value="<?php echo $user->company_name; ?>">
                                                    <label for="company_name">Company Name</label>
                                                </div>
                                        </div>
                                        
                                        <div class="row">
                                                 
                                                 <div class="input-field col-12">
                                                    <input id="abn" name="abn" type="text" value="<?php echo $user->abn; ?>">
                                                    <label for="abn">ABN</label>
                                                </div>
                                        </div>

                                           
                                               
                                          <div style="text-align: center;">
                                            <button type="submit" class="btn-success btn w-50">Update</button>
                                          </div>

                                    </div>    
                            </form>
                             <div style="margin: 20px 0px 200px 0px;"> 
                        </div>
                    </div>
                </div>
            </div>

             
        </div>
    </div>
</div>
<!-- /#page-content-wrapper -->
<?php
require  public_path() . '/painter/footer.php';
?>



