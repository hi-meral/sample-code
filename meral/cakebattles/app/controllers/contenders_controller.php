<?php
class ContendersController extends AppController {

	var $name = 'Contenders';
	var $helpers = array('Html','Form','Time','Misc');
	var $components = array('Upload');
	
	// init
	var $cache_dir = 'img/cache';
	var $cache_width = 400;


	/**
	 * Main index view, displays a Battle between 2 Contenders
	 */
	function index() {
		// get 1st contender
		$contender1 = $this->_get_first_contender(); //pr($contender1); exit;
		// get all data for 2nd contender
		$contender2 = $this->_get_second_contender($contender1);
		
		// set title
		$this->pageTitle = "CakeBattles";
		// set in view
		$this->set(compact('contender1','contender2','top5','toptags'));
	}


	/**
	 * Records the vote against two Contenders
	 * @contender1	= id of the 1st contender
	 * @contender2	= id of the 2nd contender
	 * @winner		= id of the winner
	 * @item		= the item id of the winner
	 */
	function vote($contender1=null,$contender2=null,$winner=null,$item=null) {
		// error check passed arguments
		if(!$contender1 || !$contender2 || !$winner || !$item) {
			$this->redirect(array('action'=>'index'));
		}
		
		// get contenders
		$cont1 = $this->Contender->read(null,$contender1);
		$cont2 = $this->Contender->read(null,$contender2);

		// build data
		$data1 = array('contender_id'=>$contender1,'against'=>$contender2);
		$data2 = array('contender_id'=>$contender2,'against'=>$contender1);

		// record winner
		if($winner == $contender1) {
			// change data
			$data1 = array_merge($data1,array('item_id'=>$item,'won'=>'yes'));
			// increment wins and losses
			$this->Contender->id = $contender1;
			$this->Contender->saveField('won',$cont1['Contender']['won']+1);
			$this->Contender->id = $contender2;
			$this->Contender->saveField('lost',$cont2['Contender']['lost']+1);
		} else {
			// change data
			$data2 = array_merge($data2,array('item_id'=>$item,'won'=>'yes'));
			// increment wins and losses
			$this->Contender->id = $contender2;
			$this->Contender->saveField('won',$cont2['Contender']['won']+1);
			$this->Contender->id = $contender1;
			$this->Contender->saveField('lost',$cont1['Contender']['lost']+1);
		}

		// create battles in db
		$this->Contender->Battle->create();
		$this->Contender->Battle->save($data1);
		$this->Contender->Battle->create();
		$this->Contender->Battle->save($data2);

		// update contender data
		$this->Contender->id = $contender1;
		$this->Contender->saveField('battles',$cont1['Contender']['battles']+1);
		$this->Contender->id = $contender2;
		$this->Contender->saveField('battles',$cont2['Contender']['battles']+1);

		// deal with ajax form
		if(isset($this->params['form']['ajax'])) {
			// get 1st contender
			$contender1 = $this->_get_first_contender();
			// get all data for 2nd contender
			$contender2 = $this->_get_second_contender($contender1);
			// set in view
			$this->set(compact('contender1','contender2'));
			// set message
			$this->set('message','Your vote was recorded.');
			// set layout
			$this->layout = 'ajax';
			// render ajax index
			$this->render('ajax_index');
		} else {
			$this->Session->setFlash('Your vote was recorded.','flash_good');
			$this->redirect(array('action'=>'index'));
		}
	}


	/**
	 * View a Contender
	 * @slug	= slug of contender
	 */
	function view($slug = null) {
		if (!$slug) {
			$this->Session->setFlash(__('Invalid Contender.', true));
			$this->redirect(array('action'=>'index'));
		}

		// get contender from slug
		$contender = $this->Contender->find('first',array('conditions'=>array('Contender.status'=>1,'Contender.slug'=>$slug)));

		// if empty		
		if(empty($contender)) {
			$this->Session->setFlash(__('Invalid Contender.', true));
			$this->redirect(array('action'=>'index'));
		}

		// set thickbox
		$this->set('thickbox',TRUE);
		// set for view
		$this->set('contender', $contender);
	}


