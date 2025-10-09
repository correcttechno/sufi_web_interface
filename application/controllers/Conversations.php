<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Conversations extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->user_model->checkAdminLogined();
        $this->load->model('conversations_model');
        $this->load->model('actions_model');
    }

    public function index(){
        $results=$this->conversations_model->read();
        $actions=$this->actions_model->read();
        $this->load_model->load('conversationsView',array('results'=>$results,'actions'=>$actions));
    }

    public function add(){
        $question       =$this->input->post('question',true);
        $answer         =$this->input->post('answer',true);
        $sound          =$this->input->post('sound',true);
        $action_id      =$this->input->post('action_id',true);


        $id         =$this->input->post('id',true);

        $response=array(
            'question'  =>'',
            'answer'    =>'',
            'status'=>false,
        );

        if(empty($question)){
            $response['question']='Zəhmət olmasa sual daxil edin !';
        }

        if(empty($answer)){
            $response['answer']='Zəhmət olmasa cavab daxil edin !';
        }

        if(!empty($question) and !empty($answer)){
            $ar=array(
                'question'  =>$question,
                'answer'    =>$answer,
                'action_id' =>$action_id,
                'sound'     =>$sound,
            );

            $this->conversations_model->add($ar,$id);
            $response['status']=true;
        }
        
        echo json_encode($response);
    }

    public function delete(){
        $id=$this->input->post('delete_id',true);
        if(!empty($id)){
            $this->conversations_model->delete($id);
        }
        echo json_encode(array('status'=>true));
    }

    public function read_row(){
        $id=$this->input->post('id',true);
        if(!empty($id)){
            $result=$this->conversations_model->read_row($id);
            if($result){
                echo json_encode($result);
            }
        }
    }


    

}