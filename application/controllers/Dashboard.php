<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->user_model->checkLogined();
    }


    


    public function index(){
        $this->load_model->load();        
    }
    


    public function read($group,$weektype,$teacher_id=''){
        
        
    }

    public function add(){
      
    }

    public function delete(){
        $id=$this->input->post('delete_id',true);
        $ar=array(
            'msg'   =>'Dərs silindi',
            'status'=>false,
        );
        if(!empty($id)){
            $check=$this->schedules_model->read_row($id);
            if($check['user_id']==$this->user_model->userdata['id']){
                $this->schedules_model->delete($id);    
                $ar['status']=true;
            }
            else{
                $ar['msg']="Bu dərs sizin tərəfinizdən əlavə edilməyib !";
            }
        }
        echo json_encode($ar);
    }

    public function read_row(){
        $id=$this->input->post('id',true);
        if(!empty($id)){
            $result=$this->schedules_model->read_row($id);
            if($result){
                //$result['start']=rtrim($result['start'],':00');
                //$result['end']=rtrim($result['end'],':00');
                echo json_encode($result);
            }
        }
    }
}