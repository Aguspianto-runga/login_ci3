<?php

class Jurusan_model extends CI_Model{

    public function tampil_data()
    {
        return $this->db->get('jurusan');
    }

    public function ambil_id_jurusan($id_jurusan)
    {
        $hasil = $this->db->where('id_jurusan', $id_jurusan)->get('jurusan');
        if($hasil->num_rows() > 0){
            return $hasil->result();
        }else {
            return false;
        }
    }

    public function getJumlahJurusan()
    {
        return $this->db->count_all('jurusan');
    }

    // public function tampil_data($table)
    // {
    //     return $this->db->get($table);
    // }

    public function input_data($data)
    {
        $this->db->insert('jurusan', $data);
    }

    public function edit_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }


}