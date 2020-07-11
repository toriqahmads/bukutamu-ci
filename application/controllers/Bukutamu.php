<?php defined('BASEPATH') OR exit('No direct access script allowed');

class Bukutamu extends CI_Controller
{
	public $data = array();
	public function __construct() {
		parent::__construct();
		if($this->session->userdata('is_login') != TRUE) {
			redirect(base_url('auth'));
		}

		$this->load->model('bukutamu_model');
		$this->load->library('form_validation');
		$this->load->library('ttd');
		$this->load->library('random_string');
	}

	public function index($status = '') {
		$filter = [];
		if ($status != '') {
			if ($status == 'belum') $status = 'belum terpenuhi';
			$filter['status'] = $status;
		}

		if ($this->session->userdata('level') != -1) $filter['user_id'] = $this->session->userdata('id');

		$data['bukutamu'] = $this->bukutamu_model->getAll($filter);
		if ($data['bukutamu']) {
			foreach ($data['bukutamu'] as $bk) {
				$path = FCPATH.'application/upload/ttd/' . $bk->ttd;
				$type = pathinfo($path, PATHINFO_EXTENSION);
				$ttd = file_get_contents($path);
				$base64 = 'data:image/' . $type . ';base64,' . base64_encode($ttd);

				$bk->ttd = $base64;

				$phpdate = strtotime($bk->jam_kunjung);
				$mysqldate = date('d-m-Y H:i:s', $phpdate);
				$bk->jam_kunjung = $mysqldate;
			}
		}

		$this->load->view('bukutamu/list', $data);
	}

	public function add() {
		$this->load->view('bukutamu/register');
	}

	public function edit($kode) {
		$data['bukutamu'] = $this->bukutamu_model->getByKode($kode);

		if ($data['bukutamu']) {
			$path = FCPATH.'application/upload/ttd/' . $data['bukutamu']->ttd;
			$type = pathinfo($path, PATHINFO_EXTENSION);
			$ttd = file_get_contents($path);
			$base64 = 'data:image/' . $type . ';base64,' . base64_encode($ttd);

			$data['bukutamu']->ttd = $base64;
			$phpdate = strtotime($data['bukutamu']->jam_kunjung);
			$mysqldate = date('d-m-Y H:i:s', $phpdate);
			$data['bukutamu']->jam_kunjung = $mysqldate;
		}

		$this->load->view('bukutamu/edit', $data);
	}

	public function view($kode) {
		$data['bukutamu'] = $this->bukutamu_model->getByKode($kode);

		if ($data['bukutamu']) {
			$path = FCPATH.'application/upload/ttd/' . $data['bukutamu']->ttd;
			$type = pathinfo($path, PATHINFO_EXTENSION);
			$ttd = file_get_contents($path);
			$base64 = 'data:image/' . $type . ';base64,' . base64_encode($ttd);

			$data['bukutamu']->ttd = $base64;
			$phpdate = strtotime($data['bukutamu']->jam_kunjung);
			$mysqldate = date('d-m-Y H:i:s', $phpdate);
			$data['bukutamu']->jam_kunjung = $mysqldate;
		}

		$this->load->view('bukutamu/view', $data);
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

		$this->load->view('bukutamu/register');
	}

	public function update($kode) {
		if(!isset($kode) || empty($kode)) redirect('bukutamu/');

		$bukutamu = $this->bukutamu_model;
		$validation = $this->form_validation;
		$validation->set_rules($bukutamu->update_rules());
		$post = $this->input->post();

		$data['bukutamu'] = $bukutamu->getByKode($kode);
		if(!$data['bukutamu']) show_404();

		if($validation->run()) {
			$phpdate = strtotime($post['jam_kunjung']);
			$mysqldate = date('Y-m-d H:i:s', $phpdate);
			$post['jam_kunjung'] = $mysqldate;
			$bukutamu->update($post);
			$this->session->set_flashdata('success','Data buku tamu berhasil diubah!');
			$data['bukutamu'] = $bukutamu->getByKode($kode);
			if ($data['bukutamu']) {
				$path = FCPATH.'application/upload/ttd/' . $data['bukutamu']->ttd;
				$type = pathinfo($path, PATHINFO_EXTENSION);
				$ttd = file_get_contents($path);
				$base64 = 'data:image/' . $type . ';base64,' . base64_encode($ttd);

				$data['bukutamu']->ttd = $base64;
				$phpdate = strtotime($data['bukutamu']->jam_kunjung);
				$mysqldate = date('d-m-Y H:i:s', $phpdate);
				$data['bukutamu']->jam_kunjung = $mysqldate;
				$this->load->view('bukutamu/edit', $data);
			}
		}
		else {
			redirect(base_url('bukutamu/edit/'.$kode));
		}
	}

	public function delete($kode = null, $token = null) {
		if(!isset($kode) OR empty($kode)) show_404();
		if(!isset($token) OR empty($token)) show_404();

		if($this->_check_token($token)) {
			if($this->bukutamu_model->delete($kode)) {
				$file = FCPATH.'application/upload/ttd/' . $kode . '.png';
				if (file_exists($file)) unlink($file);
				$this->session->set_flashdata('status', 'Sukses menghapus buku tamu');
			}
		}
		else {
			$this->session->set_flashdata('status', 'Error!');
		}

		redirect(site_url('bukutamu'));		
	}

	public function _check_token($token) {
		return ($token === $this->input->cookie('csrf_bukutamu'));
	}	
}
