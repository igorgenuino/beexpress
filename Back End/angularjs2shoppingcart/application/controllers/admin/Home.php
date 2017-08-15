<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Admin_Controller {

	
	public function index() {
		$this->lang->load('admin_content_lang', 'english');
		$this->load->model('accountsmodel');
		$this->load->model('categoriesmodel');
		$this->load->model('articlesmodel');
		$this->load->model('commentsmodel');
		$data['accounts']=count($this->accountsmodel->findAll());
		$data['categories']=count($this->accountsmodel->findAll());
		$data['articles']=count($this->accountsmodel->findAll());
		$data['comments']=count($this->accountsmodel->findAll());
		$data['page'] = 'admin/home/index';
		$this->load->view('templates/templateAdmin', $data);
	}
	
}