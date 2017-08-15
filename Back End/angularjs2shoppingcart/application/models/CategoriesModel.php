<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class CategoriesModel extends CI_Model {
	
	public function __contruct()
	{ 
		parent::__construct();  
	}
	public function findAll(){
	return $this->db->get('categories')->result();
	}
	
	public function delete($id) {
		$this->db->where ( 'id', $id );
		$this->db->delete ( 'categories' );
	}
	public function insert($data) {
		$this->db->insert ( 'categories', $data );
	}
	public function update($id, $data) {
		$this->db->where ( 'id', $id );
		$this->db->update ( 'categories', $data );
	} 
	public function selectCate($parentId) {
		$this->db->where ( 'parentId', $parentId );
		return $this->db->get ( 'categories' )->result();
	}
	public function findById($id) {
		$this->db->where ( 'id', $id );
		return $this->db->get( 'categories' )->result();
	}
}
