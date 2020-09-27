<?php


class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index(){

		if(is_user_logged_in(true)) {

			redirect('admin/dashboard/view');
		}
		else{

			redirect('admin/auth/login');
		}
	}

	public function view(){
		view('admin/dashboard');
	}
}
