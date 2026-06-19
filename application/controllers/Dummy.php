<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*  error_reporting(E_ALL);
ini_set('display_errors', 1);  */
class Dummy extends CI_Controller {

	
	public function __construct(){
		parent::__construct();
		$this->load->model('Doctoruser_Model');
		//$this->load->library('Sm_lib');
	}
	
	public function mystatic()
	{
		$view = $this->uri->segment(3);
		$this->load->view('static/'.$view,@$data);
	}
	
	
} 