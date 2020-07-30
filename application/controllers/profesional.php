<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profesional extends MY_Controller {

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
        $datos['titulo'] = "Profesional";        
        if(isset($_GET['var'])){
            if($_GET['var']==0){//si va a hacer login
                $datos['registra'] = false;
                $datos['actualiza'] = false;
            }else{//si se va a registrar
                $datos['registra'] = true;
                $datos['actualiza'] = false;
            }
        }else{
            $datos['registra'] = false;
            $datos['actualiza'] = false;
        }
        //$datos['registra'] = false;
        $datos['ruta_relativa'] = "<p><a href='".base_url('principal')."'>Inicio</a> > Acceso Profesional</p>";                       
        $this->render_page('profesionales/profesionales_login_view',$datos);
       
       
    }
    //vista de creacion de horarios
    public function calendario() {
        $datos['titulo'] = 'Calendario';
        $this->load->view('calendar/calendar_view',$datos);
    }
    

    public function guardar_foto() {
        $datos['imagen_guardada'] = $this->profesional_model->save_picture();
        $this->render_page('profesionales/profesionales_modificar_view',$datos);

    }
    //busca todos los horarios cargado por el profesional
    //y redirige a la vista de crear horarios
  /*  public function find_all_eventos($id) {
        
        $datos['horarios'] = $this->turnos_model->find_by_prof($id,0,7);
        $datos['ruta_relativa'] = "<p><a href='".base_url('principal')."'>Inicio</a> > Profesional</p>";
        $this->render_page('profesionales/crear_horarios_view', $datos);
    }*/

    public function find_horarios() { 
        if(!empty($_POST['idProf'])){             
            $id = $_POST['idProf'];
            print_r($id);
            $datos['horarios'] = $this->profesional_model->find_horarios_by_prof($id);              
            $this->load->view('turnos/lista_profesionales_view', $datos);           
        }
    }

    //DIRIGE A LA VISTA DE PANEL DE CONTROL DEL CLIENTE
    public function profesional_cpanel() {
        $datos['titulo'] = "Profesional CPanel";
        $datos['ruta_relativa'] = "<p><a href='".base_url('principal')."'>Inicio</a> > Profesional</p>";
        $this->render_page('profesionales/profesionales_home_view', $datos);        
    }

    //login de profesionales
    public function login_profesionales()
    {
        //si ya esta logueado, redirige al panel de control
        if($this->session->userdata("pr_nombre")!=null){
            $datos['titulo'] = "Profesional CPanel";
            $this->render_page('profesionales/profesionales_home_view', $datos);        
        }else{
            $this->form_validation->set_rules('email', 'email', 'required|valid_email');           
            $this->form_validation->set_rules('password', 'password', 'required');

            if($this->form_validation->run() == FALSE)
            {
                $this->index();
            }
            else
            {
                $email = $this->input->post('email');
                $password = $this->input->post('password');      
                //carga todos los datos del profesional un un asesion
                $prof = $this->profesional_model->login_prof($email,$password);
                if($prof!=null){
                    $data = array(
                        'is_logued_in' => TRUE,
                        'id' => $prof->id,              
                        'pr_email' => $prof->pr_email,
                        'pr_nombre' => $prof->pr_nombre,
                        'pr_apellido' => $prof->pr_apellido,
                        'pr_matricula' => $prof->pr_matricula,
                        'pr_telefono' => $prof->pr_telefono,
                        'pr_resenia' => $prof->pr_resenia,
                        'perfil' => $prof->pr_perfil,
                        'pr_autorizado' => $prof->pr_autorizado,
                        'pr_foto' => $prof->pr_foto
                    );
                    $this->session->set_userdata($data);  
                    
                    $this->profesional_cpanel();                    
                }else{                    
                    $data['message'] = 'Error en los datos. Por favor, inente nuevamente';
                    $this->session->set_userdata($data);
                    $this->index();                
                }
                
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        return redirect(base_url(),'refresh');
    } 
    
    //ABM profesionales
    public function profesional_save($id = null) {

        if ($this->input->server('REQUEST_METHOD') == "POST") {

            $this->form_validation->set_rules('matricula', 'Matricula', 'required|numeric|min_length[1]|max_length[20]');            
            $this->form_validation->set_rules('nombre', 'Nombre', 'required|min_length[1]|max_length[100]');
            $this->form_validation->set_rules('apellido', 'Apellido', 'required|min_length[1]|max_length[100]');            
            $this->form_validation->set_rules('email', 'email', 'required|valid_email');           
            $this->form_validation->set_rules('telefono', 'Telefono', 'required|numeric|min_length[1]|max_length[20]');            
            $this->form_validation->set_rules('resenia', 'Resenia', 'required');
            /*if($id==null){//si esta registrando   
                $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[100]');
                $this->form_validation->set_rules('confirm_password', 'Confirmar Password', 'required|min_length[6]|max_length[100]');              
            }*/
            $datos = array(     
                'pr_matricula' => $this->input->post("matricula"),                                      
                'pr_nombre' => $this->input->post("nombre"),
                'pr_apellido' => $this->input->post("apellido"),
                'pr_telefono' => $this->input->post("telefono"),
                'pr_email' => $this->input->post("email"),         
                'pr_resenia' => $this->input->post("resenia"),                
                'pr_perfil' => 'profesional',                
                'pr_autorizado' => 'false',
                'pr_calificacion' => 0             
            ); 
            if($id == null){
                $datos['pr_foto'] = '';
            }else{
                $datos['pr_foto'] = $this->input->post("foto");
            }

            if($id==null){//id==null: registro de cliente - id<>null: modificacion cliente 
                //verificacion de passwords iguales               
                if ($this->form_validation->run()) {// nuestro form es valido                       
                    //si registra   
                    //Agregamos la pass al array $datos para guardar                       
                    //$datos['password'] = $this->input->post("password");                       
                    //TODO. cambiar linea de guardado de pass como SHA1
                    //$datos['password'] = sha1($this->input->post("password"));
                    $id = $this->profesional_model->insert($datos); 
                    $datos['id'] = $id;
                    $datos['message'] = "Bienvenido a nuestro sitio de terapia virtual.".
                    $this->session->set_userdata($datos);     
                    $datos['ruta_relativa'] = "<p><a href='".base_url('principal')."'>Inicio</a> > Resgistro Exitoso</p>";              
                    $this->render_page('profesionales/success_register_view', $datos);  
                }else{ //VALIDATION ERRORS
                    //$datos['error_message'] = validation_errors();
                    $datos['registra'] = true;
                    $datos['actualiza'] = false; 
                    $datos['ruta_relativa'] = "<p><a href='".base_url('principal')."'>Inicio</a> > Acceso Profesional</p>";                       
                    $this->render_page('profesionales/profesionales_login_view', $datos);
                }                             
            }else{//MODIFICACION DE DATOS
                if ($this->form_validation->run()) {// nuestro form es valido    
                    //si modifica                
                    $this->profesional_model->update($id, $datos);
                    $datos['id'] = $id;
                    $datos['message'] = "Los datos se modificaron correctamente".
                    $this->session->set_userdata($datos);
                    $datos['ruta_relativa'] = "<p><a href='".base_url('principal')."'>Inicio</a> > Profesional</p>";           
                    $this->render_page('profesionales/profesionales_home_view', $datos); 
                }else{ //VALIDATION ERRORS
                    //$datos['error_message'] = validation_errors();
                    $datos['actualiza'] = true;
                    $datos['registra'] = false;
                    $datos['ruta_relativa'] = "<p>
                    <a href='".base_url('principal')."'>Inicio</a> > 
                    <a href='".base_url('profesional/cpanel')."'>Profesional</a> >
                    editar
                    </p>";
                    $this->render_page('profesionales/profesionales_login_view', $datos);
                }    
            }        
        }else{ //SI NO SE REALIZO POST

            if ($id == null) {
                // crear usuario
                $data['matricula'] = "";
                $data['nombre'] = "";
                $data['apellido'] = "";
                $data['email'] = "";                
                $data['matricula'] = "";
                $data['telefono'] = "";
                $data['resenia'] = "";
                $data['registra'] = true;
                $this->render_page('profesionales/profesionales_login_view', $data);
               
            } else {
                // edicion usuario
                $profesional = $this->profesional_model->find($id);
                $item = array_values($profesional)[0];
                $data['matricula'] = $item->pr_matricula; 
                $data['nombre'] = $item->pr_nombre;
                $data['apellido'] = $item->pr_apellido;                
                $data['telefono'] = $item->pr_telefono; 
                $data['email'] = $item->pr_email;                
                $data['foto'] = $item->pr_foto;  
                $data['resenia'] = $item->pr_resenia;
                $data['autorizado'] = $item->pr_autorizado;
                $data['registra'] = false;
                $data['ruta_relativa'] = "<p>
                <a href='".base_url('principal')."'>Inicio</a> > 
                <a href='".base_url('profesional/cpanel')."'>Profesional</a> >
                editar
                </p>";
                $this->render_page('profesionales/profesionales_modificar_view', $data);
            }
            /*
            $data['ruta_relativa'] = "<p>
            <a href='".base_url('principal')."'>Inicio</a> > 
            <a href='".base_url('cliente/cpanel')."'>Profesional</a> >
            editar
            </p>";
            $this->render_page('profesionales/profesionales_login_view', $data);*/
        }
    }

    //Accede al formulario para cambiar pass. Pide email
    function forgot_password() {
        $datos['titulo'] = "Restablecer Contraseña";
        $this->render_page('usuarios/forgot_password', $datos);
    }  

    //muestra todos los clientes de ese profesional
    public function view_all_clients() {
        $datos['query'] = $this->profesional_model->findAll();
        $this->load->view('profesionales/view_clientes', $datos);
    }

    //obtiene los turnos pendientes de un profesional
    function getTurnos($id) {
        if($this->profesional_model->getAllTurnos($id)){
            $datos['turnos'] = $this->profesional_model->getAllTurnos($id);
        }else{
            //significa que no hay turnos registrados para este profesional
            $datos['turnos'] = 0;
        }
        $datos['ruta_relativa'] = "<p>
        <a href='".base_url('principal')."'>Inicio</a> > 
        <a href='".base_url('profesional/cpanel')."'>Profesional</a> >
        Turnos Pendientes
        </p>";
        $this->render_page('profesionales/turnos_pendientes_view', $datos);
    }
    //deriva a la pantalla de videollamadas
    function goVideoCall($id) {
        $datos['call'] = $id;
        if($this->session->userdata('perfil')=='profesional'){
            $datos['ruta_relativa'] = "<p>
            <a href='".base_url('principal')."'>Inicio</a> > 
            <a href='".base_url('profesional/cpanel')."'>Profesional</a> >
            <a href='".base_url('profesional/turnos_pendientes/'.$this->session->userdata('id'))."'>Turnos Pendientes</a> >
            Videollamada
            </p>";
        }else{
            $datos['ruta_relativa'] = "<p>
            <a href='".base_url('principal')."'>Inicio</a> > 
            <a href='".base_url('cliente/cpanel')."'>Cliente</a> >
            <a href='".base_url('cliente/mis_turnos/'.$this->session->userdata('id'))."'>Mis Turnos</a> >
            Videollamada
            </p>";
        }
        $this->load->view('profesionales/videollamada_view', $datos);
    }

    //borra un profesional
    public function user_delete($id = null) {
        if ($id !== null) {
            $this->profesional_model->delete($id);
            echo 1;
        }
    }

    

}