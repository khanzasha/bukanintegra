<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class View_mhs extends CI_Model {

	public function __construct()
	{
	  	parent::__construct();
	}

	public function getMahasiswa($kolom = "", $mahasiswa = "") //default
	{
		$this->db->select($kolom);
		if($mahasiswa != "")
		{
			$this->db->where('mahasiswa =', $mahasiswa);
		}
		
		$query = $this->db->get('mahasiswa');
		return $query->result_array();
	}

	public function insertMahasiswa($data)
    {
        $this->db->insert('mahasiswa', $data);
    }

    public function deleteMahasiswa($data)
    {
        $this->db->where('nrp', $data);
        $this->db->delete('mahasiswa');

        //print_r($data);
    }
	
}
