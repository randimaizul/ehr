<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Admins extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }
	
	public function get_login()
	{
		if(!$this->session->userdata('logged_in'))
		{
			redirect('login', 'refresh');
		}
	}
	
	function index()
	{
		$this->get_login();
		$session_data = $this->session->userdata('logged_in');
		$data['email'] = $session_data['email'];
	    $data['kategori'] = $this->db->get('kategori');
		$data['sub_kategori'] = $this->db->get('sub_kategori');
		$data['foto_produk'] = $this->db->get('foto_produk');
		$data['title'] = "cart";
		$data['meta'] = "Labsatu.com tempatnya lab indonesia. Menyediakan Alat-alat Lab yang berlokasi di Jakarta";
		
		if (!$this->cart->contents()){
			$data['message'] = '<p>Your cart is empty!</p>';
		}else{
			$data['message'] = $this->session->flashdata('message');
		}
		
		//$data['cart'] = $this->cart->contents();

		$this->_view('cart', $data);
	}
	
	public function add()
	{
		$this->get_login();
		$product_id = $this->input->post('id_produk');
		$s1 = $this->input->post('kode_produk');
		$s2 = $this->input->post('harga_jual');
		$s3 = $this->input->post('nama_produk');
		
		//Check for valid product id
		//$query = $this->db->query("select * from produk where id_produk = '".$product_id."'");

		//foreach($query->result_array() as $xxx){
		//	$s1 = $xxx['kode_produk'];
		//	$s2 = $xxx['harga_jual'];
		//	$s3 = $xxx['nama_produk'];
		//	$s0 = $xxx['id_produk'];
		//}

		if($s1 != null && $s2 != null && $s3 != null)
		{
			//$item = $query->row();
			
			$data = array('id' =>  $s1,
						  'qty' => 1,
						  'price' => $s2,
						  'name' => $s3, 
						  );
			
			$this->cart->insert($data);
			//$this->show();
			redirect('cart', 'refresh');
		}	
	}
	
	
	public function add2()
	{
		$this->get_login();
		$product_id = $this->input->post('id_produk');
		
		//Check for valid product id
		$query = $this->db->query("select * from produk where id_produk = '".$product_id."'");

		foreach($query->result_array() as $xxx){
			$s1 = $xxx['kode_produk'];
			$s2 = $xxx['harga_jual'];
			$s3 = $xxx['nama_produk'];
			$s0 = $xxx['id_produk'];
		}

		if($query->num_rows() > 0)
		{
			$item = $query->row();
			
			$data = array('id' =>  $s1,
						  'qty' => 1,
						  'price' => $s2,
						  'name' => $s3, 
						  );
			
			$this->cart->insert($data);
			//$this->show();
			redirect('cart', 'refresh');
		}	
	}
	
	function show() 
	{
		$cart = $this->cart->contents();
		echo "<pre>";
		print_r($cart);
		
	}
	
	function remove($rowid) {
	$rowid= $this->uri->segment(3);
		if ($rowid=="all"){
			$this->cart->destroy();
		}else{
			$data = array(
				'rowid'   => $rowid,
				'qty'     => 0
			);

			$this->cart->update($data);
		}
		redirect('cart');
	}	

	function update_cart()
	{
		$this->get_login();
		$item = $this->input->post('rowid');
	    $qty = $this->input->post('qty');
		$count = $this->cart->total_items();
		
		for($i=0;$i<$count;$i++)
		{
			$data = array(
				'rowid'   => $item[$i],
				'qty'     => $qty[$i],
				
			);
			$this->cart->update($data);
			//echo  $item[$i];
			//echo "<br />";
			//echo $qty[$i];
			
		}
		//print($item);
		//echo "<br />";
		//echo $count;
		//print($item);
		redirect('cart');
	}
	function empty_cart()
	{
		$this->cart->destroy();
		redirect('cart');
	}
	
	public function _view($filename, $data) {
	
		$data2['kategori'] = $this->db->get('kategori');
		$data2['foto_produk'] = $this->db->get('foto_produk');
		$data2['sub_kategori'] = $this->db->query("select * from sub_kategori where status = '1' ");
		$data2['feature'] = $this->db->get('produk');
		$session_data = $this->session->userdata('logged_in');
		$data2['email'] = $session_data['email'];
		
        $this->load->view('web/template/header', $data);
		$this->load->view('web/template/nav', $data2);
		$this->load->view('web/'.$filename, $data);
        $this->load->view('web/template/footer');
    }
}

?>