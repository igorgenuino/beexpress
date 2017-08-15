<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Article extends REST_Controller {

    function __construct() {        
        parent::__construct();	
		header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
		header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');	
    }

    public function find_latest_get() {
		
		$key = $this->get('X_API_KEY');
		if (!$this->_key_exists($key)) {
            $this->response([
                'status' => FALSE,
                'message' => 'Invalid API key'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {		
			$this->response($this->ArticlesRestModel->findLatest($this->SettingRestModel->findByKey('limit_latest')->value), REST_Controller::HTTP_OK);
		}
    }
	
	public function find_best_seller_get() {
		
		$key = $this->get('X_API_KEY');
		if (!$this->_key_exists($key)) {
            $this->response([
                'status' => FALSE,
                'message' => 'Invalid API key'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {		
			$this->response($this->ArticlesRestModel->findBestSeller($this->SettingRestModel->findByKey('limit_best_seller')->value), REST_Controller::HTTP_OK);
		}
    }
	
	public function find_random_get() {
		
		$key = $this->get('X_API_KEY');
		if (!$this->_key_exists($key)) {
            $this->response([
                'status' => FALSE,
                'message' => 'Invalid API key'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {		
			$this->response($this->ArticlesRestModel->findRandom($this->SettingRestModel->findByKey('limit_random')->value), REST_Controller::HTTP_OK);
		}
    }

    public function find_most_viewed_get() {
		$key = $this->get('X_API_KEY');
		if (!$this->_key_exists($key))        {
            $this->response([
                'status' => FALSE,
                'message' => 'Invalid API key'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {		
			$this->response($this->ArticlesRestModel->findMostViewed($this->SettingRestModel->findByKey('limit_most_viewed')->value), REST_Controller::HTTP_OK);
		}
    } 
	
	public function find_all_get($keyword) {
		$key = $this->get('X_API_KEY');
		if (!$this->_key_exists($key))        {
            $this->response([
                'status' => FALSE,
                'message' => 'Invalid API key'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {		
			$this->response($this->ArticlesRestModel->findAll(), REST_Controller::HTTP_OK);
		}
    } 
	
	public function search_get($keyword) {
		$key = $this->get('X_API_KEY');
		if (!$this->_key_exists($key))        {
            $this->response([
                'status' => FALSE,
                'message' => 'Invalid API key'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {		
			$this->response($this->ArticlesRestModel->searchByTitle($keyword), REST_Controller::HTTP_OK);
		}
    }
	
	public function search_by_category_id_get($id) {
		$key = $this->get('X_API_KEY');
		if (!$this->_key_exists($key))        {
            $this->response([
                'status' => FALSE,
                'message' => 'Invalid API key'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {		
			$this->response($this->ArticlesRestModel->findByCategory($id), REST_Controller::HTTP_OK);
		}
    }
	
	public function search_by_brand_id_get($id) {
		$key = $this->get('X_API_KEY');
		if (!$this->_key_exists($key))        {
            $this->response([
                'status' => FALSE,
                'message' => 'Invalid API key'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {		
			$this->response($this->ArticlesRestModel->findByBrand($id), REST_Controller::HTTP_OK);
		}
    }
	
	public function search_related_by_category_id_get($categoryId, $articleId) {
		$key = $this->get('X_API_KEY');
		if (!$this->_key_exists($key))        {
            $this->response([
                'status' => FALSE,
                'message' => 'Invalid API key'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {		
			$this->response($this->ArticlesRestModel->findRelatedByCategory($categoryId, $articleId), REST_Controller::HTTP_OK);
		}
    }
	
	public function count_rows_by_category_id_get($categoryId) {
		$key = $this->get('X_API_KEY');		
		if (!$this->_key_exists($key)) {
            $this->response([
                'status' => FALSE,
                'message' => 'Invalid API key'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {	
			$rows = $this->ArticlesRestModel->countByCategory($categoryId);
			$this->response($rows, REST_Controller::HTTP_OK);
		}		
	}
	
	public function count_rows_by_search_get($keyword) {
		$key = $this->get('X_API_KEY');		
		if (!$this->_key_exists($key)) {
            $this->response([
                'status' => FALSE,
                'message' => 'Invalid API key'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {	
			$rows = $this->ArticlesRestModel->countBySearch($keyword);
			$this->response($rows, REST_Controller::HTTP_OK);
		}		
	}
	
	public function count_pages_by_category_id_get($categoryId) {
		$key = $this->get('X_API_KEY');		
		if (!$this->_key_exists($key)) {
            $this->response([
                'status' => FALSE,
                'message' => 'Invalid API key'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {	
			$pages = $this->ArticlesRestModel->countPagesByCategory($categoryId);
			$this->response(array('pages' => $pages), REST_Controller::HTTP_OK);
		}		
	}
	
	public function count_pages_by_search_get($keyword) {
		$key = $this->get('X_API_KEY');		
		if (!$this->_key_exists($key)) {
            $this->response([ 
                'status' => FALSE,
                'message' => 'Invalid API key'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {	
			$pages = $this->ArticlesRestModel->countPagesBySearch($keyword);
			$this->response(array('pages' => $pages), REST_Controller::HTTP_OK);
		}		
	}

	public function search_by_category_id_limit_get($categoryId, $page) {
		$key = $this->get('X_API_KEY');
		if (!$this->_key_exists($key))        {
            $this->response([
                'status' => FALSE,
                'message' => 'Invalid API key'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {	
			$from = $page * $this->SettingRestModel->findByKey('limit_pagination')->value;
			$limit = $this->SettingRestModel->findByKey('limit_pagination')->value;
			$this->response($this->ArticlesRestModel->findByCategoryLimit($categoryId, $limit, $from), REST_Controller::HTTP_OK);
		}
    }
	
	public function search_by_search_limit_get($keyword, $page) {
		$key = $this->get('X_API_KEY');
		if (!$this->_key_exists($key))        {
            $this->response([
                'status' => FALSE,
                'message' => 'Invalid API key'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {	
			$from = $page * $this->SettingRestModel->findByKey('limit_pagination')->value;
			$limit = $this->SettingRestModel->findByKey('limit_pagination')->value;
			$this->response($this->ArticlesRestModel->findBySearchLimit($keyword, $limit, $from), REST_Controller::HTTP_OK);
		}
    }
	
	public function update_view_post() {	
		$key = $this->post('X_API_KEY');		
		if (!$this->_key_exists($key))        {
            $this->response([
                'status' => FALSE,
                'message' => 'Invalid API key'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {		
			$id = $this->post('id');
			$this->response($this->ArticlesRestModel->updateViews($id), REST_Controller::HTTP_OK);
		}
    }
		
	public function find_by_id_get($id) {
		
		$key = $this->get('X_API_KEY');
		if (!$this->_key_exists($key)) {
            $this->response([
                'status' => FALSE,
                'message' => 'Invalid API key'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {		
			$this->response($this->ArticlesRestModel->findById($id), REST_Controller::HTTP_OK);
		}
    }	
		
	private function _key_exists($key)
    {
		$row = $this->SettingRestModel->findByKey('rest_api_key');
		return $row->value == $key; 
    }	
	
}
