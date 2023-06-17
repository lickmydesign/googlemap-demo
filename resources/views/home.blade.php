@extends('layout')

@section('title', 'Home')

@section('content')

<div id="map" style="height:500px; width: 100%;" class="my-3"></div>

<div class="container">
      
        <div class="row">

            <div class="col-md-6">
                <div class="alert alert-info">
                    <h2><i class="material-icons">info_outline</i> Instructions</h2>
                    <ul>
                        <li>Click a location on the map or drag the current flag marker to change the location.</li>
                        <li>Click the "Add Point of Interest" button to save a point of interest to the database.</li>
                    </ul>
                </div>
            </div> <!-- col-md-6 -->

            <div class="col-md-6">

                <form action="{{ route('locations.store') }}" method="post" class="form-inline">
                    @csrf
                    <input type="hidden" class="form-control" placeholder="latitude" name="latitude" id="latitude">
                    <input type="hidden" class="form-control" placeholder="longitude" name="longitude" id="longitude">

                    <div class="form-group mb-2">
                        <label for="name" class="sr-only">Name</label>
                        <input type="text" class="form-control mr-2" placeholder="name (optional)" name="name" id="name">
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">Add Point of Interest</button>
                </form>

                @includeWhen($errors->any(), '_errors')

                @if (session('success'))
                <div class="alert alert-success mt-3">
                    <i class="material-icons" style="display: inline-flex; vertical-align: top;">check</i> {{ session('success') }}
                </div>
                @endif

                <div class="card mt-4">
                    <div class="card-header">Existing Points of Interest</div>
                    <ul class="list-group list-group-flush">
                    @isset($locations)
                        @forelse($locations as $location)
                            <li class="list-group-item">
                                <form method="post" action="{{ route('locations.destroy', [$location]) }}">
                                    @csrf
                                    @method('DELETE')
                                    {{ $location->name }} - {{ $location->latitude }}, {{ $location->longitude }} 
                                    <span class="text-muted ml-2">(Created: {{ $location->created_at }})</span> 
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this point?')">
                                        <i class="material-icons md-18" style="display: inline-flex; font-size: 150%; vertical-align: top;" title="Delete">delete</i>
                                    </button>
                                </form>
                            </li>
                        @empty
                            <li class="list-group-item text-muted">No points of interest recorded yet.</li>
                        @endforelse                       
                    @endisset
                    </ul>
                </div>

            </div> <!-- col-md-6 -->
        
        </div> <!-- row -->

</div> <!-- container -->

<script>
        let map;
        
        const defaultLocation = { lat: 51.246271, lng: -1.992213 }; // wiltshire
        const markerIcon = 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png';
        
        var locations = [
        @isset($locations)
            @foreach ($locations as $l)
                [ {{ $l->latitude }}, {{ $l->longitude }} ],
            @endforeach
        @endisset
        ];

        function initMap() {
            map = new google.maps.Map(document.getElementById("map"), {
                center: defaultLocation,
                zoom: 8,
                scrollwheel: true,
            });

            for (i = 0; i < locations.length; i++) {
                var location = new google.maps.LatLng(locations[i][0], locations[i][1]);

                var exsiting_marker = new google.maps.Marker({
                    position: location,
                    map: map,
                }); 
            };

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
    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_KEY') }}&callback=initMap" type="text/javascript"></script>

@endsection
