<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class PagesModel extends CI_Model {
	
	public function __contruct()
	{ 
		parent::__construct();  
	}
	public function findAll(){
	return $this->db->get('pages')->result();
	}
	
	public function delete($id) {
		$this->db->where ( 'id', $id );
		$this->db->delete ( 'pages' );
	}
	public function insert($data) {
		$this->db->insert ( 'pages', $data );
	}
	public function update($id, $data) {
		$this->db->where ( 'id', $id );
		$this->db->update ( 'pages', $data );
	} 

	public function findById($id) {
		$this->db->where ( 'id', $id );
		return $this->db->get( 'pages' )->result();
	}
}
