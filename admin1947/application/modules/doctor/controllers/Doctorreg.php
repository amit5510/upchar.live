<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Doctorreg extends CI_Controller 
{

	function __construct() 
	{
		 parent::__construct();
		 date_default_timezone_set("Asia/Kolkata");
		 $date=date('Y-m-d h:i:s');
		 $this->load->model('doctorregmodel');
		 
	}
	 
	function validate_member($str)
	{	
	   $field_value = $str; 
	   $hospital = $this->doctorregmodel->check_doctor(array('EMAIL'=>$field_value));
	   if(is_array($hospital) && !empty($hospital))
	   {
			$this->form_validation->set_message('validate_member','Email Id is alredy Exist!');
			return FALSE ;
	   }
	   else
	   {
			return TRUE;
	   }
	}
	
	public function index()
	{
		$this->form_validation->set_rules('t_fname','First Name','trim|required|max_length[100]');
		$this->form_validation->set_rules('t_lname','Last Name','trim|max_length[100]');
		$this->form_validation->set_rules('gender','Gender','trim|required|max_length[255]');
		$this->form_validation->set_rules('mobile','Mobile No',"trim|numeric|required|max_length[255]|is_unique[doctorlogin.MOBILE='".$this->db->escape_str($this->input->post('mobile'))."' AND status!='2']");
		$this->form_validation->set_rules('email', '"Email Address"','trim|required|valid_email|callback_validate_member');
		$this->form_validation->set_rules('password','Password','trim|required|max_length[20]');
		$this->form_validation->set_rules('city','City','trim|required|max_length[100]');
		$this->form_validation->set_rules('regno','Regno','trim|required|max_length[100]');
		$this->form_validation->set_rules('council','Council','trim|max_length[100]');
		$this->form_validation->set_rules('year','Year','trim|max_length[255]');
		$this->form_validation->set_rules('exprience','Experince','trim|max_length[50]');
		$this->form_validation->set_rules('achievement','Achievement','trim|max_length[255]');
		$this->form_validation->set_rules('qualification[]','Qualification','trim|max_length[100]');
		$this->form_validation->set_rules('specialisation[]','Specialisation','trim|max_length[100]');
		$this->form_validation->set_rules('about','About','trim|max_length[100]');
		$this->form_validation->set_rules('objective[]','Objective','trim|required|max_length[255]');
		if($this->form_validation->run()==TRUE)
		{
			$uploadimage='';
			$id=base64_decode($this->input->post('eid'));
			$bdate=$this->input->post('dob');
			$cdate=date('Y-m-d');
			
			$uploadimage=$_FILES['uploadimage']['name'];
			$extsign = pathinfo($_FILES['uploadimage']['name'],PATHINFO_EXTENSION);
			
			$uploadimage2=$_FILES['idproof']['name'];
			$extsign2 = pathinfo($_FILES['idproof']['name'],PATHINFO_EXTENSION);
			
			$uploadimage3=$_FILES['regproof']['name'];
			$extsign3 = pathinfo($_FILES['regproof']['name'],PATHINFO_EXTENSION);
			
			if($uploadimage != '') 
			{	
				$rname=rand(1111111,999999999);
				$date=date('Y-m-d');
				$uploadimage='dr_profile_pic_'.$rname.$date.'.'.$extsign;
				$rname=rand(1111111,999999999);
				$uploadimage2='dr_id_proof_'.$rname.$date.'.'.$extsign;
				$rname=rand(1111111,999999999);
				$uploadimage3='dr_reg_proof_'.$rname.$date.'.'.$extsign;
				
				$config['upload_path']          = './public/assets/upload/';
				$config['allowed_types'] = 'jpg|png|jpeg|JPG|PNG|JPEG';
				$config['max_size']             = 2048;
				$config['quality'] = '60%';
				$config['file_name']  = $uploadimage;
				$this->load->library('upload', $config);
				
				if ( ! $this->upload->do_upload('uploadimage'))
				{
					$error = $this->upload->display_errors();
					$flashmsg='<div class="alert alert-danger">
					  <strong>Failed!</strong>'.$error.'
					</div>';
					$this->session->set_flashdata('flashmsg',$flashmsg);
					redirect(base_url().'doctor/doctorreg');
					exit();
					
				}
				else{
					
				$config['file_name']  = $uploadimage2;
				$this->load->library('upload', $config);
				$this->upload->do_upload('idproof');
				
				$config['file_name']  = $uploadimage3;
				$this->load->library('upload', $config);
				$this->upload->do_upload('regproof');
				
					
					if($this->doctorregmodel->traineereginsert($uploadimage,$uploadimage2,$uploadimage3)) 
					{
						$msg="<div class='alert alert-success'><strong>Success!</strong> Data Added Successfully </div>";
						$this->session->set_flashdata('flashmsg',$msg);
						redirect(base_url().'doctor/doctorreg');
					}
					else{
						
						$msg="<div class='alert alert-danger'><strong>Failed!</strong> Something went wrong. Please try again. </div>";
						$this->session->set_flashdata('flashmsg',$msg);
						redirect(base_url().'doctor/doctorreg');
					}
				}
			}
		}
		$this->load->view('inc/topheaderlink');
		$this->load->view('inc/topheader');
		$this->load->view('doctorreg');
		$this->load->view('sidebar');
		$this->load->view('inc/headersetting');
		$this->load->view('inc/footerlink');
		$this->load->view('inc/table_footer');
	}
	
	function getobjectivelist(){
		$type=$this->input->post('type');
		if($type=='C')
			$table='clinic';
		else if($type=='H')
			$table='hospital';
		echo "<option value='' > Select ".$table."</option>";
		$clist=$this->db->get_where($table,array('status'=>1));
		foreach(@$clist->result() as $list){
			echo "<option value='".$list->id."' >".$list->name."</option>";
		}				
	}

}
