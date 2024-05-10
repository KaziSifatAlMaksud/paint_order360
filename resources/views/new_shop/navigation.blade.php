<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title> Home | Orderr360</title>

    <!-- Fav Icon -->
    <link rel="icon" href="{{ asset('image/favicon.png') }}" />

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="user-id" content="{{ Auth::user()->id }}">

    <link rel="stylesheet" href="{{ asset('css/style10.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <style>
        :root {
            --clr: #222327;
            --bg: #f5f5f5;
            --body-bg: #ebebeb;
            --nav-colo: #fff;
            --orang: orangered;
            --bg-orang: #ffddaa;
            --newInvoice-bg: #66ff5b;
            --dueInvoice-bf: #ff7070;
            --yollo: #f9f14d;
            --bg-yollo: #fffcb4;
            --green: #17ff21;
            --bg-green: #b8ffc3;
        }

        .invoice-doc .docs_part1 {

            padding: 0px 0px !important;

        }


        header {
            /* position: relative; */
            position: fixed;
            width: 100%;
            margin-top: 0px;
            background-color: #ffffff;
            border-radius: 0px 0px 20px 20px;
            box-shadow: 0px 5px 5px rgba(0, 0, 0, 0.2);
            padding: 5px 0;
            margin-bottom: 10px;
            z-index: 10;
        }

        .red-dot {
            height: 10px;
            /* Size of the dot */
            width: 10px;
            /* Size of the dot */
            background-color: red;
            /* Color of the dot */
            border-radius: 50%;
            /* Makes the dot round */
        }

        .header-row {
            margin: 0 5px;
        }

        .header-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin: 0 10px;

        }

        .header-item i {
            font-size: 30px;
        }

        .header-item span {
            font-size: 25px;
            text-shadow: 0px 4px 5px rgba(0, 0, 0, 0.25);
        }

        .header-item img {
            width: 100%;
            max-width: 60px;
        }

        .header-item {
            font-size: 25px;
            text-shadow: 0px 4px 5px rgba(0, 0, 0, 0.25);
        }

        /* Navigation Update*/



        .navigation {
            display: flex;
            justify-content: flex-end;
            position: fixed;
            align-items: center;
            justify-content: end;
            width: 100%;
            bottom: 0;
            background: #fff;
            border-radius: 20px 20px 0px 0px;
            box-shadow: 0px 10px 36px rgba(0, 0, 0, 0.3);
            z-index: 3;
        }

        .navigation ul {
            margin-bottom: 0 !important;
            padding-left: 0rem !important;
            display: flex;
            width: 100%;

        }

        .navigation ul li {
            position: relative;
            list-style: none;
            width: 30%;
            height: 70px;
            z-index: 1;
        }

        .navigation ul li a {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;

            /* text-align: center; */
            font-weight: 500;

        }

        .navigation ul li a .icon {
            position: relative;
            display: block;
            line-height: 75px;
            font-size: 20px;
            transform: translateY(-15px);

            text-align: center;
            transition: 0.5s;
            color: var(--clr);



        }

        .navigation ul li.active a .icon {
            transform: translateY(-15px);
            padding: 0px 25px 0px 25px;
            border-radius: 50%;
            font-size: 20px;
            color: var(--orang);


        }

        .navigation ul li a .text {
            position: absolute;
            color: var(--clr);

            font-weight: bold;
            font-size: 1em;
            letter-spacing: 0.05em;
            /* transition: 0.5s; */
            opacity: 1;
            transform: translateY(10px);
        }

        .navigation ul li.active a .text {
            opacity: 1;
            color: var(--orang);

            transform: translateY(10px);
        }

        /* Navigation End Update*/

        .showinline {
            white-space: nowrap;
            width: 90%;
            overflow: hidden;
            font-weight: bold;
            text-overflow: ellipsis;

        }

    </style>
</head>

