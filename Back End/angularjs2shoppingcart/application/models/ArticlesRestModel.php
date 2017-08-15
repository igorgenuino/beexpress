<?php defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );

class ArticlesRestModel extends CI_Model {
	
	function __construct() {
		parent::__construct();
	}
	
	public function findLatest($limit){ 
		$this->db->select("a.id as id, a.title as title, a.description as description, a.detail as detail, a.views as views, a.categoryId as categoryId, a.status as status, a.publishDate as publishDate, concat('".$this->SettingRestModel->findByKey('base_url_photo')->value."', a.photo) as photo, price as price, quantity as quantity, a.brandId as brandId");
		$this->db->limit($limit);
		$this->db->order_by('id', 'desc'); 		
		$this->db->where('a.status', 1);
		$this->db->from('articles a');
		return $this->db->get()->result();
	}
	
	public function findBestSeller($limit){ 
		$sql = 'SELECT articleId, SUM(Quantity) AS TotalQuantity FROM ordersdetail GROUP BY 	articleId ORDER BY SUM(Quantity) DESC limit '.$limit;
		$result = $this->db->query($sql)->result();
		$products = array();
		foreach($result as $row) {
			array_push($products, $this->findById($row->articleId));
		}
		return $products;
	}
	
	public function findRandom($limit){ 
		$this->db->select("a.id as id, a.title as title, a.description as description, a.detail as detail, a.views as views, a.categoryId as categoryId, a.status as status, a.publishDate as publishDate, concat('".$this->SettingRestModel->findByKey('base_url_photo')->value."', a.photo) as photo, price as price, quantity as quantity, a.brandId as brandId");
		$this->db->limit($limit);
		$this->db->order_by('id', 'RANDOM'); 		
		$this->db->where('a.status', 1);
		$this->db->from('articles a');
		return $this->db->get()->result();
	}
	
	public function findMostViewed($limit){
		$this->db->select("a.id as id, a.title as title, a.description as description, a.detail as detail, a.views as views, a.categoryId as categoryId, a.status as status, a.publishDate as publishDate, concat('".$this->SettingRestModel->findByKey('base_url_photo')->value."', a.photo) as photo, price as price, quantity as quantity, a.brandId as brandId");
		$this->db->limit($limit);
		$this->db->order_by('views', 'desc'); 		
		$this->db->where('a.status', 1);
		$this->db->from('articles a');
		return $this->db->get()->result();
	}
	
	public function countByCategory($categoryId){	
		$this->db->where('status', 1);	
		$this->db->where('categoryId', $categoryId);		
		return $this->db->get('articles')->num_rows();
	}
	
	public function countBySearch($keyword){	
		$this->db->where('status', 1);	
		$this->db->like('title', $keyword, 'both');
		return $this->db->get('articles')->num_rows();
	}
	
	public function findByCategory($categoryId){
		$this->db->select("a.id as id, a.title as title, a.description as description, a.detail as detail, a.views as views, a.categoryId as categoryId, a.status as status, a.publishDate as publishDate, concat('".$this->SettingRestModel->findByKey('base_url_photo')->value."', a.photo) as photo, price as price, quantity as quantity, a.brandId as brandId");
		$this->db->where('a.categoryId', $categoryId);
		$this->db->where('a.status', 1);
		$this->db->from('articles a');
		$this->db->order_by('a.id', 'desc');
		return $this->db->get()->result();
	}
	
	public function findByBrand($brandId){
		$this->db->select("a.id as id, a.title as title, a.description as description, a.detail as detail, a.views as views, a.categoryId as categoryId, a.status as status, a.publishDate as publishDate, concat('".$this->SettingRestModel->findByKey('base_url_photo')->value."', a.photo) as photo, price as price, quantity as quantity, a.brandId as brandId");
		$this->db->where('a.brandId', $brandId);
		$this->db->where('a.status', 1);
		$this->db->from('articles a');
		return $this->db->get()->result();
	}
	
