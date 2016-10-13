<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Parser extends CI_Controller {

    public function index() {
        load_fullview('parser_view');
    }

    public function all_implants() {
        //implant administration
        $genModel = model_load_model('generic_model');
        $viewData['impAdmin'] = $genModel->get_all_implants();
        load_fullview('implant_administration_view', $viewData);
    }

    public function parse() {
//        print_array($_FILES);
        $config['upload_path'] = './assets/files/';
        $config['allowed_types'] = '*';
        $config['max_size'] = '0';
        $config['remove_spaces'] = true;


        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('file')) {
            $error = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('error', $error);
            redirect(base_url('parser'));
        }
        $fileInfo = $this->upload->data();
//        print_array($fileInfo);
        if ($fileInfo['file_ext'] == '.xlds') {
            //load the excel library
            $this->load->library('excel');

            $path = './assets/files/' . $fileInfo['file_name'];

            $inputFileType = PHPExcel_IOFactory::identify($path);
//            echo $inputFileType;
            $reader = PHPExcel_IOFactory::createReader("$inputFileType");
            $reader->setReadDataOnly(false);


            $excel = $reader->load($path);
            $writer = PHPExcel_IOFactory::createWriter($excel, 'Excel5');
//            $writer->setUseBOM(true);
            $fileName = $fileInfo['raw_name'];
            $writer->save('./assets/files/' . $fileName . '.xls');
//            echo 'done';exit;
            $inputFileType2 = PHPExcel_IOFactory::identify($path);
//            echo $inputFileType;exit;
            $reader = PHPExcel_IOFactory::createReader("$inputFileType2");
            $reader->setReadDataOnly(false);


            $excel2 = $reader->load($path);
            $writer2 = PHPExcel_IOFactory::createWriter($excel2, 'Excel2007');
//            $writer->setUseBOM(true);
            $writer2->save('./assets/files/' . $fileName . '.xlsx');
            $fileInfo['file_name'] = $fileName . '.xlsx';
        }
//        echo $fileInfo['file_name'];exit;
        $excelData = excel_parser($fileInfo['file_name']);
//        print_array($excelData);
//        $excelData = excel_parser('testnew.xlsx');
//  dataset name
        $datasetName = end($excelData['header'][1]);

//  dataset description
        $search = 'Dataset Description:';
        $result = $this->array_find_like($search, $excelData['values']);
        $datasetDesc = end($result);

//  study name
        $search = 'Study Name:';
        $result = $this->array_find($search, $excelData['values']);
        $studyName = end($result);

//  protocol id
        $search = 'Protocol ID:';
        $result = $this->array_find($search, $excelData['values']);
        $protocolIdReal = end($result);

//  Date
        $search = 'Date:';
        $result = $this->array_find($search, $excelData['values']);
        $date = end($result);

//  Number of subjects
        $search = 'Subjects:';
        $result = $this->array_find($search, $excelData['values']);
        $numSubjects = end($result);

//  Number of Study Event Definitions
        $search = 'Study Event Definitions';
        $result = $this->array_find($search, $excelData['values']);
        $studyEventDef = end($result);

//CHECK IF THE FILE HASE BEEN UPLOADED ONCE
        $checkData = array(
            'dataset_name' => $datasetName,
            'study_name' => $studyName,
            'protocol_id' => $protocolIdReal,
            'date' => $date,
        );

        $studyModel = load_basic_model('study');
        $resultStudy = $studyModel->get($checkData);
        if (count($resultStudy) > 0) {
            $this->session->set_flashdata('error', 'File already uploaded.');
            redirect(base_url('parser'));
        }
//  Study Event Definition data
        $search = 'Study Event Definition ';
        $result = $this->array_find_like($search, $excelData['values']);
        $studyEventDefData = $result;
        $SED = $studyEventDefData['C'];

//  CRF data
        $search = 'CRF';
        $result = $this->array_find_like($search, $excelData['values']);
        $crfData = $result;
        $CRF = end($crfData);

        $SEDCRF = '_' . $SED . '_' . $CRF;

//  re order array
        $excelData['values'] = array_values($excelData['values']);

//  get field names 
        foreach ($excelData['values'] as $index => $val) {
            $key = array_search('Study Subject ID', $val);
            if (is_string($key)) {
                $fieldsNamesIndex = $index;
                $fieldsNames = $excelData['values'][$index];
                break;
            }
        }

        $basicModel = load_basic_model('study');
//study table insertion
        $data = array(
            'dataset_name' => $datasetName,
            'study_name' => $studyName,
            'protocol_id' => $protocolIdReal,
            'subjects' => $numSubjects,
            'study_event_definitions' => $studyEventDef,
            'date' => $date
        );
        $studyProcessResult = $basicModel->insert($data);
        if (count($studyProcessResult) < 1) {
            $this->session->set_flashdata('error', 'Operation failed.');
            redirect(base_url('parser'));
        }
        $lastId = $this->db->insert_id();

//  get field values
        $fieldsValuesArr = array_slice($excelData['values'], $fieldsNamesIndex + 1);
        $basicModel = load_basic_model('implant_administration');

        foreach ($fieldsValuesArr as $fieldsValues) {
//  Study Subject ID
            $key = array_search('Study Subject ID', $fieldsNames);
            $studySubId = $this->check_value($fieldsValues, $key);
//extract site id 
            $siteId = substr($studySubId, 0, -3);

//  protocol id
            $key = array_search('Protocol ID', $fieldsNames);
            $protocolId = $this->check_value($fieldsValues, $key);

//  Person ID
//            $key = array_search('Person ID', $fieldsNames);
//            $personId = $this->check_value($fieldsValues, $key);
            $personId = substr($studySubId, -3);

//  Sex
            $key = array_search('Sex', $fieldsNames);
            $sex = $this->check_value($fieldsValues, $key);

//   Version Name
//        $key = $this->array_find_key('Version Name' . $SEDCRF, $fieldsNames);
//        $versionName = $this->check_value($fieldsValues, $key);
//  epp_symptoms
            $key = $this->array_find_key('Psympts' . $SEDCRF, $fieldsNames);
            $eppSymptoms = $this->check_value($fieldsValues, $key);

//  epp_pregnant
            $key = $this->array_find_key('Ppregn' . $SEDCRF, $fieldsNames);
            $eppPregnant = $this->check_value($fieldsValues, $key);

//  implant_date
            $key = $this->array_find_key('Padmind' . $SEDCRF, $fieldsNames);
            $implantDate = $this->check_value($fieldsValues, $key);
            $impUnixDate = ($implantDate - 25569) * 86400; //conversion from excel date to unix date
//  implant_time
            $key = $this->array_find_key('Padmtm' . $SEDCRF, $fieldsNames);
            $implantTime = $this->check_value($fieldsValues, $key);

//  implant_min
//            $key = $this->array_find_key('EPP_elig_scen_admin_min' . $SEDCRF, $fieldsNames);
//            $implantMinCrf = $this->check_value($fieldsValues, $key);
//            $implantMin = $implantMinCrf * 5;
//  implant_batch
            $key = $this->array_find_key('Pbatch' . $SEDCRF, $fieldsNames);
            $implantBatch = $this->check_value($fieldsValues, $key);

//  scen_admin_side
            $key = $this->array_find_key('Padmsid' . $SEDCRF, $fieldsNames);
            $implantSide = $this->check_value($fieldsValues, $key);

//  implant_prob
            $key = $this->array_find_key('Padmprb' . $SEDCRF, $fieldsNames);
            $implantProb = $this->check_value($fieldsValues, $key);

//  problem specifications : If yes, please comment and, if applicable, please also complete the adverse events page
//            $key = $this->array_find_key('scen_admin_probspec' . $SEDCRF, $fieldsNames);
//            $implantProbSpec = $this->check_value($fieldsValues, $key);
//  scen_admin_suprail
            $key = $this->array_find_key('Psupra' . $SEDCRF, $fieldsNames);
            $implantSuprail = $this->check_value($fieldsValues, $key);

//  suprail explanation
            $key = $this->array_find_key('Psuprax' . $SEDCRF, $fieldsNames);
            $implantSuprailExpl = $this->check_value($fieldsValues, $key);

            $impAdminData = array(
                'study_id' => $lastId,
                'study_subject_id' => $studySubId,
                'site_id' => $siteId,
                'protocol_id' => $protocolId,
                'person_id' => $personId,
                'sex' => $sex,
                'version_name' => NULL,
                'epp_symptoms' => $eppSymptoms,
                'implant_date' => $impUnixDate,
                'implant_time' => $implantTime,
                'implant_prob' => $implantProb,
//                'implant_prob_spec' => $implantProbSpec,
                'implant_batch' => $implantBatch,
//                'implant_min' => $implantMin,
                'epp_pregnant' => $eppPregnant,
                'implant_suprail' => $implantSuprail,
                'implant_suprail_expl' => $implantSuprailExpl,
                'date' => date('Y-m-d', time()),
            );
            $this->db->trans_start();
            $processResult = $basicModel->insert($impAdminData);
            $this->db->trans_complete();
            if ($this->db->trans_status() === TRUE) {
                $this->session->set_flashdata('success', 'Operation successfully completedly.');
            } else {
                $this->session->set_flashdata('error', 'Operation failed.');
            }
        }
        redirect(base_url('parser'));
    }

    public function find_parent(array $haystack, $needle, $a = null) {

        //if the array contains the value we want return it
        if (in_array($needle, $haystack)) {
//            print_array($haystack);
            return $haystack;
        }
        foreach ($haystack as $index => $v) {

            if (in_array($needle, $v)) {
                return $v;
            }
            if (is_array($v)) {
//                print_array($v);
                $result = $this->find_parent($v, $needle, 'a');
                if ($result !== null) {
                    return $result;
                }
            }
        }

        return null;
    }

    public function array_find($needle, $haystack) {

        foreach ($haystack as $index => $value) {
            foreach ($value as $i => $v) {
                if (trim($v) == trim($needle)) {
                    return $value;
                }
            }
        }
    }

    public function array_find_key($needle, $haystack) {

        foreach ($haystack as $index => $value) {
            if (trim($value) == trim($needle)) {
                return $index;
            }
        }
    }

    public function array_find_like($needle, $haystack) {

        foreach ($haystack as $index => $value) {
            foreach ($value as $i => $v) {
                if (strpos(trim($v), $needle) !== false) {
//              for CRF only
                    if ($needle === 'CRF') {
                        if (strpos(trim($v), $needle) === 0) {
                            return $value;
                        } else {
                            continue;
                        }
                    }

                    return $value;
                }
            }
        }
    }

    /**
     * check for the given key if the value exists
     * @return the value if found, else/or '-' 
     */
    public function check_value($array, $key) {
        if (array_key_exists($key, $array)) {
            if (isset($array[$key]))
                return $array[$key];
            else
                return '-';
        }else {
            return '-';
        }
    }

}
