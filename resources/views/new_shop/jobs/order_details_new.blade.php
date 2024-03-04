@extends('layouts.app')
@section('content')

<?php
require  public_path() . '/painter/header.php';
// require  public_path() . '/painter/sidebar-2.php';
?>

<style>
    .container {
        max-width: 1050px;
    }

    .inside-data-cst {
        padding-left: 5px !important;
    }

    .la_single-first {
        padding-left: 5px !important;
    }

    .keynew {
        display: none;
    }

    .new {
        display: none;
    }

    .logo {
        /* margin: 20px 0; */
        display: inline-block;
    }

    #intro {
        background-repeat: no-repeat;
        background-position: center bottom;
        background-size: cover;
    }

    .la_next_page {
        font-size: 20px;
        text-align: center
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

    .la_hide_qty,
    .la_hide_save {
        display: none;
    }

    .intro_main_wrap_cstm {
        position: absolute;
        background-color: #fff;
        left: 0;
        width: 100%;
        max-width: 1020px;
        /* margin: 0 0 30px 300px; */
        right: 0;
        box-shadow: 0 0 7px #888;
        top: 30px;
        padding: 0 0 20px;
    }

    .intro_main_wrap_cstm .section-header {
        padding-top: 50px !important;
        /* padding-bottom: 50px !important; */
    }

    .detail-selection .form-control {
        height: 26px;
        padding: 0;
        font-size: 16px;
    }

    body {
        background-color: #fff !important;
        font-family: unset !important;
    }

    .main_wrap .order-lines {
        margin-bottom: 10px !important;
    }

    .detail-selection a {
        color: #0d6efd;
        text-decoration: underline;
    }

    .main_wrap .order-wrapper {
        margin-top: 15px !important;
    }

    /* new style*/
    .custom-checkbox.form-group {
        display: block;
        margin-bottom: 0px;
    }

    .outside-order-wrap span {
        font-size: 18px;
        line-height: 25px;
        color: #000;
    }

    .custom-checkbox.form-group input {
        padding: 0;
        height: initial;
        width: initial;
        margin-bottom: 0;
        display: none;
        cursor: pointer;
    }

    .custom-checkbox.form-group label {
        position: relative;
        cursor: pointer;
        padding-left: 0px;
    }

    .form-group.tick-cst label:before {
        content: '';
        -webkit-appearance: none;
        background-color: transparent;
        border: 1px solid #000;
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05), inset 0px -15px 10px -12px rgba(0, 0, 0, 0.05);
        padding: 10px;
        display: inline-block;
        position: relative;
        vertical-align: middle;
        cursor: pointer;
        transform: unset;
        margin-right: 0px;
        top: 0;
        left: 0px !important;
        width: 30px;
        height: 27px;

    }

    .tick-cst {
        margin-bottom: 0px;
    }

    .custom-checkbox.form-group label:after {
        content: '';
        display: block;
        position: absolute;
        top: 0px;
        left: 10px;
        width: 10px;
        height: 23px;
        border: solid #41b922;
        border-width: 0 4px 4px 0;
        transform: rotate(45deg);
        border-radius: 2px;
    }

    .custom-checkbox.form-group.tick-cst.inside-tick.form-group label:after {
        display: none;
    }

    .custom-checkbox.form-group.tick-cst.inside-tick.custom-checkbox-inside.form-group label:after {
        display: block !important;
    }

    .logo-header {
        margin-bottom: 22px !important;
    }

    .custom-checkbox-outside label:after {
        display: none !important;
    }

    .custom-checkbox-inside label:after {
        display: none !important;
    }

    .outside-tick-cst-data {
        display: none !important;
    }

    .outside-order-wrap {
        display: flex;
        justify-content: space-between;
        background: #E4F2FF;
        border-radius: 20px;
        align-items: center;
        padding: 10px 20px;
    }

    .outside-data .form-control,
    .inside-data .form-control {
        /* padding: 5px 5px !important; */
        height: unset;
    }

    .buttons-wrapper {
        background: #BADEFF;
        padding: 7px 13px;
        margin: 0 auto;
        text-align: center;
        border-radius: 20px 20px 0px 0px;
        margin-top: 9rem;
    }

    button.Cancel-btn {
        background-color: #d8e8f785;
        border-radius: 15px;
        width: 100%;
        max-width: 290px;
        padding: 4px 0px;
        font-size: 20px;
        font-weight: 700;
        border: 4px solid #fff;
    }

    .outside-area-cst-data {
        color: #7C7E86 !important
    }

    .outside-area-data {
        display: none !important
    }

    button.finish-btn {
        display: block;
        width: 100%;
        max-width: 417px;
        margin: 0 auto;
        background-color: rgba(3, 103, 253, 1);
        border: 4px solid #fff;
        border-radius: 15px;
        padding: 0;
        text-transform: initial;
        color: #fff;
        font-weight: 700;
        font-size: 50px;
        margin-top: 10px;
        height: unset;
        line-height: 53px;
    }

    .order-select-box {
        justify-content: end;
    }

    .header_circle:after {
        display: none !important;
    }




    .deliver-method.la_buttons div.form-group label {
        font-size: 14px;
    }

    .deliver-method.la_buttons div.form-group img {
        width: 30px !important;
    }

    .deliver-method .form-group.la_button_1:hover,
    .deliver-method .form-group.la_button_3:hover {
        background: transparent !important;
    }

    .deliver-method .form-group.la_button_1:hover label,
    .deliver-method .form-group.la_button_3:hover label {
        color: #9e9e9e !important;
    }

    .main-text {
        color: #9e9e9e !important;
    }

    .la_buttons.header_circle.mb-2.deliver-method .form-group.la_button.la_button_2.active {
        background: #0367fd !important;
    }

    /* .outside-tick label:after{
        display: none !important;
    } */

    .deliver-method {
        margin-bottom: 20px !important;
    }

    button.Cancel-btn a {
        color: rgba(0, 0, 0, 1);
        text-decoration: none;
        font-size: 20px;
        line-height: 27px;
    }



    .outside-new {}

    @media only screen and (min-width:767px) {
        .deliver-method {
            display: none;
        }
    }

    @media(min-width:480px) {
        .detail-selection .form-control {
            padding: 0px 5px;
        }
    }

    @media(min-width:991px) {
        .intro_main_wrap_cstm {
            max-width: 100%;
        }
    }

    @media(min-width:1200px) {
        .intro_main_wrap_cstm {
            max-width: 73%;
        }
    }

    @media(min-width:1300px) {
        .intro_main_wrap_cstm {
            max-width: 75%;
        }
    }

    @media (max-width: 991px) {
        .intro_main_wrap_cstm {
            max-width: 95%;
            margin: 0 auto;
        }

        .order-select-box {
            justify-content: center;
        }
    }

    @media only screen and (max-width:767px) {

        .header_circle.la_buttons {
            margin: 0px 7px;
        }

        .row.detail-selection {
            margin-bottom: 200px !important;
        }

        button.finish-btn {
            font-size: 44px;
            line-height: 49px;
        }

        .buttons-wrapper {
            margin-top: 0px;
        }

        .footer-cst {
            padding: 0px 20px;
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            margin-top: 100px !important;
        }
    }

    @media only screen and (max-width:575px) {
        .footer-cst {
            padding: 0px;
        }

    }

    @media (max-width:600px) {
        .container-fluid {
            display: unset;
        }

        .intro_main_wrap_cstm {
            top: -21px !important;
        }

        .select-col {
            padding-left: 10px !important;
        }

        .intro_main_wrap_cstm .section-header {
            padding-top: 0px !important;
        }
    }

    @media (min-width: 450px) {
        .blank-col {
            display: none;
        }

    }

    @media (max-width: 450px) {
        .jobs_controll_buttons a strong {
            font-size: 18px !important;
        }

        .form-control {
            padding-left: 5px;
        }

        .header_circle.la_buttons {
            padding: 5px;
        }

        .footer-cst {
            padding: 0px 0px;
        }

        .detail-selection select.la_qty {
            width: 100% !important;
        }

        .la_save {
            padding: 0px;
            text-align: right;
        }

        .intro_main_wrap_cstm {
            max-width: 100%;
            margin: 0 auto;
        }

        /* .la_single-first {
            width: 59% !important;
            padding-right: 0px !important;
        } */

    }

    @media only screen and (max-width:480px) {
        .select-left-col {
            padding-left: 20px !important;
        }

    }

    @media only screen and (max-width:375px) {
        .inside-main-data .select-left-col {
            padding-left: 10px !important;
        }

        .order-lines .jobs_controll_buttons a strong {
            font-size: 16px !important;
        }
    }
