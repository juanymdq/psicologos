<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profesional_model extends CI_Model {
    public $table = "profesional";
    public $table_token = 'tbl_tokens';
    public $table_id = "id";

    public function __construct() {
        parent::__construct();
        //cargamos la base de datos
        $this->load->database();
    }    


    public function login_prof($email,$password)
    {
        //error_reporting(0);
        $this->db->where('pr_email',$email);
        $this->db->where('password',$password);
        $query = $this->db->get('profesional')->row();
        return $query;
    
    }


    //trae todos los registros de las tablas profesional    
    function findAll() {
            $this->db->select();
            $this->db->from($this->table);
            $aResult = $this->db->get();

            if(!$aResult->num_rows() == 1)
            {
                return false;
            }

            return $aResult->result_array();

    }

    function getAllTurnos($id) { 
/*
SELECT * 
FROM eventos as e
INNER JOIN (turnos as t INNER JOIN cliente as c ON t.id_cliente=c.id) ON t.id_horario=e.id  and e.id_user=45
*/
       
        $this->db->select('*, t.id as idt');        
        $this->db->from('turnos as t');                
        $this->db->join('cliente as c', 'c.id = t.id_cliente');
        $this->db->join('eventos as e', 'e.id = t.id_horario');       
        $this->db->where('e.id_user', $id);                
                
        $aResult = $this->db->get();

        if(!$aResult->num_rows() == 1)
        {
            return false;
        }else{        
            return $aResult->result_array();
        }
    }


    //busca un elemento en particular por id
    function find($id) {
            $this->db->select();
            $this->db->from($this->table);
            $this->db->where($this->table_id, $id);

            $aResult = $this->db->get();

            if(!$aResult->num_rows() == 1)
            {
                return false;
            }
            return $aResult->result_object();
            //return $aResult->result_array();
    }

   
    //busca el registro por el campo email
    function find_id_by_email($email) {
        //obtengo la fila que coincide con el mail
        $this->db->like('email', $email);
        //le paso la fila completa a $query de la tabla indicada
        $query = $this->db->get($this->table); 
        //hago un fetch para devolver el id
        foreach($query->result() as $row){
            return $row->id;
        }
    }

    //busca el registro por el campo email
    function find_by_token($token) {
        $this->db->like('token', $token);
        $query = $this->db->get($this->table_token);        
        return $query;
    }    

    function update($id, $data) {
            $this->db->where($this->table_id, $id);
            $this->db->update($this->table, $data);
    }

    //borra el registro seleccionado
    function delete($id) {
            $this->db->where($this->table_id, $id);
            $this->db->delete($this->table);
    }

    
    //insercion de datos en tabla
    function insert($data) {
            $this->db->insert($this->table, $data);
            return $this->db->insert_id();
    }

    

    //inserta el token en la bd cuando se intente un cambio de pass
    public function insertar_token($data) {
        $this->db->insert($this->table_token, $data);
        return $this->db->insert_id();
    }

    //obtiene un token aleatorio para realizar el cambio de password
    function obtener_token(){
        $token = md5(uniqid(rand(),true));
        $this->session->set_userdata('token',$token);
        return $token;
    }

    function delete_token($id) {
        //selecciona el id con la clausula Where. table_id = "id"
        $this->db->where($this->table_id, $id);
        //borra el token
        $this->db->delete($this->table_token);
    }
}
?>