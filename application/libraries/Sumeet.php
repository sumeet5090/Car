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

	public function validations_for_register($is_admin = false){

		$this->CI->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

		if($is_admin){

			$this->CI->form_validation->set_rules('first_name', 'First Name', 'trim|required|min_length[3]|max_length[12]');
			$this->CI->form_validation->set_rules('last_name', 'Last Name', 'trim|required|min_length[3]|max_length[12]');
			$this->CI->form_validation->set_rules('email', 'Email', 'trim|required|min_length[3]|max_length[40]|valid_email|is_unique[admin.email]');
			$this->CI->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]|max_length[12]');
			$this->CI->form_validation->set_rules('password_c', 'Password Confirmation', 'trim|required|matches[password]');
		}
		else{

			$this->CI->form_validation->set_rules('first_name', 'First Name', 'trim|required|min_length[3]|max_length[15]');
			$this->CI->form_validation->set_rules('last_name', 'Last Name', 'trim|required|min_length[3]|max_length[15]');
			$this->CI->form_validation->set_rules('email', 'Email', 'trim|required|min_length[3]|max_length[40]|valid_email|is_unique[customers.email]');
			$this->CI->form_validation->set_rules('phone', 'Phone', 'trim|required|exact_length[10]|is_natural_no_zero');
//			$this->CI->form_validation->set_rules('car_model', 'Car Model', 'trim|required|min_length[3]|max_length[40]|is_natural_no_zero');
//			$this->CI->form_validation->set_rules('fuel', 'Fuel', 'trim|required|min_length[3]|max_length[40]|is_natural_no_zero');
//			$this->CI->form_validation->set_rules('car_no', 'Car_no', 'trim|required|min_length[3]|max_length[40]|is_natural_no_zero');
//			$this->CI->form_validation->set_rules('address', 'Address', 'trim|required|min_length[3]|max_length[40]|is_natural_no_zero');
//			$this->CI->form_validation->set_rules('is_insured', 'Is_insured', 'trim|required|min_length[3]|max_length[40]|is_natural_no_zero');
			$this->CI->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]|max_length[20]');
			$this->CI->form_validation->set_rules('password_c', 'Password Confirmation', 'trim|required|matches[password]');
		}
	}

	public function validations_for_login($is_admin = false){

		$this->CI->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

		if ($is_admin){

			$this->CI->form_validation->set_rules('email', 'Email', 'trim|required|min_length[3]|max_length[40]|valid_email');
			$this->CI->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]|max_length[12]');
		}
		else{

			$this->CI->form_validation->set_rules('email', 'Email', 'trim|required|min_length[3]|max_length[40]|valid_email');
			$this->CI->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]|max_length[12]');
		}
	}

	public function validations_for_insurance(){

		$this->CI->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

		$this->CI->form_validation->set_rules('insurance_id', 'Insurance Type', 'trim|required|exact_length[1]|is_natural_no_zero');
		$this->CI->form_validation->set_rules('car_model', 'Car Model', 'trim|required|min_length[1]|max_length[10]');
		$this->CI->form_validation->set_rules('car_no', 'Car_no', 'trim|required|min_length[3]|max_length[10]');
		$this->CI->form_validation->set_rules('engine', 'Engine', 'trim|required|min_length[1]|max_length[10]');
		$this->CI->form_validation->set_rules('fuel_type', 'Fuel', 'trim|required|exact_length[1]|is_natural_no_zero');
		$this->CI->form_validation->set_rules('address', 'Address', 'trim|required|min_length[3]|max_length[80]');
		$this->CI->form_validation->set_rules('phone', 'Phone', 'trim|required|exact_length[10]|is_natural_no_zero');
//			$this->CI->form_validation->set_rules('is_insured', 'Is_insured', 'trim|required|min_length[3]|max_length[40]|is_natural_no_zero');
	}

	public function get_registration_inputs( $is_admin = false ){

		if($is_admin){

			$input['first_name']  = $this->CI->input->post('first_name');
			$input['last_name']  = $this->CI->input->post('last_name');
			$input['email']  = $this->CI->input->post('email');
			$input['password']  = $this->CI->input->post('password');

			return ( !empty( $input ) ) ? $input : false;
		}
		else

			$input['first_name']  = $this->CI->input->post('first_name');
			$input['last_name']  = $this->CI->input->post('last_name');
			$input['email']  = $this->CI->input->post('email');
			$input['phone']  = $this->CI->input->post('phone');
			$input['password']  = $this->CI->input->post('password');

			return ( !empty( $input ) ) ? $input : false;
	}

	public function get_login_inputs($is_admin = false){

		if($is_admin){

			$input['email']  = $this->CI->input->post('email');
			$input['password']  = $this->CI->input->post('password');

			return ( !empty( $input['email'] ) && !empty( $input['password'] ) ) ? $input : false;
		}
		else

			$input['email']  = $this->CI->input->post('email');
			$input['password']  = $this->CI->input->post('password');

			return ( !empty( $input['email'] ) && !empty( $input['password'] ) ) ? $input : false;
		}

	public function get_insurance_inputs(){
		$input['insurance_id']  = $this->CI->input->post('insurance_id');
		$input['car_model']  = $this->CI->input->post('car_model');
		$input['fuel']  = $this->CI->input->post('fuel');
		$input['car_no']  = $this->CI->input->post('car_no');
		$input['engine']  = $this->CI->input->post('engine');
		$input['address']  = $this->CI->input->post('address');
		$input['phone'] = $this->CI->input->post('phone');

		return  !empty( $input ) ? $input : false;
	}

	public function validate_user($data, $is_admin = false){

		$CI =& get_instance();

		//1. see if the user exists in db
		//2. if yes then proceed to validate the password, else return false
		//3. if password is incorrect then return false, else return true

		if( $is_admin ){

			if( is_array( $data ) ){

				$admin_details = $CI->admin_model->fetch_admins( array('email' => $data['email']) );

				if (is_array($admin_details) && !empty($admin_details) && $admin_details != false){

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
		else{

			if( is_array($data) ){

				$customer_details = $CI->customers_model->fetch_customers( array('email' => $data['email']) );

				if ( is_array($customer_details) && !empty($customer_details) && $customer_details != false ){

					if( isset( $data['password'] ) ){

						$suc = password_verify($data['password'], $customer_details['password']);
						return ($suc) ? true : 'Invalid Password';
					}
					else
						// only email not password ? return true
						return true;
				}
				else
					return 'Invalid Email';
			}
			else
				return false;
		}

	}

	public function register_the_user($input, $is_admin = false){

		if($is_admin){

			$data['first_name'] = $input['first_name'];
			$data['last_name'] = $input['last_name'];
			$data['email'] = $input['email'];
			$data['password'] = password_hash($input['password'], PASSWORD_BCRYPT);

			return $this->CI->admin_model->create_new_admin($data); // already returns true or false
		}
		else{

			$data['first_name'] = $input['first_name'];
			$data['last_name'] = $input['last_name'];
			$data['email'] = $input['email'];
			$data['phone'] = $input['phone'];
			$data['password'] = password_hash($input['password'], PASSWORD_BCRYPT);

			return $this->CI->customers_model->create_new_customer($data); // already returns true or false
		}
	}

	public function update_customer_details( $input ){
		return $this->CI->customers_model->update_customer( array('email'=> $this->CI->session->userdata('email')), $input );
	}

//	public function generateRandStr($length){
//
//		$randstr = "";
//
//		//getiing the no. of numeric values in string
//		$num_of_numeric_values = mt_rand( 1, $length-1 );
//
//		//getting the individual position for numeric values
//		for ( $i = 0; $i < $num_of_numeric_values; ++$i ){
//
//			$position_for_numeric[$i] = mt_rand( 0, $length-1 );
//			sort($position_for_numeric);
//		}
//
//		for ( $i = 0; $i < $length; $i++ ){
//
//			if( in_array($i, $position_for_numeric) ){
//				$randstr .= mt_rand(0, 9);
//			}
//			else{
//				generate_again : $randnum = mt_rand(0, 61);
//
//				if ( $randnum < 36 ){
//
//					$char = chr( $randnum + 55);
//
//					if( ctype_alnum( $char )){
//
//						$randstr .= $char;
//					}
//					else goto generate_again;
//
//				}
//				else{
//					$char = chr( $randnum + 61);
//
//					if( ctype_alnum( $char )){
//
//						$randstr .= $char;
//					}
//					else goto generate_again;
//				}
//			}
//
//		}
//
//		$final = strtolower($randstr);
//		return $final;
//	}
//
//	public function groupByOwners(  ){
//		$arr = array(
//			'file.txt'=> 'sumeet',
//			'file2.txt'=> 'rakesh',
//			'file3.txt'=> 'rakesh',
//			'file4'=> 'ajit',
//			'file5'=> 'rakesh',
//			'file6'=> 'ajit'
//		);
//
//		$order_by = 'ascending';
//		$file_arr = array();
//		$name_arr = array();
//		$new_arr = array();
//		$i = 0;
//
//		foreach ($arr as $file => $name){
//			$file_arr[$i] = $file;
//			$name_arr[$i] = $name;
//			$i += 1;
//		}
//
//		for( $j=0; $j < count($name_arr); $j++){
//
//			for ( $i=0; $i < count($name_arr)-1; $i++){
//
//				switch ($order_by){
//					case 'ascending' :
//
//						if($name_arr[$i] > $name_arr[$i+1]){
//
//							$temp = $name_arr[$i];
//							$temp_f = $file_arr[$i];
//
//							$name_arr[$i] = $name_arr[$i+1];
//							$file_arr[$i] = $file_arr[$i+1];
//
//							$name_arr[$i+1] = $temp;
//							$file_arr[$i+1] = $temp_f;
//						}
//						break;
//
//					case 'descending' :
//
//						if($name_arr[$i] < $name_arr[$i+1]){
//
//							$temp = $name_arr[$i];
//							$temp_f = $file_arr[$i];
//
//							$name_arr[$i] = $name_arr[$i+1];
//							$file_arr[$i] = $file_arr[$i+1];
//
//							$name_arr[$i+1] = $temp;
//							$file_arr[$i+1] = $temp_f;
//						}
//						break;
//				}
//
//			}
//		}
//
//		foreach ($name_arr as $key=>$name){
//			foreach ($name_arr as $key2 => $name2){
//				if ($key == $key2) {
//					$new_arr[$name] = $file_arr[$key];
//					unset($name_arr[$key2]);
//				}
//				else{
//					if($name == $name2){
//						if(is_array($new_arr[$name])){
//							$new_arr[ $name ][ count($new_arr[$name]) ] = $file_arr[$key2];
//							unset($name_arr[$key2]);
//						}
//						else
//							$new_arr[$name] = array( $file_arr[$key], $file_arr[$key2] );
//							unset($name_arr[$key2]);
//					}
//				}
//			}
//		}
//		return $new_arr;
//	}
//
//	public function unique_names(){
//
//		$arr1 = array('sumeet', 'ajit', 'sameer', 'venkat');
//		$arr2 = array('venkat', 'amit', 'sameer');
//		$new_arr = array();
//
//		foreach ($arr1 as $key1 => $name1){
//			$new_arr[count($new_arr)] = $name1;
//		}
//		foreach ($arr2 as $key2 => $name2){
//			$new_arr[count($new_arr)] = $name2;
//		}
//		foreach ($new_arr as $key1 => $name1){
//			foreach ($new_arr as $key2 => $name2){
//
//				if($key1 <> $key2){
//					if( $name1 == $name2 ){
//						unset($new_arr[$key2]);
//					}
//				}
//			}
//		}
//		return $new_arr;
//	}

}
