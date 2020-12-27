<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <script defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyApOS5HzZKhTJVqx2SCNPmqHuE1H3ISWQ4&callback=initMap">
    </script>
    <style>
        #map {
            height: 100%;
        }
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
    </style>
    <title>Document</title>
</head>
<body>
<div id="map">

</div>

</body>
</html>


<script>
    let map;

    function initMap() {
        map = new google.maps.Map(document.getElementById("map"), {
            center: { lat: -34.397, lng: 150.644 },
            zoom: 8,
        });
    }
</script>
