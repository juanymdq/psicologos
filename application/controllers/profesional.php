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
    public function horarios() {
        $this->load->view('profesionales/crear_horarios_view');
    }
    

    public function guardar_foto() {
        $datos['imagen_guardada'] = $this->profesional_model->save_picture();
        $this->load->view('profesionales/profesionales_modificar_view',$datos);

    }
    //busca todos los horarios cargado por el profesional
    //y redirige a la vista de crear horarios
    public function find_all_eventos() {       
        if(isset($_GET['prof'])){
            $id = $_GET['prof'];
            $datos['horarios'] = $this->turnos_model->find_by_prof($id);
            $this->load->view('profesionales/crear_horarios_view', $datos);            
        }
    }

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
                        'email' => $prof->pr_email,
                        'nombre' => $prof->pr_nombre,
                        'apellido' => $prof->pr_apellido,
                        'matricula' => $prof->pr_matricula,
                        'telefono' => $prof->pr_telefono,
                        'resenia' => $prof->pr_resenia,
                        'perfil' => $prof->pr_perfil,
                        'autorizado' => $prof->pr_autorizado,
                        'foto' => $prof->pr_foto
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
                $this->load->view('profesionales/profesionales_login_view', $data);
               
            } else {
                // edicion usuario
                $profesional = $this->profesional_model->find($id);
                
                $data['matricula'] = $profesional->matricula; 
                $data['nombre'] = $profesional->pr_nombre;
                $data['apellido'] = $profesional->pr_apellido;                
                $data['telefono'] = $profesional->pr_telefono; 
                $data['email'] = $profesional->pr_email;                
                $data['foto'] = $profesional->pr_foto;  
                $data['resenia'] = $profesional->pr_resenia;
                $data['autorizado'] = $profesional->pr_autorizado;
                $data['registra'] = false;
                $this->load->view('profesionales/profesionales_modificar_view', $data);
            }
            $data['ruta_relativa'] = "<p>
            <a href='".base_url('principal')."'>Inicio</a> > 
            <a href='".base_url('cliente/cpanel')."'>Profesional</a> >
            editar
            </p>";
            $this->render_page('profesionales/profesionales_login_view', $data);
        }
    }



    //muestra todos los clientes de ese profesional
    public function view_all_clients() {
        $datos['query'] = $this->profesional_model->findAll();
        $this->load->view('profesionales/view_clientes', $datos);
    }

    //borra un profesional
    public function user_delete($id = null) {
        if ($id !== null) {
            $this->profesional_model->delete($id);
            echo 1;
        }
    }

    

}