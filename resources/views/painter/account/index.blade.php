<?php
require  public_path() . '/painter/header.php';
require  public_path() . '/painter/sidebar-2.php';
?>

<style>
     .logo-cst {
		width: 70px;
		height: 70px;
		margin: 0 auto;
	}

	.logo-cst img {
		width: 100%;
		height: 100%;
		object-fit: cover;
		object-position: center;
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
            <h2>Your Accounts</h2>
        </div>
    </div>
    <div class="container-fluid detail account_listing_page">
        <div class="row">
            <div class="col-lg-12">
                <div class="topbar">
                    <h2>Your Accounts Page</h2>
                    <p class="color-gray">Here you can update your Builder Accounts</p>
                </div>
                <div class="bottombar mt-70">
                    <div class="row">
                        <div class="col-md-12" style="overflow-x: auto;">
                            <table class="table table-bordered table-inverse" id="builder_table" style="margin-left: 0px;">
                                <thead>
                                    <tr>
                                        <th>Account number</th>
                                        <th>Brand</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($accounts as $key => $value) { ?>
                                        <tr>
                                            <td><?php echo $value->account_no; ?></td>
                                            <td><?php echo $value->brand ? $value->brand->name : ''; ?></td>
                                            <td class="text-center">
                                                <form action="{{route('accounts.destroy', ['account' =>$value->id ])}}" method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <button style="margin-bottom: 10px;" class="btn-orange outer rounded btn-sm">delete</a>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <a style="margin-bottom: 10px;" class="btn btn-orange outer rounded pull-right" href="{{route('accounts.create')}}">Add New Paint Acounts</a>
                            </div>
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