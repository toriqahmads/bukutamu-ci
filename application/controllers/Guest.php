<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guest extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('bukutamu_model');
		$this->load->library('form_validation');
		$this->load->library('ttd');
		$this->load->library('random_string');
	}

	public function index() {
		if($this->session->userdata('is_login') != TRUE) {
			$this->load->view('guest/bukutamu');
		}
		else {
			redirect(base_url('dashboard'));
		}
	}

	public function addNew() {
		$bukutamu = $this->bukutamu_model;
		$validation = $this->form_validation;
		$validation->set_rules($bukutamu->rules());
		$post = $this->input->post();

		// generate kode buku tamu
		$post['kode'] = $this->random_string->generate(6);
		if ($this->session->userdata('id')) $post['user_id'] = $this->session->userdata('id');
		$ttd = $this->ttd->saveTtdToImage($post['ttd'], $post['kode']);

		// redirect if ttd not saved successfully
		if (!$ttd) redirect(site_url('bukutamu/add'));

		$post['ttd'] = $ttd;

		if($validation->run()) {
			$phpdate = strtotime($post['jam_kunjung']);
			$mysqldate = date('Y-m-d H:i:s', $phpdate);
			$post['jam_kunjung'] = $mysqldate;
			$bukutamu->save($post);
			$this->session->set_flashdata('success','Buku tamu berhasil ditambahkan! Kode buku tamu : ' . $post['kode']);
		}

		$this->load->view('guest/bukutamu');
	}
}
