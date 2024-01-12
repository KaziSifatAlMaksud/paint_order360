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
    }


    .la_next_page {
        font-size: 25px;
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

    .logo-cst {
        width: 70px;
        height: 70px;
        margin: 0 auto;
        margin-bottom: 25px;

    }

    .logo-cst img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
    }
</style>


<div class="container">
    <div class="section-header text-center logo-cst">
        <a class="logo" href="{{route('main')}}"><img src="{{ asset('image/logo-phone.png') }}" alt="tag"> </a>
    </div>

    <div id="intro">
        <div class="main_wrap main_login">
            <div id="page-content-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <h1 style="color:orange">congratulationsulations</h1>
                            <br>
                            <h3>Order completed!</h3>
                            <br>
                            <br>
                            <br>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <center>
                                Paint delivers tonight.</br>
                                <br>
                                Address : {{$painterjob->address}}.</br>

                                <!--you will receive alert for</br>  -->

                                </br>

                                This jod is ready to start : {{$painterjob->start_date}}
                            </center>
                        </div>
                    </div>

                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <div class="la_next_page">
                        <p>Home page</p>
                        <a href="{{ route('main') }}">{{__('message.go')}}</a>
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