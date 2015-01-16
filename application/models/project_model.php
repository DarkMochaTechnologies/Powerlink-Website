<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Project_model extends BMS_Model
{
	function __construct()
	{
		parent::__construct();

		$this->load->database();
	}
/**
	* Adds a project to the project table
 	* @scope	public
	* @param	array		a_project_info
	* @return	string		error (if there's any)
	 */
	function add($a_project_info)
	{
		$s_errors['error'] = '';
		if ($r_result = $this->db->insert('project', $a_project_info)) {
			return $r_result;
		} else {
			$s_errors['error'] = $this->db->_error_message();
			return $s_errors;
		}
	} //end of function add

/**
	* Returns the information of a particular Project
	* @scope 	public
	* @param 	int 	i_project_id
	* @return 	r_query Result Set	
	*/
	function get_info($i_project_id)
	{
		$this->db->join('category', 'category.Cat_ID = project.Proj_CatID');
		$this->db->where('project.Proj_ID', $i_project_id);
		$r_query = $this->db->get('project');

		if ($r_query->num_rows() > 0) {
			return $r_query->row();
		} else {
			return NULL;
		}
	} // end of function get_info

/**
	* Returns a list of all category types
	* @scope 	public
	*/

	function get_category_list()
	{
		$r_query = $this->db->get('category');


		return $r_query->result();

	} // end of function get_info

/**
	* Returs a list of all the projects of the user in the table
	* @scope 	public
	* @param 	int 	$i_account_no
	* @return 	r_query Result Set	
	*/
	function get_list($i_account_no)
	{
		$this->db->where('project.Proj_AccNo', $i_account_no);
		$r_query = $this->db->get('project');

		if ($r_query->num_rows() > 0) {
			return $r_query->result();
		} else {
			return NULL;
		}
	}

/**
	* Returs number of rows through location id
	* @scope 	public
	* @param 	int 	location id
	* @return 	int 	number of rows	
	*/
	function update_approval($i_project_id, $data){
		$this->db->where('Proj_ID', $i_project_id);
		$this->db->update('project', $data); 
	}

/**
	* Checks if branch already exists
 	* @scope	public
	* @param	int			centre_id
	* @param	string		program_name
	* @return	boolean		number of rows
	 */
	function check_if_exists($i_centre_id, $s_program_name)
	{
		$this->db->where('name', $s_program_name);
		$this->db->where('centre_id', $i_centre_id);
		$r_query = $this->db->get(TBL_STANDARD_PROGRAMS);

		return ($r_query->num_rows() > 0 ? TRUE : FALSE);
	} //end of function check_if_exists

}