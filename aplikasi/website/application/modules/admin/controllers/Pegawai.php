<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pegawai extends MY_Controller {

	function __construct()
	{
		parent::__construct();  
		// $this->load->model('admin_m');
		// $this->load->model('labid/labid_m','lm');
		// if($this->session->userdata('administrator')['level']!="labid"){redirect("controlPanel/login/logout");}
	}

	function index(){
		// $session = $this->admin_m->get_login_admin2('LabSatu | Labid', 'dashboard', 'dashboard');
		$session = "";
		$filename['page']="index";
		$filename['js']="js";
		$general['page'] = "dashboard";
		$this->template->backend($general,$filename,$session);
	}

	function product($category){
		//check login
		$session = $this->admin_m->get_login_admin2('LabSatu | Labid', 'dashboard', 'dashboard');
		//part page
		$filename['page']=$category;
		$filename['js']="js";
		//page content
		$general['page'] = $category;
		$general['jenis'] = $this->lm->get_jenis();
		$general['sample'] = $this->lm->get_sample();
		$general['company'] = $this->lm->get_company();
		
		$page=$this->uri->segment(5);
		$limit='10';if(!$page):$offset = 0;else:$offset = $page;endif;
		$d['tot'] = $offset;
		$tot_hal = $this->lm->get_service_sum();
		$config=$this->get_data_pagging();
		$config['base_url'] = base_url() . 'labid/admin/product/'.$category;
		$config['total_rows'] = $tot_hal;
		$config['per_page'] = $limit;
		$config['uri_segment'] = 5;
		$config['num_links'] = 5;
		$this->pagination->initialize($config);
		$general["paginator"] =$this->pagination->create_links();
		$general['service'] = $this->lm->get_service($offset,$limit);
		
		$this->template->backend($general,$filename,$session);
	}

	function load_ajax_page($page){
		if($page=="service"){
			$general['service'] = $this->lm->get_service($offset="0",$limit="10");			
		} else if($page=="jenis") {
			$general['jenis'] = $this->lm->get_jenis();
		} else if($page=="sample"){
			$general['sample'] = $this->lm->get_sample();
		} else if($page=="service_modal"){
			$general['jenis'] = $this->lm->get_jenis();
			$general['sample'] = $this->lm->get_sample();			
			$general['company'] = $this->lm->get_company();
		}
		$this->load->view("ajax/ajax_".$page, $general);
	}

	function get_single_service(){
		if(!$this->input->is_ajax_request()){
       	 	show_404();
      	} else {			
          	if($this->lm->get_single_service()){
				$status = 'success';
      			$msg = 'Data successfully updated'; 
      			$data = $this->lm->get_single_service();
			} else {
				$status = 'error';
      			$msg = 'Data is not corect';
      			$data = '';
			}	        
	    	$this->output->set_content_type("application/json")->set_output(json_encode(array('status'=>$status,'msg'=>$msg, 'data'=>$data)));
		} 
	}

	function get_count_service(){
		if(!$this->input->is_ajax_request()){
       	 	show_404();
      	} else {
			$id = $this->input->post("id");
			$table = $this->input->post("category");

			if($id != null AND $table != null){
				$get_count_service = $this->lm->get_count_service($id, $table);
				if($get_count_service){
					$status = 'success';
          			$msg = 'Data found';
          			$data = $get_count_service->row('count');
				} else {
					$status = 'error';
          			$msg = 'something error, please contact administrator!';
          			$data = "-";
				}
			} else {
				$status = 'error';
          		$msg = 'something error, please contact administrator!'; 	
          		$data = '-';
			}

			$this->output->set_content_type("application/json")->set_output(json_encode(array('status'=>$status,'msg'=>$msg, 'data'=>$data)));
		}
	}

	function add_jenis(){
		if(!$this->input->is_ajax_request()){
       	 	show_404();
      	} else {
			$this->form_validation->set_rules('jenis', 'Jenis Uji', 'trim|required');
			if($this->form_validation->run() == false){
	          $status = 'error';
	          $msg = validation_errors(); 
	        } else {
	          	if($this->lm->add_jenis()){
					$status = 'success';
          			$msg = 'Data successfully updated'; 
				} else {
					$status = 'error';
          			$msg = 'Data is not corect'; 	
				}
	        }
	    	$this->output->set_content_type("application/json")->set_output(json_encode(array('status'=>$status,'msg'=>$msg)));
		} 
	}

	function add_sample(){
		if(!$this->input->is_ajax_request()){
       	 	show_404();
      	} else {
			$this->form_validation->set_rules('sample', 'Sample Uji', 'trim|required');
			if($this->form_validation->run() == false){
	          $status = 'error';
	          $msg = validation_errors(); 
	        } else {
	          	if($this->lm->add_sample()){
					$status = 'success';
          			$msg = 'Data successfully updated'; 
				} else {
					$status = 'error';
          			$msg = 'Data is not corect'; 	
				}
	        }
	    	$this->output->set_content_type("application/json")->set_output(json_encode(array('status'=>$status,'msg'=>$msg)));
		} 
	}

	function add_service(){
		if(!$this->input->is_ajax_request()){
       	 	show_404();
      	} else {
			$this->form_validation->set_rules('id_jenis', 'Jenis Uji', 'trim|required');
			$this->form_validation->set_rules('id_sample', 'Sample Uji', 'trim|required');
			$this->form_validation->set_rules('id_company', 'Company', 'trim|required');
			$this->form_validation->set_rules('normal_price', 'Normal Price', 'trim|required');
			if($this->form_validation->run() == false){
	          $status = 'error';
	          $msg = validation_errors(); 
	        } else {
	          	if($this->lm->add_service()){
					$status = 'success';
          			$msg = 'Data successfully updated'; 
				} else {
					$status = 'error';
          			$msg = 'Data is not corect or data is duplicate'; 	
				}
	        }
	    	$this->output->set_content_type("application/json")->set_output(json_encode(array('status'=>$status,'msg'=>$msg)));
		}
	}

	function edit_service(){
		if(!$this->input->is_ajax_request()){
       	 	show_404();
      	} else {
			$this->form_validation->set_rules('normal_price', 'Normal Price', 'trim|required');
			if($this->form_validation->run() == false){
	          $status = 'error';
	          $msg = validation_errors(); 
	        } else {
	          	if($this->lm->edit_service()){
					$status = 'success';
          			$msg = 'Data successfully updated'; 
				} else {
					$status = 'error';
          			$msg = 'Data is not corect or data is duplicate'; 	
				}
	        }
	    	$this->output->set_content_type("application/json")->set_output(json_encode(array('status'=>$status,'msg'=>$msg)));
		}
	}


	function update_status(){
		if(!$this->input->is_ajax_request()){
       	 	show_404();
      	} else {
			$id = $this->input->post("id");
			$status = $this->input->post("status");
			$table = $this->input->post("category");

			if($id != null AND $status != null AND $table != null){
				if($this->lm->update_status($id, $status, $table)){
					$status = 'success';
          			$msg = 'Data successfully updated'; 
				} else {
					$status = 'error';
          			$msg = 'Data failed updated'; 	
				}
			} else {
				$status = 'error';
          		$msg = 'Data is not corect'; 	
			}

			$this->output->set_content_type("application/json")->set_output(json_encode(array('status'=>$status,'msg'=>$msg)));
		}
	}

	function delete_uji(){
		if(!$this->input->is_ajax_request()){
       	 	show_404();
      	} else {
			$id = $this->input->post("id");
			$table = $this->input->post("category");

			if($id != null AND $table != null){
				if($this->lm->delete_uji($id, $table)){
					$status = 'success';
          			$msg = 'Data successfully deleted'; 
				} else {
					$status = 'error';
          			$msg = 'Data failed deleted'; 	
				}
			} else {
				$status = 'error';
          		$msg = 'Data is not corect'; 	
			}

			$this->output->set_content_type("application/json")->set_output(json_encode(array('status'=>$status,'msg'=>$msg)));
		}
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

		$this->template->backend($general,$filename,$session);
	}
}