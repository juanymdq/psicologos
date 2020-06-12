<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class MY_Controller extends CI_Controller {


    public function __construct()
    {

         parent::__construct();         
		 $this->load->helper('url');
		 //cargo la libreria de sesiones
         $this->load->library(array('session','form_validation'));
	}
 
    protected function render_page($view,$data)
    {
       $this->load->view('templates/header', $data);
       $this->load->view($view, $data);
       $this->load->view('templates/footer', $data);
    } 
     
}