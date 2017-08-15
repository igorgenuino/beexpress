<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Category extends REST_Controller {

    function __construct()
    {        
        parent::__construct();
		$this->output->set_header('Access-Control-Allow-Origin: *');
    }

    public function find_level_1_get() {
		
		$key = $this->get('X_API_KEY');
		if (!$this->_key_exists($key)) {
            $this->response([
                'status' => FALSE,
                'message' => 'Invalid API key'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {		
			$this->response($this->CategoryRestModel->findAllLevel1(), REST_Controller::HTTP_OK);
		}
    }
	
	public function find_all_level_get() {
		
		$key = $this->get('X_API_KEY');
		if (!$this->_key_exists($key)) {
            $this->response([
                'status' => FALSE,
                'message' => 'Invalid API key'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {		
			$data = array();
			foreach($this->CategoryRestModel->findAllLevel1() as $category) {				
				$subItem = array();
				if($this->CategoryRestModel->countSubCategories($category->id) > 0) {
					foreach($this->CategoryRestModel->findAllSubCategories($category->id) as $subCat) {
						$asubCat = array('id' => $subCat-> id, 'name' => $subCat-> name);						
						array_push($subItem, $asubCat);
					}
				}
				$item = array('id' => $category->id, 'name' => $category->name, 'child' => $this->CategoryRestModel->countSubCategories($category->id), 'subcategories' => $subItem);
				array_push($data, $item);
			}
			$this->response($data, REST_Controller::HTTP_OK);
		}
    }
	
	public function find_sub_categories_get($categoryId) {
		
		$key = $this->get('X_API_KEY');
		if (!$this->_key_exists($key)) {
            $this->response([
                'status' => FALSE,
                'message' => 'Invalid API key'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {		
			$this->response($this->CategoryRestModel->findAllSubCategories($categoryId), REST_Controller::HTTP_OK);
		}
    }
	
	public function find_by_id_get($categoryId) {
		
		$key = $this->get('X_API_KEY');
		if (!$this->_key_exists($key)) {
            $this->response([
                'status' => FALSE,
                'message' => 'Invalid API key'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {		
			$this->response($this->CategoryRestModel->find($categoryId), REST_Controller::HTTP_OK);
		}
    }
	
	public function count_sub_categories_get($categoryId) {
		
		$key = $this->get('X_API_KEY');
		if (!$this->_key_exists($key)) {
            $this->response([
                'status' => FALSE,
                'message' => 'Invalid API key'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {		
			$this->response($this->CategoryRestModel->countSubCategories($categoryId), REST_Controller::HTTP_OK);
		}
    }

	private function _key_exists($key)
    {
		$row = $this->SettingRestModel->findByKey('rest_api_key');
		return $row->value == $key; 
    }	
    

}
