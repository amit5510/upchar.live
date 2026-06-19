<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Management extends CI_Controller 
{  
	function __construct() 
	{
		parent::__construct();
		date_default_timezone_set("Asia/Kolkata");
		$date=date('Y-m-d h:i:s');
		 
		$this->load->model('managementmodel');
	}
	public function index()
	{	
		$this->load->view('inc/topheaderlink');
		$this->load->view('inc/topheader');
		$this->load->view('management');
		$this->load->view('sidebar');
		$this->load->view('inc/headersetting');
		$this->load->view('inc/footerlink');
		$this->load->view('inc/table_footer');
	}
	public function create()
	{
		if(isset($_POST['submit'])){
			//echo "<pre>"; print_r($_POST); die;
			$id=base64_decode($this->input->post('eid'));
			$eduname=$this->input->post('management');

			if($id=='')
			{	
				$count =$this->db->where('module_name', $eduname)->count_all_results('master_management');
				//print_r($count); die;
				if($count>0)
    			{
    				$msg="<div class='alert alert-danger'><strong>Failed!</strong> This keyword is already exists.</div>";
    				$this->session->set_flashdata('flashmsg',$msg);
    				redirect(base_url().'masters/management');
    				exit();
    			}
				if($this->managementmodel->insert())
				{	//echo "hi"; die;
					$msg="<div class='alert alert-success'><strong>Success!</strong> Data Inserted Successfully</div>";
					$this->session->set_flashdata('flashmsg',$msg);
				}
				else{
					$msg="<div class='alert alert-danger'><strong>Failed!</strong> Something went wrong. Please try again.</div>";
					$this->session->set_flashdata('flashmsg',$msg);
				}
			}
			else
			{	//echo "bye"; die;
				$count =$this->db->where('module_name', $eduname)->where_not_in('module_id',$id)->count_all_results('master_management');
				if($count>0)
    			{
    				$msg="<div class='alert alert-danger'><strong>Failed!</strong> This keyword is already exists.</div>";
    				$this->session->set_flashdata('flashmsg',$msg);
    				redirect(base_url().'masters/management');
    				exit();
    			}
				if($this->managementmodel->edit($id))
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
		redirect(base_url().'masters/management');
	}
	public function statusupdate()
	{
		$uid=$this->input->post('uid');
		
		$this->managementmodel->status($uid);
		
	}
	
	public function delete()
	{
		$uid=$this->uri->segment('4');
		if($this->managementmodel->delete($uid))
		{
			echo "Y";
		}
	}
}
