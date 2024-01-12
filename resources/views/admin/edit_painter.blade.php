<?php
require  public_path() . '/admin/header.blade.php';
?>
<style>
    .shop-multiselect span.select2.select2-container {
        width: 100% !important;
    }
</style>
<div class="page-header">
    <h1 class="page-title">
        Edit Painter
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
                            <input type="text" required name="first_name" value="<?php echo $user->first_name; ?>" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Last Name: </label>
                        <div class="col-sm-9">
                            <input type="text" required name="last_name" value="<?php echo $user->last_name; ?>" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group shop-multiselect">
                        <label class="col-sm-3 control-label">Shop: </label>
                        <div class="col-sm-9">
                            <select name='shop_id[]' class="selectpicker" id="select2" multiple aria-label="Default select example">
                                <?php
                                foreach ($shops as $key => $value) { ?>
                                    <option class="form-control" value="{{ $value->id }}" {{ (in_array($value->id,$ids)) ? 'selected' : '' }}>{{$value->name}}</option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Email: </label>
                        <div class="col-sm-9">
                            <input type="email" required name="email" value="<?php echo $user->email; ?>" class="form-control">
                            <input type="hidden" name="emailold" value="<?php echo $user->email; ?>">

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Phone No.: </label>
                        <div class="col-sm-9">
                            <input type="text" pattern="[0-9]+" title="Numbers only" value="<?php echo $user->phone; ?>" required name="phone" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Company Name : </label>
                        <div class="col-sm-9">
                            <input type="text" value="<?php echo $user->company_name; ?>" required name="company_name" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Address: </label>
                        <div class="col-sm-9">
                            <div class="">
                                <input type="text" class="form-control" name="address" placeholder="Address..." id="autocomplete" onFocus="geolocate()" required value="<?php echo $user->address; ?>">
                                <input type="hidden" name="latitude" id="latitude" value="<?php echo $user->latitude; ?>">
                                <input type="hidden" name="longitude" id="longitude" value="<?php echo $user->longitude; ?>">
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.full.min.js" integrity="sha512-RtZU3AyMVArmHLiW0suEZ9McadTdegwbgtiQl5Qqo9kunkVg1ofwueXD8/8wv3Af8jkME3DDe3yLfR8HSJfT2g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $('#select2').select2();
</script>
<?php
require  public_path() . '/admin/footer.blade.php';
?>