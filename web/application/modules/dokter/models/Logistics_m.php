<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logistics_m extends CI_Model {
    
    public function __construct(){
        parent::__construct();
        
    }
	
	function order($status, $offset, $limit){
		$sql = "SELECT o.id, o.created, o.send_date, o.status_order, o.total_rupiah, o.status, d.first_name, 
					do.address,do.post_code, c.city, dis.district,p.province,do.phone
					FROM customer_order AS o
					JOIN customer_data AS d ON o.customer_data_id = d.id
					JOIN customer_data_order as do ON do.customer_order_id = o.id
					JOIN province as p ON p.id=do.province
					JOIN city as c ON c.id=do.city
					JOIN district as dis ON dis.id=do.district ";
		if($status == 'all'){
			$sql.="";
		} else {
			$sql.=" WHERE o.status_order = '".$status."' ";
		}

		$sql.= "ORDER BY o.id DESC limit ".$offset.",".$limit." ";
		
		return $this->db->query($sql);
	}

	function orderDetail($id)
	{
		$sql = "SELECT co.id, co.created, co.total_rupiah, co.total_shipping_payment, co.status_order, co.send_date,
					cd.first_name, cd.email, cd.phone, co.kurs_USD, co.kurs_EUR,co.kurs_SGD
					FROM customer_order as co
					JOIN customer_data as cd ON cd.id=co.customer_data_id WHERE co.id='$id'";
		return $this->db->query($sql);
	}

	function order_sum($status){
		$sql = "SELECT o.id, o.created, o.send_date, o.status_order, o.total_rupiah, o.status, d.first_name FROM customer_order AS o
				LEFT JOIN customer_data AS d ON o.customer_data_id = d.id ";
		if($status == 'all'){
			$sql.="";
		} else {
			$sql.=" WHERE o.status_order = '".$status."' ";
		}

		$sql.= "ORDER BY o.id DESC";
		
		return $this->db->query($sql)->num_rows();
	}

	function send_order(){
		$data = array(
			'send_date' => $this->input->post('send_date'),
			'total_shipping_payment' => $this->input->post('shipping_payment'),
			'no_resi' => $this->input->post('no_resi')
			);
		$id = $this->input->post('no_order');
		$this->db->where('id',$id);
		$update = $this->db->update('customer_order',$data);
		if($update) return $id;
		else return 0;
	}

	function update_status_order($id,$status){
		$query = "UPDATE customer_order SET status_order = '$status', confirmation = '1' WHERE  id = '$id'";
		$update = $this->db->query($query);
		if($update) return 1;
		else return 0;
	}

}