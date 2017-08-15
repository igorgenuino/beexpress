<?php defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );

class BrandRestModel extends CI_Model {
	
	function __construct() {
		parent::__construct();
	}
	
	public function findAll(){
		$this->db->where('status', 1);		
		return $this->db->get('brands')->result();
	}
	
	public function find($id){
		$this->db->where('id', $id);
		$this->db->where('status', 1);
		return $this->db->get('brands')->row();
	}
	
	
}