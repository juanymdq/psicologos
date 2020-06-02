<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Calendar extends CI_Controller {

    public function __construct()
    {
         parent::__construct();
         $this->load->library(array('session','form_validation'));         
         $this->load->helper(array('url','form'));
         $this->load->model('calendar_model');
    }

    public function index() { 
        $this->load->view('calendar/calendar_view');
       
    }

    public function find_all_eventos() {
        $datos['datos_calendar'] = $this->calendar_model->findAll();
        $this->load->view('calendar/calendar_view', $datos);
    }
}