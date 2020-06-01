<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profesional extends CI_Controller {

    public function __construct()
    {
         parent::__construct();
         $this->load->library(array('session','form_validation'));         
         $this->load->helper(array('url','form'));
         $this->load->database('default');        
    }

    public function acceso_profesionales()
    { 
        $this->load->view('profesionales/profesionales_login_view');
       
    }

    public function home_profesionales()
    { 
        $this->load->view('profesionales/profesionales_home_view');
       
    }

}