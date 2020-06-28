<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller{
    function __construct(){
        parent::__construct();
        if(isset($_SESSION["user"])){
            header("location:/");
        }
        $this->load->model('pengguna_model');
    }

    function create(){}
    function read(){}
    function update(){}
    function delete(){}
    function insert(){}
    function edit(){}

    function login(){
        $this->load->view('layouts/header');
        $this->load->view('login');
        $this->load->view('layouts/footer');
    }

    function do_login(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $this->pengguna_model->username = $username;
        $this->pengguna_model->password = $password;

        $user = $this->pengguna_model->login();

        if(!$user){
            $this->session->error = true;
            header("location:/auth/login");
        }

        $this->session->user = $user[0];

        header("location:/");
    }
    function logout(){
        unset($_SESSION['user']);

        header("location:/auth/login");
    }
}