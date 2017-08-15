<?php defined('BASEPATH') OR exit('No direct script access allowed');

class SettingsModel extends CI_Model {
	function __construct()
	{
		parent::__construct();
	}
	public function findAll(){
		return $this->db->get('settings')->result();
	}
	
	public function delete($id) {
		$this->db->where ( 'id', $id );
		$this->db->delete ( 'settings' );
	}
	public function insert($data) {
		$this->db->insert ( 'settings', $data );
	}
	public function update($id, $data) {
		$this->db->where ( 'id', $id );
		$this->db->update ( 'settings', $data );
	} 
	public function findById($id){
		$this->db->where('id',$id);
		return $this->db->get('settings')->result();

	}
	
	public function find($key) {
		$this->db->where('key', $key);
		return $this->db->get('settings')->row();
	}
	
	public function save($key, $value) {
		$this->db->set('value', $value);
		$this->db->where('key', $key);
		$this->db->update('settings');
	}
}
?>