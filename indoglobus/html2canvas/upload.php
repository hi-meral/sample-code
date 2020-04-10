<?php
print_r($_FILES["data"]["tmp_name"]);

echo move_uploaded_file($_FILES["data"]["tmp_name"],"term.png");

?>