<?php

class mahasiswa_model extends CI_Model{

    public function tampil_data($table)
    {
        return $this->db->get($table);
    }

    public function ambil_id_mahasiswa($id)
    {
        $hasil = $this->db->where('id', $id)->get('mahasiswa');
        if($hasil->num_rows() > 0){
            return $hasil->result();
        }else {
            return false;
        }
    }

    public function jumlahMahasiswa()
    {
        $query = $this->db->get('mahasiswa');
        return $query->result(); // Menggunakan result() untuk mengambil data sebagai objek
    }

    public function ambilDataMahasiswa()
    {
        $query = $this->db->get('mahasiswa');
        return $query->result();
    }

    public function countMahasiswa()
    {
        $this->db->from('mahasiswa');
        return $this->db->count_all_results();
    }
    
    public function getJumlahMahasiswa()
    {
        return $this->db->count_all('mahasiswa');
    }

    public function insert_data($data, $table)
    {
        $this->db->insert($table, $data);
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

    public $table = 'mahasiswa';
    public $id = 'id';

    public function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

}
