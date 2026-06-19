<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lgd extends CI_Controller {

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
		 
		 $this->load->model('lgdmodel');
	}
	public function index()
	{
		$this->load->view('inc/topheaderlink');
		$this->load->view('inc/topheader');
		$this->load->view('lgd');
		$this->load->view('sidebar');
		$this->load->view('inc/headersetting');
		$this->load->view('inc/footerlink');
		$this->load->view('inc/table_footer');
	}
	public function stateDB()
	{
		if(isset($_POST['submit'])){
			$edu=$this->input->post('state');
			$count =$this->db->where('state_name', $edu)->count_all_results('lgd_states');
				if($count>0)
    			{
    				$msg="<div class='alert alert-danger'><strong>Failed!</strong> This state already exists.</div>";
    				$this->session->set_flashdata('flashmsg',$msg);
    				redirect(base_url().'masters/lgd');
    				exit();
    			}
				if($this->lgdmodel->stateinsert())
				{
					$msg="<div class='alert alert-success'><strong>Success!</strong> State Added Successfully</div>";
					$this->session->set_flashdata('flashmsg',$msg);
				}
				else{
					$msg="<div class='alert alert-danger'><strong>Failed!</strong> Something went wrong. Please try again.</div>";
					$this->session->set_flashdata('flashmsg',$msg);
				}
			
		}
		redirect(base_url().'masters/lgd');
	}
	
	public function districtDB()
	{
		if(isset($_POST['submit'])){
			$edu=$this->input->post('district');
			$count =$this->db->where('district_name', $edu)->count_all_results('lgd_districts');
				if($count>0)
    			{
    				$msg="<div class='alert alert-danger'><strong>Failed!</strong> This district already exists.</div>";
    				$this->session->set_flashdata('flashmsg',$msg);
    				redirect(base_url().'masters/lgd');
    				exit();
    			}
				if($this->lgdmodel->districtinsert())
				{
					$msg="<div class='alert alert-success'><strong>Success!</strong> District Added Successfully</div>";
					$this->session->set_flashdata('flashmsg',$msg);
				}
				else{
					$msg="<div class='alert alert-danger'><strong>Failed!</strong> Something went wrong. Please try again.</div>";
					$this->session->set_flashdata('flashmsg',$msg);
				}
			
		}
		redirect(base_url().'masters/lgd');
	}
	
	public function blockDB()
	{
		if(isset($_POST['submit'])){
			$block=$this->input->post('block');
			$village=$this->input->post('village');
			$district=$this->input->post('district');
			$count=$this->db->where('block_name',$block)->where('district_code',$district)->count_all_results('lgd_block');
				if($count>0)
    			{
    				$msg="<div class='alert alert-danger'><strong>Failed!</strong> This block already exists.</div>";
    				$this->session->set_flashdata('flashmsg',$msg);
    				redirect(base_url().'masters/lgd');
    				exit();
    			}
				if($this->lgdmodel->blockinsert())
				{
					$msg="<div class='alert alert-success'><strong>Success!</strong> Block Added Successfully</div>";
					$this->session->set_flashdata('flashmsg',$msg);
				}
				else{
					$msg="<div class='alert alert-danger'><strong>Failed!</strong> Something went wrong. Please try again.</div>";
					$this->session->set_flashdata('flashmsg',$msg);
				}
			
		}
		redirect(base_url().'masters/lgd');
	}
	
	public function villageDB()
	{
		if(isset($_POST['submit'])){
			
				if($this->lgdmodel->villageinsert())
				{
					$msg="<div class='alert alert-success'><strong>Success!</strong> Village Added Successfully</div>";
					$this->session->set_flashdata('flashmsg',$msg);
				}
				else{
					$msg="<div class='alert alert-danger'><strong>Failed!</strong> Something went wrong. Please try again.</div>";
					$this->session->set_flashdata('flashmsg',$msg);
				}
			
		}
		redirect(base_url().'masters/lgd');
	}
	
	
	
}
