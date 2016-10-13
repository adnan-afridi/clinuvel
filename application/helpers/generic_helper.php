<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */






/*
 * batch dropdown list
 * @return: batch dropdown 
 */

function get_batch_dropdown($batchNum = '') {

    $CI = & get_instance();
    $CI->db->select('*');
    $CI->db->from('batch_mapping bm');
    $batches = $CI->db->get()->result_array();
    $dp = '';
    if (ALLOW_EDIT || ALLOW_ADD) {
        $dp .= '<select name="batch_number" id="batch_number">';
        $dp .= '<option value="">-- Select Batch --</option>';
        foreach ($batches as $batch) {
            $selected = ($batch['oc_value'] == $batchNum) ? 'selected="selected"' : '';
            $dp .= '<option ' . $selected . ' value="' . $batch["oc_value"] . '">' . $batch["local_value"] . '</option>';
        }
        $dp .= '</select>';
    } else {
        foreach ($batches as $batch) {
            $batchValue = '';
            if ($batch['oc_value'] == trim($batchNum)) {
                $batchValue = $batch['local_value'];
                break;
            }
        }

        $dp .= '<input  id="batch_number" type="text" width="100px;" readonly="readonly" value="' . $batchValue . '">';
    }
    return $dp;
}

/*
 * site dropdown list
 * @return: site dropdown 
 */

function get_site_dropdown($siteNum = '') {
    $CI = & get_instance();
    $CI->db->select('*');
    $CI->db->from('site_mapping s');
    $sites = $CI->db->get()->result_array();
    $dp = '';
    $dp .= '<select name="site" id="site">';
    $dp .= '<option value="">-- Select Site --</option>';
    if ($sites) {
        foreach ($sites as $site) {
            $selected = ($site['site_oc_value'] == $siteNum) ? 'selected="selected"' : '';
            $dp .= '<option ' . $selected . ' value="' . $site["site_oc_value"] . '">' . $site["site_title"] . '</option>';
        }
        $dp .= '</select>';
    } else {
        $dp = '<option value="">-- No Site Data --</option>';
    }
    return $dp;
}

function get_batch_map($batch_val) {
    $CI = & get_instance();
    $CI->db->select('*');
    $CI->db->from('batch_mapping bm');
    $CI->db->where('bm.oc_value', $batch_val);
    $resutl = $CI->db->get()->result_array();
    return $resutl[0]['local_value'];
}

function get_site_map($site_val) {
    $CI = & get_instance();
    $CI->db->select('*');
    $CI->db->from('site_mapping sm');
    $CI->db->where('sm.site_oc_value', $site_val);
    $resutl = $CI->db->get()->result_array();

    return $resutl[0]['site_title'];
}

function print_array($array) {
    echo "<pre>";
    print_r($array);
    echo "</pre>";
    exit;
}

function randomPassword() {
    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 6; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}

/*
 * uploads file to assest/files
 * @param : string fileName
 * @param : string folder , where the file needs to be uploaded, the folder path should be realative to assets/files
 * @return: file info
 */

function upload_file($fileName, $folder) {
    $CI = & get_instance();
    $config['upload_path'] = './assets/files/' . $folder . '/';
    $config['allowed_types'] = '*';
//        $config['max_size'] = '100';
    $config['max_width'] = '0';
    $config['max_height'] = '0';
    $config['encrypt_name'] = TRUE;

    $CI->load->library('upload', $config);
    if ($CI->upload->do_upload($fileName)) {

        $fileData = $CI->upload->data();
        $return['message'] = 'Successfully Uploaded.';
        $return['result'] = 'success';
        $return['data'] = $fileData;
        return $return;
    } else {
        $fileData = $CI->upload->data();

        $return['message'] = $CI->upload->display_errors();
        $return['result'] = 'error';
        $return['data'] = '';
        return $return;
    }
}

function leading_zero($str) {
    if (strlen($str) < 2) {
        $str = '0' . $str;
    }
    return $str;
}

?>
