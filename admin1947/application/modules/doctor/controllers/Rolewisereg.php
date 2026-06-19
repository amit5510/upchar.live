<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Rolewisereg extends CI_Controller 
{
	function __construct() 
	{
		parent::__construct();
		date_default_timezone_set("Asia/Kolkata");
		$date=date('Y-m-d h:i:s');
		$this->load->model('Rolewiseregmodel'); 
	}
	 
	public function index()
	{ 
		$this->load->view('inc/topheaderlink');
		$this->load->view('inc/topheader');
		$this->load->view('rolewisereg');
		$this->load->view('sidebar');
		$this->load->view('inc/headersetting');
		$this->load->view('inc/footerlink');
		$this->load->view('inc/table_footer');
	}



	public function create()
	{
		
		if(isset($_POST['submit']))
		{
			if($this->Rolewiseregmodel->traineereginsert()) 
			{
				$msg="<div class='alert alert-success'><strong>Success!</strong> Data Added Successfully</div>";
				$this->session->set_flashdata('flashmsg',$msg);
				
			
			}
			else{
				$msg="<div class='alert alert-danger'><strong>Failed!</strong> Something went wrong. Please try again.</div>";
				$this->session->set_flashdata('flashmsg',$msg);
			}
     }
		redirect(base_url().'doctor/rolewisereg');
	
	}
	
          
	public function viewrolewise()
	{
		$data['rolewise']=$this->db->get_where('rolewise')->result_array();
		$data['module']='rolewise';
		$this->load->view('inc/topheaderlink');
		$this->load->view('inc/topheader');
		$this->load->view('rolewiseview',$data);
		$this->load->view('sidebar');
		$this->load->view('inc/headersetting');
		$this->load->view('inc/footerlink');
		$this->load->view('inc/table_footer');
	}


      public function rolewiseapprove()
	{
		$did=$this->input->post('did');
		$current=$this->db->select('approved')->get_where('rolewise',array('id'=>$did))->row()->approved;
		if($current=='1'){
			$this->db->set('approved','0')->where(array('id'=>$did))->update('rolewise');
			$response=array('status'=>'0');
		}else if($current=='0'){
			$this->db->set('approved','1')->where(array('id'=>$did))->update('rolewise');
			$response=array('status'=>'1');
		}
		echo json_encode($response);
	}
	 
	public function rolewiseverify()
	{
		$did=$this->input->post('did');
		$current=$this->db->select('verified')->get_where('rolewise',array('id'=>$did))->row()->verified;
		if($current=='1'){
			$this->db->set('verified','0')->where(array('id'=>$did))->update('rolewise');
			$response=array('status'=>'0');
		}else if($current=='0'){
			$this->db->set('verified','1')->where(array('id'=>$did))->update('rolewise');
			$response=array('status'=>'1');
		}
		echo json_encode($response);
	}
	 
	
	
	 public function rolewiseview($id)
	      {

		$data['rolewise']=$this->db->get_where('rolewise',array('id'=>$id))->row();
		$data['module']='rolewise';
	
         // print_r($data);

 
		$this->load->view('inc/topheaderlink');
		$this->load->view('inc/topheader');
		$this->load->view('viewrolewise',$data);
		$this->load->view('sidebar');
		$this->load->view('inc/headersetting');
		$this->load->view('inc/footerlink');
		$this->load->view('inc/table_footer');
	
      
	}


  	public function rolewiseupdate($id)
      	{

			$data['rolewise']=$this->db->get_where('rolewise',array('level_id'=>$id))->row();
			$data['module']='rolewise';

          	if($_POST['submit']){
	         	$this->load->model('rolewiseregmodel');
                $this->rolewiseregmodel->updaterolewise($id);
         
				$msg="<div class='alert alert-success'><strong>Success!</strong> Data Added Successfully</div>";
				$this->session->set_flashdata('flashmsg',$msg);
				redirect(base_url().'doctor/rolewisereg/viewrolewise');
	     	}


		$this->load->view('inc/topheaderlink');
		$this->load->view('inc/topheader');
		$this->load->view('updaterolewise',$data);
		$this->load->view('sidebar');
		$this->load->view('inc/headersetting');
		$this->load->view('inc/footerlink');
		$this->load->view('inc/table_footer'); 
	}

	public function deleterole()
    {
        $id=$this->uri->segment(4);
        $this->load->model('rolewiseregmodel');
        $this->rolewiseregmodel->roledelete($id);
        $msg="<div class='alert alert-success'><strong>Success!</strong> Data Deleted Successfully</div>";
		$this->session->set_flashdata('flashmsg',$msg);
        redirect(base_url().'doctor/rolewisereg/viewrolewise');
    }


	}