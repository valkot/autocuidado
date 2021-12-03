<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mantenedor extends CI_Controller 
{
    public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
        $this->load->library('session');
		$this->load->model('Mantenedor_Model');
	}

	public function index()
	{

		if (!$this->session->userdata('logged_in')) 
		{
			redirect(base_url('Login'));
		}
		else
		{
			if( ($this->session->userdata('perfil') == 4) || ($this->session->userdata('perfil') == 5) )
			{
				$result['load_funcionarios']=$this->Mantenedor_Model->load_Funcionarios();
				$userID = $this->session->userdata('user_id');
				$result['datos_funcionario']=$this->Mantenedor_Model->get_dataFuncionario($userID);
				$this->load->view('mantenedor_View', $result);
			}
			else if ( $this->session->userdata('perfil') == 2 )
			{
				$servicio = '';
				$userID = $this->session->userdata('user_id');
				$result['datos_funcionario']=$this->Mantenedor_Model->get_dataFuncionario($userID);
				foreach($result['datos_funcionario'] as $value)
				{
					$servicio = $value->SERV_id;
				}
				$result['load_funcionarios_perfilados']=$this->Mantenedor_Model->load_FuncionariosPerfilados($servicio);
				$this->load->view('mantenedor_View', $result);
			}
			else
			{
				redirect(base_url('Inicio'));
			}
			
		}
	}

	public function editUsuario()
	{
		if (!$this->session->userdata('logged_in')) 
		{
			redirect(base_url('Login'));
		}
		else
		{
            $id = $this->input->post('btnM');
            $result['data']=$this->Mantenedor_Model->show_EditarUsuario($id);
			$result['calidad_juridica']=$this->Mantenedor_Model->load_CalidadJuridica();
			$result['estamento']=$this->Mantenedor_Model->load_Estamento();
			$result['load_servicios']=$this->Mantenedor_Model->load_Servicios();
			$result['load_generos']=$this->Mantenedor_Model->load_Generos();
            $result['load_regiones']=$this->Mantenedor_Model->load_Regiones();
            //$result['comunas']=$this->Mantenedor_Model->load_Comunas();
            $this->load->view('editFuncionario_View',$result);
        }
	}

	public function delUsuario()
    {
        $id=$this->uri->segment(3);
        $result['eliminarUsuario']=$this->Mantenedor_Model->deleteUsuario($id);
		sleep(3);
        redirect(base_url('Mantenedor'));
        
    }

	public function agregarFuncionario()
	{
		if (!$this->session->userdata('logged_in')) 
		{
			redirect(base_url('Login'));
		}
		else
		{
			$userID = $this->session->userdata('user_id');
			$result['load_datauser']=$this->Mantenedor_Model->load_dataUser($userID);
			$result['calidad_juridica']=$this->Mantenedor_Model->load_CalidadJuridica();
			$result['estamento']=$this->Mantenedor_Model->load_Estamento();
			$result['load_generos']=$this->Mantenedor_Model->load_Generos();
			$result['load_servicios']=$this->Mantenedor_Model->load_Servicios();
			$result['load_regiones']=$this->Mantenedor_Model->load_Regiones();
			$this->load->view('addFuncionario_View', $result);
		}
	}

    public function insert_funcionario()
	{
		if (!$this->session->userdata('logged_in')) 
		{
			redirect(base_url('Login'));
		}
		else
		{
			$run = $this->input->post('txt_run');
			$run = str_replace(array('.', ','), '' , $run);
			$nombre = strtoupper($this->input->post('txt_nombre'));
			$paterno = strtoupper($this->input->post('txt_paterno'));
			$materno = strtoupper($this->input->post('txt_materno'));
			$ID_cj = $this->input->post('cmb_cj');
			$ID_estamento = $this->input->post('cmb_estamento');
			$ID_servicio = $this->input->post('cmb_servicio');
			$ID_genero = $this->input->post('cmb_genero');
			$ID_region = $this->input->post('cmb_region');
			$ID_comuna = $this->input->post('cmb_comuna');
			$email = $this->input->post('txt_email');
			$password = $run;
			$password = substr($password,0,-2);		

			setlocale(LC_ALL,"es_ES");
			$fecha = date('Y-m-d');
			$hora = date('H:i');
			$elDia = date('d');
			$elAnio = date('Y');

			$nuevoRegistro = ['USR_run' => $run, 'USR_nombre' => $nombre, 'USR_paterno' => $paterno, 'USR_materno' => $materno, 'CJ_id' => $ID_cj, 
			'ESTAM_id' => $ID_estamento, 'EST_id' => 1, 'SERV_id' => $ID_servicio, 'GEN_id' => $ID_genero, 'REG_id' => $ID_region, 'COM_id' => $ID_comuna, 'USR_email' => $email, 'USR_password' => $password];
			$result['insertarSolicitud']=$this->Mantenedor_Model->insertSolicitud($nuevoRegistro);

			$result['saveUsr'] =  ["mensaje" => "1"]; 
			echo json_encode($result['saveUsr']);
				//
			sleep(3);

			redirect(base_url('Mantenedor'));
		}
    }

	public function update_funcionario()
	{
		if (!$this->session->userdata('logged_in')) 
		{
			redirect(base_url('Login'));
		}
		else
		{
			$run = $this->input->post('txt_run');
			$run = str_replace(array('.', ','), '' , $run);
			$nombre = strtoupper($this->input->post('txt_nombre'));
			$paterno = strtoupper($this->input->post('txt_paterno'));
			$materno = strtoupper($this->input->post('txt_materno'));
			$ID_cj = $this->input->post('cmb_cj');
			$ID_estamento = $this->input->post('cmb_estamento');
			$ID_servicio = $this->input->post('cmb_servicio');
			$ID_genero = $this->input->post('cmb_genero');
			$ID_region = $this->input->post('cmb_region');
			$ID_comuna = $this->input->post('cmb_comuna');
			$email = $this->input->post('txt_email');
			$password = $run;
			$password = substr($password,0,-2);		

			setlocale(LC_ALL,"es_ES");
			$fecha = date('Y-m-d');
			$hora = date('H:i');
			$elDia = date('d');
			$elAnio = date('Y');

			$condicion = ['USR_run' => $run];
			$camposActualizados = ['USR_run' => $run, 'USR_nombre' => $nombre, 'USR_paterno' => $paterno, 'USR_materno' => $materno, 'CJ_id' => $ID_cj, 
			'ESTAM_id' => $ID_estamento, 'EST_id' => 1, 'SERV_id' => $ID_servicio, 'GEN_id' => $ID_genero, 'REG_id' => $ID_region, 'COM_id' => $ID_comuna, 'USR_email' => $email, 'USR_password' => $password];
			$result['updateSolicitud']=$this->Mantenedor_Model->updateSolicitud($camposActualizados, $condicion);

			$result['saveUsr'] =  ["mensaje" => "1"]; 
			echo json_encode($result['saveUsr']);
				//
			sleep(3);

			redirect(base_url('Mantenedor'));
		}
    }

}