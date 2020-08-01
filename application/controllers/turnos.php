<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require 'vendor/autoload.php';

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
    {   $datos['ruta_relativa'] = "<p>
        <a href='".base_url('principal')."'>Inicio</a> > 
        <a href='".base_url('cliente/cpanel')."'>Cliente</a> >
        Lista de Profesionales
        </p>";
        $datos['profesionales'] = $this->profesional_model->findAll();     
        $this->render_page('turnos/lista_profesionales_view',$datos);
      
    }  
  
    public function turno_cliente($id)    
    {               
        //busca el horario seleccionado y los datos del profesional           
        $turnos = $this->turnos_model->find_one_horario($id);
        $datos['horario'] = $turnos;
        
        $item = array_values($turnos)[0];
        $fecha = $item['start']." ".$item['hora'];
        $datos['fecha_string'] = $this->fecha($fecha);
        $id = $item['id'];
        //$route['cliente/cpanel'] = 'Cliente/cliente_cpanel';
        //$route['cliente/listar_profesionales'] = 'Turnos';
        //$route['profesional/calendario_de_horarios/(:any)'] = 'calendar/find_all_eventos/$1';
        //$this->render_page('turnos/turno_register_view', $datos);
        $datos['ruta_relativa'] = "<p>
            <a href='".base_url('principal')."'>Inicio</a> > 
            <a href='".base_url('cliente/cpanel')."'>Cliente</a> >
            <a href='".base_url('cliente/listar_profesionales')."'>Lista de Profesionales</a> >
            <a href='".base_url('profesional/calendario_de_horarios/'.$id)."/0'>Horarios de profesional</a> >
            Datos del turno
            </p>";
        $this->render_page('turnos/turnos_register_view', $datos);
    }

    public function guardar_turno() {
        $data = array (
        'id_horario' => $this->input->post('id_evento'),
        'id_cliente' => $this->session->userdata('id'),
        'comentarios' => $this->input->post('comentarios')        
        );
        if($this->turnos_model->insert_turno_temporal($data) != null){
            $datos['horario'] = $this->turnos_model->find_one_horario($this->input->post('id_turno'));
            $this->render_page('turnos/turno_register_pago_view', $datos);          
        }
    }

    //guarda el token de la videollamada en la tabla turnos
    function actualizaToken() {
        $id = $this->input->post('id');
        $token = $this->input->post('token');
        $data = array('token_id' => $token);
        $this->turnos_model->updateToken($id,$data);
    }
    /*
https://www.sandbox.paypal.com/webapps/hermes?
flow=1-P&ulReturn=true&
token=1BU18164465484626&
routingFromXOR=true&
useraction=commit&
flowType=WPS#/checkout/done
*/

    //SE LLAMA CUANDO SE PAGA POR PAYPAL
    function redirectpaypal() {
        //&& (!empty($_POST['payerID'])) && (!empty($_POST['paymentToken']))
        if(!empty($_POST['paymentID'])) {           
            //se genera token para usar en videollamada
            $token = '#'.rand(1,10000000000000000);
             //generamos array para guardar en bd
            $data = array(
                'id_cliente' => $this->session->userdata('id'),
                'id_horario' => $_POST['id_horario'],     
                'comentarios' => $_POST['comentariospp'],
                'token_id' => $token,
                'payment_id' => $_POST['paymentID'],
                'payment_status' => 'Pagado via Paypal',
                'merchant_order' => '1'
            );
            $datos['payment_message'] = 'Pago vía Paypal aprobado';
            $idTurno = $this->turnos_model->insert_turno($_POST['id_horario'], $data);
            ($this->envia_mail($idTurno)) ?
            $datos['message_advice'] = "El turno se agendó correctamente. Se envio un mail con los detalles del mismo"
            : $datos['message_advice'] = "El turno se agendó correctamente pero el mensaje no pudo ser enviado por mail";
           
            $this->render_page('turnos/estadomp', $datos, true);
        }else{
            //TODO: el pago no pudo ser completado
        }
    }

