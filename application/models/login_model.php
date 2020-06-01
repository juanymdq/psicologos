<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Login_model extends CI_Model {
         
    public function __construct() {
        parent::__construct();
     }
     
     public function login_user($email,$password,$perfil)
     {
         $this->db->where('email',$email);
         $this->db->where('password',$password);
         $query = $this->db->get('users')->row();
         if($query > 0)
         {
            $data = array(
                'is_logued_in' => TRUE,
                'id' => $query->id,
                'perfil' => $query->perfil,
                'email' => $query->email,
                'nombre' => $query->nombre,
                'apellido' => $query->apellido,
                'matricula' => $query->matricula,
                'telefono' => $query->telefono
             );
            $this->session->set_userdata($data);  
            return $query;
         }
         else
         {
            //$this->session->set_flashdata('email_incorrecto','Los datos introducidos son incorrectos');
            $datos['error_message'] = "Los datos introducidos son incorrectos";
            if($perfil == 'cliente'){
                $this->load->view('clientes/clientes_login_view', $datos);
                //redirect(base_url('cliente/acceso_clientes'),'refresh');
            }elseif($perfil == 'profesional'){
                $this->load->view('profesionales/profesionales_login_view', $datos);
                //redirect(base_url('profesional/acceso_profesionales'),'refresh');
            }elseif($perfil == 'administrador'){
                $this->load->view('profesionales/profesionales_login_view', $datos);
            }
             
             
         }
     }


     
}
?>