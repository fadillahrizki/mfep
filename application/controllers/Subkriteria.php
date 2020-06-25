<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subkriteria extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model(['subkriteria_model','kriteria_model']);
    }

    function index(){
        $kriteria_id = $this->input->get("kriteria_id");
        $data = [
            'data'=>$this->subkriteria_model->get($kriteria_id),
            'parent'=>$this->kriteria_model->single($kriteria_id),
        ];
        $this->load->view('layouts/header');
        $this->load->view('subkriteria/index',$data);
        $this->load->view('layouts/footer');
    }

    function create(){
        $kriteria_id = $this->input->get("kriteria_id");
        $data = [
            'parent'=>$this->kriteria_model->single($kriteria_id),
        ];
        $this->load->view('layouts/header');
        $this->load->view('subkriteria/create',$data);
        $this->load->view('layouts/footer');
    }

    function read(){}
    
    function update(){
        $upd = $this->subkriteria_model->update($this->input->post());
        $kriteria_id = $this->input->post("kriteria_id");
        if($upd){
            $this->session->successUpdate = true;
            header("location:/subkriteria?kriteria_id=".$kriteria_id);
        }
    }

    function delete(){
        $del = $this->subkriteria_model->delete($this->input->get());
        $kriteria_id = $this->input->get("kriteria_id");
        if($del){
            $this->session->successDelete = true;
            header("location:/subkriteria?kriteria_id=".$kriteria_id);
        }
    }

    function insert(){
        $kriteria_id = $this->input->get("kriteria_id");
        $ins = $this->subkriteria_model->insert($this->input->post());
        if($ins){
            $this->session->successCreate = true;
            header("location:/subkriteria?kriteria_id=".$kriteria_id);
        }
    }

    function edit(){
        $kriteria_id = $this->input->get("kriteria_id");    
        $data = [
            'kriteria'=>$this->subkriteria_model->single($this->input->get('id')),
            'parent'=>$this->kriteria_model->single($kriteria_id),
        ];
        $this->load->view('layouts/header');
        $this->load->view('subkriteria/edit',$data);
        $this->load->view('layouts/footer');
    }
}