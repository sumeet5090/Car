<?php

/**
 * @param $session_details
 * @param bool $is_admin
 * @return bool
 * 1. get the array with session details
 * 2. using foreach update the session variables with array data
 * 3. if all good then ? return true : false
 */
function start_session($session_details, $is_admin = false){

	if(is_array($session_details)){

		$CI =& get_instance();

		if($is_admin){

			foreach ($session_details as $session_key => $session_value) {

				$CI->session->set_userdata( $session_key, $session_value );

				if( isset( $_SESSION[$session_key] ) && !empty( $_SESSION[$session_key] ) ){
					continue;
				}
				else
					return false;
			}
		}
		else{

			foreach ($session_details as $session_key => $session_value) {

				$CI->session->set_userdata( $session_key, $session_value );

				if( isset( $_SESSION[$session_key] ) && !empty( $_SESSION[$session_key] ) ){
					continue;
				}
				else
					return false;
			}
		}
		return true;
	}
	return false;
}

/**
 * @param bool $is_admin
 * @return bool
 * 1. get_instance()
 * 2. if the session is set ? return true : flase
 */
function is_user_logged_in($is_admin = false){

	$CI =& get_instance();

	if($is_admin){

		return ($CI->session->userdata('is_admin')) ? true : false;
	}
	else
		return ($CI->session->userdata('is_logged_in')) ? true : false;
}

/**
 * @param bool $is_admin
 * @return bool
 *
 * 1. get_instance()
 * 2. unset the session
 * 3. if the session is cleared ? return true : false
 */
function clear_session($is_admin = false){

	$CI =& get_instance();

	if ($is_admin){

		$CI->session->unset_userdata('is_admin');

		return (isset($_SESSION['is_admin']) || $_SESSION['is_admin'] == true) ? false : true;
	}
	else{

		$CI->session->unset_userdata('is_logged_in');

		return (isset($_SESSION['is_logged_in']) || $_SESSION['is_logged_in'] == true) ? false : true;

	}
}
