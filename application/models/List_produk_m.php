<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class List_produk_m extends CI_Model {

    public function get_data()
    {   
        $dt = $this->db            
            ->select('A.produk_id, A.produk_nama, A.deskripsi, A.harga, A.gambar, B.kategori_nama as kategori')
            ->from('master_produksi A')
            ->join('master_kategori B','A.kategori = B.kategori_kode','LEFT')            
            ->order_by('A.produk_id','DESC')
            ->limit(3)
            ->get()
            ->result_array();
        // echo $this->db->last_query();die;
        return $dt;
    }

    public function get_data_kategori()
    {   
        $dt = $this->db            
            ->from('master_kategori')
            ->order_by('kategori_id','ASC')
            ->get()
            ->result();
        // print_r($this->db->last_query());die;
        return $dt;
    }

    public function get_gambar_delete($id)
    {   
        $dt = $this->db            
            ->select('gambar')
            ->from('master_produksi')
            ->where('produk_id',$id)
            ->get()
            ->row()->gambar;
        return $dt;
    }

    public function cek_nama($nama)
    {   
        $dt = $this->db            
            ->select('produk_nama')
            ->from('master_produksi')
            ->where('UPPER(REPLACE(produk_nama," ","")) = ',$nama)
            ->get()
            ->result_array();        
        return $dt;
    }

    public function save_add($data)
    {
        $result = $this->db->insert('master_produksi', $data);
        return $result;
    }

    public function get_data_by_id($id)
    {

        $qy = "
            SELECT
                *
            from
                master_produksi
            where 
                produk_id = '".$id."'
        ";
        $result = $this->db->query($qy)->row();
        return $result;
    }

    public function save_edit($data, $id)
    {
        $this->db->where('produk_id', $id);
        $result = $this->db->update('master_produksi', $data);
        return $result;
    }

    public function deleted_data($id) {
        $this->db->where('produk_id', $id);
        return $this->db->delete('master_produksi');
    }
}