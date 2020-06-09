<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cliente extends CI_Controller {

    public function __construct()
    {
         parent::__construct();
         $this->load->model('turnos_model');
         $this->load->library(array('session','form_validation'));         
         $this->load->helper(array('url','form'));
         $this->load->database('default');        
    }

    public function acceso_clientes()
    { 
        $this->load->view('clientes/clientes_login_view');
       
    }

    public function home_clientes()
    { 
        $this->load->view('clientes/cliente_home_view');
       
    }

    public function registro_cliente()    
    { 
        if(!empty($_GET['id'])){
            $id = $_GET['id'];
            //busca el horario seleccionado y los datos del profesional
            $datos['horario'] = $this->turnos_model->find_one_horario($id);
            $this->load->view('clientes/cliente_register_view', $datos);
       
        }
    }
  
}