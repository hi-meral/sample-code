<script>


function displayMessage (evt) {
	var message;
	//alert(evt.origin);
	/*if (evt.origin !== "http://localhost") {
		message = "You are not worthy";
	}
	else {
		message = "I got " + evt.data + " from " + evt.origin;
	}
	*/
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