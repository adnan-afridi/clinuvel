<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Reports extends CI_Controller {

    public function index() {

//  implant administration data 
        $genModel = model_load_model('generic_model');
        $viewData['impAdmin'] = $this->db->get('study')->result_array();
//  batches
        $viewData['batches'] = $genModel->get_all_batches();
//patients
        $viewData['patients'] = $genModel->get_all_patients();
//sites
        $viewData['sites'] = $this->db->get('site_mapping')->result_array();
//adverse events
        $viewData['adverseEvents'] = $this->db->get('adverse_events')->result_array();

        load_fullview('reports/reports_view', $viewData);
    }

    public function show() {
//        print_array($_REQUEST);
//        $id = $this->input->get('id');
//        $target = $this->input->get('target');
//        if ($target == 'patient') {
//            $siteId = $this->input->get('site_id');
//        }
        $post = $this->input->get_post(null, TRUE);
        $target = $post['target'];
        $viewData['target'] = $target;
        $genModel = model_load_model('generic_model');
        $function = 'get_report_' . $target;
        $viewData['result'] = $genModel->$function($post);
//        print_array($viewData['result']);
        load_fullview('reports/report_template', $viewData);
    }

    public function show_all_batches() {
        $target = 'all_batches';
        $viewData['target'] = $target;
        $genModel = model_load_model('generic_model');
        $viewData['result'] = $genModel->get_report_all_batches();
//        print_array($viewData['result']);
        load_fullview('reports/report_template', $viewData);
    }

    public function all_wastages() {
        $target = 'all_wastages';
        $viewData['target'] = $target;
        $genModel = model_load_model('generic_model');
        $viewData['wastages'] = $genModel->get_report_all_wastages();
        load_fullview('reports/report_template', $viewData);
    }

}
