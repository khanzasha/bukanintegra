<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Class extends CI_Controller {

	public function __construct()
	{
	  	parent::__construct();
	  	$this->load->helper(array('url', 'html', 'form'));
	  	$this->load->library('session');
	  	$this->load->database();
	  	$this->load->model('View_model', 'v_m');
	  	$this->load->model('View_kelas', 'v_k');
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
		$get = $this->v_k->getKelas("matakuliah, kelas, nama_dosen");
		$matkul = array(
			'apa' => 'aja',
			'sabeb' => 'lah',
			'new' => $get
		);
		$this->load->view('dashboard/header2');
		$this->load->view('kelas', $matkul);
		$this->load->view('dashboard/footer2');
	}
	public function hai()
	{
		$this->load->view('dashboard/header');
		$this->load->view('dashboard/dashboard');
		$this->load->view('dashboard/footer');
	}
	public function haf()
	{
		$this->load->view('header');
		$this->load->view('starter');
		$this->load->view('footer');
	}

	
}
