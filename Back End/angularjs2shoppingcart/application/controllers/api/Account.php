<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Account extends REST_Controller {

    function __construct() {        
        parent::__construct();
		header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
		header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');		
    }

    public function login_post() {
		
		$key = $this->post('X_API_KEY');
		if (!$this->_key_exists($key)) {
            $this->response([
                'status' => FALSE,
                'message' => 'Invalid API key'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {		
            $username = $this->post('username');
            $password = $this->post('password');
            if($this->AccountsRestModel->login($username, $password) == 1) {
                $result = json_encode(array('count' => 1));
                $this->response($result, REST_Controller::HTTP_OK);
            } else {
                $result = json_encode(array('count' => 0));
                $this->response($result, REST_Controller::HTTP_OK);
            }
		}
    }
	
    public function signup_post() {
        $key = $this->post('X_API_KEY');
		if (!$this->_key_exists($key)) {
            $this->response([
                'status' => FALSE,
                'message' => 'Invalid API key'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {	
            $username = $this->post('username');
            if($this->AccountsRestModel->checkUsername($username) == 1) {
                $result = json_encode(array('count' => 1));
                $this->response($result, REST_Controller::HTTP_OK);
            } else {
                $account = array(
                    'username' => $this->post('username'),
                    'password' => sha1($this->post('password')),
                    'fullName' => $this->post('fullName'),
                    'email' => $this->post('email'),
                    'roleId' => 7
                );
                $this->AccountsRestModel->insert($account);
                $result = json_encode(array('count' => 0));
                $this->response($result, REST_Controller::HTTP_OK);
            }
		}   
		
    }
    
    public function profile_get($username) {
        $key = $this->get('X_API_KEY');
		if (!$this->_key_exists($key)) {
            $this->response([
                'status' => FALSE,
                'message' => 'Invalid API key'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {	
            $this->response($this->AccountsRestModel->findByUsername($username), REST_Controller::HTTP_OK);
		}   
    }
    
    public function profile_post() {
        $key = $this->post('X_API_KEY');
		if (!$this->_key_exists($key)) {
            $this->response([
                'status' => FALSE,
                'message' => 'Invalid API key'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {	
            $currentAccount = $this->AccountsRestModel->findByUsername($this->post('username'));
            $account = array(
                    'username' => $this->post('username'),
                    'password' => $this->post('password') != '' ? sha1($this->post('password')) : $currentAccount->password,
                    'fullName' => $this->post('fullName'),
                    'email' => $this->post('email'),
                    'roleId' => 2
            );
            $this->AccountsRestModel->update($account);
            $this->response(json_encode(array('count' => 1)), REST_Controller::HTTP_OK);
		}   
    }

	private function _key_exists($key)
    {
		$row = $this->SettingRestModel->findByKey('rest_api_key');
		return $row->value == $key; 
    }	
    

}
