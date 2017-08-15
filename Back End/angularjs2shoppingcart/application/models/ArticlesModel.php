<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class ArticlesModel extends CI_Model {
	public function __contruct()
	{ 
		parent::__construct();  
	}
	public function findAll(){
	return $this->db->get('articles')->result();
	}
	
	public function delete($id) {
		$this->db->where ( 'id', $id );
		$this->db->delete ( 'articles' );
	}
	public function insert($data) {
		$this->db->insert ( 'articles', $data );
	}
	public function update($id, $data) {
		$this->db->where ( 'id', $id );
		$this->db->update ( 'articles', $data );
	} 
	public function findById($id){
		$this->db->where('id',$id);
		return $this->db->get('articles')->result();

	}
	public function findByCategories($id){
		$this->db->where('categoryId',$id);
		return $this->db->get('articles')->result();

	}
	
	public function findByBrand($id){
		$this->db->where('brandId',$id);
		return $this->db->get('articles')->result();

	}

}
?>