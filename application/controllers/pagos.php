<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Pagos extends CI_Controller
{
    
    public function __construct()
    {       
        parent::__construct();

        $this->load->model('pagos_model');
         //llamo o incluyo el modelo                
         //cargo la libreria de sesiones
         $this->load->library(array('session','form_validation'));
         //llamo al helper url
         $this->load->helper(array('url','form'));        

        
    }

    public function index() {
        
        $this->load->view('pagos/pagos_home_view');
    }

    public function checkout(){
        return $this->pagos_model->payment_mode();

    }

}
