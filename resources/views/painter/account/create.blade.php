<?php
require  public_path() . '/painter/header.php';
require  public_path() . '/painter/sidebar-2.php';
?>
<!-- Page Content -->
<div id="page-content-wrapper">
    <div class="header-hide">
        <span class="hamb-top"></span>
        <span class="hamb-middle"></span>
        <span class="hamb-bottom"></span>
        </button>
        <div class="container-fluid-main">
            <h2>Your Account</h2>
        </div>
    </div>
    <div class="container-fluid edit-detail account_page">
        <div class="row">
            <div class="col-lg-12">
                <div class="topbar">
                    <h2>Add New Account</h2>
                    <p class="color-gray">Here you can add new account.</p>
                </div>
                <div class="bottombar mt-70">
                    <!-- Left-aligned -->
                    <div class="media">
                        <form class="col s12" action="{{route('accounts.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="media-body">
                                <div class="mb-0">
                                    <div class="row">
                                        <div class="input-field col s11">
                                            <select required class="select-amount" name="brand_id">
                                                @foreach ($brands as $brand)
                                                <option value="{{$brand->id}}">{{$brand->name}}</option>
                                                @endforeach
                                            </select>
                                            <label>Brand Name</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s11">
                                            <input id="account_no" required name="account_no" type="text" class="validate">
                                            <label for="account_no">Account No.</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s11">
                                            <button type="sumbit" class="btn-orange large btn w-100">Save</button>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s11">
                                            <a href="{{route('accounts.index')}}" class="btn-orange large btn w-100">Cancel</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /#page-content-wrapper -->
<?php
require  public_path() . '/painter/footer.php';
?>