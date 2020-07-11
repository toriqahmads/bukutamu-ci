<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function __construct() {
		parent::__construct();
		if($this->session->userdata('is_login') != TRUE) {
			redirect(base_url('auth'));
		}

		$this->load->model(array('user_model'));
		$this->load->library('form_validation');
	}

	public function index() {
		$filter = [];
		if ($this->session->userdata('level') != -1) redirect(site_url('user/me'));
		$data['users'] = $this->user_model->getAll($filter);
		$this->load->view('user/list', $data);
	}

	public function add() {
		if ($this->session->userdata('level') != -1) redirect(site_url('user/me'));
		$this->load->view('user/register');
	}

	public function addNew() {
		if ($this->session->userdata('level') != -1) redirect(site_url('user/me'));

		$user = $this->user_model;
		$validation = $this->form_validation;
		$validation->set_rules($user->addRules());
		$post = $this->input->post();

		if($validation->run()) {
			$post['password'] = password_hash($post['password'], PASSWORD_BCRYPT);
			if ($this->session->userdata('level') != -1) $post['level'] = 0;
			$user->save($post);
			$this->session->set_flashdata('success','User berhasil ditambahkan!');
		}

		$this->load->view('user/register');
	}

	public function editProfile() {
		$validation = $this->form_validation;
		$validation->set_rules($this->user_model->updateRules());

		if($validation->run()) {
			$this->user_model->updateSelfData();
			$this->session->set_flashdata('success','Data berhasil diubah!');
		}

		$data['user'] = $this->user_model->getSelfData($this->session->userdata('id'));
		$this->load->view('user/editProfile', $data);
	}

	public function edit($id) {
		if ($this->session->userdata('level') != -1) redirect(base_url('user/me'));
		$validation = $this->form_validation;
		$validation->set_rules($this->user_model->updateRules());
		$post = $this->input->post();

		if($validation->run()) {
			$post['id'] = $id;
			$this->user_model->update($post);
			$this->session->set_flashdata('success','Data berhasil diubah!');
		}

		$data['user'] = $this->user_model->getById($id);
		$this->load->view('user/edit', $data);
	}

	public function editPassword() {
		$validation = $this->form_validation;
		$validation->set_rules($this->user_model->passUpdateRules());

		if($validation->run()) {
			$datas = $this->user_model->getSelfData($this->session->userdata('id'));
			if(password_verify($this->input->post('old-password'), $datas->password)) {
				$password = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
				$this->user_model->updatePassword($password);
				$this->session->set_flashdata('success-password','Password berhasil diubah!');
			}
			else {
				$this->session->set_flashdata('success-password','Password lama Anda salah!');
			}
		}

		$data['user'] = $this->user_model->getSelfData($this->session->userdata('id'));
		$this->load->view('user/editProfile', $data);
	}

	public function editPasswordUser($id) {
		if ($this->session->userdata('level') != -1) redirect(base_url('user/me'));
		$validation = $this->form_validation;
		$validation->set_rules($this->user_model->passUserUpdateRules());

		if($validation->run()) {
			$datas = $this->user_model->getById($id);
			
			$password = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
			$this->user_model->updateUserPassword($id,$password);
			$this->session->set_flashdata('success-password','Password berhasil diubah!');
		}

		$data['user'] = $this->user_model->getById($id);
		$this->load->view('user/edit', $data);
	}

	public function me() {
		$data['user'] = $this->user_model->getSelfData($this->session->userdata('id'));
		$this->load->view('user/profile', $data);
	}
}
