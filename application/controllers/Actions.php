<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Actions extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->user_model->checkAdminLogined();
        $this->load->model('actions_model');
        $this->load->helper("tcp");
    }

    public function index(){
        $results=$this->actions_model->read();
        $this->load_model->load('actionsView',array('results'=>$results));
    }

    public function add(){
        $title      =$this->input->post('title',true);
        $rep        =$this->input->post('rep',true);
        $id         =$this->input->post('id',true);

        $response=array(
            'title' =>'',
            'rep'   =>'',
            'status'=>false,
        );

        $command=$this->actions_model->check_command($_POST);

        if(!empty($title) and !empty($command)){
            $ar =array(
                'title'     =>$title,
                'rep'       =>(empty($rep)==true?1:$rep),
                'command'   =>$command,
            );
            
            $this->actions_model->add($ar,$id);
            $response['status']=true;
            send_tcp_data('reset');
            send_tcp_data($command);
        }
        else{
            $response['title']="Zəhmət olmasa *-lu xanaları doldurun !";
        }
        echo json_encode($response);
    }

    public function delete(){
        $id=$this->input->post('delete_id',true);
        if(!empty($id)){
            $this->actions_model->delete($id);
        }
        echo json_encode(array('status'=>true));
    }

    public function read_row(){
        $id=$this->input->post('id',true);
        if(!empty($id)){
            $result=$this->actions_model->read_row($id);
            if($result){
                echo json_encode($result);
            }
        }
    }

    public function test_device(){
        $key=$this->input->post('key',true);
        $value=$this->input->post('value',true);
        if(!empty($key) and !empty($value)){
            $ar=array($key=>$value);
            $command=$this->actions_model->check_command($ar);
            if(!empty($command)){
                send_tcp_data($command);
            }
        }
    }

    public function play_device(){
        $command=$this->input->post('command',true);
        if(!empty($command)){
            send_tcp_data($command);

        }
    }
   

}