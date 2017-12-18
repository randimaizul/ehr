<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logistics extends MY_Controller {

	function __construct()
	{
		parent::__construct();  
		$this->load->model('admin_m');
		$this->load->model('logistics/logistics_m','lm');
		if($this->session->userdata('administrator')['level']!="logistics"){redirect("controlPanel/login/logout");}
	}

	function index(){
		$session = $this->admin_m->get_login_admin2('LabSatu | Logistics', 'dashboard', 'dashboard');
		$filename['page']="index";
		$filename['js']="js";
		$general['page'] = "dashboard";
		$this->template->backend($general,$filename,$session);
	}

	function order($status){
		//check login
		$session = $this->admin_m->get_login_admin2('LabSatu | Logistics', 'dashboard', 'dashboard');
		//part page
		$filename['page']="order";
		$filename['js']="js";
		//page content
		if($status==null) redirect('logistics/order/all');
		else if($status=='all') $general['page'] = "All Order";
		else $general['page'] = "Order ".ucfirst($status);

		$page=$this->uri->segment(4);

		$limit='10';if(!$page):$offset = 0;else:$offset = $page;endif;
		// print_r($limit);
		// die();
		$d['tot'] = $offset;
		$tot_hal = $this->lm->order_sum($status);
		$config=$this->get_data_pagging();
		$config['base_url'] = base_url() . 'logistics/order/'.$status;
		$config['total_rows'] = $tot_hal;
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['num_links'] = 4;
		$this->pagination->initialize($config);
		$general["paginator"] =$this->pagination->create_links();
		$general['order'] = $this->lm->order($status, $offset, $limit);
		// $general['address'] = $this->lm->customer_address();

		$this->template->backend($general,$filename,$session);
	}

	function orderDetail($status,$idOrder)
	{
		$session = $this->admin_m->get_login_admin2('LabSatu | Logistics', 'dashboard', 'dashboard');

		$filename['page']="orderDetail";
		$filename['js']="js";
		if($status=='all') $general['page'] = "All Order";
		else $general['page'] = ucfirst($status);

		$general['data'] = $this->lm->orderDetail($idOrder)->result_array();

		$this->template->backend($general,$filename,$session);
		// print_r($status);
	}

	function sendOrder($status){
		$send = $this->lm->send_order();
		if($send){
			$this->updateStatusOrder($send,"pengiriman");
			$this->session->set_flashdata('benar', 'Data has been updated');
			redirect('logistics/order/'.$status);
		}else {
			$this->session->set_flashdata('salah', 'Error, please call IT Support');
			redirect('logistics/order/'.$status);
		}
	}

	function updateStatusOrder($id,$status){
		$update = $this->lm->update_status_order($id,$status);
		if($update) return 1;
		else return 0;
	}

	function inputProduct($status)
	{
		$session = $this->admin_m->get_login_admin2('LabSatu | Logistics', 'dashboard', 'dashboard');
		$filename['page'] = "inputProduct";
		$filename['js'] = "js";
		$general['page'] = "Input Product";

		$this->template->backend($general,$filename,$session);
	}
}