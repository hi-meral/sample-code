<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
<form id="the-form" action="/">
					<input type="text" id="my-message" value="Your message">
					<input type="submit" value="postMessage">
				</form>
<iframe src="iframe.php" height="400" width="700" id="da-iframe" onload="" ></iframe>

<script>
	
	window.onload = function () {

var iframeWin = document.getElementById("da-iframe").contentWindow, 

form = document.getElementById("the-form"),

myMessage = document.getElementById("my-message");
 

myMessage.select();
 
form.onsubmit = function () {

iframeWin.postMessage(myMessage.value, "http://localhost");

return false;

};

};
	
</script>