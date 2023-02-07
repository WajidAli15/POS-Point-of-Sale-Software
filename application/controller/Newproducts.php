<?php

use LDAP\Result;

defined('BASEPATH') OR exit('No direct script access allowed');

class Newproducts extends CI_Controller {

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
			$data['table_data2']=$this->db->get('catagory_table')->result();
			$data['table_data']=$this->db->get('newproduct')->result();
			$this->load->view('newproducts.php',$data);
		}
	}
    ///....insert function with image.....//
	function insert()
    {
		$user_id=$this->session->userdata('user_id');
		$config['upload_path']="./assets/product";
        $config['allowed_types']='gif|jpg|png|jpeg|PNG';
        $this->load->library('upload',$config);
        if($this->upload->do_upload("file")){
        $data = array('upload_data' => $this->upload->data());
        $data1 = array(
		'catagory'=>$this->input->post('catagory'),
        'product' => $this->input->post('pname'),
		'price'=>$this->input->post('price'),
		'buser' => $user_id,
        'img' => $data['upload_data']['file_name']
        );  
        $result= $this->db->insert('newproduct',$data1);
        if ($result == TRUE) {
            echo "true";
        }
        }
		
}

/*  insert ftn without image
    function insert()
    {
	$product =$this->input->post('product');
	$data= [
		'product'=> $product
	];
	$result=$this->db->insert('newproduct',$data);
	redirect(base_url());
	if ($result)
	{
		echo('data is saved');

	}
	else
	{
		echo('data is not saved');
	}
    } */
	//edit ftn
	function getdata()
	{
		$id=$this->input->post('id');
		$data=$this->db->query("select * from newproduct where id=$id")->result()[0];
		echo json_encode($data);
	}
		function update()
	{
		$id=$this->input->post('id');
		$catagory=$this->input->post('catagory');
		$product=$this->input->post('product');
		$price=$this->input->post('price');
		$img=$this->input->post('img');
		$data=$this->db->query("update newproduct SET cataory='$catagory' , product='$product' , price='$price' , img='$img' where id='$id'");
	}
	function delete()
	{
		$id=$this->input->post('id');
		$this->db->where('id',$id);
		$result=$this->db->delete('newproduct');
		if($result){
			echo('corect');
		}
		else{
			echo('uncorect');
		}
	}
}