//se llama cuando se paga por MP
    function redirectmp() {
        $idh = $_POST['id_horario'];
        $coments = $_POST['comentariosmp'];
        $payment_id = $_POST['payment_id'];
        $merchant_order = $_POST['merchant_order'];        
        //verificamos que exista el payment
        if(!empty($_POST['payment_id'])){
            if($_POST['payment_status_detail']=='accredited'){
                $status = 'Pago acreditado';
            }else if($_POST['payment_status_detail']=='pending_waiting_payment'){
                $status = 'Pago por ticket. Pendiente de pago';
            }
              //se genera token para usar en videollamada
            $token = '#'.rand(1,10000000000000000);
            //generamos array para guardar en bd
            $data = array(
                'id_cliente' => $this->session->userdata('id'),
                'id_horario' => $idh,     
                'comentarios' => $coments,
                'token_id' => $token,
                'payment_id' => $payment_id,
                'payment_status' => $status,
                'merchant_order' => $merchant_order
            );
            switch($_POST['payment_status_detail']){
                case 'accredited':  
                    $idTurno = $this->turnos_model->insert_turno($idh, $data);   
                    //$this->turnos_model->modifica_disponibilidad_de_horario($_POST['id_turno'],'reservado');
                    $datos['payment_message'] = '¡Listo! Se acreditó tu pago. En tu resumen verás el cargo de '.$_POST['amount'].' como '.$_POST['statement_descriptor'];
                    //$datos['payment_message'] = 'Pago vía Mercadopago aprobado';                    
                    $this->render_page('turnos/estadomp', $datos, true);
                break;
                case 'pending_waiting_payment':
                    $idTurno = $this->turnos_model->insert_turno($idh, $data);   
                    $this->turnos_model->modifica_disponibilidad_de_horario($_POST['id_turno'],'reservado');
                    $datos['payment_message'] = 'Pago vía Mercadopago pendiente';
                    //LINEA DE PRUEBA PARA PAGOS PRESENCIALES
                    //header("location: ".base_url('turnos/ipn')."?topic=payment&id=".$payment_id);
                    $this->render_page('turnos/estadomp', $datos, true);                    
                break;
                case 'cc_rejected_call_for_authorize':
                    $datos['payment_message'] = 'Debes autorizar ante '.$_POST['payment_method_id'].' el pago de '.$_POST['amount'];
                    $this->render_page('cliente/cpanel', $datos, true);                    
                break;
    
            }
            ($this->envia_mail($idTurno)) ?
            $datos['message_advice'] = "El turno se agendó correctamente. Se envio un mail con los detalles del mismo"
            : $datos['message_advice'] = "El turno se agendó correctamente pero el mensaje no pudo ser enviado por mail";
                      
        }
    }    

    //notificaciones de pago de mercadopago para pagos presenciales (rapipago)
    function ipn() {
        $datos['payment_message'] = 'Notificacion IPN'; 
        //$_GET['merchant_order'] viene de ipn.php
        if(!empty($_GET['merchant_order'])) {
            $resultMerchant = $this->turnos_model->find_by_merchant_order($_GET['merchant_order']);
            $item = array_values($resultMerchant)[0];
            $data = array('status' => $_GET['status']);
            $this->turnos_model->update_status_turno($item['id'],$data);
            //TODO: VERIFICAR HACIA DONDE SE REDIRIGE LUEGO DE MODIFICAR EL CAMPO STATUS DE LA 
            //TODO: TABLA TURNOS
        }else{//redirige a la pagina ipn.php para recibir las notificaciones del pago presencial
        $this->render_page('turnos/ipn', $datos, true);       
        }
    }  
    public function envia_mail($idTurno) {
        
        $datosTurno = $this->turnos_model->find_by_cliente($idTurno);
        
        if(!empty($datosTurno)){            
            $item = array_values($datosTurno)[0];        

            if($item['email']<>NULL){
                
                
                $mail = new PHPMailer();
                //Server settings 
                    
                $mail->isSMTP();                                            // Send using SMTP
                $mail->Host       = 'ssl://smtp.googlemail.com';                    // Set the SMTP server to send through
                $mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                //TODO: colocar email y pass SMTPs                                  // Enable SMTP authentication
                $mail->Username   = 'user@mail.com';                     // SMTP username
                $mail->Password   = '*******';                               // SMTP password
                
                //Recipients
                $mail->Charset = PHPMailer::CHARSET_UTF8;
                $mail->setFrom('from@example.com', 'Terapia Virtual');
                $mail->addAddress('addressmail@mail.com', 'Juan');     // Add a recipient
                if(!empty($datosTurno)){        
                    $item = array_values($datosTurno)[0];
                }else{
                    
                }
                // Set email format to HTML
                $mail->isHTML(true);
                $asunto = 'Terapia virtual - Confirmación de turno';
                $fecha = $item['start']." ".$item['hora'];
                $fecha_string = $this->fecha($fecha);
                $bodyc = "
                <html>
                    <head>
                                 
                    </head>
                    <body>                
                        <p>Cliente: ".$item['apellido'].", &nbsp;". $item['nombre']."</p>
                        <p>Profesional: ".$item['pr_apellido'].", &nbsp;". $item['pr_nombre']."</p>
                        <p>Fecha de turno: ".$fecha_string."</p>
                        <p>Estado de pago de la sesion: ".$item['payment_status']."</p>                        
                    </body>
                </html>";
                $bodyCont=utf8_decode($bodyc);
                $contenido=utf8_decode($asunto);                                 
                $mail->Subject = $contenido;
                $mail->Body    = $bodyCont;
            
                return $mail->send();             
            }
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

    //funcion para agregar la fecha formato string
    function fecha_cliente_turnos_view() {

        $fechahora = $this->input->post('fecha');
        //-----Hora-----------------
       // $temphora = explode(":", $fechahora[1]);
        $hora = $this->input->post('hora');
        //-------------------------------
        $d = new DateTime($fechahora);
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
        echo $textsemana .', '. $ndia . ' de '. $textmes . ' de ' .$anio. ', ' . $hora; 
    }

}