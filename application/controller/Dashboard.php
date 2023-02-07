<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
		$date=date("Y/m/d");
		$user_id=$this->session->userdata('user_id');
		if($user_id=="")
		{
			$this->load->view('login.php');
		}
		else
		{
			$data['shop_info']=$this->db->query("select * from branch_table where id='1'")->result()[0];
			$data['table_data']=$this->db->query("select * from newproduct where buser='$user_id'")->result();
			$data['count_data2']=$this->db->query("select count(id) as id from branchuser_table")->result()[0];
			$data['count_product']=$this->db->query("select count(id) as id from newproduct")->result()[0];
			$data['count_catagory']=$this->db->query("select count(id) as id from catagory_table")->result()[0];
			$data['sum_total']=$this->db->query("select sum(total) as total from salehead where date='$date'")->result()[0];
			$data['count_bill']=$this->db->query("select count(id) as id from salehead where date='$date'")->result()[0];
			$data['sum_expence']=$this->db->query("select sum(amount) as amount from newexpence where date='$date'")->result()[0];
			$data['count_supplier']=$this->db->query("select count(id) as id from supplier_table")->result()[0];
			$this->load->view('dashboard.php',$data);
			
		}
	}	

	function shop_update()
	{
		$name=$this->input->post('name');
		$phone=$this->input->post('phone');
		$address=$this->input->post('address');
		
		$result=$this->db->query("update profile_table set name= '$name', phone= '$phone', address='$address' where id=1  ");
		if($result)
		{
			echo('data is saved');
			
		}
		else
		{
			echo('data is not saved');
		}

	}

	function profile_update()
	{
		$user_id = $this->session->userdata('user_id');
		$name=$this->input->post('name');
		$email=$this->input->post('email');
		$password=$this->input->post('password');
		
		$result=$this->db->query("update users_table set name= '$name', email= '$email', password='$password' where id='$user_id' ");
		if($result)
		{
			echo('data is saved');
			
		}
		else
		{
			echo('data is not saved');
		}

	}

		}

