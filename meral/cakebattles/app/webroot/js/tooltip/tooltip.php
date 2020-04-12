<?php
ob_start('ob_gzhandler');
echo join('',file('jquery.tooltip.js'));
echo join('',file('common.js'));
ob_end_flush();
?>