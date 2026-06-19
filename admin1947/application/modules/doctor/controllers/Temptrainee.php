<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Temptrainee extends CI_Controller {

	 function __construct() {
		 parent::__construct();
		 date_default_timezone_set("Asia/Kolkata");
		 $date=date('Y-m-d h:i:s');
		 
	}
	 
	public function index()
	{
		$data['traineeview']=$this->db->order_by('id','DESC')->get_where('fddi_trainee_registration');
		$this->load->view('inc/topheaderlink');
		$this->load->view('inc/topheader');
		$this->load->view('temptrainee',$data);
		$this->load->view('sidebar');
		$this->load->view('inc/headersetting');
		$this->load->view('inc/footerlink');
		$this->load->view('inc/table_footer');
	}
	public function create()
	{
		if(isset($_POST['submit'])){
			
			$uploadimage='';
			$id=base64_decode($this->input->post('eid'));
			
			//insert code
			if($id=='')
			{
				$uploadimage=$_FILES['uploadimage']['name'];
				if($uploadimage != '') 
				{	
					$rname=rand(111111,999999999);
					$uploadimage='traineeregistration'.$rname.$uploadimage;
					$config['upload_path']          = './public/assets/mainpanel/images/traineeregistration/';
					$config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|PDF|JPG|PNG|JPEG';
					$config['max_size']             = 5120;
					$config['file_name']  = $uploadimage;
					$this->load->library('upload', $config);
					
					if ( ! $this->upload->do_upload('uploadimage'))
					{
						$error = $this->upload->display_errors();
						$flashmsg='<div class="alert alert-danger">
						  <strong>Failed!</strong>'.$error.'
						</div>';
						$this->session->set_flashdata('flashmsg',$flashmsg);
						redirect(base_url().'trainee/traineereg');
						exit();
						
					}
					else{
						if($this->traineeregmodel->traineereginsert($uploadimage))
						{
							$msg="<div class='alert alert-success'><strong>Success!</strong> Data Inserted Successfully</div>";
							$this->session->set_flashdata('flashmsg',$msg);
						}
						else{
							$msg="<div class='alert alert-danger'><strong>Failed!</strong> Something went wrong. Please try again.</div>";
							$this->session->set_flashdata('flashmsg',$msg);
						}
					}
				}
				
				
				
			}
			
			//update code
			else
			{
				$uploadsanction=$_FILES['uploadsanction']['name'];
				$uploaddpr=$_FILES['uploaddpr']['name'];
					if($uploadsanction != '') 
					{	
						$rname=rand(111111,999999999);
						$uploadsanction='sanctionletter'.$rname.$uploadsanction;
						$config['upload_path']          = './public/assets/mainpanel/images/sanctionletter/';
						$config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|PDF|JPG|PNG|JPEG';
						$config['max_size']             = 5120;
						$config['file_name']  = $uploadsanction;
						$this->load->library('upload', $config);
						
						if ( ! $this->upload->do_upload('uploadsanction'))
						{
							$error = $this->upload->display_errors();
							$flashmsg='<div class="alert alert-danger">
							  <strong>Failed!</strong>'.$error.'
							</div>';
							$this->session->set_flashdata('flashmsg',$flashmsg);
							redirect(base_url().'dpr/dprcreate');
							exit();
						}
					}
				
					if($uploaddpr != '') 
					{	
						$rname=rand(111111,999999999);
						$uploaddpr='dpr'.$rname.$uploaddpr;
						$config1['upload_path']          = './public/assets/mainpanel/images/dpr/';
						$config1['allowed_types'] = 'gif|jpg|png|jpeg|pdf|PDF|JPG|PNG|JPEG';
						$config1['max_size']             = 5120;
						$config1['file_name']  = $uploaddpr;
						$this->load->library('upload', $config1);
						
						if ( ! $this->upload->do_upload('uploaddpr'))
						{
							$error = $this->upload->display_errors();
							$flashmsg='<div class="alert alert-danger">
							  <strong>Failed!</strong>'.$error.'
							</div>';
							$this->session->set_flashdata('flashmsg',$flashmsg);
							redirect(base_url().'dpr/dprcreate');
							exit();
						}
					}
				
				
				if($this->traineeregmodel->dprcreateedit($id,$uploadsanction,$uploaddpr))
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
		
		redirect(base_url().'trainee/traineereg');
	}
	
	public function edit()
	{
		$id=base64_decode($this->input->post('uid'));
		
		$alldata=array();
		$data=$this->db->get_where('dpr_create',array('dpr_id'=>$id))->row();
		//print_r($data);
		//$dpr=$this->db->get_where('dpr_create',array('dpr_id'=>$data->dpr))->row('dpr_name');
		
		
		$alldata['dpr_name']=$data->dpr_name;
		$alldata['course_type']=$data->course_type;
		$alldata['course_field']=$data->course_field;
		$alldata['durationweek']=$data->durationweek;
		$alldata['proposal_date']=$data->proposal_date;
		$alldata['proposal_trainee']=$data->proposed_trainee;
		$alldata['proposed_amount']=$data->proposed_amount;
		$alldata['approved_trainee']=$data->approved_trainee;
		$alldata['approved_amount']=$data->approved_amount;
		$alldata['approval_date']=$data->approval_date;
		$alldata['trainee_stipend']=$data->trainee_stipend;
		$alldata['sanction_number']=$data->sanction_number;
		$alldata['amount']=$data->amount;
		$alldata['s_date']=$data->s_date;
		$alldata['number_trainee']=$data->number_trainee;
		$alldata['active']=$data->active;
		
		echo json_encode($alldata);
		
	}
	
}
