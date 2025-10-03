<?php
class Database_model extends CI_Model{
    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function read($table,$ar=array('id!='=>0),$order=array('id','desc'),$limit=1000000,$start=0){
        $result=$this->db->where($ar)->order_by($order[0],$order[1])->limit($limit,$start)->get($table)->result_array();
        return $result!=null?$result:array();
    }

    public function read_row($table,$ar=array(),$order=array('id','desc')){
        $result=$this->db->where($ar)->order_by($order[0],$order[1])->get($table)->row_array();
        return $result!=null?$result:array();
    }

    public function read_in($table,$col,$ar=array()){
        $result=$this->db->where_in($col,$ar)->get($table)->result_array();
        return $result!=null?$result:array();
    }

    public function read_in_row($table,$col,$ar=array()){
        $result= $this->db->where_in($col,$ar)->get($table)->row_array();
        return $result!=null?$result:array();
    }

    public function query($sql){
        $result= $this->db->query($sql)->result_array();
        return $result!=null?$result:array();
    }

    public function query_row($sql){
        $result= $this->db->query($sql)->row_array();
        return $result!=null?$result:array();
    }
        
    public function insert($table,$ar){
        $this->db->insert($table,$ar);
        return $insert_id = $this->db->insert_id();
    }

    public function update($table, $ar, $ar2)
    {
        $this->db->where($ar2)->update($table, $ar);
    }

    public function delete($table, $ar)
    {
        $this->db->where($ar)->delete($table);
    }

}