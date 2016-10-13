<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Batch extends CI_Controller {

    public function index() {
        
        check_session();
        //batchData
        $batchModal = load_basic_model('drug_batch');
        $viewData['batchData'] = $batchModal->get();
        load_fullview('manage_batches_view', $viewData);
    }
    public function edit_batch() {

        check_session();
        $Id = $this->input->get_post('id');
        $where = array('drug_batch_id' => $Id);
        $basicModel = load_basic_model('drug_batch');
        $viewData['batchData'] = $basicModel->get($where, 1);
//        print_array( $viewData['batchData']);
        load_fullview('edit_batch_view', $viewData);
    }
    public function add_batch() {
        check_session();
        $data = $_POST;
        $data['date_created'] = time();
        $batchModel = load_basic_model('drug_batch');
        $result = $batchModel->insert($data);
        if ($result > 0) {
            $this->session->set_flashdata('success', 'Operation successfully completed.');
        } else {
            $this->session->set_flashdata('error', 'Operation Failed.');
        }

        redirect('batch');
    }
   public function update_batch() {

        check_session();
        $post = $this->input->post(NULL, TRUE);

        $Id = $post['id'];
        $where = array('drug_batch_id' => $Id);
        unset($post['id']);
        $basicModel = load_basic_model('drug_batch');
        $result = $basicModel->update($post, $where);
        if (count($result) > 0) {
            $this->session->set_flashdata('success', 'Operation successfully completed.');
        }
        redirect(base_url('batch'));
    }
}
