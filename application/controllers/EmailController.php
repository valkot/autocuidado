<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class EmailController extends CI_Controller {

    public function __construct() {
        parent:: __construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->model('Recuperar_Model');

    }

    public function index() 
    {
        //$this->load->view('email/contact');
    }

    public function envio($rut) 
    {
        $this->load->config('email');

        $config = array(
            'protocol' => 'smtp', // 'mail', 'sendmail', or 'smtp'
            'smtp_host' => 'mail.minsal.cl', 
            'smtp_port' => 25,
            'smtp_user' => 'info.dgtic.dssms@redsalud.gob.cl',
            'smtp_pass' => 'Dssms9876',
            //'smtp_crypto' => 'ssl', //can be 'ssl' or 'tls' for example
            'mailtype' => 'html', //plaintext 'text' mails or 'html'
            'smtp_timeout' => '5', //in seconds
            'charset' => 'UTF-8',
            'wordwrap' => TRUE
        );

        $this->load->library('email', $config);
        
        //$desde = $this->config->item('smtp_user');

        $result['data'] = $this->Recuperar_Model->obtenerEmail($rut);
        $hacia = '';
        $asunto = 'Recuperacion de Contraseña PRAIS';
        $password = '';
        $usuario = '';


        foreach($result['data'] as $objeto)
        {
            $hacia = $objeto->USR_email;
            $password = $objeto->USR_password;
            $usuario = $objeto->USR_nombres;
        }

        //$mensaje = 'Estimado '. $usuario. ', <br /><br />Se ha creado una nueva contraseña para el acceso a la plataforma web de PRAIS, la cual es : <b>' .$password. '</b>. <br />Este es un mensaje autogenerado favor de no responder a este correo, sus correos no seran leidos.';

        $mensaje = "
        <html>
          <head>
            <title>your title</title>
          </head>
          <body>
            <p>Estimado <b>$usuario</b>,</p>
            <p><br /></p>
            <p>Se ha creado una nueva contraseña para acceder al portal.</p>
            <p>Su nueva contraseña es: <b>$password</b></p>
            <p>Este es un mensaje autogenerado favor de no responder.</p>
          </body>
        </html>";

        //$to = $this->input->post('to');
        //$subject = $this->input->post('subject');
        //$message = $this->input->post('message');
$desde ='info.dgtic.dssms@redsalud.gob.cl';

        //$this->email->set_header('Content-Type', 'text/html');
        $this->email->set_newline("\r\n");
        $this->email->from($desde);
        $this->email->to($hacia);
        $this->email->subject($asunto);
        $this->email->message($mensaje);

        //$this->email->set_crlf( "\r\n" );


        $this->email->send();

        $result['envioMail'] =  ["mensaje" => "1"]; 
			echo json_encode($result['envioMail']);
/*
        if ($this->email->send()) 
        {
            $result['envioMail'] =  ["mensaje" => "1"]; 
			echo json_encode($result['envioMail']);
        } else 
        {
            $result['envioMail'] =  ["mensaje" => "0"]; 
			echo json_encode($result['envioMail']);
        }
        */
    }
}