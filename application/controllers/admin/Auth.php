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

		is_user_logged_in( true ) ? redirect('admin/dashboard') : redirect('admin/auth/login');

	}

	/**
	 *1. set the validations
	 *2. if valid inputs, then collect the inputs, check the credentials from db
	 *3. if valid user, start the session
	 *4. redirect to dashboard
	 */
	public function login(){

		if(is_user_logged_in(true)){

			redirect('admin/dashboard');
		}

		$this->sumeet->validations_for_login( true );

		if ($this->form_validation->run()  == false){

			view('admin/login');
		}
		else{

			if( isset( $_POST['login'] ) ){

				login_inputs : $input = $this->sumeet->get_login_inputs( true );

				if( $input != false ){

					$suc = $this->sumeet->validate_user( $input, true );

					if( $suc === true ){

						clear_session(true);

						$admin_details = $this->admin_model->fetch_admins( array('email' => $input['email']) );

						$session_details['email'] = $input['email'];
						$session_details['first_name'] = $admin_details['first_name'];
						$session_details['last_name'] = $admin_details['last_name'];
						$session_details['is_admin'] = 1;

						start_session( $session_details, true );

						redirect('admin/dashboard/');
					}
					elseif( $suc === false ){

						goto login_inputs;
					}
					else
						$this->session->set_flashdata('flash', $suc);
				}
			}
			redirect('admin/auth/login');
		}
	}

	/**
	 *
	 *1. set the validations
	 *2. if valid inputs, then collect the inputs, prepare the inputs to save into db
	 *3. save the input details in db
	 *4. redirect to login
	 */
	public function register(){

		$this->sumeet->validations_for_register( true );

		if ($this->form_validation->run()  == false){

			view('admin/register');

		}
		else{

			if( isset($_POST['register']) ){

				$input = $this->sumeet->get_registration_inputs( true );
				$suc = $this->sumeet->register_the_user( $input, true );

				($suc) ? redirect('admin/auth/login') : redirect('admin/auth/register');
			}
			redirect('admin/auth/register');
		}
	}

	public function logout(){

		clear_session(true);
		redirect('admin/auth/login');

	}
}
