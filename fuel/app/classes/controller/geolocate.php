
<!DOCTYPE html>
<html>
<head>
    <title>Geolocation</title>
    <!-- Set basic styling for the map div -->
    <style>
        #map {
            width:400px;
            height:300px;
        }
    </style>
    <!-- Load the Google APIs -->
    <script src="http://www.google.com/jsapi"></script>
    <script>
        // Load the map scripts
        google.load('maps', '3', {other_params:'sensor=true'});

        // Function to create a map and check for geolocation
        function mapInit() {

            // Set the options to be used when creating the map
            var myOptions = {
                    zoom: 0,
                    center: new google.maps.LatLng(0, 0),
                    mapTypeId: google.maps.MapTypeId.ROADMAP
            };

            // Create the new
            map = new google.maps.Map(document.getElementById("map"), myOptions);

            // Check if the browser supports geolocation
            if(navigator.geolocation) {

                navigator.geolocation.getCurrentPosition(currentPositionCallback);
                
            } else {

                alert('The browser does not support geolocation');

            }

        }

        function currentPositionCallback(position) {

            // Create a new latlng based on the latitude and longitude from the user's position
            var user_lat_long = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);

            // Add a marker using the user_lat_long position
            var marker = new google.maps.Marker({
                position: user_lat_long,
                map: map
            });

            // Set the center of the map to the user's position and zoom into a more detailed level
            map.setCenter(user_lat_long);
            map.setZoom(15);

        }

        google.setOnLoadCallback(mapInit);
        
    </script>
</head>
<body>

    <h1>Geolocation</h1>
    
    <div id="map"></div>
    
    <script type="text/javascript">
        var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
        document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
    </script>
    <script type="text/javascript">
        try {
            var pageTracker = _gat._getTracker("UA-18038221-1");
            pageTracker._trackPageview();
        } catch(err) {}
    </script>

</body>
</html>
