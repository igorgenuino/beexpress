<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class BrandModel extends CI_Model {
	
	public function __contruct()
	{ 
		parent::__construct();  
	}
	public function findAll(){
	return $this->db->get('brands')->result();
	}
	
	public function delete($id) {
		$this->db->where ( 'id', $id );
		$this->db->delete ( 'brands' );
	}
	public function insert($data) {
		$this->db->insert ( 'brands', $data );
	}
	public function update($id, $data) {
		$this->db->where ( 'id', $id );
		$this->db->update ( 'brands', $data );
	} 
	
	public function findById($id) {
		$this->db->where ( 'id', $id );
		return $this->db->get( 'brands' )->row();
	}
}
