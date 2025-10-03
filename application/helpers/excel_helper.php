<?php

include "PHPExcel/PHPExcel.php";
error_reporting(E_ALL);
ini_set('display_startup_errors', TRUE);
ini_set('display_errors', TRUE);
date_default_timezone_set('Asia/Baku');



function exportData($column_name=array(),$data=array()){
    $column_index=array(
        'A',
        'B',
        'C',
        'D',
        'E',
        'F',
        'G',
        'H',
        'I',
        'J',
        'K',
        'L',
        'M',
        'N',
        'O',
        'P',
        'Q',
        'R',
        'S',
        'T',
        'U',
        'V',
        'Y',
        'Z'
    );

    if (PHP_SAPI == 'cli')
        die('This example should only be run from a Web Browser');

    /** Include PHPExcel */
   


    // Create new PHPExcel object
    $objPHPExcel = new PHPExcel();

    // Set document properties
    $objPHPExcel->getProperties()->setCreator("lahic.com")
                                ->setLastModifiedBy("Lahic")
                                ->setTitle("Office 2007 XLSX Data Document")
                                ->setSubject("Office 2007 XLSX Data Document")
                                ->setDescription("Bu Fayl coxlu sayda melumat saxlayir zehmet olmasa diqqetli olun")
                                ->setKeywords("office 2007 openxml php")
                                ->setCategory("Data resource file");


    // Add some data
    
    for($i=0;$i<count($column_name);$i++){
    $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue($column_index[$i].'1', $column_name[$i]);
    }
   
    for($f=0;$f<count($data);$f++){
        for($n=0;$n<count($data[$f]);$n++){
            $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue($column_index[$n].($f+2),$data[$f][$n]);
        }
    }

    // Rename worksheet
    $objPHPExcel->getActiveSheet()->setTitle('Tours');


    // Set active sheet index to the first sheet, so Excel opens this as the first sheet
    $objPHPExcel->setActiveSheetIndex(0);


    // Redirect output to a client’s web browser (Excel2007)
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet;  charset=utf-8');
    header('Content-Disposition: attachment;filename="data_'.Date('Y-m-d').'.xlsx"');
    header('Cache-Control: max-age=0');
    // If you're serving to IE 9, then the following may be needed
    header('Cache-Control: max-age=1');

    // If you're serving to IE over SSL, then the following may be needed
    header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
    header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
    header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
    header ('Pragma: public'); // HTTP/1.0

    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
    $objWriter->save('php://output');
    exit;
}


function importData($fileName){
    $objReader = PHPExcel_IOFactory::createReader('Excel2007');
    $objReader->setReadDataOnly(true); //optional

    $objPHPExcel = $objReader->load(__DIR__."/excel/".$fileName.'.xlsx');
    $objWorksheet = $objPHPExcel->getActiveSheet();

    $i=1;

    $ar=array();
    foreach ($objWorksheet->getRowIterator() as $row) {

        $column_A_Value = $objPHPExcel->getActiveSheet()->getCell("A$i")->getValue();//column A
        $column_B_Value = $objPHPExcel->getActiveSheet()->getCell("B$i")->getValue();//column B
        $column_C_Value = $objPHPExcel->getActiveSheet()->getCell("C$i")->getValue();//column C
        $column_D_Value = $objPHPExcel->getActiveSheet()->getCell("D$i")->getValue();//column D
        $column_E_Value = $objPHPExcel->getActiveSheet()->getCell("E$i")->getValue();//column E
        $column_F_Value = $objPHPExcel->getActiveSheet()->getCell("F$i")->getValue();//column F
        $column_G_Value = $objPHPExcel->getActiveSheet()->getCell("G$i")->getValue();//column G
        $column_H_Value = $objPHPExcel->getActiveSheet()->getCell("H$i")->getValue();//column H
        $column_I_Value = $objPHPExcel->getActiveSheet()->getCell("I$i")->getValue();//column I
        $column_J_Value = $objPHPExcel->getActiveSheet()->getCell("J$i")->getValue();//column J
       
        $i++;
        
        $ar[]=array(
            $column_A_Value,
            $column_B_Value,
            $column_C_Value,
            $column_D_Value,
            $column_E_Value,
            $column_F_Value,
            $column_G_Value,
            $column_H_Value,
            $column_I_Value,
            $column_J_Value,
                 
        );
        
    }
    return $ar;
}

?>