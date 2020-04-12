<?php
class AppController extends Controller {

	/**
	 * beforeFilter()
	 * 
	 */
	function beforeFilter() {
		if(isset($this->params['admin'])) {
			$this->layout = 'admin';
			$this->admin = $this->check_admin();
		}
	}


	/**
	 * checks an admin user is logged in
	 */
	function check_admin() {
		// check session exists
		if(!$this->Session->check('Admin')) {
			$this->Session->setFlash(__('ERROR: You must be logged in for that action.', true));
			$this->redirect(array('controller'=>'contenders', 'action'=>'index', 'admin'=>false));
		}
	}


	/**
	 * slug()
	 * creates a url friendly slug from a string
	 * @string	= the string to slug'ify
	 */
	function slug($string = null) {
		// init
		$map = array('/!/'=>'','/£/'=>'','/$/'=>'','/%/'=>'','/\(/'=>'','/\)/'=>'','/\'/'=>'');
		// replace unwanted characters
		$string = strtolower(preg_replace(array_keys($map), array_values($map), $string));
		// run through inflector slug
		$slug = Inflector::slug($string);
	// return
	return $slug;
	}


	/**
	 * parses a date
	 * @date = date to parse
	 * @return = array of data for date
	 */
	function parse_date($date) {
		// explode date
		$ex = preg_split('/[- :]/', $date);
		//mktime(hour,min,sec,mon,day,year);
		$nice = date("jS F Y",mktime(0,0,0,$ex[1],$ex[2],$ex[0]));
		// save
		$parsed = array(
			'hour'=>$ex[3],
			'min'=>$ex[4],
			'sec'=>$ex[5],
			'month'=>$ex[1],
			'day'=>$ex[2],
			'year'=>$ex[0],
			'nice'=>$nice
		);

	return $parsed;
	}


	/**
	 * loops through and creates all the directories
	 * @dir = directory to create
	 */
	function create_folder($dir) {
		// explode
		$explode = explode('/', $dir);
		$url = WWW_ROOT;

		if(!is_dir(WWW_ROOT.$dir)) {
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

	// deletes all files and folder
	function delete_folder($folder) {
		// init
		$url 	= '';

		// if passed a full absolute folder
		if(is_dir($folder)) {
			$url = $folder;
		}
		
		// add root to folder
		if(is_dir(WWW_ROOT.$folder)) {
			$url = WWW_ROOT.$folder;
		}
		
		// valid url
		if($url!='') {
			// get files in folder
			$files = @scandir($url);
			// loop and delete files
			foreach($files as $k=>$v) {
				if(($v!='.' || $v!='..') && file_exists($url.'/'.$v)) {
					@unlink($url.'/'.$v);
				}
			}
			// delete folder
			rmdir($url);
		}
	}
	
	// deletes a file
	function delete_file($file) {
		// init
		$url = '';

		// if passed full absolute url
		// if passed a full absolute folder
		if(file_exists($file)) {
			$url = $file;
		}

		// add root to folder
		if(file_exists(WWW_ROOT.$file)) {
			$url = WWW_ROOT.$file;
		}

		//echo $url;
		//echo 'here';

		// valid url
		if($url!='' && file_exists($url)) {
			@unlink($url);
		}
	}
}
?>