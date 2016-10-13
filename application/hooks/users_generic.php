<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Users_generic {

//    db backup monthly
    function db_backup() {
        $CI = & get_instance();
        $curDate = date('d');
        if ($curDate == '01') {
            $CI->load->dbutil();
            $prefs = array(
                'tables' => array(), // Array of tables to backup.
                'ignore' => array(), // List of tables to omit from the backup
                'format' => 'txt', // gzip, zip, txt
                'filename' => date('d-m-y').'.sql', // File name - NEEDED ONLY WITH ZIP FILES
                'add_drop' => TRUE, // Whether to add DROP TABLE statements to backup file
                'add_insert' => TRUE, // Whether to add INSERT data to backup file
                'newline' => "\n"               // Newline character used in backup file
            );

            $backup = & $CI->dbutil->backup($prefs);
            $CI->load->helper('file');
            write_file('./assets/db_backups/'.$prefs['filename'], $backup);
        }
    }

    function update_data_log() {
        $CI = & get_instance();
        $redirectTo = $CI->router->fetch_class();
//        print_array($CI->uri->segment_array()); 
//        $CI->output->enable_profiler(TRUE);

        $queries = $CI->db->queries;
//        print_r($queries);exit;
        $q = $this->array_find_like('UPDATE', $queries);

        if ($q) {

            $qTablePart = strstr($q, 'SET', TRUE);
            $qTable = trim(str_replace('UPDATE', '', $qTablePart), ' .`');

            $updated = array();
            $updated['table'] = $qTable;

            $qData = array_pop(explode('SET', $q));
            $qData = str_replace('WHERE', ',', $qData);
            $expData = explode(',', $qData);

            $updatedData = array();
            foreach ($expData as $i => $v) {
                $expV = explode('=', $v);
                $updatedData[$expV[0]] = $expV[1];
            }
            $updated['data'] = json_encode($updatedData);
            $curUser = currentuser_session();
            $updated['user_id'] = $curUser['user_id'];
            $updated['date_time'] = time();

            $CI->db->insert('update_logs', $updated);
//            print_array($updated);
            redirect(base_url($redirectTo));
        }
    }

    function user_log() {

        $CI = & get_instance();


        if ($CI->router->class != "login") {
            $CI->load->helper('url_helper');
            $segment = $CI->uri->uri_string();
            $curUser = currentuser_session();
            $userId = $curUser['user_id'];
            $data = array();
            $data = array(
                'user_id' => $userId,
                'activity' => $segment,
                'date_time' => time(),
            );
            $basicModel = load_basic_model('logs');
            $result = $basicModel->insert($data);
        }
    }

    function array_find_like($needle, $haystack) {

        foreach ($haystack as $index => $value) {
            if (strpos(trim($value), $needle) !== false) {
                return $value;
            }
        }
    }

    function chk_admin() {

        $CI = & get_instance();
        $admin = FALSE;
        $pm = FALSE;
        $qp = FALSE;
        $allowAdd = FALSE;
        $allowEdit = FALSE;
        if ($CI->router->class != "login") {
            $curUser = currentuser_session();
            $userRole = $curUser['user_role'];
            switch ($userRole) {
                case 1:
                    $admin = TRUE;
                    $allowAdd = TRUE;
                    $allowEdit = TRUE;
                    break;
                case 2:
                    $pm = TRUE;
                    $allowAdd = TRUE;
                    break;
                case 3:
                    $qp = TRUE;
                    $allowAdd = TRUE;
                    break;
            }
        }
        define('ADMIN', $admin);
        define('PM', $pm);
        define('QP', $qp);
        define('ALLOW_ADD', $allowAdd);
        define('ALLOW_EDIT', $allowEdit);
    }

    function chk_session() {
        $CI = & get_instance();
        if ($CI->router->class != "login") {
            $currentUser = $CI->session->userdata("currentUser");
            $currentUser['loggedIn'] = $CI->session->userdata("loggedIn");
            if ($currentUser['loggedIn'] == TRUE) {
                return TRUE;
            } else {
                redirect(base_url());
            }
        }
    }

}
