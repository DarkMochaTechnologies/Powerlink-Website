<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home extends BMS_Controller
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
	} //end of function __construct

	function index(){	
		$this->load->helper('file');
		$this->load->model('admin_model');
		$this->load->model('member_model');

		$this->form_validation->set_rules('txt_username', 'CategoryID', 'trim|required|xss_clean|min_length[3]');
		$this->form_validation->set_rules('txt_password', 'Member_Pword', 'trim|required|xss_clean|min_length[4]');
		
		if($this->form_validation->run()){
			$o_user_account = $this->admin_model->login();
			if($o_user_account != FALSE){
				$o_user_info = $this->member_model->get_info($o_user_account->MemberID);
				$a_data = array('Username' => $o_user_account->Username, 
								'AccNo' => $o_user_account->AccNo,
								'AccType' => $o_user_account->AccType,
								'FirstName' => $o_user_info->Mem_FirstName,
								'LastName' => $o_user_info->Mem_LastName,
								);
				$this->session->set_userdata('AccInfo', $a_data);
				$this->data['o_user'] = $o_user_info;
			}else{
				$this->data['s_error'] = "Invalid Username/Password, Please try again";
			}
		}
		$this->data['s_main_content'] = 'home';
		$this->load->view('includes/template', $this->data);
	} //end of function index
		
}
?>
