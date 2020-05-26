<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        //cargamos la base de datos
        $this->load->database();
    }
     
    public function login_user($username,$password)
    {
        $this->builder->where('username',$username);
        $this->builder->where('password',$password);
        $this->builder->get();
        if($this->builder->numRows == 1)
        {
        return $this->builder->get();
        }
        else
        {
            $this->session->set_flashdata('usuario_incorrecto','Los datos introducidos son incorrectos');
            redirect(base_url().'login','refresh');
        }
    }

     //VISUALIZAR TODOS LOS USUARIOS
     public function ver(){
        //Hacemos una consulta
        $consulta=$this->db->query("SELECT * FROM users");
         
        //Devolvemos el resultado de la consulta
        return $consulta->result();
       
    }
    public function verxuser($us){
        //Hacemos una consulta
        $consulta=$this->db->query("SELECT * FROM users WHERE username like '$us'");
         
        //Devolvemos el resultado de la consulta
        return $consulta->result();
        
    }
    
    
    //AGREGAR UN USUARIO A LA BD
    public function add($nombre,$apellido,$username,$password,$perfil){
        $consulta=$this->db->query("SELECT username FROM users WHERE username LIKE '$username'");
        if($consulta->num_rows()==0){
            $consulta=$this->db->query("INSERT INTO users VALUES(NULL,'$perfil','$username','$password','$nombre','$apellido');");
            if($consulta==true){
              return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
    
    //MODIFICAR UN USUARIO DE LA BD
    public function mod($id,$modificar="NULL",$username="NULL",$password="NULL",$nombre="NULL",$apellido="NULL",$perfil="NULL"){
        if($modificar=="NULL"){
            $consulta=$this->db->query("SELECT * FROM users WHERE id=$id");
            return $consulta->result();
        }else{
          $consulta=$this->db->query("
              UPDATE users SET perfil='$perfil',username='$username', password='$password',
              nombre='$nombre', apellido='$apellido' WHERE id=$id;
                  ");
          if($consulta==true){
              return true;
          }else{
              return false;
          }
        }
    }
    
     //ELIMINA UN ELEMENTO DE LA BD
     public function eliminar($id){
       $consulta=$this->db->query("DELETE FROM users WHERE id=$id");
       if($consulta==true){
           return true;
       }else{
           return false;
       }
    }
}
?>