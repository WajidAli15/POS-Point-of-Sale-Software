<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage_supplier extends CI_Controller {

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
			$data["table_data"]=$this->db->query("select * from supplier_table where user='$user_id'")->result();
			$this->load->view('manage_supplier.php',$data);
		}
	}
	function insert()
	{
		$user_id=$this->session->userdata('user_id');
		$name=$this->input->post('name');
		$address=$this->input->post('address');
        $phone=$this->input->post('phone');
		$data = [
			'name' =>$name,
			'address' =>$address,
            'phone' =>$phone,
			'user'=>$user_id

        ];
		$result=$this->db->insert('supplier_table',$data);
		if($result)
		{
			echo('correct');
			
		}
		else
		{
			echo('data is not saved');
		}

	}
    function getdata()
    {
        $id=$this->input->post('id');
        $data=$this->db->query("select * from supplier_table where id=$id")->result()[0];
        echo json_encode($data);
    }
    function update()
    {
        $i=$this->input->post('id');
        $n=$this->input->post('name');
        $ad=$this->input->post('address');
        $ph=$this->input->post('phone');

        $data=$this->db->query("update supplier_table SET name='$n', address='$ad' ,  phone='$ph' where id='$i' ");
    }
	function delete()
	{
		$id=$this->input->post('id');
		$this->db->where('id',$id);
		$result=$this->db->delete('supplier_table');
		if($result){
			echo('corect');
		}
		else{
			echo('uncorect');
		}

	}
}
