<?php
require  public_path() . '/painter/header.php';
require  public_path() . '/painter/sidebar-2.php';
$Painter_user = Session::get('Painter_user');
?>
<!-- Page Content -->

<style>
    .container-fluid.cstm-lst-ordr {
        display: unset;
    }
    .data-ord{
        display: none;
    }
</style>

<div id="page-content-wrapper">
    <div class="header-hide">
        <span class="hamb-top"></span>
        <span class="hamb-middle"></span>
        <span class="hamb-bottom"></span>
        </button>
        <div class="container-fluid-main">
            <div class="div">
                <a href="<?php echo PUBLIC_PATH . '/main' ?>">
                    <img src="{{ asset('/image/logo.png') }}">
                </a>
            </div>
            <div>
                <h2>NO way , you did it</h2>
                <h4>Orders you created </h4>
                <h4>fuck yeh </h4>
            </div>
        </div>
    </div>


    @extends('layouts.app')


@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="http://127.0.0.1:8000/css/font-awesome.css" />
@endsection
@section('content')
<style>
  body {
    overflow: hidden;
  }

  .container {
    max-width: 450px;
  }

  #sidebar-wrapper {
    background: #ffffff;
    background-image: url(../image/sidebar-bg.png);
    background-repeat: no-repeat;
    background-position: bottom left;
    background-size: contain;
  }

  .header {
    white-space: nowrap;
    max-width: 350px;
    margin-top: 20px;
  }

  .header>div {
    display: inline-block;
    width: 50%;
    vertical-align: middle;
  }

  @media (max-width: 450px) {
    .header>div {
      width: 35%;
    }
  }

  .profile_img {
    white-space: nowrap;
  }

  .profile_img img {
    width: 30%;
    border-radius: 30%;
    vertical-align: middle;
  }

  .profile_img div {
    display: inline-block;
    width: 60%;
    /* vertical-align: top; */
    color: #000;
    font-size: 16px;
    font-weight: 700;
  }

  /*==================================*/
  /*     Sidebar nav styles start       */
  /*==================================*/

  .sidebar-nav {
    width: 100%;
    margin: 0;
    list-style: none;
    margin-bottom: 170px;
  }

  .sidebar-nav li {
    position: relative;
    line-height: 20px;
    display: inline-block;
    width: 100%;
    padding-left: 20px;
    padding-right: 0px;
    background-color: transparent !important;
  }

  .sidebar-nav li:before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    z-index: -1;
    height: 100%;
    width: 3px;
    background-color: rgba(245, 124, 31, 0.05);
    -webkit-transition: width .2s ease-in;
    -moz-transition: width .2s ease-in;
    -ms-transition: width .2s ease-in;
    transition: width .2s ease-in;
  }

  .sidebar-nav li:hover:before,
  .sidebar-nav li.open:hover:before,
  .sidebar-nav li.active:before {
    width: 100%;
    -webkit-transition: width .2s ease-in;
    -moz-transition: width .2s ease-in;
    -ms-transition: width .2s ease-in;
    transition: width .2s ease-in;
  }

  .sidebar-nav li a {
    position: relative;
    display: block;
    color: #313131;
    text-decoration: none;
    padding: 15px 0px 15px 30px;
    font-size: 18px;
  }

  .sidebar-nav li a span {
    position: absolute;
    left: -5px;
    padding: 4px 7px;
    background: #ff7f27;
    top: 20px;
    font-size: 20px;
    border-radius: 50%;
    font-weight: 700;
    color: #fff;
  }

  .sidebar-nav li a:hover,
  .sidebar-nav li a:active,
  .sidebar-nav li a:focus,
  .sidebar-nav li.open a:hover,
  .sidebar-nav li.open a:active,
  .sidebar-nav li.open a:focus,
  .sidebar-nav li.active a {
    color: #f57c1f;
    text-decoration: none;
    background-color: transparent;
  }

  .sidebar-nav>.sidebar-brand {
    height: 65px;
    font-size: 20px;
    line-height: 44px;
    padding-left: 0;
    padding-right: 0;
    margin-bottom: 20px;
    margin-top: 10px;
  }

  .sidebar-nav .dropdown-menu {
    position: relative;
    width: 100%;
    padding: 0;
    margin: 0;
    border-radius: 0;
    border: none;
    background-color: #222;
    box-shadow: none;
  }

  .details {
    background-image: url(../image/sidemnu/Detail.png);
  }

  .side-icon {
    background-repeat: no-repeat;
    background-position: left center;
  }

  .buy {
    background-image: url(../image/sidemnu/Buy.png);
  }

  .friend {
    background-image: url(../image/sidemnu/Friend.png);
  }

  .jobs {
    background-image: url(../image/sidemnu/Jobs.png);
  }

  .camera {
    background-image: url(../image/sidemnu/camera.png);
  }

  .building {
    position: relative;
  }

  .building i {
    position: absolute;
    left: 0;
  }

  .has_sub_nav {
    position: relative;
    transition: rotate 2s, height 2s, transform 2s;
  }

  .has_sub_nav::after {
    content: '>';
    position: absolute;
    width: 20px;
    height: 20px;
    right: 0;
    font-size: 30px;
    line-height: 20px;
    color: #ff7f27;
    transform: scale(1.3, .8) rotate(90deg);
    top: 25px;
    font-weight: 900;
  }

  .la-sub-nav {
    display: none;
  }

  .has_sub_nav.open_nav::after {
    transform: scale(1.3, .8) rotate(-90deg);
    right: 8px;
  }

  .list-cstm-des .blue-clr-list a {
    font-size: 20px;
    color: #0000ff;
  }

  .list-cstm-des .black-clr-list a {
    font-size: 20px;
    color: #000;
  }

  .list-cstm-des .card {
    border-radius: 10px;
    width: 100%;
    margin-top: 15px;
    border: none;
    -webkit-box-shadow: 0px 0px 5px 2px rgba(212, 212, 212, 1);
    -moz-box-shadow: 0px 0px 5px 2px rgba(212, 212, 212, 1);
    box-shadow: 0px 0px 5px 2px rgba(212, 212, 212, 1);
  }

  .list-cstm-des .card img {
    width: 100%;
  }
</style>

@include('layouts.partials.language')
  <!-- Sidebar -->

        <br>
      

        <div class="card black-clr-list">
          <div class="row align-items-center">
            <div class="col-lg-8 col-sm-8 col-8">
              <li><a href="<?php echo '/my_jobss' ?>" class="jobs side-icon">testing  1</a></li>
             
              <li><a href="my_jobsss" class="camera side-icon">more testing</a></li>

              <li><a href="<?php echo '/new_order'; ?>" class="buy side-icon <?php echo 'index' ? 'active' : '' ?>">{{__('message.buy_paint')}}</a></li>
            </div>
            <div class="col-lg-4 col-sm-4 col-4">
              <img src="/image/paint-2.png">
            </div>
          </div>
        </div>

        
    
 