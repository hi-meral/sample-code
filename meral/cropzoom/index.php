<?php

                        $photo = "sea.jpg";
                        $ps = getimagesize($photo);
                        
                        $iw = $ps[0];
                        $ih = $ps[1];
                        
                        if($iw>500)
                        {
                            $ih = ($ih*(50000/$iw))/100;
                            $iw = 500;
                        }
                        echo $ih;
?>
<link href="ui.css" rel="Stylesheet" type="text/css" />
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="ui.js"></script>
<script type="text/javascript" src="cropzoom.js"></script>
<script>
$(document).ready(function(){
          var cropzoom = $('#crop_container').cropzoom({
            width:<?php echo $iw; ?>,
            height:<?php echo $ih; ?>,
            bgColor: '#CCC',
            enableRotation:true,
            enableZoom:true,
            zoomSteps:10,
            rotationSteps:4,
            selector:{        
              borderColor:'blue',
              borderColorHover:'yellow',
              startWithOverlay: false,
              hideOverlayOnDragAndResize: true
            },
            image:{
                source:'sea.jpg',
                width:<?php echo $iw; ?>,
                height:<?php echo $ih; ?>,
                minZoom:10,
                maxZoom:150,
                snapToContainer:true
		
            }
        });
});
</script>
<div style="background-color: rgb(204, 204, 204); overflow: hidden; position: relative; border: 2px solid rgb(51, 51, 51);" id="crop_container"> 
                        </div>