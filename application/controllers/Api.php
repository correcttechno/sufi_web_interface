<?php

class Api extends CI_Controller{

    public function run(){
        $text=$this->input->post('text',true);
        $response=array(
            'staus'=>false,
            'msg'  =>'',
        );
        if(!empty($text)){

        }
        else{
            $response['msg']="Text is not empty";
        }

        echo json_encode($response);
    }

}