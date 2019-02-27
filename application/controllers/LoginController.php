<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {
     public function __construct()
	{
		parent::__construct();
		// $this->load->model('CommonModel');
	}

  public function index()
  { 
       if($this->session->userdata('username'))
       {
         redirect('LoginController/dashboard');
       }
       
        if($this->input->post())
        {   

          $username=$this->input->post('name');
          $password=$this->input->post('password');
          $sql=$this->db->query("SELECT * FROM admin_details WHERE username='$username' AND password_hint='$password'")->result_array();
          if($sql)
          {
                $session_data=array(
                    'username'=>$username
                );
                $this->load->library('session');
                $this->session->set_userdata($session_data);
                redirect('LoginController/dashboard');
          }else 
          {
                redirect('LoginController/index');
          }
        }
    $this->load->view('login');
  }

  public function dashboard()
  {
    if($this->session->userdata('username')!= '')
   {      
    $this->load->view('include/header');
    $this->load->view('include/footer');
  }
  else
  {
    redirect('LoginController/index');
  }
  }

   public function logout()
  {
    $this->session->unset_userdata('username');
    redirect('LoginController/index');
  }
}




