<?php

$addr[] = "1401 North Service Rd E Swift Current, SK S9H, Canada";
$addr[] = "1501 North Service Rd E Swift Current, SK S9H, Canada";

    function getLatLngFromAdd($address)
    {
        $address = str_replace(" ","+", $address);
        $address = str_replace(",","", $address);
        $address = str_replace("-","", $address);
       
        $geocode = @file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.urlencode($address).'&sensor=false&language=en');
        $output= json_decode($geocode);
       
       
        $latlngValue=array();
        $latlngValue[0] = @$output->results[0]->geometry->location->lat;
        $latlngValue[1] = @$output->results[0]->geometry->location->lng;
       
        //city name
        $latlngValue[2] = @$output->results[0]->address_components[1]->long_name;
       
        return $latlngValue;
    }
    


    foreach($addr as $ad)
    {
        
        $addText[] = $ad;
        $LatLong = getLatLngFromAdd($ad);
        $points[] = $LatLong[0].', '. $LatLong[1];
        $firstLat = $LatLong[0];
        $firstLong = $LatLong[1];
    }

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0
  Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="content-type" content="text/html;
    charset=utf-8"/>
    <title>Google Maps JavaScript API Example</title>
    <script src="http://maps.google.com/maps?file=api&v=3"
      type="text/javascript"></script>
    <script type="text/javascript">
    //<![CDATA[
    function load() {
     
        var map = new GMap2(
        document.getElementById("map"));
        map.addControl(new GSmallMapControl());
        map.setCenter(
        new GLatLng('<?php echo $firstLat; ?>', '<?php echo $firstLong; ?>'), 15);
            function createMarker(point, text, title) {
              var marker =
              new GMarker(point,{title:title});
              GEvent.addListener(
              marker, "click", function() {
                marker.openInfoWindowHtml(text);
              });
              return marker;
            }
          <?php
    
        foreach ($points as $key => $point) {
        ?>
        var marker = createMarker(
        new GLatLng(<?php echo $point ?>),'<?php echo $addText[$key] ?>');
        map.addOverlay(marker);
        <?php } ?>
    }

    //]]>
    </script>
  </head>
  <body onload="load()" >
    <div id="map"
    style="width: 500px; height: 300px"></div>
  </body>
</html>
