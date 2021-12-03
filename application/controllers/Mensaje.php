<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mensaje extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
        $this->load->library('session');
		$this->load->model('Mensaje_Model');
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
			$result['cardinalidad_respuestas']=$this->Mensaje_Model->load_respuestas($userID);
			$result['ver_respuestas']=$this->Mensaje_Model->show_respuestas($userID);
			
			$this->load->view('mensaje_View', $result);
		}
	}
}
?>