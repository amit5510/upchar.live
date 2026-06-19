<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Changepassword extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	 function __construct() {
		 parent::__construct();
		 date_default_timezone_set("Asia/Kolkata");
		 $date=date('Y-m-d h:i:s');
		 
	}
	 
	public function index()
	{
		$this->load->view('inc/topheaderlink');
		$this->load->view('inc/topheader');
		$this->load->view('changepwd');
		$this->load->view('sidebar');
		$this->load->view('inc/headersetting');
		$this->load->view('inc/footerlink');
		$this->load->view('inc/table_footer');
	}
	
	public function change()
	{
		$old=md5($this->input->post('old'));
		$pwd=md5($this->input->post('pwd'));
		
		if($old==$this->session->userdata('pwd'))
		{
			$data=array('password'=>$pwd);
			$this->db->where('id',$this->session->userdata('userid'));
			if($this->db->update('login',$data))
			{
				echo "Y";
			}
			else
			{
				echo "Something went wrong.";
			}
			
			
		}
		else
		{
			echo "Old password is wrong.";
		}
	}
	
	
}
