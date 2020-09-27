<?php


class Insurance extends CI_Controller
{

	/**
	 * Insurance constructor.
	 */
	public function __construct()
	{
		parent::__construct();
	}

	public function index(){

		is_user_logged_in(false) ? redirect('insurance/home') : redirect('auth/login');
	}

	public function home(){

		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
		$this->form_validation->set_rules('car_no', 'Car_no', 'trim|required|alpha_numeric|min_length[3]|max_length[10]');

		if( $this->form_validation->run() == false){

			view('client/home');
		}
		else{
			$this->session->set_userdata('car_no', $this->input->post('car_no'));
			redirect('insurance/services');
		}
	}

	public function about(){

		view('client/about');
	}

	public function contact(){

		view('client/contact');
	}

	public function services(){

		$data['coverages'] = $this->insurance_model->get_ins_coverage();

		if( isset($_POST['insurance_id']) ){

			$this->session->set_userdata( 'insurance_id', $this->input->post('insurance_id') );
			redirect('insurance/insure');
		}
		view('client/services', $data);
	}

	public function insure(){

		if( !get_customer_email() ) redirect('auth/login');

		$data['customer_details'] = $this->customers_model->fetch_customers( array( 'email' => get_customer_email() ) );

		$data['car_no'] = isset($_SESSION['car_no']) ? $this->session->userdata('car_no') : false;
		$data['insurance_id'] = isset($_SESSION['insurance_id']) ? $this->session->userdata('insurance_id') : false;

		$this->sumeet->validations_for_insurance();

		if($this->form_validation->run() == false){

			view('client/insurance/insurance', $data);
		}
		else{

			$input = (isset($_POST['checkout'])) ? $this->sumeet->get_insurance_inputs() : false;
			$this->sumeet->update_customer_details($input);
			redirect('insurance/checkout');
		}

	}

	public function checkout(){
		echo 'checkout';
	}

}
