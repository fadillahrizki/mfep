<?php

class Penilaian_model extends CI_Model{
    public $penilaian;
    public $guru_id;
    public $NIS;
    public $tbl = "penilaian";

    function count(){
        return $this->db->count_all($this->tbl);
    }

    function getItems($penilaian_id){
        $get = $this->db->from('penilaian_items')->where('penilaian_id',$penilaian_id)->get()->result();
        $total=0;
        foreach($get as $g){
            $g->kriteria = $this->db->where('id',$g->kriteria_id)->get('kriteria')->result()[0];
            $g->sub_kriteria = $this->db->where('id',$g->sub_kriteria_id)->get('sub_kriteria')->result()[0];
            $total += $g->sub_kriteria->nilai * $g->kriteria->bobot / 100 ;
        }

        $uT = $this->db->where('id',$penilaian_id)->set('total',$total)->update($this->tbl);

        if($uT){
            return $get;
        }
    }

    function get(){
        $this->db->from($this->tbl);
        if($this->session->user->level == "guru"){
            $get = $this->db->where('guru_id',$this->session->user->guru->id)->order_by('total','desc')->get()->result();
            foreach($get as $g){
                $g->siswa = $this->db->from('siswa')->where('NIS',$g->NIS)->get()->result()[0];
                $g->items = $this->getItems($g->id);
            }
        }else{
            $get = $this->db->order_by('total','desc')->get()->result();
            foreach($get as $g){
                $g->siswa = $this->db->from('siswa')->where('NIS',$g->NIS)->get()->result()[0];
                $g->items = $this->getItems($g->id);
            }
        }

        return $get;
    }

    function getByKelasId($kelas_id){
        $get = $this->db->where('kelas_id',$kelas_id)->order_by('total','desc')->get($this->tbl)->result();
        foreach($get as $g){
            $g->siswa = $this->db->from('siswa')->where('NIS',$g->NIS)->get()->result()[0];
            $g->items = $this->getItems($g->id);
        }
        return $get;
    }

    function single($id){
        return $this->db->from($this->tbl)->where('id',$id)->get()->result()[0];
    }

    function singleByKelasGuruNIS($kelas_id,$guru_id,$NIS){
        return $this->db->where('kelas_id',$kelas_id)->where('guru_id',$guru_id)->where('NIS',$NIS)->get($this->tbl)->result()[0];
    }

    function singleByNIS($NIS){
        $p = $this->db->where('NIS',$NIS)->get($this->tbl)->result()[0];
        $p->items = $this->getItems($p->id);
        return $p;
    }

    function insert($data){
        $penilaian = $this->db->insert($this->tbl,$data);

        if($penilaian)
            return true;

        return false;
    }

    function insertItem($data){
        $item = $this->db->insert('penilaian_items',$data);
        if($item)
            return true;

        return false;
    }

    function updateItem($data){
        $item = $this->db->replace('penilaian_items',$data);
        if($item)
            return true;

        return false;
    }

    function update($data){
        $penilaian = $this->db->replace($this->tbl,$data);

        if($penilaian)
            return true;

        return false;
    }

    function delete($data){
        $penilaian =  $this->db->delete($this->tbl,$data);

        if($penilaian)
            return true;

        return false;
    }
}