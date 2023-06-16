@extends('layout')

@section('title', 'Home')

@section('content')

<form action="{{ route('store') }}" method="post">
    @csrf

    <div id="map" style="height:500px; width: 100%;" class="my-3"></div>

    <div class="container">
        <div class="alert alert-info">
            <h2><i class="material-icons">info_outline</i> Instructions</h2>
            <ul>
                <li>Click a location on the map or drag the current marker to change the location.</li>
                <li>Click the "Add Point of Interest" button to save a point of interest to the database.</li>
            </ul>
        </div>

        <div class="row">
            <div class="col-md-3">
                <input type="text" class="form-control" placeholder="name" name="name" id="name ">
            </div>
            <div class="col-md-3">
                <input type="text" class="form-control" placeholder="latitude" name="latitude" id="latitude">
            </div>
            <div class="col-md-3">
                <input type="text" class="form-control" placeholder="longitude" name="longitude" id="longitude">
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-primary">Add Point of Interest</button>
            </div>
        </div>

        @includeWhen($errors->any(), '_errors')

        @if (session('success'))
            <div class="alert alert-success mt-3">
                <i class="material-icons" style="display: inline-flex; vertical-align: top;">check</i> {{ session('success') }}
            </div>
        @endif

    </div>
</form>

<script>
        let map;
        
        const defaultLocation = { lat: 51.246271, lng: -1.992213 }; // wiltshire
        const markerIcon = 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png';

        function initMap() {
            map = new google.maps.Map(document.getElementById("map"), {
                center: defaultLocation,
                zoom: 8,
                scrollwheel: true,
            });

            let marker = new google.maps.Marker({
                position: defaultLocation,
                map: map,
                draggable: true,
                icon: markerIcon
            });

            google.maps.event.addListener(marker,'position_changed',
                function (){
                    let lat = marker.position.lat()
                    let lng = marker.position.lng()
                    $('#latitude').val(lat)
                    $('#longitude').val(lng)
                })

            google.maps.event.addListener(map,'click',
            function (event){
                pos = event.latLng
                marker.setPosition(pos)
            })
        }
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap" type="text/javascript"></script>

@endsection
