<?php
 echo $_COOKIE["city"];

    setcookie("city",1,time()+3600);
    
    
    print_r($_COOKIE);

?>