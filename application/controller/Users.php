<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		
		$this->load->view('users.php');
	}
	function insert()
	{
		$name=$this->input->post('name');
		$email=$this->input->post('email');
		$password=$this->input->post('password');
		$data = [
			'name' => $name,
			'email' => $email,
			'password' => $password
        ];
		$checking=$this->db->query("select email from users_table where email='$email'");
		$row=$checking->num_rows();
		if($row)
		{
			echo('Matched');
		}
		else
		{
			$result=$this->db->insert('users_table',$data);
			
				echo('Correct');
			
		}
		

	}
}
