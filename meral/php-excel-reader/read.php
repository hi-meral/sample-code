<?php
error_reporting(E_ALL ^ E_NOTICE);
require_once 'excel_reader_main.php';
$data = new Spreadsheet_Excel_Reader("new.xls",false);
?>
<html>
<head>
<style>
table.excel {
	border-style:ridge;
	border-width:1;
	border-collapse:collapse;
	font-family:sans-serif;
	font-size:12px;
}
table.excel thead th, table.excel tbody th {
	background:#CCCCCC;
	border-style:ridge;
	border-width:1;
	text-align: center;
	vertical-align:bottom;
}
table.excel tbody th {
	text-align:center;
	width:20px;
}
table.excel tbody td {
	vertical-align:bottom;
}
table.excel tbody td {
    padding: 0 3px;
	border: 1px solid #EEEEEE;
}
</style>
</head>

<body>
<?php
//echo $data->dump(true,true,1);

/* Insert into appsdetails table */
$data_array = array();
$data_array = $data->dumparray(true,true,0);



$column1 = "\n";
$column2 = "\n";
$column3 = "\n";

for( $i=2; $i<count($data_array); $i++) {
	$value = $data_array[$i][1];
	
	$newval = explode("-",$value);
	
	$column1 .= $newval[0]."\n";
	$column2 .= $newval[1]."\n";
	$column3 .= $newval[2]."\n";
	
	
}

echo "<pre>";

echo "<B>COLUMN-1</B><BR><BR>";
print_r($column1);

echo "<B>COLUMN-2</B><BR><BR>";
print_r($column2);

echo "<B>COLUMN-3</B><BR><BR>";
print_r($column3);


$myFile = "column1.txt";
$fh = fopen($myFile, 'a');
$stringData = $column1;
fwrite($fh, $stringData);
fclose($fh);

$myFile = "column2.txt";
$fh = fopen($myFile, 'a');
$stringData = $column2;
fwrite($fh, $stringData);
fclose($fh);

$myFile = "column3.txt";
$fh = fopen($myFile, 'a');
$stringData = $column3;
fwrite($fh, $stringData);
fclose($fh);


//echo $data->_parse();
?>
</body>
</html>
