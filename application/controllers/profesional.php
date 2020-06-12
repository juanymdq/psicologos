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
        $datos['titulo'] = "Porfesional";
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
    //login de profesionales
    public function login_profesionales()
    {
        $this->form_validation->set_rules('email', 'email', 'required|valid_email');           
        $this->form_validation->set_rules('password', 'password', 'required');

        if($this->form_validation->run() == FALSE)
         {
            $this->acceso_profesionales();
         }
         else
         {
            $email = $this->input->post('email');
            $password = $this->input->post('password');      
            //$perfil = $this->input->post('perfil');
            $prof = $this->profesional_model->login_prof($email,$password);
            if($prof!=null){
                $data = array(
                    'is_logued_in' => TRUE,
                    'id' => $prof->id,              
                    'email' => $prof->email,
                    'nombre' => $prof->nombre,
                    'apellido' => $prof->apellido,
                    'matricula' => $prof->matricula,
                    'telefono' => $prof->telefono,
                    'resenia' => $prof->resenia,
                    'perfil' => $prof->perfil,
                    'autorizado' => $prof->autorizado
                );
                $this->session->set_userdata($data);  
                            
                $this->home_profesionales();
            }else{
                $datos['error_message'] = "Datos Incorrectos - intente nuevamente";
                $this->load->view('profesionales/profesionales_login_view', $datos);
            }
            
         }

    }

    public function logout()
    {
        $this->session->sess_destroy();
        return redirect(base_url(),'refresh');
    } 
    
    //c panel de profesionales
    public function home_profesionales()
    { 
        $this->load->view('profesionales/profesionales_home_view');
       
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
            
            $datos = array(     
                'matricula' => $this->input->post("matricula"),                                      
                'nombre' => $this->input->post("nombre"),
                'apellido' => $this->input->post("apellido"),
                'telefono' => $this->input->post("telefono"),
                'email' => $this->input->post("email"),         
                'resenia' => $this->input->post("resenia"),
                'foto' => $this->input->post('foto'),
                'perfil' => 'profesional',                
                'autorizado' => 'false'
                //perfil' => $perfil
            ); 
                       
            if ($this->form_validation->run()) {
                // nuestro form es valido
                if($id==null){           
                    $id = $this->profesional_model->insert($datos);  
                    $vista = 'profesionales/success_register_view';                                           
                }else{
                    $this->profesional_model->update($id, $datos);
                    $datos['aviso_message'] = "El perfil ha sido modificado";
                    $vista = 'profesionales/profesionales_home_view';
                }                   
                //cargamos datos a la sesion de usuario junato al id
                $datos['id'] = $id;
                //$this->session->set_userdata($datos);
                $this->load->view($vista, $datos);

            }else{ //VALIDATION ERRORS                
                if($this->input->post("registra")){
                    $datos['registra'] = true;
                    $this->load->view('profesionales/profesionales_login_view', $datos);
                }else{
                    $datos['registra'] = false;
                    $this->load->view('profesionales/profesionales_modificar_view', $datos);
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
                $data['nombre'] = $profesional->nombre;
                $data['apellido'] = $profesional->apellido;                
                $data['telefono'] = $profesional->telefono; 
                $data['email'] = $profesional->email;                
                $data['foto'] = $profesional->foto;  
                $data['resenia'] = $profesional->resenia;
                $data['autorizado'] = $profesional->autorizado;
                $data['registra'] = false;
                $this->load->view('profesionales/profesionales_modificar_view', $data);
            }

           
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