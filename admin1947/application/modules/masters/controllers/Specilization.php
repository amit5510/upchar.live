<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Specilization extends CI_Controller {

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
		 
		 $this->load->model('specilizationmodel');
		 $this->load->helper(array('query_string_helper','dbquery_helper','admin_helper'));
	}
	public function index()
	{
		
		$pagesize               =  (int) $this->input->get_post('pagesize');
		$config['limit']	    =  ( $pagesize > 0 ) ? $pagesize : 10;	
		$offset                 =  ( $this->input->get_post('per_page') > 0 ) ? $this->input->get_post('per_page') : 0;	
		$base_url               =  current_url_query_string(array('filter'=>'result'),array('per_page'));
		$data['specilization'] 		=  $this->specilizationmodel->get_speclization($config['limit'],$offset);
		//echo "<pre>"; print_r($data['specilization']); die;
		$config['total_rows']   =  get_found_rows();
		$data['heading_title'] 	=  'specilization List';
		$data['module'] 		=  'specilization';
		$data['page_links'] 	=  admin_pagination($base_url, $config['total_rows'],$config['limit'],$offset);
		
		
		$this->load->view('inc/topheaderlink');
		$this->load->view('inc/topheader');
		$this->load->view('specilization',$data);
		$this->load->view('sidebar');
		$this->load->view('inc/headersetting');
		$this->load->view('inc/footerlink');
		$this->load->view('inc/table_footer');
		
	}
	public function create()
	{
		if(isset($_POST['submit'])){
			$id=base64_decode($this->input->post('eid'));
			$eduname=$this->input->post('specilization');
			
			$image=$_FILES['image']['name'];
			$ext = pathinfo($_FILES['image']['name'],PATHINFO_EXTENSION);
				
			if($image != '') 
			{	
				$rname=rand(1111111,999999999);
				$date=date('Y-m-d');
				$image='master_specialization_'.$rname.$date.'.'.$ext;
				
				$config['upload_path']          = './public/assets/upload/';
				$config['allowed_types'] = 'jpg|png|jpeg|JPG|PNG|JPEG';
				$config['max_size']             = 2048;
				$config['quality'] = '60%';
				$config['file_name']  = $image;
				$this->load->library('upload', $config);
					
				if ( ! $this->upload->do_upload('image'))
				{
					$error = $this->upload->display_errors();
					$flashmsg='<div class="alert alert-danger">
						  <strong>Failed!</strong>'.$error.'
						</div>';
					$this->session->set_flashdata('flashmsg',$msg);
					redirect(base_url().'masters/specilization');
					exit();		
				}
			}
			
			
			
			if($id=='')
			{
				$count =$this->db->where('name', $eduname)->count_all_results('master_specialization');
				if($count>0)
    			{
    				$msg="<div class='alert alert-danger'><strong>Failed!</strong> This keyword is already exists.</div>";
    				$this->session->set_flashdata('flashmsg',$msg);
    				redirect(base_url().'masters/specilization');
    				exit();
    			}
				if($this->specilizationmodel->insert($image))
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
				$count =$this->db->where('name', $eduname)->where_not_in('id',$id)->count_all_results('master_specialization');
				if($count>0)
    			{
    				$msg="<div class='alert alert-danger'><strong>Failed!</strong> This keyword is already exists.</div>";
    				$this->session->set_flashdata('flashmsg',$msg);
    				redirect(base_url().'masters/services');
    				exit();
    			}
				if($this->specilizationmodel->edit($id,$image))
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
		redirect(base_url().'masters/specilization');
	}
	public function statusupdate()
	{
		$uid=$this->input->post('uid');
		$this->specilizationmodel->status($uid);
		
	}
	
	public function delete()
	{
		$uid=$this->uri->segment('4');
		if($this->specilizationmodel->delete($uid))
		{
			echo "Y";
		}
	}
	           
             
			
	
}
