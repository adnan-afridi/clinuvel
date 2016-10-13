<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Manage_sites extends CI_Controller {

    public function index() {


        $deliveryModel = load_basic_model('sites');
        $viewData['sites'] = $deliveryModel->get();
        load_fullview('manage_sites_view', $viewData);
    }

    public function add_site() {
        load_fullview('add_site_view');
    }

    public function add_site_process() {

        $allPost = $this->input->post(NULL, TRUE);

        $allPost['created'] = time();

        $basicModel = load_basic_model('sites');
        $result = $basicModel->insert($allPost);
        if (count($result) > 0) {
            $this->session->set_flashdata('success', 'Operation successfully completedly.');
        } else {
            $this->session->set_flashdata('error', 'Operation failed.');
        }
        redirect(base_url('manage_sites'));
    }

    public function edit_site() {


        $Id = $this->input->get_post('id');
        $where = array('site_id' => $Id);
        $basicModel = load_basic_model('sites');
        $viewData['siteData'] = $basicModel->get($where, 1);
//        print_array($viewData['siteData']);
        load_fullview('edit_site_view', $viewData);
    }

    public function update_site() {


        $post = $this->input->post(NULL, TRUE);

        $Id = $post['site_id'];
        $where = array('site_id' => $Id);
        unset($post['site_id']);
        $basicModel = load_basic_model('sites');
        $result = $basicModel->update($post, $where);
        if (count($result) > 0) {
            $this->session->set_flashdata('success', 'Operation successfully completed.');
        }
        $this->session->set_flashdata('redirectUri', base_url('manage_sites'));

//        redirect(base_url('manage_sites'));
    }

    public function site_mapping() {


        $curUser = currentuser_session();
        if ($curUser['user_role'] != 1) {
            redirect(base_url());
        }
        $siteMapMapModal = load_basic_model('site_mapping');
        $viewData['siteMapData'] = $siteMapMapModal->get();
        load_fullview('site_map_view', $viewData);
    }

    public function add_site_map() {

        $data = $this->input->post(NULL, true);
        $data['date_created'] = time();
        $siteMapModal = load_basic_model('site_mapping');
        $result = $siteMapModal->insert($data);
        if ($result > 0) {
            $this->session->set_flashdata('success', 'Operation successfully completed.');
        } else {
            $this->session->set_flashdata('error', 'Operation Failed.');
        }

        redirect('manage_sites/site_mapping');
    }

    public function edit_site_map() {


        $curUser = currentuser_session();
        if ($curUser['user_role'] != 1) {
            redirect(base_url());
        }
        $Id = $this->input->get_post('id');
        $where = array('site_map_id' => $Id);
        $basicModel = load_basic_model('site_mapping');
        $viewData['siteMapData'] = $basicModel->get($where, 1);
//        print_array( $viewData['batchData']);
        load_fullview('edit_site_map_view', $viewData);
    }

    public function update_site_map() {


        $post = $this->input->post(NULL, TRUE);

        $Id = $post['site_map_id'];
        $where = array('site_map_id' => $Id);
        unset($post['site_map_id']);
        $basicModel = load_basic_model('site_mapping');
        $result = $basicModel->update($post, $where);
        if (count($result) > 0) {
            $this->session->set_flashdata('success', 'Operation successfully completed.');
        } else {
            $this->session->set_flashdata('error', 'Operation Failed.');
        }
        $this->session->set_flashdata('redirectUri', base_url('manage_sites/site_mapping'));
//        redirect(base_url('manage_sites/site_mapping'));
    }

}
