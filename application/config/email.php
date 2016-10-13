<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

$config = Array(
    'protocol' => 'smtp',
    'smtp_host' => 'mail.spijko.com',
    'smtp_port' => 26,
    'smtp_user' => 'test@spijko.com', // change it to yours
    'smtp_pass' => 'Test!@#4', // change it to yours
    'mailtype' => 'html',
    'charset' => 'iso-8859-1',
    'wordwrap' => TRUE
);

$config['feedback_email'] = 'tes@spijko.com';

//USER INFO
$config['email_from'] = 'test@spijko.com';
$config['mailer_name'] = 'Clinuvel Admin';

//email types
$config['registration'] = "Registration";
$config['change_password'] = "Change Password";
$config['publisher'] = 'Publisher';