	/**
	 * Allows a normal user to add a Contender
	 */
	function add() {
		// form uploaded
		if(!empty($this->data)) {
			// if cancel button pressed
			if(isset($_POST['cancel'])) {
				// redirect
				$this->redirect(array('action'=>'index'));
			}

			// init
			$this->Contender->create();
			// create slug
			$this->data['Contender']['slug'] = $this->slug($this->data['Contender']['name']);

			// init
			$valid = TRUE;

			// validate contender
			$this->Contender->set($this->data);
			if(!$this->Contender->validates()) {
				$valid = FALSE;
			}

			// see if contender already exists
			$exists = $this->Contender->find('first',array('conditions'=>array('Contender.slug'=>$this->data['Contender']['slug'])));
			// set validation error
			if(!empty($exists)) {
				$this->Contender->validationErrors['name'] = 'The Name already exists.';
				$valid = FALSE;
			}

			// if Contender validates
			if($valid) {
				// process tags
				$this->data['Tag']['Tag'] = $this->_process_tags($this->data['Contender']['contender_tags']);
				$this->data['Contender']['status'] = 0;

				// save Contender
				if($this->Contender->save($this->data)){
					// get last insert id
					$id = $this->Contender->getInsertID();
					// create folder
					$this->create_folder("/files/{$id}");

					// get uploaded files
					$files = $this->_get_uploaded_files();

					// loop through files
					if(!empty($files)) {
						foreach($files as $f) {
							// copy file from tmp dir to album dir
							$source = DS.'tmp'.DS.$f;
							$dest = DS.'files'.DS.$id.DS.date("YdmHis").'-'.$f;
							$fileOK = @copy(WWW_ROOT.$source,WWW_ROOT.$dest);
							// delete file
							@unlink(WWW_ROOT.$source);

							// copy successful
							if($fileOK) {
								// init
								$this->Contender->ContenderItem->create();
								// build data
								$data = array(
									'contender_id'=>$id,
									'url'=>str_replace('\\','/',$dest)
								);
								// save contender item
								$this->Contender->ContenderItem->save(array('ContenderItem'=>$data));
								// resize image
								$this->resize_image($dest,$this->cache_width);
							}
						}
					}

					// flash & redirect
					$this->Session->setFlash('The Contender has been saved','flash_good');
					$this->redirect(array('action'=>'index'));
				} else {
					// redirect to edit page
					$this->Session->setFlash('The Contender needs to have items uploaded with it.','flash_bad');
					$this->redirect(array('action'=>"edit/{$id}"));
				}
			} else {
				$this->Session->setFlash('The Contender could not be saved. Please, try again.','flash_bad');
			}
		}

		// set tooltips
		$this->set('tooltips',TRUE);
		// set swfupload
		$this->set('swfupload',TRUE);
	}


	/**
	 * Deals with file upload
	 */
	function upload() {
		// upload file to tmp dir
		echo move_uploaded_file($_FILES['Filedata']['tmp_name'],WWW_ROOT.DS.'tmp'.DS.$_FILES['Filedata']['name']);
		exit;
	}


	/**
	 * Gets the top 5 contenders
	 */
	function top5() {
		// if requested
		if(isset($this->params['requested'])) {
			return $this->_get_top_contenders(); //pr($top5);
		} else {
			// redirect to index
			$this->redirect(array('action'=>'index'));
		}
	}


	/**
	 * Gets the top tags
	 */
	function toptags() {
		// if requested
		if(isset($this->params['requested'])) {
			return $this->_get_top_tags(); //pr($toptags);
		} else {
			// redirect to index
			$this->redirect(array('action'=>'index'));
		}
	}


