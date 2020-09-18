<?php


class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index(){
		if(is_logged_in(true)) {
			view('admin/dashboard');
		}
		else{
			redirect('admin/auth/login');
		}

	}
}
