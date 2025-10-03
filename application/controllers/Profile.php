<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Profile extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        $this->user_model->checkLogined();
        $this->load->model("static/user_model");
    }

    public function index(){
      

        $userdata=$this->user_model->get_userdata();
        $this->load_model->load("profileView",array('userdata'=>$userdata));
    }


    public function changeUserData(){
        $firstname      =$this->input->post('firstname',true);
        $lastname       =$this->input->post('lastname',true);
        $gender         =$this->input->post('gender',true);
        $birthday       =$this->input->post('birthday',true);
        $address        =$this->input->post('address',true);
        $email          =$this->input->post('email',true);
        $phone          =$this->input->post('phone',true);
       
        $response=array(
            'firstname'     =>'',
            'lastname'      =>'',
            'gender'        =>'',
            'birthday'      =>'',
            'address'       =>'',
            'email'         =>'',
            'phone'         =>'',
            'message'       =>'',
            'status'        =>false,
        );

        if(!empty($firstname) and !empty($lastname) and !empty($birthday) and !empty($email) and !empty($phone) and !empty($address)){

            $this->load->model("static/upload_model");
            $upload=$this->upload_model->upload_image();

            $ar=array(
                'firstname'     =>$firstname,
                'lastname'      =>$lastname,
                'email'         =>$email,
                'phone'         =>$phone,
                'gender'        =>$gender,
                'address'       =>$address,
                'birthday'      =>$birthday,
                'photo'         =>$upload!=false?$upload['base64_image']:'',
            );

            $this->user_model->changeUserData($ar);
            $response['status']=true;
            $response['message']="Düzəlişlər tətbiq edildi.";

            
        }
        else{
            $response['message']="Zəhmət olmasa *-lu xanaları doldurun !";
        }

        echo json_encode($response);


    }


    public function changePassword(){
        $currentpass        =$this->input->post('currentpass',true);
        $pass               =$this->input->post('pass',true);
        $retrypass          =$this->input->post('retrypass',true);

        $this->load->helper("password");

        $response=array(
            'message'       =>"",
            'status'        =>false,
        );

        if(generate_password($currentpass)==$this->user_model->userdata['password']){
            if(!empty($pass) and $pass==$retrypass){
                $this->user_model->changePassword($pass);
                $response['status']=true;
                $response['message']="Şifrəniz dəyişdirildi !";
            }
            else{
                $response['message']="Şifrələr eyni deyil !";
            }
        }
        else{
            $response['message']="Mövcut şifrəni səhv daxil etdiniz !";
        }

        echo json_encode($response);
        
    }

    public function readAllNoft(){
        $this->user_model->changeNotificationsStatus();
    }
    
}