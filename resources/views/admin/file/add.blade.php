<?php
require  public_path() . '/admin/header.blade.php';
?>

<div class="page-header">
    <h1 class="page-title">
        Website settings
    </h1>
    <br />
    <div class="row">
        <div class="col-sm-9">
            <form method="post" id="add_shop" action="{{ route('admins.file.store')}}" enctype="multipart/form-data">
                @csrf
        
                <div class="row">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Upload Image:</label>
                        <div class="col-sm-9">

                            <input name='file' class="form-control form-control-lg" id="file" type="file">

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <div class="col-sm-9 col-sm-offset-3 text-center "><br>
                            <button type="submit" class=" btn btn-primary">Add</button>
                        </div>
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