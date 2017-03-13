<?php
  require_once 'PHPExcel/PHPExcel.php';

  function transpose($array) {
    return array_map(null, ...$array);
  }

  $files = glob('rawfiles/*.{xlsx}', GLOB_BRACE);

  $final_array = [];

  foreach ($files as $file) {

    try {
     $inputFileType = PHPExcel_IOFactory::identify($file);
     $objReader = PHPExcel_IOFactory::createReader($inputFileType);
     $objPHPExcel = $objReader->load($file);
    } catch(Exception $e){
     die($e->getMessage());
    }

    $rawRecord = $objPHPExcel->setActiveSheetIndex(0)->rangeToArray('A5:B20');
    $record= transpose($rawRecord)[1];


    //añadidos al principio del registro la población
    array_unshift($record, basename($file));

    array_push($final_array, $record);

  }

  //&print_r($final_array);

  //aprovechamos el último archivo para crear la fila con los nombres de columna
  $cabeceras = transpose($rawRecord)[0];
  array_unshift($cabeceras, "Nombre de archivo");


  $objPHPExcel = new PHPExcel();
  $objPHPExcel->getActiveSheet()->fromArray($cabeceras, NULL, 'A1');
  $objPHPExcel->getActiveSheet()->fromArray($final_array, NULL, 'A2');
  $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, "Excel2007");
  $objWriter->save("output.xlsx");
 ?>
