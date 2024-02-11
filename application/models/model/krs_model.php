<?php

class Krs_model extends CI_Model{

    public $table = 'krs';
    public $id = 'id_krs';

    public function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

}