	public function findRelatedByCategory($categoryId, $articleId){
		$this->db->select("a.id as id, a.title as title, a.description as description, a.detail as detail, a.views as views, a.categoryId as categoryId, a.status as status, a.publishDate as publishDate, concat('".$this->SettingRestModel->findByKey('base_url_photo')->value."', a.photo) as photo, price as price, quantity as quantity, a.brandId as brandId");
		$this->db->where('a.categoryId', $categoryId);
		$this->db->where('a.status', 1);
		$this->db->where('a.id !=', $articleId);
		$this->db->from('articles a');
		$this->db->order_by('a.id', 'desc');
		return $this->db->get()->result();
	}
	
	public function countPagesByCategory($categoryId){
		$limit = $this->SettingRestModel->findByKey('limit_pagination')->value;
		$this->db->where('categoryId', $categoryId);
		$this->db->where('status', 1);
		$rows = $this->db->get('articles')->num_rows();		
		return ceil($rows/$limit);
	}
	
	public function countPagesBySearch($keyword){
		$limit = $this->SettingRestModel->findByKey('limit_pagination')->value;
		$this->db->like('title', $keyword, 'both');
		$this->db->where('status', 1);
		$rows = $this->db->get('articles')->num_rows();		
		return ceil($rows/$limit);
	}
	
	public function findByCategoryLimit($categoryId, $rows, $limit){
		$this->db->select("a.id as id, a.title as title, a.description as description, a.detail as detail, a.views as views, a.categoryId as categoryId, a.status as status, a.publishDate as publishDate, concat('".$this->SettingRestModel->findByKey('base_url_photo')->value."', a.photo) as photo, price as price, quantity as quantity, a.brandId as brandId");
		$this->db->where('a.categoryId', $categoryId);
		$this->db->where('a.status', 1);
		$this->db->from('articles a');
		$this->db->order_by('a.id', 'desc');
		$this->db->limit($rows, $limit);
		return $this->db->get()->result();
	}
	
	public function findBySearchLimit($keyword, $rows, $limit){
		$this->db->select("a.id as id, a.title as title, a.description as description, a.detail as detail, a.views as views, a.categoryId as categoryId, a.status as status, a.publishDate as publishDate, concat('".$this->SettingRestModel->findByKey('base_url_photo')->value."', a.photo) as photo, price as price, quantity as quantity, a.brandId as brandId");
		$this->db->like('a.title', $keyword, 'both');
		$this->db->where('a.status', 1);
		$this->db->from('articles a');
		$this->db->limit($rows, $limit);
		return $this->db->get()->result();
	}
	
	public function findById($id){
		$this->db->select("a.id as id, a.title as title, a.description as description, a.detail as detail, a.views as views, a.categoryId as categoryId, a.status as status, a.publishDate as publishDate, concat('".$this->SettingRestModel->findByKey('base_url_photo')->value."', a.photo) as photo, price as price, quantity as quantity, a.brandId as brandId");
		$this->db->where('a.id', $id);
		$this->db->where('a.status', 1);
		$this->db->from('articles a');
		return $this->db->get()->row();
	}
	
	public function searchByTitle($keyword) {
		$this->db->select("a.id as id, a.title as title, a.description as description, a.detail as detail, a.views as views, a.categoryId as categoryId, a.status as status, a.publishDate as publishDate, concat('".$this->SettingRestModel->findByKey('base_url_photo')->value."', a.photo) as photo, price as price, quantity as quantity, a.brandId as brandId");
		$this->db->like('a.title', $keyword, 'both');
		$this->db->where('a.status', 1);
		$this->db->from('articles a');
		return $this->db->get()->result();
	}
	
	public function findAll() {
		$limit = $this->SettingRestModel->findByKey('limit_search_atutocomplete')->value;
		$this->db->select("a.id as id, a.title as title, a.description as description, a.detail as detail, a.views as views, a.categoryId as categoryId, a.status as status, a.publishDate as publishDate, concat('".$this->SettingRestModel->findByKey('base_url_photo')->value."', a.photo) as photo, price as price, quantity as quantity, a.brandId as brandId");
		$this->db->where('a.status', 1);
		$this->db->from('articles a');
		return $this->db->get()->result();
	}
	
	public function updateViews($id) {		
		$this->db->query('update articles set views = views + 1 where status = 1 and id = '.$id);
	} 
	
	
}