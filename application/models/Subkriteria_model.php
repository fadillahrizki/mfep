<?php

class Subkriteria_model extends CI_Model{
    public $tbl = "sub_kriteria";
    public $kriteria;
    public $nama;
    public $nilai;

    function count(){
        return $this->db->count_all($this->tbl);
    }

    function get($kriteria_id){
        $subkriteria = $this->db->where('kriteria_id',$kriteria_id)->order_by('nilai','desc')->get($this->tbl)->result();
        return $subkriteria;
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