<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class Product_m extends CI_Model
{
	
	public function __construct(){
        parent::__construct();
        
    }

    function product($offset,$limit)
    {
    	$sql = "SELECT mp.id,mp.product,mp.created,mpd.code,mpd.price,mpd.discount,mpd.currency, mpd.stock, mpi.image61a,mp.description
					FROM merchant_product as mp
					JOIN merchant_product_detail as mpd on mpd.merchant_product_id=mp.id
					LEFT JOIN merchant_product_image as mpi on mpi.merchant_product_id=mp.id ";
		$sql.= "ORDER BY mp.id DESC limit ".$offset.",".$limit." ";
		
		return $this->db->query($sql);
    }

    function product_sum()
    {
    	$sql = "SELECT * from merchant_product";
    	return $this->db->query($sql)->num_rows();
    }

    function getCompany()
    {
    	$sql = "SELECT id, company from merchant_data where status='client'";
    	$query = $this->db->query($sql);
    	return $query->result_array();
    }

    function getBrand()
    {
    	$sql = "SELECT id, brand from merchant_brand order by brand ASC";
    	$query = $this->db->query($sql);
    	return $query->result_array();
    }

    function getCategory()
    {
    	$sql = "SELECT id, category from category order by category ASC";
    	$query = $this->db->query($sql);
    	return $query->result_array();
    }

    function getSubCategory()
    {
    	$sql = "SELECT id, sub_category from sub_category order by sub_category ASC";
    	$query = $this->db->query($sql);
    	return $query->result_array();
    }

    function updateStock()
    {
    	$stock = $this->input->post('stock');
    	$id_product = $this->input->post('idProduct');
    	$sql = "UPDATE merchant_product_detail SET stock='$stock' WHERE merchant_product_id='$id_product'";
    	return $this->db->query($sql);
    }

    function addProduct($relation)
    {
    	$data = array(
    		'merchant_data_id' => $this->input->post('merchant_data_id'),
    		'product' =>$this->input->post('product_name'),
    		'merchant_brand_id' => $this->input->post('merchant_brand'),
    		'category_id' => $this->input->post('category'),
    		'sub_category_id' => $this->input->post('subCategory'),
    		'description' => '<p>'.$this->input->post('description').'</p>',
    		'relation' => $relation,
    		'created'=> date('d-m-Y H:m:s',now())
    		);

    	$add = $this->db->insert('merchant_product',$data);
    	if($add){
    		$sql = $this->db->query("SELECT id from merchant_product where relation='$relation'");
    		$sql = $sql->result_array();
    		foreach ($sql as $value)

	    	$data2 = array(
	    		'code' => $this->input->post('catalog'),
	    		'price'=> $this->input->post('price'),
	    		'discount' => $this->input->post('discount'),
	    		'size'=> $this->input->post('size'),
	    		'currency' => $this->input->post('currency'),
	    		'packaging' => $this->input->post('packaging'),
	    		'stock' => $this->input->post('stock'),
	    		'merchant_product_id' => $value['id'],
	    		'relation' => $relation,
	    		'created' => date('d-m-Y H:m:s',now())
	    		);
	    	$add2 = $this->db->insert('merchant_product_detail',$data2);
	    	if($add2){
	    		return true;
	    	}else return false;
    	}
    	else {
    		return false;
    	}
    }
}