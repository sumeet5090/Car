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

		is_user_logged_in() ? redirect('insurance/home') : redirect('auth/login');
	}

	/**
	 *1. set the validations
	 *2. if valid inputs, then collect the inputs, check the credentials from db
	 *3. if valid user, start the session
	 *4. redirect to dashboard
	 */
	public function login(){

		if(is_user_logged_in()){

			redirect('insurance/home');
		}

		$this->sumeet->validations_for_login();

		if ($this->form_validation->run()  == false){

			view('client/auth/login');
		}
		else{

			if( isset( $_POST['login'] ) ){

				$counter = 1;
				login_inputs : $input = $this->sumeet->get_login_inputs( false );

				if( $input != false ){

					$suc = $this->sumeet->validate_user( $input, false );

					if( $suc === true ){

						clear_session(false);

						$admin_details = $this->customers_model->fetch_customers( array('email' => $input['email']) );

						$session_details['email'] = $input['email'];
						$session_details['first_name'] = $admin_details['first_name'];
						$session_details['last_name'] = $admin_details['last_name'];
						$session_details['is_logged_in'] = 1;

						start_session( $session_details, false );

						redirect('insurance/home');
					}
					elseif( $suc === false ){

						++$counter;
						if( $counter < 4 )
							goto login_inputs;
						else
							goto login;
					}
					else
						$this->session->set_flashdata('flash', $suc);
				}
			}
			login: redirect('auth/login');
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

		$this->sumeet->validations_for_register( false );

		if ($this->form_validation->run()  == false){

			view('client/auth/register');

		}
		else{

			if( isset($_POST['register']) ){

				$input = $this->sumeet->get_registration_inputs( false );
				$suc = $this->sumeet->register_the_user( $input, false );

				($suc) ? redirect('insurance/home') : redirect('auth/register');
			}
			redirect('auth/register');
		}
	}

	public function logout(){

		clear_session(false);
		redirect('auth/login');

	}
}
