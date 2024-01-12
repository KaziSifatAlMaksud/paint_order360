<?php
require  public_path() . '/painter/header.php';
require  public_path() . '/painter/sidebar.php';

?>
<!-- Page Content -->
<div id="page-content-wrapper">
    <div class="header-hide">
        
            <span class="hamb-top"></span>
            <span class="hamb-middle"></span>
            <span class="hamb-bottom"></span>
        </button>
        <div class="container-fluid-main">
                <div class="div">
                    <a href="<?php echo PUBLIC_PATH.'/my_jobsss'?>">
                         <img src="{{ asset('/image/logo.png') }}">
                    </a>
                </div>
        <h2 class="media-heading">HI, <?php echo $user->company_name;?> </h2>
        </div>
    </div>

    
 <!--   <div class="container-fluid detail">
        <div class="row">
            <div class="col-lg-12">
                <div class="topbar">  -->

                <div class="row card "  style="display: flex; justify-content: space-between;margin-top:20px;margin-left:15px;margin-right:15px !important;border-radius:15px;font-size:17px">
                <div class="col-6" style="margin:20px">
                    <h3>Your Profile Details Page</h3>
                    <p class="color-gray">Here you can update your presonal detalis, Please use your correct home address, that is where we will deliver to.</p>
                    <div class="media-left">
                                    <label for="file-input">
                                        <h4>...............................................</h4>
                                        <div class="b-shadow big-profile" id="profile_img_bg" style="background-image: url( <?php echo ($user->photo !='') ? PUBLIC_PATH.'/uploads/'.$user->photo : 'image/no_img.png'?>);"></div>
                                    </label>
                                    <input type="file" style="display:none" accept="image/*" class="select" id="file-input"  name="user_image">
                                </div>
                  <!--  <img src="{{ asset('/uploads/'.Auth::user()->photo) }}">  -->
                    <!-- Left-aligned -->
                    <div class="media">
                        <div class="media-left">
                            <div class="profile" style="background-image: url( <?php echo ($user->photo != '') ? PUBLIC_PATH . '/uploads/' . $user->photo : 'image/no_img.png'; ?>);"></div>

                        </div>
                        <div class="media-body">
                           <!-- <a class="btn btn-orange outer rounded pull-right" href="<?php echo PUBLIC_PATH . '/edit_profile' ?>">Edit you Details</a>  -->
                            <p class="media-heading">Name : <?php echo $user->first_name . ' ' . $user->last_name; ?></p>
                            <ul class="list-unstyled">
                            <li class="">Address :  <?php echo $user->address; ?></li>
                             <li class="">Phone :  <?php echo $user->phone; ?></li>
                              <li class="">Email :  <?php echo $user->email; ?></li>
                              <br>
                              <li class="">Company : <?php echo $user->company_name; ?></li>
                              <li class="">ABN : <?php echo $user->abn_number; ?></li>
                            </ul>
                            <a class="btn btn-green outer rounded pull-right" href="<?php echo PUBLIC_PATH.'/edit_profile'?>">Edit your Details</a>

                            <style>
      /* Set the style of the line */
      hr {
        border: none;
        border-top: 1px solid gray;
        /* adjust the thickness and color of the line here */
      }
    </style>
  </head>

                              
    <!-- Insert the line into the HTML document -->
   
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /#page-content-wrapper -->
<?php
require  public_path() . '/painter/footer.php';
?>