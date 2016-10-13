<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Imp_administration extends CI_Controller {


    public function all_implants() {
        //implant administration
        $genModel = model_load_model('generic_model');
        $viewData['impAdmin'] = $genModel->get_all_implants();
        load_fullview('implant_administration_view', $viewData);
    }



}
