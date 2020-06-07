<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Turnos extends CI_Controller {

    public function __construct()
    {
         parent::__construct(); 
         $this->load->model('profesional_model');
         $this->load->model('turnos_model');
         $this->load->library(array('session','form_validation'));         
         $this->load->helper(array('url','form'));
         $this->load->database('default');        
    }

    public function index()
    { 
       $datos['profesionales'] = $this->profesional_model->findAll();       
       $this->load->view('turnos/lista_profesionales_view', $datos);
       
    }  

    public function ver_horarios() {
        if(!empty($_GET['id'])){
            $id = $_GET['id'];
            $datos['horarios'] = $this->turnos_model->find_by_prof($id);
            $this->load->view('turnos/horarios_view', $datos);
        }
    }

    //realiza acciones sobre los horarios, Agreagar y eliminar
    public function accion() {
        
        $accion = (isset($_GET['accion'])) ? $_GET['accion'] : 'Leer' ;

        switch($accion){
            case 'agregar':
                $f = $this->input->post('fecha');
                $fecha = $this->fecha($f);
                $data = array(
                    'id_profesional' => $this->input->post('id_profesional'),
                    'fecha' => $this->input->post('fecha'),
                    'fecha_string' => $fecha            
                );
                $this->turnos_model->insert_fecha($data);               
                break;
            case 'eliminar':
                $id = $this->input->post("id");
                $this->turnos_model->delete_horarios($id);
                break;            
            default:
                $datos['eventos'] = $this->profesional_model->findAll();
                $this->load->view('profesionales/crear_horarios_view', $datos);
                break;
        }
    }

    //funcion para agregar la fecha formato string
    function fecha($fecha) {
        $fechahora = explode(" ", $fecha);
        //-----Hora-----------------
        $temphora = explode(":", $fechahora[1]);
        $hora = $temphora[0].':'.$temphora[1];
        //-------------------------------
        $d = new DateTime($fechahora[0]);
        //numero de dia de la semana 1: lunes
        $ndiasemana = $d->format('N');                             
        //numero de mes
        $nmes = $d->format('m');
        //numero de dia
        $ndia = $d->format('d');   
          
        switch($nmes){
            case 1: 
                $textmes = 'Enero';
            break;
            case 2: 
                $textmes = 'Febrero';
            break;
            case 3: 
                $textmes = 'Marzo';
            break;
            case 4: 
                $textmes = 'Abril';
            break;
            case 5: 
                $textmes = 'Mayo';
            break;
            case 6: 
                $textmes = 'Junio';
            break;
            case 7: 
                $textmes = 'Julio';
            break;
            case 8: 
                $textmes = 'Agosto';
            break;
            case 9: 
                $textmes = 'Septiembre';
            break;
            case 10: 
                $textmes = 'Octubre';
            break;
            case 11: 
                $textmes = 'Noviembre';
            break;
            case 12: 
                $textmes = 'Diciembre';
            break;
        }
        switch($ndiasemana){
            case 1:
                $textsemana = 'Lunes';
             break;
             case 2:
                $textsemana = 'Martes';
             break;
             case 3:
                $textsemana = 'Miércoles';
             break;
             case 4:
                $textsemana = 'Jueves';
             break;
             case 5:
                $textsemana = 'Viernes';
             break;
             case 6:
                $textsemana = 'Sábado';
             break;
             case 7:
                $textsemana = 'Domingo';
             break;
        }
        return $textsemana .' '. $ndia . ' de '. $textmes . ' ' . $hora; 
    }

}