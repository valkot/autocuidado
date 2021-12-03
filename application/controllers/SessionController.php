<?php 
if (!defined('BASEPATH'))
exit('No direct script access allowed');

class SessionController extends CI_Controller
{
    public function __construct() 
    {
        parent:: __construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('SessionModel');
        $this->load->helper("security");
    }

    public function index() 
    {
        $this->load->view('mantenedor_View');
    }
    
    public function flash_message()
    {
        $this->session->set_flashdata('msg', 'Welcome to CodeIgniter Flash Messages');
        redirect(base_url('flash_index'));
    }



    public function check_auth($page) 
    {
        if (!$this->session->userdata('logged_in')) {
            $this->session->set_flashdata('msg', "No se puede acceder a la pagina $page.");
            redirect('Login');
        }
    }

    public function login() 
    {
        $this->load->view('Login');
    }

    public function authenticate() 
    {
        $this->load->library('recaptcha');
        $usuario = $this->input->post('username');
        $password = $this->input->post('password');

        $usuario = str_replace(array('.', ''), '' , $usuario);

		//$captcha_answer = $this->input->post('g-recaptcha-response');

		// Verify user's answer
		//$response = $this->recaptcha->verifyResponse($captcha_answer);       
       
		$credenciales = ['usuario' => $usuario, 'password' => $password];
        
        $credenciales = $this->security->xss_clean($credenciales);
        
		$result['credenciales']=$this->SessionModel->getCredenciales($credenciales);
        $result['nombre_usuario']=$this->SessionModel->getNombreUsuario($credenciales);
        $result['perfil']=$this->SessionModel->getPerfilUsuario($credenciales);
        //$result['ubicacion']=$this->SessionModel->getUbicacionUsuario($usuario);

		$acceso = 0;
        $nombreCompleto = '';
        $userID = '';
        $perfil = '';
        $elUltimoAcceso = '';
        $ubicacion = '';
        $laIP = $_SERVER['REMOTE_ADDR'];
        foreach ($result['credenciales'] as $obj)
        {
            $acceso =  $obj->TOTAL;
		}
		
		foreach ($result['nombre_usuario'] as $NC)
		{
            $nombreCompleto = $NC->NC;
            $userID = $NC->USR_id;
        }

        foreach ($result['perfil'] as $elPerfil)
		{
            $perfil = $elPerfil->PERFIL_id;
        }


        $this->session->set_userdata('username', $nombreCompleto);
        $this->session->set_userdata('user_id', $userID);
        $this->session->set_userdata('user', $usuario);
        $this->session->set_userdata('logged_in', TRUE);
        $this->session->set_userdata('perfil', $perfil);


//        if ($response['success']) 
//        {

            if($acceso > 0)
            {
                $fecha = time();
                $hoy = date('Y-m-d H:i:s',$fecha);
                $accesos = ['ACC_fecha' => $hoy, 'ACC_username' => $usuario, 'ACC_ip' => $laIP];
                
                $id=$this->SessionModel->addRegistroLogin($accesos);
                $result['ultimo_acceso']=$this->SessionModel->getUltimoAcceso($usuario);
                foreach ($result['ultimo_acceso'] as $valor)
                {
                    $elUltimoAcceso = $valor->ACC_fecha;
                }

                //veo si tiene encuesta realizada hoy
                $encuestaHoy = 0;
                $result['encuesta_hoy']=$this->SessionModel->get_encuestaHoy($userID);
                foreach ($result['encuesta_hoy'] as $valor)
                {
                    $encuestaHoy = $valor->TOTAL;
                }


                $this->session->set_userdata('logged_in', TRUE);
                $this->session->set_userdata('username', $nombreCompleto);
                $this->session->set_userdata('user', $usuario);
                $this->session->set_userdata('perfil', $perfil);
                $this->session->set_userdata('ultimo_ingreso', $elUltimoAcceso);
                $this->session->set_userdata('ubicacion_postulante', $ubicacion);
                
                if($encuestaHoy == 0)
                {
                    redirect(base_url('Inicio'));
                }
                else
                {
                    redirect(base_url('Estadisticas'));
                }
                

            }
            else
            {

                redirect(base_url('Login'));

            }
/*        }
        else
        {
            redirect(base_url('Login'));
        }
 */     
    }

    public function recuperar()
    {
        $this->load->view('recuperarPassword_View');
    }

    public function dashboard() {
        $this->check_auth('dashboard');
        $this->load->view('sessions/dashboard');
    }

    public function settings() {
        $this->check_auth('settings');
        $this->load->view('sessions/settings');
    }

    public function logout() 
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('perfil');
        $this->session->sess_destroy();
        redirect(base_url('Login'));
    }

    public function verificaExistencia($rutEntero)
    {   
        $condicion = ['USR_run' => $rutEntero];

        $result['rut_existe'] = $this->db
                                -> select('count(*) as TOTAL')
                                ->where($condicion)
                                ->get('usuarios')->result();

        echo json_encode($result['rut_existe']);
    }

}


?>