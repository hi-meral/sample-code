<?php

/**
 * Pages Controller copied from '/cake/libs/controller/pages_controller.php'
 */
class PagesController extends AppController {
	var $name = 'Pages';
	var $helpers = array('Html','Form');
	var $uses = array('Contact');
	var $components = array('Email');


	/**
	 * Default display
	 */
	function display() {
		$path = func_get_args();

		if (!count($path)) {
			$this->redirect('/');
		}
		$count = count($path);
		$page = $subpage = $title = null;

		if (!empty($path[0])) {
			$page = $path[0];
		}
		if (!empty($path[1])) {
			$subpage = $path[1];
		}
		if (!empty($path[$count - 1])) {
			$title = Inflector::humanize($path[$count - 1]);
		}
		$this->set(compact('page', 'subpage', 'title'));
		$this->render(join('/', $path));
	}


	/**
	 * Features Page
	 */	
	function features() {
		// set page title
		$this->pageTitle = 'CakeBattles Features';
		// set thickbox
		$this->set('thickbox',TRUE);
	}


	/**
	 * Contact Page
	 */
	function contact() {
		// set page title
		$this->pageTitle = 'CakeBattles Contact';

		// if form submitted
		if(!empty($this->data)) {
			// set data
			$this->Contact->data = $this->data;
			// try to validate
			if($this->Contact->validates()) {
				// build email and send
				$this->Email->from = $this->data['Contact']['name'].' <'.$this->data['Contact']['email'].'>';
				$this->Email->to = 'insert email address here';
				$this->Email->subject = 'CakeBattles Form Feedback';
				if($this->Email->send($this->data['Contact']['message'])) {
					$this->Session->setFlash('SUCCESS: Email was sent.','flash_good');
				} else {
					$this->Session->setFlash('ERROR: There was a problem sending your message, please try again.','flash_bad');
				}
			}
		}
	}
}

?>