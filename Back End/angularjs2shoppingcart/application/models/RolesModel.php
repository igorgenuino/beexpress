<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class RolesModel extends CI_Model {
	
	public function findAll(){
	return $this->db->get('roles')->result();
	}
	
	public function delete($id) {
		$this->db->where ( 'id', $id );
		$this->db->delete ( 'roles' );
	}
	public function insert($data) {
		$this->db->insert ( 'roles', $data );
	}
	public function update($id, $data) {
		$this->db->where ( 'id', $id );
		$this->db->update ( 'roles', $data );
	} 
	public function findById($id){
		$this->db->where('id',$id);
		return $this->db->get('roles')->result();

	}
}
?>