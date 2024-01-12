@extends('layouts.app')


@section('content')



<style>
    .container {
        max-width: 1050px;

    }

    .logo {
        margin: 10px 0;
        display: inline-block;

    }

    a.logo img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
        max-width: 100px;
        max-height: 80px;
    }

    #intro {
        background-image: url("{{ asset('new_images/homepage.png') }}");

        background-repeat: no-repeat;
        background-position: center bottom;
        background-size: cover;
        padding-top: 30px;
        padding-bottom: 30px;
        min-height: calc(100vh - 60px);
        position: relative;
    }



    #page-content-wrapper {
        position: absolute;
        bottom: 10vh;
        text-align: center;
        width: 100%;

    }

    .nav-pills {
        background: #D6ECE9;
        -webkit-box-shadow: 0px 0px 6px rgb(0 0 0 / 7%);
        box-shadow: 0px 0px 6px rgb(0 0 0 / 7%);
        border-radius: 0.375rem;

    }

    .nav-pills .nav-item {
        width: 50%;
    }

    .nav-link {
        color: #222;
        font-size: 20px;
    }

    .nav-pills .nav-link.active,
    .nav-pills .show>.nav-link {
        background-color: #2FD7EE;
        font-size: 20px;
    }

    .btn-custom {
        background-color: #2FD7CE;
        border-color: #2FD7CE;
        color: #fff;
        font-size: 25px;

    }
</style>


<div class="container">
    <div class="section-header text-center">
        <a class="logo" href="{{route('login')}}"><img src="{{ asset('image/logo-phone.png') }}" alt="tag"> </a>
    </div>

    <div id="intro">
        <div class="main_wrap main_login">
            <div id="page-content-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <ul id="pills-tab" role="tablist" class="nav nav-pills mb-30 register-tabs mb-2">
                                <li role="presentation" class="nav-item"><button id="pills-home-tab" class="nav-link active w-100 d-block">{{__('message.login')}}</button></li>
                                <li role="presentation" class="nav-item"><a id="pills-profile-tab" href="{{route('shop.register')}}" aria-selected="false" class="nav-link">{{__('message.register')}}</a></li>
                            </ul>

                            <div class="row">
                                <form method="post" action="{{route('shop.loginPost')}}">

                                    @if ($errors->any())
                                    <div class="alert alert-danger text-start">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif
                                    @csrf
                                    <div class="form-group mb-2">


                                        <input type="email" class="form-control" name="email" required="" placeholder="{{__('message.email')}}">
                                    </div>
                                    <div class="form-group mb-2">

                                        <input type="password" class="form-control" name="password" required="" placeholder="{{__('message.password')}}">
                                    </div>

                                    <!-- <div class="form-group mb-2">
                    <label class="label">
                      <input type="checkbox" class="login_remember" name="remember">
                      Remember me</label>

                  </div> -->
                                    <div class="form-group">
                                        <input type="submit" value="{{__('message.login')}}" name="login_user" class="btn btn-info form-control w-75 btn-custom">

                                    </div>
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
@include('layouts.partials.language')
@section('last_scripts')

@endsection