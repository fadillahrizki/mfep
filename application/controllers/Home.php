<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{
    function __construct(){
        parent::__construct();
        if(!isset($_SESSION['user'])){
            header("location:/auth/login");
        }
        $this->load->model(['kelas_model','guru_model','siswa_model','kriteria_model','penilaian_model']);
    }

    function index(){
        $data = [
            "kelas"=>$this->kelas_model->count(),
            "guru"=>$this->guru_model->count(),
            "siswa"=>$this->siswa_model->count(),
            "kriteria"=>$this->kriteria_model->count(),
            "penilaian"=>$this->penilaian_model->count(),
        ];

        $this->load->view('layouts/header');
        $this->load->view('dashboard',$data);
        $this->load->view('layouts/footer');
    }
}