</style>


<div>
    <header>
			<div class="header-row">
				<div class="header-item">
				 <a href="{{ url()->previous() }}"> <i class="fa-solid fa-arrow-left"></i> </a>	
					<span> Create Invoice </span>
					<a href="<?php echo '/main' ?>">   <img src="/image/logo-phone.png" alt="Logo"> </a>   
				</div>
			</div>
		</header>	

    {{-- @include('layouts.partials.footer')   --}}
    <div id="intro">
        <div class="main_wrap intro_main_wrap_cstm main_login pt-5" style="margin-top: 70px;">
            <div id="page-content-wrapper==">
                <div class="container-fluid">
             
                    <div class="la_buttons header_circle mb-2 deliver-method">
                        <div class="form-group la_button la_button_1 ">
                            <div class="la-form-group">
                                <img src="{{asset('/new_images/click.png')}}" alt="">
                                <label>{{__('message.details')}}</label>
                            </div>
                        </div>
                        <div class="form-group la_button la_button_2 active">
                            <div class="la-form-group">
                                <img src="{{asset('/new_images/copy.png')}}" alt="">
                                <label>{{__('message.order')}}</label>
                            </div>
                        </div>
                        <div class="form-group la_button la_button_3 ">
                            <div class="la-form-group">
                                <img src="{{asset('/new_images/delivery-truck.png')}}" alt="">
                                <label>{{__('message.delivery')}}</label>
                            </div>
                        </div>
                    </div>
                    <div class="row detail-selection ">
                        <div class="col p-0">
                            <div class="main-section">
                                <form method="post" action="{{route('updateJob',['id'=>$painterjob->id])}}" enctype="multipart/form-data">
                                    @csrf
                                    @if($outside)
                                    <div class="row ">
                                        <div class="col-lg-8 col-md-8 col-sm-12 col-12 m-auto mb-4 p-2">
                                            <div class="outside-order-wrap outside-wrap">
                                                <span>Tick here to order outside </span>
                                                <div class="custom-checkbox form-group tick-cst outside-tick">
                                                    <input type="checkbox" id="outside" class="checkbox-outside">
                                                    <label for="outside"></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="outside-data">
                                        @foreach ($outside as $key=> $item)
                                        <input type="hidden" value='<?php echo $item->id ?>' id='input_<?php echo $item->id ?>' class="item-cst">
                                        <div class="row">
                                            <div class="col-lg-8 col-md-8 col-sm-12 col-12 m-auto mb-4 p-2">
                                                <div class="row order-lines align-items-center" value='1'>
                                                    <div class="col-0"></div>
                                                    <div class="col-md-6 col-sm-6 col-7 ps-0 px-2 la_single-first">
                                                        <div class="outside-collapse-cst outside-data-cst">
                                                            <div class="jobs_controll_buttons">
                                                                <div class="decoration-none outside-area-cst  mt-2 mb-2 d_i_b"><a class='area-heading' href="#{{$item->id}}collapseExample" data-bs-toggle="collapse" aria-expanded="false" role="button" aria-controls="{{$item->id}}collapseExample"><strong style="font-size: 20px">{{$item->area}} : </strong> <br></a></div>
                                                            </div>
                                                            <div class="collapse main-cst show" id="{{$item->id}}collapseExample">
                                                                <div class="single_file " style="font-size: 16px;">
                                                                    {{$item->brand? $item->brand->name :''}} - {{$item->color}} <br>
                                                                    {{$item->product}} <br>
                                                                    {{$item->note}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-5 la_single_item p-0 outside-main-data" value='m'>
                                                        <div class="row mb-2 mt-2 order-select-box">
                                                            <!-- <div class="col-sm-0 col-2 p-0 blank-col"></div> -->
                                                            <div class="col-lg-5 md- col-sm-5 col-7 px-sm-2  px-xs-4 p-0 select-left-col ">
                                                                <select data-current_value="{{$item->size}}" data-item_id=<?php echo $item->id ?> id='item_<?php echo $item->id ?>' name="outside[{{$item->key}}][size]" class="la_size la_size_filter la_size-outside form-control padding s_h clickget ">
                                                                    <!--<option value="100" {{$item->size==100? 'selected':'' }}>Select</option>  -->
                                                                    <option value="15" data-item_id-cst=<?php echo $item->size ?> {{$item->size==15? 'selected=selected':'' }}>15 L</option>
                                                                    <option value="10" data-item_id-cst=<?php echo $item->size ?> {{$item->size==10? 'selected=selected':'' }}>10 L</option>
                                                                    <option value="4" data-item_id-cst=<?php echo $item->size ?> {{$item->size==4? 'selected=selected':'' }}>4 L</option>
                                                                    <option value="2" data-item_id-cst=<?php echo $item->size ?> {{$item->size==2? 'selected=selected':'' }}>2 L</option>
                                                                    <option value="1" data-item_id-cst=<?php echo $item->size ?> {{$item->size==1? 'selected=selected':'' }}>1 L</option>
                                                                    <option value="101" data-item_id-cst=<?php echo $item->size ?> {{$item->size==101? 'selected=selected' :''}}>None</option>
                                                                    <option value="102" data-item_id-cst=<?php echo $item->size ?> {{$item->size==102? 'selected=selected' :''}}>Call Me</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-lg-5 col-sm-5 px-sm-2  px-col-2 col-4 p-0 select-col">
                                                                <select data-current_value="{{$item->qty}}" name="outside[{{$item->key}}][qty]" class="la_qty la_qty-outside la_hide_qty form-control padding s_h clickget ">

                                                                    @for ($i = 0; $i <= 20; $i++) <?php
                                                                                                    if ($item->qty == '' || $item->qty == NULL) {
                                                                                                        $select = '';
                                                                                                    } else {
                                                                                                        $select = $item->qty == $i ? 'selected' : '';
                                                                                                    }
                                                                                                    ?> <option data-id="{{$item->qty}}" value="<?php echo $i; ?>" <?php echo $select ?>><?php echo $i; ?></option>
                                                                        @endfor
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                 @foreach($garagePaints as $garagePaint)
                                                    @if (strtolower(trim($item->product)) == strtolower(trim($garagePaint->product)) && $item->brand != null && $item->brand->id == $garagePaint->brand_id && strtolower(trim($item->color)) == strtolower(trim($garagePaint->color)))
                                                        {{-- @if(strtolower(trim($item->product)) == strtolower(trim($garagePaint->product)) && $item->brand->id == $garagePaint->brand_id ) --}}

                                                       <div  id="card-{{ $garagePaint->id }}" class="row bg-success text-white justify-content-center align-items-center " style="border-radius: 5px; margin-top: 50px;" >
                                                           
                                                            <div class="col-6 text-left">
                                                                <p>Use Your Garage Paint</p>      
                                                            </div>
                                                            <div class="col-6 pt-3" >
                                                               <div class="row d-flex justify-content-center align-items-center">
                                                                <div class="col-7 text-center">
                                                                    <input type="text" id="inputFieldSize" class="form-control text-light" readonly style="border: 1px solid #fff; border-radius: 5px;" value="{{$garagePaint->size}}L" />
                                                                </div>
                                                                <div class="col-5 text-center">
                                                                         <form action="{{ route('garage-paints.destroy', $garagePaint->id) }}" method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                       <!-- Button with larger icon -->
                                                                       <button type="button" onclick="confirmDelete({{ $garagePaint->id }})" style="position: absolute;  right: -25px; top: -25px; background: transparent; border: none;  color: red; padding:10px;">
                                                                            <i class="fas fa-times-circle fa-1x"></i>
                                                                        </button>



                                                                    </form>

                                                                   
                                                                    <input type="text" id="inputFieldQuantity" class="form-control text-light" readonly style="border: 1px solid #fff; border-radius: 5px;" value="{{$garagePaint->quantity}}"/>
                                                                </div>
                                                             
                                                            </div>

                                                            </div>
                                                        </div>                                                                                                               

                                                          
                                                    @endif
                                                  
                                                @endforeach
                                            </div>
                                        </div>
                                        <?php
                                        ?>
                                        @endforeach
                                    </div>
                                    @endif
                                    @if($inside)
                                    <div class="row ">
                                        <div class="col-lg-8 col-md-8 col-sm-12 col-12 m-auto mb-4 p-2">
                                            <div class="outside-order-wrap inside-wrap">
                                                <span>Tick here to order Inside </span>
                                                <div class="custom-checkbox form-group tick-cst inside-tick">
                                                    <input type="checkbox" id="inside" class="checkbox-inside">
                                                    <label for="inside"></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="inside-data">
                                        @foreach ($inside as $item)
                                        <div class="row ">
                                            <div class="col-lg-8 col-md-8 col-sm-12 col-12 m-auto mb-4 p-2">
                                                <div class="row order-lines align-items-center">
                                                    <div class="col-0"></div>
                                                    <div class="col-md-6 col-sm-6 col-7 ps-0 px-2 la_single-first inside-data-cst">
                                                        <div class="jobs_controll_buttons">
                                                            <div class="decoration-none inside-area-cst mt-2 mb-2 d_i_b"><a class="area-heading" href="#{{$item->id}}collapseExample" data-bs-toggle="collapse" aria-expanded="false" role="button" aria-controls="{{$item->id}}collapseExample"><strong style="font-size: 20px">{{$item->key}} : </strong> <br></a></div>
                                                        </div>
                                                        <div class="collapse inside-data-cst-main show" id="{{$item->id}}collapseExample">
                                                            <div class="single_file " style="font-size: 16px;">
                                                                {{$item->brand? $item->brand->name :''}} - {{$item->color}} <br>
                                                                {{$item->product}} <br>
                                                                {{$item->note}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-5 la_single_item p-0 inside-main-data">
                                                        <div class="row mb-2 mt-2 order-select-box">
                                                            <div class="col-sm-0 col-0 p-0 blank-col"></div>
                                                            <div class="col-lg-5 md- col-sm-5 col-7 px-sm-2  px-xs-4 p-0 select-left-col">
                                                                <select data-current_value="{{$item->size}}" name="inside[{{$item->key}}][size]" class="la_size la_size-inside form-control padding s_h clickget ">
                                                                    <!--<option value="100" {{$item->size==100? 'selected':'' }}>Select</option>  -->
                                                                    <option value="15" data-item_id-cst=<?php echo $item->size ?> {{$item->size==15? 'selected':'' }}>15 L</option>
                                                                    <option value="10" data-item_id-cst=<?php echo $item->size ?> {{$item->size==10? 'selected':'' }}>10 L</option>
                                                                    <option value="4" data-item_id-cst=<?php echo $item->size ?> {{$item->size==4? 'selected':'' }}>4 L</option>
                                                                    <option value="2" data-item_id-cst=<?php echo $item->size ?> {{$item->size==2? 'selected':'' }}>2 L</option>
                                                                    <option value="1" data-item_id-cst=<?php echo $item->size ?> {{$item->size==1? 'selected':'' }}>1 L</option>
                                                                    <option value="101" data-item_id-cst=<?php echo $item->size ?> {{$item->size==101? 'selected' :''}}>None</option>
                                                                    <option value="102" data-item_id-cst=<?php echo $item->size ?> {{$item->size==102? 'selected' :''}}>Call Me</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-lg-5 col-sm-5 px-sm-2  px-col-2 col-4 p-0 select-col">
                                                                <select data-current_value="{{$item->qty}}" name="inside[{{$item->key}}][qty]" class="la_qty la_qty-inside la_hide_qty form-control padding s_h clickget ">
                                                                    @for ($i = 0; $i <= 20; $i++) <?php
                                                                                                    if ($item->qty == '' || $item->qty == NULL) {
                                                                                                        $select = '';
                                                                                                    } else {
                                                                                                        $select = $item->qty == $i ? 'selected' : '';
                                                                                                    }
                                                                                                    ?> <option data-id="{{$item->qty}}" value="<?php echo $i; ?>" <?php echo $select ?>><?php echo $i; ?></option>
                                                                        @endfor
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                   @foreach($garagePaints as $garagePaint)

                                                  @if (strtolower(trim($item->product)) == strtolower(trim($garagePaint->product)) && $item->brand != null && $item->brand->id == $garagePaint->brand_id && strtolower(trim($item->color)) == strtolower(trim($garagePaint->color)))
                                                    
                                                   {{-- @if($item->product === $garagePaint->product || ($item->brand && $item->brand->id === $garagePaint->brand_id)) --}}
                                                       <div id="card-{{ $garagePaint->id }}"  class="row bg-success text-white justify-content-center align-items-center mt-5" style="border-radius: 5px;" >
                                                            <div class="col-6 text-left">
                                                                <p>Use Your Garage Paint</p>      
                                                            </div>
                                                            <div class="col-6 pt-3" >
                                                               <div class="row d-flex justify-content-center align-items-center">
                                                                <div class="col-7 text-center">
                                                                    <input type="text" id="inputFieldSize" class="form-control text-light" readonly style="border: 1px solid #fff; border-radius: 5px;" value="{{$garagePaint->size}}L" />
                                                                </div>
                                                                <div class="col-5 text-center">
                                                                     <form action="{{ route('garage-paints.destroy', $garagePaint->id) }}" method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                       <!-- Button with larger icon -->
                                                                        {{-- <button type="button" onclick="confirmDelete({{ $garagePaint->id }})" style="position: absolute; color:red; right: -10px; top: -25px; border-radius: 50%;border:0px solid #fff !important; font-size:100%">
                                                                            <i class="fas fa-times-circle fa-2x"></i>
                                                                        </button> --}}
                                                                         <button type="button" onclick="confirmDelete({{ $garagePaint->id }})" style="position: absolute;  right: -25px; top: -25px; background: transparent; border: none;  color: red; padding:10px;">
                                                                            <i class="fas fa-times-circle fa-1x"></i>
                                                                        </button>

                                                                    </form>
                                                                    <input type="text" id="inputFieldQuantity" class="form-control text-light" readonly style="border: 1px solid #fff; border-radius: 5px;" value="{{$garagePaint->quantity}}"/>
                                                                </div>
                                                            </div>

                                                            </div>
                                                        </div>                                                                                                                

                                                       @endif   
                                                    
                                                  
                                                @endforeach
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    @endif
                                    @include('painter_order.orderdetailfooter')
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script src="{{ asset('/assets/vendor/jquery/jquery.js')}}"></script>




<script>
    function confirmDelete(itemId) {
    if(confirm('Are add your item, if you not add items please add?')) {
        $.ajax({
            url: '/add_gerag/' + itemId, // Update the URL as per your route
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                _method: 'DELETE'
            },
            success: function(response) {
                // Handle success (e.g., show a success message, remove the item from the page)
                  $('#card-' + itemId).remove();
                alert('Item deleted successfully');
            },
            error: function(xhr) {
                // Handle error
                alert('Error deleting item');
            }
        });
    }
}
    $(document).ready(function() {
        a = $(location).attr('href');
        var part = a.substring(a.lastIndexOf('=') + 1);
        if (part == 'new') {
            $(".outside-data-cst a").toggleClass('outside-area-cst-data');
            $(".outside-data-cst").toggleClass('outside-new');
            $(".outside-collapse-cst").toggleClass('outside-area-cst-data');
            $(".outside-main-data").toggleClass('outside-area-data');
            $(".outside-tick").toggleClass('custom-checkbox-outside');
            $(".inside-data-cst a").toggleClass('outside-area-cst-data');
            $(".inside-data-cst").toggleClass('inside-new');
            $(".inside-data-cst-main").toggleClass('outside-area-cst-data');
            $(".inside-main-data").toggleClass('outside-area-data');
            $(".inside-tick").toggleClass('custom-checkbox-outside');
            $('.la_size-outside').val('');
            $('.la_qty-outside').val('');
            $('.la_size-inside').val('');
            $('.la_qty-inside').val('');
        } else {
            $(".inside-data-cst a").toggleClass('outside-area-cst-data');
            $(".inside-data-cst").toggleClass('inside-new');
            $(".inside-data-cst-main").toggleClass('outside-area-cst-data');
            $(".inside-main-data").toggleClass('outside-area-data');
            $(".inside-tick").toggleClass('custom-checkbox-outside');
            $('.la_size-inside').val('');
            $('.la_qty-inside').val('');
            $(".la_qty-outside").each(function() {
                var cur_value = $('option:selected', this).attr('data-id');
                if (cur_value == 0) {
                    $(this).parents('.la_single_item').find('.la_size').val('101');
                }
            });
        }
    });

    $('.outside-wrap , .checkbox-outside').on('click', function() {
        $(".outside-data-cst a").toggleClass('outside-area-cst-data');
        $(".outside-data-cst").toggleClass('outside-new');
        $(".outside-collapse-cst").toggleClass('outside-area-cst-data');
        $(".outside-main-data").toggleClass('outside-area-data');
        $(".outside-tick").toggleClass('custom-checkbox-outside');
        if ($('.outside-data-cst').hasClass('outside-new')) {
            $('.la_size-outside').val('');
            $('.la_qty-outside').val('');
        } else {
            $("select.la_size_filter").each(function(index) {
                var size = $(this).find('option').attr('data-item_id-cst');
                $(this).val(size);
                if (size > 100) {
                    $(this).parents('.la_single_item').find('.la_qty').addClass('la_hide_qty');
                    $(this).parents('.align-items-center').children('.la_single-first').find('.single_file').addClass('main-text');
                    $(this).parents('.align-items-center').children('.la_single-first').find('.area-heading').addClass('main-text');
                }
            });
            $("select.la_qty-outside").each(function(index) {
                var qty = $(this).find('option').attr('data-id');
                $(this).val(qty);
                if (qty == 0) {
                    $(this).parents('.la_single_item').find('.la_size').val('101');
                    $(this).addClass('la_hide_qty')
                    $(this).parents('.align-items-center').children('.la_single-first').find('.single_file').addClass('main-text');
                    $(this).parents('.align-items-center').children('.la_single-first').find('.area-heading').addClass('main-text');
                }
            });
        }
    });

    $('.inside-wrap, .checkbox-inside').on('click', function() {
        $(".inside-data-cst a").toggleClass('outside-area-cst-data');
        $(".inside-data-cst").toggleClass('inside-new');
        $(".inside-data-cst-main").toggleClass('outside-area-cst-data');
        $(".inside-main-data").toggleClass('outside-area-data');
        $(".inside-tick").toggleClass('custom-checkbox-inside');
        if ($('.inside-data-cst').hasClass('inside-new')) {
            $('.la_size-inside').val('');
            $('.la_qty-inside').val('');
        } else {
            $("select.la_size-inside").each(function(index) {
                var size = $(this).find('option').attr('data-item_id-cst');
                $(this).val(size);
                if (size > 100) {
                    $(this).parents('.la_single_item').find('.la_qty').addClass('la_hide_qty');
                    $(this).parents('.align-items-center').children('.la_single-first').find('.single_file').addClass('main-text');
                    $(this).parents('.align-items-center').children('.la_single-first').find('.area-heading').addClass('main-text');
                }
            });
            $("select.la_qty-inside").each(function(index) {
                var qty = $(this).find('option').attr('data-id');
                $(this).val(qty);
                if (qty == 0) {
                    $(this).parents('.la_single_item').find('.la_size').val('101');
                    $(this).addClass('la_hide_qty')
                    $(this).parents('.align-items-center').children('.la_single-first').find('.single_file').addClass('main-text');
                    $(this).parents('.align-items-center').children('.la_single-first').find('.area-heading').addClass('main-text');
                }
            });
        }
    });

    $(document).ready(function() {
        $(".la_size").each(function() {
            var cur_value = $('option:selected', this).val();
            if (cur_value < 100 || cur_value == undefined) {
                $(this).parents('.la_single_item').find('.la_qty').removeClass('la_hide_qty');
            } else {
                $(this).parents('.align-items-center').children('.la_single-first').find('.single_file').addClass('main-text');
                $(this).parents('.align-items-center').children('.la_single-first').find('.area-heading').addClass('main-text');
            }
        });

        $(".la_qty").each(function() {
            var cur_value = $('option:selected', this).val();
            if (cur_value == 0) {
                $(this).parents('.align-items-center').children('.la_single-first').find('.single_file').addClass('main-text');
                $(this).parents('.align-items-center').children('.la_single-first').find('.area-heading').addClass('main-text');
            }
        });

        $(".la_size").on('change', function() {
            var cur_value = $('option:selected', this).val();
            if (cur_value >= 100) {
                $(this).parents('.la_single_item').find('.la_qty').addClass('la_hide_qty');
                $(this).parents('.align-items-center').children('.la_single-first').find('.single_file').addClass('main-text');
                $(this).parents('.align-items-center').children('.la_single-first').find('.area-heading').addClass('main-text');
            } else {
                var data = $(this).parents('.la_single_item').val();
                $(this).parents('.la_single_item').find('.la_qty').removeClass('la_hide_qty');
                $(this).parents('.align-items-center').children('.la_single-first').find('.single_file').removeClass('main-text');
                $(this).parents('.align-items-center').children('.la_single-first').find('.area-heading').removeClass('main-text');
            }
            var la_qty_current = $(this).parents('.la_single_item').find('.la_qty').val();
            var la_qty_updated = $(this).parents('.la_single_item').find('.la_qty').data('current_value');
            if (cur_value != $(this).data('current_value') || la_qty_current != la_qty_updated) {
                $(this).parents('.la_single_item').find('.la_save').removeClass('la_hide_save');
            } else {
                $(this).parents('.la_single_item').find('.la_save').addClass('la_hide_save');
            }
        });

        $(".la_qty").on('change', function() {
            var cur_value = $('option:selected', this).val();
            if (cur_value > 0) {
                $(this).parents('.align-items-center').children('.la_single-first').find('.single_file').removeClass('main-text');
                $(this).parents('.align-items-center').children('.la_single-first').find('.area-heading').removeClass('main-text');
            } else {
                $(this).parents('.la_single_item').find('.la_size').val('101');
                $(this).addClass('la_hide_qty');
                $(this).parents('.align-items-center').children('.la_single-first').find('.single_file').addClass('main-text');
                $(this).parents('.align-items-center').children('.la_single-first').find('.area-heading').addClass('main-text');
            }
            var la_size_current = $(this).parents('.la_single_item').find('.la_size').val();
            var la_size_updated = $(this).parents('.la_single_item').find('.la_size').data('current_value');
            if (cur_value != $(this).data('current_value') || la_size_current != la_size_updated) {
                $(this).parents('.la_single_item').find('.la_save').removeClass('la_hide_save');
            } else {
                $(this).parents('.la_single_item').find('.la_save').addClass('la_hide_save');
            }
        });
      
    });
</script>
@endsection
