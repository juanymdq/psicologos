<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profesional extends CI_Controller {

    public function __construct()
    {
         parent::__construct();
         $this->load->model('profesional_model');  
         $this->load->library(array('session','form_validation'));         
         $this->load->helper(array('url','form'));
         $this->load->database('default');        
    }

    public function acceso_profesionales()
    { 
        $this->load->view('profesionales/profesionales_login_view');
       
    }

    public function horarios() {
        $this->load->view('profesionales/crear_horarios_view');
    }

    public function find_all_eventos() {
        if(isset($_GET['prof'])){
            $id = $_GET['prof'];
            $datos['horarios'] = $this->profesional_model->find_by_prof($id);
            $this->load->view('profesionales/crear_horarios_view', $datos);
        }
    }

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
            $data = array(
                'is_logued_in' => TRUE,
                'id' => $prof->id,              
                'email' => $prof->email,
                'nombre' => $prof->nombre,
                'apellido' => $prof->apellido,
                'matricula' => $prof->matricula,
                'telefono' => $prof->telefono,
                'resenia' => $prof->resenia,
                'autorizado' => $prof->autorizado
             );
            $this->session->set_userdata($data);  
                          
            $this->home_profesionales();
            
         }

    }

    public function accion() {
        
        $accion = (isset($_GET['accion'])) ? $_GET['accion'] : 'Leer' ;

        switch($accion){
            case 'agregar':
                $data = array(
                    'id_profesional' => $this->input->post('id_profesional'),
                    'fecha' => $this->input->post('fecha'),               
                );
                $this->profesional_model->insert_fecha($data);               
                break;
            case 'eliminar':
               
                break;
            case 'modificar':
                
                break;
            default:
                $datos['eventos'] = $this->profesional_model->findAll();
                $this->load->view('profesionales/crear_horarios_view', $datos);
                break;
        }
    }


    public function home_profesionales()
    { 
        $this->load->view('profesionales/profesionales_home_view');
       
    }

    public function profesional_save($id = null) {

        if ($this->input->server('REQUEST_METHOD') == "POST") {

            $this->form_validation->set_rules('nombre', 'Nombre', 'required|min_length[1]|max_length[100]');
            $this->form_validation->set_rules('apellido', 'Apellido', 'required|min_length[1]|max_length[100]');            
            $this->form_validation->set_rules('email', 'email', 'required|valid_email');           
            $this->form_validation->set_rules('telefono', 'Telefono', 'required|numeric|min_length[1]|max_length[20]');            
         
            
            $datos = array(                                           
                'nombre' => $this->input->post("nombre"),
                'apellido' => $this->input->post("apellido"),
                'telefono' => $this->input->post("telefono"),
                'email' => $this->input->post("email"),         
                'resenia' => $this->input->post("resenia"),
                'autorizado' => 'false'
                //perfil' => $perfil
            ); 
                       
            if ($this->form_validation->run()) {
                // nuestro form es valido
                if($id==null){           
                    $id = $this->profesional_model->insert($datos);  
                    $vista = 'profesionales/success_register_view';                                           
                }else{
                    $datos = array(                             
                        'matricula' => $this->input->post("matricula"),
                        'nombre' => $this->input->post("nombre"),
                        'apellido' => $this->input->post("apellido"),
                        'telefono' => $this->input->post("telefono"),
                        'email' => $this->input->post("email"),                      
                        'resenia' => $this->input->post("resenia")
                        //perfil' => $perfil
                    ); 
                    $this->profesional_model->update($id, $datos);
                    $vista = 'profesionales/profesionales_home_view';
                }                   
                //cargamos datos a la sesion de usuario junato al id
                $datos['id'] = $id;
                //$this->session->set_userdata($datos);
                $this->load->view($vista, $datos);

            }else{ //VALIDATION ERRORS
                //$datos['error_message'] = validation_errors();
                $datos['registra'] = true;
                $this->load->view('profesionales/profesionales_login_view', $datos);
            }               
         
        }else{ //SI NO SE REALIZO POST

            if ($id == null) {
                // crear usuario
                $data['nombre'] = "";
                $data['apellido'] = "";
                $data['email'] = "";                
                $data['matricula'] = "";
                $data['telefono'] = "";
                $data['resenia'] = "";
                $data['registra'] = true;
               
            } else {
                // edicion usuario
                $usuarios = $this->usuarios_model->find($id);
                $data['nombre'] = $usuarios->nombre;
                $data['apellido'] = $usuarios->apellido;
                $data['matricula'] = $usuarios->matricula; 
                $data['telefono'] = $usuarios->telefono; 
                $data['email'] = $usuarios->email;                
                $data['resenia'] = $usuarios->resenia;  
                $data['registra'] = false;
                
            }

            $this->load->view('profesionales/profesionales_login_view', $data);
        }
    }

    public function view_all_clients() {
        $datos['query'] = $this->profesional_model->findAll();
        $this->load->view('profesionales/view_clientes', $datos);
    }

    public function user_delete($id = null) {
        if ($id !== null) {
            $this->profesional_model->delete($id);
            echo 1;
        }
    }

    

}