	/**
	 * Gets the first Contender for a Battle
	 */
	function _get_first_contender() {
		// init
		$contender = array();

		// depending on time either get a random contender
		// or get the contender with the least number of battles
		// keeps things fresh and allows new contenders to be chosen frequently
		if(time()%2 == 0) {
			// get all contenders
			$this->Contender->recursive = 0;
			$contenders = $this->Contender->find('all',array('fields'=>'Contender.id','conditions'=>array('Contender.status'=>1)));

			// if contenders is not empty
			if(!empty($contenders)) {
				// pick random contender
				$random_key = array_rand($contenders);
				// get all data
				$this->Contender->recursive = 1;
				$contender = $this->Contender->read(null,$contenders[$random_key]['Contender']['id']);
			}
		} else {
			// find contender with least number of battles
			$this->Contender->recursive = 1;
			$contender = $this->Contender->find('first',array('order'=>'Contender.battles','conditions'=>array('Contender.status'=>1)));
		}
		
		// if not empty
		if(!empty($contender)) {
			// process tags
			$contender['Contender']['tags_list'] = $this->_get_contender_tags_str($contender['Tag']);
		}

	return $contender;
	}


	/**
	 * Gets the second Contender
	 */
	function _get_second_contender($contender1,$count=0) {
		// init
		$contender2 = array();

		// if not empty
		if(!empty($contender1)) {
			// get random tag
			$tag = array_rand($contender1['Tag']);

			// get full tag data
			$tags = $this->Contender->Tag->find('first',array(
				'conditions'=>array(
					'Tag.id'=>$contender1['Tag'][$tag]['id']
				)
			));

			// loop through and remove first contender
			foreach($tags['Contender'] as $k=>$v) {
				if($contender1['Contender']['id'] == $v['id']) {
					unset($tags['Contender'][$k]);
				}
			}

			// rekey the contenders array
			$tags['Contender'] = array_values($tags['Contender']);

			// if tags are not empty
			if(!empty($tags['Contender'])) {
				// mixes things up
				if(time()%2 == 0) {
					// get random contender2
					$random = array_rand($tags['Contender']);
				} else {
					// get contender with least number of battles
					if(count($tags['Contender'])>=2) {
						$id = 0;
						$battles = 0;
						foreach($tags['Contender'] as $k=>$c) {
							// save first contenders' battles & id
							if($k==0) {
								$battles = $c['battles'];
								$id=$k;
							}

							// if num battles are less
							if($c['battles'] < $battles) {
								$id = $k;
							}
						}

						// save contender with least battles
						$random = $id;
					} else {
						// only one
						$random = 0;
					}
				}

				// get full contender details
				$contender2 = $this->Contender->find('first',array('conditions'=>array('Contender.id'=>$tags['Contender'][$random]['id'])));
			} else {
				if($count==10) {
					return array();
				} else {
					$count = $count+1;
					// recursively get another contender
					$contender2 = $this->_get_second_contender($contender1,$count);
				}
			}
			
			// process tags
			if(isset($contender2['Tag'])) {
				$contender2['Contender']['tags_list'] = $this->_get_contender_tags_str($contender2['Tag']);
			}
		}

	// get all data for 2nd contender
	return $contender2;
	}


	/**
	 * Creates an unordered list of contender tags
	 * @tags = array of tags
	 */
	function _get_contender_tags_str($tags) {
		// init
		$str = '';
		// if not empty
		if(!empty($tags)) {
			$str .= '<ul class="contender_tags">';
			foreach($tags as $k=>$t) {
				$str .= '<li><a href="/tags/view/'.$t['slug'].'">'.$t['name'].'</a></li>';
			}
			$str .= '</ul>';
		}
	return $str;
	}


	/**
	 * Get a list of files in tmp dir
	 */
	function _get_uploaded_files($id = null) {
		// ignore these
		$ignore = array('.','..','.svn');
		// init
		$dir = WWW_ROOT.DS.'tmp';

		// if id is set
		if($id != null) {
			$dir .= DS.$id;
		}

		// get files
		$files = @scandir($dir);
		// if files found
		if(!empty($files)) {
			// loop and check
			foreach($files as $k=>$f) {
				if(in_array($f,$ignore)) {
					unset($files[$k]);
				}
			}
		}
		//pr($files);
	return $files;
	}


	/**
	 * Gets the top contenders by calculating their win percentage
	 */
	function _get_top_contenders() {
		// custom sql to calc win percentage
	return $this->Contender->query("SELECT *,(won/battles)*100 AS won_pc FROM contenders WHERE status=1 ORDER BY won_pc DESC,name LIMIT 5");
	}


