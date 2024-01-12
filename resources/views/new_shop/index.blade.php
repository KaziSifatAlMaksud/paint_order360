@extends('layouts.app')

@section('content')

<style>
  .container {
    max-width: 850px;
  }

  .products_listing {
    font-size: 0;
  }

  .single_product {
    width: 47%;
    display: inline-block;
    font-size: 16px;
    text-align: center;
    margin: 10px 12px 50px;
    background: #fff;
    box-shadow: rgba(17, 17, 26, 0.05) 0px 4px 16px, rgba(17, 17, 26, 0.05) 0px 8px 32px;
    border-radius: 9.10288px;
    padding: 15px;
    position: relative;

  }


  .single_product:first-child {
    width: 100%;
    margin: 0;
    border-bottom: solid 3px #f2ea9b;
    margin-bottom: 20px;
    margin-right: 0;
    margin-left: 0;
  }

  .single_product a {
    font-size: 0;
    position: relative;
  }

  .single_product .product_details {
    font-size: 18px;
    vertical-align: bottom;
    color: #000;
    line-height: 1.2;
    text-align: left;
    font-weight: 500;

  }

  .single_product .product_image {
    display: inline-block;
    vertical-align: bottom;
    text-align: left;

  }



  .single_product:first-child .product_details {
    display: none;
  }

  .single_product:first-child .product_image,
  .single_product:first-child .product_image img {
    width: 100%;
    margin-top: 0;
  }

  

  img {
    max-width: 100%;
    max-height: 300px;
  }

  .product_price {
    text-decoration: none;
    color: #40c990;
    margin-top: 10px;
  }

  .single_product a {
    text-decoration: none;
    display: block;
  }

  .la_next_page {
    font-size: 20px;
    text-align: center;
    position: relative;
    background: #40c990;
    min-height: 60px;
    border-top-left-radius: 50px;
    border-bottom-right-radius: 50px;
    border-bottom-left-radius: 16px;
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
    box-shadow: 0px 0px 5px 2px;
    font-size: 23px;
    text-decoration: none;
    position: absolute;
    top: -30px;
    background: #fff;
    left: calc(50% - 30px);
  }

  .adds_page_header {
    font-size: 0;
  }

  .adds_page_header>div {
    display: inline-block;
    vertical-align: middle;
  }

  .adds_page_header .banner {
    width: 100%;
    font-size: 35px;
    font-weight: 700;
    text-transform: capitalize;
    margin: 10px 10px 25px;
    text-align: center;
  }

  .adds_page_header .banner span {
    color: #40c990;
  }

  .adds_page_header .profile_img {
    width: 20%;
  }

  .adds_page_header .profile_img img {
    border-radius: 50%;
  }
  .product_image {
    max-width: 300px;
    max-height: 300px;
    width: 100%;
    height: 300px;
}

.product_image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}
@media only screen and (max-width:991px){
  
    .single_product {
      width: 47%;
    margin: 10px 9px 44px
    }
    .adds_page_header .banner{
      margin:0px;
    }
}
@media only screen and (max-width:767px){
  .single_product {
      width: 45%;
    }
}
@media only screen and (max-width:480px){
  .single_product {
      width: 46%;
      margin-bottom: 17px !important;
      margin: 6px;
  }
  .product_image {
    max-width: 300px;
    max-height: 230px;
    width: 100%;
    height: 300px;
}
  .adds_page_header .banner{
    margin:0px;
  }
}
@media only screen and (max-width:375px){
  .product_image {
    max-height: 190px;
}

  .single_product{
    width: 45%;
      margin-bottom: 17px !important;
      margin: 6px;
      padding:6px;
  }
}

@media only screen and (max-width:767px)  and (min-width:520px){
  .single_product {
    width: 46%;
  } 
}
</style>

<div class="container products_listing">


  @foreach ($products as $key => $product)

  <div class="single_product single_product_{{$key}}">
    <a href="{{ $product->url }}" target="{{$product->target}}">
      <div class="product_image">
        <img src="{{ asset('/uploads/'.$product->img) }}">
      </div>
      <div class="product_details">
        <div class="product_title">
          {{$product->title}}

        </div>
        <div class="product_price">
          ${{$product->price}} {{$product->sale_price && $product->sale_price < $product->price ? ' Save $'. $product->sale_price: '' }}

        </div>
      </div>

    </a>

  </div>


  @if($key==0)
  <div class=" adds_page_header">
    <div class="banner">
      {!!$banner->value!!}
    </div>
  </div>
  @endif
  @endforeach
  <div class="la_next_page">
    <a href="{{ route('main') }}">{{__('message.go')}}</a>
  </div>
</div>

@endsection

@section('content')

@endsection

@section('last_scripts')

@endsection