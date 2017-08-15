<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends MY_Admin_Controller {

	public function __contruct()
	{ 
		parent::__construct();  
	}
	function index() {
		$this->load->model ( 'pagesmodel' );
		$this->lang->load('admin_content_lang', 'english');
		$data['data']=$this->pagesmodel->findAll();
		$data ['page'] = 'admin/pages/index';
		$this->load->view ( 'templates/templateAdmin', $data );
	
	}
	function listpages() {
		$this->load->model ( 'pagesmodel' );
		$this->lang->load('admin_content_lang', 'english');
		$data['data']=$this->pagesmodel->findAll();
		$data ['page'] = 'admin/pages/index';
		$this->load->view ( 'templates/templateAdmin', $data );
	
	}
	function insert(){
		$this->load->model ( 'pagesmodel' );
		$this->lang->load('admin_content_lang', 'english');
		$data ['page'] = 'admin/pages/insert';
		$this->load->view ( 'templates/templateAdmin', $data );
	}
	function process_insert(){
		$this->load->model ( 'pagesmodel' );
		$this->lang->load('admin_content_lang', 'english');
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('name','Name','required');
		if($this->form_validation->run()==FALSE){
			$data ['page'] = 'admin/pages/insert';
			$this->load->view ( 'templates/templateAdmin', $data );
		}else {
			   
			   
					$data= array(
							'name'=> $_POST['name'],
							'content'		=>$_POST['name'],
							'publishDate' => date('Y-m-d'),
							'status'=>isset($_POST['status'])?$_POST['status']:0
						);
					$this->pagesmodel->insert($data);
					redirect('admin/pages');
               
			}
		
		
	}
	function update($id){
		$this->load->model ( 'pagesmodel' );
		$this->lang->load('admin_content_lang', 'english');
		$data ['data'] = $this->pagesmodel->findById($id);
		$data ['page'] = 'admin/pages/update';
		$this->load->view ( 'templates/templateAdmin', $data );
	
	}
	function process_update($id){
		$this->load->model ( 'pagesmodel' );
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name','Name','required');
		if($this->form_validation->run()==FALSE){
			$this->load->model ( 'pagesmodel' );
			$this->lang->load('admin_content_lang', 'english');
			$data ['data'] = $this->pagesmodel->findById($id);
			$data ['page'] = 'admin/pages/update';
			$this->load->view ( 'templates/templateAdmin', $data );
		}else {
			
					$data= array(
							'name'=> $_POST['name'],
							'content'		=>$_POST['name'],
							'publishDate' => date('Y-m-d'),
							'status'=>isset($_POST['status'])?$_POST['status']:0
						);
					$this->pagesmodel->update($id,$data);
					redirect('admin/pages');

          
		}
		
	}
	function delete($id){
		$this->load->model ( 'pagesmodel' );
		$this->load->model ( 'articlesmodel' );
		$this->pagesmodel->delete($id);
		redirect('admin/pages');
		
		
		
	}
	function active($id){
		$this->load->model ( 'pagesmodel' );
		$data= array('status'=>0);
		$this->pagesmodel->update($id,$data);
		redirect('admin/pages');
	}
	function deactive($id){
		$this->load->model ( 'pagesmodel' );
		$data= array('status'=>1);
		$this->pagesmodel->update($id,$data);
		redirect('admin/pages');
	}
}