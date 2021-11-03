<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class List_produk extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('List_produk_m');

        if (!$this->session->userdata('is_login') == true ) {
            redirect('login');
        }
    }

    public function index() {

        $this->load->view('templates/bar');

        $this->load->view('view_List_produk');
        $this->load->view('templates/footer');

    }

    public function echopre($dt) {
        echo "<pre>";
        print_r($dt);
        echo "</pre>";
    }

    public function get_data() {

        
        $List_produk = $this->List_produk_m->get_data();
        
        $i = 0;
        if(!empty($List_produk)){
            foreach ($List_produk as $k => $v) {
                $dt_final[$i]['produk_id'] = $v['produk_id'];
                $dt_final[$i]['produk_nama'] = '<center>'.strtoupper($v['produk_nama']).'</center>';
                $dt_final[$i]['deskripsi'] = $v['deskripsi'];
                $dt_final[$i]['harga'] = '<center>Rp. <b>'.number_format($v['harga']).'</b></center>';
                $dt_final[$i]['kategori'] = strtoupper($v['kategori']);
                if($v['gambar'] != null){
                    $dt_final[$i]['link'] = base_url().'assets/images/'.$v['gambar'];
                    $dt_final[$i]['gambar'] = '<img src="'.$dt_final[$i]['link'].'" width=100px>';
                }
                else{
                    $dt_final[$i]['link'] = base_url().'assets/images/no_image.png';
                    $dt_final[$i]['gambar'] = '<img src="'.$dt_final[$i]['link'].'" width=100px>';
                }
                $i++;
            }
        }else{
            $dt_final[0]['deskripsi'] = "Data is null";
        }        
        $object = json_decode(json_encode($dt_final), FALSE);    
        // $this->echopre($dt_final);die;
        echo json_encode($object);
    }    
}