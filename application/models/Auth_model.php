<?php defined('BASEPATH') OR exit('No direct access script allowed');

class Auth_model extends CI_Model
{
	private $_table = 'users';

	private $_username;
	private $_password;

	public function rules()
	{
		return [
			['field' => 'username',
			 'label' => 'Username',
			 'rules' => 'required|min_length[4]|max_length[20]'],
			['field' => 'password',
			 'label' => 'Password',
			 'rules' => 'required|min_length[3]|max_length[20]'],
		];
	}

	public function checkLogin($username)
	{
		$this->_username = $username;
		return $this->db->get_where($this->_table, array('username' => $this->_username))->num_rows();
	}

	public function getData($username, $password)
	{
		$this->_username = $username;
		$this->_password = $password;
		return $this->db->get_where($this->_table, array('username' => $this->_username))->row();
	}
}
