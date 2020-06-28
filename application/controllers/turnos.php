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
            $this->render_page('turnos/turnos_register_view', $datos);
       
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
//se llama cuando se paga por MP o Pypal
    function redirectmp() {
        if(!empty($_POST['payment_id'])){
            if($_POST['payment_status_detail']=='accredited'){
                $status = 'Pago acreditado';
            }else if($_POST['payment_status_detail']=='pending_waiting_payment'){
                $status = 'Pago por ticket. Pendiente de pago';
            }
            $data = array(
                'id_cliente' => $this->session->userdata('id'),
                'id_horario' => $_POST['id_horario'],     
                'comentarios' => $_POST['comentariosmp'],
                'id_sesion' => $this->session->session_id,
                'payment_id' => $_POST['payment_id'],
                'payment_status' => $status
            );
            switch($_POST['payment_status_detail']){
                case 'accredited':  

                    $idTurno = $this->turnos_model->insert_turno($_POST['id_horario'], $data);   
                    //$this->turnos_model->modifica_disponibilidad_de_horario($_POST['id_turno'],'reservado');
                    $datos['message'] = 'Pago aprobado';                    
                break;
                case 'pending_waiting_payment':
                    $idTurno = $this->turnos_model->insert_turno($_POST['id_horario'], $data);   
                    //$this->turnos_model->modifica_disponibilidad_de_horario($_POST['id_turno'],'reservado');
                    $datos['message'] = 'Pago pendiente';                    
                break;
                case 3:
                    echo "pago rechazado";
                break;
    
            }
            $this->envia_mail($idTurno);
            //$this->render_page('turnos/estadomp', $datos);
           
            $this->render_page('turnos/estadomp', $datos, true);
        }
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

    function envia_mail($idTurno) {
        $datosTurno = $this->turnos_model->find_by_cliente($idTurno);
        $item = array_values($datosTurno)[0];

        if($item['email']<>NULL){
            //configuracion de envio mail
            $config = Array(
                'protocol'  => 'smtp',
                'smtp_host' => 'ssl://smtp.googlemail.com',
                'smtp_port' => '465',
                'smtp_user' => 'juanymdq@gmail.com',
                'smtp_pass' => 'kano0479',
                'set_mailtype'  => 'html',
                'set_header' => 'Content-Type', 'text/html',
                'starttls'  => true,
                'newline'   => "\r\n"
            );
            //cargamos la libreria email
            $this->load->library('email', $config);
        
            $this->email->from('ejemplo@mipagina', 'Juan Fernandez');
            $this->email->to('jifernandez04@hotmail.com');
            
            $this->email->subject('Prueba de envio');

             //enviamos el mail
             $this->email->send();  

            $datos['item'] = $item;
            //llamamos a la vista plantilla mail 
            $this->email->message($this->render_page('turnos/plantilla_mail', $datos, true));                

                
        }else{
            $aviso['error_message'] = 'El mail no se envio';
            $this->render_page('usuarios/forgot_password', $aviso);
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