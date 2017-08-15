<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Articles extends MY_Admin_Controller {

	public function __contruct()
	{ 
		parent::__construct();  
	}
	function index($index=0) {
		$this->load->model ( 'articlesmodel' );
		$this->load->model ( 'categoriesmodel' );
		$this->lang->load('admin_content_lang', 'english');
		$data['data']=$this->articlesmodel->findAll();
		$data ['page'] = 'admin/articles/index';
		$this->load->view ( 'templates/templateAdmin', $data );
	
	}
	function listarticles() {
		$this->load->model ( 'articlesmodel' );
		$this->load->model ( 'categoriesmodel' );
		$this->lang->load('admin_content_lang', 'english');
		$data['data']=$this->articlesmodel->findAll();
		$data ['page'] = 'admin/articles/index';
		$this->load->view ( 'templates/templateAdmin', $data );
	
	}
	function insert(){
		$this->load->model ( 'articlesmodel' );
		$this->load->model ( 'categoriesmodel' );
		$this->lang->load('admin_content_lang', 'english');
		$data ['page'] = 'admin/articles/insert';
		$data['brands']=$this->BrandModel->findAll();
		$this->load->view ( 'templates/templateAdmin', $data );
	}


	function process_insert(){
		$this->load->model ( 'articlesmodel' );
		$this->load->library('form_validation');
		$this->lang->load('admin_content_lang', 'english');
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('detail', 'Detail', 'required');
		$this->form_validation->set_rules('price', 'Price', 'required|numeric|greater_than[0]');
		$this->form_validation->set_rules('quantity', 'Quantity', 'required|integer|greater_than[0]');
		if ($this->form_validation->run() == FALSE)
		{ 
			$this->load->model ( 'articlesmodel' );
			$this->load->model ( 'categoriesmodel' );
			$data ['page'] = 'admin/articles/insert';
			$this->load->view ( 'templates/templateAdmin', $data );
		}
		else {
			
                
			    $config['upload_path']          = './assets/upload/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 2024;
              
				$config['encrypt_name']             = TRUE;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('photo'))
                {
					$data = array (
						'title' =>$_POST['title'],
						'description' =>$_POST['description'],
						'detail' => $_POST['detail'],
						'photo'		=>'no-image.png',
						'status' => isset($_POST['status'])?$_POST['status']:0,
						'publishDate' => date('Y-m-d'),
						'categoryId' => $_POST['categoryId'],
						'views'=>0,
						'brandId' => $_POST['brandId']
						);
					$this->articlesmodel->insert ( $data );	
					redirect('admin/articles');
                }
                else
                {
					
                    $data = array('upload_data' => $this->upload->data());
					$image_name=$data['upload_data']['file_name'];
					$data = array (
						'title' =>$_POST['title'],
						'description' =>$_POST['description'],
						'detail' => $_POST['detail'],
						'photo'		=>$image_name,
						'status' => isset($_POST['status'])?$_POST['status']:0,
						'publishDate' => date('Y-m-d'),
						'categoryId' => $_POST['categoryId'],
						'views'=>0,
						'brandId' => $_POST['brandId']
						);
					$this->articlesmodel->insert ( $data );	
					redirect('admin/articles');
					
                }
			
				
				
			
		}
	}
	function update($id){
		$this->load->model ( 'articlesmodel' );
		$this->load->model ( 'categoriesmodel' );
		$this->lang->load('admin_content_lang', 'english');
		$data ['data'] = $this->articlesmodel->findById($id);
		$data['brands']=$this->BrandModel->findAll();
		$data ['page'] = 'admin/articles/update';
		$this->load->view ( 'templates/templateAdmin', $data );
	
	}

	function process_update($id) {
		$this->load->model ( 'articlesmodel' );
		$this->lang->load('admin_content_lang', 'english');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('detail', 'Detail', 'required');
		if ($this->form_validation->run() == FALSE){
			$this->load->model ( 'articlesmodel' );
			$this->load->model ( 'categoriesmodel' );
			$data ['data'] = $this->articlesmodel->findById($id);
			$data ['page'] = 'admin/articles/update';
			$this->load->view ( 'templates/templateAdmin', $data );
		}else{
				$config['upload_path']          = './assets/upload/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 2024;
              
				$config['encrypt_name']             = TRUE;

                $this->load->library('upload', $config);

                if (  $this->upload->do_upload('photo'))
                {
                  
						$data = array('upload_data' => $this->upload->data());
						$image_name=$data['upload_data']['file_name'];
						
						$data1 = array (
							'title' =>$_POST['title'],
							'description' =>$_POST['description'],
							'detail' => $_POST['detail'],
							'photo'		=>$image_name,
							'status' => isset($_POST['status'])?$_POST['status']:0,
							'publishDate' => date('Y-m-d'),
							'categoryId' => $_POST['categoryId'],
							'brandId' => $_POST['brandId']
							
						);
					$this->articlesmodel->update( $id, $data1 );
					redirect('admin/articles');
                }
                else {
					$this->load->model ( 'articlesmodel' );
					$data1 = array (
							'title' =>$_POST['title'],
							'description' =>$_POST['description'],
							'detail' => $_POST['detail'],
							'status' => isset($_POST['status'])?$_POST['status']:0,
							'publishDate' => date('Y-m-d'),
							'categoryId' => $_POST['categoryId'],
							'brandId' => $_POST['brandId']
							
						);
					$this->articlesmodel->update( $id, $data1 );
					redirect('admin/articles');
				
			}
		}
	}
		
	function findByArticle($id){
		$this->load->model ( 'commentsmodel' );
		$this->lang->load('admin_content_lang', 'english');
		$data ['data'] = $this->commentsmodel->findByArticle($id);
		$data ['page'] = 'admin/articles/listcomments';
		$this->load->view ( 'templates/templateAdmin', $data );
	}
	function delete($id){
		$this->load->model ( 'articlesmodel' );
		$this->lang->load('admin_content_lang', 'english');
		$this->load->model ( 'commentsmodel' );
		$commnets=count($this->commentsmodel->findByArticle($id));
		if($commnets==0){
			$this->articlesmodel->delete($id);
			redirect('admin/articles');
		}else{
			$this->session->set_flashdata('message', 'Cannot delete Article!');
			redirect('admin/articles');
		}
		
		

	}
	function active($id){
		$this->load->model ( 'articlesmodel' );
		$data= array('status'=>0);
		$this->articlesmodel->update($id,$data);
		redirect('admin/articles');
	}
	function deactive($id){
		$this->load->model ( 'articlesmodel' );
		$data= array('status'=>1);
		$this->articlesmodel->update($id,$data);
		redirect('admin/articles');
	}
}
	