<?php

class Api_model extends CI_Model{

    public function search_conversation($text){
        $this->db->like('question',$text,'both');
        $this->db->order_by('id','desc');
        $result=$this->db->get('conversations')->row_array();
        return $result!=null?$result:array();
    }


    public function add_conversation($text){
        $ar=array('word'=>$text);
        $this->database_model->insert("undefineds",$ar);
        return true;
    }

}

?>