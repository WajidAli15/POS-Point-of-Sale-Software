<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sell_dashboard extends CI_Controller {

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
		$this->load->library('cart');
		$this->cart->destroy();
		$user_id=$this->session->userdata('user_id');
		if($user_id=="")
		{
			$this->load->view('login.php');
		}
		else
		{
		$data['table_data']=$this->db->query("select * from newproduct where buser='$user_id'")->result();
		
		$this->load->view('sell_dashboard.php',$data);
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


	//------- cart adds -----//
	function addtocart()
	{
		$id=$this->input->post('id');
		$data=$this->db->query("select * from newproduct where id='$id'")->result()[0];
		$this->load->library('cart');
		$data = array(
			'id'      => $data->id,
			'qty'     => 1,
			'price'   => $data->price,
			'name'    => $data->product,
		);
		$this->cart->insert($data);
	
		echo $this->view();
	}
	//------- cart adds -----//
	

	//------- cart adds -----//
	function lesstocart()
    {
		$this->load->library('cart');
            $id=$this->input->post('id');
    		$qty=$this->input->post('qty');
    		if (count($this->cart->contents())>0){
    			foreach ($this->cart->contents() as $item){
    				if ($item['id']==$id){
    					$data = array('rowid'=>$item['rowid'],
    					'qty'=>--$item['qty']);
    					$this->cart->update($data);
    
    				}
    			}
    		}        
            echo $this->view();    
     	
    }
	//------- cart adds -----//


	
	//----- cart show ----//
	function view()
	{	
		$output='
		<div class="row">
			<div class="col-lg-1 col-md-1 col-sm-1">
				<br>
				<h3 style="font-family: Bebas;">Order</h3>
			</div>
			
		';
		//----- cart show ----//

		//----- Set Quentity Coding -----// 
		$output.='
		<div class="col-lg-5 col-md-5 col-sm-5">
				<h6 style="font-family: Bebas;">ITEMS NAME</h6>';
				$count = 0;
				foreach($this->cart->contents() as $items)
				{
					$count+=$items["qty"];
					$output .= "
					<h6 style='font-family: 'Raleway', sans-serif'>".$items["qty"]. " x " .$items["name"]."</h6>";
				}
				//----- Set Quentity Coding -----//

				//----- Creating Carts Invoice Coding--------//  
				$output.='
			</div>
			<div class="col-lg-2 col-md-2 col-sm-2">
				<center>
				<h6 style="font-family: Bebas;">TOTAL ITEMS</h6>
					<h4 style="background: #ffffff;
					color: #333333;
					display: inline-block;
					padding: 3px 22px;
					border-radius: 30px 10px;">'.$count.'</h4>
				</center>
			</div>
			<div class="col-lg-2 col-md-2 col-sm-2">				
				<center>
				<h6 style="font-family: Bebas;">TOTAL PRICE</h6>
					<h4 style="background: #ffffff;
					color: #333333;
					display: inline-block;
					padding: 3px 22px;
					border-radius: 30px 10px;">Rs:'.$this->cart->total().'</h4>
				</center>
			</div>
			<div class="col-lg-1 col-md-1 col-sm-1">
			</div>
			<div class="col-lg-1 col-md-1 col-sm-1">
				<br>
				<button class="btn btn-success btn-block btnsave btn-sm" style="font-family: "Bebas";" id="btnsave">SAVE</button>
			</div>
		</div>
		';
		return $output;
		echo json_encode($output);   
		//----- Creating Carts Invoice Coding--------//
	}
	//----- cart ki data insert (Billing)------// 
	function insert()
	{
		$this->load->library('cart');
		//$datatime=$this->input->post('datetime');
		$data_billno=$this->db->query("SELECT(IFNULL(max(billno),0)+1) as field FROM salehead")->result()[0];
		$billno=$data_billno->field;
		$total=$this->cart->total();
		
		if ($ca= $this->cart->contents()) 
		   foreach ($ca as $item) {
			 $data = array(
				"billno"=>$billno,
				"pid"=>$item['id'],
				"qty"=>$item['qty'],
			 );
			 $this->db->insert("saledetail",$data);
			
		   }
		   $data2=[
			"billno"=>$billno,
			"total"=>$total,
		   ];
		$this->db->insert('salehead',$data2);
	}
	//----- cart ki data insert (Billing)------//

}

