<?php
require  public_path().'/admin/header.blade.php';
?>

<div class="page-header">
    <div class="row mb_10 ">
        <div class="col-sm-9">
                <h1 class="page-title">Shop Details</h1>
        </div>
        <div class="col-sm-3 pull-right">
            <a href="<?php echo PUBLIC_PATH;?>/admin/edit_shop/<?php echo $shop->id;?>" class="btn btn-primary">Edit Shop</a>
        </div>
        <br />
    </div>
    <div class="row">
        <div class="col-sm-9">
                
                <div class="row mb_10">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Shop Name: </label>
                        <div class="col-sm-9">
                          <input type="text" readonly name="name" value="<?php echo $shop->name;?>" class="no_border form-control">
                        </div>
                    </div>
                </div>
                <div class="row mb_10">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Shop Email: </label>
                        <div class="col-sm-9">
                          <input type="email" readonly name="email" value="<?php echo $shop->email;?>" class="no_border form-control">
                          <input type="hidden" name="emailold" value="<?php echo $shop->email;?>" >
                        </div>
                    </div>
                 </div>
                <div class="row mb_10">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Owner Name: </label>
                        <div class="col-sm-9">
                          <input type="email" readonly name="owner_name" value="<?php echo $shop->owner_name;?>" class="no_border form-control">
                        </div>
                    </div>
                 </div>
                <div class="row mb_10">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Shop Phone No.: </label>
                        <div class="col-sm-9">
                          <input type="text" pattern= "[0-9]+" value="<?php echo $shop->phone;?>" title="Numbers only" readonly name="phone" class=" no_border form-control">
                        </div>
                    </div>
                 </div>
                  <div class="row mb_10">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Address: </label>
                        <div class="col-sm-9">
                            <div class="">
                                <input type="text" class="form-control no_border" name="address" placeholder="Address..." id="autocomplete" readonly value="<?php echo $shop->address;?>">
                            </div>
                        </div>
                    </div>
                </div>
                 <div class="row mb_10">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Number of Orders: </label>
                        <div class="col-sm-9">
                            <div class="">
                                <input type="text" class="form-control no_border" readonly value="<?php echo $shop->no_orders;?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb_10">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Orders Amount: </label>
                        <div class="col-sm-9">
                            <div class="">
                                <input type="text" class="form-control no_border" readonly value="<?php echo '$'.$shop->price;?>">
                            </div>
                        </div>
                    </div>
                </div>
                 <div class="row mb_10">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Number Of Employess: </label>
                        <div class="col-sm-9">
                            <div class="">
                                <input type="text" class="form-control no_border"  readonly value="<?php echo $shop->no_emp;?>">
                            </div>
                        </div>
                    </div>
                </div>
                 <div class="row mb_10">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Number of Customers: </label>
                        <div class="col-sm-9">
                            <div class="">
                                <input type="text" class="form-control no_border" readonly value="<?php echo $shop->no_customers;?>">
                            </div>
                        </div>
                    </div>
                </div>
                 <div class="row mb_10">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Logi-in Email: </label>
                        <div class="col-sm-9">
                          <input type="email" readonly name="email" value="<?php echo $shop->email;?>" class="no_border form-control">
                        </div>
                    </div>
                 </div>
                  <div class="row mb_10">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Password: </label>
                        <div class="col-sm-9">
                          <input type="text" readonly name="email" value="<?php echo $shop->password;?>" class="no_border form-control">
                        </div>
                    </div>
                 </div>
            </div>
    </div>
</div>

<?php
require  public_path().'/admin/footer.blade.php';
?>