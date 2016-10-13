<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * Allow models to use other models
 *
 * This is a substitute for the inability to load models
 * inside of other models in CodeIgniter.  Call it like
 * this:
 *
 * $salaries = model_load_model('salary');
 * ...
 * $salary = $salaries->get_salary($employee_id);
 *
 * @param string $model_name The name of the model that is to be loaded
 *
 * @return object The requested model object
 *
 */
function view_load_view($view_name, $view_data = null) {
    $CI = & get_instance();
    $CI->load->view($view_name, $view_data);
    //$temp = explode('/',$view_name);
    //$view_name = $temp[count($temp)-1];
    //return $CI->$view_name;
}


function load_fullview($view_name, $view_data = null,$header=null) {
    $CI = & get_instance();
    $CI->load->view('includes/header',$header);
    $CI->load->view($view_name, $view_data);
    $CI->load->view('includes/footer');
}
