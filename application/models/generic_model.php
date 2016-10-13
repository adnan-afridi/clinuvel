<?php

class Generic_model extends CI_Model {

    public function get_all_sites() {
        $this->db->select('sm.site_oc_value,sm.site_title');
        $this->db->from('site_mapping sm');
        $result = $this->db->get()->result_array();
        return $result; 
    }

    public function get_all_patients() {
        $this->db->select('person_id,site_id');
        $this->db->from('implant_administration');
        $this->db->group_by('person_id,site_id');
        $this->db->order_by('site_id','DESC');
        $result = $this->db->get()->result_array();
        return $result; 
    }
    
    public function get_batch_deliveries($post) {
        $this->db->select('SUM(DISTINCT d.`number_implants`) AS imp_del');
        $this->db->from('deliveries d');
        $this->db->where('d.batch_number', $post['batchNum']);
        $this->db->where('d.site', $post['site']);
        $result = $this->db->get()->result_array();
        return $result;
    }

    public function total_implants_for_batch($post) {
        $q = "SELECT db.batch_number,db.total_implants,db.imp_alloc_qc,imp_alloc_ct,
                (SELECT COUNT(*) FROM wastage w WHERE w.batch_number = '" . $post['batchNum'] . "' AND w.site = '" . $post['site'] . "') AS wastages,
                (SELECT COUNT(*) FROM implant_administration ia WHERE ia.implant_batch = '" . $post['batchNum'] . "') imp_admin,
                (SELECT SUM(d.number_implants) FROM deliveries d WHERE d.batch_number = '" . $post['batchNum'] . "' AND d.site = '" . $post['site'] . "') imp_del
               FROM drug_batch db
               WHERE db.`batch_number` = '" . $post['batchNum'] . "'
               GROUP BY db.`batch_number`";
        $result = $this->db->query($q)->result_array();
        return $result;
    }

    public function get_all_users() {
        $this->db->select('u.*,ur.role_title');
        $this->db->from('users u');
        $this->db->join('user_roles ur', 'ur.role_id = u.user_role');
        $result = $this->db->get()->result_array();
        return $result;
    }

    public function get_all_wastage() {
        $this->db->select('w.*,s.site,bm.local_value');
        $this->db->from('wastage w');
        $this->db->join('sites s', 's.site = w.site');
        $this->db->join('batch_mapping bm', 'bm.oc_value = w.batch_number');
        $result = $this->db->get()->result_array();
        return $result;
    }

    public function get_all_batches() {
        $this->db->select('db.*,bm.local_value');
        $this->db->from('drug_batch db');
        $this->db->join('batch_mapping bm', 'bm.oc_value = db.batch_number');
        $result = $this->db->get()->result_array();
        return $result;
    }

    public function get_all_deliveries() {
        $this->db->select('d.*,s.site,db.batch_number AS bt_num');
        $this->db->from('deliveries d ');
        $this->db->join('sites s', 's.site = d.site');
        $this->db->join('drug_batch db', 'db.batch_number = d.batch_number');
        $result = $this->db->get()->result_array();
        /* echo $this->db->last_query();
          exit; */
        return $result;
    }

    public function get_imp_administrations() {
        $this->db->select('*');
        $this->db->from('study s');
        $result = $this->db->get()->result_array();
        return $result;
    }

    public function get_all_implants() {
        $this->db->select('*');
        $this->db->from('study s');
        $this->db->join('implant_administration ia', 'ia.study_id = s.study_id');
        $result = $this->db->get()->result_array();
        return $result;
    }

    public function get_report_all_wastages() {
        $this->db->select('w.*,sm.site_title');
        $this->db->from('wastage w');
        $this->db->join('site_mapping sm', 'sm.site_oc_value = w.site');
        $result = $this->db->get()->result_array();
        return $result;
    }

    public function get_report_patient($post) {
        $this->db->select('*');
        $this->db->from('implant_administration ia');
        $this->db->where('ia.person_id',$post['id']);
        $this->db->where('ia.site_id',$post['site_id']);
        $result = $this->db->get()->result_array();
        return $result;
    }

    public function get_report_implant_adminstration($post) {
        $this->db->select('*');
        $this->db->from('study s');
        $this->db->join('implant_administration ia', 'ia.study_id = s.study_id');
        $this->db->where('s.study_id', $post['id']);
        $result = $this->db->get()->result_array();
        return $result;
    }

    public function get_report_adverse_events($post) {
        $this->db->select('*');
        $this->db->from('adverse_events ae');
        $this->db->join('adverse_events_data aed', 'aed.ae_id = ae.ae_id');
        $this->db->where('ae.ae_id', $post['id']);
        $result = $this->db->get()->result_array();
        return $result;
    }

    public function get_report_sites($post) {
        $siteId = $post['id'];
        $siteDataQ = "SELECT s.site,sm.site_title,
            (SELECT COUNT(d.`site`) total_deliveries FROM `deliveries` d WHERE d.site = s.site) num_deliveries,
            (SELECT SUM(d.`number_implants`) total_deliveries FROM `deliveries` d WHERE d.site = s.site) site_deliveries,
            (SELECT COUNT(ia.`site_id`) total_implants FROM implant_administration ia WHERE ia.site_id = s.site) site_implants,
            (SELECT COUNT(w.`site`) wastages FROM wastage w WHERE w.site = s.site) site_wastages
          FROM sites s
          JOIN site_mapping sm ON sm.site_oc_value = s.site
          WHERE s.site = $siteId
          GROUP BY s.`site`";
        $result['siteData'] = $this->db->query($siteDataQ)->result_array()[0];
        
//  site implant administration
        $this->db->select('*');
        $this->db->from('implant_administration ia');
        $this->db->where('ia.site_id', $siteId);
        $siteImplants = $this->db->get()->result_array();
        $result['siteImplants'] = $siteImplants;
        
//        site deliveries
        $this->db->select('d.*');
        $this->db->from('deliveries d ');
        $this->db->where('d.site',$siteId);
        $result['siteDeliveries'] = $this->db->get()->result_array();
//        print_array($siteImplants);
        return $result;
    }

