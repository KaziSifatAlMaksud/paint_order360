<?php
require  public_path().'/admin/header.blade.php';
?>

<div class="page-header">
    <h1 class="page-title">
       Settings
    </h1>
    <br />
    <div class="row">
        <div class="col-sm-9">
           <form method="post" id="add_shop">
                <div class="row">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Contact Email: </label>
                        <div class="col-sm-9">
                          <input type="text" required name="contact_email" value="<?php echo $user->contact_email;?>" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Contact Phone: </label>
                        <div class="col-sm-9">
                          <input type="text" required name="phone" value="<?php echo $user->phone;?>" class="form-control">
                        </div>
                    </div>
                </div>
               
                <div class="row">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Address: </label>
                        <div class="col-sm-9">
                            <div class="">
                                <input type="text" class="form-control" name="address" placeholder="Address..." id="autocomplete" onFocus="geolocate()" required value="<?php echo $user->address;?>">
                                <input type="hidden"  name="latitude"  id="latitude"  value="">
                                <input type="hidden"  name="longitude" id="longitude" value="">
                            </div>
                        </div>
                    </div>
                </div>
               
                <div class="row">
                    <div class="form-group">
                        <div class="col-sm-9 col-sm-offset-3 text-center "><br>
                            <button type="submit" class=" btn btn-primary">Update </button>
                        </div>
                    </div>
                 </div>
                </form>
        </div>
    </div>
</div>

<?php
require  public_path().'/admin/footer.blade.php';
?>