<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Produk_m');

        if (!$this->session->userdata('is_login') == true ) {
            redirect('login');
        }
    }

    public function index() {

        $this->load->view('templates/bar');

        $this->load->view('view_Produk');
        $this->load->view('templates/footer');

    }

    public function echopre($dt) {
        echo "<pre>";
        print_r($dt);
        echo "</pre>";
    }

    public function get_data() {

        
        $Produk = $this->Produk_m->get_data();
        
        $i = 0;
        if(!empty($Produk)){
            foreach ($Produk as $k => $v) {
                $dt_final[$i]['produk_id'] = $v['produk_id'];
                $dt_final[$i]['produk_nama'] = strtoupper($v['produk_nama']);
                $dt_final[$i]['deskripsi'] = $v['deskripsi'];
                $dt_final[$i]['harga'] = number_format($v['harga']);
                $dt_final[$i]['kategori'] = strtoupper($v['kategori']);
                $dt_final[$i]['link'] = base_url().'assets/images/'.$v['gambar'];
                if($v['gambar'] != null)
                    $dt_final[$i]['gambar'] = '<img src="'.$dt_final[$i]['link'].'" width=100px>';
                else
                    $dt_final[$i]['gambar'] = '';
                $i++;
            }
        }else{
            $dt_final[$i]['deskripsi'] = "Data is null";
        }        
        $object = json_decode(json_encode($dt_final), FALSE);    
        // $this->echopre($object);die;
        echo json_encode(array('response' => $object));        
    }

    public function get_data_kategori() {
        $kategori = $this->Produk_m->get_data_kategori();        
        echo json_encode($kategori);
    }

    public function save_add(){
        $msg = "Error Input";
        if($this->input->post('produk_nama') == null || $this->input->post('harga') == null){
            $result = false;
            $msg = "Nama dan harga tidak boleh kosong";            
        }else{
            $config['upload_path']="./assets/images"; //path folder file upload
            $config['allowed_types']='jpg|jpeg|png'; //type file yang boleh di upload
            $config['encrypt_name'] = TRUE; //enkripsi file name upload
            
            if(!empty($_FILES)){
                $this->load->library('upload',$config); //call library upload 
                if($this->upload->do_upload("file")){ //upload file
                    $data = array('upload_data' => $this->upload->data()); //ambil file name yang diupload
                    $image= $data['upload_data']['file_name']; //set file name ke variable image
                    $data = array(
                        'produk_nama' => $this->input->post('produk_nama'),
                        'deskripsi' => $this->input->post('deskripsi'),
                        'harga' => $this->input->post('harga'),
                        'kategori' => $this->input->post('kategori'),
                        'gambar' => $image,
                    );
                    
                    $result = $this->Produk_m->save_add($data);
                }else{
                    $result = false;
                    $msg = "Format gambar tidak sesuai";
                }
            }else{
                $image = '';
                $data = array(
                    'produk_nama' => $this->input->post('produk_nama'),
                    'deskripsi' => $this->input->post('deskripsi'),
                    'harga' => $this->input->post('harga'),
                    'kategori' => $this->input->post('kategori'),
                    'gambar' => $image,
                );
                
                $result = $this->Produk_m->save_add($data);
            }         
        }
            

        if ($result) {
            echo json_encode(1);
        } else {
            echo json_encode($msg);
        }

    }

    public function get_data_by_id($id) {

        $Produk = $this->Produk_m->get_data_by_id($id);

        echo json_encode($Produk);
        
    }

    public function save_edit(){
        $msg = "Error Edit";
        // $this->echopre($_POST);die;
        // $this->echopre($_FILES);die;
        if($this->input->post('produk_nama') == null || $this->input->post('harga') == null){
            $result = false;
            $msg = "Nama dan harga tidak boleh kosong";            
        }else{
            if(!empty($_FILES)){
                //save gambar
                $config['upload_path']="./assets/images"; //path folder file upload
                $config['allowed_types']='jpg|jpeg|png'; //type file yang boleh di upload
                $config['encrypt_name'] = TRUE; //enkripsi file name upload
                 
                $this->load->library('upload',$config); //call library upload 
                if($this->upload->do_upload("file")){ //upload file
                    $data = array('upload_data' => $this->upload->data()); //ambil file name yang diupload
                    $image= $data['upload_data']['file_name']; //set file name ke variable image
                    $id = $this->input->post('produk_id');  
                    $data = array(
                        'produk_nama' => $this->input->post('produk_nama'),
                        'deskripsi' => $this->input->post('deskripsi'),
                        'harga' => $this->input->post('harga'),
                        'kategori' => $this->input->post('kategori'),
                        'gambar' => $image,

                    );
                    $result = $this->Produk_m->save_edit($data,$id);
                }else{
                    $result = false;
                    $msg = "Format gambar tidak sesuai";                
                }
                //delete gambar
                @unlink("./assets/images/".$_POST['file_prev']);
            }else{
                $id = $this->input->post('produk_id');  
                $data = array(
                    'produk_nama' => $this->input->post('produk_nama'),
                    'deskripsi' => $this->input->post('deskripsi'),
                    'harga' => $this->input->post('harga'),
                    'kategori' => $this->input->post('kategori'),

                );
                $result = $this->Produk_m->save_edit($data,$id);
            } 
        }  

        if ($result) {
            echo json_encode(1);
        } else {
            echo json_encode($msg);
        }

    }

    public function save_delete(){
        $id = $this->input->post('id');        
        $gambar_delete = $this->Produk_m->get_gambar_delete($id);
        $result = $this->Produk_m->deleted_data($id);
        if ($result) {
            @unlink("./assets/images/".$gambar_delete);
            echo json_encode(1);
        } else {
            echo json_encode(0);
        }

    }
}