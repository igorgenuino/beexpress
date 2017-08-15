<?php defined('BASEPATH') OR exit('No direct script access allowed');

class AccountsModel extends CI_Model {
	function __construct()
	{
		parent::__construct();
	}
	public function login($account) {
		$this->db->where('username', $account['username']);
		$this->db->where('password', sha1($account['password']));
		$this->db->where('roleId', 1);
		return $this->db->get('accounts')->num_rows();	
	}
	public function findAll(){
	return $this->db->get('accounts')->result();
	}
	
	public function delete($id) {
		$this->db->where ( 'id', $id );
		$this->db->delete ( 'accounts' );
	}
	public function insert($data) {
		$this->db->insert ( 'accounts', $data );
	}
	public function update($id, $data) {
		$this->db->where ( 'id', $id );
		$this->db->update ( 'accounts', $data );
	} 
	public function findById($id){
		$this->db->where('id',$id);
		return $this->db->get('accounts')->result();

	}
	public function update_profile($username, $data) {
		$this->db->where ( 'username', $username );
		$this->db->update ( 'accounts', $data );
	} 
	public function findByUsername($username){
		$this->db->where('username',$username);
		return $this->db->get('accounts')->result();

	}
	public function findByRole($id){
		$this->db->where('roleId',$id);
		return $this->db->get('accounts')->result();

	}
}
?>