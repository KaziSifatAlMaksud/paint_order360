<?php
require  public_path() . '/painter/header.php';
require  public_path() . '/painter/sidebar-2.php';
?>
<style>
    /*the container must be positioned relative:*/
    .autocomplete {
        position: relative;
        display: block;
    }

    .div.logo-cst {
        width: 80px;
        height: 80px;
        margin: 0 auto;
    }

    .div.logo-cst img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
    }

    .autocomplete-items {
        position: absolute;
        border: 1px solid #d4d4d4;
        border-bottom: none;
        border-top: none;
        z-index: 99;
        /*position the autocomplete items to be the same width as the container:*/
        top: 100%;
        left: 0;
        right: 0;
    }

    .autocomplete-items div {
        padding: 10px;
        cursor: pointer;
        background-color: #fff;
        border-bottom: 1px solid #d4d4d4;
    }

    /*when hovering an item:*/
    .autocomplete-items div:hover {
        background-color: #e9e9e9;
    }

    /*when navigating through the items using the arrow keys:*/
    .autocomplete-active {
        background-color: DodgerBlue !important;
        color: #ffffff;
    }

    body .autocomplete .form-control {
        display: block;
        width: 100%;
        height: 34px;
        padding: 6px 12px;
        font-size: 14px;
        line-height: 1.42857143;
        color: #555;
        background-color: #fff;
        background-image: none;
        border: 1px solid #ccc;
        border-radius: 4px;
        -webkit-box-shadow: inset 0 1px 1px rgb(0 0 0 / 8%);
        box-shadow: inset 0 1px 1px rgb(0 0 0 / 8%);
        -webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
        -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
        transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
    }

    .form-submit-content {
        /* border-radius: 10px; */
        /* box-shadow: rgba(14, 30, 37, 0.12) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px; */
        padding: 10px;
        margin-top: 30px;
    }
</style>

