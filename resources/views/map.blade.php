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
    <div class="content-wrapper" style="min-height: 640px;">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">DashBoard</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item active">
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
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

        function initMap() {
            map = new google.maps.Map(document.getElementById("map"), {
                center: { lat: -34.397, lng: 150.644 },
                zoom: 6,
            });



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
    </script>
@endsection
