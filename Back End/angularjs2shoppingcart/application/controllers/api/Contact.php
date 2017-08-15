<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Contact extends REST_Controller {

    function __construct()
    {        
        parent::__construct();
		$this->output->set_header('Access-Control-Allow-Origin: *');
    }

    public function create_post() {			
		$key = $this->post('X_API_KEY');		
		if (!$this->_key_exists($key))        {
            $this->response([
                'status' => FALSE,
                'message' => 'Invalid API key'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {		
			$contact = array('name' => $this->post('name'), 'email' => $this->post('email'), 'phone' => $this->post('phone'), 'message' => $this->post('message'));
			$this->response($this->ContactRestModel->create($contact), REST_Controller::HTTP_OK);
		}
    }

	private function _key_exists($key)
    {
		$row = $this->SettingRestModel->findByKey('rest_api_key');
		return $row->value == $key; 
    }	
    

}
