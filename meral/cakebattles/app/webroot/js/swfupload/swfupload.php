<?php
ob_start('ob_gzhandler');
echo join('',file('swfupload.js'));
echo join('',file('swfupload.queue.js'));
echo join('',file('fileprogress.js'));
echo join('',file('handlers.js'));
echo join('',file('common.js'));
ob_end_flush();
?>