<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class View_kelas extends CI_Model {

	private $_table = "kelas";

	public $id_kelas;
    public $matakuliah;
    public $kelas;
    public $nama_dosen;

	public function __construct()
	{
	  	parent::__construct();
	}

	public function getKelas($kolom = "", $kelas = "") //default
	{
		$this->db->select($kolom);
		if($kelas != "")
		{
			$this->db->where('kelas =', $kelas);
		}
		
		$query = $this->db->get('kelas');
		return $query->result_array();
	}

    public function insertKelas($data)
    {
        $this->db->insert('kelas', $data);
    }

	public function updateKelas($data)
	{
		$this->db->set('matakuliah', $data['matakuliah']);
		$this->db->set('kelas', $data['kelas']);
		$this->db->set('nama_dosen', $data['nama_dosen']);
		$this->db->where('id_kelas', $data['id_kelas']);
		$this->db->update('kelas');
	}

    public function update()
    {
        $post = $this->input->post();
        $this->matakuliah = $post["matakuliah"];
        $this->kelas = $post["kelas"];
        $this->nama_dosen = $post["nama_dosen"];
        $this->db->update($this->db, $this, array('id_kelas' => $post['id_kelas']));
    }

    public function editKelas($data)
    {
        $data = array(
            'matakuliah' => $this->db->set('matakuliah', $data['matakuliah']),
            'kelas' => $this->db->set('kelas', $data['kelas']),
            'Nama_dosen' => $this->db->set('nama_dosen', $data['nama_dosen'])
        );
        $this->db->where('id_kelas', $data['id_kelas']);
        $this->db->update('kelas');

        //$data["product"] = $product->getById($id);
        //if (!$data["product"]) show_404();
    }

	function deleteKelas($data)
	{
		$this->db->where('id_kelas', $data['id_kelas']);
		$this->db->delete('kelas');

        //print_r($data);
	}

    public function rules()
    {
        return [
            ['field' => 'matakuliah',
            'label' => 'Matakuliah',
            'rules' => 'required'],

            ['field' => 'kelas',
            'label' => 'Kelas',
            'rules' => 'required'],
            
            ['field' => 'nama_dosen',
            'label' => 'Nama_dosen',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_kelas" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->matakuliah = $post["matakuliah"];
        $this->kelas = $post["kelas"];
        $this->nama_dosen = $post["nama_dosen"];
        $this->db->insert($this->_table, $this);
    }

    public function delete($data)
    {
        return $this->db->delete($this->db, array("id_kelas" => $post['id_kelas']));
    }
}
