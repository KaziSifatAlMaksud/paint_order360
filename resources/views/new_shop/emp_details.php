<?php
require  public_path().'/s_shop/header.blade.php';
?>

<div class="page-header">
    <div class="row mb_10 ">
        <div class="col-sm-9">
                <h1 class="page-title">Employee Detail</h1>
        </div>
        <div class="col-sm-3 pull-right">
            <a href="<?php echo PUBLIC_PATH;?>/shop/edit_emp/<?php echo $employee->id;?>" class="btn btn-primary">Edit Employee</a>
        </div>
        <br />
    </div>
    <div class="row">
        <div class="col-sm-9">
                
               
                <div class="row mb_10">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">First Name: </label>
                        <div class="col-sm-9">
                          <input type="text" readonly name="name" value="<?php echo $employee->first_name;?>" class="no_border form-control">
                        </div>
                    </div>
                </div>
                <div class="row mb_10">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Last Name: </label>
                        <div class="col-sm-9">
                          <input type="text" readonly name="name" value="<?php echo $employee->last_name;?>" class="no_border form-control">
                        </div>
                    </div>
                </div>
                <div class="row mb_10">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Email: </label>
                        <div class="col-sm-9">
                          <input type="email" readonly name="email" value="<?php echo $employee->email;?>" class="no_border form-control">
                          <input type="hidden" name="emailold" value="<?php echo $employee->email;?>" >
                        </div>
                    </div>
                 </div>
                <div class="row mb_10">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Phone No.: </label>
                        <div class="col-sm-9">
                          <input type="text" pattern= "[0-9]+" value="<?php echo $employee->phone;?>" title="Numbers only" readonly name="phone" class=" no_border form-control">
                        </div>
                    </div>
                 </div>
                  <div class="row mb_10">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Address: </label>
                        <div class="col-sm-9">
                            <div class="">
                                <input type="text" class="form-control no_border" name="address" placeholder="Address..."  readonly value="<?php echo $employee->address;?>">
                            </div>
                        </div>
                    </div>
                </div>
                  <div class="row mb_10">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">ABN Number: </label>
                        <div class="col-sm-9">
                            <div class="">
                                <input type="text" class="form-control no_border" name="abn" placeholder="ABN Number"  readonly value="<?php echo $employee->abn;?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb_10">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">BSB : </label>
                        <div class="col-sm-9">
                            <div class="">
                                <input type="text" class="form-control no_border" name="bsb" placeholder="BSB" readonly value="<?php echo $employee->bsb;?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb_10">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Account Number: </label>
                        <div class="col-sm-9">
                            <div class="">
                                <input type="text" class="form-control no_border" name="account_no" placeholder="Account Number"  readonly value="<?php echo $employee->account_no;?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb_10">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Bank Name : </label>
                        <div class="col-sm-9">
                            <div class="">
                                <input type="text" class="form-control no_border" name="bank_name" placeholder="Bank Name" readonly value="<?php echo $employee->bank_name;?>">
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