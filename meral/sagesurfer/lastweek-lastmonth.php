<?php

echo $last_monday = date('d-m-Y', strtotime('monday this week')) ;
echo "<br>";
echo date("d-m-Y");

// last week
echo "<hr>";

echo $last_week_monday = date('d-m-Y', strtotime('monday last week')) ;
echo "<br>";
echo $last_week_sunday = date('d-m-Y', strtotime('sunday last week')) ;


// current month
echo "<hr>";

echo date('d-m-Y', strtotime('first day of this month')) ;
echo "<br>";
echo date("d-m-Y");


// last month
echo "<hr>";

echo date('d-m-Y', strtotime('first day of last month')) ;
echo "<br>";
echo date('d-m-Y', strtotime('last day of last month')) ;