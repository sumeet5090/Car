<?php


class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index(){
		redirect('auth/register');
	}

	public function login(){

	}

	public function register(){
		$this->load->view('admin/register');
	}
}
