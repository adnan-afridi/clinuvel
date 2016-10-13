<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Change_password extends CI_Controller {

    public function index() {
        if ($_REQUEST) {
            $userId = $this->input->get_post('id');
            $viewData['userId'] = $userId;
            $basicModel = load_basic_model('users');
            $userData = $basicModel->get(array('user_id' => $userId), 1);
            $token = $userData['token'];
            if ($token == NULL) {
                $this->session->set_flashdata('error', 'This link has been used.');
                redirect(base_url());
            }
        } else {
            $this->session->set_flashdata('error', 'Follow the link in email to change password.');
            redirect(base_url());
        }
        view_load_view('change_password_via_email', $viewData);
    }

    public function update_password() {

        if (isset($_POST['user_id'])) {
            $userId = $this->input->post('user_id');
            $basicModel = load_basic_model('users');
            $userData = $basicModel->get(array('user_id' => $userId), 1);
            if (empty($userData['token'])) {
                $this->session->set_flashdata('error', 'Token already used or no token yet.');
                $this->session->set_flashdata('redirectUri', base_url());
//                redirect(base_url());
            }
//  check token
            $userName = $userData['user_name'];
            $userEmail = $userData['user_email'];
            $token = md5($userName . $userEmail);
            if ($token == $userData['token']) {
                $newPassword = $this->input->post('new_password');
                $data = array(
                    'user_password' => md5($newPassword)
                );
                $where = array(
                    'user_id' => $userId,
                    'user_email' => $userEmail
                );
                $affectdRow = $basicModel->update($data, $where);
                if (count($affectdRow) > 0) {
                    //remove token now
                    $data = array(
                        'token' => null
                    );
                    $where = array(
                        'user_id' => $userId,
                        'user_email' => $userEmail
                    );
                    $affectdRow = $basicModel->update($data, $where);
                    $this->session->set_flashdata('success', 'Password updated successfully.');
                    $this->session->set_flashdata('redirectUri', base_url());
                } else {
                    $this->session->set_flashdata('error', 'Some problem occured while updating password.');
                }
                redirect(base_url());
            }
        } else {
            $this->session->set_flashdata('error', 'You are not through proper channel.');
            redirect(base_url());
        }
    }

}
