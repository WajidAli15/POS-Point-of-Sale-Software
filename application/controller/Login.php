<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$this->load->view('login.php');
	}
    public function check()
	{

        $email=$this->input->post('email');
        $password=$this->input->post('password');
        $data=$this->db->query(' select * from users_table where email = "'.$email.'" and password = "'. $password.'" ')->result()[0];
        if( $data->email == $email || $data->password == $password )
        {
            echo('Corect');
			$this->session->set_userdata('user_id',$data->id);
        }
        else{
            echo('not ok');
        }
    }
	function logout()
	{
		session_destroy();
		$this->load->view('login.php');
	}
}
