<?php

class Api extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->load->model('api_model');
        $this->load->model('actions_model');
        $this->load->helper('tcp');
    }

    public function run(){
        $text=$this->input->get('text',true);
        $response=array(
            'status'=>false,
            'msg'  =>'',
            'filepath'=>'',
        );
        if(!empty($text)){
            $result=$this->api_model->search_conversation($text);
            if(count($result)>0){
                $response['filepath']=base_url('uploads/sounds/'.$result['sound'].'.wav');
                $response['status']=true;
                $action=$this->actions_model->read_row($result['action_id']);
                if(count($action)>0){
                    send_tcp_data($action['command']);
                }
            }
            else{
                $response['msg']="Command not found";
            }
        }
        else{
            $response['msg']="Text is not empty";
        }

        echo json_encode($response);
    }

}