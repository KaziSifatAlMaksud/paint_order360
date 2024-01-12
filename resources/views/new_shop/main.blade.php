 @extends('layouts.app')


@section('styles')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css">

@endsection
@section('content')
<?php
require  public_path() . '/painter/header.php';
require  public_path() . '/painter/sidebar-2.php';
?>

<!-- FontAwesome Link -->

<style>
  .container {
    max-width: 850px;
    text-align: center;
  }

  .single_job {
    border-radius: 5px;
    width: 94%;
    padding: 0px 2%;
    display: inline-block;
    font-size: 16px;
    margin-bottom: 30px;
    /* box-shadow: 0px 0px 5px 1px rgba(0, 0, 0, 0.75); */
    /* -webkit-box-shadow: 0px 0px 5px 1px rgba(0, 0, 0, 0.75);
    -moz-box-shadow: 0px 0px 5px 1px rgba(0, 0, 0, 0.75); */

  }


  .la_next_page {
    width: 30%;
    font-size: 20px;
    text-align: center;
    display: inline-block;
  }

  .la_next_page a {
    display: inline-block;
    width: 60px;
    height: 60px;
    line-height: 60px;
    border-radius: 50%;
    color: #5da857;
    border: none;
    font-weight: 700;
    margin: 10px;
    box-shadow: 0px 0px 5px 2px;
    font-size: 23px;
    text-decoration: none;
  }

  .single_job {
    font-size: 0;
    text-align: left;
  }

  .single_job .data-container>div:nth-child(n+1) {
    width: 100%;
    /* display: inline-block; */
    font-size: 20px;

  }

  /* .single_job .data-container>div:nth-child(2n) {
      width: 60%;
      display: inline-block;
      font-size: 16px;
    }  */


  .single_job .data-container>div:last-child {
    width: 100%;
    text-align: center;
  }

  body .single_job .single_file {
    font-size: 0;
    text-align: center;
  }

  .single_file>div:nth-child(n) {
    display: inline-block;
    font-size: 16px;
    margin: 6px 15px;
  }

  .header {
    white-space: nowrap;
    max-width: 350px;
    margin-top: 20px;
    margin: 5px auto;

  }

  .header>div {
    display: inline-block;
    width: 100%;
    vertical-align: middle;
  }

  .profile_img {
    white-space: nowrap;
  }

  .profile_img img {
    width: 40%;
    border-radius: 50%;
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

  .single_file a {
    display: inline-block;
    background: #ff7f27;
    border: none;
    padding: 4px 0px 4px;
    height: auto;
    font-size: 20px;
    color: #fff;
    border-radius: 4px;
    text-decoration: none;
    min-width: 180px;
  }

  .blue a {
    background-color: #01b8fe;
  }

  .green a {
    background-color: #239B56;
  }

  .jobs_control_wrap {
    text-align: center;
  }

  .jobs_control_wrap>div {
    display: inline-block;
  }

  .jobs_control_wrap .la_button {
    display: inline-block;
    width: 60px;
    height: 60px;
    line-height: 60px;
    border-radius: 50%;
    color: #5da857;
    border: none;
    font-weight: 700;
    margin: 10px;
    /* box-shadow: 0px 0px 5px 2px; */
    font-size: 23px;
    text-decoration: none;
  }

  .jobs_control_wrap .la_button.disabled {
    color: #212529;
    opacity: .3;
  }

  .jobs_control_wrap .la_button.disabled {
    pointer-events: none;
    cursor: default;
  }

  #SinglejobSlider .carousel-item {
    /* display: block; */
    position: unset;
    width: 100%;
    height: 100%;
  }

  button.carousel-control-next,
  button.carousel-control-prev {
    background: transparent;
  }

  span.carousel-control-next-icon,
  span.carousel-control-prev-icon {
    background: #fff;
    /* opacity: 1; */
    width: 38px;
    height: 38px;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 50%;
  }

  #SinglejobSlider .carousel-item img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
    max-height: 500px;
  }

  span.carousel-control-next-icon i,
  span.carousel-control-prev-icon i {
    color: #000;
  }

  .slider-container {
    position: relative;
    overflow: hidden;
    border-radius: 10px;
    -webkit-box-shadow: 0 0 20 rgba(0, 0, 0, 0.5);
    box-shadow: 0 0 20 rgba(0, 0, 0, 0.5);
    pointer-events: auto;
    margin: 0 auto 30px;
  }

  .slider {
    position: relative;
  }

  .slide {
    max-width: 700px;
    float: left;
    position: relative;
    overflow: hidden;
    min-height: 300px;
    max-height: 400px;
    display: flex;
  }

  .slide {
    max-width: 700px;
    float: left;
    position: relative;
    display: flex;
    max-height: 400px;
    height: 100%;
    width: 100%;
  }

  .slider img {
    margin: auto;
    max-width: 700px;
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
  }

  .sliderBtn {
    width: 40px;
    height: 40px;
    background-color: rgba(255, 255, 255, 0.3);
    border-radius: 100%;
    line-height: 43px;
    text-align: center;
    font-size: 20px;
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    z-index: 2;
    cursor: pointer;
    transition: all 0.5s ease;
  }

  .sliderBtn.prevBtn {
    left: 20px;
  }

  .sliderBtn.nextBtn {
    right: 20px;
  }

  .sliderBtn:hover {
    background-color: #fff;
  }

  .jbdetails {
    color: #ff7f27;
    font-weight: 600;
    margin-bottom: 10px;
  }

  .f-24 {
    font-size: 33px;
  }

  #menu {
    width: 30px;
    height: 35px;
    cursor: pointer;
    z-index: 100;
    margin: 20px 0px 20px 30px;
  }

  .bar {
    width: 30px;
    margin: 5px 0px;
    height: 3px;
    background-color: #0E0E0E;
    transition: 0.3s ease;
    border-radius: 5px;
    display: block;
  }

  .bar-a {
    width: 22px;
    margin: 5px 0px;
    height: 3px;
    background-color: #0E0E0E;
    transition: 0.3s ease;
    border-radius: 5px;
    display: block;
  }

  .bar-b {
    width: 22px;
    margin: 5px 0px;
    height: 3px;
    background-color: #0E0E0E;
    transition: 0.3s ease;
    border-radius: 5px;
    display: block;
  }

  .nav li a {
    color: #0E0E0E;
    text-decoration: none;
  }

  .decoration-none a {
    color: #fff;
    text-decoration: none;
    background-color: #ff7f27;
    padding: 6px 6px;
    font-size: 20px;
    border-radius: 50px;
  }

  /* .nav {
    padding: 0px;
    margin: 0px 20px;
    transition: 1s ease;
    /* display: none; */
  /* } */


  /* .nav li {
    padding: 15px 0px;
    list-style: none;
  } */

  .icon #bar1 {
    transform: rotate(135deg);
    width: 25px;
  }

  .icon #bar3 {
    transform: rotate(-135deg);
    margin-top: -16px;
    width: 25px;
  }

  .icon #bar2 {
    opacity: 0;
  }

  .l-0 {
    left: 0px;
  }

  .change {
    margin: 0;
    position: absolute;
    font-size: 20px;
    top: 45px;
    width: 145px;
    display: flex;
    flex-direction: column;
    background-color: #fff;
    z-index: 99999;
    transition: transform 250ms ease-in-out;
  }

  .jobs_navigation {
    display: flex;
    justify-content: space-between;
    align-items: center;

  }

  .jobs_navigation>div {
    display: inline-block;
    vertical-align: top;
  }

  .jobs_navigation>div:nth-child(2) {
    width: 100%;
    text-align: center;
    text-wrap: wrap;
  }

  .jobs_navigation>div:nth-child(3) {
    text-align: right;
  }

  .jobs_navigation a {
    text-decoration: none;
    color: #ff7f27;
    font-weight: 700;
    font-size: 37px;
    width: 37px;
    height: 37px;
    border-radius: 50%;
    background: transparent;
    line-height: 31px;
    display: inline-block;
    border: solid 2px;
    padding-left: 2px;
    text-align: center;
  }

  .jobs_navigation a.previousPageUrl {
    padding-left: 0px;
  }

  .inside_paint_undercoat a {
    color: #fff;
    text-decoration: none;
    padding: 6px 6px;
    font-size: 20px;
    border-radius: 50px;
    margin-top: 10px;
    display: inline-block;
  }

  .d_i_b {
    display: inline-block;
  }

  .map_icon {
    width: 30%;
    display: inline-block;
    text-align: end;
  }

  .map_icon img {
    width: 60px;
    height: 60px;
  }

  .home_icon {
    width: 30%;
    display: inline-block;
    text-align: left;
  }

  .home_icon i {
    font-size: 39px;
    color: grey;
  }

  .footer {
    width: 100%;
    position: static;
    bottom: 0;
  }

  .header .header-logo {
    display: block;
  }

  .header .header-logo img {
    max-width: 88px !important;
    width: 100%;
    margin: 5px auto;
  }

  .main-pg-title {
    font-size: 36px;
  }

  .pg-subtitle {
    font-size: 22px;
  }

  @media only screen and (max-width:767px) {
    .slider img {
      object-fit: contain !important;
    }

    .single_job .slider {
      height: 100% !important;
    }
  }

  @media (min-width: 480px) {
    .hidden-mobile {
      display: none;
    }

    .jobs_listing {
      padding: 0px !important;
    }
  }

  @media (max-width: 576px) {
    .padding-left {
      padding-left: 60px;
    }

    .main-pg-title {
      font-size: 28px;
    }

    .pg-subtitle {
      font-size: 22px;
    }

    .jbdetails.pg-subtitle.text-center {
      margin-bottom: 0px;
      padding: 0px 5px;
    }

  }
