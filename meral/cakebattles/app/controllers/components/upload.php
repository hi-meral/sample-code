<?php
class UploadComponent extends Object {

	// init
	var $errors = array();
	var $results = array();
	var $upload = false;
	var $permitted = array('image/jpeg');
	var $maxfilesize = 1048576;

	/**
	 * uploads files to the file system
	 * @dir	= directory to upload to
	 */
	function do_upload($dir = null, $form = 'Files') {
		// init
		$absolute_url = WWW_ROOT.$dir;
		$relative_url = $dir;

		// create directories
		$this->create_dir($dir);

		// loop through files
		foreach($_FILES[$form]['name'] as $key=>$file) {
			// convert filename
			$filename = preg_replace('/[^a-zA-Z0-9._ ]/','',$_FILES[$form]['name'][$key]);
			// replace spaces with underscores
			$filename = strtolower(str_replace(' ', '_', $_FILES[$form]['name'][$key]));
			// assume filetype is false
			$typeOK = false;
			// check filetype is permitted
			if(in_array($_FILES[$form]['type'][$key],$this->permitted)) {
				$typeOK = true;
			}

			// if file is over max limit
			if($_FILES[$form]['error'][$key]==2) {
				$typeOK = true;
			}

			// if file not selected
			if($_FILES[$form]['error'][$key]==4) {
				$typeOK = true;
			}

			// if type ok
			if($typeOK) {
				// switch based on error code
				switch($_FILES[$form]['error'][$key]) {
					case 0:
						// create unique filename and upload file
						ini_set('date.timezone', 'Europe/London');
						$now = date("YdmHis");
						$full_url = $absolute_url.'/'.$now.'-'.$filename;
						$url = $relative_url.'/'.$now.'-'.$filename;
						$success = move_uploaded_file($_FILES[$form]['tmp_name'][$key], $full_url);

						// if upload was successful
						if($success) {
							$this->upload = true;
							$this->results['urls'][] = $url;
						} else {
							$this->errors[] = "Error uploaded $filename. Please try again.";
						}
					break;
					case 2:
						// an error occured
						$this->errors[] = "Error uploading $filename. File exceeds max file size (".($this->maxfilesize/1048576)."MB).";
					break;
					case 3:
						// an error occured
						$this->errors[] = "Error uploading $filename. Please try again.";
					break;
					case 4:
						// no file uploaded
						$this->results[] = "No File was selected.";
					break;
					default:
						// an error occured
						$this->errors[] = "System error uploading $filename. Contact website admin.";
					break;
				}
			} else {
				// unacceptable file type
				$this->errors[] = "$filename cannot be uploaded. Acceptable file types: gif, jpg, png.";
			}
		}
	return $this->upload;
	}


	/**
	 * loops through and creates all the directories
	 * @dir = directory to create
	 */
	function create_dir($dir) {
		// explode
		$explode = explode('/', $dir);
		$url = WWW_ROOT;

		// loop through
		foreach($explode as $e) {
			$url .= $e.DS;
			if(!is_dir($url)) {
				mkdir($url);
				chmod($url, 0777);
			}
		}
	}
}
?>