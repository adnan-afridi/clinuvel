<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function excel_parser($fileName) {

    $CI = get_instance();
    $file = './assets/files/' . $fileName;
//    $file = './assets/files/EXCEL__SCENESSE_-_year_1_implant_1_administration_data__2016-07-26-160249364.xls';

//load the excel library
    $CI->load->library('excel');

//read file from path
    $objPHPExcel = PHPExcel_IOFactory::load($file);

//get only the Cell Collection
    $cell_collection = $objPHPExcel->getActiveSheet()->getCellCollection();


//extract to a PHP readable array format
    foreach ($cell_collection as $cell) {
        $column = $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn();
        $row = $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();
        $data_value = $objPHPExcel->getActiveSheet()->getCell($cell)->getValue();

        //header will/should be in row 1 only. of course this can be modified to suit your need.
        if ($row == 1) {
            $header[$row][$column] = $data_value;
        } else {
            $arr_data[$row][$column] = $data_value;
        }
    }

//send the data in an array format
    $data['header'] = $header;
    $data['values'] = $arr_data;
    foreach ($data['values'] as $i => $arr) { // check if all elements in a row are empty then remove that row
        if (!array_filter($arr)) {
            unset($data['values'][$i]);
        }
    }
    return $data;
}
