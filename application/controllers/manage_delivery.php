<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Manage_delivery extends CI_Controller {

    public function index() {


        $genModel = model_load_model('generic_model');
        $viewData['deliveries'] = $genModel->get_all_deliveries();

//get all sites data
        $sitesModel = load_basic_model('sites');
        $viewData['sites'] = $sitesModel->get();

//get all batch data        
        $batchModel = load_basic_model('drug_batch');
        $viewData['batches'] = $batchModel->get();

        load_fullview('manage_delivery_view', $viewData);
    }

    public function add_delivery() {
        load_fullview('add_delivery_view');
    }

    public function add_delivery_process() {

        $allPost = $this->input->post(NULL, TRUE);

        $allPost['created'] = time();

        $basicModel = load_basic_model('deliveries');
        $result = $basicModel->insert($allPost);
        if (count($result) > 0) {
            $this->session->set_flashdata('success', 'Operation successfully completedly.');
        } else {
            $this->session->set_flashdata('error', 'Operation failed.');
        }
        redirect(base_url('manage_delivery'));
    }

    public function edit_delivery() {


        $Id = $this->input->get_post('id');
        $where = array('id' => $Id);
        $basicModel = load_basic_model('deliveries');
        $viewData['deliveryData'] = $basicModel->get($where, 1);

        //get all sites data
        $sitesModel = load_basic_model('sites');
        $viewData['sites'] = $sitesModel->get();

//get all batch data        
        $batchModel = load_basic_model('drug_batch');
        $viewData['batches'] = $batchModel->get();

        load_fullview('edit_delivery_view', $viewData);
    }

    public function update_delivery() {


        $post = $this->input->post(NULL, TRUE);

        $Id = $post['id'];
        $where = array('id' => $Id);
        unset($post['id']);
        $basicModel = load_basic_model('deliveries');
        $result = $basicModel->update($post, $where);
//echo $this->db->last_query();exit;
        if (count($result) > 0) {
            $this->session->set_flashdata('success', 'Operation successfully completed.');
        }
                        $this->session->set_flashdata('redirectUri',  base_url('manage_delivery'));

//        redirect(base_url('manage_delivery'));
    }

 

}
