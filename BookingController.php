<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Pcsbooking extends CI_Controller
{     
	public function __construct()     
	{         
		parent::__construct();  
		error_reporting(0);
		date_default_timezone_set('Asia/Kolkata');  
		$this->load->model('general_model');
		$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
		//$this->output->set_header("Expires: Mon, 26 Dec 2019 05:00:00 GMT");
	}
 
    public function index()
    {
		$this->db->from('retail_cloth');
		$this->db->where('service_type', 4);
		$query1 = $this->db->get();
		$retail_service_types =  $query1->result_array();
		$data['first_class_clothes'] = $retail_service_types;
		//$data[$retail_service_types][''] = $retail_service_types;
		
		
		$this->load->view("frontend/pcsbooking",$data);
    }
	
	
	public function empty_cart()
    {
		unset($_SESSION["cart"]);
		header('content-type: application/json');
		echo json_encode(array('success' => 'true'));
		return TRUE;		
    }
	
	public function remove_cart_item()
    {		
		if(isset($_POST["rowid"]))
		{
			unset($_SESSION["cart"][$_POST["rowid"]]);
			
			// CALCULATE CART TOTAL
			foreach($_SESSION['cart'] as $key=>$val) 
			{ 
				$a[$key] += $val['total_cost'];
				$_SESSION['cart']['ct'] = array_sum($a);
			} 
			
			header('content-type: application/json');
			echo json_encode(array('success' => 'true'));
            return TRUE;			
		}
    }
		
	
	function cart() 
	{	
		if($_POST['action']=='add_to_cart')
		{
			$this->db->select('*');
			$this->db->from('retail_cloth');
			$this->db->where('service_type', 4);
			$this->db->where('id',$_POST['rowid']);
			$chk = $this->db->get()->result_array();
			
			// ADD ITEMS TO CART SESSION VARIABLE
			$_SESSION['cart'][$chk[0]['id']] = array
			(
				"product_id"	=>	$chk[0]['id'],	  
				"quantity"		=>	$_POST['qty'],
				"product_name"	=>	$chk[0]['cloth_name'],
				"product_cost"	=>	$chk[0]['price'],
				"total_cost"	=>	$chk[0]['price']*$_POST['qty']
			);		  		 		 
            
			// REMOVE CART ITEMS FROM SESSION WITH ITEM QUANTITY 0
			if($_SESSION['cart'][$_POST['id']]['quantity'] == 0)
			{	 
				unset($_SESSION['cart'][$_POST['id']]);	
			}
            // CALCULATE CART TOTAL
			foreach($_SESSION['cart'] as $key=>$val) 
			{ 
				$a[$key] += $val['total_cost'];
				$_SESSION['cart']['ct'] = array_sum($a);
			} 

			$data1 = array( 
				'product_cost' => $price,
				'qty' => $_POST['qty'],
				'cart_total' => $_SESSION['ct']	
			);
			$msg = array_merge($data1,$data2);
			header('content-type: application/json');
			echo json_encode($msg);
			return TRUE;
		}
	}
}
