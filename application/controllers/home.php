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
			base_url() . 'application/public/css/slick.css',
			);

		$this->data['a_js_scripts'] = array( 
			base_url() . 'application/public/js/modernizr.custom.js',
			base_url() . 'application/public/js/jquery.lettering.js',
			base_url() . 'application/public/js/jquery-2.1.1.min.js',
			base_url() . 'application/public/js/slick.js',			
			);
		$this->load->helper('form');
		$this->load->library('session');
	} //end of function __construct

	function index(){	
		$this->load->helper('file');

		$this->data['s_main_content'] = 'home';
		$this->load->view('includes/template', $this->data);
	} //end of function index
		
}
?>
