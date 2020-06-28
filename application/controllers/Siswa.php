<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller{
    function __construct(){
        parent::__construct();
        if(!isset($_SESSION["user"])){
            header("location:/auth/login");
        }
        $this->load->model(['siswa_model','kelas_model','kriteria_model','penilaian_model']);
    }

    function index(){
        $data = [
            'data'=>$this->siswa_model->get()
        ];
        $this->load->view('layouts/header');
        $this->load->view('siswa/index',$data);
        $this->load->view('layouts/footer');
    }

    function create(){
        $data = [
            'kelas' => $this->kelas_model->get(),
        ];
        $this->load->view('layouts/header');
        $this->load->view('siswa/create',$data);
        $this->load->view('layouts/footer');
    }

    function read(){}
    
    function update(){
        $upd = $this->siswa_model->update($this->input->post());
        if($upd){
            $this->session->successUpdate = true;
            header("location:/siswa");
        }
    }

    function delete(){
        $del = $this->siswa_model->delete($this->input->get());
        if($del){
            $this->session->successDelete = true;
            header("location:/siswa");
        }
    }

    function insert(){
        $ins = $this->siswa_model->insert($this->input->post());
        if($ins){
            $this->session->successCreate = true;
            header("location:/siswa");
        }
    }

    function edit(){
        $data = [
            'siswa' => $this->siswa_model->single($this->input->get('NIS')),
            'kelas' => $this->kelas_model->get(),
        ];
        $this->load->view('layouts/header');
        $this->load->view('siswa/edit',$data);
        $this->load->view('layouts/footer');
    }

    function kelas(){}

    function penilaian(){
        $NIS = $this->input->get("NIS");

        $data = [
            'siswa' => $this->siswa_model->single($NIS),
            'kriteria' => $this->kriteria_model->get()
        ];
        $this->load->view('layouts/header');
        $this->load->view('siswa/penilaian',$data);
        $this->load->view('layouts/footer');
    }

    function edit_penilaian(){
        $NIS = $this->input->get("NIS");

        $penilaian = $this->penilaian_model->singleByNIS($NIS);
        

        $data = [
            'siswa' => $this->siswa_model->single($NIS),
            'kriteria' => $this->kriteria_model->get(),
            'penilaian' => $penilaian
        ];
        $this->load->view('layouts/header');
        $this->load->view('siswa/edit_penilaian',$data);
        $this->load->view('layouts/footer');
    }
}