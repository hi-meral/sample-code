<!DOCTYPE html>
<html>
  <head>
    <title>Audio playbackRate Example</title>  
</head>
<body>
<div>
  <audio id="audio_1" preload="metadata" style="width:25%" src="https://ia802508.us.archive.org/5/items/testmp3testfile/mpthreetest.mp3" controls="true" >Canvas not supported</audio><button id="ffbutton_1" onclick="fastSeek1(1);">Fast Seek</button>
</div>
<div>

</div>
  <button id="playbutton_1" onclick="playAudio(1);">Play</button>  
  <button id="pausebutton_1" onclick="pauseAudio(1);">Pause</button> 
  
  <div id="rate"></div>

     <script type="text/javascript">
       // Create a couple of global variables to use. 
       
      
       function playAudio(ele) {
		   
		   document.getElementById("audio_"+ele).play();
         
       }

       function pauseAudio(ele) {
		   document.getElementById("audio_"+ele).pause();
         
       }
	   
	   function fastSeek1(ele)
	   {
		   var audioElm = document.getElementById("audio_"+ele); // Audio element
		   
		   audioElm.currentTime = audioElm.currentTime+5;
		   audioElm.play();
		   
	   }

     </script>


</body>
</html>