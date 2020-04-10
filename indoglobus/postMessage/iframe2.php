
<form id="the-form" action="/">
					<input type="text" id="my-message" value="Your message">
					<input type="button" onclick="javascript:window.parent.postMessage(document.getElementById('my-message').value , 'http://localhost');" value="postMessage">
				</form>