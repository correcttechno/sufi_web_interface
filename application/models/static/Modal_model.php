<?php

class Modal_model extends CI_Model{

    public function delete($url){
        $this->load->view("static/deletemodalView",array('url'=>$url));
    }

    public function alert($content,$action_url,$success_btn="Təsdiq et",$error_btn="Ləğv et"){
        $this->load->view("static/alertmodalView",array('content'=>$content,'url'=>$action_url,'success'=>$success_btn,'error'=>$error_btn));
    }

}