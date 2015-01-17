 <?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Account_model extends BMS_Model
{
	function __construct()
	{
		parent::__construct();

		$this->load->database();
	}

/**
	* Adds a user's account
 	* @scope	public
	* @param	array		a_account_info
	* @return	string		error (if there's any)
	 */
	function add($a_account_info)
	{
		$s_errors['error'] = '';
		if ($this->db->insert('account', $a_account_info)) {
			return $this->db->insert_id();
		} else {
			$s_errors['error'] = $this->db->_error_message();
			return $s_errors;
		}
	} //end of function add


/**
	* Get a user's account if it exists
 	* @scope	public
	* @param	array		a_account_info
	* @return	string		error (if there's any)
	 */
	function get_account_number($i_user_id)
	{

		$this->db->where('account.MemberID', $i_user_id);
		$r_query = $this->db->get('account');

		if ($r_query->num_rows() > 0) {
			return $r_query->row()->AccNo;
		} else {
			return NULL;
		}
	} //end of function add

/**
	* Updates the Person-in-charge credentials
 	* @scope	public
	* @param	array		credentials
	* @param	int			centre_id
	* @return	string		error (if there's any)
	 */
	function update($a_credentials, $i_user_id)
	{
		$s_errors['error'] = '';
		$this->db->where('AccNo', $i_user_id);
		if ($r_result = $this->db->update(TBL_USERS, $a_credentials)) {
			return $r_result;
		} else {
			$s_errors['error'] = $this->db->_error_message();
			return $s_errors;
		}
	} // end of function update



}