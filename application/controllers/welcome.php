<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function index() {

//clinicalData
        $basicModal = load_basic_model('clinical_data');
        $viewData['clinicalData'] = $basicModal->get();
        
//batchData
        $genModel = model_load_model('generic_model');
        $viewData['batchData'] = $genModel->get_all_batches();
        
//deliverires lData
        $viewData['deliveries'] = $genModel->get_all_deliveries();
        
//sites Data
        $sitesModal = load_basic_model('sites');
        $viewData['sites'] = $sitesModal->get();
        
//wastage Data
        $genModel = model_load_model('generic_model');
        $viewData['wastage'] = $genModel->get_all_wastage();
        
//implant administration
        $genModel = model_load_model('generic_model');
        $viewData['impAdmin'] = $genModel->get_imp_administrations();

        load_fullview('dashboard', $viewData);
    }

    public function batch_report() {

       
        $basicModal = load_basic_model('clinical_data');
        $viewData['clinicalData'] = $basicModal->get();
        load_fullview('batch-report-view', $viewData);
    }

}
