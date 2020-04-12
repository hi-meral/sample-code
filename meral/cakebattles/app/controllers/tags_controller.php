<?php
class TagsController extends AppController {
	var $name = 'Tags';
	var $helpers = array('Html','Form','Time');

	/**
	 * Index view for main site
	 */
	function index() {
		$this->Tag->recursive = 0;
		$this->set('tags', $this->paginate());
	}


	/**
	 * View a single Tag and its Contenders
	 * @slug = slug of the Tag
	 */
	function view($slug = null) {
		if (!$slug) {
			$this->Session->setFlash('Invalid Tag.','flash_bad');
			$this->redirect(array('action'=>'index'));
		}

		// get tag from slug
		$tag = $this->Tag->find('first',array('conditions'=>array('Tag.status'=>1,'Tag.slug'=>$slug)));

		// if empty		
		if (!$tag) {
			$this->Session->setFlash('Invalid Tag.','flash_bad');
			$this->redirect(array('action'=>'index'));
		}

		// set for view
		$this->set('tag', $tag);
	}


	/**
	 * Admin Index
	 */
	function admin_index() {
		$this->Tag->recursive = 0;
		$this->set('tags', $this->paginate());
	}


	/**
	 * Admin View
	 * @id = id of the tag
	 */
	function admin_view($id = null) {
		// if id is invalid
		if (!$id) {
			$this->Session->setFlash('Invalid Tag.','flash_bad');
			$this->redirect(array('action'=>'index'));
		}

		// get & set tag
		$this->set('tag', $this->Tag->read(null, $id));
	}


	/**
	 * Admin Add
	 */
	function admin_add() {
		// if form submitted
		if (!empty($this->data)) {
			// if cancel button pressed
			if(isset($_POST['cancel'])) {
				// redirect
				$this->redirect(array('action'=>'index'));
			}

			// init model
			$this->Tag->create();
			// create slug
			$this->data['Tag']['slug'] = $this->slug($this->data['Tag']['name']);
			
			// init
			$valid = TRUE;

			// see if contender already exists
			$exists = $this->Tag->find('first',array('conditions'=>array('Tag.slug'=>$this->data['Tag']['slug'])));

			// set validation error
			if(!empty($exists)) {
				$this->Tag->validationErrors['name'] = 'The Name already exists.';
				$valid = FALSE;
			}

			// if valid & save successful
			if ($valid && $this->Tag->save($this->data)) {
				// set flash & redirect
				$this->Session->setFlash('The Tag has been saved','flash_good');
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash('The Tag could not be saved. Please, try again.','flash_bad');
			}
		}
		
		// find list of contenders
		$contenders = $this->Tag->Contender->find('list');
		$this->set(compact('contenders'));

		// set tooltips
		$this->set('tooltips',TRUE);
	}


	/**
	 * Admin Edit
	 * @id = id of tag
	 */
	function admin_edit($id = null) {
		// check id is valid
		if (!$id && empty($this->data)) {
			$this->Session->setFlash('Invalid Tag','flash_bad');
			$this->redirect(array('action'=>'index'));
		}
		
		// if form submitted
		if (!empty($this->data)) {
			// if cancel button pressed
			if(isset($_POST['cancel'])) {
				// redirect
				$this->redirect(array('action'=>'index'));
			}
			
			// create slug
			$this->data['Tag']['slug'] = $this->slug($this->data['Tag']['name']);
			
			// init
			$valid = TRUE;

			// see if Tag already exists
			$exists = $this->Tag->find('first',array(
				'conditions'=>array(
					'Tag.slug'=>$this->data['Tag']['slug'],
					'Tag.id !='=>$id
				)
			));

			// validate tag
			$this->Tag->set($this->data);
			if(!$this->Tag->validates()) {
				$valid = FALSE;
			}

			// set validation error
			if(!empty($exists)) {
				$this->Tag->validationErrors['name'] = 'The Name already exists.';
				$valid = FALSE;
			}

			// if valid
			if($valid) {
				// try saving
				if ($this->Tag->save($this->data)) {
					// set flash & redirect
					$this->Session->setFlash('The Tag has been saved','flash_good');
					$this->redirect(array('action'=>'index'));
				} else {
					$this->Session->setFlash('The Tag could not be saved. Please, try again.','flash_bad');
				}
			}
		}
		
		// if form not submitted
		if (empty($this->data)) {
			// find tag and populate form
			$this->data = $this->Tag->read(null, $id);
		}
		
		// find list of contenders
		$contenders = $this->Tag->Contender->find('list');
		$this->set(compact('contenders'));

		// set tooltips
		$this->set('tooltips',TRUE);
	}


	/**
	 * Admin Delete
	 * @id = id of tag
	 */
	function admin_delete($id = null) {
		// check is is valid
		if (!$id) {
			$this->Session->setFlash('Invalid id for Tag','flash_bad');
			$this->redirect(array('action'=>'index'));
		}

		// try deleting tag
		if ($this->Tag->del($id)) {
			// set flash & redirect
			$this->Session->setFlash('Tag deleted','flash_bad');
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>