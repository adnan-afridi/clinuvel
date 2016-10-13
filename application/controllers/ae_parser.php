<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ae_parser extends CI_Controller {

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
//        $config['upload_path'] = './assets/files/';
//        $config['allowed_types'] = '*';
//        $config['max_size'] = '0';
//        $config['remove_spaces'] = true;
//
//
//        $this->load->library('upload', $config);
//
//        if (!$this->upload->do_upload('file')) {
//            $error = array('error' => $this->upload->display_errors());
//            $this->session->set_flashdata('error', $error);
//            redirect(base_url('parser'));
//        }
//        $fileInfo = $this->upload->data();
//
//        $excelData = excel_parser($fileInfo['file_name']);
        $excelData = excel_parser('ae.xlsx');
//        print_array($excelData);exit;
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

        $studyModel = load_basic_model('adverse_events');
        $resultAE = $studyModel->get($checkData);

        if (count($resultAE) > 0) {
            $this->session->set_flashdata('error', 'File already uploaded.');
            redirect(base_url('ae_parser'));
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

        $basicModel = load_basic_model('adverse_events');

//adverse_events table insertion
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
            redirect(base_url('ae_parser'));
        }
        $aeId = $this->db->insert_id();

//  get field values
        $fieldsValuesArr = array_slice($excelData['values'], $fieldsNamesIndex + 1);
        $basicModel = load_basic_model('adverse_events_data');

        $SEDCRF = '_' . $SED . '_' . $CRF;
        foreach ($fieldsValuesArr as $fieldsValues) {

//  Study Subject ID
            $key = array_search('Study Subject ID', $fieldsNames);
            $studySubId = $this->check_value($fieldsValues, $key);

//  protocol id
            $key = array_search('Protocol ID', $fieldsNames);
            $protocolId = $this->check_value($fieldsValues, $key);

//  Stie ID
            $siteId = substr($studySubId, 0, 4);

//  Sex
            $key = array_search('Sex', $fieldsNames);
            $sex = $this->check_value($fieldsValues, $key);


//   count the number of AE for every client
            $key = $this->array_like('StartDate', $fieldsNames);
            $arr_split = explode('_', $key);
            $countOfArr = end($arr_split);

            for ($i = 1; $i <= $countOfArr; $i++) {
                $SEDCRF = '_' . $SED . '_' . $i . '_' . $CRF;

//  StartDate
                $key = array_search('StartDate' . '_' . $SED . '_' . $i, $fieldsNames);
                $startDate = $this->check_value($fieldsValues, $key);

//   CRF Version Status
                $key = $this->array_find_key('CRF Version Status' . $SEDCRF, $fieldsNames);
                $crfVersionStatus = $this->check_value($fieldsValues, $key);

//   Version Name
                $key = $this->array_find_key('Version Name' . $SEDCRF, $fieldsNames);
                $versionName = $this->check_value($fieldsValues, $key);

//  advevent_desc
                $key = $this->array_find_key('advevent_desc' . $SEDCRF, $fieldsNames);
                $adveventDesc = $this->check_value($fieldsValues, $key);

//  advevent_date
                $key = $this->array_find_key('advevent_date' . $SEDCRF, $fieldsNames);
                $adveventDate = $this->check_value($fieldsValues, $key);

//  advevent_time
                $key = $this->array_find_key('advevent_time' . $SEDCRF, $fieldsNames);
                $advevent_time = $this->check_value($fieldsValues, $key);

//  advevent_inter
                $key = $this->array_find_key('advevent_inter' . $SEDCRF, $fieldsNames);
                $advevent_inter = $this->check_value($fieldsValues, $key);

//  advevent_severity
                $key = $this->array_find_key('advevent_severity' . $SEDCRF, $fieldsNames);
                $advevent_severity = $this->check_value($fieldsValues, $key);

//  advevent_action
                $key = $this->array_find_key('advevent_action' . $SEDCRF, $fieldsNames);
                $advevent_action = $this->check_value($fieldsValues, $key);

//  advevent_other
                $key = $this->array_find_key('advevent_other' . $SEDCRF, $fieldsNames);
                $advevent_other = $this->check_value($fieldsValues, $key);

//  advevent_outcome
                $key = $this->array_find_key('advevent_outcome' . $SEDCRF, $fieldsNames);
                $advevent_outcome = $this->check_value($fieldsValues, $key);

//  advevent_related
                $key = $this->array_find_key('advevent_related' . $SEDCRF, $fieldsNames);
                $advevent_related = $this->check_value($fieldsValues, $key);

//  advevent_resdate
                $key = $this->array_find_key('advevent_resdate' . $SEDCRF, $fieldsNames);
                $advevent_resdate = $this->check_value($fieldsValues, $key);

//  advevent_restime
                $key = $this->array_find_key('advevent_restime' . $SEDCRF, $fieldsNames);
                $advevent_restime = $this->check_value($fieldsValues, $key);

//  advevent_SAE
                $key = $this->array_find_key('advevent_SAE' . $SEDCRF, $fieldsNames);
                $advevent_SAE = $this->check_value($fieldsValues, $key);

//  advevent_reporter
                $key = $this->array_find_key('advevent_reporter' . $SEDCRF, $fieldsNames);
                $advevent_reporter = $this->check_value($fieldsValues, $key);

//  advevent_lastdosedate
                $key = $this->array_find_key('advevent_lastdosedate' . $SEDCRF, $fieldsNames);
                $advevent_lastdosedate = $this->check_value($fieldsValues, $key);
                if ($advevent_lastdosedate != '-') {
                    $advevent_lastdosedate = ($advevent_lastdosedate - 25569) * 86400; //conversion from excel date to unix date
                }
//  advevent_lastdosetime
                $key = $this->array_find_key('advevent_lastdosetime' . $SEDCRF, $fieldsNames);
                $advevent_lastdosetime = $this->check_value($fieldsValues, $key);

                $AEData = array(
                    'ae_id' => $aeId,
                    'study_subject_id' => $studySubId,
                    'protocol_id' => $protocolId,
                    'sex' => $sex,
                    'site_number' => $siteId,
                    'start_date' => $startDate,
                    'version_name' => $versionName,
                    'crf_version_status' => $crfVersionStatus,
                    'advevent_desc' => $adveventDesc,
                    'advevent_date' => $adveventDate,
                    'advevent_inter' => $advevent_inter,
                    'advevent_severity' => $advevent_severity,
                    'advevent_action' => $advevent_action,
                    'advevent_other' => $advevent_other,
                    'advevent_outcome' => $advevent_outcome,
                    'advevent_related' => $advevent_related,
                    'advevent_resdate' => $advevent_resdate,
                    'advevent_SAE' => $advevent_SAE,
                    'advevent_reporter' => $advevent_reporter,
                    'advevent_lastdosedate' => $advevent_lastdosedate,
                    'advevent_lastdosetime' => $advevent_lastdosetime,
//        'advevent_comments' => $advevent_comments ,
                    'datetime' => date('Y-m-d', time()),
                );
                $this->db->trans_start();
                $processResult = $basicModel->insert($AEData);
                $this->db->trans_complete();
                if ($this->db->trans_status() === TRUE) {
                    $this->session->set_flashdata('success', 'Operation successfully completedly.');
                } else {
                    $this->session->set_flashdata('error', 'Operation failed.');
                }
            }
        }

        redirect(base_url('ae_parser'));
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

    public function array_like($needle, $haystack) {
        foreach ($haystack as $index => $value) {
            if (strpos(trim($value), $needle) !== false) {
                $arr[] = $value;
            }
        }
        return end($arr);
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
