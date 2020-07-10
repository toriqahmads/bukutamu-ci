<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Random_string {
	public function generate($length) {
		$karakter = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ123456789';
		$shuffle  = substr(str_shuffle($karakter), 0, $length);
		return $shuffle;
	}
}
