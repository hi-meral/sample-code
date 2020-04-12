<?php

	include("excelwriter.inc.php");
	
	$filename = date("dmY-his").".xls";
	$excel=new ExcelWriter($filename);
	
	if($excel==false)	
		echo $excel->error;
		
	$myArr=array("Document No","TimeIn","TimeOut","CustCode","CustName","DocumentType","Amount");
	$excel->writeLine($myArr);

	$myArr=array("1101200032","14:41","14:44","1106056","Aswaq Muhaimi","Invoice","271.00");
	$excel->writeLine($myArr);
	
	$myArr=array("1101200032","14:41","14:44","1106056","Aswaq Muhaimi","Invoice","271.00");
	$excel->writeLine($myArr);
	
	//$excel->writeRow();
	//$excel->writeCol("Manoj");
	//$excel->writeCol("Tiwari");
	//$excel->writeCol("80 Preet Vihar");
	//$excel->writeCol(24);
	//
	//$excel->writeRow();
	//$excel->writeCol("Harish");
	//$excel->writeCol("Chauhan");
	//$excel->writeCol("115 Shyam Park Main");
	//$excel->writeCol(22);
	//
	//$myArr=array("Tapan","Chauhan","1st Floor Vasundhra",25);
	//$excel->writeLine($myArr);
	
	$excel->close();
	//echo "Ex is write into myXls.xls Successfully.";
?>
	Data Exported in Excel file - <a href="<?php echo $filename; ?>">Download</a>