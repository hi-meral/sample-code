<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>UploadiFive Test</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="jquery.uploadify.min.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="uploadify.css">
<style type="text/css">
body {
	font: 13px Arial, Helvetica, Sans-serif;
}
</style>
</head>

<body>
	<h1>Uploadify Demo</h1>
	<form>
		<div id="queue"></div>
		<input id="file_upload" name="file_upload" type="file" multiple>
        <div id="fileColl"></div>
	</form>
	<div id="temp"></div>
	<script type="text/javascript">
		<?php $timestamp = time();?>
		function readObj(obj)
		{
		 var errors = '';
										 for (var prop in obj) {
			 errors += prop + ": " + obj[prop] + "\n";
		 }
		 alert(errors);
		}
		
		$(function() {
		
			$('#file_upload').uploadify({
				'formData'     : { 
					'multi'      : true,
					'timestamp' : '<?php echo $timestamp;?>',
					'token'     : '<?php echo md5('unique_salt' . $timestamp);?>'
					
				},
				'onUploadComplete' : function(file, data) {
            	
				//readObj(file.type);
				var nowfile;
				if(file.type=='.docx')
					nowfile = 'doc.jpg';
				else
					nowfile = file.name;
					
				var realContent = '<img src=uploads/'+nowfile+' width="200" />';
				var realHideContent = '<input type="hidden" name="fname[]" value="'+file.name+'" />';
				
				$('#temp').append(realContent);
				$('#fileColl').append(realHideContent);
			
        } ,
				'swf'      : 'uploadify.swf',
				'uploader' : 'uploadify.php'
			});
		});
	</script>
</body>
</html>