<?php


/**
 * Class Auth
 *
 */
class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index(){
		redirect('admin/auth/login');
	}

	public function login(){

		if(is_logged_in(true)){
			redirect('admin/dashboard');
		}

		//1. set the validations
		//2. if valid inputs, then collect the inputs, check the credentials from db
		//3. if valid user, start the session
		//4. redirect to dashboard

		//1. set the validations
		$this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[3]|max_length[40]|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]|max_length[12]');

		if ($this->form_validation->run()  == false){
			view('admin/login');
		}

		//2. if valid inputs, then collect the inputs, check the credentials from db
		else{
			if( isset($_POST['login']) ){
				$input['email']  = $this->input->post('email');
				$input['password']  = $this->input->post('password');

				$is_valid = check_login_credentials($input, true);

				//3. if valid user, start the session
				if( $is_valid  == true ){

					//preparing session details
						$condition = array('email'=> $input['email']);
						$admin_details = $this->admin_model->fetch_admins($condition );
						$session_details['email'] = $input['email'];
						$session_details['first_name'] = $admin_details['first_name'];
						$session_details['last_name'] = $admin_details['last_name'];
						$session_details['is_admin'] = 1;
					start_session( $session_details, true );

					redirect('admin/dashboard/');
				}

				//4. if invalid user, redirect to login
				else {
					$this->session->set_flashdata('falsh', $is_valid);
					redirect('admin/auth/login');
				}
			}
			else redirect('admin/auth/login');
		}
	}

	public function register(){

		//1. set the validations
		//2. if valid inputs, then collect the inputs, prepare the inputs to save into db
		//3. save the input details in db
		//4. redirect to login

		// set the validations
		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required|min_length[3]|max_length[12]');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|min_length[3]|max_length[12]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[3]|max_length[20]|valid_email|is_unique[admin.email]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]|max_length[12]');
		$this->form_validation->set_rules('password_c', 'Password Confirmation', 'trim|required|matches[password]');

		if ($this->form_validation->run()  == false){
			view('admin/register');
		}

		//2. if valid inputs, then collect the inputs, prepare the inputs to save into db
		else{

			if( isset($_POST['register']) ){

				$data['first_name']  = $this->input->post('first_name');
				$data['last_name']  = $this->input->post('last_name');
				$data['password']  = $this->input->post('password');
				$data['email']  = $this->input->post('email');

				//3. save the input details in db
				$admin_details = prepare_to_register($data, true);
				$suc = register($admin_details, true);

				//4. redirect to login
				if($suc){
					redirect('admin/auth/login');
				}
				else redirect('admin/auth/register');
			}
			else redirect('admin/auth/register');
		}
	}

	public function logout(){
		clear_session(true);
		redirect('admin/auth/login');
	}
}
