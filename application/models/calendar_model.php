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

    //insercion de datos en tabla
    function insert($data) {
        $res = $this->db->insert($this->table, $data);
        header('Content-type: application/json; charset=utf-8');
        return json_encode($res);
        //return $this->db->insert_id();
    }


}


?>