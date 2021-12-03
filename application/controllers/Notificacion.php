<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(E_ALL ^ E_NOTICE);
	class Notificacion extends CI_Controller 
	{

		public function __construct()
		{
			parent::__construct();
			$this->load->database();
			$this->load->helper('url');
			$this->load->library('pdf');
			$this->load->library('ciqrcode');
			$this->load->model('Notificacion_Model');
		}

		public function index()
		{
			$result['estamentos']=$this->Notificacion_Model->load_Estamentos();
			$result['calidad_juridica']=$this->Notificacion_Model->load_CalidadJuridica();
			$this->load->view('notificacion_View', $result);
		}

        public function insert_funcionario()
        {
            setlocale(LC_ALL,"es_ES");
            $emailNotificador = $this->input->post('txt_emailNotificador');
            $run = $this->input->post('txt_run');
			$run = str_replace(array('.', ','), '' , $run);
            $tipoContacto = $this->input->post('cmb_tipoContacto');
            $sintomatologia = $this->input->post('cmb_sintomatologia');
            $telefono = $this->input->post('txt_telefono');
            $diasPerdidos = $this->input->post('cmb_diasPerdidos');
            $pcr = $this->input->post('txt_pcr');
            $ultimoDiaTrabajado = $this->input->post('txt_diaTrabajado');
            $tipoCaso = $this->input->post('cmb_tipoCaso');
            $observacion = strtoupper($this->input->post('txt_observacion'));
            $fechaNotificacion = date('Y-m-d');
			$laIP = $_SERVER['REMOTE_ADDR'];

            $nuevoRegistro = ['NOT_email' => $emailNotificador, 'NOT_tipoContacto' => $tipoContacto, 'NOT_sintomatologia' => $sintomatologia, 'NOT_telefono' => $telefono, 'NOT_diasPerdidos' => $diasPerdidos, 
            'NOT_pcr' => $pcr, 'NOT_ultimoDiaTrabajado' => $ultimoDiaTrabajado, 'NOT_tipoCaso' => $tipoCaso, 'NOT_observacion' => $observacion, 'NOT_fecha' => $fechaNotificacion, 'NOT_ip' => $laIP, 
            'USR_run' => $run];
			$result['insertarSolicitud']=$this->Notificacion_Model->insertSolicitud($nuevoRegistro);
			

            /******************************
			********* ENVIO EMAIL *********
			******************************/
            $email = 'claudia.roa@redsalud.gov.cl';
			$this->load->config('email');
			$asunto = 'Notificacion de PCR(+) o contacto estrecho';
			$hacia = $email;
			

			$config = array(
				'protocol' => 'smtp', 
				'smtp_host' => 'mail.minsal.cl', 
				'smtp_port' => 25,
				'smtp_user' => 'notificacion_hsjd@redsalud.gov.cl',
				'smtp_pass' => 'Nh123456',
				//'smtp_crypto' => 'ssl', //can be 'ssl' or 'tls' for example
				'mailtype' => 'html', //plaintext 'text' mails or 'html'
				'smtp_timeout' => '15', //in seconds
				'charset' => 'UTF-8',
				'wordwrap' => TRUE
			);

			$this->load->library('email', $config);
	
			$mensaje = "
			<html>
			<head>
				<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
			</head>
			<body>
				<div style='text-align:justify; font-family: Courier; font-size: 14px;'>
					<p>Estimado(a) $elNombre,</p>
					<br/>
					<p>Le informamos que con fecha $fecha </p>
					<p> se ha generado un certificado de movilizacion </p> 
					<p> el cual va adjunto a este correo. </p>
					<br/>
					<br/><br/><br/>
					<p>Este es un mensaje autogenerado favor de no responder.</p>
					<p>Los acentos han sido eliminados intencionalmente.</p>
				</div>
			</body>
			</html>";

			$desde ='notificacion_hsjd@redsalud.gov.cl';

			$this->email->set_newline("\r\n");
			$this->email->from($desde);
			$this->email->to($hacia);
			$this->email->subject($asunto);
			$this->email->message($mensaje);

			$this->email->attach('/var/www/html/permisos/assets/pdf/'.$mantiza.'_'.$tiempo.'.pdf');

			$this->email->send();






            redirect(base_url('Inicio'));

            //correo al que deben llegar las notificaciones
            //claudia.roa@redsalud.gov.cl
        }
    }
?>