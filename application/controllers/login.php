<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
         parent::__construct();
         $this->load->model('login_model');
         $this->load->model('usuarios_model');
         $this->load->library(array('session','form_validation'));
         $this->load->helper(array('url','form'));
         $this->load->database('default');
    }

    public function index()
    { 
         switch ($this->session->userdata('perfil')) {
             case '':                
                 $this->load->view('login_view');
                 break;
             case 'administrador':
                 //$token['token'] = $this->token();                 
                 redirect(base_url().'administrador');                 
                 break;
            case 'cliente':
                //$data['token'] = $this->token();
                //ToDo Cliente redirect
                redirect(base_url().'cliente');
                break;
            case 'profesional':
                //$data['token'] = $this->token();
                //ToDo Profesional redirect               
                break;               
             default:                 
                 $this->load->view('login_view');
                 break; 
         }
    }

    public function new_user()
    {
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');

        //|trim|min_length[2]|max_length[150]|xss_clean MAS CUESTIONES DE SEGURIDAD DE CLAVES

        //lanzamos mensajes de error si es que los hay

         if($this->form_validation->run() == FALSE)
         {
            $this->index();
         }
         else
         {
            $email = $this->input->post('email');
            $password = sha1($this->input->post('password'));           
            $check_user = $this->login_model->login_user($email,$password);
            if($check_user == TRUE)
            {               
                $this->index();
            }
         }

    }

   /* public function token()
     {
         $token = md5(uniqid(rand(),true));
         $this->session->set_userdata('token',$token);
         return $token;
     }
 */
     public function logout()
     {
         $this->session->sess_destroy();
         return redirect(base_url(),'refresh');
     }    

}