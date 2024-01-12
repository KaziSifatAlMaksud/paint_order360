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
    background-image: url("{{ asset('new_images/homepage.png') }}");
    background-repeat: no-repeat;
    background-position: center bottom;
    background-size: cover;
    padding-top: 30px;
    padding-bottom: 30px;
    min-height: calc(100vh - 60px);
    position: relative;
  }

  .main_wrap.smain_login {
    height: 100%;
  }

  #page-content-wrapper {
    position: absolute;
    bottom: 10vh;
    text-align: center;
    width: 100%;
  }

  .nav-pills {
    background: #fff;
    -webkit-box-shadow: 0px 0px 6px rgb(0 0 0 / 7%);
    box-shadow: 0px 0px 6px rgb(0 0 0 / 7%);
    border-radius: 0.375rem;
  }

  .nav-pills .nav-item {
    width: 50%;
  }

  .nav-link {
    color: #222;
  }

  .nav-pills .nav-link.active,
  .nav-pills .show>.nav-link {
    background-color: #212529;
  }

  a.logo img {
    width: 100%;
    height: 100%;
    margin: 0 auto;
  }

  a.logo {
    width: 76px;
    height: 78px;
    display: block;
    margin: 4px auto;
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
                <li role="presentation" class="nav-item"><a id="pills-profile-tab" href="{{route('login')}}" aria-selected="false" class="nav-link">{{__('message.login')}}</a></li>
                <li role="presentation" class="nav-item"><button id="pills-home-tab" class="nav-link active w-100 d-block">{{__('message.register')}}</button></li>
              </ul>
              <div class="row">
                <form method="post" action="{{route('shop.registerPost')}}">
                  @if ($errors->any())
                  <div class="alert alert-danger text-start">
                      <ul>
                          @foreach ($errors->get('email') as $error)
                              @if (Str::contains($error, 'unique'))
                                  <li>Please use another email.</li>
                              @else
                                  <li>{{ $error }}</li>
                              @endif
                          @endforeach
                           @foreach ($errors->get('password_confirmation') as $error)
                              @if (Str::contains($error, 'confirmed'))
                                  <li>The password confirmation does not match.</li>
                              @else
                                  <li>{{ $error }}</li>
                              @endif
                          @endforeach
                          @foreach ($errors->get('password') as $error)
                              @if (Str::contains($error, 'min.string'))
                                  <li>The password must be at least 6 characters long.</li>
                              @else
                                  <li>{{ $error }}</li>
                              @endif
                          @endforeach

                         

                          

                        
                      </ul>
                  </div>

                  @endif
                  @if(session()->has('message'))
                  <div class="alert alert-success">
                    {{ session()->get('message') }}
                  </div>
                  @endif
                  @csrf
                  <div class="form-group mb-2">
                    <input type="text" class="form-control" name="first_name" required="" placeholder="{{__('message.r_first_name')}}">
                  </div>
                  <div class="form-group mb-2">
                    <input type="text" class="form-control" name="last_name" required="" placeholder="{{__('message.r_last_name')}}">
                  </div>
                  <div class="form-group mb-2">
                    <input type="text" class="form-control" name="company_name" required="" placeholder="{{__('message.r_company_name')}}">
                  </div>
                  <div class="form-group mb-2">
                    <input type="email" class="form-control" name="email" required="" placeholder="{{__('message.r_email')}}">
                  </div>
                  <div class="form-group mb-2">
                    <input type="password" class="form-control" name="password" required="" placeholder="{{__('message.r_password')}}">
                  </div>
                  <div class="form-group mb-2">
                    <input type="password" class="form-control" name="password_confirmation" required="" placeholder="{{__('message.r_c_password')}}">
                  </div>
                  <div class="form-group">
                    <input type="submit" value="{{__('message.register')}}" name="login_user" class="btn btn-dark form-control w-75">
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