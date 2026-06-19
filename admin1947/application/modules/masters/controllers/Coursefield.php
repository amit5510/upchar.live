<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coursefield extends CI_Controller {

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
		
		 $this->load->model('coursefieldmodel');
	}
	public function index()
	{
		$this->load->view('inc/topheaderlink');
		$this->load->view('inc/topheader');
		$this->load->view('course_field');
		$this->load->view('sidebar');
		$this->load->view('inc/headersetting');
		$this->load->view('inc/footerlink');
		$this->load->view('inc/table_footer');
	}
	public function create()
	{
		if(isset($_POST['submit'])){
			$id=base64_decode($this->input->post('eid'));
			$eduname=$this->input->post('coursefield');
			if($id=='')
			{
				$count =$this->db->where('course_field_name', $eduname)->count_all_results('master_course_field');
				if($count>0)
    			{
    				$msg="<div class='alert alert-danger'><strong>Failed!</strong> This keyword is already exists.</div>";
    				$this->session->set_flashdata('flashmsg',$msg);
    				redirect(base_url().'masters/coursefield');
    				exit();
    			}
				if($this->coursefieldmodel->coursefieldinsert())
				{
					$msg="<div class='alert alert-success'><strong>Success!</strong> Data Inserted Successfully</div>";
					$this->session->set_flashdata('flashmsg',$msg);
				}
				else{
					$msg="<div class='alert alert-danger'><strong>Failed!</strong> Something went wrong. Please try again.</div>";
					$this->session->set_flashdata('flashmsg',$msg);
				}
			}
			else
			{
				$count =$this->db->where('course_field_name', $eduname)->where_not_in('course_field_id',$id)->count_all_results('master_course_field');
				if($count>0)
    			{
    				$msg="<div class='alert alert-danger'><strong>Failed!</strong> This keyword is already exists.</div>";
    				$this->session->set_flashdata('flashmsg',$msg);
    				redirect(base_url().'masters/coursefield');
    				exit();
    			}
				if($this->coursefieldmodel->coursefieldedit($id))
				{
					$msg="<div class='alert alert-success'><strong>Success!</strong> Data Updated Successfully</div>";
					$this->session->set_flashdata('flashmsg',$msg);
				}
				else{
					$msg="<div class='alert alert-danger'><strong>Failed!</strong> Something went wrong. Please try again.</div>";
					$this->session->set_flashdata('flashmsg',$msg);
				}
				
			}
		}
		redirect(base_url().'masters/coursefield');
	}
	public function statusupdate()
	{
		$uid=$this->input->post('uid');
		$this->coursefieldmodel->coursefieldstatus($uid);
		
	}
	
	public function delete()
	{
		$uid=$this->uri->segment('4');
		if($this->coursefieldmodel->coursefielddelete($uid))
		{
			echo "Y";
		}
	}
}
