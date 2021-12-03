<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Estadisticas extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
        $this->load->library('session');
		$this->load->model('Estadisticas_Model');
	}

	public function index()
	{

		if (!$this->session->userdata('logged_in')) 
		{
			redirect(base_url('Login'));
		}
		else
		{
            $userID = $this->session->userdata('user_id');
			$result['encuestas']=$this->Estadisticas_Model->showDashboard_A($userID);
			$result['datos_funcionario']=$this->Estadisticas_Model->get_dataFuncionario($userID);
			//$result['universo']=$this->Estadisticas_Model->showDashboard_B($ubicacionPostulante);
			//$result['postulantes']=$this->Estadisticas_Model->showDashboard_C($ubicacionPostulante);

			
			//$result['load_data']=$this->Estadisticas_Model->load_Data($userID);

			$this->load->view('estadisticas_View',$result);
		}

	}
}
?>