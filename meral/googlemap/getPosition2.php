<!DOCTYPE html>
<!--
 Copyright 2008 Google Inc.
 Licensed under the Apache License, Version 2.0:
 http://www.apache.org/licenses/LICENSE-2.0
 -->
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <title>Saving User-Added Form Data Example</title>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script type="text/javascript">
    var marker;
    var infowindow;

   function updateMarkerPosition(latLng) 
{
    //document.getElementsByClassName('add_lat')[1].value = latLng.lat();
    //document.getElementsByClassName('add_lng')[1].value = latLng.lng();
    
    document.getElementById('add_lat').value = latLng.lat();
    document.getElementById('add_lng').value = latLng.lng();
}   

function add_editable_mkr()
{
    //var popup_form = new google.maps.InfoWindow({      
    //    maxWidth:800
    //});
    //
    //// Infowindow form
    //var html =  '<div>'+
    //                '<form name="add_data" action="phpinsert.php">'+
    //                        '<input type="text" class="add_lat" name="add_lat" value=""/>'+
    //                        '<input type="text" class="add_lng" name="add_lng" value=""/>'+         
    //                '</form>'+
    //                '</div>'; 
    //
    //popup_form.setContent(html);

    var marker_drag = new google.maps.Marker(
    {
        position: map.getCenter(),
        draggable:true,
        map: map,
    });                     

    google.maps.event.addListener(marker_drag, "click", function() 
    {                   
        //popup_form.open(map, marker_drag);
        updateMarkerPosition(marker_drag.getPosition());
    }); 

    google.maps.event.addListener(marker_drag, 'dragstart', function()
    {
       // popup_form.close();
    });
    google.maps.event.addListener(marker_drag, 'dragend', function() 
    {
       // popup_form.open(map, marker_drag);
        updateMarkerPosition(marker_drag.getPosition());
    }); 


    google.maps.event.addListener(map, 'click', function(event)
    {
        marker_drag.setPosition(event.latLng);
    }); 
}

function initialize() 
{
    map = new google.maps.Map(document.getElementById("map"), 
    {
      center: new google.maps.LatLng(22.293623147685903,70.75663626194),  
        zoom: 4,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        mapTypeControl: true,
        mapTypeControlOptions: 
        {
            style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR
        },
        navigationControl: true,
        navigationControlOptions: 
        {
            style: google.maps.NavigationControlStyle.LARGE
        }
    });


    add_editable_mkr(); 
}

    function doNothing() {}
    </script>
  </head>
  <body style="margin:0px; padding:0px;" onload="initialize()">
    <div id="map" style="width: 500px; height: 300px"></div>
    <div id="message"></div>
    <form name="add_data" action="phpinsert.php">
                            <input type="text" id="add_lat" name="add_lat" value=""/>
                            <input type="text" id="add_lng" name="add_lng" value=""/>     
                    </form>
  </body>
</html>