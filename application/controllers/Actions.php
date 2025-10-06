<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Actions extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->user_model->checkAdminLogined();
        $this->load->model('actions_model');
    }

    public function index(){
        $results=$this->actions_model->read();
        $this->load_model->load('actionsView',array('results'=>$results));
    }

    public function add(){
        $title      =$this->input->post('title',true);
        $rep        =$this->input->post('rep',true);
        $id         =$this->input->post('id',true);

        $m12       =$this->input->post('m12',true);
        $m11       =$this->input->post('m11',true);
        $m13       =$this->input->post('m13',true);
        $m8        =$this->input->post('m8',true);
        $m4        =$this->input->post('m4',true);
        $m6        =$this->input->post('m6',true);
        $m9        =$this->input->post('m9',true);
        $m10       =$this->input->post('m10',true);

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

        $response=array(
            'title' =>'',
            'rep'   =>'',
            'status'=>false,
        );

        if(!empty($title) and !empty($rep)){
            $ar =array(
                'title'     =>$title,
                'rep'       =>$rep,
                'command'   =>$command,
            );

            $this->actions_model->add($ar,$id);


            $this->load->helper("tcp");
            send_tcp_data($command);

            $response['status']=true;
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


   

}