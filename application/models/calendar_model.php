<?php 

class Calendar_model extends CI_Model {
    public $table = "eventos";    
    public $table_id = "id";

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    //trae todos los registros de la tabla
    function findAll() {
        //header('Content-Type: application/json');
        $this->db->select();
        $this->db->from($this->table);
        $query = $this->db->get();        
        $res = $query->result_array();
        return json_encode($res);
    }

    function find_by_user($id) {
        $this->db->select();
        $this->db->from($this->table);
        $this->db->where('id_user', $id);
        $query = $this->db->get();        
        $res = $query->result_array();
        return json_encode($res);
    }

    //insercion de datos en tabla
    function insert($data) {
        $this->db->insert($this->table, $data);       
    }

     //borra el registro seleccionado
     function delete($id) {
        $this->db->where($this->table_id, $id);
        $this->db->delete($this->table);
    }
    //Actualizar un registro
    function update($id, $data) {
        $this->db->where($this->table_id, $id);
        $this->db->update($this->table, $data);
    }

}


?>