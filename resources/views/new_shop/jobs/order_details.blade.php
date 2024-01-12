@extends('layouts.app')
@section('content')

<?php
require  public_path() . '/painter/header.php';
require  public_path() . '/painter/sidebar-2.php';
?>

<style>
    .container {
        max-width: 1050px;
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
        margin: 0 0 30px 300px;
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
    @media(min-width:480px) {
        .detail-selection .form-control{
        padding: 0px 5px;
        }
   

    }
    @media(min-width:991px) {
        .intro_main_wrap_cstm {
            max-width: 67%;
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
    }

    @media (max-width: 600px) {
        .container-fluid {
            display: unset;
        }

        .intro_main_wrap_cstm .section-header {
            padding-top: 0px !important;
        }
    }
    @media (min-width: 450px) {
        .blank-col{
            display: none;
        }
    }
    @media (max-width: 450px) {
        .form-control {
            padding-left: 5px;
        }
        .detail-selection select.la_size {
        width: 60px;
        }
        .detail-selection select.la_qty {
            width: 35px;
        }
        .la_save{
            padding: 0px;
            text-align: right;
        }
        .intro_main_wrap_cstm {
            max-width: 100%;
            margin: 0 auto;
        }
        .la_single-first{
            width: 59% !important;
            padding-right: 0px !important;
        }
        .la_single_item{
             width: 40% !important;
        }
}
</style>

<div class="container">
    <div id="intro">
        <div class="main_wrap intro_main_wrap_cstm main_login">
            <div id="page-content-wrapper==">
                <div class="container-fluid">
                    <div class="section-header text-center">
                        <a class="logo" href="{{route('main')}}"><img src="{{ asset('image/logo.png') }}" alt="tag"> </a>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            @if($type=='inside')
                            <h3> Inside Paint & Undercoat</h3>
                            @else
                            <h3 class="inside-cst"> Outside Paint Ordering</h3>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <h5> step 1/3 : choose size and how many</h5>
                        </div>
                    </div>
                    <br>
                    <div class="row ">
                        <div class="col-lg-3 border-bottom border-info mx-n5 w-100">
                        </div>
                        <div class="col-lg-3 border-bottom border-info mx-n5 w-100">
                        </div>
                        <div class="col-lg-3 border-bottom border-info mx-n5 w-100">
                        </div>
                        <div class="col-lg-3 w-100 ">
                        </div>
                    </div>
                    <br>
                    <div class="row detail-selection ">
                        <div class="col p-0">
                            @foreach ($items as $item)
                            <div class="row order-lines align-items-center">
                                <div class="col-md-2 col-0"></div>
                                <div class="col-md-4 col-sm-6 col-7 px-3 la_single-first">
                                    <!-- <strong>{{$painterjob->$type[$item->key]}} : </strong> <br>  -->
                                    <div>
                                        <div class="jobs_controll_buttons">

                                            <div class="decoration-none mt-2 mb-2 d_i_b"><a href="#{{$item->id}}collapseExample" data-bs-toggle="collapse" aria-expanded="false" role="button" aria-controls="{{$item->id}}collapseExample"><strong style="font-size: 20px">{{$painterjob->$type[$item->key]}} : </strong> <br></a></div>
                                        </div>
                                        <div class="collapse" id="{{$item->id}}collapseExample">
                                            <div class="single_file " style="font-size: 16px;">
                                                {{$item->brand? $item->brand->name :''}} - {{$item->color}} <br>
                                                {{$item->product}} <br>
                                                {{$item->note}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-5 la_single_item p-0" data-type="{{$type}}" data-id="{{$item->id}}" data-key="{{$item->key}}">
                                    <input class="form-control keynew" name='keynew' value="<?php echo $painterjob->$type[$item->key]; ?>">
                                    <input class="form-control new" name='new' value="<?php if(request()->new) echo request()->new; else echo ''; ?>">
                                    </input>
                                    @if($item->size<102) <div class="row mb-2 mt-2 ">
                                        <div class="col-sm-0 col-2 p-0 blank-col"></div>
                                        <div class="col-lg-4 col-sm-4 col-5 px-sm-4 p-0">
                                            <select data-current_value="{{$item->size}}" name="{{$type}}[{{$item->key}}][size]" class="la_size form-control padding s_h clickget ">
                                                <!--<option value="100" {{$item->size==100? 'selected':'' }}>Select</option>  -->
                                                <option value="15" {{$item->size==15? 'selected':'' }}>15 L</option>
                                                <option value="10" {{$item->size==10? 'selected':'' }}>10 L</option>
                                                <option value="4" {{$item->size==4? 'selected':'' }}>4 L</option>
                                                <option value="2" {{$item->size==2? 'selected':'' }}>2 L</option>
                                                <option value="1" {{$item->size==1? 'selected':'' }}>1 L</option>
                                                <option value="101" {{$item->size==101? 'selected' :''}}>None</option>
                                                <option value="102" {{$item->size==102? 'selected' :''}}>Call Me</option>
                                            </select>
                                        </div>

                                        <div class="col-lg-4 col-sm-4 px-sm-4 col-3 p-0">
                                            <select data-current_value="{{$item->qty}}" name="outside[{{$item->key}}][qty]" class="la_qty la_hide_qty form-control padding s_h clickget ">
                                                @for ($i = 1; $i <= 20; $i++) <option {{$item->qty==$i? 'selected':'' }} value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                    @endfor
                                            </select>
                                        </div>
                                        <div class="col-lg-4 col-sm-3 px-sm-4 col-2 la_save la_hide_save p-0">
                                            <a href="#"><img src="{{ asset('image/tick.png') }}" alt="tag"></a>
                                        </div>
                                </div>
                                @elseif($item->size=102)
                                Call me
                                @endif
                            </div>
                        </div>
                        @endforeach
                        {{ session()->put('type',request()->type)}}
                    </div>
                </div>
                <div class="row mb-3 order-wrapper">
                    <div class="col-6 ">
                        <div class="la_next_page">
                            <a href="{{ route('jobCancel', ['painterjob'=> $painterjob->id]) }}">
                                < </a>
                                    <p>Cancel Order</p>
                        </div>
                    </div>
                    <div class="col-6 ">
                        <div class="la_next_page">
                            @if($type=='inside')
                            <a href="{{ route('inside_paint_undercoat', ['painterjob'=> $painterjob->id,'new'=>'new', 'type' => 'outside','value'=>1]) }}">
                                > </a>
                            <p> Back To The Outside Order</p>
                            @else
                            <a href="{{ route('inside_paint_undercoat', ['painterjob'=> $painterjob->id,'new'=>'new', 'type' => 'inside','value'=>1]) }}">
                                > </a>
                            <p>Order Inside Paint Too</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="la_next_page">
                    <?php
                    ?>
                    @if($new)
                    <a href="{{ route('choseShop', ['painterJob'=> $painterjob->id,'new'=>$new]) }}">{{__('message.go')}}</a>
                    @else
                    <a href="{{ route('choseShop', ['painterJob'=> $painterjob->id]) }}">{{__('message.go')}}</a>
                    @endif
                    <p>Finish Ordering</p>
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
    $(document).ready(function() {
        $(".la_size").each(function() {
            var cur_value = $('option:selected', this).val();
            if (cur_value < 100) {
                $(this).parents('.la_single_item').find('.la_qty').removeClass('la_hide_qty');
            }
        });
        $(".la_size").on('change', function() {
            var cur_value = $('option:selected', this).val();
            if (cur_value >= 100) {
                $(this).parents('.la_single_item').find('.la_qty').addClass('la_hide_qty');
            } else {
                $(this).parents('.la_single_item').find('.la_qty').removeClass('la_hide_qty');
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
            var la_size_current = $(this).parents('.la_single_item').find('.la_size').val();
            var la_size_updated = $(this).parents('.la_single_item').find('.la_size').data('current_value');
            if (cur_value != $(this).data('current_value') || la_size_current != la_size_updated) {
                $(this).parents('.la_single_item').find('.la_save').removeClass('la_hide_save');
            } else {
                $(this).parents('.la_single_item').find('.la_save').addClass('la_hide_save');
            }
        });
        $(document.body).on('click', '.la_save', function(e) {
            e.preventDefault();
            $(this).addClass('la_hide_save');
            //return false;
            _this = $(this).parents('.la_single_item');
            _id = _this.data('id');
            _la_size = _this.find('.la_size').val();
            _la_qty = _this.find('.la_qty').val();
            key_val_ = _this.find('.keynew').val();
            new_val_ = _this.find('.new').val();

            $.ajax({
                url: "{{route('updateJobData')}}",
                cache: false,
                headers: {
                    'X-CSRF-Token': "<?php echo csrf_token() ?>"
                },
                type: "POST",
                data: {
                    'id': _id,
                    'la_size': _la_size,
                    'la_qty': _la_qty,
                    'key_val': key_val_,
                    'new_val': new_val_
                }
            }).done(function() {
                _this.find('.la_size').data('current_value', _la_size);
                _this.find('.la_qty').data('current_value', _la_qty);
                _this.find('.keynew').data('current_value', key_val_);
                _this.find('.new').data('current_value', new_val_);
            });
        });
    })
</script>
@endsection