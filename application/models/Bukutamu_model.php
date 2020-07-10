<?php defined('BASEPATH') OR exit('No direct access script allowed');

class Bukutamu_model extends CI_Model
{
	private $_table = 'bukutamu';

	public $id;
	public $kode;
	public $nama;
	public $alamat;
	public $asal;
	public $hp;
	public $tujuan;
	public $keperluan;
	public $jam_kunjung;
	public $ttd;
	public $user_id;

	public function rules() {
		return [
			['field' => 'nama',
			 'label' => 'Nama',
			 'rules' => 'required|min_length[5]|max_length[50]'],
			['field' => 'alamat',
			 'label' => 'Alamat',
			 'rules' => 'required|min_length[10]|max_length[50]'],
			['field' => 'asal',
			 'label' => 'Asal',
			 'rules' => 'required|min_length[4]|max_length[25]'],
			['field' => 'hp',
			 'label' => 'HP',
			 'rules' => 'required|min_length[10]|max_length[13]'],
			 ['field' => 'tujuan',
			 'label' => 'Tujuan',
			 'rules' => 'required|min_length[5]|max_length[50]'],
			 ['field' => 'keperluan',
			 'label' => 'Keperluan',
			 'rules' => 'required|min_length[10]|max_length[250]'],
			 ['field' => 'jam_kunjung',
			 'label' => 'Jam Kunjung',
			 'rules' => 'required|min_length[4]|max_length[25]'],
			 ['field' => 'asal',
			 'label' => 'ttd',
			 'rules' => 'required|min_length[4]|max_length[15]']
		];
	}

	public function update_rules() {
		return [
			['field' => 'nama',
			 'label' => 'Nama',
			 'rules' => 'required|min_length[5]|max_length[50]'],
			['field' => 'alamat',
			 'label' => 'Alamat',
			 'rules' => 'required|min_length[10]|max_length[50]'],
			['field' => 'asal',
			 'label' => 'Asal',
			 'rules' => 'required|min_length[4]|max_length[25]'],
			['field' => 'hp',
			 'label' => 'HP',
			 'rules' => 'required|min_length[10]|max_length[13]'],
			 ['field' => 'tujuan',
			 'label' => 'Tujuan',
			 'rules' => 'required|min_length[5]|max_length[50]'],
			 ['field' => 'keperluan',
			 'label' => 'Keperluan',
			 'rules' => 'required|min_length[10]|max_length[250]'],
			 ['field' => 'jam_kunjung',
			 'label' => 'Jam Kunjung',
			 'rules' => 'required|min_length[4]|max_length[25]'],
			 ['field' => 'status',
			 'label' => 'Status',
			 'rules' => 'required'],
		];
	}

	public function getAll($filter = []) {
		return $this->db->get_where($this->_table, $filter)->result();
	}

	public function getTotal() {
		return $this->db->get($this->_table)->num_rows();
	}

	public function getTotalBaru() {
		return $count = $this->db->where(['status'=> 'baru'])->from($this->_table)->count_all_results();
	}

	public function getTotalTerpenuhi() {
		return $count = $this->db->where(['status'=> 'terpenuhi'])->from($this->_table)->count_all_results();
	}

	public function getTotalBelumTerpenuhi() {
		return $count = $this->db->where(['status'=> 'belum terpenuhi'])->from($this->_table)->count_all_results();
	}

	public function getByKode($kode) {
		return $this->db->get_where($this->_table, array('kode' => $kode))->row();
	}

	public function getById($id) {
		return $this->db->get_where($this->_table, array('id' => $id))->row();
	}

	public function save($post)
	{
		$this->kode = $post['kode'];
		$this->nama = $post['nama'];
		$this->alamat = $post['alamat'];
		$this->asal = $post['asal'];
		$this->hp = $post['hp'];
		$this->tujuan = $post['tujuan'];
		$this->keperluan = $post['keperluan'];
		$this->jam_kunjung = $post['jam_kunjung'];
		$this->ttd = $post['ttd'];
		$this->user_id = isset($post['user_id']) && !empty($post['user_id']) ? $post['user_id'] : null;

		$this->db->insert($this->_table, $this);
	}

	public function update($post)
	{
		$this->kode = $post['kode'];

		$data = array(
			'nama' => $post['nama'],
		  'alamat' => $post['nama'],
		  'asal' => $post['asal'],
		  'hp' => $post['hp'],
		  'tujuan' => $post['tujuan'],
		  'keperluan' => $post['keperluan'],
		  'jam_kunjung' => $post['jam_kunjung'],
		  'status' => $post['status']
		);

		$this->db->where('kode', $this->kode);
		$this->db->update($this->_table, $data);
	}

	public function delete($kode)
	{
		return $this->db->delete($this->_table, array('kode' => $kode));
	}
}
