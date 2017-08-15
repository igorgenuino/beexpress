<?php defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );

class OrderModel extends CI_Model {
	
	function __construct() {
		parent::__construct();
	}
	
	public function findAll(){
		return $this->db->get('orders')->result();
	}
	
	public function find($id) {
		$this->db->where ( 'id', $id );
		return $this->db->get( 'orders' )->result();
	}
	
	
}