<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class View_matakuliah extends CI_Model {

	public function __construct()
	{
	  	parent::__construct();
	}

	public function getMatakuliah($kolom = "", $matakuliah = "") //default
	{
		$this->db->select($kolom);
		if($matakuliah != "")
		{
			$this->db->where('matakuliah =', $matakuliah);
		}
		
		$query = $this->db->get('matakuliah');
		return $query->result_array();
	}

}
