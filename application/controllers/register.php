<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Register extends BMS_Controller
{
	function __construct()
	{
		parent::__construct();
		
		$this->data['s_page_title'] = 'Home';
		$this->data['s_page_header'] = 'home';
		$this->data['s_page_type'] = 'home';
		$this->data['a_cs_scripts'] = array(
			base_url() . 'application/public/css/main.css',
			base_url() . 'application/public/css/home_style.css',
			);

		$this->data['a_js_scripts'] = array( 
			base_url() . 'application/public/js/modernizr.custom.js',
			base_url() . 'application/public/js/jquery.lettering.js',
			base_url() . 'application/public/js/jquery-2.1.1.min.js',
			);
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->model('account_model');
		$this->load->model('member_model');
	} //end of function __construct

	function index(){	
			$this->form_validation->set_rules('txt_username', 'Project Name', 'trim|required|xss_clean|min_length[3]');
			$this->form_validation->set_rules('txt_password', 'Password', 'matches[txt_password_conf]|required|min_length[4]');
			$this->form_validation->set_rules('txt_password_conf', 'Confirm Password', 'required|min_length[4]');
			$this->form_validation->set_rules('txt_approval_code', 'Approval Code', 'required|min_length[4]');
			if($this->form_validation->run()){

				if($this->input->post('txt_approval_code')){
					$b_o_approval_check = $this->member_model->check_approval_code($this->input->post('txt_approval_code'));
				}

				if(isset($b_o_approval_check) && $b_o_approval_check != FALSE){
						$a_account_value_db = array('txt_username' 		  => 'Username',
													'txt_password' 	 	  => 'Member_Pword',
													'Mem_ID'			  => 'MemberID',
													'AccountType'			  => 'AccType'
													);
						$a_account_info = array('Username' 		=> $this->input->post('txt_username'),
												'Member_Pword' 	 	  => sha1(md5($this->input->post('txt_password'))),
												'MemberID'			  => $b_o_approval_check->Mem_ID,
												'AccType'			  => 'user'
												);


						$this->account_model->add($a_account_info);
						redirect('/')
				}else{
					$this->data['a_account_info'] = 'Invalid Approval Number';
				}
			}

				$this->data['s_main_content'] = 'register';
				$this->load->view('includes/template', $this->data);
			
			

	}
		
}
?>
