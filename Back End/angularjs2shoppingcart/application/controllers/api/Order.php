<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Order extends REST_Controller {

    function __construct() {        
        parent::__construct();	
		header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
		header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');	
    }

	public function create_post() {		
		$key = $this->post('X_API_KEY');	
		
		if (!$this->_key_exists($key)) {
            $this->response([
                'status' => FALSE,
                'message' => 'Invalid API key'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {		
			// Add order 
			$order = array(
                'id' => $this->post('id'),
				'name' => 'Order from PayPal',
				'creation' => date('Y-m-d'),
				'username' => $this->post('username'),
				'status' => 0
			);
			$this->OrderRestModel->insert($order);
			
			// Add order detail
			foreach($this->post('orderDetails') as $orderDetail) {
				$this->OrderDetailRestModel->insert($orderDetail);
			}
			
			$this->response(REST_Controller::HTTP_OK);
		}
    }
    
    public function findByUsername_get($username) {
		
		$key = $this->get('X_API_KEY');
		if (!$this->_key_exists($key)) {
            $this->response([
                'status' => FALSE,
                'message' => 'Invalid API key'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {		
			$this->response($this->OrderRestModel->findByUsername($username), REST_Controller::HTTP_OK);
		}
    }
    
    public function find_get($id) {
		
		$key = $this->get('X_API_KEY');
		if (!$this->_key_exists($key)) {
            $this->response([
                'status' => FALSE,
                'message' => 'Invalid API key'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {		
			$this->response($this->OrderRestModel->findOrderInfo($id), REST_Controller::HTTP_OK);
		}
    }
    
    public function sum_get($orderId) {
		
		$key = $this->get('X_API_KEY');
		if (!$this->_key_exists($key)) {
            $this->response([
                'status' => FALSE,
                'message' => 'Invalid API key'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {		
            $result = array('s' => $this->OrderRestModel->sum($orderId));
			$this->response($result, REST_Controller::HTTP_OK);
		}
    }
		
	private function _key_exists($key)
    {
		$row = $this->SettingRestModel->findByKey('rest_api_key');
		return $row->value == $key; 
    }	
	
}
