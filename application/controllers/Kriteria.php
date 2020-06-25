<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kriteria extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model(['kriteria_model']);
    }

    function index(){
        $this->load->view('layouts/header');
        $this->load->view('kriteria/index',['data'=>$this->kriteria_model->get()]);
        $this->load->view('layouts/footer');
    }

    function create(){
        $this->load->view('layouts/header');
        $this->load->view('kriteria/create');
        $this->load->view('layouts/footer');
    }

    function read(){}
    
    function update(){
        $upd = $this->kriteria_model->update($this->input->post());
        if($upd){
            $this->session->successUpdate = true;
            header("location:/kriteria");
        }
    }

    function delete(){
        $del = $this->kriteria_model->delete($this->input->get());
        if($del){
            $this->session->successDelete = true;
            header("location:/kriteria");
        }
    }

    function insert(){
        $ins = $this->kriteria_model->insert($this->input->post());
        if($ins){
            $this->session->successCreate = true;
            header("location:/kriteria");
        }
    }

    function edit(){
        $kriteria = $this->kriteria_model->single($this->input->get('id'));
        $this->load->view('layouts/header');
        $this->load->view('kriteria/edit',["kriteria"=>$kriteria]);
        $this->load->view('layouts/footer');
    }
}