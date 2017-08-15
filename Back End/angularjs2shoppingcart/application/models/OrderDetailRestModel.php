<?php defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );

class OrderDetailRestModel extends CI_Model {
	
	function __construct() {
		parent::__construct();
	}
	
	public function findByOrderId($orderId){
		$this->db->where ( 'ordersid', $orderId );
		return $this->db->get('ordersdetail')->result();
	}
	
	public function insert($ordersdetail) {
		$this->db->insert( 'ordersdetail', $ordersdetail );
	}
	
	
}