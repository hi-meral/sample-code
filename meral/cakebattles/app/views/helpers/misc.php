<?php
class MiscHelper extends AppHelper {

	/**
	 * display errors
	 */
	function display_errors($errors, $message = 'You have the following errors:',$class = 'errors') {
		$str = '';
		if(!empty($errors)) {
			$str .= "<ul class='".$class."'><li><strong>".$message."</strong></li>";
			foreach($errors as $e) {
				$str .= "<li>{$e}</li>";
			}
			$str .= '</ul>';
		}
	return $str;
	}
}
?>