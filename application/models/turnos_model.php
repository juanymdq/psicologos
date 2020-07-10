<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Turnos_model extends CI_Model {
    public $table = "horarios_profesional";
    public $table_token = 'tbl_tokens';
    public $table_turnos = 'turnos';
    public $table_id = "id";

    public function __construct() {
        parent::__construct();
        //cargamos la base de datos
        $this->load->database();
    }    
//busca los horarios de un profesional en particular
    function find_by_prof($id) { 
        //comprueba que la fecha de turnos sea mayo o igual al dia actual
        date_default_timezone_set('America/Argentina/Buenos_Aires');
	    $fechaActual = date('Y-m-d H:i:s');
        $this->db->select('*');        
        $this->db->from('profesional as p');        
        $this->db->join('horarios_profesionales as h', 'p.id = h.id_profesional');
        $this->db->where('h.id_profesional', $id);
        $this->db->where('estado', 'disponible');
        $this->db->where('fecha >=', $fechaActual);
        //$this->db->group_by('p.id');// add group_by
        $this->db->order_by('fecha', 'ASC'); 
                
        $aResult = $this->db->get();

        if(!$aResult->num_rows() == 1)
        {
            return false;
        }
        
        return $aResult->result_array();
    }

    function find_by_cliente($id) { 
       
        $this->db->select('*');        
        $this->db->from('turnos as t');                
        $this->db->join('cliente as c', 'c.id = t.id_cliente');
        $this->db->join('horarios_profesionales as h', 'h.id = t.id_horario');
        $this->db->join('profesional as p', 'p.id = h.id_profesional');
        $this->db->where('t.id', $id);                
                
        $aResult = $this->db->get();

        if(!$aResult->num_rows() == 1)
        {
            return false;
        }
        
        return $aResult->result_array();
    }


//busca todos los horarios de la tabla
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
//busca un horario en particular y trae todos los datos
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

    //busca el turno indexado con merchant_order - usado para pagos presenciales
    function find_by_merchant_order($merchant) {
        $this->db->select();
        $this->db->from('turnos');        
        $this->db->where('merchant_order', $merchant);        
        
        $aResult = $this->db->get();

        if(!$aResult->num_rows() == 1)
        {
            return false;            
        }

        return $aResult->result_array();
    }

    //inserta datos del turno. id_cliente/id_horario/comentarios/id_session/payment_id
    function insert_turno($id, $data) {
        //inserta en turnos
        $this->db->insert('turnos', $data);
        $idT = $this->db->insert_id();
        //modifica el horario a estado "reservado"
        $this->db->set('estado','reservado');
        $this->db->where('id', $id);
        $this->db->update('horarios_profesionales');
        //-------------------------------------------------
        //envia el id del turno guardado
        return  $idT;
    }
    
    //insercion de datos en tabla
    function insert_fecha($data) {
        $this->db->insert('horarios_profesionales', $data);
        return $this->db->insert_id();
    }
/* //TODO: sin usar
    function modifica_disponibilidad_de_horario($id, $estado) {
        $this->db->set('estado','reservado');
        $this->db->where('id', $id);
        $this->db->update('horarios_profesionales');
    }
*/
    //modifica el estado del pago de ticket a status = approved
    function update_status_turno($id,$data) {
        $this->db->where($this->table_id, $id);
        $this->db->update($this->table_turnos, $data);
    }
    //borra registros de la tabla horarios_profesionales
    function delete_horarios($id) {
        $this->db->where($this->table_id, $id);
        $this->db->delete('horarios_profesionales');
        return $this->db->affected_rows();
    }
}