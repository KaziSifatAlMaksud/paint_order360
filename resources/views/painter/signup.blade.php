<?php
require  public_path().'/painter/header.php';

//print_r($data);

?>
<!-- Page Content -->
<div class="main_wrap">
<div id="page-content-wrapper">
    <div class="container-fluid-main">
        <div class="row">
            <div class="col-lg-12">
                <div class="topbar">
                    <h2 class=""><img src="image/logo.png"></h2>
                    <p class="color-gray">Create your account.</p>
                </div>
                <div class="mt2">
                    <div class="row">
                        <form method ="post" id="signup-from">
                            @csrf
                            <div class="form-group">
                                    <label class="label">First Name</label>
                                    <input type="text" name="first_name" value="<?php echo @$data['first_name'];?>" required placeholder="First Name">
                            </div>
                            <div class="form-group">
                                <label class="label">Last Name</label>
                                <input type="text" name="last_name" required placeholder="Please Enter Your Last Name">
                            </div>
                            <div class="form-group">
                                <label class="label">Company Name</label>
                                <input type="text" name="company_name" required placeholder="Please Enter Your Company Name">
                            </div>
                              <div class="form-group">
                                <label class="label">Account Number</label>
                                <input type="text" name="account_no" required placeholder="Please Enter Your Account Number">
                            </div>
                             <div class="form-group">
                                <label class="label">Email</label>
                                <input type="email" class="form-control" name="email" required placeholder=" Please Enter Your E-mail">
                            </div>
                             <div class="form-group">
                                <label class="label">Password</label>
                                <input type="password" class="form-control" name="password" id="password" required placeholder="Please Enter Your Password">
                            </div>
                              <div class="form-group">
                                <label class="label">Confirm Password</label>
                                <input type="password" class="form-control" name="cpassword" id="cpassword"  required placeholder="Please Confirm Your Password">
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Signup" name="signup_user" class="btn btn-info">
                                <div class="pull-right"><a href="<?php echo PUBLIC_PATH.'/login';?>">Click here to login.</a></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div></div>
<!-- /#page-content-wrapper -->
<?php
require  public_path().'/painter/footer.php';
?>