</style>

<div class="container jobs_listing position-relative">

  <!-- <div class="navigation hidden-mobile l-0 position-absolute">
   <div id="menu" onclick="onClickMenu()">
      <div id="bar1" class="icon  bar"></div>
      <div id="bar2" class="icon  bar-a"></div>
      <div id="bar3" class="icon  bar-b"></div>
    </div> -->
  <!-- <ul class="nav" id="nav">
      <li><a href="">About</a></li>
      <li><a href="">Home</a></li>
      <li><a href="">Blog</a></li>
      <li><a href="">Contact us</a></li>
    </ul> -->
  <!-- </div> -->
  <div class="header ">
    <div class="log header-logo">
      <a href="{{route('home')}}" class="text-center">
        <img src="/image/logo-phone.png" />
      </a>
    </div>
    <!-- <div class="profile_img">
      <a href="" class="text-center">
        <img src="{{ asset('/uploads/'.Auth::user()->photo) }}">
        <div class="title">{{Auth::user()->first_name.' '.Auth::user()->last_name}}</div>
      </a>
    </div> -->
    <div class="text-center">
      <div class="jbdetails main-pg-title text-center f-24">{{__('message.job_details')}}</div>
      @if($jobs->total())
      <div class="jobs_navigation">
        <div class="text-center ">
          @if($jobs->previousPageUrl())
          <a class="previousPageUrl" href="{{$jobs->previousPageUrl()}}">&#60;</a>
          @endif
        </div>
        <div class="jbdetails pg-subtitle text-center ">{{__('message.job')}} ({{$jobs->currentPage()}}) {{__('message.of')}} {{$jobs->total()}} Jobs</div>
        <div>
          @if($jobs->nextPageUrl())
          <a href="{{$jobs->nextPageUrl()}}">&#62;</a>
          @endif
        </div>
        <br>
      </div>
      @endif
      <div class="builder_details">
        @foreach($jobs as $single)
        <h3>Builder : {{$single->builder ? $single->builder->name : ''}}</h>
          @endforeach
      </div>
    </div>
  </div>
  <br>
  @forelse ($jobs as $key => $job)



  <div class="single_job single_job_{{$key}}">
    @if(count($job->GallaryPlan))
    <div class="slider-container">
      @if(count($job->GallaryPlan)==1)
      <img src="http://127.0.0.1:8000/gallery_images/5152236Screenshot (10).png" alt="">
      @else
      <div class="sliderBtn prevBtn"><i class="fas fa-chevron-left"></i></div>
      <div class="sliderBtn nextBtn"><i class="fas fa-chevron-right"></i></div>
      <div class="slider">
        @foreach ($job->GallaryPlan as $slide)
        <div class="slide">
          <img src="{{asset('/gallery_images/'.$slide->img_url) }}" alt="">
        </div>
        @endforeach
      </div>
      @endif
    </div>
    @endif
    <!-- @foreach ($jobs as $key => $job)
  <div id="SinglejobSlider" class="carousel slide" data-bs-ride="carousel">
    @foreach ($job->GallaryPlan as $slide)
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="{{asset('/gallery_images/'.$slide->img_url) }}" alt="">
      </div>
    </div>
    @endforeach
    <button class="carousel-control-prev" type="button" data-bs-target="#SinglejobSlider" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#SinglejobSlider" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  @endforeach -->




    <br>
    <div class="data-container">
      <div><strong>{{__('message.address')}}: {{$job->address}} </strong></div>
      <div><strong> </strong></div>
      <?php
      $OldDate = strtotime($job->start_date);
      $NewDate = date('M j, Y', $OldDate);
      $diff = date_diff(date_create(date("M j, Y")), date_create($NewDate));
      $created = new Carbon\Carbon($job->start_date);
      $now =  Carbon\Carbon::now();
      $difference = ($created->diff($now)->days < 1)
        ? 'today'
        : $created->diffForHumans($now);
      ?>

      <div> <strong>{{__('message.price')}} : {{$job->price? '$'.number_format($job->price): ''}}</div>
      <div> </div>
      <div>{{__('message.area')}} : {{$job->house_size}} </strong></div>
      <div></div>
      <div>{{__('message.start_date')}} : {{date('j M, Y', strtotime($job->start_date))}} ( {{$difference}} ) </div>
      <div> </div>
      <div> {{__('message.received_date')}} : {{date('j M, Y', strtotime($job->received_date))}} </div>
      <div> </div>
      <div>{{__('message.stairs_stained')}} : {{$job->stairs_stained==1? 'Yes' : 'No'}}</div>
      <div> </div>
      <div> {{__('message.cladding')}} : {{$job->cladding==1? 'Yes' : 'No'}}</div>
      <div> </div>
      <div> {{__('message.render')}} : {{$job->render==1? 'Yes' : 'No'}}</div>
      <div> {{__('message.BuilderCompanyName')}} : {{$job->builder_company_name}}</div>
      <div> </div>
      <div class="jobs_controll_buttons">
        <div><br><br>
          <div class="decoration-none mt-2 mb-2 d_i_b"> <a href="#collapseExample" data-bs-toggle="collapse" aria-expanded="false" role="button" aria-controls="collapseExample">{{__('message.see_all_documents')}}</a></div>
        </div>
        <div class="collapse" id="collapseExample">
          <div class="single_file ">
            @if($job->plan)
            <div> <a href="{{asset('/uploads/'.$job->plan)}}" target="_blank">{{__('message.see_plans')}}</a></div>
            @endif
            @if($job->plan_granny)
            <div > <a href="{{asset('/uploads/'.$job->plan_granny)}}" target="_blank">{{__('message.plan_granny')}}</a></div>
            @endif


            @if($job->colors)
            <div class="blue"> <a href="{{asset('/uploads/'.$job->colors)}}" target="_blank">{{__('message.colors')}}</a></div>
            @endif
            @if($job->po)
            <div class="blue"> <a href="{{asset('/uploads/'.$job->po)}}" target="_blank">{{__('message.po')}}</a></div>
            @endif
            @if($job->colors_secound)
            <div class="blue"> <a href="{{asset('/uploads/'.$job->colors_secound)}}" target="_blank">{{__('message.colors_secound')}}</a></div>
            @endif

            @if($job->colors_spec)
            <div class="blue"> <a href="{{asset('/uploads/'.$job->colors_spec)}}" target="_blank">{{__('message.colors_spec')}}</a></div>
            @endif

            

            {{-- <?php $i = 1; ?>
            @foreach($job->poItems as $poItem)
                @if($poItem->file)
                <div class="green"> <a href="{{asset('/uploads/'.$poItem->file)}}" target="_blank">P.O {{$i++}}</a></div>
                @endif
            @endforeach --}}


            <?php $i = 1; ?>
            @foreach ($job->poItems as $poItem)
                @if ($poItem->file)
                <div class="green">
                    <a href="{{ asset('/uploads/'.$poItem->file) }}" target="_blank">P.O {{$i++}}</a>
                </div>
                @endif
            @endforeach



          </div>
        </div>
        <div class="inside_paint_undercoat green d_i_b" style="background: none !important;">
          <a href="{{ route('inside_paint_undercoat', ['painterjob'=> $job->id]) }}">Order Paint For This Job</a>
        </div>
      </div>
    </div>
  </div>
  <br><br><br><br>
  <div class="footer">
    <div class="home_icon d_i_b">
      <a href="{{ route('main') }}"><i class="fa-solid fa-house"></i></a>
    </div>
    <!--
    <div class="la_next_page d_i_b">
      <a href="{{ route('main') }}">Go</a>
    </div>  -->
    <div class="map_icon d_i_b">
      <a href="{{ route('show_on_map',['id'=> $job->id]) }}"><img src="{{asset('/new_images/map.png')}}" alt=""></a>
    </div>
  </div>
