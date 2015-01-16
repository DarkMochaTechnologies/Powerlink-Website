<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class BMS_Controller extends CI_Controller
{
	protected $data = array();

	function __construct()
	{
        parent::__construct();

		$this->data['b_modernizr_enabled'] = TRUE;
		$this->data['b_jquery_enabled'] = TRUE;
		$this->data['b_bootstrap_enabled'] = TRUE;

		$this->data['a_cs_scripts'] = array(
				base_url() . 'application/public/css/style.css',
				base_url() . 'application/public/css/login_style.css'
			);

		switch ($this->uri->segment(1)) {
			case 'bms_admin':
				$this->data['s_page_type'] = 'admin';
				$this->_nav_highlight($this->uri->segment(2));
				break;
			default:
				$this->data['s_page_type'] = 'centre_admin';
				$this->_nav_highlight($this->uri->segment(2));
				break;
		}
	}

	function _nav_highlight($s_tab_item)
	{
		switch ($s_tab_item) {
			case '':
				$this->data['b_tab_2'] = FALSE;
				$this->data['b_tab_1'] = TRUE;
				$this->data['b_tab_3'] = FALSE;
				break;
			case 'centre':
				$this->data['b_tab_2'] = TRUE;
				$this->data['b_tab_1'] = FALSE;
				$this->data['b_tab_3'] = FALSE;
				break;
			case 'ad':
				$this->data['b_tab_1'] = FALSE;
				$this->data['b_tab_2'] = FALSE;
				$this->data['b_tab_3'] = TRUE;
				break;
			default:
				$this->data['b_tab_2'] = FALSE;
				$this->data['b_tab_1'] = TRUE;
				$this->data['b_tab_3'] = FALSE;
				break;
		}
	}	
}
/* End of BMS_Controller */

class Bms_Admin extends BMS_Controller
{
	protected $data = array();

	function __construct()
	{
		parent::__construct();

		// Check if logged in
		if (!$this->_is_logged_in() && $this->uri->segment(2) != 'login') {
			redirect('/bms_admin/login');
		}

		$this->data['s_page_title'] = 'Admin Page';
		$this->data['s_page_type'] = 'admin';
		$this->data['s_page_header'] = $this->uri->segment(1);
		$this->data['a_cs_scripts'] = array(
			base_url() . 'application/public/css/admin_style.css'
		);


		$this->load->library('form_validation');
		$this->load->model('admin_model');
		$this->load->model('centre_locations_model');
	}

	function _is_logged_in()
	{
		return $this->session->userdata('bms_admin_logged_in');
	}
}
/* End of Bms_Admin */