// init swfupload var
var swfu;

// on dom ready
$(document).ready(function(){

	var settings = {
		// url of flash uploader
		flash_url : "/js/swfupload/swfupload.swf",
		// controller and action to deal with uploads
		upload_url: "/contenders/upload/",
		// insert session id
		post_params: {"PHPSESSID" : session_id},
		// set file limit
		file_size_limit : "1 MB",
		// restrict to jpegs only
		file_types : "*.jpg;*.jpeg",
		// what to display in file dialog box
		file_types_description : "JPEG Files",
		// upload limit
		file_upload_limit : 5,
		// queue limit
		file_queue_limit : 5,
		// ids of custom divs
		custom_settings : {
			progressTarget : "fsUploadProgress",
			cancelButtonId : "btnCancel"
		},
		// set debug to false
		debug: false,

		// setup the button
		button_width: "110",
		button_height: "30",
		// uses a sprite to handle normal/hover/active clicks
		button_image_url : "/img/button_sprite.png", 
		// id of button in view
		button_placeholder_id: "spanButtonPlaceHolder",
		// insert into placeholder
		button_text: '<span class="theFont">Upload Files</span>',
		// style the font
		button_text_style: ".theFont { font-size: 16px; }",
		// set padding
		button_text_left_padding: 12,
		button_text_top_padding: 3,


		// The event handler functions are defined in handlers.js
		file_queued_handler : fileQueued,
		file_queue_error_handler : fileQueueError,
		file_dialog_complete_handler : fileDialogComplete,
		upload_start_handler : uploadStart,
		upload_progress_handler : uploadProgress,
		upload_error_handler : uploadError,
		upload_success_handler : uploadSuccess,
		upload_complete_handler : uploadComplete,
		queue_complete_handler : queueComplete	// Queue plugin event
	};

	// init swf object
	swfu = new SWFUpload(settings);

	// select files
	$('.selectFiles').click(function(){
		// depreciated not compatable with flash 10
		//swfu.selectFiles();
	});

	// cancel queue
	$('.cancelQueue').click(function(){
		swfu.cancelQueue();
	});

});