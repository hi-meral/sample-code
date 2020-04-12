<?php
class LoginController extends AppController {
	var $name = 'Login';
	var $uses = array('User');


	/**
	 * Logs in an administrator
	 */
	function login() {
	
		// get salt
		//$salt = Configure::read('Security.salt');
		// echo out a default password
		//echo md5($salt.'password');
	
		if(!empty($this->data)) {
			// get salt
			$salt = Configure::read('Security.salt');

			// get user
			$this->User->recursive = 0;
			$user = $this->User->find('first',array(
				'conditions'=>array(
					'User.username'=>$this->data['User']['username'],
					'User.password'=>md5($salt.$this->data['User']['password'])
				)
			));

			// if empty
			if(empty($user)) {
				$this->Session->setFlash('ERROR: Invalid login details.','flash_bad');
			} else {
				// save login time
				$this->User->id = $user['User']['id'];
				$this->User->saveField('last_login',date("Y-m-d H:i:s"));

				// save user and redirect
				$this->Session->write('Admin', $user);
				$this->Session->setFlash('Success: You have logged in.','flash_good');
				$this->redirect(array('controller'=>'contenders','action'=>'index','admin'=>true));
			}
		}
		
		// set layout
		$this->layout = 'admin';
	}


	/**
	 * Logs out an administrator
	 */
	function logout() {
		// delete session data
		$this->Session->delete('Admin');
		// redirect
		$this->Session->setFlash('SUCCESS: You have logged out.','flash_good');
		$this->redirect(array('controller'=>'login','action'=>'login','admin'=>false));
	}
}
?>
