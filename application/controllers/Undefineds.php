<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Undefineds extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->user_model->checkAdminLogined();
        $this->load->model('undefineds_model');
    }

    public function index(){
        $results=$this->undefineds_model->read();
        $this->load_model->load('undefinedsView',array('results'=>$results));
    }

    public function add(){
        $title      =$this->input->post('title',true);
        $id         =$this->input->post('id',true);

        $response=array(
            'title'=>'',
            'status'=>false,
        );

        if(!empty($title)){
            $ar=array('title'=>$title);
            $this->undefineds_model->add($ar,$id);
            $response['status']=true;
        }
        else{
            $response['title']="Zəhmət olmasa xanaları doldurun !";
        }
        echo json_encode($response);
    }

    public function delete(){
        $id=$this->input->post('delete_id',true);
        if(!empty($id)){
            $this->undefineds_model->delete($id);
        }
        echo json_encode(array('status'=>true));
    }

    public function read_row(){
        $id=$this->input->post('id',true);
        if(!empty($id)){
            $result=$this->undefineds_model->read_row($id);
            if($result){
                echo json_encode($result);
            }
        }
    }

    

}