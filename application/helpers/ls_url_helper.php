<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function static_url() {
    $CI = & get_instance();
    $static_url = $CI->config->item("static_url");

    return $static_url;
}

/**
 * Method for loading a controller.
 * @param string $controller controller name
 * @param string $mthod function name, default is index
 * @return the value the function returns.
 * */
if (!function_exists('load_controller')) {

    function load_controller($controller, $method = 'index') {
        require_once(FCPATH . APPPATH . 'controllers/' . $controller . '.php');

        $controller = new $controller();

        return $controller->$method();
    }

}
?>
