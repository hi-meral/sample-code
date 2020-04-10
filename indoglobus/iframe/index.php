<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>

<iframe src="iframe.php" height="400" width="700" id="frameID" onload="iframeReady();" ></iframe>

<script>
	
	function iframeReady()
	{
		alert($('#frameID').contents().find('#t1').val());
		
		// REMOVE THE FOLLOWING COMMENT AND YOU WILL SEE A RED BOX OF IFRAME WILL BE REMOVED
		//$('#frameID').contents().find('#remove_me').hide();
	}
	
</script>