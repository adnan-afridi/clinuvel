<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Batch extends CI_Controller {

    public function index() {

        
        //batchData
        $batchModal = load_basic_model('drug_batch');
        $viewData['batchData'] = $batchModal->get();
        load_fullview('manage_batches_view', $viewData);
    }

    public function add_new_batch() {

        load_fullview('add-batch-view');
    }

    public function edit_batch() {

        
        $Id = $this->input->get_post('id');
        $where = array('drug_batch_id' => $Id);
        $basicModel = load_basic_model('drug_batch');
        $viewData['batchData'] = $basicModel->get($where, 1);
//        print_array( $viewData['batchData']);
        load_fullview('edit_batch_view', $viewData);
    }

    public function edit_batch_map() {

        
        $curUser = currentuser_session();
        if ($curUser['user_role'] != 1) {
            redirect(base_url());
        }
        $Id = $this->input->get_post('id');
        $where = array('id' => $Id);
        $basicModel = load_basic_model('batch_mapping');
        $viewData['batchMapData'] = $basicModel->get($where, 1);
//        print_array( $viewData['batchData']);
        load_fullview('edit_batch_map_view', $viewData);
    }

    public function add_batch() {
        
        $data = $this->input->post(NULL, TRUE);
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

        
        $post = $this->input->post(NULL, TRUE);

        $Id = $post['id'];
        $where = array('drug_batch_id' => $Id);
        unset($post['id']);
        $basicModel = load_basic_model('drug_batch');
        $result = $basicModel->update($post, $where);
        if (count($result) > 0) {
            $this->session->set_flashdata('success', 'Operation successfully completed.');
        }
//        redirect(base_url('batch'));
    }

    public function update_batch_map() {

        
        $post = $this->input->post(NULL, TRUE);

        $Id = $post['id'];
        $where = array('id' => $Id);
        unset($post['id']);
        $basicModel = load_basic_model('batch_mapping');
        $result = $basicModel->update($post, $where);
        if (count($result) > 0) {
            $this->session->set_flashdata('success', 'Operation successfully completed.');
        } else {
            $this->session->set_flashdata('error', 'Operation Failed.');
        }
//        redirect(base_url('batch/batch_mapping'));
    }

    public function batch_mapping() {

        
        $curUser = currentuser_session();
        if ($curUser['user_role'] != 1) {
            redirect(base_url());
        }
        $batchMapModal = load_basic_model('batch_mapping');
        $viewData['batchMapData'] = $batchMapModal->get();
        load_fullview('batch_map_view', $viewData);
    }

    public function add_batch_map() {
        
        $data = $this->input->post();
        $data['date_created'] = time();
        $batchMapModal = load_basic_model('batch_mapping');
        $result = $batchMapModal->insert($data);
        if ($result > 0) {
            $this->session->set_flashdata('success', 'Operation successfully completed.');
        } else {
            $this->session->set_flashdata('error', 'Operation Failed.');
        }

        redirect('batch/batch_mapping');
    }

    public function validate_implants()
    {
        
        $curUser = currentuser_session();
        if ($curUser['user_role'] != 1) {
            redirect(base_url());
        }
        $post = $this->input->post(NULL, TRUE);
        $total_implants = $post['total_implants'];
        $implant_all_qc = $post['implant_all_qc'];
        $implant_all_ct = $post['implant_all_ct'];
        $batch_number = $post['batch_number'];
        $this->load->model('generic_model');
        $total_wastage = $this->generic_model->get_batch_wastage($batch_number);
        $select_deliveries = $this->generic_model->get_batch_deliveries_implants($batch_number);
        if(count($select_deliveries)>0)
            $total_deliver_implants = $select_deliveries->number_implants;
        else
            $total_deliver_implants = 0;
        $select_implanted_admin = $this->generic_model->get_implant_admin($batch_number);
        if($total_implants < ($implant_all_ct + $implant_all_qc + $total_wastage + $total_deliver_implants + count($select_implanted_admin)))
        {
            if($total_wastage > 0)
                $result = array('msg'=>'There are already '.$total_wastage.' wastage registered.');
            else
                $result = array('msg'=>'Allocated implants and wastage must be less then total implant.');
        }
        else
             $result = array('msg'=>'ok');
        echo json_encode($result);
    }
}
