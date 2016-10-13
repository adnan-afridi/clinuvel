<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

    public function index() {
     echo base64_decode('OCUoZ2N7fm5eVD1O');
        exit;

//        $filename = 'https://www.getconnected360.com/store/inquiry_page.php?store=DescentServices.com&service=15003';
//        $filename = 'https://www.getconnected360.com/store/inquiry_page.php?store=DescentServices.com&service=15005';
        $filename = './assets/test.html';
        $formData = fopen($filename, "rb");
        $string = stream_get_contents($formData);

        echo "<script>
            var string = " . $string . ";
            alert(string);
        </script>";
        exit;


        echo $string;
        exit;
        $string = htmlentities(str_replace("'", "\'", $string), ENT_QUOTES);
    }

}  