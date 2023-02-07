<?php

use LDAP\Result;

defined('BASEPATH') OR exit('No direct script access allowed');

class Branch_user extends CI_Controller {

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
		$user_id=$this->session->userdata('user_id');
		if($user_id=="")
		{
			$this->load->view('login.php');
		}
		else
		{
			$data["table_data1"]=$this->db->get('branchuser_table')->result();
			$data["table_data"]=$this->db->query("select bu.*,b.name from branchuser_table bu inner join branch_table b on b.id=bu.buser")->result();
			$this->load->view('branch_user.php',$data);
		}
	}
	function insert()
	{
        $date=$this->input->post('date');
		$name=$this->input->post('name');
		$email=$this->input->post('email');
		$buser=$this->input->post('buser');
		
		$data = [
            'date'=>$date,
			'name' => $name,
			'email' => $email,
			'buser' => $buser
        ];
		$result=$this->db->insert('branchuser_table',$data);
		if($result)
		{
			echo('data is saved');
			
		}
		else
		{
			echo('data is not saved');
		}

	}
    function getdata ()
    {
        $id=$this->input->post('id');
        $data=$this->db->query("select * from branchuser_table where id=$id")->result()[0];
        echo json_encode($data);
    }
    function update()
    {
        $i=$this->input->post('id');
        $n=$this->input->post('name');
        $mail=$this->input->post('email');
		$busr=$this->input->post('buser');

        $data=$this->db->query("update branchuser_table SET name='$n', email='$mail', buser='$busr' where id='$i' ");
    }
	function delete()
	{
		$id=$this->input->post('id');
		$this->db->where('id',$id);
		$result=$this->db->delete('branchuser_table');
		if($result)
		{
			echo('corect');
		}
		else
		{
			echo('uncorect');
		}
	}
}
