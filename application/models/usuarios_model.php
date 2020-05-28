<?php
/* if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        //cargamos la base de datos
        $this->load->database();
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
    public function add(){
       // $this->db->like('email', $email);
      //  $query = $this->db->get();
        //$consulta=$this->db->query("SELECT email FROM users WHERE email LIKE '$email'");
      //  if(!$query){
        
        //$this->input->post("perfil")

            $data = array("perfil" => 'cliente',
                "email" =>  $this->input->post("email"),
                "password" => sha1($this->input->post("password")),
                "nombre" => $this->input->post("nombre"),
                "apellido" =>$this->input->post("apellido")
            );

            $this->db->trans_begin(); 
            $this->db->insert('users', $data);
            $this->session->set_userdata($data);
            return $this->db->affected_rows();

            if ($this->db->trans_status() === FALSE){      
                //Hubo errores en la consulta, entonces se cancela la transacción.   
                $this->db->trans_rollback();      
                return false;    
             }else{      
                //Todas las consultas se hicieron correctamente.  
                $this->db->trans_commit();    
                return true;    
             }  
/*
           $consulta=$this->db->query("INSERT INTO users VALUES(NULL,'$perfil','$email','$password','$nombre','$apellido');");
            if($consulta==true){
                $this->session->set_userdata($data);
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
*/
?>



<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios_model extends CI_Model {
    public $table = "users";
    public $table_token = 'tbl_tokens';
    public $table_id = "id";

    public function __construct() {
        parent::__construct();
        //cargamos la base de datos
        $this->load->database();
    }    

    function findAll() {
            $this->db->select();
            $this->db->from($this->table);

            $query = $this->db->get();
            return $query->result();
    }

    function find($id) {
            $this->db->select();
            $this->db->from($this->table);
            $this->db->where($this->table_id, $id);

            $query = $this->db->get();
            return $query->row();
    }

    function update($id, $data) {
            $this->db->where($this->table_id, $id);
            $this->db->update($this->table, $data);
    }

    function delete($id) {
            $this->db->where($this->table_id, $id);
            $this->db->delete($this->table);
    }

    function insert($data) {
            $this->db->insert($this->table, $data);
            return $this->db->insert_id();
    }

    function insert_token($data) {
        $this->db->insert($this->table_token, $data);
        return $this->db->insert_id();
    }

    function obtener_token(){
        $token = md5(uniqid(rand(),true));
        $this->session->set_userdata('token',$token);
        return $token;
    }
}
?>