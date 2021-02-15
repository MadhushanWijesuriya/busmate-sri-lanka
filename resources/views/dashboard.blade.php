@extends('layouts.app')

@section('theme_css')
    <style>
        #map {
            height: 400px;
            /* The height is 400 pixels */
            width: 100%;
            /* The width is the width of the web page */
        }
    </style>
@endsection

@section('theme_js')

@endsection

@section('top_nav_bar')
    @include('components.top-nav-bar')
@endsection

@section('side-bar')
    @include('components.side-bar')
@endsection

@section('content')
    <div class="content-wrapper">

        <div class="content-header">

            <div class="container-fluid">

                <div class="row mb-2">

                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Dashboard</h1>
                    </div>

                    <div class="col-sm-6">

                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>

                    </div>

                </div>

            </div>

        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="card card-secondary">
                            <div class="card-header">
                                <h3 class="card-title">Select Route</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form role="form">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <!-- select -->
                                            <div class="form-group">
                                                <label>Start Holt</label>
                                                <select class="custom-select" id="start_holt" name="start_holt">
                                                    @foreach($holt_names as $holts)
                                                        <option value="{{$holts->holt_name}}">{{$holts->holt_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <!-- select -->
                                            <div class="form-group">
                                                <label>End Holt</label>
                                                <select class="custom-select" id="end_holt" name="end_holt">
                                                    @foreach($holt_names as $holts)
                                                        <option value="{{$holts->holt_name}}">{{$holts->holt_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-md-push-8 text-right">
                                            <input type="submit" name="" id="filter" value="Search" class="btn btn-primary" onclick="calcRoute()">
                                            <input type="button" name="" id="clear" value="Clear" class="btn btn-default">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.card-body -->
                        </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <section class="col-lg-12 connectedSortable ui-sortable">
                        <div class="card">
                            <div class="card-header ui-sortable-handle">
                                <h3 class="card-title">map</h3>
                            </div>
                            <div class="card-body">

                                <div id="map"></div>

                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </section>

    </div>


@endsection

@section('footer')
    @include('components.footer')
@endsection

@section('custom_js')
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyApOS5HzZKhTJVqx2SCNPmqHuE1H3ISWQ4&callback=initMap&libraries=&v=weekly"
        async
    ></script>
    <script type="text/javascript">
        let map, infoWindow,marker;
        var directionsService,directionsRenderer,chicago,mapOptions;

        function initMap() {
            directionsService = new google.maps.DirectionsService();
            directionsRenderer = new google.maps.DirectionsRenderer();
            chicago = new google.maps.LatLng(41.850033, -87.6500523);
            mapOptions = {
                zoom:7,
                center: chicago
            }
            var map = new google.maps.Map(document.getElementById('map'), mapOptions);
            directionsRenderer.setMap(map);

            infoWindow = new google.maps.InfoWindow();
            const locationButton = document.createElement("button");
            locationButton.textContent = "Pan to Current Location";
            locationButton.classList.add("custom-map-control-button");
            map.controls[google.maps.ControlPosition.TOP_CENTER].push(locationButton);
            locationButton.addEventListener("click", () => {
                // Try HTML5 geolocation.
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(
                        (position) => {
                            const pos = {
                                lat: position.coords.latitude,
                                lng: position.coords.longitude,
                            };

                            marker = new google.maps.Marker({
                                position: pos,
                                map,
                                title: "me",
                            });
                            map.zoom=15;
                            infoWindow.setPosition(pos);
                            infoWindow.setContent("Location found.");
                            infoWindow.open(map,marker);
                            map.setCenter(pos);



                        },
                        () => {
                            handleLocationError(true, infoWindow, map.getCenter());
                        }
                    );
                } else {
                    // Browser doesn't support Geolocation
                    handleLocationError(false, infoWindow, map.getCenter());
                }
            });
        }

        function handleLocationError(browserHasGeolocation, infoWindow, pos) {
            infoWindow.setPosition(pos);
            infoWindow.setContent(
                browserHasGeolocation
                    ? "Error: The Geolocation service failed."
                    : "Error: Your browser doesn't support geolocation."
            );
            infoWindow.open(map);
        }

        function calcRoute() {
            var start = document.getElementById('start_holt').value;
            var end = document.getElementById('end_holt').value;
            var request = {
                origin: start,
                destination: end,
                travelMode: 'TRANSIT',
                transitOptions: {
                    modes: ['BUS'],
                },
                provideRouteAlternatives:true,
                avoidHighways:true,
                avoidTolls:true
            };
            directionsService.route(request, function(result, status) {
                if (status == 'OK') {
                    console.log(result)
                    directionsRenderer.setDirections(result);
                }
            });
        }

        $('#filter').on('click', function (e) {
            e.preventDefault();
            calcRoute()

        });


    </script>
@endsection
