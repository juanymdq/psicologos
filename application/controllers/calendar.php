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
        $this->render_page('calendar/calendar_view', $datos);       
    }

    public function accion() {
        
        $accion = (isset($_GET['accion'])) ? $_GET['accion'] : 'Leer' ;
       
        switch($accion){
            case 'agregar':

               
                $datos['data'] = $this->input->post('data');
                $this->render_page('calendar/calendar_view', $datos);
               
               /* $data = array(
                    'id_user' => $this->input->post('id_user'),
                    'fecha' => $this->input->post('fecha'),
                    
                );*/

               
                //$this->calendar_model->insert($data);               
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
            default:
                //$datos['eventos'] = $this->calendar_model->findAll();               
                //$this->render_page('calendar/calendar_view', $datos);
                break;
        }
    }
}