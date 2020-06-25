<?php

class Siswa_model extends CI_Model{
    public $tbl="siswa";
    public $nis;
    public $nama;
    public $jenis_kelamin;
    public $alamat;
    public $siswa;

    function count(){
        return $this->db->count_all($this->tbl);
    }
    function get(){
        $this->db->from($this->tbl);
        if($this->session->user->level == "guru"){
            $get = $this->db->where('kelas_id',$this->session->user->guru->kelas_id)->get()->result();
        }else{
            $get = $this->db->get()->result();
        }
        foreach($get as $g){
            $g->kelas = $this->db->from('kelas')->where('id',$g->kelas_id)->get()->result()[0];
        }
        return $get;
    }

    function getByKelas($id){
        $get = $this->db->where('kelas_id',$id)->get($this->tbl)->result();
        foreach($get as $g){
            $g->kelas = $this->db->from('kelas')->where('id',$g->kelas_id)->get()->result()[0];
        }
        return $get;
    }

    function single($NIS){
        $g = $this->db->from($this->tbl)->where('NIS',$NIS)->get()->result()[0];
        $g->kelas = $this->db->from('kelas')->where('id',$g->kelas_id)->get()->result()[0];
        return $g;
    }

    function insert($data){
        $siswa = $this->db->insert($this->tbl,$data);

        if($siswa)
            return true;

        return false;
    }

    function update($data){
        $siswa = $this->db->replace($this->tbl,$data);

        if($siswa)
            return true;

        return false;
    }

    function delete($data){
        $siswa =  $this->db->delete($this->tbl,$data);

        if($siswa)
            return true;

        return false;
    }
}