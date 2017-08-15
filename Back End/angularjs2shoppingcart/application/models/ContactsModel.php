<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class ContactsModel extends CI_Model {
	
	public function __contruct()
	{ 
		parent::__construct();  
	}
	public function findAll(){
		return $this->db->get('contacts')->result();
	}
	public function delete($id) {
		$this->db->where ( 'id', $id );
		$this->db->delete ( 'contacts' );
	}
}
