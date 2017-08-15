<?php defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );

class CommentRestModel extends CI_Model {
	
	function __construct() {
		parent::__construct();
	}
	
	public function find_by_article($articleId){ 
		$this->db->select("id, fullName, content, sendDate");
		$this->db->order_by('id', 'desc'); 		
		$this->db->where('status', 1);
		$this->db->where('articleId', $articleId);
		$this->db->from('comments');
		return $this->db->get()->result();
	}
	
	public function create($comment = array()){ 
		$this->db->insert('comments', $comment); 
	}
	
	
	
	
}