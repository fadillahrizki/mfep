<?php

class Pengguna_model extends CI_Model{
    public $tbl = 'pengguna';
    public $username;
    public $password;
    public $level;

    function count(){
        return $this->db->count_all($this->tbl);
    }

    function get(){
        return $this->db->get($this->tbl)->result();
    }

    function guru(){
        return $this->db->from($this->tbl)->where('level','guru')->get()->result();
    }

    function login(){
        $user = $this->db->from($this->tbl)->where('username',$this->username)->where('password',$this->password)->get()->result();

        if(!empty($user))
            if($user[0]->level == "guru"){
                $user[0]->guru = $this->db->from('guru')->where('pengguna_id',$user[0]->id)->get()->result()[0];
            }
            return $user;

        return false;
    }

    function insert($data){
        $pengguna = $this->db->insert($this->tbl,$data);

        if($pengguna)
            return true;

        return false;
    }

    function update($data){
        $pengguna = $this->db->replace($this->tbl,$data);

        if($pengguna)
            return true;

        return false;
    }

    function delete($data){
        $pengguna =  $this->db->delete($this->tbl,$data);

        if($pengguna)
            return true;

        return false;
    }
}