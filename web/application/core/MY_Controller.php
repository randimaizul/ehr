<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if (version_compare(CI_VERSION, '2.1.0', '<')) {
            $this->load->library('security');
        }
		//$this->load->model('user_m');
	}
	
	public function _viewIndex3($filename, $data) {
		//$this->output->cache(2);
		$data['kurs']=$this->mata_uang('USD', 'IDR', 1);
		$tot_item=0; $tot_harga=0; 
		$data['tot_harga']=0;
		$cart = $this->cart->contents();
		{  
			foreach($cart as $item) { $tot_item=$tot_item+$item['qty'];
			$t=$item['qty']*($item['price']-($item['price']*($item['discount']/100)));
			$data['tot_harga']=$data['tot_harga']+$t;
		}
	}
	$data['tot_item']=$tot_item;
	$data['kategori'] = $this->db->query("select id_kategori, nama_kategori from kategori where nama_kategori NOT IN ('Services') and status='1' order by  id_kategori asc");
	$data['sub_kategori'] = $this->db->query("select id_sub_kategori, id_kategori, nama_sub_kategori from sub_kategori order by  nama_sub_kategori asc");
	$data['meta'] = "LabSatu adalah Belanja online alat laboratorium, alat kesehatan, bahan reagen kimia, ready stok , lengkap dengan catalog dan review product";
	$data['keywords'] = "";
	$this->load->view('mobile/template/header', $data);
	$this->load->view('mobile/'.$filename, $data);
	$this->load->view('mobile/template/footer', $data);
}


public function _viewIndex2($filename, $data) {

		//$this->output->cache(1);
	$data['kurs']=$this->mata_uang('USD', 'IDR', 1);
	$tot_item=0; $tot_harga=0; 
	$data['tot_harga']=0;
	$cart = $this->cart->contents();
	{  
		foreach($cart as $item) { $tot_item=$tot_item+$item['qty'];
		$t=$item['qty']*($item['price']-($item['price']*($item['discount']/100)));
		$data['tot_harga']=$data['tot_harga']+$t;
	}
}
$data['tot_item']=$tot_item;
$data['kategori'] = $this->db->query("select id_kategori, nama_kategori from kategori where nama_kategori NOT IN ('Services') and status='1' order by  id_kategori asc");
$this->load->view('web2/template/header', $data);
$this->load->view('web2/'.$filename, $data);
$this->load->view('web2/template/footer', $data);
}



public function _view2($filename, $data) {
		//$this->output->cache(2);
	$data['kurs']=$this->mata_uang('USD', 'IDR', 1);
	$tot_item=0; $tot_harga=0; 
	$data['tot_harga']=0;
	$cart = $this->cart->contents();
	{  
		foreach($cart as $item) { $tot_item=$tot_item+$item['qty'];
		$t=$item['qty']*($item['price']-($item['price']*($item['discount']/100)));
		$data['tot_harga']=$data['tot_harga']+$t;
	}
}
$data['tot_item']=$tot_item;
$data['kategori'] = $this->db->query("select * from kategori where nama_kategori NOT IN ('Services') and status='1' order by id_kategori asc");
$this->load->view('web2/template/header', $data);
$this->load->view('web2/'.$filename, $data);
$this->load->view('web2/template/footer', $data);
}
public function get_session()
{	
	$session_data = $this->session->userdata('logged_in');
	
	$data = array(
		'status' => $session_data['status'],
		'email' => $session_data['email'],
		'id' => $session_data['id'],
		'active' => "active",
		);
	return $data;
}

public function get_login()
{
	if(!$this->session->userdata('logged_in2'))
	{
		redirect('login', 'refresh');
	}
}

public function get_login_admin()
{
	if(!$this->session->userdata('logged_in'))
	{
		redirect('login', 'refresh');
	}
	$session_data = $this->session->userdata('logged_in');
	$data['status'] = $session_data['client'];
	if($data['status']!='client')
	{
		redirect('adminlabsatu', 'refresh');
	}
}

public function get_login_client()
{
	if(!$this->session->userdata('logged_in'))
	{
		redirect('login', 'refresh');
	}
	$session_data = $this->session->userdata('logged_in');
	$data['status'] = $session_data['client'];
	if($data['status']!='client')
	{
		redirect('adminlabsatu', 'refresh');
	}
}

