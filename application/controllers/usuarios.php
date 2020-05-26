<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Usuarios extends CI_Controller
{
    public function __construct()
    {       
        parent::__construct();
         //llamo o incluyo el modelo
         $this->load->model('usuarios_model');
         //cargo la libreria de sesiones
         $this->load->library(array('session','form_validation'));
         //llamo al helper url
         $this->load->helper(array('url','form'));
         $this->load->database('default');
    }
    
    //controlador por defecto
    public function index()    
    {        
        //llamo al metodo ver
        //$usuarios['ver']=$this->usuarios_model->ver();
        //cargo la vista usuarios_view
        $this->load->view('usuarios/registro_usuarios');
    }

    public function forgot_password()
    {
        $this->load->view('usuarios/forgot_password');
    }
    
    //CONTROLADOR QUE AGREGA UN USUARIO
    public function add()
    {
         //compruebo si se a enviado submit
        if($this->input->post("submit")){         
            //llamo al metodo add
            $add=$this->usuarios_model->add(
                    $this->input->post("nombre"),
                    $this->input->post("apellido"),
                    $this->input->post("username"),
                    sha1($this->input->post("password")),               
                    $this->input->post("perfil")
                    );
        }
        if($add==true){
            //Sesion de una sola ejecución
            $this->session->set_flashdata('correcto', 'Usuario a&ntilde;adido correctamente');
        }else{
            $this->session->set_flashdata('incorrecto', 'Usuario a&ntilde;adido correctamente');
        }
         
        //redirecciono la pagina a la url por defecto
        redirect(base_url().'usuarios');
    }
       
    //controlador para modificar al que 
    //le paso por la url un parametro
    public function mod($id){
        if(is_numeric($id)){
          $datos["mod"]=$this->usuarios_model->mod($id);
          $datos['idmod'] = $id;
          $this->load->view("usuarios/modificar_view",$datos);
          if($this->input->post("submit")){
                $mod=$this->usuarios_model->mod(
                        $id,
                        $this->input->post("submit"),
                        $this->input->post("username"),
                        sha1($this->input->post("password")),
                        $this->input->post("nombre"),
                        $this->input->post("apellido"),
                        $this->input->post("perfil")
                        );
                if($mod==true){
                    //Sesion de una sola ejecución
                    $this->session->set_flashdata('correcto', 'Usuario modificado correctamente');
                }else{
                    $this->session->set_flashdata('incorrecto', 'Usuario modificado correctamente');
                }
                redirect(base_url().'usuarios');
          }
        }else{
            redirect(base_url().'usuarios'); 
        }
    }
     
    //Controlador para eliminar
    public function eliminar($id){
        if(is_numeric($id)){
          $eliminar=$this->usuarios_model->eliminar($id);
          if($eliminar==true){
              $this->session->set_flashdata('correcto', 'Usuario eliminado correctamente');
          }else{
              $this->session->set_flashdata('incorrecto', 'Usuario eliminado correctamente');
          }
          redirect(base_url().'usuarios');
        }else{
          redirect(base_url().'usuarios');
        }
    }
    
      
        
    
}