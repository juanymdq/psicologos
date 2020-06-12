<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Cliente extends MY_Controller
{     

    public function __construct()
    {       
        parent::__construct();
         //llamo o incluyo el modelo
         $this->load->model('cliente_model');         
         //cargo la libreria de sesiones
         $this->load->library(array('session','form_validation'));
         //llamo al helper url
         $this->load->helper(array('url','form'));     
         
        
    }

    public function index() {         
        $datos['titulo'] = "Cliente";
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
        $this->render_page('clientes/cliente_login_view',$datos);
           
    }

   

    public function cliente_cpanel() {
        $datos['titulo'] = "Cliente CPanel";
        $this->render_page('clientes/cliente_home_view', $datos);        
    }
    
    //login de clientes
    public function login_cliente()
    {
        //si ya esta logueado, redirige al panel de control
        if($this->session->userdata("nombre")!=null){
            $datos['titulo'] = "Cliente CPanel";
            $this->render_page('clientes/cliente_home_view', $datos);        
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
                $clie = $this->cliente_model->login_clie($email,$password);
                if($clie!=null){
                    $data = array(
                        'is_logued_in' => TRUE,
                        'id' => $clie->id,              
                        'email' => $clie->email,
                        'nombre' => $clie->nombre,
                        'apellido' => $clie->apellido,                    
                        'telefono' => $clie->telefono,                    
                        'perfil' => 'cliente'                    
                    );
                    $this->session->set_userdata($data);  
                    
                    $this->cliente_cpanel();
                    //$this->load->view('turnos/lista_profesionales_view'); 
                }else{
                    $datos['message'] = "Datos Incorrectos - intente nuevamente";
                    $this->render_page('clientes/clientes_login_view', $datos);
                }
                
            }
        }

    }

    public function logout()
    {
        $this->session->sess_destroy();
        return redirect(base_url(),'refresh');
    }    


