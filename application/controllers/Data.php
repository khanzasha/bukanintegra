<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends CI_Controller {

	public function __construct()
	{
	  	parent::__construct();
	  	$this->load->helper(array('url', 'html', 'form'));
	  	$this->load->library('session');
	  	$this->load->database();
	}
	public function index()
	{
		
		$this->load->view('hello');
	}
	public function hai()
	{
		
		$this->load->view('hello');
	}
}
