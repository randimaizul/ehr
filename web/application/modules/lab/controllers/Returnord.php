<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class Returnord extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('admin_m');
		$this->load->model('logistics/product_m','pm');
		if($this->session->userdata('administrator')['level']!="logistics"){redirect("controlPanel/login/logout");}
	}
	function index()
	{
		$session = $this->admin_m->get_login_admin2('LabSatu | Logistics', 'dashboard', 'dashboard');
		$filename['page']="return";
		$filename['js']="js";
		$general['page'] = "Return Order";
		$general['kurs']=$this->mata_uang('USD', 'IDR', 1);
		$general['query'] = $this->db->get('customer_order');
		$general['produk'] = $this->db->get('merchant_product');
		$general['user_general'] = $this->db->get('customer_data');
		$query="SELECT co.id as id_order, co.total_rupiah as total, cd.first_name as name, 
					cc.no_resi as resi, cc.kondisi as kondisi, cc.keterangan as keterangan, cc.gambar as gambar
					FROM customer_order as co 
					JOIN customer_data as cd ON cd.id=co.customer_data_id
					JOIN customer_order_confirmation as cc ON cc.id_order=co.id
					WHERE confirmation = '1' AND cc.status='0'";
		$general['complain'] = $this->db->query($query);
		$this->template->backend($general,$filename,$session);
	}
}

?>