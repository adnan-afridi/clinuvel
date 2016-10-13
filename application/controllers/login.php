<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function index() {
        $currUser = currentuser_session();
        if($currUser['loggedIn']){
            redirect(base_url('welcome'));
        }
        $success = $this->session->flashdata('success');
        $error = $this->session->flashdata('error');
        $viewData['success'] = $success;
        $viewData['error'] = $error;
        view_load_view('login-view',$viewData);
    }

    public function process_login() {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        
         $where_user = array(
            'user_email' => $email,
            'user_password' => md5($password),
            'user_status' => 'active'
        );
        $basicModal = load_basic_model('users');
        $result = $basicModal->get($where_user,1);
        $loggedIn = FALSE;
        if (array_filter($result)) {
            $currentUserData = array(
                'user_id' => $result['user_id'],
                'user_name' => $result['user_name'],
                'user_email' => $result['user_email'],
                'user_role' => $result['user_role']
            );
            $loggedIn = true;
            $session_data = array(
                "currentUser" => $currentUserData,
                'loggedIn' => $loggedIn
            );

            $this->session->set_userdata($session_data);
            redirect(base_url() . 'welcome');
        } else {
            $this->session->set_flashdata('error', 'Username/password incorrect or inactive user.');
            redirect(base_url('login'));
        }
    }

}
