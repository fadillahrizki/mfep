<?php

class Kelas_model extends CI_Model{
    public $tbl = "kelas";
    public $nama;

    function count(){
        return $this->db->count_all($this->tbl);
    }

    function get(){
        return $this->db->get($this->tbl)->result();
    }

    function single($id){
        return $this->db->from($this->tbl)->where('id',$id)->get()->result()[0];
    }

    function insert($data){
        $kelas = $this->db->insert($this->tbl,$data);

        if($kelas)
            return true;

        return false;
    }

    function update($data){
        $kelas = $this->db->replace($this->tbl,$data);

        if($kelas)
            return true;

        return false;
    }

    function delete($data){
        $kelas =  $this->db->delete($this->tbl,$data);

        if($kelas)
            return true;

        return false;
    }
}