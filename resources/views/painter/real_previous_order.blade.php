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
<div class="container">
  <div class="header">
    <div class="log">
      <a href="{{route('home')}}" class="text-center">
        <img src="/image/logo.png" />
      </a>
    </div>
    <div class="profile_img">
      <a href="" class="text-center">
        <img class="d-sm-inline d-none" src="{{ asset('/uploads/' . Auth::user()->photo) }}">
        <div class="title mr-2">{{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}</div>
      </a>
    </div>
  </div>
  <div class="main_nav">
    <br>
  <h1><center>Previous Orders</center></h1>
    <!-- Sidebar -->
    <nav class="navbar navbar-fixed-top" id="sidebar-wrapper" role="navigation">
      <ul class="nav sidebar-nav list-cstm-des">
        <br>
        <div class="card black-clr-list">
          <div class="row align-items-center">
            <div class="col-lg-8 col-sm-8 col-8">
              <li>
                
              <li>
                <a href="<?php echo '/previous_jobs' ?>" class=""><strong>See Previous Jobs </strong></a>
                <p>See all the jobs for builders that are finished</p>
              </li>
            </div>
            <div class="col-lg-4 col-sm-4 col-4">
            <a href='/previous_jobs'><img src="/image/bluebourd.png" alt="User Image">
            </a>
            </div>
          </div>
        </div>

        <div class="card black-clr-list">
          <div class="row align-items-center">
            <div class="col-lg-8 col-sm-8 col-8">
              <li>
                
              <li>
                <a href="<?php echo '/my_jobs' ?>" class=""><strong>See Your Ordres </strong> </a>
                <p>See all your orders that are finished </p>
              </li>
            </div>
            <div class="col-lg-4 col-sm-4 col-4">
            <a href='/my_jobs'><img src="/image/rgrg.png" alt="User Image">
            </a>
            </div>
          </div>
        </div>
<!--
        <div class="card black-clr-list">
          <div class="row align-items-center">
            <div class="col-lg-8 col-sm-8 col-8">
              <li>
                
              <li>
                <a href="<?php echo '/accounts' ?>" class=""><strong>Photo Order</strong></a>
                <p>Just take a photo of the paint can label and tell us how many  </p>
              </li>
            </div>
            <div class="col-lg-4 col-sm-4 col-4">
            <a href='/accounts'><img src="/image/photo.png" alt="User Image">
            </a>
            </div>
          </div>
        </div>

         <div class="card black-clr-list">
          <div class="row align-items-center">
            <div class="col-lg-8 col-sm-8 col-8">
              <li>
                
             <li>
                <a href="<?php echo '/friend' ?>" class=""><strong>Tell A Friend</strong></a>
                <p>if you friend registers,we You get a paint brush worth $20 on your next buy </p>
              </li>
            </div>
            <div class="col-lg-4 col-sm-4 col-4">
            <a href='/friend'><img src="/image/tell_friend.png" alt="User Image">
            </a>
            </div>
          </div>
        </div>  -->

<!-- my footer   -->



<?php
function footer (){
        ?>


        <!DOCTYPE html>
<html lang="en">
<head>
    <title>magic menu</title>
    <link rel="stylesheet" type="text/css" href="/real_footer.css">
    <style>
        .navigation ul {
            display: flex;
            justify-content: space-between;
            padding: 0;
        }

        .navigation li {
            list-style: none;
            margin-right: 20px;
        }
    </style>
</head>
<body>
    <div class="navigation">
        <ul>
            <li class="list active">
                <a href="http://127.0.0.1:8000/real_order_paint">
                    <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
                    <span class="text">Order</span>
                </a>
            </li>
           
            <li class="list">
                <a href="http://127.0.0.1:8000/real_previous_order">
                    <span class="icon"><ion-icon name="newspaper-outline"></ion-icon></span>
                    <span class="text">Prev</span>
                </a>
            </li>
            <li class="list">
                <a href="http://127.0.0.1:8000/my_jobsss">
                    <span class="icon"><ion-icon name="person-outline"></ion-icon></span>
                    <span class="text">Profile</span>
                </a>
            </li>

            <li class="list">
            <a href="http://127.0.0.1:8000/real_invoice">                   
                    <span class="icon"><ion-icon name="camera-outline"></ion-icon></span>
                    <span class="text">Invoice</span>
                </a>
            </li>
        </ul>
    </div>
    <script>
        const list = document.querySelectorAll('.list');
        function activeLink(){
            list.forEach((item) =>
                item.classList.remove('active'));
            this.classList.add('active');
        }
        list.forEach((item) =>
            item.addEventListener('click',activeLink));
    </script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>

<?php 
}


footer ();
?>






      </ul>
    </nav>

    @endsection
    @section('content')
    @endsection
    @section('js')

    <script src="{{ asset('/assets/vendor/jquery/jquery.js')}}"></script>
    <script>
      $(document).ready(function() {
        $(document.body).on('click', '.has_sub_nav', function(e) {
          e.preventDefault();
          $('.la-sub-nav').slideToggle(500);
          $(this).toggleClass('open_nav');
        });

      })
    </script>
    @endsection