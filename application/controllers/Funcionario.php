<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(E_ALL ^ E_NOTICE);
	class Funcionario extends CI_Controller 
	{

		public function __construct()
		{
			parent::__construct();
			$this->load->database();
			$this->load->helper('url');
			$this->load->library('pdf');
			$this->load->library('ciqrcode');
			$this->load->model('Funcionario_Model');
		}

		public function index()
		{
			$result['regiones']=$this->Funcionario_Model->load_Regiones();
			$this->load->view('funcionario_View',$result);
		}

		public function cargaDatosFuncionario($RUN)
		{
			$condicion = ['USR_run' => $RUN];
			$result['funcionario'] = $this->db->select('CONCAT(USR_nombre," ",USR_paterno," ",USR_materno) AS NC')->where($condicion)->get('usuarios')->result();
			echo json_encode($result['funcionario']);
		}

		public function insert_funcionario()
		{
			$run = $this->input->post('txt_run');
			$run = str_replace(array('.', ','), '' , $run);
			$direccion = strtoupper($this->input->post('txt_direccion'));
			$region = $this->input->post('cmb_region');
			$comuna = $this->input->post('cmb_comuna');
			$email = $this->input->post('txt_email');
			$fechaSolicitud = date('Y-m-d H:m:s');
			$laIP = $_SERVER['REMOTE_ADDR'];
			$elNombre = '';
			$laComuna = '';
			setlocale(LC_ALL,"es_ES");
			$fecha = date('Y-m-d');
			$hora = date('H:i');
			$elDia = date('d');

			$elAnio = date('Y');
			$hospital = 'Hospital San Juan de Dios';

			$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
			$elMes = $meses[date('n')-1];

			$result['datos_usuario']=$this->Funcionario_Model->load_Usuario($run);
			$result['datos_comuna']=$this->Funcionario_Model->get_Comuna($comuna);
			foreach($result['datos_usuario'] as $value)
			{
				$elNombre = $value->USR_nombre.' '.$value->USR_paterno.' '.$value->USR_materno;
			}

			foreach($result['datos_comuna'] as $value)
			{
				$laComuna = $value->COM_nombre;
			}

			$nuevoRegistro = ['USR_run' => $run, 'SOL_direccion' => $direccion, 'SOL_email' => $email, 'SOL_fecha' => $fechaSolicitud, 'SOL_ip' => $laIP, 'REG_id' => $region, 'COM_id' => $comuna];
			$result['insertarSolicitud']=$this->Funcionario_Model->insertSolicitud($nuevoRegistro);

			$mantiza = substr($run, 0, -2);
            $fechaNum = str_replace("-", "", $fecha);
			$horaNum = str_replace(":", "", $hora);
			$tiempo = $fechaNum.$horaNum;

			/*****************************
			********* GENERAR QR *********
			*****************************/
			
			$params['data'] = 'http://permisos.valkot.cl/assets/pdf/'.$mantiza.'_'.$tiempo.'.pdf';
			$params['level'] = 'H';
			$params['size'] = 10;
			$params['savename'] = '/var/www/html/permisos/assets/qr/'.$mantiza.'_'.$tiempo.'.png';
			$this->ciqrcode->generate($params);

			/*****************************
			*********** BASE64 ***********
			*****************************/
			$logo = '/var/www/html/permisos/assets/qr/logo_ssmo.jpg';
			$imgLogo =  base64_encode(file_get_contents($logo));

			$QR = '/var/www/html/permisos/assets/qr/'.$mantiza.'_'.$tiempo.'.png';
			$imgData = base64_encode(file_get_contents($QR));

			$pathfirma = '/var/www/html/permisos/assets/qr/firma_rrhh.png';
			$imgFirma =  base64_encode(file_get_contents($pathfirma));

			/*****************************
			******** GENERAR PDF ********** 
			*******************************/
			$html = "<html style='margin:80px 70px 80px 90px;'>";
                    $html .= "<head></head>";
                    $html .= "<body>";

                        $html .= "<table border='0' cellspacing='0' style='font-size: 14px; width: 100%;'>";
                            $html .= "<tbody>";
                                $html .= "<tr>";
                                    $html .= "<td style='text-align: left; width: 50%;'><img src='data:image/png;base64,$imgLogo' width='100px' height='100px' /></td>";
                                    $html .= "<td style='width: 15%;'></td>";
                                    $html .= "<td style='text-align: right; width: 35%;'><img src='data:image/png;base64,$imgData' width='100px' height='100px' /></td>";
                                $html .= "</tr>";
                                $html .= "<tr><td style='text-align: left; width: 50%; font-size: 10px; font-family: Arial, Helvetica, sans-serif;'>SERVICIO DE SALUD METROPOLITANO OCCIDENTE</td><td></td><td></td></tr>";
                                $html .= "<tr><td style='text-align: left; width: 50%; font-size: 10px; font-family: Arial, Helvetica, sans-serif;'>HOSPITAL SAN JUAN DE DIOS</td><td></td><td></td></tr>";
                                $html .= "<tr><td style='text-align: left; width: 50%; font-size: 10px; font-family: Arial, Helvetica, sans-serif;'>SUBDIRECCIÓN DE RR.HH.</td><td></td><td></td></tr>";
                                $html .= "<tr><td style='text-align: left; width: 50%; font-size: 10px; font-family: Arial, Helvetica, sans-serif;'><u>U. GESTIÓN DE LAS PERSONAS</u></td><td></td><td></td></tr>";
                            $html .= "</tbody>";
                        $html .= "</table>";

                        $html .= "<br /><br />";

                        $html .= "<table border='0' cellspacing='0' style='font-size: 18px; width: 100%;'>";
                            $html .= "<tbody>";
                                $html .= "<tr>";
                                $html .= "<td style='text-align: center; font-family: Arial, Helvetica, sans-serif;'><strong> CERTIFICADO</strong></td>";
                            $html .= "</tbody>";
                        $html .= "</table>";
                        
						$html .= "<br /><br />";

                        $html .= "<table border='0' cellspacing='0' style='font-size: 16px; width: 100%;'>";
                            $html .= "<tbody>";
                                $html .= "<tr>";
                                $html .= "<td style='text-align: right; font-family: Arial, Helvetica, sans-serif;'>Santiago, $elDia de $elMes de $elAnio</td>";
                            $html .= "</tbody>";
                        $html .= "</table>";

						$html .= "<br /><br /><br />";
                        
                        $html .= "<div style='text-align:justify; font-size: 16px; line-height: 30px;  font-family: Arial, Helvetica, sans-serif;'>Gustavo A. Mena Pinela, SubDirector de Recursos Humanos del <b>$hospital</b>, Rut Empleador: 61.608.204-3, certifica que, <b>$elNombre</b>, RUN <b>$run</b> está contratado(a) en este establecimiento y su domicilio es <b>$direccion</b>, comuna de <b>$laComuna</b></div>"; 
                        $html .= "<br />";

						$html .= "<div style='text-align:justify; font-size: 16px; line-height: 30px;  font-family: Arial, Helvetica, sans-serif;'>Se extiende el presente certificado para traslado de ida y regreso a sus funciones laborales.</div>";
                        
                        $html .= "<br /><br /><br /><br />";

						$html .= "<table border='0' cellspacing='0' style='font-size: 14px; width: 100%;'>";
                            $html .= "<tbody>";
                                $html .= "<tr>";
									$html .= "<td style='width: 20%;'></td>";
									$html .= "<td style='text-align: center; width: 60%;'><img src='data:image/png;base64,$imgFirma' width='300px' height='200px' /></td>";
									$html .= "<td style='width: 20%;'></td>";
								$html .= "</tr>";
							$html .= "</tbody>";
						$html .= "</table>";
						$html .= "<br /><br />";
						$html .= "<div style='text-align:justify; font-size: 9px; line-height: 30px;  font-family: Arial, Helvetica, sans-serif;'>Recuerde que este certificado es un complemento, por lo que no reemplaza el uso de su credencial y cédula de identidad.</div>";
                    $html .= "</body>";
                $html .= "</html>";

                $this->pdf->loadHtml($html);
                $this->pdf->setPaper('letter', 'portrait');
                $this->pdf->render();

                $output = $this->pdf->output();
                $savePDF = '/var/www/html/permisos/assets/pdf/'.$mantiza.'_'.$tiempo.'.pdf';
                file_put_contents($savePDF, $output);

			/******************************
			********* ENVIO EMAIL *********
			******************************/
			$this->load->config('email');
			$asunto = 'Certificado de movilizacion';
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

			$result['envioMail'] =  ["mensaje" => "1"]; 
				echo json_encode($result['envioMail']);
			//

			redirect(base_url('Inicio'));
		}

		public function cargaComunasAjax($id) 
		{ 
			$result['comunas'] = $this->db->where("COM_codigo",$id)->get("comunas")->result();
			echo json_encode($result['comunas']);
		}
	}
?>