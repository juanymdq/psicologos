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
                //recolecta el array de horarios
                $regs = $this->input->post('data');
                //recorre el array para guardar en la bd
                foreach($regs as $registros){
                    $data = array(
                        'id_user' => $registros['id'],
                        'title' => 'Horarios',
                        'start' => $registros['fecha'],
                        'hora' => $registros['hora']
                    );
                    //guarda en la bd
                    $this->calendar_model->insert($data); 
                 
                }
                break;
            case 'eliminar':
                if($this->input->post('id') != null){
                    $id = $this->input->post('id');
                    $this->calendar_model->delete($id);
                }
                break;
            case 'modificar':
                $id = $this->input->post('id');
                $data = array(
                    //'id_user' => $this->input->post('idUser'),                  
                    'title' => $this->input->post('title'),
                    'descripcion' => $this->input->post('descripcion'),
                    'color' => $this->input->post('color'),
                    'textColor' => $this->input->post('textColor'),
                    'start' => $this->input->post('start'),
                    'end' => $this->input->post('end')
                );
                $this->calendar_model->update($id, $data);
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