<?php
 
require_once 'Excel/reader.php';
$data = new Spreadsheet_Excel_Reader();
 
// Set output Encoding.
$data->setOutputEncoding('CP1251');
 
/***
* if you want you can change 'iconv' to mb_convert_encoding:
* $data->setUTFEncoder('mb');
*
**/
 
/***
* By default rows & cols indeces start with 1
* For change initial index use:
* $data->setRowColOffset(0);
*
**/
 
/***
*  Some function for formatting output.
* $data->setDefaultFormat('%.2f');
* setDefaultFormat - set format for columns with unknown formatting
*
* $data->setColumnFormat(4, '%.3f');
* setColumnFormat - set format for column (apply only to number fields)
*
**/
 
$data->read('tres.xlsx');	//Passing the excel sheet to be read from PHP

 $n = $data->sheets[0]['numRows'];
for($i=0; $i<=$n; $i++)
{
	echo $data->sheets[0]['cells'][$i][1]."<br />";
}
 
?>