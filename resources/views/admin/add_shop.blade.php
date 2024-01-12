<?php
require  public_path().'/admin/header.blade.php';
?>

<div class="page-header">
    <h1 class="page-title">
        Add New Shop
    </h1>
    <br />
    <div class="row">
        <div class="col-sm-9">
            <form method="post" id="add_shop">
                @csrf
                <div class="row">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Shop Name: </label>
                        <div class="col-sm-9">
                          <input type="text" required name="name" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Shop Email: </label>
                        <div class="col-sm-9">
                          <input type="email" required name="email" class="form-control">
                        </div>
                    </div>
                 </div>
                <div class="row">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Owner Name: </label>
                        <div class="col-sm-9">
                          <input type="text" required name="owner_name" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Shop Phone No.: </label>
                        <div class="col-sm-9">
                          <input type="text" pattern= "[0-9]+" title="Numbers only" required name="phone" class="form-control">
                        </div>
                    </div>
                 </div>
                  <div class="row">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Address: </label>
                        <div class="col-sm-9">
                            <div class="">
                                <input type="text" class="form-control" name="address" placeholder="Address..." id="autocomplete" onFocus="geolocate()" required value="">
                                <input type="hidden"  name="latitude"  id="latitude"  value="">
                                <input type="hidden"  name="longitude" id="longitude" value="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Password: </label>
                        <div class="col-sm-9">
                            <input type="password"  name="password" class="form-control">
                        </div>
                    </div>
                 </div>
                <div class="row">
                    <div class="form-group">
                        <div class="col-sm-9 col-sm-offset-3 text-center "><br>
                            <button type="submit" class=" btn btn-primary">Add </button>
                        </div>
                    </div>
                 </div>
                </form>
             </div>
        </div>
    </div>
</div>

<?php
require  public_path().'/admin/footer.blade.php';
?>