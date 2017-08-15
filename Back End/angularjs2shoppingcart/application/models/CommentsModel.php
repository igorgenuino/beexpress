<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class CommentsModel extends CI_Model {
	
	public function findAll(){
	return $this->db->get('comments')->result();
	}
	
	public function delete($id) {
		$this->db->where ( 'id', $id );
		$this->db->delete ( 'comments' );
	}
	public function insert($data) {
		$this->db->insert ( 'comments', $data );
	}
	public function update($id, $data) {
		$this->db->where ( 'id', $id );
		$this->db->update ( 'comments', $data );
	} 
	public function findById($id){
		$this->db->where('id',$id);
		return $this->db->get('comments')->row();

	}
	public function findByArticle($id){
		$this->db->where('articleId',$id);
		return $this->db->get('comments')->result();

	}
}
?>