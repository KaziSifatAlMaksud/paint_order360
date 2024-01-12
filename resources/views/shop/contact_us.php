<?php
require  public_path().'/s_shop/header.blade.php';
?>
  <!-- Page Content -->
<div class="page-header">
    <h1 class="page-title">
        Contact Us
    </h1>
    <div class="pull-right">
        <!-- <a href="<?php //echo $this->webroot.'admin/Admins/add' ?>" class="btn btn-primary" >Add New Painter</a> -->
    </div>
    <br />

</div>
<div class="panel">
    <div class="panel-body container-fluid">
        <div class="row row-lg">
            <div class="col-md-12">
                <!-- Example Basic -->
                <div class="example-wrap">
                    <div class="example table-responsive">
                         <div class="  text-center p-absolute-center" >
                                <!-- <i class="fa fa-phone fa-4x" style="color: #f57c1f;" aria-hidden="true"></i> -->
                                <h1 class=" mt-20">Contact Details</h1>
                                <p> <i class="fa fa-envelope " style="color: #f57c1f;" aria-hidden="true"></i> <?php echo $data->contact_email;?> </p>
                                <p> <i class="fa fa-phone " style="color: #f57c1f;" aria-hidden="true"></i> <?php echo $data->phone;?></p>
                                <p> <i class="fa fa-address-card" style="color: #f57c1f;" aria-hidden="true"></i> <?php echo $data->address;?></p>
                                <p></p>
                                <p class="color-gray">Please contact with us, if you have any query.</p>
                                    <form class="" method="post">
                                        <div class="input-field col-md-offset-3  col-md-6  ">
                                            <input id="subject" type="text" name="subject" required class=" mt-20 form-control" placeholder="Please Enter Subject"> 
                                            <textarea name="message" class="mt-20 form-control" rows="5" reuired placeholder="Enter Your Message."></textarea>
                                            <button type="submit" class="btn btn-info large ronded">Send</button>
                                        </div> 
                                </form>
                            </div>
                    </div>
                </div>
               
            </div>
        </div>
    </div>
</div>
       
<?php
require  public_path().'/s_shop/footer.blade.php';
?>