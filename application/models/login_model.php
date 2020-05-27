<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Login_model extends CI_Model {
         
    public function __construct() {
        parent::__construct();
     }
     
     public function login_user($username,$password)
     {
         $this->db->where('username',$username);
         $this->db->where('password',$password);
         $query = $this->db->get('users')->row();
         if($query)
         {
            $data = array(
                'is_logued_in' => TRUE,
                'id_usuario' => $query->id,
                'perfil' => $query->perfil,
                'username' => $query->username,
                'nombre' => $query->nombre,
                'apellido' => $query->apellido
             );
            $this->session->set_userdata($data);  
            return $query;
         }
         else
         {
             $this->session->set_flashdata('usuario_incorrecto','Los datos introducidos son incorrectos');
             redirect(base_url().'login','refresh');
         }
     }
}
?>