<?php

function start_session( $session_details, $is_admin = false){

	if(is_array($session_details)){

		$CI =& get_instance();
		if($is_admin){
			foreach ($session_details as $key=>$item) {
				$CI->session->set_userdata($key, $item);
				if( ! isset($_SESSION[$key] )){
					return false;
				}
			}
			return true;
		}
		else{
			foreach ($session_details as $key=>$item) {
				$CI->session->set_userdata($key, $item);
				if( ! isset($_SESSION[$key] )){
					return false;
				}
			}
			return true;
		}

	}
	return false;
}

function is_logged_in($admin = false){
	$CI =& get_instance();
	if($admin){
		return ($CI->session->userdata('is_admin')) ? true:false;
	}else
		return ($CI->session->userdata('is_logged_in')) ? true:false;
}

function clear_session($admin = false){
	$CI =& get_instance();
	if ($admin){
		$CI->session->unset_userdata('is_admin');
		if(isset($_SESSION['is_admin']) || $_SESSION['is_admin'] == true){
			return false;
		}else return true;
	}
	else{
		$CI->session->unset_userdata('is_logged_in');
		if(isset($_SESSION['is_logged_in']) || $_SESSION['is_logged_in'] == true){
			return false;
		}else return true;
	}
}
