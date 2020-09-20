<?php


class Insurance extends CI_Controller
{

	/**
	 * Insurance constructor.
	 */
	public function __construct()
	{
		parent::__construct();
	}

	public function index(){

		is_user_logged_in(false) ? redirect('insurance/home') : redirect('auth/login');
	}

	public function home(){
		echo 'welcome';
	}

}