</div>
<!-- <div class="jobs_control_wrap">
    <div>
      <a class="la_button active">{{$jobs->total()}}</a>
      <p>Total Jobs</p>
    </div>
    <div>
      <a href="{{$jobs->previousPageUrl()}}" class="la_button {{$jobs->previousPageUrl()? 'active' :'disabled'}}">&#60;</a>
      <p>Previous</p>
    </div>
    <div>
      <a href="{{$jobs->nextPageUrl()}}" class="la_button {{$jobs->nextPageUrl()? 'active' :'disabled'}}">&#62;</a>
      <p>Next</p>
    </div>
    <div>
      <a class="la_button active">{{$jobs->currentPage()}}</a>
      <p>Current Job</p>
    </div>
  </div>
  <div class="la_next_page">
    <a href="{{ route('inside_paint_undercoat', ['painterjob'=> $job->id, 'type' => 'inside']) }}">Go</a>
  </div> -->
@empty
<p>You have no jobs from builder today</p>
@endforelse
</div>
@endsection
@section('js')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="{{asset('assets/vendor/jquery/jquery.js')}}"></script>
<script>
  $(document).ready(function() {
    var sldrCont = $('.slider-container'),
      sldr = $('.slider'),
      sldrSlid = $('.slider .slide');
    sldLstChild = $('.slider .slide:last-child'),
      sldFstChild = $('.slider .slide:first-child'),
      prvBtn = $('.prevBtn'),
      nxtBtn = $('.nextBtn');
    sldrSlid.css({
      width: sldrCont.width()
    });
    var slideLength = $(sldrSlid).length,
      slideWidth = $(sldrSlid).width(),
      slideHeight = $(sldrSlid).height(),
      sliderWidth = slideWidth * slideLength;
    // Slider main Container width and height as per slide w/h
    $(sldrCont).css({
      width: slideWidth
    });
    // Slider width as per all slide width
    $(sldr).css({
      'width': sliderWidth,
      'margin-left': -slideWidth
    });
    // Slide last child 
    $(sldLstChild).prependTo(sldr);
    // Slide left moving arrow
    function moveLeft() {
      $(sldr).animate({
        left: +slideWidth
      }, 500, function() {
        $('.slider .slide:last-child').prependTo(sldr);
        $(sldr).css('left', '');
      });
    };
    // Slide right moving arrow
    function moveRight() {
      $(sldr).animate({
        left: -slideWidth
      }, 500, function() {
        $('.slider .slide:first-child').appendTo(sldr);
        $(sldr).css('left', '');
      });
    };
    $(prvBtn).on('click', function() {
      moveLeft();
    });
    $(nxtBtn).on('click', function() {
      moveRight();
    });
    // Auto sliding
    setInterval(function() {
      moveRight();
    }, 50000); // slideTiming
  });
  /* bargur-menu */
  // function onClickMenu() {
  //   document.getElementById("menu").classList.toggle("icon");

  //   document.getElementById("nav").classList.toggle("change");
  // }
</script>
@endsection 