	/**
	 * Gets the top tags by calculating number of contenders in each
	 */
	function _get_top_tags() {
		// custom sql query
	return $this->Contender->Tag->query("SELECT tags.*,(SELECT COUNT(*) FROM contenders_tags WHERE tag_id=tags.id) AS num_contenders FROM tags WHERE tags.status= 1 ORDER BY num_contenders DESC,tags.name LIMIT 5");
	}


	/**
	 * Lists all Contenders
	 */
	function admin_index() {
		// set the sql order
		$this->paginate['order'] = 'Contender.name';
		// do not get related data
		$this->Contender->recursive = 0;
		// get & set contenders
		$this->set('contenders', $this->paginate());
	}


	/**
	 * View a Contender
	 * @id	= id of contender
	 */
	function admin_view($id = null) {
		// check id
		if (!$id) {
			// set flash & redirect
			$this->Session->setFlash('Invalid Contender.','flash_bad');
			$this->redirect(array('action'=>'index'));
		}
		
		// set all related data
		$this->Contender->recursive = 2;
		// get contender
		$this->set('contender', $this->Contender->read(null, $id));
	}


	/**
	 * Adds a Contender
	 */
	function admin_add() {
		// if form submitted
		if (!empty($this->data)) {
			// if cancel button pressed
			if(isset($_POST['cancel'])) {
				// redirect
				$this->redirect(array('action'=>'index'));
			}

			// init
			$this->Contender->create();
			// create slug
			$this->data['Contender']['slug'] = $this->slug($this->data['Contender']['name']);

			// init
			$valid = TRUE;

			// validate contender
			$this->Contender->set($this->data);
			if(!$this->Contender->validates()) {
				$valid = FALSE;
			}

			// see if contender already exists
			$exists = $this->Contender->find('first',array('conditions'=>array('Contender.slug'=>$this->data['Contender']['slug'])));
			// set validation error
			if(!empty($exists)) {
				$this->Contender->validationErrors['name'] = 'The Name already exists.';
				$valid = FALSE;
			}


			// if Contender validates
			if($valid) {
				// process tags
				$this->data['Tag']['Tag'] = $this->_process_tags($this->data['Contender']['contender_tags']);

				// save Contender
				if($this->Contender->save($this->data)){
					// get last insert id
					$id = $this->Contender->getInsertID();
					// upload any files
					$this->Upload->do_upload("/files/{$id}");

					// save uploaded items in db
					if(!empty($this->Upload->results['urls'])) {
						// loop through files
						foreach($this->Upload->results['urls'] as $k=>$v) {
							$this->Contender->ContenderItem->create();
							$this->Contender->ContenderItem->save(array('contender_id'=>$id,'url'=>$v));
						}
						// create resized version
						foreach($this->Upload->results['urls'] as $k=>$v) {
							// resize image
							$this->resize_image($v,$this->cache_width);
						}
					}
					
					// check for file upload errors
					if(!empty($this->Upload->errors) || empty($this->Upload->results['urls'])) {
						// set flash
						$this->Session->setFlash('Upload errors occured or items need to be uploaded.','flash_bad');
						// save errors in session
						$this->Session->write('upload_errors',$this->Upload->errors);
						$this->redirect(array('action'=>"edit/{$id}"));
					}

					// flash & redirect
					$this->Session->setFlash('The Contender has been saved','flash_good');
					$this->redirect(array('action'=>'index'));
				} else {
					// redirect to edit page
					$this->Session->setFlash('The Contender needs to have items uploaded with it.','flash_bad');
					$this->redirect(array('action'=>"edit/{$id}"));
				}
			} else {
				$this->Session->setFlash('The Contender could not be saved. Please, try again.','flash_bad');
			}
		}

		// get list of Tags
		$tags = $this->Contender->Tag->find('list');
		$this->set(compact('tags'));
		
		// set tooltips
		$this->set('tooltips',TRUE);
	}


	/**
	 * Edits a Contender
	 * @id	= id of contender to edit
	 */
	function admin_edit($id = null) {
		// check id
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Contender', true));
			$this->redirect(array('action'=>'index'));
		}
		
