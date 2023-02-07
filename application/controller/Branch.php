<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Branch extends CI_Controller {

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
			$data["table_data"]=$this->db->query("select * from branch_table ")->result();
			$this->load->view('branch.php',$data);
		}
	}
	function insert()
	{
        $date=$this->input->post('date');
		$name=$this->input->post('name');
		$address=$this->input->post('address');
		$city=$this->input->post('city');
        $phone=$this->input->post('phone');
        $status=$this->input->post('status');
		$data = [
            'date'=>$date,
			'name' => $name,
			'address' => $address,
			'city' => $city,
            'phone' => $phone,
            'status' => $status
        ];
		$result=$this->db->insert('branch_table',$data);
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
        $data=$this->db->query("select * from branch_table where id=$id")->result()[0];
        echo json_encode($data);
    }
    function update()
    {
        $i=$this->input->post('id');
        $n=$this->input->post('name');
        $ad=$this->input->post('address');
        $ct=$this->input->post('city');
        $ph=$this->input->post('phone');
        $st=$this->input->post('status');

        $data=$this->db->query("update branch_table SET name='$n', address='$ad' , city='$ct' , phone='$ph' , status='$st' where id='$i' ");
    }
}
