<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Contacts extends MY_Admin_Controller {

	public function __contruct()
	{ 
		parent::__construct();  
	}
	function index() {
		$this->lang->load('admin_content_lang', 'english');
		$this->load->model ( 'contactsmodel' );
		$data['data']=$this->contactsmodel->findAll();
		$data ['page'] = 'admin/contacts/index';
		$this->load->view ( 'templates/templateAdmin', $data );
	
	}
	function delete($id){
		$this->lang->load('admin_content_lang', 'english');
		$this->load->model ( 'contactsmodel' );
		$this->contactsmodel->delete($id);
		redirect('admin/contacts');

	}
}
