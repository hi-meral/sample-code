<?php
ob_start('ob_gzhandler');
echo join('',file('jquery/jquery-1.2.6.min.js'));
echo join('',file('admin/common.js'));
ob_end_flush();
?>