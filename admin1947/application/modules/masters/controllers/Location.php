<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Location extends CI_Controller 
{

	function __construct() 
	{
		parent::__construct();
		date_default_timezone_set("Asia/Kolkata");
		$date=date('Y-m-d h:i:s');
		$this->load->helper(array('query_string_helper','dbquery_helper','admin_helper'));
		$this->load->model('locationmodel');
	}
	public function index()
	{
		$pagesize               =  (int) $this->input->get_post('pagesize');
		$config['limit']	    =  ( $pagesize > 0 ) ? $pagesize : 10;	
		$offset                 =  ( $this->input->get_post('per_page') > 0 ) ? $this->input->get_post('per_page') : 0;	
		$base_url               =  current_url_query_string(array('filter'=>'result'),array('per_page'));
		$data['location'] 		=  $this->locationmodel->get_location($config['limit'],$offset);
		//echo "<pre>"; print_r($data['location']); die;
		$config['total_rows']   =  get_found_rows();
		$data['page_links'] 	=  admin_pagination($base_url, $config['total_rows'],$config['limit'],$offset);
		$this->load->view('inc/topheaderlink');
		$this->load->view('inc/topheader');
		$this->load->view('location',$data);
		$this->load->view('sidebar');
		$this->load->view('inc/headersetting');
		$this->load->view('inc/footerlink');
		$this->load->view('inc/table_footer');
	}
    public function create()
	{
		   if(isset($_POST['submit'])){
			$id=base64_decode($this->input->post('eid'));
			$eduname=$this->input->post('city');
			if($id=='')
			{
				$count =$this->db->where('name', $eduname)->count_all_results('master_locality');
				if($count>0)
    			{
    				$msg="<div class='alert alert-danger'><strong>Failed!</strong> This keyword is already exists.</div>";
    				$this->session->set_flashdata('flashmsg',$msg);
    				redirect(base_url().'masters/location');
    				exit();
    			}
				if($this->locationmodel->insert())
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
				$count =$this->db->where('name', $eduname)->where_not_in('id',$id)->count_all_results('master_locality');
				if($count>0)
    			{
    				$msg="<div class='alert alert-danger'><strong>Failed!</strong> This keyword is already exists.</div>";
    				$this->session->set_flashdata('flashmsg',$msg);
    				redirect(base_url().'masters/location');
    				exit();
    			}
				if($this->locationmodel->edit($id))
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
		redirect(base_url().'masters/location');
	}
	
	public function statusupdate()
	{
		$uid=$this->input->post('uid');
		$this->locationmodel->status($uid);
		
	}
	
	public function delete()
	{
		$uid=$this->uri->segment('4');
		if($this->locationmodel->delete($uid))
		{
			echo "Y";
		}
	}



   

	
}
