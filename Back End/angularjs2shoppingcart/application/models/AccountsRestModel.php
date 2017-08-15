<?php defined('BASEPATH') OR exit('No direct script access allowed');

class AccountsRestModel extends CI_Model {
	
    function __construct() {
		parent::__construct();
	}
    
	public function login($username, $password) {
		$this->db->where('username', $username);
		$this->db->where('password', sha1($password));
		return $this->db->get('accounts')->num_rows();	
	}
    
    public function checkUsername($username) {
		$this->db->where('username', $username);
		return $this->db->get('accounts')->num_rows();	
	}
    
	public function insert($data) {
		$this->db->insert ( 'accounts', $data );
	}
    
	public function update($data) {
		$this->db->where ( 'username', $data['username'] );
		$this->db->update ( 'accounts', $data );
	} 
    
	public function findById($id){
		$this->db->where('id',$id);
		return $this->db->get('accounts')->row();
	}
    
    public function findByUsername($username){
		$this->db->where('username',$username);
		return $this->db->get('accounts')->row();
	}
	
    
}
?>