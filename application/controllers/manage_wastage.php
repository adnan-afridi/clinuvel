<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Manage_wastage extends CI_Controller {

    public function index() {



        $genModel = model_load_model('generic_model');
        $viewData['wastage'] = $genModel->get_all_wastage();

        $sitesModel = load_basic_model('sites');
        $viewData['sites'] = $sitesModel->get();

        $batchModel = load_basic_model('drug_batch');
        $viewData['batches'] = $batchModel->get();

        load_fullview('manage_wastage_view', $viewData);
    }

    public function new_wastage() {
        load_fullview('add_wastage_view');
    }

    public function add_wastage() {

        $allPost = $this->input->post(NULL, TRUE);

        $allPost['created'] = time();

        $basicModel = load_basic_model('wastage');
        $result = $basicModel->insert($allPost);
        if (count($result) > 0) {
            $this->session->set_flashdata('success', 'Operation successfully completedly.');
        } else {
            $this->session->set_flashdata('error', 'Operation failed.');
        }
        redirect(base_url('manage_wastage'));
    }

    public function edit_wastage() {


        $Id = $this->input->get_post('id');
        $where = array('id' => $Id);
        $basicModel = load_basic_model('wastage');
        $viewData['wastageData'] = $basicModel->get($where, 1);

        load_fullview('edit_wastage_view', $viewData);
    }

    public function update_wastage() {


        $post = $this->input->post(NULL, TRUE);

        $Id = $post['id'];
        $where = array('id' => $Id);
        unset($post['id']);
        $basicModel = load_basic_model('wastage');
        $result = $basicModel->update($post, $where);
        if (count($result) > 0) {
            $this->session->set_flashdata('success', 'Operation successfully completed.');
        }
        $this->session->set_flashdata('redirectUri', base_url('manage_wastage'));
//        redirect(base_url('manage_wastage'));
    }

}
