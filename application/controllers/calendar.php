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
        $datos['eventos'] = $this->calendar_model->findAll();
        $this->load->view('calendar/calendar_view', $datos);
    }

    public function accion() {
        
        $accion = (isset($_GET['accion'])) ? $_GET['accion'] : 'Leer' ;

        switch($accion){
            case 'agregar':
                $data = array(
                    'title' => $this->input->post('title'),
                    'descripcion' => $this->input->post('descripcion'),
                    'color' => $this->input->post('color'),
                    'textColor' => $this->input->post('textColor'),
                    'start' => $this->input->post('start'),
                    'end' => $this->input->post('end')
                );
                $this->calendar_model->insert($data);                
                break;
            case 'eliminar':
                echo "Instruccion eliminar";
                break;
            case 'modificar':
                echo "Instruccion modificar";
                break;

            default:
                $datos['eventos'] = $this->calendar_model->findAll();
                $this->load->view('calendar/calendar_view', $datos);
                break;
        }
    }
}