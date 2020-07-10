<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('auth_model');
		$this->load->library('form_validation');
	}

	public function index() {
		if($this->session->userdata('is_login') != TRUE) {
			$this->load->view('auth/auth');
		}
		else {
			redirect(base_url('dashboard'));
		}
	}

	public function login() {
		$post = $this->input->post();

		$validation = $this->form_validation;
		$validation->set_rules($this->auth_model->rules());

		if ($validation->run()) {
			if ($this->auth_model->checkLogin($post['username']) > 0) {
				$data = $this->auth_model->getData($post['username'], $post['password']);
				if (password_verify($post['password'], $data->password)) {
					$data_session = array(
						'is_login' => TRUE,
					  'id' => $data->id,
					  'nama' => $data->nama,
					  'email' => $data->email,
					  'username' => $data->username,
					  'level' => $data->level
					);

					$this->session->set_userdata($data_session);
					redirect(base_url('dashboard'));
				}
				else {
					$this->session->set_flashdata('status', 'Username atau password tidak cocok.');
				}
			} else {
				$this->session->set_flashdata('status','User tidak ditemukan!');
			}
		}
		$this->load->view('auth/auth');
	}

	public function logout() {
		$this->session->sess_destroy();
		redirect(base_url('auth'));
	}
}
