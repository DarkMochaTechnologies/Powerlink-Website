<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class BMS extends BMS_Controller
{
	function __construct()
	{
		parent::__construct();
		
		$this->data['s_page_title'] = 'Home';
		$this->data['s_page_header'] = 'home';
		$this->data['s_page_type'] = 'bms';
		$this->data['a_cs_scripts'] = array(
			base_url() . 'application/public/css/extras/jquery.dataTables.css',
			base_url() . 'application/public/css/main.css',
			base_url() . 'application/public/css/css-responsive-table.css',
			base_url() . 'application/public/css/bms_style.css',	

			);

		$this->data['a_js_scripts'] = array( 
			base_url() . 'application/public/js/jquery-2.1.1.min.js',
			base_url() . 'application/public/js/vendor/bootstrap.js',
			base_url() . 'application/public/js/extras/jquery.dataTables.js',
			base_url() . 'application/public/js/extras/custom-slide-page.js',
			);
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->helper('url');
	} //end of function __construct

	function index(){	
		$this->load->model('project_model');
		if( $this->session->userdata('AccInfo')['AccType'] == 'user'){
			$this->load->helper('file');
			$a_project_list = $this->project_model->get_list($this->session->userdata('AccInfo')['AccNo']);
			$this->data['a_table_project_data'] = $a_project_list ;
			$s_main_content = 'project/main_page';
		}else{
			redirect('/', 'refresh');
		}
		$this->data['s_main_content'] = $s_main_content;
		$this->load->view('includes/template', $this->data);
	} //end of function index


	

	function create(){
		if( $this->session->userdata('AccInfo')['Username'] != null){
			$this->load->model('project_model');

			$a_cat_list = $this->project_model->get_category_list();
			//$a_cat_list = get_object_vars($this->project_model->get_category_list());
			$this->data['a_cat_list'] = $a_cat_list;

			$this->form_validation->set_rules('txt_project_name', 'Project Name', 'trim|required|xss_clean|min_length[3]');
			$this->form_validation->set_rules('txt_project_purpose', 'Project Purpose', 'trim|required|xss_clean|min_length[4]');
			$this->form_validation->set_rules('txt_project_description', 'Project Description', 'trim|required|xss_clean|min_length[3]');
			$this->form_validation->set_rules('ddn_category', 'Category ID', 'required');
			if($this->form_validation->run()){
				$a_project_value_db = array('txt_project_name' 		  => 'Proj_Name',
											'txt_project_purpose' 	  => 'Proj_Purpose',
											'txt_project_description' => 'Proj_Desc',
											'ddn_category' 			  => 'Proj_CatID'										
											);
				$a_project_insert_db = array();
				$a_project_insert_db['Proj_AccNo'] = $this->session->userdata('AccNo');
				foreach($a_project_value_db  as $key => $value){
					if($this->input->post($key) != NULL){
						$a_project_insert_db[$value] = $this->input->post($key);
					}
				}
				$this->project_model->add($a_project_insert_db);
				redirect('/bms');
			}
			$this->data['s_main_content'] = 'project/create_project';
			$this->load->view('includes/template', $this->data);
		}else{	
			redirect('/', 'refresh');
		}
	}
}
?>
