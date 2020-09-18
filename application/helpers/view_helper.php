<?php
function view($view, $arr = array()){
	$CI =& get_instance();
	$CI->load->view('defaults/header');
	$CI->load->view($view, $arr);
	$CI->load->view('defaults/footer');
}
