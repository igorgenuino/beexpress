<?php defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );

class ContactRestModel extends CI_Model {
	
	function __construct() {
		parent::__construct();
	}
	
	public function create($contact = array()) {
		$this->db->insert('contacts', $contact); 
	}
	
	
	
	
}