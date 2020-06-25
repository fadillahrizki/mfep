<?php

class Guru_model extends CI_Model{
    public $tbl = "guru";
    public $pengguna;
    public $kelas;

    function count(){
        return $this->db->count_all($this->tbl);
    }

    function get(){
        $this->db->from($this->tbl);
        $get = $this->db->get()->result();
        foreach($get as $g){
            $g->kelas = $this->db->from('kelas')->where('id',$g->kelas_id)->get()->result()[0];
            $g->pengguna = $this->db->from('pengguna')->where('id',$g->pengguna_id)->get()->result()[0];
        }
        return $get;
    }

    function single($id){
        $g = $this->db->from($this->tbl)->where('id',$id)->get()->result()[0];
        $g->kelas = $this->db->from('kelas')->where('id',$g->kelas_id)->get()->result()[0];
        $g->pengguna = $this->db->from('pengguna')->where('id',$g->pengguna_id)->get()->result()[0];
        return $g;
    }

    function singleByKelas($kelas_id){
        $g = $this->db->from($this->tbl)->where('kelas_id',$kelas_id)->get()->result()[0];
        $g->kelas = $this->db->from('kelas')->where('id',$g->kelas_id)->get()->result()[0];
        $g->pengguna = $this->db->from('pengguna')->where('id',$g->pengguna_id)->get()->result()[0];
        return $g;
    }

    function insert($data){
        $guru = $this->db->insert($this->tbl,$data);

        if($guru)
            return true;

        return false;
    }

    function update($data){
        $guru = $this->db->replace($this->tbl,$data);

        if($guru)
            return true;

        return false;
    }

    function delete($data){
        $g = $this->single($data['id']);
        
        $pengguna =  $this->db->where('id',$g->pengguna_id)->delete('pengguna');
        if($pengguna){
            $guru =  $this->db->delete($this->tbl,$data);
    
            if($guru)
                return true;
    
            return false;
        }
    }
}