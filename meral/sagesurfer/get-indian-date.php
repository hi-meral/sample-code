<?php

//echo gmdate('Y-m-d h:i:s');

$date=date_create(gmdate('Y-m-d h:i:s'));
date_add($date,date_interval_create_from_date_string("330 minutes"));
$indian_date =  date_format($date,"Y-m-d h:i:s");