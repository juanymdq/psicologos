<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Turnos_model extends CI_Model {
    public $table = "horarios_profesional";
    public $table_token = 'tbl_tokens';
    public $table_id = "id";

    public function __construct() {
        parent::__construct();
        //cargamos la base de datos
        $this->load->database();
    }    

    function find_by_prof($id) { 
       
        $this->db->select('*');        
        $this->db->from('profesional as p');        
        $this->db->join('horarios_profesionales as h', 'p.id = h.id_profesional');
        $this->db->where('h.id_profesional', $id);
        //$this->db->group_by('p.id');// add group_by
        $this->db->order_by('fecha', 'ASC'); 
                
        $aResult = $this->db->get();

        if(!$aResult->num_rows() == 1)
        {
            return false;
        }
        
        return $aResult->result_array();
    }

    function find_all_horarios() {
        $this->db->select();
        $this->db->from('horarios_profesionales');        
        
        $aResult = $this->db->get();

        if(!$aResult->num_rows() == 1)
        {
            return false;
        }

        return $aResult->result_array();
        
    }

    function find_one_horario($id) {
        $this->db->select();
        $this->db->from('horarios_profesionales h');   
        $this->db->join('profesional p', 'h.id_profesional = p.id');        
        $this->db->where('h.id', $id);
        //$this->db->where('h.id_profesional','p.id');
        
        $aResult = $this->db->get();

        if(!$aResult->num_rows() == 1)
        {
            return false;            
        }

        return $aResult->result_array();
        
    }

    //insercion de datos en tabla
    function insert_fecha($data) {
        $this->db->insert('horarios_profesionales', $data);
        return $this->db->insert_id();
    }

    //borra registros de la tabla horarios_profesionales
    function delete_horarios($id) {
        $this->db->where($this->table_id, $id);
        $this->db->delete('horarios_profesionales');
        return $this->db->affected_rows();
    }
}