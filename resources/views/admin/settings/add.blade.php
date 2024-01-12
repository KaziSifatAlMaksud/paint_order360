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
            <form method="post" id="add_shop" action="{{$websiteSetting->id? route('admins.website_setting.update', ['website_setting' =>$websiteSetting->id ]) : route('admins.website_setting.store')}}" enctype="multipart/form-data">
                @csrf
                @if($websiteSetting->id)
                @method('PUT')
                @endif
                <!-- <div class="row">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Key: </label>
                        <div class="col-sm-9">
                            <input type="text" required name="key" value="{{old('key', $websiteSetting->key)}}" class="form-control">
                        </div>
                    </div>
                </div> -->

                <div class="row">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">value: </label>
                        <div class="col-sm-9">
                            <input type="text" required name="value" value="{{old('value', $websiteSetting->value)}}" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group">
                        <div class="col-sm-9 col-sm-offset-3 text-center "><br>
                            <button type="submit" class=" btn btn-primary"> {{ $websiteSetting->id? 'Update': 'Add'}}</button>
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