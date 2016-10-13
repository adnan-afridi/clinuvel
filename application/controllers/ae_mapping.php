<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ae_mapping extends CI_Controller {

    public function index() {
        load_fullview('ae_mapping/ae_map_view');
    }

    /*
     * get add post and insert 
     * 
     */

    public function add_new() {
        $post = $this->input->post();
        $table = $post['table'];
        unset($post['table']);
        $data = $post;
        $data['datetime'] = time();
        $batchModel = load_basic_model($table);
        $result = $batchModel->insert($data);
        if ($result > 0) {
            $this->session->set_flashdata('success', 'Operation successfully completed.');
        } else {
            $this->session->set_flashdata('error', 'Operation Failed.');
        }

        redirect('ae_mapping');
    }

}
