<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Addagency extends CI_Controller {

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
		 $this->load->model('addagencymodel');
		 $this->load->library('csvimport');
		 
	}
	 
	public function index()
	{
		$this->load->view('inc/topheaderlink');
		$this->load->view('inc/topheader');
		$this->load->view('addagency');
		$this->load->view('sidebar');
		$this->load->view('inc/headersetting');
		$this->load->view('inc/footerlink');
		$this->load->view('inc/table_footer');
	}
	public function create()
	{
		if(isset($_POST['submit'])){
			
			$signature='';
			$id=base64_decode($this->input->post('eid'));
			if($id=='')
			{
				
				if($this->addagencymodel->agencyinsert($signature))
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
				
				if($this->addagencymodel->agencyedit($id))
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
		redirect(base_url().'masters/Addagency');
	}
	
	public function edit()
	{
		$id=base64_decode($this->input->post('uid'));
	    //$id=2;
		$alldata=array();
		$data=$this->db->get_where('master_addagency',array('agency_id'=>$id))->row();
		//$dpr=$this->db->get_where('dpr_create',array('dpr_id'=>$data->dpr))->row('dpr_name');
		$getdistricts=$this->db->order_by('district_name','ASC')->get_where('lgd_districts',array('state_code'=>$data->state));
		
		$alldata['id']=base64_encode($data->agency_id);
		$alldata['dpr']=$data->dpr;
		$alldata['companyname']=$data->companyname;
		$alldata['contactperson']=$data->contactperson;
		$alldata['companyaddress']=$data->companyaddress;
		$alldata['city']=$data->city;
		$alldata['state']=$data->state;
		$alldata['districtid']=$data->district;
		
		foreach($getdistricts->result() as $getdistrict)
		{
			$alldata['district'][]='<option value="'.$getdistrict->district_code.'">'.$getdistrict->district_name.'</option>';
		}
		$alldata['pin']=$data->pin;
		$alldata['email']=$data->email;
		$alldata['contactnumber']=$data->contactnumber;
		
		echo json_encode($alldata);
		
	}
	
	public function delete()
	{
		$uid=$this->uri->segment('4');
		if($this->addagencymodel->agencydelete($uid))
		{
			echo "Y";
		}
	}
	
	
}
