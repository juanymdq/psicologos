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
                $data['registra'] = false;
                
            }

            $this->load->view("usuarios/registro_usuarios", $data);
        }
    }

    public function sendMail()
    {
        $email = $this->input->post("email");  
        $token = $this->usuarios_model->obtener_token();
        if ($this->input->server('REQUEST_METHOD') == "POST") {
            //busco el id del usuario para guardarlo en la bd
            $id_user = $this->usuarios_model->find_id_by_email($email);
            //guarda el token en la bd para cotejarlo luego
            $id = $this->save_token($email, $token, $id_user);
            
            if($id<>NULL){
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
                $datos = array('token' => $token);
                //llamamos a la vista plantilla mail que contiene el enlace para restablecer la 
                //contraseña
                $this->email->message($this->load->view('usuarios/plantilla_mail', $datos, true));                

                //enviamos el mail
                if($this->email->send()){
                    //redirecciona a la pagina principal
                    $msg = 'Se envio email con enlace para restablecer la contraseña. 
                    Por favor revise el correo no deseado';
                    $this->session->set_flashdata('mensaje', $msg);
                    return redirect(base_url('Welcome'));
                }else{
                    $this->email->print_debugger();
                }
            }else{
                $aviso['error_message'] = 'No se pudo guardar el token. El mail no se envio';
                $this->load->view('usuarios/forgot_password', $aviso);
            }
        
        }else{
            $this->load->view('usuarios/forgot_password');
        }
    }

    function save_token($e, $t, $id_u) {
        $data = array('id_user' => $id_u, 'token' => $t, 'correo' => $e);
        return $this->usuarios_model->insertar_token($data);
    }

    function cambio_de_password(){
        if(isset($_GET['email'])){
            $token = $_GET['token'];
            $query = $this->usuarios_model->find_by_email($_GET['email']);
            foreach($query->result() as $row){
                $datos['id'] =$row->id;

            }
        }
            
        
        $pass = sha1($this->input->post("password"));
        $this->usuarios_model->update();
    }

    public function user_delete($id = null) {
        if ($id !== null) {
            $this->usuarios_model->delete($id);
            echo 1;
        }
    }
   
}