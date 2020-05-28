<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Login_model extends CI_Model {
         
    public function __construct() {
        parent::__construct();
     }
     
     public function login_user($email,$password)
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
                'apellido' => $query->apellido
             );
            $this->session->set_userdata($data);  
            return $query;
         }
         else
         {
             $this->session->set_flashdata('email_incorrecto','Los datos introducidos son incorrectos');
             redirect(base_url().'login','refresh');
         }
     }


     
}
?>