<?php
ob_start('ob_gzhandler');
echo join('',file('thickbox.js'));
ob_end_flush();
?>