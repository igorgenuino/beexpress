<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Admin_Controller extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('username_admin')==null  ) {
			redirect('admin/login');
		}
	}
}

?>