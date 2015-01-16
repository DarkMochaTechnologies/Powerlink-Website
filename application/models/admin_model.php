<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends BMS_Model
{

	function __construct()
	{
		parent::__construct();

		$this->load->database();
	}

/**
	* Validate Admin Login Credentials
	* @scope 	public
	* @return 	r_query	Result Set
	*/
	function login()
	{
		$this->db->where('Username', $this->input->post('txt_username'));
		$this->db->where('Member_Pword', sha1(md5($this->input->post('txt_password'))));

		$r_query = $this->db->get('account');
		if ($r_query->num_rows() == 1) {
			return $r_query->row();
		} else {
			return FALSE;
		}
	}

/**
	* Checks if a user already exists in the admins table
	* @scope 	public
	* @param 	string 	email
	* @return 	boolean TRUE if there exist at least 1, FALSE if nothing	
	*/
	function check_admin_exist($s_email)
	{
		$this->db->where('email', $s_email);

		$r_query = $this->db->get(TBL_ADMINS);

		if ($r_query->num_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

/**
	* Counts the number of rows in sap_centres table
	* @scope 	public
	* @return 	int
	*/
	function count_centre_data()
	{
		return $this->db->count_all(TBL_CENTRES);
	}

/*
	* Get all member data for admin
	* @scope 	public
	*/
	function get_member_list()
	{

		$r_query = $this->db->get('member');

		return $r_query->result();
	}


/*
	* add member data for admin
	* @scope 	public
	*/
	function add_member($a_member_info)
	{
		$s_errors['error'] = '';
		if ($r_result = $this->db->insert('member', $a_member_info)) {
			return $r_result;
		} else {
			$s_errors['error'] = $this->db->_error_message();
			return $s_errors;
		}
	} //end of function add

/*
	* update member data for admin
	* @scope 	public
	*/
	function update_member($i_member_id, $a_member_info)
	{
		$this->db->where('Mem_ID', $i_member_id);
		$this->db->update('member', $a_member_info); 
	} //end of function add

/*
	* update member data for admin
	* @scope 	public
	*/
	function delete_member($i_member_id)
	{
		$this->db->where('Mem_ID', $i_member_id);
		$this->db->delete('member'); 
	} //end of function add



/**
	* Checks if a centre already exists in the admins table
	* @scope 	public
	* @param 	int 	centre id
	* @return 	boolean TRUE if there exist at least 1, FALSE if nothing	
	*/
	function check_if_centre_exists($i_centre_id)
	{
		$this->db->where('id', $i_centre_id);

		$r_query = $this->db->get(TBL_CENTRES);

		return ($r_query->num_rows() == 0 ? TRUE : FALSE);
	}

/**
	* Checks if a program already exists in the standard programs table
	* @scope 	public
	* @param 	string 	type of program
	* @param 	int 	centre id
	* @param 	int 	program id
	* @return 	boolean TRUE if there exist at least 1, FALSE if nothing	
	*/
	function check_if_program_exists($s_type, $i_centre_id, $i_program_id)
	{
		$this->db->where('id', $i_program_id);
		$this->db->where('centre_id', $i_centre_id);
		$r_query = NULL;
		switch ($s_type) {
			case 'standard':
				$r_query = $this->db->get(TBL_STANDARD_PROGRAMS);
				break;
			case 'adhoc':
				$r_query = $this->db->get(TBL_ADHOC_PROGRAMS);
				break;
		}
		return ($r_query->num_rows() == 0 ? TRUE : FALSE);
	}

/**
	* Gets all information about the centre
	* @scope 	public
	* @param 	int 	centre id
	* @return 	r_query Result Set	
	*/
	function get_centre_info($i_centre_id)
	{
		$this->db->select(' 
			sap_centres.name AS centre_name,
			sap_centres.description AS centre_description, 
			sap_centres.contact AS centre_contact, 
			sap_centres.rating AS centre_rating, 
			sap_centres.filename AS centre_image,
			sap_centres.date_added AS centre_date_added,
			sap_centres.date_updated AS centre_date_updated, 
			sap_centres.region AS centre_region,
			sap_users.name AS pic_name, 
			sap_users.email AS pic_email,
			sap_users.salutation AS pic_salutation, 
			');
		$this->db->where('sap_centres.id', $i_centre_id);
		$this->db->join(TBL_USERS, 'sap_users.id = sap_centres.contact_user_id');
		$this->db->join(TBL_CENTRE_LOCATIONS, 'sap_centre_locations.centre_id = sap_centres.id');
		$r_query = $this->db->get(TBL_CENTRES);

		return $r_query->row();
	}

/**
	* Returs a list of Standard Programs about the centre
	* @scope 	public
	* @param 	int 	centre id
	* @return 	r_query Result Set	
	*/
	function get_list_of_std_programs($i_centre_id)
	{
		$this->db->where('centre_id', $i_centre_id);
		$r_query = $this->db->get(TBL_STANDARD_PROGRAMS);

		if ($r_query->num_rows() > 0) {
			return $r_query->result();
		} else {
			return NULL;
		}
	}

/**
	* Returs a list of Adhoc Programs about the centre
	* @scope 	public
	* @param 	int 	centre id
	* @return 	r_query Result Set	
	*/
	function get_list_of_adhoc_programs($i_centre_id)
	{
		$this->db->where('centre_id', $i_centre_id);
		$r_query = $this->db->get(TBL_ADHOC_PROGRAMS);

		if ($r_query->num_rows() > 0) {
			return $r_query->result();
		} else {
			return NULL;
		}
	}
	
/**
	* Returns the information of a particular Standard Program
	* @scope 	public
	* @param 	int 	centre id
	* @param 	int 	standard program id
	* @return 	r_query Result Set	
	*/
	function get_std_program_info($i_centre_id, $i_std_id)
	{
		$this->db->join('sap_centre_locations', 'sap_centre_locations.centre_id = sap_standard_programs.centre_id');
		$this->db->where('sap_standard_programs.centre_id', $i_centre_id);
		$this->db->where('sap_standard_programs.id', $i_std_id);
		$r_query = $this->db->get(TBL_STANDARD_PROGRAMS);

		if ($r_query->num_rows() > 0) {
			return $r_query->row();
		} else {
			return NULL;
		}
	}

/**
	* Returns the information of a particular Adhoc Program
	* @scope 	public
	* @param 	int 	centre id
	* @param 	int 	adhoc program id
	* @return 	r_query Result Set	
	*/
	function get_adhoc_program_info($i_centre_id, $i_adhoc_id)
	{
		$this->db->where('sap_adhoc_programs.centre_id', $i_centre_id);
		$this->db->where('sap_adhoc_programs.id', $i_adhoc_id);
		$r_query = $this->db->get(TBL_ADHOC_PROGRAMS);

		if ($r_query->num_rows() > 0) {
			return $r_query->row();
		} else {
			return NULL;
		}
	}

}
