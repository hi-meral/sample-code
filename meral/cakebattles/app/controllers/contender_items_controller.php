<?php
class ContenderItemsController extends AppController {

	var $name = 'ContenderItems';
	var $helpers = array('Html', 'Form');


	/**
	 * Deletes a Contender Item
	 */
	function admin_delete($id = null) {
		// check id is valid
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for ContenderItem', true));
			$this->redirect(array('action'=>'index'));
		}

		// get item
		$item = $this->ContenderItem->read(null,$id);

		// try deleting
		if ($this->ContenderItem->del($id)) {
			// delete file
			$this->delete_file($item['ContenderItem']['url']);
			$this->Session->setFlash('ContenderItem deleted','flash_good');
			$this->redirect(array('controller'=>'contenders','action'=>'view/'.$item['Contender']['id']));
		}
	}

}
?>