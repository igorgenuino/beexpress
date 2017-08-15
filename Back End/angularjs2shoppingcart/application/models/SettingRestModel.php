<?php defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );

class SettingRestModel extends CI_Model {
	
	function __construct() {
		parent::__construct();
	}
	
	public function findByKey($key){
		$this->db->where('key', $key);
		return $this->db->get('settings')->row();
	}
	
	
}