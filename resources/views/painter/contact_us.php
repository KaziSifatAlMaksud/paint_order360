<?php
require  public_path() . '/painter/header.php';
require  public_path() . '/painter/sidebar-2.php';
$Painter_user = Session::get('Painter_user');
?>
<!-- Page Content -->
<div id="page-content-wrapper">
    <div class="header-hide">
        <span class="hamb-top"></span>
        <span class="hamb-middle"></span>
        <span class="hamb-bottom"></span>
        </button>
        <div class="container-fluid-main">
            <h2>Contact Us</h2>
        </div>
    </div>
    <div class="container-fluid tell-friend">
        <div class="row">
            <div class="col-lg-12">
                <div class="bottombar">
                    <div class="text-center p-absolute-center" style="min-height:550px;">
                        <!-- <i class="fa fa-phone fa-4x" style="color: #f57c1f;" aria-hidden="true"></i> -->
                        <h1 class=" mt-20">Contact Details</h1>
                        <p> <i class="fa fa-envelope " style="color: #f57c1f;" aria-hidden="true"></i> <?php echo $data->email; ?> </p>
                        <p> <i class="fa fa-phone " style="color: #f57c1f;" aria-hidden="true"></i> <?php echo $data->phone; ?></p>
                        <p> <i class="fa fa-address-card" style="color: #f57c1f;" aria-hidden="true"></i> <?php echo $data->address; ?></p>
                        <p></p>
                        <p class="color-gray">Please contact with us, if you have any query.</p>
                        <form class="" method="post">
                            <div class="input-field">
                                <!-- <i class="fa fa-envelope prefix" aria-hidden="true"></i>  -->
                                <input id="subject" type="text" name="subject" required class="" placeholder="Please Enter Subject">
                                <textarea name="message" class="validate form-control" rows="5" reuired placeholder="Enter Your Message."></textarea>
                            </div>
                            <!--   <div class="input-field">
                                                <textarea name="message" class="validate form-control" rows="5" reuired placeholder="Enter Your Message."></textarea>
                                            </div> -->
                            <button type="submit" class="btn btn-orange large ronded">Send</button>
                        </form>
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