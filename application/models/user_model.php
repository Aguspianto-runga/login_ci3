<?php

class User_model extends CI_Model
{

    public function ambil_data($id)
    {
        $this->db->where('name', $id);
        return $this->db->get('user')->row();
    }

    public function ambil_id_user($id)
    {
        $hasil = $this->db->where('id', $id)->get('user');
        if($hasil->num_rows() > 0){
            return $hasil->result();
        }else {
            return false;
        }
    }

    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

}
