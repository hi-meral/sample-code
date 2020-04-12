<?
$user_id = "waystudios"; //userid
$num_to_display = "20"; //instagram limits to max 20, but you can do less for your layout.
$access_token = "399003509.bd24a8e.38af274e8aa64bd0acf3fdcd0f5518f8"; 
?>

<style>
.instagram-placeholder {
float: left;
}
</style>

<h1>jQuery Instagram User Stream Display Really Easy with a json call</h1>
uses jQuery and json to get an instagram user feed and display it on your site.
<br/>
<br/>
<a href="http://stuffthatspins.com/2012/03/30/display-instagram-picture-stream-really-easy-with-jquery-and-json/">Source Code Download</a>

<br/>

<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<div class="instagram"></div>

<script>

//HELP FROM HERE... THANKS!
//https://forrst.com/posts/Using_the_Instagram_API-ti5

// small = + data.data[i].images.thumbnail.url +
// resolution: low_resolution, thumbnail, standard_resolution

$(document).ready(function() {
    $.ajax({
    	type: 'GET',
        url: 'https://api.instagram.com/v1/users/399003509/media/recent/?access_token=399003509.bd24a8e.38af274e8aa64bd0acf3fdcd0f5518f8',
        success: function(data) {
			
			alert(data);
      //      for (var i = 0; i < 20; i++) {
      //  $(".instagram").append("<div class='instagram-placeholder'><a target='_blank' href='" + data.data[i].link +"'><img class='instagram-image' src='" + data.data[i].images.low_resolution.url +"' /></a></div>");   
      //		}     
                            
        }
    });
});

</script>

