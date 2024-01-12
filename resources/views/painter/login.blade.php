<?php
require  public_path().'/painter/header.php';

?>
<!-- Page Content -->
<div class="main_wrap main_login">
<div id="page-content-wrapper">
    <div class="container-fluid-main">
        <div class="row">
            <div class="col-lg-12">
                <div class="topbar">
                    <h2 class=""><img src="image/logo.png"></h2>
                    <p class="color-gray">Please login in your painter account</p>
                </div>
                <div class="mt2">
                    <div class="row">
                        <form method ="post">
                            @csrf
                             <div class="form-group">
                                <label class="label">Email</label>
                                <input type="email" class="form-control" name="email" required placeholder="Enter You E-mail">
                            </div>
                             <div class="form-group">
                                <label class="label">Password</label>
                                <input type="password" class="form-control" name="password" required placeholder="Enter Your Password">
                            </div>
                            
                            <div class="form-group">
                                <label class="label">Remember me</label>
                                <input type="checkbox" class="login_remember" name="remember">
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Login" name="login_user" class="btn btn-info">
                                <div class="pull-right"><a href="<?php echo PUBLIC_PATH.'/signup';?>">Create a new account.</a></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- /#page-content-wrapper -->
<?php
require  public_path().'/painter/footer.php';
?>