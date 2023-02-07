<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Catagory extends CI_Controller {

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
			$data['table_data']=$this->db->get('catagory_table')->result();
			$this->load->view('catagory.php',$data);
		}
	}
	function insert()
	{
		$catagory=$this->input->post('catagory');
		$data=[
			'catagory'=>$catagory,
		];
		$result=$this->db->insert('catagory_table',$data);
		if($result)
		{
			echo('corect');
		}
		else{
			echo('data is not saved');
		}
	}
	function getdata()
	{
		$id=$this->input->post('id');
		$data=$this->db->query("select * from catagory_table where id=$id")->result()[0];
		echo json_encode($data);
	}
	function edit()
	{
		$id=$this->input->post('id');
		$this->db->where('id',$id);
		$data=$this->db->get('catagory_table')->result()[0];
		echo json_encode($data);
	}
	function update()
	{
		$id=$this->input->post('id');
		$catagory=$this->input->post('catagory');
	$data=[
		'catagory'=>$catagory,
	];
	$this->db->where('id',$id);
	$this->db->update('catagory_table',$data);
	echo('Correct');

	}
	function delete()
	{
		$id=$this->input->post('id');
		$this->db->where('id',$id);
		$result=$this->db->delete('catagory_table');
		if($result){
			echo('corect');
		}
		else{
			echo('uncorect');
		}
	}
}

