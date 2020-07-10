<?php defined('BASEPATH') OR exit('No direct access script allowed');

class User_model extends CI_Model
{
	private $_table = 'users';

	public $id;
	public $nama;
	public $email;
	public $username;
	public $password;
	public $level;

	public function addRules() {
		return [
			['field' => 'name',
			 'label' => 'Name',
			 'rules' => 'required|min_length[3]|max_length[50]'],
			['field' => 'email',
			 'label' => 'Email',
			 'rules' => 'required|valid_email'],
			['field' => 'username',
			 'label' => 'Username',
			 'rules' => 'required|min_length[5]|max_length[15]'],
			['field' => 'password',
			 'label' => 'Password baru',
			 'rules' => 'required|min_length[8]|max_length[25]'],
			['field' => 'conf-password',
			 'label' => 'Konfirmasi Password',
			 'rules' => 'required|matches[password]'],
		];
	}

	public function updateRules() {
		return [
			['field' => 'name',
			 'label' => 'Name',
			 'rules' => 'required|min_length[3]|max_length[50]'],
			['field' => 'email',
			 'label' => 'Email',
			 'rules' => 'required|valid_email'],
			['field' => 'username',
			 'label' => 'Username',
			 'rules' => 'required|min_length[5]|max_length[15]'],
		];
	}

	public function passUpdateRules() {
		return [
			['field' => 'old-password',
			 'label' => 'Password lama',
			 'rules' => 'required|min_length[8]|max_length[25]'],
			['field' => 'password',
			 'label' => 'Password baru',
			 'rules' => 'required|min_length[8]|max_length[25]'],
			['field' => 'conf-password',
			 'label' => 'Konfirmasi Password',
			 'rules' => 'required|matches[password]'],
		];
	}

	public function passUserUpdateRules() {
		return [
			['field' => 'password',
			 'label' => 'Password baru',
			 'rules' => 'required|min_length[8]|max_length[25]'],
			['field' => 'conf-password',
			 'label' => 'Konfirmasi Password',
			 'rules' => 'required|matches[password]'],
		];
	}

	public function getAll($filter = []) {
		return $this->db->get_where($this->_table, $filter)->result();
	}

	public function getTotal() {
		return $this->db->get($this->_table)->num_rows();
	}

	public function getById($id) {
		return $this->db->get_where($this->_table, array('id' => $id))->row();
	}

	public function getSelfData($id) {
		return $this->db->get_where($this->_table, array('id' => $id))->row();
	}

	public function save($post) {
		$data = [];

		$data['nama'] = $post['name'];
		$data['email'] = $post['email'];
		$data['username'] = $post['username'];
		$data['password'] = $post['password'];
		$data['level'] = $post['level'];

		$this->db->insert($this->_table, $data);
	}

	public function updateSelfData() {
		$post = $this->input->post();
		$data = array(
			'nama' => $post['name'],
			'email' => $post['email']
		);

		$this->db->where('id', $this->session->userdata('id'));
		$this->db->update($this->_table, $data);
	}

	public function update($post) {
		$data = array(
			'nama' => $post['name'],
			'email' => $post['email'],
			'level' => $post['level']
		);

		$this->db->where('id', $post['id']);
		$this->db->update($this->_table, $data);
	}

	public function updatePassword($password) {
		$this->password = $password;
		$data = array('password' => $this->password);

		$this->db->where('id', $this->session->userdata('id'));
		$this->db->update($this->_table, $data);
	}

	public function updateUserPassword($id, $password) {
		$data = array('password' => $password);

		$this->db->where('id', $id);
		$this->db->update($this->_table, $data);
	}

	public function delete($id) {
		return $this->db->delete($this->_table, array('id' => $id));
	}
}
