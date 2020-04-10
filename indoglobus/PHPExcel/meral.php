<?php

$conn = mysqli_connect("localhost","root","","test");

/** Include PHPExcel */
require_once dirname(__FILE__) . '/Classes/PHPExcel.php';

// Give them more time to download the file - 5 minutes
        set_time_limit(300);

        while (@ob_end_clean());

        header('Cache-Control: ');
        header('Pragma: ');
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment;filename=my_filename.xls");

        $i=0;

        $xls = new PHPExcel();

		$all_report_view = array('aaa','bbb');
		
        foreach ($all_report_view as $report_view_xls) {

			$addon_analysis_rs[$report_view_xls] = mysqli_query($conn,"select * from emp");
		
            if($i>0)
            $xls->createSheet();

            $xls->setActiveSheetIndex($i);
			
			$highestRow = $xls->getActiveSheet()->getHighestRow() + 1;
			
			while($data=mysqli_fetch_assoc($addon_analysis_rs[$report_view_xls]))
			{
				$xls->getActiveSheet()->fromArray($data, null, 'A' . $highestRow++);
			}

            //$xls->getActiveSheet()->setCellValue('A1', 'Firstname:')->setCellValue('A2', 'Lastname:');

            $xls->getActiveSheet()->setTitle(ucwords(str_replace("_"," ",$report_view_xls)));

            /* $exporter->sendRow(array($report_view_xls));
            $exporter->sendRow(array(' '));
            $exporter->send($addon_analysis_rs[$report_view_xls], "", false, false);
            $exporter->sendRow(array(' '));
            $exporter->sendRow(array(' ')); */
            $i++;
        }

	$objWriter = PHPExcel_IOFactory::createWriter($xls, 'Excel2007');
        $objWriter->save('php://output');
        exit;
		
		?>