//--------------------------------------------------------------------
    public function cliente_save($id = null) {
        
        
        if ($this->input->server('REQUEST_METHOD') == "POST") {
            $id = $this->session->userdata('id');
            $this->form_validation->set_rules('nombre', 'Nombre', 'required|min_length[1]|max_length[100]');
            $this->form_validation->set_rules('apellido', 'Apellido', 'required|min_length[1]|max_length[100]');            
            $this->form_validation->set_rules('email', 'email', 'required|valid_email');
            $this->form_validation->set_rules('telefono', 'Telefono', 'required|numeric|min_length[1]|max_length[20]');            
            if($id==null){//si esta registrando   
                $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[100]');
                $this->form_validation->set_rules('confirm_password', 'Confirmar Password', 'required|min_length[6]|max_length[100]');              
            }
            $datos = array(         
                'nombre' => $this->input->post("nombre"),
                'apellido' => $this->input->post("apellido"),                    
                'perfil' => $this->input->post('perfil'),
                'email' => $this->input->post("email"),
                'telefono' => $this->input->post('telefono')
            ); 
            if($id==null){//id==null: registro de cliente - id<>null: modificacion cliente 
                //verificacion de passwords iguales
                $pass = $this->input->post('password');
                $confirm_pass = $this->input->post('confirm_password');
                if(strcmp($pass,$confirm_pass)==0){
                    if ($this->form_validation->run()) {// nuestro form es valido                       
                        //si registra      
                        $save = array(
                            'nombre' => $this->input->post("nombre"),
                            'apellido' => $this->input->post("apellido"), 
                            'perfil' => $this->input->post('perfil'), 
                            'email' => $this->input->post("email"),                             
                            'telefono' => $this->input->post("telefono"),                                                     
                            'password' => $this->input->post("password")
                            //'password' => sha1($this->input->post("password"))                           
                        );  
                        $id = $this->cliente_model->insert($save); 
                        $datos['id'] = $id;
                        $datos['message'] = "Bienvenido a nuestro sitio de terapia virtual.".
                        $this->session->set_userdata($datos);                    
                        $this->render_page('clientes/cliente_home_view', $datos);  
                    }else{ //VALIDATION ERRORS
                        //$datos['error_message'] = validation_errors();
                        $datos['registra'] = true;
                        $datos['actualiza'] = false;                        
                        $this->render_page('clientes/cliente_login_view', $datos);
                    }
                }else{ //CONTRASEÑAS DISTINTAS
                    //cargamos la variable registra. La misma hace que aparezcan o no los campos pass
                    //y confirmar_password
                    $datos['message'] ='Las contraseñas no coinciden';
                    $datos['registra'] = true; 
                    $datos['actualiza'] = false;
                    $this->render_page('clientes/cliente_login_view', $datos);
                }
            }else{//MODIFICACION DE DATOS
                if ($this->form_validation->run()) {// nuestro form es valido    
                    //si modifica
                    $save = array(
                        'nombre' => $this->input->post("nombre"),
                        'apellido' => $this->input->post("apellido"), 
                        'perfil' => $this->input->post('perfil'), 
                        'email' => $this->input->post("email"),                             
                        'telefono' => $this->input->post("telefono")                             
                    );
                    $this->cliente_model->update($id, $save);
                    $datos['id'] = $id;
                    $datos['message'] = "Los datos se modificaron correctamente".
                    $this->session->set_userdata($datos);                    
                    $this->render_page('clientes/cliente_home_view', $datos); 
                }else{ //VALIDATION ERRORS
                    //$datos['error_message'] = validation_errors();
                    $datos['actualiza'] = true;
                    $datos['false'] = false;
                    $this->render_page('clientes/cliente_login_view', $datos);
                }    
            }        
        }else{ //SI NO SE REALIZO POST

            if ($id == null) {
                // crear usuario
                $data['nombre'] = "";
                $data['apellido'] = "";
                $data['email'] = "";
                $data['pasword'] = "";               
                $data['telefono'] = "";
                $data['registra'] = true;
                $datos['actualiza'] = false;
            } else {
                // edicion usuario
                $cli = $this->cliente_model->find($id);
                $data['nombre'] = $cli->nombre;
                $data['apellido'] = $cli->apellido;              
                $data['telefono'] = $cli->telefono; 
                $data['email'] = $cli->email;                
                $data['actualiza'] = true;
                $data['registra'] = true;
                
            }

            $this->render_page('clientes/cliente_login_view', $data);
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
                $this->email->message($this->render_page('usuarios/plantilla_mail', $datos, true));                

                //enviamos el mail
                if($this->email->send()){
                    //redirecciona a la pagina principal
                    $msg = 'Se envio email con enlace para restablecer la contraseña. 
                    Por favor revise el correo no deseado';
                    $this->session->set_userdata('aviso_message', $msg);
                    return redirect(base_url('Welcome'));
                }else{
                    $this->email->print_debugger();
                }
            }else{
                $aviso['error_message'] = 'No se pudo guardar el token. El mail no se envio';
                $this->render_page('usuarios/forgot_password', $aviso);
            }
        
        }else{
            $datos['aviso'] = "No se realizó envío";
            $this->render_page('usuarios/forgot_password', $datos);
        }
    }

    //guarda el token en la tabla temporal tbl_tokens para realizar el cambio de pass
    function save_token($e, $t, $id_u) {
        $data = array('id_user' => $id_u, 'token' => $t, 'correo' => $e);
        return $this->usuarios_model->insertar_token($data);
    }

    function cambio_de_password(){
        //obtenemos el token via get
        if(isset($_GET['token'])){
            //guardaos el yoken en una variable
            $token = $_GET['token'];
            //buscamos el token en la bd
            $query = $this->usuarios_model->find_by_token($token);
            //seteamos en true para verificar si cambia la pss desde el link mail o
            //desde dentro de la pagina
            $this->session->set_userdata('modif_by_email', true);
            //buscamos los datos id_usuario + email segun token
            foreach($query->result() as $row){
                //guardamos id usuario en variable para poder updetear
                $datos['id_user'] = $row->id_user;
                //traemos tmb el token para eliminarlo posteriormente
                $id_token = $row->id;
            }
            //vaciamos la variable token para permitir el cambio de password
            unset($_GET['token']);
            //eliminamos el token de la bd temporal tbl_tokens
            $this->usuarios_model->delete_token($id_token);
            //invocamos la vista de cambio de password
            $this->render_page('usuarios/restablecer_contraseña', $datos);
        }else{
            //si se realizo post en el form restablecer contraseña
            if ($this->input->server('REQUEST_METHOD') == "POST") {
                //iniciamos la validaciones de password
                $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[100]');
                $this->form_validation->set_rules('confirm_password', 'Confirmar Password', 'required|min_length[6]|max_length[100]');
                //traemos el id del usuarios para actualizar
                $id_user = $this->input->post('id_user');   
                //traemos la pass y la metemos en un array para actualizar        
                $pass = $this->input->post('password');
                $confirm_pass = $this->input->post('confirm_password');
                
                $datos['id_user'] = $id_user;
                //comparamos que las pass sean iguales
                if(strcmp($pass,$confirm_pass)==0){
                    //validamos
                    if ($this->form_validation->run()) {                                    
                            //si las validaciones de pass son correctas actualizamos la misma
                            $pass = array('password' => sha1($pass));
                            $this->usuarios_model->update($id_user, $pass);              
                            //mandamos un mensaje de exito
                            $datos['aviso_message'] = "Modificación de password exitosa!!!";
                            //derivamos a la vista de login                    
                            if($this->session->userdata('modif_by_email')){
                                $this->render_page("login_view", $datos);
                            }else{                        
                                $this->render_page("administrador/administrador_home_view", $datos);
                            }                        
                    }else{
                        //si hubo algun error en la/s pass, se deriva al mismo form
                        //para que refleje los errores
                        $this->render_page("usuarios/restablecer_contraseña", $datos);
                    }
                }else{//si las password no son iguales
                    //cargamos la variable registra. La misma hace que aparezcan o no los campos pass
                    //y confirmar_password
                    $datos['error_message'] ='Las contraseñas no coinciden';
                    //$datos['registra'] = true;                           
                    $this->render_page("usuarios/restablecer_contraseña", $datos);
                }
            }else{
                $datos['id_user'] = $this->session->userdata('id');
                $this->session->set_userdata('modif_by_email', false);
                $this->render_page("usuarios/restablecer_contraseña", $datos);
            }
        }          
    }

    public function view_all_clients() {
        $datos['query'] = $this->usuarios_model->findAll();
        $this->render_page('clientes/clientes_view_all', $datos);
    }

    public function user_delete($id = null) {
        if ($id !== null) {
            $this->usuarios_model->delete($id);
            echo 1;
        }
    }
   
}