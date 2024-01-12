<?php
require  public_path() . '/painter/header.php';
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('css/style77.css') }}">
<link rel="stylesheet" href="{{ asset('css/style8.css') }}">



	<header>
			<div class="header-row">
				<div class="header-item">
				 <a href="{{ url()->previous() }}"> <i class="fa-solid fa-arrow-left"></i> </a>	
					<span> Your Details </span>
					<a href="<?php echo '/main' ?>">   <img src="/image/logo-phone.png" alt="Logo"> </a>   
				</div>
			</div>
		</header>	
<!-- Page Content -->
<div id="page-content-wrapper" style="margin-top: 90px;">
  
    <div class="container-fluid edit-detail">
        <div class="row">
            <div class="col-lg-12">
                <center class="topbar">
                    <h2>Add New Paint Acount</h2>
                    <p class="color-gray">Here you can add new Paint Acounts and Builder name.</p>
                </center>
                <div class="bottombar mt-70">
                    <!-- Left-aligned -->
                    <center class="media">
                        <form class="col s12" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="media-left">
                            </div>
                            <div class="media-body">
                                <div class="mb-0">
                                    <div class="row">
                                        <div class="input-field col s10">
                                            <input id="name" required name="name" type="text" class="validate">
                                            <label for="name">Builder Name</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col col-12">
                                            <input id="account_no" required name="account_no" type="text" class="validate">
                                            <label for="account_no">Paint Account No.</label>
                                        </div>
                                        <div class="input-field col col-12">
                                            <input id="brand" required name="brand" type="text" class="validate">
                                            <label for="brand">Paint Brand</label>
                                        </div>
                                        <div class="input-field col s10">
                                            <button type="sumbit" class="btn-orange large btn w-100">Save</button>
                                        </div>
                                    </div>
                        </form>
                    </center>
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