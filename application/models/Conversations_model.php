<?php

class Conversations_model extends CI_Model{
    private $table_name="conversations";
    public function read(){
        $results=$this->database_model->read($this->table_name);
        return count($results)>0?$results:false;
    }

    public function delete($id){
        $this->database_model->delete($this->table_name,array('id'=>$id));
        return true;
    }

    public function add($data,$ch_id=0){
        if(!empty($ch_id)){
            $this->database_model->update($this->table_name,$data,array('id'=>$ch_id));
        }
        else{
            $this->database_model->insert($this->table_name,$data);    
        }
        
        return true;
    }

    public function read_row($id){
        $result=$this->database_model->read_row($this->table_name,array('id'=>$id));
        return count($result)>0?$result:false;
    }

}