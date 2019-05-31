<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
	  	parent::__construct();
	  	$this->load->helper(array('url', 'html', 'form'));
	  	$this->load->library('session');
	  	$this->load->database();
	  	$this->load->model('View_mhs', 'v_m');
	  	$this->load->model('View_kelas', 'v_k');
	  	$this->load->model('View_frs', 'v_f');
	  	$this->load->model('View_matakuliah', 'v_mk');
	  	$this->load->model('View_tempuh', 'v_t');
	}

	public function index()
	{
		$ambil = $this->v_m->getNama("NRP, Nama",5212);
		$data = array(
			'apa' => 'aja',
			'sabeb' => 'lah',
			'baru' => $ambil
		);
		$this->load->view('hello', $data);

	}
	public function kelas()
	{
		$get = $this->v_k->getKelas("id_kelas, matakuliah, kelas, nama_dosen");
		$kelas = array(
			'apa' => 'aja',
			'sabeb' => 'lah',
			'new' => $get
		);
		$this->load->view('dashboard/header2');
		$this->load->view('kelas', $kelas);
		$this->load->view('dashboard/footer2');
	}

	public function kelas_edit()
	{
		$data = array(
			'id_kelas' => $this->input->post('id_kelas'),
			'matakuliah' => $this->input->post('matakuliah'),
			'kelas' => $this->input->post('kelas'),
			'nama_dosen' => $this->input->post('nama_dosen')
		);

		$this->v_k->updateKelas($data);

		redirect(base_url('home/kelas'));
	}

	public function kelas_tambah()
	{
		$data = array(
			'id_kelas' => $this->input->post('id_kelas'),
			'matakuliah' => $this->input->post('matakuliah'),
			'kelas' => $this->input->post('kelas'),
			'nama_dosen' => $this->input->post('nama_dosen')
		);

		$this->v_k->insertKelas($data);

		redirect(base_url('home/kelas'));
	}

	public function ambil_matkul($nrp = "")
	{
		$get = $this->v_mk->getMatakuliah("id_matkul, nama_matkul, sks, kategori");
		$matkul = array(
			'apa' => 'aja',
			'sabeb' => 'lah',
			'new' => $get,
			'nrp' => $nrp
		);
		$this->load->view('dashboard/header2');
		$this->load->view('matakuliah2', $matkul);
		$this->load->view('dashboard/footer2');
	}
	/*
	public function do_ambil($matkul = "", $nrp = "")
	{
		echo $matkul;
		echo "<br>";
		echo $nrp;
	}
	*/
	public function do_ambil($matkul = "", $nrp = "")
	{
		$data = array(
			'tempuh_id_matkul' => $matkul,
			'tempuh_nrp_mhs' => $nrp
		);

		$this->v_t->insertTempuh($data);

		redirect(base_url('home/ambil_matkul/'.$nrp));
	}

	public function kelas_hapus()
	{
		//$data = array('id_kelas' => $this->input->post('id_kelas'));
		$this->v_k->deleteKelas($this->input->post('id_kelas'));
		
		redirect(base_url('home/kelas'));
	}

	public function mahasiswa()
	{
		$get = $this->v_m->getMahasiswa("nrp, nama, asal, tanggal_lahir, tahun_masuk");
		$mhs = array(
			'apa' => 'aja',
			'sabeb' => 'lah',
			'new' => $get
		);
		$this->load->view('dashboard/header2');
		$this->load->view('mahasiswa', $mhs);
		$this->load->view('dashboard/footer2');
	}

	public function mhs_tambah()
	{
		$data = array(
			'nrp' => $this->input->post('nrp'),
			'nama' => $this->input->post('nama'),
			'asal' => $this->input->post('asal'),
			'tanggal_lahir' => $this->input->post('tanggal_lahir'),
			'tahun_masuk' => $this->input->post('tahun_masuk')
		);

		$this->v_m->insertMahasiswa($data);

		redirect(base_url('home/mahasiswa'));
	}

	public function mhs_hapus()
	{
		$data = array('nrp' => $this->input->post('nrp'));
		$this->v_m->deleteMahasiswa($data);

		redirect(base_url('home/mahasiswa'));
	}

	public function matakuliah()
	{
		$get = $this->v_mk->getMatakuliah("id_matkul, nama_matkul, sks, kategori");
		$matkul = array(
			'apa' => 'aja',
			'sabeb' => 'lah',
			'new' => $get
		);
		$this->load->view('dashboard/header2');
		$this->load->view('matakuliah', $matkul);
		$this->load->view('dashboard/footer2');
	}
}
