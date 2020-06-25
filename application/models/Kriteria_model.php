<?php

class Kriteria_model extends CI_Model{
    public $nama;
    public $bobot;
    public $tbl = "kriteria";

    function count(){
        return $this->db->count_all($this->tbl);
    }

    function get(){
        $get = $this->db->order_by('bobot','desc')->get($this->tbl)->result();
        foreach($get as $g){
            $g->childs = $this->db->where('kriteria_id',$g->id)->get('sub_kriteria')->result();
        }
        return $get;
    }

    function single($id){
        return $this->db->from($this->tbl)->where('id',$id)->get()->result()[0];
    }

    function insert($data){
        $kriteria = $this->db->insert($this->tbl,$data);

        if($kriteria)
            return true;

        return false;
    }

    function update($data){
        $kriteria = $this->db->replace($this->tbl,$data);

        if($kriteria)
            return true;

        return false;
    }

    function delete($data){
        $kriteria =  $this->db->delete($this->tbl,$data);

        if($kriteria)
            return true;

        return false;
    }
}