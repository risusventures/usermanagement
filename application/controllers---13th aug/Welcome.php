<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class welcome extends CI_Controller {

	public function index()
	{
		$this->load->view('admin_panel/');
	}
	public function home()
	{
		$this->load->view('admin_seller/report');
	}
	
}
