<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model("static/user_model");
    }

    public function index(){
        $this->load->view("loginView");
    }

    public function submit() {
        
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required');
        
        $response=array(
            "message"=>'',
        );

        if ($this->form_validation->run() == FALSE) {
            $response['message']="Zəhmət olmasa xanaları doldurun !";
            $this->load->view('loginView',$response);
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
			$check_login=$this->user_model->set_login($username,$password);

            if ($check_login) {
                redirect(base_url().'dashboard');
            } else {
                $response['message']="Hesab tapılmadı !";
                $this->load->view("loginView",$response);
            }
        }
    }

    public function logout() {
        $this->user_model->set_logout();
        redirect(base_url());
    }
}
