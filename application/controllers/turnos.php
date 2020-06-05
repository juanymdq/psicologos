<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Turnos extends CI_Controller {

    public function __construct()
    {
         parent::__construct(); 
         $this->load->model('profesional_model');
         $this->load->library(array('session','form_validation'));         
         $this->load->helper(array('url','form'));
         $this->load->database('default');        
    }

    public function index()
    { 
        $datos['query'] = $this->profesional_model->findAll();
        $this->load->view('turnos/lista_profesionales_view', $datos);
       
    }
}