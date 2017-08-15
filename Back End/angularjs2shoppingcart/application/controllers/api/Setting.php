<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Setting extends REST_Controller {

    function __construct()
    {        
        parent::__construct();
		$this->output->set_header('Access-Control-Allow-Origin: *');
    }

    public function find_by_key_get($keySetting) {
		
		$key = $this->get('X_API_KEY'); 
		if (!$this->_key_exists($key)) {
            $this->response([
                'status' => FALSE,
                'message' => 'Invalid API key'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {		
			$this->response($this->SettingRestModel->findByKey($keySetting), REST_Controller::HTTP_OK);
		}
    }

	private function _key_exists($key)
    {
		$row = $this->SettingRestModel->findByKey('rest_api_key');
		return $row->value == $key; 
    }	
    

}
