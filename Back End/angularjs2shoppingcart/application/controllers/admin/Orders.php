<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends MY_Admin_Controller {

	public function __contruct()
	{ 
		parent::__construct();  
	}
	function index() {
		$data['data']=$this->OrderModel->findAll();
		$data ['page'] = 'admin/orders/index';
		$this->load->view ( 'templates/templateAdmin', $data );
	
	}
	
	function detail($orderId) {
		$data['data']=$this->OrderDetailModel->findByOrderId($orderId);
		$data ['page'] = 'admin/orders/detail';
		$this->load->view ( 'templates/templateAdmin', $data );
	
	}

}
	