<?php
require  public_path().'/s_shop/header.blade.php';
?>

<div class="page-header">
    <h1 class="page-title">
        Edit Employee
    </h1>
    <br />
    <div class="row">
        <div class="col-sm-9">
            <form method="post" id="add_shop">
                @csrf
                <div class="row">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">First Name: </label>
                        <div class="col-sm-9">
                          <input type="text" required name="first_name" value="<?php echo $employee->first_name;?>" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Last Name: </label>
                        <div class="col-sm-9">
                          <input type="text" required name="last_name" value="<?php echo $employee->last_name;?>" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Address: </label>
                        <div class="col-sm-9">
                            <textarea required name="address" class="form-control"><?php echo $employee->address;?></textarea>
                        </div>
                    </div>
                </div>
               
                <div class="row">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Email: </label>
                        <div class="col-sm-9">
                          <input type="email" required name="email" value="<?php echo $employee->email;?>" class="form-control">
                          <input type="hidden" name="emailold" value="<?php echo $employee->email;?>">
                        </div>
                    </div>
                 </div>
                <div class="row">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Phone No.: </label>
                        <div class="col-sm-9">
                          <input type="text" pattern= "[0-9]+" title="Numbers only" value="<?php echo $employee->phone;?>" required name="phone" class="form-control">
                        </div>
                    </div>
                 </div>
                 <div class="row">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">ABN Number : </label>
                        <div class="col-sm-9">
                          <input type="text" required name="abn" value="<?php echo $employee->abn;?>" class="form-control">
                        </div>
                    </div>
                 </div>
                <div class="row">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">BSB : </label>
                        <div class="col-sm-9">
                          <input type="text" required name="bsb" value="<?php echo $employee->bsb;?>" class="form-control">
                        </div>
                    </div>
                 </div>
                 
                  <div class="row">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Account Number : </label>
                        <div class="col-sm-9">
                          <input type="text" required name="account_no" value="<?php echo $employee->account_no;?>" class="form-control">
                        </div>
                    </div>
                 </div>
                <div class="row">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Bank Name : </label>
                        <div class="col-sm-9">
                          <input type="text" required name="bank_name" value="<?php echo $employee->bank_name;?>" class="form-control">
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
</div>

<?php
require  public_path().'/s_shop/footer.blade.php';
?>