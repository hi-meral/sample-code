<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>

<iframe src="iframe2.php" height="200" width="200" id="da-iframe" onload="" ></iframe>

<script>

function displayMessage (evt) {
	var x = evt.data;
	alert(evt.data);
	document.getElementById("received-message").innerHTML = document.getElementById("received-message").innerHTML + ' ' + evt.data;
}

if (window.addEventListener) {
	// For standards-compliant web browsers
	window.addEventListener("message", displayMessage, false);
}
else {
	window.attachEvent("onmessage", displayMessage);
}

	
</script>


<div id="received-message" >



</div>
