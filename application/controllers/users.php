<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    public function index() {

        check_session();
//  get user roles
        $roleModel = load_basic_model('user_roles');
        $viewData['userRoles'] = $roleModel->get();

//  get all users
        $genModel = model_load_model('generic_model');
        $viewData['users'] = $genModel->get_all_users();

        load_fullview('user_management_view', $viewData);
    }

//  user log
    public function user_log() {
        $curUser = currentuser_session();
        $userRole = $curUser['user_role'];
        if ($userRole != 1) {
            redirect(base_url());
        }
        $userId = $this->input->get('uid');
        $basicModel = load_basic_model('logs');
        $viewData['logs'] = $basicModel->get(array('user_id' => $userId));
        load_fullview('user_log_view', $viewData);
    }
//  Edit log
    public function edit_log() {
        $curUser = currentuser_session();
        $userRole = $curUser['user_role'];
        if ($userRole != 1) {
            redirect(base_url());
        }
        $userId = $this->input->get('uid');
        $basicModel = load_basic_model('update_logs');
        $viewData['logs'] = $basicModel->get(array('user_id' => $userId));
        load_fullview('edit_log_view', $viewData);
    }

    public function email_for_password() {

        if ($_POST) {
            $userId = $this->input->post('user_id');
            $basicModel = load_basic_model('users');
            $userData = $basicModel->get(array('user_id' => $userId), 1);
            $userEmail = $userData['user_email'];
            $userName = $userData['user_name'];
            $token = md5($userName . $userEmail);
//  insert token in user row for confirmation
            $insertResult = $basicModel->update(array('token' => $token), array('user_id' => $userId));
            if ($insertResult == TRUE) {
//  email section

                $email_title = config_item('change_password');
                $emailModel = load_basic_model('email_templates');
                $where_template = array(
                    'template_title' => $email_title
                );
                $templateData = $emailModel->get($where_template, 1);
                $search = array(
                    'ID'
                );
                $replace = array(
                    $userId
                );
                $templateBody = str_replace($search, $replace, $templateData['template_body']);
                $email_data = array(
                    'from' => config_item('email_from'),
                    'username' => config_item('mailer_name'),
                    'subject' => $templateData['template_title'],
                    'message' => $templateBody,
                    'to' => $userEmail
                );
// end email section
                $email_result = email_send($email_data);
                if ($email_result == TRUE)
                    $this->session->set_flashdata('success', 'Email sent.');
            }else {
                $this->session->set_flashdata('error', 'Some error occured , please try again.');
            }
            redirect('users');
        }
    }

    public function change_password_email() {

        check_session();
        if ($_REQUEST) {
            $userId = $this->input->get_post('id');
            $viewData['userId'] = $userId;
        } else {
            $viewData['userId'] = "";
        }
        load_fullview('change_password_email', $viewData);
    }

    public function change_password() {

        check_session();
        if ($_REQUEST) {
            $userId = $this->input->get_post('id');
            $viewData['userId'] = $userId;
        } else {
            $viewData['userId'] = "";
        }
        load_fullview('change_password_view', $viewData);
    }

    public function update_password() {

        check_session();
        if (isset($_POST['update-pw'])) {
            echo 'here';
            exit;
            $curUser = currentuser_session();
            $userId = $curUser['user_id'];
            $userEmail = $curUser['user_email'];
            $curPassword = $this->input->post('old_password');
            $newPassword = $this->input->post('new_password');

            $basicModel = load_basic_model('users');
            $userData = $basicModel->get(array('user_id' => $userId), 1);
            if (md5($curPassword) == $userData['user_password']) {
                $data = array(
                    "user_password" => md5($newPassword)
                );
                $condition = array(
                    "user_id" => $userId
                );
                $affectdRow = $basicModel->update($data, $condition);
                if (count($affectdRow) > 0) {
                    $this->session->set_flashdata('success', 'Password updated successfully.');
                } else {
                    $this->session->set_flashdata('error', 'Some problem occured while updating password.');
                }
            } else {
                $this->session->set_flashdata('error', 'You have entered wrong password');
                redirect(base_url('users'));
            }
        } else {
            $this->session->set_flashdata('error', 'You are no through proper channel.');
            redirect(base_url('users'));
        }
    }

    public function user_profile() {
        check_session();
        $curUser = currentuser_session();
        $userId = $curUser['user_id'];
        $where = array('user_id' => $userId);
        $basicModel = load_basic_model('users');
        $viewData['userData'] = $basicModel->get($where, 1);
//  get user roles
        $roleModel = load_basic_model('user_roles');
        $viewData['userRoles'] = $roleModel->get();
        load_fullview('user_profile_view', $viewData);
    }

    public function add_user() {

        check_session();
        $allPost = $this->input->post(NULL, TRUE);

        $password = randomPassword();
        $allPost['user_password'] = md5($password);
        $allPost['created'] = time();

        $basicModel = load_basic_model('users');
        $result = $basicModel->insert($allPost);

// email section

        $email_title = config_item('registration');
        $emailModel = load_basic_model('email_templates');
        $where_template = array(
            'template_title' => $email_title
        );
        $templateData = $emailModel->get($where_template, 1);
        $search = array(
            'EMAIL', 'PASSWORD'
        );
        $email = $allPost['user_email'];

        $replace = array(
            $email, $password,
        );
        $templateBody = str_replace($search, $replace, $templateData['template_body']);
        $email_data = array(
            'from' => config_item('email_from'),
            'username' => config_item('mailer_name'),
            'subject' => $templateData['template_title'],
            'message' => $templateBody,
            'to' => $email
        );


// end email section
        $email_result = email_send($email_data);

        if ($result > 0 && $email_result == TRUE)
            $this->session->set_flashdata('success', 'User inserted and email sent.');
        else if ($result > 0 && $email_result == FALSE)
            $this->session->set_flashdata('success', 'User inserted but email no sent.');
        else if ($result < 1 && $email_result == FALSE)
            $this->session->set_flashdata('error', 'Operation Failed.');

        redirect(base_url('users'));
    }

    public function edit_user() {

        check_session();
        $userId = $this->input->get_post('uid');
        $where = array('user_id' => $userId);
        $basicModel = load_basic_model('users');
        $viewData['userData'] = $basicModel->get($where, 1);

//  get user roles
        $roleModel = load_basic_model('user_roles');
        $viewData['userRoles'] = $roleModel->get();

        load_fullview('edit_user_view', $viewData);
    }

    public function update_user() {

        check_session();
        $post = $this->input->post(NULL, TRUE);
//        print_r($post);exit;
        $userId = $post['user_id'];
        $where = array('user_id' => $userId);
        unset($post['user_id']);
        if(isset($post['activate'])){
          unset($post['activate']); //activate is not table field, so need to remove
          $post['user_status'] = 'active';
        }
        $basicModel = load_basic_model('users');
        $result = $basicModel->update($post, $where);
        if (count($result) > 0) {
            $this->session->set_flashdata('success', 'Operation successfully completed.');
        }
        $this->session->set_flashdata('redirectUri', base_url('users'));

//        redirect(base_url('users'));
    }

    public function remove_user() {
        $ids = $this->input->post('ids');
        $ids = explode(',', $ids);
        $basicModel = load_basic_model('users');
        foreach ($ids as $id) {
            $result = $basicModel->delete(array('user_id' => $id));
        }
        if (count($result) > 0) {
            $this->session->set_flashdata('success', 'Operation successfully completed.');
        }
        redirect(base_url('users'));
    }

    public function check_email() {

        check_session();
        $email = $this->input->post('email');
        $basicModel = load_basic_model('users');
        $data = $basicModel->get(array('user_email' => $email), 1);
        if (count($data) > 0) {
            $result = array('msg' => 'exist');
        } else {
            $result = array('msg' => 'ok');
        }
        echo json_encode($result);
    }

}
