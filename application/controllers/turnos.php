<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Turnos extends MY_Controller {

    public function __construct()
    {
         parent::__construct(); 
         $this->load->model('profesional_model');
         $this->load->model('turnos_model');
         $this->load->model('Cliente_model');
         $this->load->library(array('session','form_validation'));         
         $this->load->helper(array('url','form'));
         $this->load->database('default');   
             
    }

    //busca todos los profesionales aceptados
    public function index()
    {   
        $datos['profesionales'] = $this->profesional_model->findAll();     
        $this->render_page('turnos/lista_profesionales_view',$datos);
      
    }  

    //busca todos los horarios de un profesional y los datos del mismo
    public function ver_horarios() {
        if(!empty($_GET['id'])){
            $id = $_GET['id'];
            //busca todos los horarios del profesional
            $datos['horarios'] = $this->turnos_model->find_by_prof($id);
            //busca el profesional segun id
            $datos['prof'] = $this->profesional_model->find($id);
            $this->render_page('turnos/horarios_view', $datos);
        }
    }
   /*
    public function ver_horarios_limit() { 
        if(!empty($_GET['id'])){
            $id = $_GET['id'];      
            $datos['fechas_limit'] = $this->turnos_model->find_by_prof_limit($id);
            $this->render_page('turnos/horarios_view', $datos);
        }       
    }
    */
    public function turno_cliente()    
    { 
        if(!empty($_GET['id'])){
            $id = $_GET['id'];            
            //busca el horario seleccionado y los datos del profesional           
            $datos['horario'] = $this->turnos_model->find_one_horario($id);
            //$this->render_page('turnos/turno_register_view', $datos);
            $this->render_page('turnos/pruebaregister', $datos);
       
        }
    }

    public function guardar_turno() {
        $data = array (
        'id_horario' => $this->input->post('id_turno'),
        'id_cliente' => $this->session->userdata('id'),
        'comentarios' => $this->input->post('comentarios')        
        );
        if($this->turnos_model->insert_turno_temporal($data) != null){
            $datos['horario'] = $this->turnos_model->find_one_horario($this->input->post('id_turno'));
            $this->render_page('turnos/turno_register_pago_view', $datos);          
        }
    }


    function success_checkout() {
        $datos['datos'] = "se guardo";
        $this->render_page('turnos/success_checkout_view', $datos);
    }
    //realiza acciones sobre los horarios, Agreagar y eliminar
    public function accion() {
        
        $accion = (isset($_GET['accion'])) ? $_GET['accion'] : 'Leer' ;

        switch($accion){
            case 'agregar':
                $f = $this->input->post('fecha');
                $id_prof = $this->input->post('id_profesional');
                $fecha = $this->fecha($f);
                $data = array(
                    'id_profesional' => $id_prof,
                    'fecha' => $this->input->post('fecha'),
                    'fecha_string' => $fecha,
                    'estado' => 'disponible'          
                );
                if($this->turnos_model->insert_fecha($data) != null){
                    $datos['horarios'] = $this->turnos_model->find_by_prof($id_prof);
                    $this->load->view('profesionales/crear_horarios_view', $datos);     
                }
                break;
            case 'eliminar':
                $id_prof = $this->input->post('id_profesional');                
                $id = $this->input->post('id');
                $ar = $this->turnos_model->delete_horarios($id);                
                //$ar=1 significa que elimino el registro
                if($ar!=null){
                    $datos['horarios'] = $this->turnos_model->find_by_prof($id_prof);                    
                }else{
                    $datos['error_message'] = "No se pudo eliminar el registro";
                }
                $this->load->view('profesionales/crear_horarios_view', $datos);     
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
        $anio = $d->format('Y');
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
        return $textsemana .', '. $ndia . ' de '. $textmes . ' de ' .$anio. ', ' . $hora; 
    }

}