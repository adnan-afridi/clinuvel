<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Generic extends CI_Controller {

    public function index() {
        
    }

    public function edit_from_log() {
        $target = $this->input->get('t');
        $targetId = $this->input->get('tid');
        $path = config_item($target);
        $redirectUrl = $path . '?id=' . $targetId;
        redirect(base_url($redirectUrl));
    }

    /*
     * get table fields
     * @return: field names array
     */

    public function get_table_fields() {
        $table = $this->input->post('table');
        $fields = $this->db->list_fields($table);
        unset($fields[0]);
        array_pop($fields);
        echo json_encode($fields);
        exit;
    }

    /*
     * convert html to pdf
     * @return: download pdf file
     */

    public function create_pdf() {
        $fileName = $this->input->post('fileName');
        $html = $this->input->post('report');
        $viewData['html'] = $html;
        $renderedHtml = $this->load->view('pdf', $viewData, TRUE);
        // Load library
        $this->load->library('dompdf_gen');

        // Convert to PDF
        $this->dompdf->set_paper('A4', 'landscape');
        $this->dompdf->load_html($renderedHtml);
        $this->dompdf->render();
        $this->dompdf->stream($fileName . ".pdf");
        exit;
    }

    /*
     * convert html to excel
     * @return: download excel file
     */

    public function create_excel() {

        $fileName = $this->input->post('fileName');
        $html = $this->input->post('report');

// load the excel library
        $this->load->library('excel');
// Put the html into a temporary file
        $tmpfile = 'assets/files/temp/' . time() . '.html';
        file_put_contents($tmpfile, $html);

// Read the contents of the file into PHPExcel Reader class
        $reader = new PHPExcel_Reader_HTML;
        $content = $reader->load($tmpfile);

        $objWriter = PHPExcel_IOFactory::createWriter($content, 'Excel2007');

        // We'll be outputting an excel file
        header('Content-type: application/vnd.ms-excel');

// It will be called file.xls
        header('Content-Disposition: attachment; filename="file.xlsx"');

// Write file to the browser
        $objWriter->save('php://output');

// Pass to writer and output as needed
//        $objWriter->save('assets/files/temp/excelfile.xlsx');
// Delete temporary file
        unlink($tmpfile);
        return false;
    }

    public function calculate_implants() {
        $post = $this->input->post(null, TRUE);
        $genModel = model_load_model('generic_model');
        $result1 = $genModel->get_batch_deliveries($post);
        $result2 = $genModel->total_implants_for_batch($post);
        $result['deliveries'] = $result1;
        $result['total'] = $result2;
        echo json_encode($result);
    }

//get batch release date for implant delivery
    public function get_batch_data() {
        $batchVal = $this->input->post('batchVal');
        $basicModel = load_basic_model('drug_batch');
        $batchData = $basicModel->get(array('batch_number' => $batchVal), 1);
        echo json_encode($batchData);
        exit;
    }

    public function delete() {

        $ids = $this->input->post('ids');
        $table = $this->input->post('target');

        $model = load_basic_model($table);
        $info = $model->get(array(), 1);
        $idTitle = key($info);

        $ids = explode(',', $ids);
        $basicModel = load_basic_model($table);
        foreach ($ids as $id) {
            if ($table == 'users') {
                $result = $basicModel->update(array('user_status'=>'inactive'),array($idTitle => $id));
            } else {
                $result = $basicModel->delete(array($idTitle => $id));
            }
        }

        if ($result > 0) {
            $this->session->set_flashdata("success", "Operation successfully completed.");
        } else {
            $this->session->set_flashdata("error", "Operation Failed.");
        }
        exit;
    }

    public function search() {


        $search_text = trim(mysql_real_escape_string($this->input->post('search')));

        if (strlen($search_text) == 0) {
            $this->session->set_flashdata('error', 'Blank string not allowed in search..');
            redirect(base_url());
        }

        $result_in_tables = 0;

        $basicModel = load_basic_model("");
//  table count in the database
//        $sql = 'show tables';
//        $tables = $basicModel->explicit($sql);
        $tables = array(
            'deliveries',
            'wastage',
            'sites',
            'drug_batch',
        );
        for ($i = 0; $i < sizeof($tables); $i++) {
//  @abstract  for each table of the db seaching text
//  $sql = 'select count(*) from ' . $tables[$i]['Tables_in_' . $this->db->database];
            $sql = 'select count(*) AS count from ' . $tables[$i];
            $numCols = $basicModel->explicit($sql);

            if ($numCols[0]['count'] > 0) {
                $sql = 'desc ' . $tables[$i];

                $collumns = $basicModel->explicit($sql);

                $search_sql = 'select * from ' . $tables[$i] . ' WHERE ';
                $no_varchar_field = 0;

                for ($j = 0; $j < sizeof($collumns); $j++) {
                    if(preg_match('/(id|date|created|number)/',$collumns[$j]['Field'])){
                        continue;
                    }
                    if ($no_varchar_field != 0) {
                        $search_sql .= ' or ';
                    }
                    $search_sql .= 'lower(`' . $collumns[$j]['Field'] . '`) like \'%' . $search_text . '%\' ';
                    $no_varchar_field++;
                }

                if ($no_varchar_field > 0) {
                    $search_result = $basicModel->explicit($search_sql);
                    if (sizeof($search_result)) {

                        $result_in_tables++;

                        $viewData['search_result'][$tables[$i]] = $search_result;
                    }
//                    else{
//                        $viewData['search_result'] = array();
//                    }
                }
            }
        }
//        print_array($viewData);exit;
        if (empty($viewData['search_result'])) {
            $viewData['search_result'] = array();
        }

        $viewData['search_text'] = $search_text;
        load_fullview('search_view', $viewData);
    }

}
