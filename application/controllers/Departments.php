<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Departments extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->user_model->checkAdminLogined();
        $this->load->model('departments_model');
    }

    public function index(){
        $results=$this->departments_model->read();
        $this->load_model->load('departmentsView',array('results'=>$results));
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
            $this->departments_model->add($ar,$id);
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
            $this->departments_model->delete($id);
        }
        echo json_encode(array('status'=>true));
    }

    public function read_row(){
        $id=$this->input->post('id',true);
        if(!empty($id)){
            $result=$this->departments_model->read_row($id);
            if($result){
                echo json_encode($result);
            }
        }
    }

    

}