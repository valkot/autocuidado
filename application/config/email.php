<?php defined('BASEPATH') OR exit('No direct script access allowed');

$config = array(
    'protocol' => 'smtp', // 'mail', 'sendmail', or 'smtp'
    'smtp_host' => 'mail.minsal.cl', 
    'smtp_port' => 25,
    'smtp_user' => 'info.dgtic.dssms@redsalud.gob.cl',
    'smtp_pass' => 'Dssms9876',
    //'smtp_crypto' => 'ssl', //can be 'ssl' or 'tls' for example
    'mailtype' => 'html', //plaintext 'text' mails or 'html'
    'smtp_timeout' => '5', //in seconds
    'charset' => 'iso-8859-1',
    'wordwrap' => TRUE
);