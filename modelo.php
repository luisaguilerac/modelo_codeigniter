<?php

class modelo extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->dbutil();
    }

    function listado($tabla, $strAtributos, $strInner, $strConsulta) {
        $query = $this->db->query("select " . $strAtributos . " from " . $tabla . " " . $strInner . " where 1=1 " . $strConsulta);
        return $query->result_array();
    }
    
    function actualizar($tabla, $strId, $id, $data) {
        $this->db->where($strId, $id);
        $this->db->update($tabla, $data);
    }

    function ingreso($tabla, $data) {
        $this->db->insert($tabla, $data);
    }

    function eliminar($tabla, $strId, $id) {
        $this->db->where($strId, $id);
        return $this->db->delete($tabla);
    }

    function consulta($strConsulta) {
        $query = $this->db->query($strConsulta);
    }

    function consulta_listado_bases() {
        $query = $this->dbutil->list_databases();
        return $query;
    }

    function crear_bd($bd) {
        $this->load->dbforge();
        return $this->dbforge->create_database($bd);
    }

    function listado_paginacion($tabla, $strAtributos, $strInner, $strConsulta, $limit, $start) {
        $query = $this->db->query("select " . $strAtributos . " from " . $tabla . " " . $strInner . " where 1=1 " . $strConsulta . " LIMIT " . $start . "," . $limit . " ");
        return $query->result_array();
    }

    

    function eliminar_todo($tabla) {
        //$this->db->where($strId, $id);
        return $this->db->empty_table($tabla);
    }

    function existe_tabla($tabla) {
        $bool = 0;
        if ($this->db->table_exists($tabla)) {
            $bool = 1;
        }
        return $bool;
    }

    function existe_base($bd) {
        $this->load->dbutil();
        $bool = 0;
        if ($this->dbutil->database_exists($bd)) {
            $bool = 1;
        }
        return $bool;
    }

}

?>