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
        $this->db->where('email',$email);
        $this->db->where('password',$password);
        $query = $this->db->get('profesional')->row();
        return $query;
       
    }

    //trae todos los registros de la tabla
    function findAll() {
            $this->db->select();
            $this->db->from($this->table);
            $query = $this->db->get();
            return $query->result();
    }

    //busca un elemento en particular por id
    function find($id) {
            $this->db->select();
            $this->db->from($this->table);
            $this->db->where($this->table_id, $id);

            $query = $this->db->get();
            return $query->row();
    }

    function find_by_prof($id) {
        $this->db->select();
        $this->db->from('horarios_profesionales');
        $this->db->where('id_profesional', $id);
        $query = $this->db->get();        
        $res = $query->result_array();
        return json_encode($res);
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

    //insercion de datos en tabla
    function insert_fecha($data) {
        $this->db->insert('horarios_profesionales', $data);
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