<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class Product extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();  
		$this->load->model('admin_m');
		$this->load->model('logistics/product_m','pm');
		if($this->session->userdata('administrator')['level']!="logistics"){redirect("controlPanel/login/logout");}
	}

	function product($status)
	{
		//check login
		$session = $this->admin_m->get_login_admin2('LabSatu | Logistics', 'dashboard', 'dashboard');
		//part page
		$filename['page']="product";
		$filename['js']="js";
		//page content
		if($status==null) redirect('logistics/product/product/all');
		else if($status=='all') $general['page'] = "All Product";
		else $general['page'] = "Product ".ucfirst($status);

		$page=$this->uri->segment(5);

		$limit='10';if(!$page):$offset = 0;else:$offset = $page;endif;
		// print_r($limit);
		// die();
		$d['tot'] = $offset;
		$tot_hal = $this->pm->product_sum();
		$config=$this->get_data_pagging();
		$config['base_url'] = base_url() . 'logistics/product/product/'.$status;
		$config['total_rows'] = $tot_hal;
		$config['per_page'] = $limit;
		$config['uri_segment'] = 5;
		$config['num_links'] = 5;
		$this->pagination->initialize($config);
		$general['kurs_USD']=$this->mata_uang('USD', 'IDR', 1);
		$general['kurs_SGD']=$this->mata_uang('SGD', 'IDR', 1);
		$general['kurs_EUR']=$this->mata_uang('EUR', 'IDR', 1);
		// printf($general['kurs_EUR']);
		// die();
		$general["paginator"] =$this->pagination->create_links();
		$general['product'] = $this->pm->product($offset, $limit);
		// $general['address'] = $this->lm->customer_address();
		// var_dump($general['product']->result_array());
		// die();
		$this->template->backend($general,$filename,$session);
	}

	function inputProduct()
	{
		$session = $this->admin_m->get_login_admin2('LabSatu | Logistics', 'dashboard', 'dashboard');
		$filename['page'] = "inputProduct";
		$filename['js'] = "js";
		$general['page'] = "Input Product";
		$general['company'] = $this->pm->getCompany();
		$general['brand'] = $this->pm->getBrand();
		$general['category'] = $this->pm->getCategory();
		// $general['sub'] = $this->pm->getSubCategory();
		// print_r($general['category']);
		// die();

		$this->template->backend($general,$filename,$session);
	}

	function getSubCategory()
	{
		$query = "SELECT id,sub_category FROM sub_category where category_id='$_POST[kat]' order by sub_category";
		$sub = $this->db->query($query)->result_array();
		if($sub>0){
			echo"<option selected>--Choose Sub Category--</option>";
			foreach ($sub as $value) {
				echo "<option value=$value[id]>$value[sub_category]</option>";
			}
		}	
	}

	function updateStock($status)
	{
		// echo $status;
		// $stock = $this->input->post();
		$update = $this->pm->updateStock();
		if($update){
			$this->session->set_flashdata('benar','Data has been updated');
			redirect('logistics/product/product/'.$status);
		}else {
			$this->session->set_flashdata('salah','Data not updated, contact IT support');
			redirect('logistics/product/product/'.$status);
		}
	}

	function addProduct()
	{
		// echo "string";
		$relation = $this->admin_m->relation_number();
		$addProduct = $this->pm->addProduct($relation);
		if($addProduct){
			$this->session->set_flashdata('benar','Data has been added');
			redirect('logistics/product/inputProduct');
		}else {
			$this->session->set_flashdata('salah','Data not added, contact IT support');
			redirect('logistics/product/inputProduct');
		}
		// print_r($relation);
	}
}