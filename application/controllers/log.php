<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Log extends BMS_Controller
{
	function __construct()
	{
		parent::__construct();
		
		$this->data['s_page_title'] = 'Home';
		$this->data['s_page_header'] = 'home';
		$this->data['s_page_type'] = 'bms';

		$this->load->library('session');

	} //end of function __construct

	function logout(){	
		$this->session->sess_destroy();
		redirect('/', 'refresh');

	} //end of function index

}
?>
