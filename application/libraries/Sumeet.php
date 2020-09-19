<?php


class Sumeet
{
	public $CI;

	/**
	 * Sumeet constructor.
	 * @param $CI
	 */
	public function __construct()
	{
		$this->CI =& get_instance();
	}


	public function register_the_user($input, $is_admin = false){

		if($is_admin){

			$data['first_name'] = $input['first_name'];
			$data['last_name'] = $input['last_name'];
			$data['email'] = $input['email'];
			$data['password'] = password_hash($input['password'], PASSWORD_BCRYPT);

			return $this->CI->admin_model->create_new_admin($data);
		}
		else{
			//incomplete
			return false;
		}
	}

	public function validations_for_register($is_admin = false){

		if($is_admin){

			$this->CI->form_validation->set_rules('first_name', 'First Name', 'trim|required|min_length[3]|max_length[12]');
			$this->CI->form_validation->set_rules('last_name', 'Last Name', 'trim|required|min_length[3]|max_length[12]');
			$this->CI->form_validation->set_rules('email', 'Email', 'trim|required|min_length[3]|max_length[40]|valid_email|is_unique[admin.email]');
			$this->CI->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]|max_length[12]');
			$this->CI->form_validation->set_rules('password_c', 'Password Confirmation', 'trim|required|matches[password]');
		}
	}

	public function validations_for_login($is_admin = false){

		if ($is_admin){

			$this->CI->form_validation->set_rules('email', 'Email', 'trim|required|min_length[3]|max_length[40]|valid_email');
			$this->CI->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]|max_length[12]');
		}
	}

	public function get_registration_inputs( $is_admin = false){

		if($is_admin){

			$input['first_name']  = $this->CI->input->post('first_name');
			$input['last_name']  = $this->CI->input->post('last_name');
			$input['email']  = $this->CI->input->post('email');
			$input['password']  = $this->CI->input->post('password');

			return ( !empty( $input ) ) ? $input : false;
		}
		else
			return false;
	}

	public function get_login_inputs($is_admin = false){

		if($is_admin){

			$input['email']  = $this->CI->input->post('email');
			$input['password']  = $this->CI->input->post('password');

			return ( !empty( $input['email'] ) && !empty( $input['password'] ) ) ? $input : false;
		}
		else
			return false;
	}

	public function validate_user($data, $is_admin = false){
		$CI =& get_instance();

		//1. see if the user exists in db
		//2. if yes then proceed to validate the password, else return false
		//3. if password is incorrect then return false, else return true

		if( $is_admin ){

			if( is_array( $data ) ){

				$admin_details = $CI->admin_model->fetch_admins( array('email' => $data['email']) );

				if (is_array($admin_details) && $admin_details != false){

					if( isset( $data['password'] ) ){

						$suc = password_verify($data['password'], $admin_details['password']);
						return ($suc) ? true : 'invalid_password';
					}
					else
						// only email not password ? return true
						return true;
				}
				else
					return 'invalid_email';
			}
			else
				return false;
		}
		else
			//incomplete
			return false;
	}


}
