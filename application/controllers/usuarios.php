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
        
    }

//--------------------------------------------------------------------
    public function user_save($id = null) {

        if ($this->input->server('REQUEST_METHOD') == "POST") {

            $this->form_validation->set_rules('nombre', 'Nombre', 'required|min_length[1]|max_length[100]');
            $this->form_validation->set_rules('apellido', 'Apellido', 'required|min_length[1]|max_length[100]');
            $this->form_validation->set_rules('email', 'Email', 'required|min_length[1]|max_length[100]');

            if ($this->form_validation->run()) {
                // nuestro form es valido
                if($id==null){
                    $save = array(
                        'perfil' => 'cliente',
                        'email' => $this->input->post("email"),
                        'password' => sha1($this->input->post("password")),
                        'nombre' => $this->input->post("nombre"),
                        'apellido' => $this->input->post("apellido"),
                    );
                }else{
                    $save = array(
                        'perfil' => 'cliente',
                        'email' => $this->input->post("email"),                        
                        'nombre' => $this->input->post("nombre"),
                        'apellido' => $this->input->post("apellido"),
                    );
                }

                if ($id == null)
                    $id = $this->usuarios_model->insert($save);

                else
                    $this->usuarios_model->update($id, $save);
            }

            //agregamos los datos insertados a la session
            $data = array('id' => $id,
                'nombre' => $this->input->post("nombre"),
                'apellido' => $this->input->post("apellido"),
                'email' => $this->input->post("email"),
                'password' => $this->input->post("password"),
                'perfil' => 'cliente'
            );

            $this->session->set_userdata($data);
            $this->load->view("clientes/cliente_home_view");

        }else{

            if ($id == null) {
                // crear usuario
                $data['nombre'] = "";
                $data['apellido'] = "";
                $data['email'] = "";
                $data['pasword'] = "";
                $data['registra'] = true;
               
            } else {
                // edicion usuario
                $usuarios = $this->usuarios_model->find($id);
                $data['nombre'] = $usuarios->nombre;
                $data['apellido'] = $usuarios->apellido;
                $data['email'] = $usuarios->email;
                //$data['password'] = $usuarios->password;
                $data['registra'] = false;
                
            }

            $this->load->view("usuarios/registro_usuarios", $data);
        }

        
    }

    public function user_delete($id = null) {
        if ($id !== null) {
            $this->usuarios_model->delete($id);
            echo 1;
        }
    }
   
}