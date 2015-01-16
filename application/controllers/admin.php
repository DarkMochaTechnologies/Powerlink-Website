<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends BMS_Controller
{
	function __construct()
	{
		parent::__construct();
		
		$this->data['s_page_title'] = 'Admin';
		$this->data['s_page_header'] = 'admin';
		$this->data['s_page_type'] = 'admin';
		$this->data['a_cs_scripts'] = array(
			base_url() . 'application/public/css/extras/jquery.dataTables.css',
			base_url() . 'application/public/css/main.css',
			base_url() . 'application/public/css/css-responsive-table.css',
			base_url() . 'application/public/css/admin_style.css',	
			base_url() . 'application/public/css/extras/jquery.custom-scrollbar.css',	
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
		$this->load->model('admin_model');
	} //end of function __construct

	function index(){	
		if( $this->session->userdata('AccInfo')['AccType'] != null && $this->session->userdata('AccInfo')['AccType'] == 'admin'){
			$this->load->helper('file');
			$a_s_positions=array('first'   => 'President',
								 'second'  => 'Vice-President',
								 'third'   => 'Secretary',
								 'fourth'  => 'Treasurer',
								 'fifth'   => 'Commisioner',
								 'sixth'   => 'Captain',
								 'seventh' => 'Ombudsman',
								 'eight'   => 'Councilor',
								 'ninth'   => 'Tanod',								 								 
								);
			$this->data['a_o_member_list'] = $this->admin_model->get_member_list();
			$this->data['a_s_positions'] = $a_s_positions;
			$this->data['s_main_content'] ='admin/main_page';
			$this->load->view('includes/template', $this->data);

		} else {
			redirect('/', 'refresh');
		}

	} //end of function index

	function view_user_info($i_user_id){	

		if( $this->session->userdata('AccInfo')['AccType'] != null && $this->session->userdata('AccInfo')['AccType'] == 'admin'){
			$this->load->helper('file');
			$this->load->model('project_model');
			$this->load->model('account_model');
			$this->load->model('member_model');
			$a_s_positions=array('first'   => 'President',
								 'second'  => 'Vice-President',
								 'third'   => 'Secretary',
								 'fourth'  => 'Treasurer',
								 'fifth'   => 'Commisioner',
								 'sixth'   => 'Captain',
								 'seventh' => 'Ombudsman',
								 'eight'   => 'Councilor',
								 'ninth'   => 'Tanod',								 								 
								);

			$this->data['a_o_member_list'] = $this->admin_model->get_member_list();
			$this->data['a_s_positions'] = $a_s_positions;

			$this->data['a_user_data'] = $this->member_model->get_info($i_user_id);

			$i_account_number = $this->account_model->get_account_number($i_user_id);
			$a_project_list = $this->project_model->get_list($i_account_number);
			$this->data['a_table_project_data'] = $a_project_list ;
			$this->data['s_main_content'] ='admin/user_projects';
			$this->load->view('includes/template', $this->data);

		} else {
			redirect('/', 'refresh');
		}

	} //end of function index
	
	function user_refresh(){
		$this->load->model('member_model');
			$a_o_member_list = $this->admin_model->get_member_list();
			$this->data['a_o_member_list'] = $a_o_member_list;
			$this->load->view('admin/get_member_info', $this->data);
		

	}

	function get_project_list($i_project_id){

		$this->load->model('project_model');
		$this->load->helper('file');
		$a_project_list = $this->project_model->get_list($this->session->userdata('AccInfo')['AccNo']);
		$this->data['a_table_project_data'] = $a_project_list ;
		$this->load->view('admin/view_projects', $this->data);
		

	}

	function update_approve(){

		if($this->input->post('enum_approve') != null){
			$this->load->model('project_model');
			$this->load->helper('file');
			$a_update = array('Proj_status' => $this->input->post('enum_approve'));
			$a_project_list = $this->project_model->update_approval($this->input->post('proj_id'),$a_update);
			echo $this->input->post('proj_id'). ' '. $this->input->post('txt_approve');
		}		

	}

	function create_user(){
		if( $this->session->userdata('AccInfo')['AccType'] != null && $this->session->userdata('AccInfo')['AccType'] == 'admin'){
			$this->form_validation->set_rules('txt_FName', 'First Name', 'trim|required|xss_clean|min_length[3]');
			$this->form_validation->set_rules('txt_LName', 'Last Name', 'trim|required|xss_clean|min_length[3]');
			$this->form_validation->set_rules('txt_MName', 'Middle Name', 'trim|required|xss_clean|min_length[3]');
			$this->form_validation->set_rules('txt_address', 'Address', 'trim|required|xss_clean|min_length[4]');
			$this->form_validation->set_rules('txt_curr_term', 'Current_Term', 'trim|required|xss_clean|min_length[3]');
			$this->form_validation->set_rules('txt_position', 'Position', 'required');
			$this->form_validation->set_rules('enum_gender', 'Gender', 'required');
			$this->form_validation->set_rules('txt_approval_code', 'Approval Code', 'required|min_length[4]');

			if($this->form_validation->run()){

				$a_member_info_post=array("txt_FName" => "Mem_FirstName",
									 "txt_LName" => "Mem_LastName",
									 "txt_MName" => "Mem_MiddleName",
									 "txt_address" => "Mem_Address",
									 "txt_curr_term" => "Mem_Curr_Term",
									 "txt_position" => "Mem_OfficePosition",
									 "enum_gender" => "Mem_Gender",
									 "txt_approval_code" => "Mem_ApprovalCode"
									);
				foreach($a_member_info_post as $key => $value){
					if($this->input->post($key)){
						$a_member_info[$value] = $this->input->post($key);
					}
				}

				$this->admin_model->add_member($a_member_info);

			}else{
				echo "no forms bub!";
			}

		}else{
			echo "not admin bub!";
		}
	}

	function update_user(){
		if( $this->session->userdata('AccInfo')['AccType'] != null && $this->session->userdata('AccInfo')['AccType'] == 'admin'){

				$a_member_info_post=array("txt_FName" => "Mem_FirstName",
									 	  "txt_LName" => "Mem_LastName",
									 	  "txt_MName" => "Mem_MiddleName",
									 	  "txt_address" => "Mem_Address",
									 	  "txt_curr_term" => "Mem_Curr_Term",
									 	  "txt_position" => "Mem_OfficePosition",
									 	  "enum_gender" => "Mem_Gender",
									 	  "txt_approval_code" => "Mem_ApprovalCode"
									      );

				foreach($a_member_info_post as $key => $value){
					if($this->input->post($key)){
						$a_member_info[$value] = $this->input->post($key);
					}
				}

				$this->admin_model->update_member($this->input->post('i_member_id'),$a_member_info);

		}
	}

	function delete_user($i_member_id){
		if( $this->session->userdata('AccInfo')['AccType'] != null && $this->session->userdata('AccInfo')['AccType'] == 'admin'){
			$this->admin_model->delete_member($i_member_id,$a_member_info);
			redirect('/admin');
		}

	}

	function create_project(){

	}

	function approve_project(){

	}


}
?>