<body style="background-color: #e6e6e6;">
    <header>
        <div class="header-row">
            <div class="header-item">
                <a href="#"> </a>
                <span> @if (!empty($company_name))
                    {{ $company_name }}

                    @else
                    Company Name
                    @endif
                </span>

                <a href="<?php echo '/main' ?>"> <img src="/image/logo-phone.png" alt="Logo"> </a>
            </div>
        </div>
    </header>

    @include('layouts.partials.footer')
    <main class="position-relative" style="padding-top:65px;">
        <!-- card -->
        <section >
            <div class="search-bar" style=" z-index:99999; position:fixed;">

                <input type="text" class="search-input bg-white" id="search-input" placeholder="Address or Customer" oninput="filterCards()">
                <i class="fas fa-search search-icon"></i>
            </div>


            <ul class="job-list px-2 d-flex justify-content-between fs-5 mt-3 portfolio-flters" style="color: #ff4500;  font-weight: bold; padding-top:80px;">
                <li id="filter-all" class="filter-active" hidden>All</li>
                <li id="filter-new" class="filter-inactive">New {{$newCount ? $newCount : ''}}</li>
                <li id="filter-started" class="filter-inactive">Started {{$startedCount ? $startedCount : ''}}</li>
                <li id="filter-finished" class="filter-inactive">Finished {{$finishedCount ? $finishedCount : '0'}}</li>
            </ul>

            <div class="px-2 border-custom"></div>
        </section>
        @if($jobs->count() > 0)
        <section class="invoice-doc px-2 jobs_area" style="line-height:1;">
            @foreach($jobs->sortByDesc('created_at') as $job)
            <a href="{{ route('jobs.show', ['id' => $job->id]) }}" style="text-decoration: none; color: black;" class="portfolio-item {{ $job->status == 1 ? 'filter-new' : ($job->status == 3 ? 'filter-finished' : 'filter-started') }}">
                <div class="docs_part1  d-flex">

                    <div style="
                        background-image: url('{{ asset('/image/Home.png') }}');
                        width: 100px; 
                        height: 110px; 
                        border-radius: 13px 0px 0px 13px;
                        background-size: cover; 
                        background-position: center center; 
                        background-repeat: no-repeat;
                        overflow: hidden;">
                        @forelse($pps->where('job_id', $job->id) as $pp)
                        <img src="{{ asset('/gallery_images/'.$pp->image) }}" alt="Card image cap" style="width: 100%; height: 100%; object-fit: fill; object-position: center center;">
                        @empty
                        <img src="{{ asset('/image/Home.png') }}" alt="Card image cap" style="width: 100px; height: 100px; object-fit: cover; object-position: center center;">
                        @endforelse

                    </div>
                    <div class="position-relative" style="flex: 1; overflow:hidden;" style="margin-bottom: 10px;">
                        <div class="invoice-cart" style="padding-left: 10px; line-height: 1;">
                            <h5 class="address_text showinline">{{$job->address}}</h5>
                            <div style="display: flex; justify-content: space-between;">
                                <div style="text-align: left; width: 75%; overflow:hidden;">
                                    <p class="text2 showinline " style="padding-bottom: 10px;">

                                        @if (!$job->builder_company_name)
                                        Click The Card For Learn More
                                        @else
                                        <span> {{ $job->builder_company_name }} </span>
                                        @endif
                                    </p>
                                    <p class="text2 showinline" style="padding-bottom: 10px;">

                                        {{ $job ? \Carbon\Carbon::parse($job->start_date)->format('d/m/Y') : '' }}
                                    </p>

                                    <p class="text2 bilderName showinline" style="display: flex; align-items: center; white-space: nowrap;">
                                        @if($job->builder_id && $job->admin_builders && !is_bool($job->admin_builders))
                                        Gate Code: {{ $job->admin_builders->gate }}
                                        @endif
                                    </p>
                                </div>
                                {{-- @if($job->builder_id && $job->admin_builders && !is_bool($job->admin_builders))
                                        {{ $job->admin_builders }}
                                @endif --}}


                                <div style="display: flex;  align-items: flex-end; margin: 0px 0px 6px 0px;">


                                    @if($job->assign_painter && $job->assignedJob && $job->assignedJob->assigned_painter_name == auth()->id())
                                    {{-- @if( $job->assign_painter && $job->assignedJob->assigned_painter_name == auth()->id()) --}}
                                    <div> I </div>
                                    @endif
                                    @if($job->assign_painter && $job->user_id === auth()->id())
                                    <div class="red-dot"></div>
                                    @endif
                                </div>



                                <div style="align-self: flex-end; margin-bottom:-10px;">

                                    @if ($job->status == 1)
                                    <p class="map_btn status status-new ml-5 ml-5 text-light" style="margin: 10px;">New</p>
                                    @elseif($job->status == 2)
                                    <p class="map_btn status status-started ml-5 text-light">Started</p>
                                    @elseif($job->status == 3)
                                    <p class="map_btn status status-finished  ml-5 text-light">Finished</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>

            @endforeach

        </section>
        @else
        <div class="alert alert-success">
            <center> No jobs available.</center>
        </div>

        @endif

      {{-- <form action="{{ route('send.notification') }}" method="POST">
          @csrf
          <div class="form-group">
              <label for="title">Title</label>
              <input type="text" class="form-control" name="title" id="title">
          </div>
          <div class="form-group">
              <label for="body">Body</label>
              <textarea class="form-control" name="body" id="body"></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Send Notification</button>
      </form> --}}



    </main>


  <center>
      <button id="btn-nft-enable" onclick="initFirebaseMessagingRegistration()" class="btn btn-danger btn-xs btn-flat">Allow for Notification</button>
  </center>
  
    <script src="https://www.gstatic.com/firebasejs/7.23.0/firebase.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script>
        var firebaseConfig = {
            apiKey: "AIzaSyAMap8UpkxjRjI6WCAapEgrqhvhz4Eec6A"
            , authDomain: "push10-6b10e.firebaseapp.com"
            , projectId: "push10-6b10e"
            , storageBucket: "push10-6b10e.appspot.com"
            , messagingSenderId: "1082252237318"
            , appId: "1:1082252237318:web:2e27c021d056949f4b8187"
            , measurementId: "G-S0SZSYLGKT"

        };

        firebase.initializeApp(firebaseConfig);
        const messaging = firebase.messaging();

        function initFirebaseMessagingRegistration() {
            messaging
                .requestPermission()
                .then(function() {
                    return messaging.getToken()
                })
                .then(function(token) {
                    console.log(token);

                var user_id = $('meta[name="user-id"]').attr('content');

               $.ajax({
               url: '/save-token',
               type: 'post',
               data: {
               user_id: user_id,
               token: token,
               '_token': $('meta[name="csrf-token"]').attr('content') // Include CSRF token
               },
               dataType: 'JSON',
               success: function(response) {
               alert('Token saved successfully.');
               },
               error: function(err) {
               console.log('User Chat Token Error: ' + err);
               },
               });
                }).catch(function(err) {
                    console.log('User Chat Token Error' + err);
                });
        }

        messaging.onMessage(function(payload) {
            const noteTitle = payload.notification.title;
            const noteOptions = {
                body: payload.notification.body
                , icon: payload.notification.icon
            , };
            new Notification(noteTitle, noteOptions);
        });

    </script>


    <script src="{{ asset('js/script.js') }}"></script>
    <div style="margin: 20px 0px 300px 0px;"></div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    {{-- push Notification start  --}}

    {{-- <script src="{{ asset('js/profile.js') }}"></script> --}}


    {{-- <script src="./profile.js"></script> --}}
</body>
</html>