public function get_login_user()
{
	if(!$this->session->userdata('logged_in2'))
	{
		redirect('login', 'refresh');
	}
	$session_data = $this->session->userdata('logged_in2');
	if($session_data['email'])
	{
		redirect('home', 'refresh');
	}
}
public function get_login_kontes()
{
	if(!$this->session->userdata('logged_in3'))
	{
		redirect('kontesfoto', 'refresh');
	}
	$session_data = $this->session->userdata('logged_in3');
	if($session_data['email'])
	{
		redirect('kontesfoto', 'refresh');
	}
}

public function add($s1, $s2)
{
		//$this->get_login();
	if($s1!=''){
		foreach($this->ambil1('merchant_product_detail', 'id', $s1)->result() as $q)
			foreach($this->ambil1('merchant_product', 'id', $q->merchant_product_id)->result() as $q2)
				$data = array(
					'id' =>  $q->id, 
					'produk_id' => $q->merchant_product_id, 
					'merchant_product_id' => $q->id,
					'discount'=>$q->discount,
					'qty' => $s2, 
					'price' => $q->price, 
					'name' => preg_replace(array('/\s*,\s*/','|/|'), ' - ', $q2->product), 
					'berat' => $q->weight, 
					'kode' => $q->code, 
					'client_id' => $q2->merchant_data_id, 
					'currency' => $q->currency);
			//echo "<pre>";
			//print_r($data);
			if($this->cart->insert($data)) {
				//echo "<pre>";
				//print_r($this->cart->contents());
				return true;
			} else {
				return false;
			}
		} 
		else return false;
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
			
		}
		redirect('cart');
	}
	
	function empty_cart()
	{
		$this->cart->destroy();
		//redirect('cart');
	}
	
	public function mata_uang($mata_uang, $cur, $jum)
	{
		$from_Currency =$mata_uang;
		$to_Currency = $cur;				
		$tot=$jum;
		$amount = urlencode($tot);
		$from_Currency = urlencode($from_Currency);
		$to_Currency = urlencode($to_Currency);
		$url = "http://finance.google.com/finance/converter?a=$amount&from=$from_Currency&to=$to_Currency";
		$ch = curl_init();
		$timeout = 0;
		curl_setopt ($ch, CURLOPT_URL, $url);
		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt ($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1)");
		curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
		$rawdata = curl_exec($ch);
		curl_close($ch);
		$data = explode('bld>', $rawdata);
		$data = explode($to_Currency, $data[1]);
		$kurs = floatval ($data[0]);	
		
		return $kurs;
	}
	
	public function getDefault($select, $table, $order_by, $limit)
	{
		$query = $this->db->query("select ".$select." from ".$table." ".$order_by." ".$limit."");	
		if($query){ return $query; }
		else return false;
	}
	
	
	public function getDefaultX($select, $table, $id, $id_p)
	{
		$query = $this->db->query("select ".$select." from ".$table." where ".$id."='".$id_p."'");	
		if($query){ return $query; }
		else return false;
	}
	
	public function ambilSemua($table)
	{
		$query = $this->db->query("select * from ".$table."");	
		if($query){ return $query; }
		else return false;
	}
	
	public function ambilX($table, $id_p, $id)
	{
		$query = $this->db->query("select * from ".$table." where ".$id_p."='".$id."'");	
		if($query){ return $query; }
		else { return false; }
	}

	public function ambilLimit($table, $id_p, $id, $limit, $order_by)
	{
		$query = $this->db->query("select * from ".$table." where ".$id_p."='".$id."' limit ".$limit." ".$order_by);	
		if($query){ return $query; }
		else return false;
	}
	public function ambil_1_order($table, $id_p, $id, $order_by)
	{
		if($table == "customer_quotation"){
			$query = $this->db->query("select * from ".$table." where ".$id_p."='".$id."' AND status_q='1' order by  ".$order_by." ");	
			if($query){ return $query; }
			else return false;
		} else { 
			$query = $this->db->query("select * from ".$table." where ".$id_p."='".$id."' order by  ".$order_by." ");	
			if($query){ return $query; }
			else return false;
		}
	}
	
	
	public function ambil1($table, $id_p, $id)
	{
		$query = $this->db->query("select * from ".$table." where ".$id_p."='".$id."'");
		if($query){ return $query; }
		else { return false; }
	}
	public function ambil11($table, $id_p, $id)
	{
		$query = $this->db->query("select * from ".$table." where ".$id_p."='".$id."'");	
		if($query->num_rows() > 0){ return $query; } else { return false; }
	}
	
	public function ambil2($table, $id_p, $id, $id_p2, $id2)
	{
		$query = $this->db->query("select * from ".$table." where ".$id_p."='".$id."' and ".$id_p2."='".$id2."'");	
		if($query){ return $query; }
		else return false;
	}
	
	public function ambil3($table, $id_p, $id, $id_p2, $id2, $id_p3, $id3)
	{
		$query = $this->db->query("select * from ".$table." where ".$id_p."='".$id."' and ".$id_p2."='".$id2."' and ".$id_p3."='".$id3."'");	
		if($query){ return $query; }
		else return false;
	}
	
	public function delete_value($table, $id, $id2)
	{
		$this->db->where($id2, $id);
		$this->db->delete($table); 
	}
	function login_a($email, $password)
	{
		$this->db->select('id, email, password, first_name');
		$this->db->from('customer_data');
		$this->db->where('email', $email);
		$this->db->where('password', MD5($password));
		$this->db->limit(1);
		$query=$this->db->get();

		if($query->num_rows()==1)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}
	function login_ax($email)
	{
		$this->db->select('id, email, password, first_name, status');
		$this->db->from('customer_data');
		$this->db->where('email', $email);
	   //$this->db->where('status', 'valid');
		$this->db->limit(1);
		$query=$this->db->get();
		if($query->num_rows()>0){
			return array("success"=>false, "data"=>$query->row(), "valid"=>$query->row("status"));
		} else {
			return array("success"=>true);
		}
	}
	function login_bx($email)
	{
		$this->db->select('email');
		$this->db->from('merchant_data');
		$this->db->where('email', $email);
		$this->db->limit(1);
		$query=$this->db->get();

		if($query->num_rows()==1)
		{
			return false;
		}
		else
		{
			return true;
			
		}
	}
	
	function autonumber_q()
	{		
		$awalan  = "LS";
		$lebar = 6;

		$hasil=  $this->db->query("select id from customer_quotation order by id desc limit 1");
		$jumlahrecord = $hasil->num_rows();
		if($jumlahrecord == 0)
			$nomor=1;
		else
		{
			foreach ($hasil->result() as $rows){
				$row['id_quotation'] = $rows->id;
			}
			$nomor=intval(substr($row['id_quotation'],strlen($awalan)))+1;
		}
		if($lebar>0)
			$angka = $awalan.str_pad($nomor,$lebar,"0",STR_PAD_LEFT);
		else
			$angka = $awalan.$nomor;
		
		return $angka;
	}
	function autonumber_p()
	{		
		$awalan  = "PR";
		$lebar = 6;

		$hasil=  $this->db->query("select id_primer_detail from primer_detail order by id_primer_detail desc limit 1");
		$jumlahrecord = $hasil->num_rows();
		if($jumlahrecord == 0)
			$nomor=1;
		else
		{
			foreach ($hasil->result() as $rows){
				$row['id_primer_detail'] = $rows->id_primer_detail;
			}
			$nomor=intval(substr($row['id_primer_detail'],strlen($awalan)))+1;
		}
		if($lebar>0)
			$angka = $awalan.str_pad($nomor,$lebar,"0",STR_PAD_LEFT);
		else
			$angka = $awalan.$nomor;
		
		return $angka;
	}
	
	function autonumber_s()
	{		
		$awalan  = "SQ";
		$lebar = 6;

		$hasil=  $this->db->query("select id_sequencing_data from sequencing_data order by id_sequencing_data desc limit 1");
		$jumlahrecord = $hasil->num_rows();
		if($jumlahrecord == 0)
			$nomor=1;
		else
		{
			foreach ($hasil->result() as $rows){
				$row['id_sequencing_data'] = $rows->id_sequencing_data;
			}
			$nomor=intval(substr($row['id_sequencing_data'],strlen($awalan)))+1;
		}
		if($lebar>0)
			$angka = $awalan.str_pad($nomor,$lebar,"0",STR_PAD_LEFT);
		else
			$angka = $awalan.$nomor;
		
		return $angka;
	}
	
	function autonumber_servie()
	{		
		$awalan  = "SV";
		$lebar = 6;

		$hasil=  $this->db->query("select id_order from servie_user_order order by id_order desc limit 1");
		$jumlahrecord = $hasil->num_rows();
		if($jumlahrecord == 0)
			$nomor=1;
		else
		{
			foreach ($hasil->result() as $rows){
				$row['id_order'] = $rows->id_order;
			}
			$nomor=intval(substr($row['id_order'],strlen($awalan)))+1;
		}
		if($lebar>0)
			$angka = $awalan.str_pad($nomor,$lebar,"0",STR_PAD_LEFT);
		else
			$angka = $awalan.$nomor;
		
		return $angka;
	}
	
	function autonumber_ujilab()
	{		
		$awalan  = "UL";
		$lebar = 6;

		$hasil=  $this->db->query("select id_order from ujilab_order order by id_order desc limit 1");
		$jumlahrecord = $hasil->num_rows();
		if($jumlahrecord == 0)
			$nomor=1;
		else
		{
			foreach ($hasil->result() as $rows){
				$row['id_order'] = $rows->id_order;
			}
			$nomor=intval(substr($row['id_order'],strlen($awalan)))+1;
		}
		if($lebar>0)
			$angka = $awalan.str_pad($nomor,$lebar,"0",STR_PAD_LEFT);
		else
			$angka = $awalan.$nomor;
		
		return $angka;
	}
	
	
	function autonumber_merchant()
	{		
		{		
			$awalan  = "MR";
			$lebar = 6;

			$hasil=  $this->db->query("select id_primer_detail from primer_detail order by id_primer_detail desc limit 1");
			$jumlahrecord = $hasil->num_rows();
			if($jumlahrecord == 0)
				$nomor=1;
			else
			{
				foreach ($hasil->result() as $rows){
					$row['id_primer_detail'] = $rows->id_primer_detail;
				}
				$nomor=intval(substr($row['id_primer_detail'],strlen($awalan)))+1;
			}
			if($lebar>0)
				$angka = $awalan.str_pad($nomor,$lebar,"0",STR_PAD_LEFT);
			else
				$angka = $awalan.$nomor;
			
			return $angka;
		}
	}
	
	function autonumber()
	{		
		$awalan  = "Q";
		$lebar = 4;

		$hasil=  $this->db->query("select id from customer_order order by id desc limit 1");
		$jumlahrecord = $hasil->num_rows();
		if($jumlahrecord == 0)
			$nomor=1;
		else
		{
			foreach ($hasil->result() as $rows){
				$row['id_order'] = $rows->id;
			}
			$nomor=intval(substr($row['id_order'],strlen($awalan)))+1;
		}
		if($lebar>0)
			$angka = $awalan.str_pad($nomor,$lebar,"0",STR_PAD_LEFT);
		else
			$angka = $awalan.$nomor;
		
		return $angka;
	}
	
	function getCaptcha()
	{
		$vals = array(
			'img_path'	 => './captcha/',
			'img_url'	 => base_url().'captcha/',
			'font_path' => './system/fonts/arial.ttf',
			'img_width' => '100',
			'img_height' => 50,
			'expiration' => 7200
			);
		$cap = create_captcha($vals);
		
		return $cap;
	}
	
	function insert_product_view($id)
	{
		$data_x = array(
			'ip_address' => $this->input->ip_address(),
			'produk_id' => $id,
			'tanggal_input' => date('d-m-Y H:i:s', NOW())
			);
		$this->db->insert('product_view', $data_x);
	}
	
	function bulan($bulan)
	{
		Switch ($bulan){
			case 01 : $bulan="Januari";
			Break;
			case 02 : $bulan="Februari";
			Break;
			case 03 : $bulan="Maret";
			Break;
			case 04 : $bulan="April";
			Break;
			case 05 : $bulan="Mei";
			Break;
			case 06 : $bulan="Juni";
			Break;
			case 07 : $bulan="Juli";
			Break;
			case 08 : $bulan="Agustus";
			Break;
			case 09 : $bulan="September";
			Break;
			case 10 : $bulan="Oktober";
			Break;
			case 11 : $bulan="November";
			Break;
			case 12 : $bulan="Desember";
			Break;
		}
		return $bulan;
	}
	
	function pagging($page, $limit, $query, $url, $uri_segment, $query2)
	{
		$limit='12';
		if(!$page):
			$offset = 0;
		else:
			$offset = $page;
		endif;
		
		$d['tot'] = $offset;
		$tot_hal = $this->db->query($query);
		$config['base_url'] = $url;
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = $uri_segment;
		$config['num_links'] = 3;
		$config['full_tag_open'] = "<ul class='pagination pagination-sm no-margin pull-right'>";
		$config['full_tag_close'] ="</ul>";
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
		$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
		$config['next_tag_open'] = "<li>";
		$config['next_tagl_close'] = "</li>";
		$config['prev_tag_open'] = "<li>";
		$config['prev_tagl_close'] = "</li>";
		$config['first_tag_open'] = "<li>";
		$config['first_tagl_close'] = "</li>";
		$config['last_tag_open'] = "<li>";
		$config['last_tagl_close'] = "</li>";
		$this->pagination->initialize($config);
		$data["paginator"] =$this->pagination->create_links();
		$query3=$query2." ".$offset.",".$limit."";
		$data['query'] = $this->db->query($query3);
		$data['total_hal']=$tot_hal->num_rows(); 
		
		return $data;
	}
	function login_kontes($email)
	{
		$this->db->select('email');
		$this->db->from('kontes');
		$this->db->where('email', $email);
		$this->db->limit(1);
		$query=$this->db->get();

		if($query->num_rows()==1)
		{
			return false;
		}
		else
		{
			return true;
			
		}
	}
	function get_data_pagging()
	{
		$config['full_tag_open'] = "<ul class='pagination pagination-sm no-margin pull-right'>";
		$config['full_tag_close'] ="</ul>";
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
		$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
		$config['next_tag_open'] = "<li>";
		$config['next_tagl_close'] = "</li>";
		$config['prev_tag_open'] = "<li>";
		$config['prev_tagl_close'] = "</li>";
		$config['first_tag_open'] = "<li>";
		$config['first_tagl_close'] = "</li>";
		$config['last_tag_open'] = "<li>";
		$config['last_tagl_close'] = "</li>";
		
		return $config;
	}
	
	public function getChart()
	{
		 // Month
		$b1=date('m-Y', NOW());
		$b2=date('m', NOW());
		$b3=date('Y', NOW());
		
		$data['jan']=$this->db->query("SELECT id_quotation FROM `quotation_admin` WHERE tanggal_input like '%01-".$b3."'");
		$data['feb']=$this->db->query("SELECT id_quotation FROM `quotation_admin` WHERE tanggal_input like '%02-".$b3."'");
		$data['mar']=$this->db->query("SELECT id_quotation FROM `quotation_admin` WHERE tanggal_input like '%03-".$b3."'");
		$data['apr']=$this->db->query("SELECT id_quotation FROM `quotation_admin` WHERE tanggal_input like '%04-".$b3."'");
		$data['mei']=$this->db->query("SELECT id_quotation FROM `quotation_admin` WHERE tanggal_input like '%05-".$b3."'");
		$data['jun']=$this->db->query("SELECT id_quotation FROM `quotation_admin` WHERE tanggal_input like '%06-".$b3."'");
		$data['jul']=$this->db->query("SELECT id_quotation FROM `quotation_admin` WHERE tanggal_input like '%07-".$b3."'");
		$data['ags']=$this->db->query("SELECT id_quotation FROM `quotation_admin` WHERE tanggal_input like '%07-".$b3."'");
		$data['sep']=$this->db->query("SELECT id_quotation FROM `quotation_admin` WHERE tanggal_input like '%09-".$b3."'");
		$data['oct']=$this->db->query("SELECT id_quotation FROM `quotation_admin` WHERE tanggal_input like '%10-".$b3."'");
		$data['nov']=$this->db->query("SELECT id_quotation FROM `quotation_admin` WHERE tanggal_input like '%11-".$b3."'");
		$data['des']=$this->db->query("SELECT id_quotation FROM `quotation_admin` WHERE tanggal_input like '%12-".$b3."'");
	}
}

?>