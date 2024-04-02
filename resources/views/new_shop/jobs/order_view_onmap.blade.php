@extends('layouts.app')


@section('content')
<title>Company Name</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


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
        font-size: 20px;
        text-align: center;
        margin-top: 100px;
    }


    .la_next_page a {
        display: inline-block;
        width: 100px;
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

    .show_location {
        margin: 0 auto;
        width: 100%;
        max-width: 500px;
        height: 600px;
        border-radius: 20px;
        margin-top: 20px;
        box-shadow: 0px 5px 5px rgba(0, 0, 0, 0.2);
    }

    .show_distance {
        margin: 0 auto;
        width: 70%;
    }

    .show_address {
        margin: 0 auto;
        width: 70%;
    }

    .show_distance p {
        font-weight: 500;
        font-size: 22px;
        margin-top: 20px;
    }

    .show_address p {
        font-weight: 500;
        font-size: 22px;
        margin-top: 20px;
        color: grey;
    }

    .back_btn {
        margin: 0 auto;
        width: 30%;
    }

</style>


<header style="margin-top: -90px;">
    <div class="header-row">
        <div class="header-item">
            <a href="{{ url()->previous() }}"> <i class="fa-solid fa-arrow-left"></i> </a>
            <span> Map</span>
            <a href="<?php echo '/main' ?>"> <img src="/image/logo-phone.png" alt="Logo"> </a>
        </div>
    </div>
</header>



@include('layouts.partials.footer')



<div id="googleMap" class="show_location" style="margin-top: 90px;"></div>

<center class="show_distance">
    <p>Distance is <?php echo $distance ?> From Your Home</p>
</center>
<center class="show_address">
    <p>Adress :<?php echo $latlong->address ?></p>
</center>

<div style="margin: 20px 0px 200px 0px;"></div>






@endsection



@section('js')

<script>
    var map;

    function initMap(id = 'googleMap', lat = < ? php echo $latlong - > latitude ? $latlong - > latitude : '51.508742' ? > , lng = < ? php echo $latlong - > longitude ? $latlong - > longitude : '-0.120850' ? > ) {
        map = new google.maps.Map(document.getElementById(id), {
            zoom: 8
            , center: new google.maps.LatLng(lat, lng)
            , mapTypeId: 'roadmap'
        , });
        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(lat, lng)
            , icon: "{{asset('/new_images/pngwing.com.png')}}"
            , icon: {
                labelOrigin: new google.maps.Point(86, 34)
                , url: "{{asset('/new_images/pngwing.com.png')}}"
                , scaledSize: new google.maps.Size(40, 50)
            , }
            , title: 'location'
            , label: {
                text: " Job"
                , color: "#8B0000"
                , fontWeight: "bold"
                , fontSize: "18px"
                , marginTop: "20px"
            }
            , map: map,

        });
        var marker = new google.maps.Marker({
            position: new google.maps.LatLng( < ? php echo $latitudeTo ? > , < ? php echo $longitudeTo ? > )
            , icon: "{{asset('/new_images/green.png')}}"
            , icon: {
                labelOrigin: new google.maps.Point(46, 55)
                , url: "{{asset('/new_images/green.png')}}"
                , scaledSize: new google.maps.Size(40, 50)
            , }
            , title: 'Your Location'
            , label: {
                text: "Your Location"
                , color: "#8B0000"
                , fontWeight: "bold"
                , fontSize: "20px"
                , marginTop: "20px"
            }
            , map: map,

        });
        // Create directions service and renderer
        const directionsService = new google.maps.DirectionsService();
        const directionsRenderer = new google.maps.DirectionsRenderer({
            map: map
        , });

        // Define start and end points
        const startPoint = new google.maps.LatLng(lat, lng);
        const endPoint = new google.maps.LatLng( < ? php echo $latitudeTo ? > , < ? php echo $longitudeTo ? > );

        // Define request parameters
        const request = {
            origin: startPoint
            , destination: endPoint
            , travelMode: "DRIVING"
        , };

        // Make directions request and display result on map
        directionsService.route(request, function(result, status) {
            if (status == "OK") {
                directionsRenderer.setDirections(result);
            }
        });

        // directionsRenderer.setMap(map); 
        directionsRenderer.setOptions({
            suppressMarkers: true
        });

    }

</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCb7MpXPNGT9y6LKzg_bi8R1Q_hwmLKMgk&callback=initMap"></script>
<script src="{{ asset('js/script.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

@endsection
