<?php

$this->load->library('googlemaps');

$config = array();
$config['center'] = 'auto';
$config['onboundschanged'] = 'if (!centerGot) {
       var mapCenter = map.getCenter();
       marker_0.setOptions({
           position: new
google.maps.LatLng(mapCenter.lat(), mapCenter.lng())
       });
}
centerGot = true;';
$this->googlemaps->initialize($config);
//set up the marker ready for positioning
//once we know the users location
$marker = array();
$this->googlemaps->add_marker($marker);

$data['map'] = $this->googlemaps->create_map();
$this->load->view('geolocate', $data)
?>