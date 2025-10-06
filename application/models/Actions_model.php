<?php

class Actions_model extends CI_Model{
    private $table_name="actions";
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

    public function check_command($ar){
        extract($ar);
        $command="";

        if(!empty($m12) and ($m12>=50 and $m12<=145)){
            $command.="12,$m12 ";
        }

        if(!empty($m11) and ($m11>=105 and $m11<=133)){
            $command.="11,$m11 ";
        }

        if(!empty($m13) and ($m13>=40 and $m13<=92)){
            $command.="13,$m13 ";
        }

        if(!empty($m8) and ($m8>=100 and $m8<=150)){
            $command.="8,$m8 ";
        }

        if(!empty($m4) and ($m4>=72 and $m4<=122)){
            $command.="4,$m4 ";
        }

        if(!empty($m6) and ($m6>=68 and $m6<=126)){
            $command.="6,$m6 ";
        }

        if(!empty($m9) and ($m9>=50 and $m9<=120)){
            $command.="9,$m9 ";
        }

        if(!empty($m10) and ($m10>=130 and $m10<=160)){
            $command.="10,$m10 ";
        }

        $command=rtrim($command);
        return $command;
    }
}