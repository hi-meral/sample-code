
<?php

$time = "winter";

$abc = new abc();



eval("\$abc->$time();");


class abc{
function winter()
{
	echo "i love cold";
}
}
?>