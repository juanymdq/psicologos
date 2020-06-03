<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cliente extends CI_Controller {

    public function __construct()
    {
         parent::__construct();
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
  
}