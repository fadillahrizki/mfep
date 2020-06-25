<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->load->model(['kelas_model','siswa_model']);
    }

    function index(){
        $this->load->view('layouts/header');
        $this->load->view('kelas/index',['data'=>$this->kelas_model->get()]);
        $this->load->view('layouts/footer');
    }

    function create(){
        $this->load->view('layouts/header');
        $this->load->view('kelas/create');
        $this->load->view('layouts/footer');
    }

    function read(){}
    
    function update(){
        $upd = $this->kelas_model->update($this->input->post());
        if($upd){
            $this->session->successUpdate = true;
            header("location:/kelas");
        }
    }

    function delete(){
        $del = $this->kelas_model->delete($this->input->get());
        if($del){
            $this->session->successDelete = true;
            header("location:/kelas");
        }
    }

    function insert(){
        $ins = $this->kelas_model->insert($this->input->post());
        if($ins){
            $this->session->successCreate = true;
            header("location:/kelas");
        }
    }

    function edit(){
        $kelas = $this->kelas_model->single($this->input->get('id'));
        $this->load->view('layouts/header');
        $this->load->view('kelas/edit',["kelas"=>$kelas]);
        $this->load->view('layouts/footer');
    }

    function siswa(){
        $id = $this->input->get("id");
        $data = [
            'data'=>$this->siswa_model->getByKelas($id)
        ];
        $this->load->view('layouts/header');
        $this->load->view('siswa/index',$data);
        $this->load->view('layouts/footer');
    }
    function guru(){}
}