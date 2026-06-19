<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Emailsmsconfig extends CI_Controller {

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
		 
		 $this->load->model('emailsmsconfigmodel');
	}
	 
	public function index()
	{
		$data['getconfig']=$this->db->get_where('setting_smtp',array('id','1'))->row();
		$this->load->view('inc/topheaderlink');
		$this->load->view('inc/topheader');
		$this->load->view('emailsmsconfig',$data);
		$this->load->view('sidebar');
		$this->load->view('inc/headersetting');
		$this->load->view('inc/footerlink');
		$this->load->view('inc/table_footer');
	}
	public function edit()
	{
		if(isset($_POST['submit'])){
			
			$id=1;
			if($id!='')
			{
				if($this->emailsmsconfigmodel->editsetting($id))
				{
					$msg="<div class='alert alert-success'><strong>Success!</strong> Setting Updated Successfully</div>";
					$this->session->set_flashdata('flashmsg',$msg);
				}
				else{
					$msg="<div class='alert alert-danger'><strong>Failed!</strong> Something went wrong. Please try again.</div>";
					$this->session->set_flashdata('flashmsg',$msg);
				}
				
			}
		}
		redirect(base_url().'masters/emailsmsconfig');
	}

}
