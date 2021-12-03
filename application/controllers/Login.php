<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller
{
    public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->library('recaptcha');
		$this->load->model('Login_Model');
    }
    
    public function index()
	{
		$this->load->view('login_View');
		
	}
}

?>