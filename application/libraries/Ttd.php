<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Ttd {
	public function saveTtdToImage ($data_uri, $kode) {
		$encoded_image = explode("[removed]", $data_uri)[1];
		$decoded_image = base64_decode($encoded_image);
		$ttd = FCPATH."application/upload/ttd/" . $kode . ".png";
		$save = file_put_contents($ttd, $decoded_image, 0777);

		if ($save) return $kode . ".png";
		return false;
	}
}
