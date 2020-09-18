<?php

function prepare_to_register($input = array(), $is_admin = false){
	if($is_admin){
		$data['first_name'] = $input['first_name'];
		$data['last_name'] = $input['last_name'];
		$data['email'] = $input['email'];
		$data['password'] = password_hash($input['password'], PASSWORD_BCRYPT);

		return $data;
	}else{

		//incomplete
		return true;
	}
}

function register($data, $is_admin = false){
	if ($is_admin){
		$CI =& get_instance();
		return $CI->admin_model->create_new_admin($data);
	}
	else{
		//incomplete
		return true;
	}
}

function check_login_credentials($data, $is_admin = false){
	$CI =& get_instance();

	//1. see if the required email exists in db
	//2. if yes then proceed to validate the password, else return false
	//3. if password is incorrect then return false, else return true

	if($is_admin){
		//1. see if the required email exists in db
		$condition['email'] = $data['email'];
		$admin_details = $CI->admin_model->fetch_admins( $condition );

		//2. if yes then proceed to validate the password, else return false
		if (is_array($admin_details) && $admin_details != false){

			//3. if password is incorrect then return false, else return true
			$is_valid = password_verify($data['password'], $admin_details['password']);
			return ($is_valid) ? true : 'invalid_password';
		}
		else{
			return 'invalid_email';
		}
	}
	//non admin
	else{
		return false;
	}
}
