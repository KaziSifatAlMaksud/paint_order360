<?php
require  public_path() . '/painter/header.php';
require  public_path() . '/painter/sidebar-2.php';
?>
<style>
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
            <h2>Tell a Friend</h2>
        </div>
    </div>
    <div class="container-fluid tell-friend">
        <div class="row">
            <div class="col-lg-12">
                <div class="bottombar">
                    <div class="text-center p-absolute-center" style="min-height:550px;">
                        <img src="image/friend.png">
                        <h1>Welcome</h1>
                        <p class="color-gray">Tell a friend painter about us and if you friend registers with us we <br>will give you a paint brush worth $20 on your next buy</p>
                        <form class="" method="post" action="{{route('friend.post')}}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <div class="input-field">
                                <i class="fa fa-envelope prefix" aria-hidden="true"></i>
                                <input id="email" type="email" name="email" required class="validate" placeholder="Email Address">
                            </div>
                            <button type="submit" class="btn btn-orange large ronded">Send</button>
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