    public function get_report_all_batches() {
        $allBatchesQ = "SELECT 
            COUNT(db.batch_number) total_batches,
            SUM(db.`total_implants`) total_implants,
            SUM(db.`imp_alloc_qc`) total_qc,
            SUM(db.`imp_alloc_ct`) total_ct,
            (SELECT SUM(d.number_implants) FROM deliveries d) total_deliveries,
            (SELECT COUNT(ia.study_id) FROM implant_administration ia) total_implants_administered,
            (SELECT COUNT(w.site) FROM wastage w) total_wastages
          FROM
            drug_batch db";
        $allBatchesData = $this->db->query($allBatchesQ)->result_array();
        $result['allBatchesData'] = $allBatchesData;
//        sites report
        $sitesQ = "SELECT s.site,
            (SELECT COUNT(d.`site`) total_deliveries FROM `deliveries` d WHERE d.site = s.site) num_deliveries,
            (SELECT SUM(d.`number_implants`) total_deliveries FROM `deliveries` d WHERE d.site = s.site) site_deliveries,
            (SELECT COUNT(ia.`site_id`) total_implants FROM implant_administration ia WHERE ia.site_id = s.site) site_implants,
            (SELECT COUNT(w.`site`) wastages FROM wastage w WHERE w.site = s.site) site_wastages
          FROM sites s
          GROUP BY s.`site`";
        $sitesData = $this->db->query($sitesQ)->result_array();
        $result['sitesSummary'] = $sitesData;
//       Site administrations
        foreach ($sitesData as $site) {
            $this->db->select('sm.site_title,ia.`site_id`,ia.`study_subject_id`,ia.`implant_batch`,ia.`implant_date`');
            $this->db->from('implant_administration ia');
            $this->db->join('site_mapping sm', 'sm.site_oc_value = ia.site_id');
            $this->db->order_by('sm.site_title ASC ,ia.`implant_date` ASC');
            $this->db->where('ia.site_id', $site['site']);
            $siteReport = $this->db->get()->result_array();
            $result['sitesReport'][$site['site']] = $siteReport;
        }
        if(empty($result['sitesReport'])){
            $result['sitesReport'] = array();
        }

//        print_array($result);
        return $result;
    }

    public function get_report_drug_batch($post) {
        $id = $post['id'];
        $batchData = $this->db->get_where('drug_batch', array('drug_batch_id' => $id))->result_array()[0];

        $q = "SELECT db.*,
                (SELECT SUM(d.number_implants) FROM deliveries d WHERE d.batch_number = '" . $batchData['batch_number'] . "') total_imp_delivered,
                (SELECT COUNT(*) FROM implant_administration ia WHERE ia.implant_batch = '" . $batchData['batch_number'] . "') total_imp_admin,
                (SELECT COUNT(*) FROM wastage w WHERE w.batch_number = '" . $batchData['batch_number'] . "') AS total_wastages
               FROM drug_batch db
               WHERE db.`batch_number` = '" . $batchData['batch_number'] . "'
               GROUP BY db.`batch_number`";
        $allBatchData = $this->db->query($q)->result_array();
        $result['batch'] = $allBatchData;
//        echo $this->db->last_query();exit;
        $result['impAdminData'] = $this->db->get_where('implant_administration', array('implant_batch' => $batchData['batch_number']))->result_array();

        $siteRecordQ = "SELECT s.`site`,sm.site_title,
                (SELECT SUM(d.number_implants) FROM deliveries d WHERE d.site = s.`site`) total_imp_delivered,
                (SELECT COUNT(ia.site_id) FROM implant_administration ia WHERE ia.site_id = s.`site`) total_imp_administered,
                (SELECT COUNT(w.site) FROM wastage w WHERE w.site = s.`site`) total_wastages
                 FROM sites s
                JOIN site_mapping sm ON sm.site_oc_value = s.site";
        $sitesData = $this->db->query($siteRecordQ)->result_array();
        $result['sitesData'] = $sitesData;

        return $result;
    }

    public function get_batch_wastage($batch_number) {
        $this->db->select('count(batch_number)');
        $this->db->from('wastage');
        $this->db->where('batch_number', $batch_number);
        $result = $this->db->count_all_results();
        return $result;
    }

    public function get_batch_deliveries_implants($batch_number) {
        $this->db->select('SUM(number_implants) as number_implants');
        $this->db->from('deliveries');
        $this->db->where('batch_number', $batch_number);
        $result = $this->db->get()->row();
        return $result;
    }

    public function get_implant_admin($batch_number) {
        $this->db->select('*');
        $this->db->from('implant_administration');
        $this->db->where('implant_batch', $batch_number);
        $result = $this->db->get()->result_array();
        return $result;
    }

    public function batches_report() {
        $this->db->select('db.*,bm.local_value');
        $this->db->from('drug_batch db');
        $this->db->join('batch_mapping bm', 'bm.oc_value = db.batch_number');
        $result = $this->db->get()->result_array();
        return $result;
    }

}
