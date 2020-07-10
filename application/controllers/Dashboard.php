<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct() {
		parent::__construct();
		if($this->session->userdata('is_login') != TRUE) {
			redirect(base_url('auth'));
		}
		$this->load->model(array('user_model', 'bukutamu_model'));
		$this->load->model('auth_model');
		$this->load->library('form_validation');
	}

	public function index() {
		$data['bukutamu'] = $this->bukutamu_model->getTotal();
		$data['bk_baru'] = $this->bukutamu_model->getTotalBaru();
		$data['bk_terpenuhi'] = $this->bukutamu_model->getTotalTerpenuhi();
		$data['bk_belum_terpenuhi'] = $this->bukutamu_model->getTotalBelumTerpenuhi();
		$data['user'] = $this->user_model->getTotal();

		$this->load->view('dashboard/overview', $data);
	}
}
