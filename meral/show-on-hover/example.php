<?php
	if ($_POST) {
		//print_r($_POST);exit;
		$ids = $_POST["ids"];
		for ($idx = 0; $idx < count($ids); $idx+=1) {
			$id = $ids[$idx];
			$ordinal = $idx;
			//...
		}
		return;
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<style type="text/css">
		body { font-family:Arial; font-size:12pt; padding:20px; width: 800px; margin:20px auto; border:solid 1px black; }
		h1 { font-size:16pt; }
		h2 { font-size:13pt; }
		ul { width:auto; list-style-type: none; margin:0px; padding:0px; }
		li { float:left; padding:5px; width:100px; height:100px; }
		li div { width:100px; height:75px; border:solid 1px black; background-color:#E0E0E0; text-align:center; padding-top:0px; }
		.placeHolder div { background-color:white!important; border:dashed 1px gray !important; }
		.dropshadow {
			position:relative;
			-moz-box-shadow: 3px 3px 4px #999; /* Firefox */
			-webkit-box-shadow: 3px 3px 4px #999; /* Safari/Chrome */
			box-shadow: 3px 3px 4px #999; /* Opera and other CSS3 supporting browsers */
			-ms-filter: "progid:DXImageTransform.Microsoft.Shadow(Strength=4, Direction=135, Color='#999999')";/* IE 8 */
			: progid:DXImageTransform.Microsoft.Shadow(Strength=4, Direction=135, Color='#999999');/* IE 5.5 - 7 */ 
		       }
		.delete_icon{ position:absolute;top:-25px;right:-15;height:10px;width:20px;background-color:white;border:0;}
		#hide {display:none}
		#show {display:block}
		
	</style>
</head>
<body>
	
    <div>
        <script type="text/javascript" src="jquery.min.js"></script>
	
        <ul id="gallery">
			<?php
			$list = array("image1.jpg", "image2.jpg", "image3.jpg", "image4.jpg", "image5.jpg", "image6.jpg", "image7.jpg", "image8.jpg", "image9.jpg");
				for ($idx = 0; $idx < count($list); $idx+=1) {
					echo "<li itemID='" . $idx . "' id='slide_1_".$idx."'>";
					echo "<div class='dropshadow'><span style='display:none' id='span_" . $idx . "' ><img src='delete_icon.gif' /></span><img src='images/" . $list[$idx] . "' /></div>";
					echo "</li>";
				}
			?>
		</ul>
		
		<script type="text/javascript" src="jquery.dragsort.js"></script>
		<script type="text/javascript">
		
		$(document).ready(function() {			
			
			/*$(".delete_img").click(function(){
				alert("dsfsd");
				var xid = this.id;
				alert(xid);
			});*/
		

			$("li").hover(function () {
							var liid =  this.id;
							liid = liid.split('_');
							$('#span_'+liid[2]).show('slow');
							
						},
                                                function () {
					
							$(this).find("span").hide();
					
						}
				
			);
		});
		
		//$("#gallery").dragsort({ dragSelector: "div", dragEnd: saveOrder, placeHolderTemplate: "<li class='placeHolder'><div></div></li>" });
		
		function saveOrder(){			
		    var data = $("#gallery li").map(function() {			
			    return $(this).attr("itemID"); }).get();
		    alert(data);
		    $.post("example.php", { "ids[]": data });			
		};
	    </script>
        
        <div style="clear:both;"></div>
    </div>
    
</body>
</html>