<!-- Page Content -->
<div id="page-content-wrapper">
    <div class="header-hide">
        <span class="hamb-top"></span>
        <span class="hamb-middle"></span>
        <span class="hamb-bottom"></span>
        </button>
        <div class="container-fluid-main">
            <div class="div logo-cst">
                <a href="<?php echo PUBLIC_PATH . '/main' ?>">
                    <img src="{{ asset('/image/logo-phone.png') }}">
                </a>
            </div>
            <div class="">
                <h2>Photo Order</h2>
            </div>
        </div>
    </div>
    <div class="container-fluid photo-order">
        <div class="row" style="overflow: hidden;">
            <div class="col-lg-12">
                <div class="topbar visible-md visible-lg">
                    <h2>{{__('message.welcome_new_feature')}},{{__('message.photo_order')}}</h2>
                    <p class="color-gray">{{__('message.snap_size')}}</p>
                </div>
                <div class="bottombar mt-70">
                    <div class="visible-xs visible-sm">
                        <h2 class="text-center">{{__('message.welcome_new_feature')}},{{__('message.photo_order')}}</h2>
                        <p class="text-center">{{__('message.snap_size')}}</p>
                    </div>
                    <div style="text-align: center;">
                        <img src="image/photo.JPG" alt="Photo" width="250" height="200" class="photo">
                        <form method="post"><br><br>
                            @csrf()
                            <div class="text-center">
                                <div class="upload-image">
                                    <div class="dropzone" data-width="500" data-ajax="false" data-save="false" data-height="500" data-resize="true" style="width:60%;">
                                        <input type="file" accept="image/*" required name="thumb" />
                                    </div>
                                </div>
                            </div>
                            <div class=" mt-40">
                                <label>{{__('message.size')}}</label>
                                <select name="size" class="form-control">
                                    <option value="" selected>{{__('message.select')}}</option>
                                    <option value="15">{{__('message.15l')}}</option>
                                    <option value="10">{{__('message.10l')}}</option>
                                    <option value="4">{{__('message.4l')}}</option>
                                    <option value="2">{{__('message.2l')}}</option>
                                    <option value="1">{{__('message.1l')}}</option>
                                </select>
                            </div>
                            <div class="mt-40">
                                <label>{{__('message.quantity')}}</label>
                                <select name="qty" class="form-control">
                                    <?php
                                    echo '<option value="" selected >Select</option>';
                                    for ($i = 0; $i <= 20; $i++) {
                                        // if ($i == 0) {
                                        // } else { 
                                    ?>
                                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                    <?php
                                        // }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="mt-40 autocomplete">
                                <label>{{__('message.address')}}</label>
                                <input id="myInput" type="text" name="address" placeholder="{{__('message.address')}}" class="form-control" autocomplete="off">
                            </div>
                            {{-- <div class="mt-40 autocomplete">
                            <label>Account Name</label>
                            <input id="account_name" type="text" name="accountname" placeholder="Account Name" class="form-control" autocomplete="off" value="{{ $user->first_name ?? '' }} {{ $user->last_name ?? '' }}">
                    </div> --}}
                    <div class="mt-40">
                        <label>Account Name</label>
                        <select name="acc_name" class="form-control">
                            <option value="" selected>{{__('message.select')}}</option>
                            @foreach ($account as $acc)
                            <option value="{{ $acc->id }}">{{ $acc->name . ' ' . $acc->account_no }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- <div class="mt-40">
                        <label>Send to boss</label>
                        <select name="shop_id" class="form-control" required>
                            <option value="" selected hidden disabled>Select</option>
                            <?php
                            foreach ($shops as $key => $value) {
                                echo '<option class="form-control" value="' . $value->id . '">' . $value->name . '</option>';
                            }
                            ?>
                        </select>
                    </div> -->
                    <div class="mt-40">
                        <label>Please select a shop</label>
                        <select name="shop_id" class="form-control" required>
                            <option value="" selected hidden disabled>Select</option>
                            <?php
                            foreach ($shops as $key => $value) {
                                echo '<option class="form-control" value="' . $value->id . '">' . $value->name . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-submit-content shop-text">
                        <div class="clearfix"></div>
                        <div class="mt-50 row mt-s-30 ">
                            <div class="col-sm-12 no-more">
                                <p class="redcolor"> If your are finished making your order. Please choose a delivery option</p>
                                <div class="pick-one pull-left w-100">
                                    <ul class="list-inline pull-left">
                                        <li>
                                            <p class="pull-left">
                                                <input class="with-gap" <?php echo (@$re_order['pickup'] == 0) ? "checked" : ""; ?> value="0" required name="pickup" type="radio" id="test1" />
                                                <label for="test1"><img src="image/icon/shop_center.png">Pick up paint from shop</label>
                                            </p>
                                        </li>
                                        <li>
                                            <p class="pull-left">
                                                <input class="with-gap" <?php echo (@$re_order['pickup'] == 1) ? "checked" : ""; ?> value="1" name="pickup" type="radio" id="test2" />
                                                <label for="test2"><img src="image/icon/home.png">Deliver to my home</label>
                                            </p>
                                        </li>
                                        <li>
                                            <p class="pull-left">
                                                <input class="with-gap" <?php echo (@$re_order['pickup'] == 1) ? "checked" : ""; ?> value="2" name="pickup" type="radio" id="test3" />
                                                <label for="test3"><img src="image/icon/ambulance_round.png">Deliver to this job address</label>
                                            </p>
                                        </li>
                                    </ul>
                                    <!-- <button class="btn btn-orange medium ronded pull-right">Go</button> -->
                                    <!-- <input type="submit" value="GO" class="btn btn-orange medium ronded pull-right"> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-40">
                        <input type="hidden" class="" name="photo" id="photo_name">
                        <button type="submit" id="place_order_btn" disabled class="btn btn-orange large"><i class="fa fa-camera hidden-md hidden-lg" aria-hidden="true"></i>{{__('message.place_order')}}</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->
        <?php
        require  public_path() . '/painter/footer.php';
        require  public_path() . '/painter/autocomplete.php';
        // require  public_path() . '/partials/language.php';
        ?>
        {{-- @include('layouts.partials.language') --}}