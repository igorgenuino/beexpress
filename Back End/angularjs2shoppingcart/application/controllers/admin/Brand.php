<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Brand extends MY_Admin_Controller {

	public function __contruct()
	{ 
		parent::__construct();  
	}
	
	function index() {
		$this->lang->load('admin_content_lang', 'english');
		$data['data'] = $this->BrandModel->findAll();
		$data ['page'] = 'admin/brand/index';
		$this->load->view ( 'templates/templateAdmin', $data );
	
	}
	
	function insert(){
		$data ['page'] = 'admin/brand/insert';		
		$this->load->view ( 'templates/templateAdmin', $data );
	}
	
	function process_insert(){
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('name','Name','required');
		if($this->form_validation->run()==FALSE){
			$data ['page'] = 'admin/brand/insert';
			$this->load->view ( 'templates/templateAdmin', $data );
		}
		else {
			   $data= array(
					'name'=> $_POST['name'],
					'status'=>isset($_POST['status'])?$_POST['status']:0
				);
				$this->BrandModel->insert($data);
				redirect('admin/brand');
		}
		
	}
	function update($id){
		$this->load->model ( 'BrandModel' );
		$data ['data'] = $this->BrandModel->findById($id);
		$data ['page'] = 'admin/brand/update';
		$this->load->view ( 'templates/templateAdmin', $data );
	
	}
	function process_update($id){
		$this->load->model ( 'BrandModel' );
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name','Name','required');
		if($this->form_validation->run()==FALSE){
			$data ['data'] = $this->BrandModel->findById($id);
			$data ['page'] = 'admin/brand/update';
			$this->load->view ( 'templates/templateAdmin', $data );
		}
		else {
			$data= array(
				'name'=> $_POST['name'],
				'status'=>isset($_POST['status'])?$_POST['status']:0
			);
			$this->BrandModel->update($id, $data);
			redirect('admin/brand');
			
		}
		
	}
	function delete($id){
		$this->BrandModel->delete($id);
		redirect('admin/brand');
	}
	
	function active($id){
		$data= array('status'=>0);
		$this->BrandModel->update($id,$data);
		redirect('admin/brand');
	}
	
	function deactive($id){
		$data= array('status'=>1);
		$this->BrandModel->update($id,$data);
		redirect('admin/brand');
	}
	
	function findByCategories($id){
		$data ['data'] = $this->articlesmodel->findByBrand($id);
		$data ['page'] = 'admin/brand/listarticles';
		$this->load->view ( 'templates/templateAdmin', $data );
	}

}
	