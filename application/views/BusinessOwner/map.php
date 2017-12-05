<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php foreach($listing as $key) {
    $address = $key->address;
    $city = $key->city;
    $province = $key->province;
    $business['loacation'] = "$address, $city, $province";
    $title = $key->title;
    $phone = $key->phone;
}
  $Address = urlencode($business['loacation']);
  $request_url = "http://maps.googleapis.com/maps/api/geocode/xml?address=".$Address."&sensor=true";
  $xml = simplexml_load_file($request_url) or die("url not loading");
  $status = $xml->status;
  if ($status=="OK") {
      $Lat = $xml->result->geometry->location->lat;
      $Lon = $xml->result->geometry->location->lng;
      $LatLng = "$Lat,$Lon";
      $direction = "https://www.google.com/maps/dir//$Lat,$Lon/@$Lat,$Lon,17z/data=!3m1!4b1";
  }
    // echo $business['loacation'] . ' vs ' . $LatLng;
    
?>
<html>
  <head>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCtr3FT0uDFpjx-VisBICLWclTjETC6UTc">
    </script>
    <script>
        function initialize() {
  var $latitude = <?php echo $Lat;?>,
      $longitude = <?php echo $Lon;?>,
      $image = 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/fb/Map_pin_icon_green.svg/2000px-Map_pin_icon_green.svg.png',
      $mapZoom = 14;
     
  
  var myLatlng = new google.maps.LatLng($latitude,$longitude);
  var mapOptions = {
    zoom: $mapZoom,
    center: myLatlng,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  }
  var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
  var mapbutton = document.getElementById('map-button');
  var image = $image;
  var icon = {
    url: $image, // url
    scaledSize: new google.maps.Size(30, 30), // scaled size
    origin: new google.maps.Point(0,0), // origin
    anchor: new google.maps.Point(0, 0) // anchor
};
  var marker = new google.maps.Marker({
      position: myLatlng,
      icon: icon,
      map: map,
      animation: google.maps.Animation.DROP,
      mapTypeId: google.maps.MapTypeId.ROADMAP,
      title: '<?php echo $title;?>'
  });
  
  map.setCenter(marker.getPosition());
  // Editable string with html markup for tooltip content
  var contentString = '<div id="content">'+
      '<div id="siteNotice">'+
      '<h3 id="firstHeading" class="mapHeading"><?php echo $title;?></h3>'+
      '</div>'+
      '<div id="mapContent">'+
      '<p><?php echo $address;?><br />'+
      '<?php echo "$city, $province";?><br />'+
      '<?php echo $phone;?></p>'+
      '<a href="<?php echo $direction;?>" target="_blank">Get Direction</a>'+
      '</div>'+
      '</div>';

var infowindow = new google.maps.InfoWindow({
      content: contentString
  });
  
 // open tooltip on load
infowindow.open(map, marker);
  
 // open tooltip  on click on the marker
  google.maps.event.addListener(marker, 'click', function() {
    infowindow.open(map,marker);
    map.setZoom(16);
    map.setCenter(marker.getPosition());
  });  

   
}

google.maps.event.addDomListener(window, 'load', initialize);


    </script>
    <style>
        #map-canvas { 
        height: 35%; margin: 0; padding: 0;
}
    </style>
  </head>
  <body>
    <div id="map-canvas">
    <!--<a href="" class='' id="map-button">Get Directions</a>-->
    </div>
    
  </body>
  <!--<script src="https://maps.googleapis.com/maps/api/js"></script>-->
</html>