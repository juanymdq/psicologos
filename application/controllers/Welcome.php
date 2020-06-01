<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
    {
         parent::__construct();         
		 $this->load->helper('url');
		 //cargo la libreria de sesiones
         $this->load->library(array('session','form_validation'));
	}
	
	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function privacidad() {
		$this->load->view('politicas/privacidad_view');
	}
}