		// get contender
		$contender = $this->Contender->read(null, $id);
		// process tags
		$contender['Contender']['contender_tags'] = $this->_create_tags_string($contender['Tag']);

		// form submitted
		if (!empty($this->data)) {
			// if cancel button pressed
			if(isset($_POST['cancel'])) {
				// redirect
				$this->redirect(array('action'=>'index'));
			}

			// create slug
			$this->data['Contender']['slug'] = $this->slug($this->data['Contender']['name']);
			
			// init
			$valid = TRUE;

			// validate contender
			$this->Contender->set($this->data);
			if(!$this->Contender->validates()) {
				$valid = FALSE;
			}

			// see if contender already exists
			$exists = $this->Contender->find('first',array(
				'conditions'=>array(
					'Contender.slug'=>$this->data['Contender']['slug'],
					'Contender.id !='=>$id
				)
			));

			// set validation error
			if(!empty($exists)) {
				$this->Contender->validationErrors['name'] = 'The Name already exists.';
				$valid = FALSE;
			}


			// upload any files
			$this->Upload->do_upload("/files/{$id}");
			// no upload errors				
			if(!empty($this->Upload->results['urls'])) {
				// loop through files
				foreach($this->Upload->results['urls'] as $k=>$v) {
					$this->Contender->ContenderItem->create();
					$this->Contender->ContenderItem->save(array('contender_id'=>$id,'url'=>$v));
				}
				// create resized version
				foreach($this->Upload->results['urls'] as $k=>$v) {
					// resize image
					$this->resize_image($v,$this->cache_width);
				}
			}

			// save contender
			if($valid) {
				// process tags
				$this->data['Tag']['Tag'] = $this->_process_tags($this->data['Contender']['contender_tags']);

				// save
				if ($this->Contender->save($this->data)) {
					// no files exist for contender
					if(empty($contender['ContenderItem']) && empty($this->Upload->results['urls'])) {
						// set flash
						$this->Session->setFlash('Please select some items to upload.','flash_bad');
					} elseif(!empty($this->Upload->errors)) {
						// save errors
						$this->set('upload_errors',$this->Upload->errors);
						$this->data = $contender;
					} else {
						// set flash & redirect
						$this->Session->setFlash('The Contender has been saved','flash_good');
						// if save and close
						if(isset($_POST['saveclose'])) {
							$this->redirect(array('action'=>'index'));
						} else {
							$this->redirect(array('action'=>"edit/{$id}"));
						}
					}
				} else {
					$this->Session->setFlash('The Contender could not be saved. Please, try again.','flash_bad');
				}
			}
		}

		// populate form with data
		if (empty($this->data)) {
			// if upload errors occured on add
			if($this->Session->check('upload_errors')) {
				// save errors
				$errors = $this->Session->read('upload_errors');
				$this->set('upload_errors', $errors);
				// delete session variable
				$this->Session->delete('upload_errors');
			}
			// populate form
			$this->data = $contender;
		}

		// get list of tags
		$tags = $this->Contender->Tag->find('list');
		$this->set(compact('tags'));

