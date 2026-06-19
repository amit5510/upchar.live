<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Pathology extends CI_Controller 
{
	function __construct()
	{
		 parent::__construct();
		 date_default_timezone_set("Asia/Kolkata");
		 $date=date('Y-m-d h:i:s');
		 $this->load->helper(array('query_string_helper','dbquery_helper','admin_helper'));
		 $this->load->model(array('doctor/pathology_model','masters/managementmodel'));
		 $this->load->library('Pdf');
	}
	
	public function index()
	{	
		$pagesize               =  (int) $this->input->get_post('pagesize');
		$config['limit']	    =  ( $pagesize > 0 ) ? $pagesize : 10;	
		$offset                 =  ( $this->input->get_post('per_page') > 0 ) ? $this->input->get_post('per_page') : 0;	
		$base_url               =  current_url_query_string(array('filter'=>'result'),array('per_page'));
		$data['result'] 		=  $this->pathology_model->get_assign_test($config['limit'],$offset);
		//echo "<pre>"; print_r($data['result']); die;
		$config['total_rows']   =  get_found_rows();
		$data['heading_title'] 	=  'Path Test List';
		$data['module'] 		=  'Path Test';
		$data['page_links'] 	=  admin_pagination($base_url, $config['total_rows'],$config['limit'],$offset);
		if( $this->input->post('status_action')!='')
		{
			$this->managementmodel->update_status('path_lab_test','id');			
		}
		$this->load->view('inc/topheaderlink');
		$this->load->view('inc/topheader');
		$this->load->view('pathology/assign_test',$data);
		$this->load->view('sidebar');
		$this->load->view('inc/headersetting');
		$this->load->view('inc/footerlink');
		$this->load->view('inc/table_footer');
	}
	
	public function add()
	{
		//$this->form_validation->set_rules('test_id','Test Name','trim|required|max_length[100]');
		$this->form_validation->set_rules('path_lab_id','Path Name','trim|required|max_length[100]');
		$this->form_validation->set_rules('test_id','Test Name',"trim|numeric|required|max_length[255]|is_unique[path_lab_test.test_id='".$this->db->escape_str($this->input->post('test_id'))."' AND path_lab_id!='".$this->db->escape_str($this->input->post('path_lab_id'))."']");
		if($this->form_validation->run()==TRUE)
		{
			if($this->pathology_model->insert_assign_test()) 
			{
				$msg="<div class='alert alert-success'><strong>Success!</strong> Test Added Successfully </div>";
				$this->session->set_flashdata('flashmsg',$msg);
				redirect(base_url().'doctor/pathology/index');
			}	
		}
		$data['heading_title'] 	= 'Assing Test Add';
		$data['module'] 		= 'Assing Test Add';
		$data['test']			= $this->pathology_model->get_test(array('status'=>'1'));
		$data['pathlab']		= $this->pathology_model->get_pathlab(array('approved'=>'1'));
		$this->load->view('inc/topheaderlink');
		$this->load->view('inc/topheader');
		$this->load->view('pathology/assign_test_add',$data);
		$this->load->view('sidebar');
		$this->load->view('inc/headersetting');
		$this->load->view('inc/footerlink');
		$this->load->view('inc/table_footer');
	}
	
	public function assign_test_delete()
    {
		$id=$this->input->get('id');
		$this->pathology_model->assign_test_delete($id);
		$msg="<div class='alert alert-success'><strong>Success!</strong> Unit Deleted Successfully </div>";
		$this->session->set_flashdata('flashmsg',$msg);
		redirect(base_url().'doctor/pathology/index');
    }
}