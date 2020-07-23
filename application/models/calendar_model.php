<?php 

class Calendar_model extends CI_Model {
    public $table = "eventos";    
    public $table_id = "id";

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    //Obtiene todos los horarios de la tabla eventos para un profecional en particular
    //Ademas va a traer solos los eventos que sean mayores oiguales a la fecha actual
    function find_horarios_by_user($id) {        
        $this->db->select();      
        $this->db->from($this->table);
        $this->db->where('CONCAT(start," ",hora) >= NOW()');
        $this->db->where('id_user', $id);
        $this->db->where('estado', 'disponible');

        $query = $this->db->get();        
        $res = $query->result_array();
        return json_encode($res);
    }
   
    //insercion de datos en tabla
    function insert($data) {
        $this->db->insert($this->table, $data);   
        echo $this->db->insert_id(); 
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