<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Expences extends CI_Controller {

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
			$data['table_data']=$this->db->get('newexpence')->result();
			$this->load->view('expences.php',$data);
		}
	}
	function insert()
	{
		$date=$this->input->post('date');
		$detail =$this->input->post('detail');
		$amount =$this->input->post('amount');
		$data =[
			'date'=> $date,
			'detail'=> $detail,
			'amount'=> $amount
			
		];
		$result = $this->db->insert('newexpence',$data);
		if($result)
		{
			echo('true');
		}
		else
		{
			echo('false');
		}
	}
	function getdata()
	{
		$id=$this->input->post('id');
		$data=$this->db->query("select * from newexpence where id=$id")->result()[0];
		echo json_encode($data);
	}
	function update()
	{
		$i=$this->input->post('id');
		$dt=$this->input->post('date');
		$dtl=$this->input->post('detail');
		$amt=$this->input->post('amount');
		$data=$this->db->query("update newexpence SET date='$dt' , detail='$dtl' , amount='$amt' where id='$i'");
		echo('true');
	}
	function delete()
	{
		$id=$this->input->post('id');
		$this->db->where('id',$id);
		$result=$this->db->delete('	newexpence');
		if($result){
			echo('corect');
		}
		else{
			echo('uncorect');
		}

	}
}
