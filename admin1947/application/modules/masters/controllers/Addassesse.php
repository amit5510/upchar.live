<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Addassesse extends CI_Controller {

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
		
		 $this->load->model('addassessemodel');
	}
	 
	public function index()
	{
		
		$this->load->view('inc/topheaderlink');
		$this->load->view('inc/topheader');
		$this->load->view('addassesse');
		$this->load->view('sidebar');
		$this->load->view('inc/headersetting');
		$this->load->view('inc/footerlink');
		$this->load->view('inc/table_footer');
		
	}
	
	public function create()
	{
		if(isset($_POST['submit']))
		{
			$id=base64_decode($this->input->post('eid'));
			$bdate=$this->input->post('dob');
			$cdate=date('Y-m-d');
			$birth_date=date_create($bdate);
			$current_date=date_create($cdate);
			$diff=date_diff($birth_date,$current_date);
			$checkdate= $diff->format("%y");
			if($checkdate<18)
			{
				$msg="<div class='alert alert-danger'><strong>Failed!</strong> DOB is less than 18 Years</div>";
				$this->session->set_flashdata('flashmsg',$msg);
				redirect(base_url().'masters/addassesse');
				exit();
			}
			
			//insert code
			if($id=='')
			{		
				if($this->addassessemodel->addassessinsert())
				{
					$msg="<div class='alert alert-success'><strong>Success!</strong> Data Inserted Successfully</div>";
					$this->session->set_flashdata('flashmsg',$msg);
				}
				else{
					$msg="<div class='alert alert-danger'><strong>Failed!</strong> Something went wrong. Please try again.</div>";
					$this->session->set_flashdata('flashmsg',$msg);
				}
			}
			else{
					
					if($this->addassessemodel->addassessedit($id))
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
		
		redirect(base_url().'masters/addassesse');
	}
	
	public function edit()
	{
		$id=base64_decode($this->input->post('uid'));
	    //$id=2;
		$alldata=array();
		$data=$this->db->get_where('master_add_assessee',array('id'=>$id))->row();
		//$dpr=$this->db->get_where('dpr_create',array('dpr_id'=>$data->dpr))->row('dpr_name');
		$getdistricts=$this->db->order_by('district_name','ASC')->get_where('lgd_districts',array('state_code'=>$data->state));
		
		$alldata['id']=base64_encode($data->id);
		$alldata['dpr']=$data->dpr;
		$alldata['agencyid']=$data->agency;
		$alldata['assesseename']=$data->name;
		$alldata['aadhar']=$data->aadharnumber;
		$alldata['fname']=$data->fathername;
		$alldata['dob']=$data->dob;
		$alldata['gender']=$data->gender;
		$alldata['category']=$data->category;
		$alldata['religion']=$data->religion;
		$alldata['education']=$data->education;
		$alldata['address']=$data->address;
		$alldata['state']=$data->state;
		$alldata['districtid']=$data->district;
	
		$getagencys=$this->db->select('master_addagency.agency_id,master_addagency.companyname')->order_by('companyname','ASC')->join('dpr_agency','master_addagency.agency_id= dpr_agency.agency_id')->get_where('master_addagency',array('dpr_agency.dpr_id'=>$data->dpr,'status'=>1));
		foreach($getagencys->result() as $getagency)
		{
			$alldata['agency'][]='<option value="'.$getagency->agency_id.'">'.$getagency->companyname.'</option>';
		}
		
		foreach($getdistricts->result() as $getdistrict)
		{
			$alldata['district'][]='<option value="'.$getdistrict->district_code.'">'.$getdistrict->district_name.'</option>';
		}
		$alldata['blockid']=$data->block;
		$getblocks=getBlockList($data->district);
		
		foreach($getblocks as $getblock)
		{
			$alldata['block'][]='<option value="'.$getblock->block_code.'">'.$getblock->block_name.'</option>';
		}
		$alldata['villageid']=$data->village;
		$getvillages=getVillageList($data->block);
		
		foreach($getvillages as $getvillage)
		{
			$alldata['village'][]='<option value="'.$getvillage->village_code.'">'.$getvillage->village_name.'</option>';
		}
		$alldata['pin']=$data->pin;
		$alldata['assesseeemail']=$data->email;
		$alldata['assesseephone']=$data->phone;
		$alldata['assesseemobile']=$data->mobile;
		$alldata['active']=$data->active;
		$alldata['leadassessor']=$data->leadassessor;
		$alldata['assessor']=$data->assessor;
		$alldata['course']=$data->course;
		$alldata['program_name']=$data->program_name;
		$alldata['institute']=$data->institute;
		$alldata['passing_year']=$data->passing_year;
		$alldata['specialization']=$data->specialization;
		$alldata['year']=$data->year;
		
		
		echo json_encode($alldata);
	}
	
	
	public function delete()
	{
		$uid=$this->uri->segment('4');
		if($this->addassessemodel->addassessedelete($uid))
		{
			echo "Y";
		}
	}
	
}
