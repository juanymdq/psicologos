<?php 
header('Content-Type: application/json');
class Calendario extends CI_Model {
    public $table = "eventos";    
    public $table_id = "id";

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    //trae todos los registros de la tabla
    function findAll() {
        $this->db->select();
        $this->db->from($this->table);

        $query = $this->db->get();
        $res = $query->result_array();

        return json_encode($res);

    }


}


?>