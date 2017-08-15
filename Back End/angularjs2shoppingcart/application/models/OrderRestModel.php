<?php defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );

class OrderRestModel extends CI_Model {
	
	function __construct() {
		parent::__construct();
	}
	
	public function findAll(){
		return $this->db->get('orders')->result();
	}
	
	public function find($id) {
		$this->db->where ( 'id', $id );
		return $this->db->get( 'orders' )->row();
	}
    
    public function sum($ordersid) {
        return $this->db->query("select sum(price*quantity) as sumOrder from ordersdetail where ordersid = '".$ordersid."'" )->row()->sumOrder;
	}
    
    public function findByUsername($username) {
		$this->db->where ( 'username', $username );
		return $this->db->get( 'orders' )->result();
	}
    
    public function findOrderInfo($id) {
		return $this->db->query("select a.id as id, a.title as name, concat('".$this->SettingRestModel->  findByKey('base_url_photo')->value."', a.photo) as photo, od.price as price, od.quantity as quantity  
                from orders o, ordersdetail od, articles a 
                where o.id = od.ordersid and od.articleId = a.id and o.id = '".$id."'" )->result();
	}
	
	public function insert($order) {
		$this->db->insert ( 'orders', $order );
	}
	
	
}