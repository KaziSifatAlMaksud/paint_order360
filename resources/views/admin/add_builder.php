w<?php
    require  public_path() . '/admin/header.blade.php';
    ?>

<div class="page-header">
    <h1 class="page-title">
        Add New Builder
    </h1>
    <br />
    <div class="row">
        <div class="col-sm-9">

            <div class="row">
                <form method="post" id="add_builder">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Builder Name: </label>
                        <div class="col-sm-9">
                            <input type="text" required name="name" value="" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Account Number: </label>
                        <div class="col-sm-9">
                            <input type="text" required name="account_no" value="" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-9 col-sm-offset-3 text-center "><br>
                            <button type="submit" class=" btn btn-primary">Add</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
require  public_path() . '/admin/footer.blade.php';
?>