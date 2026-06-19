<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Assessment extends CI_Controller {


	function __construct() {
		 parent::__construct();
		 date_default_timezone_set("Asia/Kolkata");
		 $date=date('Y-m-d h:i:s');
		 
		 $this->load->model('assessmentmodel');
	}
	 
	public function index()
	{
		$data['dpr']=$this->db->get_where('dpr_create',array('status'=>'1'));
		$this->load->view('inc/topheaderlink');
		$this->load->view('inc/topheader');
		$this->load->view('assessment',$data);
		$this->load->view('sidebar');
		$this->load->view('inc/headersetting');
		$this->load->view('inc/footerlink');
		$this->load->view('inc/table_footer');
	}
	public function create()
	{
		if(isset($_POST['submit'])){
			
			$id=base64_decode($this->input->post('eid'));
			if($id=='')
			{
				
				
				if($this->assessmentmodel->validateassessment())
				{
					$signature=$_FILES['signature']['name'];
					if($signature != '') 
					{	
						$rname=rand(111111,999999999);
						$signature='signature'.$rname.$signature;
						$config['upload_path']          = './public/assets/mainpanel/images/signature/';
						$config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|PDF|JPG|PNG|JPEG';
						$config['max_size']             = 512;
						$config['file_name']  = $signature;
						$this->load->library('upload', $config);
						
						if ( ! $this->upload->do_upload('signature'))
						{
							$error = $this->upload->display_errors();
							$flashmsg='<div class="alert alert-danger">
							  <strong>Failed!</strong>'.$error.'
							</div>';
							$this->session->set_flashdata('flashmsg',$flashmsg);
							redirect(base_url().'masters/assessment');
							exit();
						}
					}
					
					if($this->assessmentmodel->assessmentinsert($signature))
					{
						$msg="<div class='alert alert-success'><strong>Success!</strong> Assessment Data Added Successfully</div>";
						$this->session->set_flashdata('flashmsg',$msg);
					}
					else{
						$msg="<div class='alert alert-danger'><strong>Failed!</strong> Something went wrong. Please try again.</div>";
						$this->session->set_flashdata('flashmsg',$msg);
					}
				}
				else
				{
					$msg="<div class='alert alert-danger'><strong>Failed!</strong> Data Already Exist for the selected DPR.</div>";
					$this->session->set_flashdata('flashmsg',$msg);
				}
			}
			else
			{		$signature="";
					$signature=$_FILES['signature']['name'];
					if($signature != '') 
					{	
						$rname=rand(111111,999999999);
						$signature='signature'.$rname.$signature;
						$config['upload_path']          = './public/assets/mainpanel/images/signature/';
						$config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|PDF|JPG|PNG|JPEG';
						$config['max_size']             = 500;
						$config['file_name']  = $signature;
						$this->load->library('upload', $config);
						
						if ( ! $this->upload->do_upload('signature'))
						{
							$error = $this->upload->display_errors();
							$flashmsg='<div class="alert alert-danger">
							  <strong>Failed!</strong>'.$error.'
							</div>';
							$this->session->set_flashdata('flashmsg',$flashmsg);
							redirect(base_url().'masters/assessment');
							exit();
						}
					}
				
				
				if($this->assessmentmodel->assessmentedit($id,$signature))
				{
					$msg="<div class='alert alert-success'><strong>Success!</strong> Assessment Data Updated Successfully</div>";
					$this->session->set_flashdata('flashmsg',$msg);
				}
				else{
					$msg="<div class='alert alert-danger'><strong>Failed!</strong> Something went wrong. Please try again.</div>";
					$this->session->set_flashdata('flashmsg',$msg);
				}
				
			}
		}
		redirect(base_url().'masters/assessment');
	}
	
	
	public function edit()
	{
		$id=base64_decode($this->input->post('uid'));
		$alldata=array();
		$data=$this->db->get_where('master_assessment',array('assessment_id'=>$id))->row();
		
		$alldata['id']=base64_encode($data->assessment_id);
		$alldata['dpr']=$data->dpr;
		$alldata['radiovalue']=$data->radiovalue;
		$alldata['assessmentpercent']=$data->assessmentpercent;
		$alldata['checktheortical']=$data->checktheortical;
		$alldata['checkpractical']=$data->checkpractical;
		$alldata['checkaggregate']=$data->checkaggregate;
		$alldata['passingper']=$data->passingper;
		$alldata['theorymax']=$data->theorymax;
		$alldata['practicalmax']=$data->practicalmax;
		$alldata['min_ojt']=$data->min_ojt;
		if($data->signature!='')
		{
			
			$alldata['signature']='<input type="file" class="form-control" name="signature"><a href="'.base_url().'public/assets/mainpanel/images/signature/'.$data->signature.'" target="_blank()"><img src="'.base_url().'public/assets/mainpanel/images/signature/'.$data->signature.'" style="width:180px;" class="img-responsive"></a>';
		}
		else{
			$alldata['signature']='<input type="file" class="form-control" name="signature"><img src="'.base_url().'public/assets/dummy.jpg" style="width:180px;" class="img-responsive">';
		}
		echo json_encode($alldata);
		
	}
	public function delete()
	{
		$uid=$this->uri->segment('4');
		if($this->assessmentmodel->assessmentdelete($uid))
		{
			echo "Y";
		}
	}
	
	/*public function export()
	{
		$this->load->view('export');
	}
	
	public function exportDB()
	{
		$date=date('Y-m-d');
		$file_data = $this->csvimport->get_array($_FILES["csv_file"]["tmp_name"]);
		/*  echo "<pre>-";
		  print_r($file_data);
		   echo "-</pre>"; */
		 /* foreach($file_data as $row)
		  {
			 		//print_r($file_data);	//mylo
			echo $name=$row['DISTRICTNAME'];
			echo $stateid=$row['STATECODE'];
			echo $districtid=$row['DISTRICTCODE'];
			$status=1;
		
			  
			$data[] = array(
				  'NAME' => $name,
				  'STATES_ID'  => $stateid,
				  'DISTRICT_ID'  => $districtid,
				  'STATUS'   => $status,
				  'TIME_STAMP'   => $date
					);
		  }
		
		   
		  $this->db->insert_batch('fddi_district',$data);
	}*/
}
