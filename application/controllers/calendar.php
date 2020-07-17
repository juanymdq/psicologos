<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Calendar extends MY_Controller {

    public function __construct()
    {
         parent::__construct();
         $this->load->library(array('session','form_validation'));         
         $this->load->helper(array('url','form'));
         $this->load->model('calendar_model');
    }

    public function index() { 
        $datos['titulo'] = 'Calendario';
        $this->render_page('calendar/calendar_view', $datos);
       
    }

    public function find_all_eventos($id) {       
        $datos['eventos'] = $this->calendar_model->find_by_user($id);
        $datos['horarios'] = $this->calendar_model->find_horarios_by_user($id);
        $this->render_page('calendar/calendar_view', $datos);       
    }

    public function accion() {
        
        $accion = (isset($_GET['accion'])) ? $_GET['accion'] : 'Leer' ;
       
        switch($accion){
            case 'agregar':            
                    $data = array(
                        'id_user' => $this->input->post('id'),
                        'title' => $this->input->post('hora'),
                        'start' => $this->input->post('fecha'),
                        'hora' => $this->input->post('hora'),
                        'display' => $this->input->post('display'),
                        'color' => $this->input->post('color')
                    );
                    //guarda en la bd
                    $this->calendar_model->insert($data);                  
                
                break;
            case 'eliminar':
                if($this->input->post('id') != null){
                    $id = $this->input->post('id');
                    $this->calendar_model->delete($id);
                }
                break;           
            case 'buscar':
                $fecha = $this->input->post('fecha');
                
                //$datos['horas'] = $this->calendar_model->find_horas_by_fecha($fecha);
                
                $this->calendar_model->find_horas_by_fecha($fecha);
                //$this->render_page('calendar/calendar_view', $datos);
            break;
          /*  default:
                $datos['eventos'] = $this->calendar_model->findAll();               
                $this->render_page('calendar/calendar_view', $datos);
                break;*/
        }
      //  $datos['eventos'] = $this->calendar_model->find_by_user($this->session->userdata('id'));               
      //  $this->render_page('calendar/calendar_view', $datos);
    }
}