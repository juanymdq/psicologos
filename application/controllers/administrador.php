<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Administrador extends CI_Controller {

    public function __construct()
    {
         parent::__construct();
         $this->load->library(array('session','form_validation'));         
         $this->load->helper(array('url','form'));
         $this->load->database('default');        
    }

    public function index()
    { 
        $this->load->view('administrador/administrador_home_view');
       
    }
}