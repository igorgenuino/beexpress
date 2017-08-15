<?php defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );

class CategoryRestModel extends CI_Model {
	
	function __construct() {
		parent::__construct();
	}
	
	public function findAllLevel1(){
		$this->db->select("id, name, description, concat('".$this->SettingRestModel->findByKey('base_url_photo')->value."', photo) as photo, status, parentId");
		$this->db->where('parentId', 0);
		$this->db->where('status', 1);
		$this->db->from('categories');
		$this->db->order_by('orders', 'asc'); 		
		return $this->db->get()->result();
	}
	
	public function findAllLevel2(){
		$this->db->select("id, name, description, concat('".$this->SettingRestModel->findByKey('base_url_photo')->value."', photo) as photo, status, parentId");
		$this->db->where('parentId !=', 0);
		$this->db->where('status', 1);
		$this->db->from('categories');
		$this->db->order_by('orders', 'asc');
		return $this->db->get()->result();
	}
	
	public function findAllSubCategories($parentId){
		$this->db->select("id, name, description, concat('".$this->SettingRestModel->findByKey('base_url_photo')->value."', photo) as photo, status, parentId");
		$this->db->where('parentId', $parentId);
		$this->db->where('status', 1);
		$this->db->from('categories');
		$this->db->order_by('orders', 'asc');
		return $this->db->get()->result();
	}
	
	public function countSubCategories($categoryId){		
		$this->db->where('parentId', $categoryId);
		$this->db->where('status', 1);
		return $this->db->get('categories')->num_rows();
	}
	
	public function find($id){
		$this->db->select("id, name, description, concat('".$this->SettingRestModel->findByKey('base_url_photo')->value."', photo) as photo, status, parentId");
		$this->db->where('id', $id);
		$this->db->where('status', 1);
		$this->db->from('categories');		
		return $this->db->get()->row();
	}
	
	
}