		// set tooltips
		$this->set('tooltips',TRUE);
	}


	/**
	 * Deletes a Contender and any associated items
	 * @id	= id of the contender
	 */
	function admin_delete($id = null) {
		// check id
		if (!$id) {
			$this->Session->setFlash('Invalid id for Contender','flash_bad');
			$this->redirect(array('action'=>'index'));
		}
		// delete contender
		if ($this->Contender->del($id)) {
			// delete all images and directory
			$this->delete_folder("files/{$id}");
			$this->Session->setFlash('Contender deleted','flash_good');
			$this->redirect(array('action'=>'index'));
		}
	}


	/**
	 * Activates a Contender
	 * @id = id of the contender
	 */
	function admin_activate($id = null) {
		// check id
		if (!$id) {
			$this->Session->setFlash('Invalid id for Contender','flash_bad');
			$this->redirect(array('action'=>'index'));
		}
		
		// set id
		$this->Contender->id = $id;
		
		// change status field
		if($this->Contender->saveField('status',1)) {
			$this->Session->setFlash('Contender was activated','flash_good');
		}
		$this->redirect(array('action'=>'index'));
	}


	/**
	 * Deactivates a contender
	 * @id = id of the contender
	 */
	function admin_deactivate($id = null) {
		// check id
		if (!$id) {
			$this->Session->setFlash('Invalid id for Contender','flash_bad');
			$this->redirect(array('action'=>'index'));
		}
		
		// set id
		$this->Contender->id = $id;
		
		// change status field
		if($this->Contender->saveField('status',0)) {
			$this->Session->setFlash('Contender was deactivated','flash_good');
		}
		$this->redirect(array('action'=>'index'));
	}


	/**
	 * Resizes an image
	 * @url		= url of the file
	 * @width	= width to resize too
	 * @height	= height to resize too
	 */
	function resize_image($url, $width = '*', $height = '*') {
		// check url is absolute path
		if(!file_exists($url)) {
			// file path
			$path_ab = WWW_ROOT.$url;
		}

		// if file exists
		if(file_exists($path_ab)) {
			// get image details
			$details = getimagesize($path_ab);
			// if either width or height is an asterix
			if($width == '*' || $height == '*') {
				if($height == '*') {
					// recalculate height
					$height = ceil($width / ($details[0]/$details[1]));
				} else {
					// recalculate width
					$width = ceil(($details[0]/$details[1]) * $height);
				}
			} else {
				if (($details[1]/$height) > ($details[0]/$width)) {
					$width = ceil(($details[0]/$details[1]) * $height);
				} else {
					$height = ceil($width / ($details[0]/$details[1]));
				}
			}

			// include folder in filename
			$dir_path = preg_replace("/[^a-z0-9_]/", "_", strtolower(dirname($url)));
			$dir_path .= '-'.basename($url);

			// create new file names
			$file_rel = $this->cache_dir.DS.$width.'x'.$height.'_'.$dir_path;
			$file_cached = WWW_ROOT.$this->cache_dir.DS.$width.'x'.$height.'_'.$dir_path;

			// switch on file type
			switch($details[2])
			{
				// deal with jpg file
				case 2:
					// get source file
					$source = imagecreatefromjpeg($path_ab);
					// create tmep image resource
					$temp = imagecreatetruecolor($width,$height);
					// resize the image
					imagecopyresampled($temp,$source,0,0,0,0,$width,$height,$details[0],$details[1]);
					// save the result to cache dir
					$success = imagejpeg($temp, $file_cached, 90);
					// destroy image resources
					imagedestroy($source);
					imagedestroy($temp);
				break;
			}
		}
	}


	/**
	 * Processes a Tag string and converts into data to save to db
	 * @tags_str = string of comma seperated tags from form
	 */
	function _process_tags($tags_str) {
		// init
		$data = array();
		// get list of all tags
		$tags = $this->Contender->Tag->find('list');
		// explode tags
		$ex = explode(',',$tags_str);
		// loop through form tags
		foreach($ex as $key=>$value) {
			// has tag been found
			$found = false;
			// trim value
			$value = ucfirst(trim($value));
			// loop through tags in db
			foreach($tags as $k=>$v) {
				if( $value==$v ) {
					$data[] = $k;
					$found = true;
					break;
				}
			}

			// if tag not found
			if(!$found) {
				// build data
				$save = array('Tag'=>array('name'=>$value,'slug'=>$this->slug($value)));
				$this->Contender->Tag->create();
				// save tag to db
				if($this->Contender->Tag->save($save)) {
					// get last id
					$data[] = $this->Contender->Tag->getLastInsertID();
				}
			}
		}
	return $data;
	}


	/**
	 * Creates a string with a comma seperated list of tags
	 * @tags = list of tags
	 */
	function _create_tags_string($tags) {
		// init
		$str = '';

		// if tags not empty
		if(!empty($tags)) {
			// loop through tags
			foreach($tags as $k=>$t) {
				$str .= ucfirst($t['name']).', ';
			}
		}
	return $str;
	}
}
?>