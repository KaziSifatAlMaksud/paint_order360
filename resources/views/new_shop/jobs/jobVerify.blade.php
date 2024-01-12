@extends('layouts.app')
@section('content')
<style>
    .container {
        max-width: 1050px;

    }

    .logo {
        margin: 20px 0;
        display: inline-block;
    }

    #intro {
        background-repeat: no-repeat;
        background-position: center bottom;
        background-size: cover;
        margin-top: 30px;
    }

    .la_next_page {
        font-size: 20px;
        text-align: center
    }
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
</style>

<div class="container">
    <div class="section-header text-center logo-cst">
        <a class="logo" href="{{route('home')}}"><img src="{{ asset('image/logo-phone.png') }}" alt="tag"> </a>
    </div>
    <div id="intro">
        <div class="main_wrap main_login">
            <div id="page-content-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <h3> Please Check Your Order</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <h5> step 4/4</h5>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-lg-3 border-bottom border-info mx-n5">
                        </div>
                        <div class="col-lg-3 border-bottom border-info mx-n5">
                        </div>
                        <div class="col-lg-3 border-bottom border-info mx-n5">
                        </div>
                        <div class="col-lg-3 ">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            @foreach ($sections as $key=>$items)
                            <div class="row">
                                <div class="col mb-3 border">
                                    <h2> {{$key=='inside'? 'Interior Paint' : 'Exterior Paint' }}</h2>
                                </div>
                            </div>
                            @foreach ($items as $item)
                            <div class="row mb-3">
                                <div class="col-6">
                                    <strong>{{$painterjob->$key[$item->key]}} :</strong> <br>
                                    {{$item->brand? $item->brand->name :''}} - {{$item->color}} <br>
                                    {{$item->product}} <br>
                                    {{$item->note}}
                                </div>
                                <div class="col-6 text-end">
                                    @if($item->size<100) {{$item->sizes[$item->size]}} * {{$item->qty}}@else{{$item->sizes[$item->size]}} @endif </div>
                                </div>
                                @endforeach
                                @endforeach
                            </div>
                        </div>
                        <div class="la_next_page">
                            <a href="{{ route('completeJob', ['painterJob' => $painterjob->id]) }}">{{__('message.go')}}</a>
                            <p style="color:Green">Is this correct.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
    @section('content')
    @endsection
    @section('last_scripts')
    @endsection