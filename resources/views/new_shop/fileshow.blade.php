<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Name</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style77.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style8.css') }}">
</head>
<body>

    <header>
        <div class="header-row">
            <div class="header-item">
                <a href="{{ url()->previous() }}"> <i class="fa-solid fa-arrow-left"></i> </a>
                <span> Files </span>
                <a href="<?php echo '/main' ?>"> <img src="/image/logo-phone.png" alt="Logo"> </a>
            </div>
        </div>
    </header>

    @include('layouts.partials.footer')


    <section class="job2_area" style="margin-top: 80px;">
        <h3>Click to Open</h3>
        @if (!$job->plan && !$job->plan_granny && !$job->colors && !$job->po && !$job->colors_secound && !$job->colors_spec)
        <div class="alert alert-info mt-3">
            No File Is Available.
        </div>
        @endif


        <!-- Example for ORDERS -->
        <div class="job2main_box">
            <div class="job2uper_item">
                <img src="/image/icon1/banner-1.png" alt="">
                <h4>ORDERS</h4>
            </div>
            <div class="job2main_item">

                <ul>
                    @foreach ([ 'po'] as $attr)
                    @if ($job->{$attr})
                    <li> <a href="{{ asset('/uploads/' . $job->{$attr}) }}" target="_blank">{{ __('message.' . $attr) }}</a> </li>
                    @endif
                    @endforeach


                    @foreach ($job->poItems as $index => $poItem)
                    @if ($poItem->file)
                    <div class="green">
                        <li> <a href="{{ asset('/uploads/' . $poItem->file) }}" target="_blank">P.O {{ $index + 1 }}</a> </li>
                    </div>
                    @endif
                    @endforeach

                </ul>

            </div>
        </div>
        <!-- Example for PLANS -->
        <div class="job2main_box">
            <div class="job2uper_item">
                <img src="/image/icon1/banner-2.png" alt="">
                <h4>PLANS</h4>
            </div>

            <div class="job2main_item jobitm2_cnt">
                <ul>
                    @foreach (['plan', 'plan_granny'] as $attr)
                    @if ($job->{$attr})

                    <li> <a href="{{ asset('/uploads/' . $job->{$attr}) }}" target="_blank">{{ __($attr) }}</a> </li>
                    @endif
                    @endforeach

                </ul>

            </div>
        </div>


        <div class="job2main_box job3main_box">
            <div class="job2uper_item">
                <img src="/image/icon1/banner-3.png" alt="">
                <h4>COLOURS</h4>
            </div>
            <div class="job2main_item">

                @if (is_array($job->colors) && count($job->colors) > 0)
                <ul>
                    @foreach ($job->colors as $color_file)
                    <div class="blue">
                        <li> <a href="{{ asset('/uploads/' . $color_file ) }}" target="_blank">{{ __('message.colors') }}</a> </li>
                    </div>
                    @endforeach

                </ul>
                @elseif($job->colors)
                <div class="blue">
                    <ul>

                        @foreach ([ 'colors', 'colors_secound', 'colors_spec'] as $attr)
                        @if ($job->{$attr})
                        <div class="{{ in_array($attr, ['colors', 'po', 'colors_secound', 'colors_spec']) ? 'blue' : '' }}">
                            <li> <a href="{{ asset('/uploads/' . $job->{$attr}) }}" target="_blank">{{ __('message.' . $attr) }}</a> </li>
                        </div>
                        @endif
                        @endforeach
                    </ul>

                </div>
                @endif

            </div>
        </div>


        <div style="margin: 20px 0px 300px 0px;"></div>


        <!-- You can add other similar blocks for other types like COLOURS, COLOURS_SECOUND, etc. -->

        <!-- Scripts -->
        <script src="{{ asset('js/script.js') }}"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </section>
</body>
</html>
