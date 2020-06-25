<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penilaian extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model(['penilaian_model','kelas_model','guru_model','siswa_model','kriteria_model']);
    }

    function index(){
        $data = [
            'data'=>$this->penilaian_model->get(),
            'kriteria'=>$this->kriteria_model->get(),
            'kelas'=>$this->kelas_model->get()
        ];
        $this->load->view('layouts/header');
        $this->load->view('penilaian/index',$data);
        $this->load->view('layouts/footer');
    }

    function read(){
        $kelas_id = $this->input->get('kelas_id');
        echo json_encode($this->penilaian_model->getByKelasId($kelas_id));
    }
    
    function update(){
        $post = $this->input->post();
        foreach($post['kriteria'] as $item){
            $item['penilaian_id'] = $post["id"];
            $this->penilaian_model->updateItem($item);
        }

        $this->session->successPenilaian = true;
        header("location:/siswa");
    }

    function delete(){
        $del = $this->penilaian_model->delete($this->input->get());
        if($del){
            $this->session->successDelete = true;
            header("location:/penilaian");
        }
    }

    function insert(){
        $post = $this->input->post();
        $guru = $this->guru_model->singleByKelas($post['kelas_id']);
        $post['guru_id'] = $guru->id;
        $insert = [
            "kelas_id"=>$post['kelas_id'],
            "guru_id"=>$post['guru_id'],
            "NIS"=>$post['NIS'],
        ];
        $ins = $this->penilaian_model->insert($insert);
        if($ins){
            $penilaian = $this->penilaian_model->singleByKelasGuruNIS($post['kelas_id'],$post['guru_id'],$post['NIS']);
            foreach($post['kriteria'] as $item){
                $item['penilaian_id'] = $penilaian->id;
                $items = $this->penilaian_model->insertItem($item);
            }

            $this->db->where("NIS",$post["NIS"])->set("dinilai",1)->update('siswa');

            $this->session->successPenilaian = true;
            header("location:/siswa");
        }
    }

    function hasil(){}
}