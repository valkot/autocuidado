<?php
    //defined('BASEPATH') OR exit('No direct script access allowed');

    class EnvioReportes extends CI_Controller 
    {

        public function __construct()
        {
            parent::__construct();
            $this->load->database();
            $this->load->helper('url');
            //$this->load->library('session');
            $this->load->model('EnvioReportesModel');
        }

        public function ejecuta()
        {
            $result['carga_servicios_test']=$this->EnvioReportesModel->load_idServicios();
            
            foreach($result['carga_servicios_test'] as $value)
            {
                $servicio = 0;
                $id_jefe = 0;
                $NC_jefe = '';
                $servicio = $value->SERV_id;
                $id_jefe = $value->USR_id;
                $NC_jefe = $value->NC_jefe;
                $emailJefe = $value->USR_email;
                $this->envioEmail($servicio, $id_jefe, $NC_jefe, $emailJefe);	
            }
            
            //$this->envioEmail($servicio, $id_jefe);	
        }

        public function envioEmail($servicio, $id_jefe, $NC_jefe, $emailJefe)
        {
            $listInfo = $this->EnvioReportesModel->generacionExcel($servicio);    

            $this->load->library('excel');
            
            $objPHPExcel = new PHPExcel();
            $objPHPExcel->setActiveSheetIndex(0);
            ////////////////////////////// ESTILO //////////////////////////////
            //Centro Header
            $objPHPExcel->getActiveSheet()->getStyle('A1:P1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('A2:P20')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            //Ancho de las filas
            $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
            $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
            $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(40);
            $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
            $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
            $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(15);
            $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(15);
            $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(15);
            $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(15);
            $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(20);
            $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(15);
            $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(15);
            $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(20);
            $objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(20);
            $objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(15);
            $objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(30);
            //Primera fila en negritas
            $objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
            $objPHPExcel->getActiveSheet()->getStyle('B1')->getFont()->setBold(true);
            $objPHPExcel->getActiveSheet()->getStyle('C1')->getFont()->setBold(true);
            $objPHPExcel->getActiveSheet()->getStyle('D1')->getFont()->setBold(true);
            $objPHPExcel->getActiveSheet()->getStyle('E1')->getFont()->setBold(true);
            $objPHPExcel->getActiveSheet()->getStyle('F1')->getFont()->setBold(true);
            $objPHPExcel->getActiveSheet()->getStyle('G1')->getFont()->setBold(true);
            $objPHPExcel->getActiveSheet()->getStyle('H1')->getFont()->setBold(true);
            $objPHPExcel->getActiveSheet()->getStyle('I1')->getFont()->setBold(true);
            $objPHPExcel->getActiveSheet()->getStyle('J1')->getFont()->setBold(true);
            $objPHPExcel->getActiveSheet()->getStyle('K1')->getFont()->setBold(true);
            $objPHPExcel->getActiveSheet()->getStyle('L1')->getFont()->setBold(true);
            $objPHPExcel->getActiveSheet()->getStyle('M1')->getFont()->setBold(true);
            $objPHPExcel->getActiveSheet()->getStyle('N1')->getFont()->setBold(true);
            $objPHPExcel->getActiveSheet()->getStyle('O1')->getFont()->setBold(true);
            $objPHPExcel->getActiveSheet()->getStyle('P1')->getFont()->setBold(true);
            // Seteo el header        
            $objPHPExcel->getActiveSheet()->setCellValue('A1', 'FECHA');
            $objPHPExcel->getActiveSheet()->setCellValue('B1', 'RUT');
            $objPHPExcel->getActiveSheet()->setCellValue('C1', 'NOMBRE');
            $objPHPExcel->getActiveSheet()->setCellValue('D1', 'TOS');
            $objPHPExcel->getActiveSheet()->setCellValue('E1', 'FIEBRE');
            $objPHPExcel->getActiveSheet()->setCellValue('F1', 'MIALGIA');
            $objPHPExcel->getActiveSheet()->setCellValue('G1', 'CEFALEA');
            $objPHPExcel->getActiveSheet()->setCellValue('H1', 'ODINOFAGIA');
            $objPHPExcel->getActiveSheet()->setCellValue('I1', 'DISNEA');
            $objPHPExcel->getActiveSheet()->setCellValue('J1', 'DOLOR TORAXICO');
            $objPHPExcel->getActiveSheet()->setCellValue('K1', 'DIARREA');
            $objPHPExcel->getActiveSheet()->setCellValue('L1', 'ANOSMIA');
            $objPHPExcel->getActiveSheet()->setCellValue('M1', 'CONGESTIÓN NASAL');
            $objPHPExcel->getActiveSheet()->setCellValue('N1', 'NAUSEAS O VÓMITOS');
            $objPHPExcel->getActiveSheet()->setCellValue('O1', 'AGEUSIA');
            $objPHPExcel->getActiveSheet()->setCellValue('P1', 'RESULTADO SCREENING');
            // set Row
            $rowCount = 2;
            foreach ($listInfo as $list) 
            {
                $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $list->fecha);
                $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $list->Rut);
                $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $list->NC);
                $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $list->EVAL_1);
                $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $list->EVAL_2);
                $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $list->EVAL_3);
                $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $list->EVAL_4);
                $objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, $list->EVAL_5);
                $objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, $list->EVAL_6);
                $objPHPExcel->getActiveSheet()->SetCellValue('J' . $rowCount, $list->EVAL_7);
                $objPHPExcel->getActiveSheet()->SetCellValue('K' . $rowCount, $list->EVAL_8);
                $objPHPExcel->getActiveSheet()->SetCellValue('L' . $rowCount, $list->EVAL_9);
                $objPHPExcel->getActiveSheet()->SetCellValue('M' . $rowCount, $list->EVAL_10);
                $objPHPExcel->getActiveSheet()->SetCellValue('N' . $rowCount, $list->EVAL_11);
                $objPHPExcel->getActiveSheet()->SetCellValue('O' . $rowCount, $list->EVAL_12);
                $objPHPExcel->getActiveSheet()->SetCellValue('P' . $rowCount, $list->EVAL_resultado);
                $rowCount++;
            }
            date_default_timezone_set('America/Santiago');
            $filename = 'Autoevaluacion_'. date("Y-m-d"). '_'.$servicio .".xls";
            header('Content-Type: application/vnd.ms-excel'); 
            header('Content-Disposition: attachment;filename="'.$filename.'"');
            header('Cache-Control: max-age=0'); 
            $objWriter = new PHPExcel_Writer_Excel2007( $objPHPExcel ); 
            //$objWriter->save('php://output'); 

            $objWriter->save('/var/www/html/autocuidado/assets/xls/'.$filename.'');
                
            ////////////////////////////////////////////////
                
            //foreach($jefatura as $value)
            //{
                //$email = $value->USR_email;
                $email = $emailJefe;
                $this->load->config('email');
                $asunto = 'Notificacion de autoconsulta';
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
                        <p>Estimado(a) $NC_jefe,</p>
                        <br/>
                        <p>Le informamos que con fecha $fecha </p>
                        <p> se adjunta nomina de funcionarios que</p> 
                        <p> han realizado el test de autodiagnostico. </p>
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

                $this->email->attach('/var/www/html/autocuidado/assets/xls/'.$filename.'');
                //$this->email->attach(sys_get_temp_dir() . $filename, $filename);
                //$mail->AddAttachment(sys_get_temp_dir() . $filename, $filename);

                $this->email->send();
                $this->email->clear(TRUE);
            //}
        
            //redirect(base_url('Inicio'));
        }

    }
?>