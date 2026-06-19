<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Traineeupdate extends CI_Controller {

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
		 
		 $this->load->model('traineeupdatemodel');
	}
	 
	public function index()
	{
		$this->load->view('inc/topheaderlink');
		$this->load->view('inc/topheader');
		$this->load->view('traineeupdate');
		$this->load->view('sidebar');
		$this->load->view('inc/headersetting');
		$this->load->view('inc/footerlink');
		$this->load->view('inc/table_footer');
	}
	public function update()
	{
		if(isset($_POST['submit'])){
			$id=base64_decode($this->input->post('eid'));
		if($this->traineeupdatemodel->checkTraineeUpdate($id)){
			
			$uploadimage='';
			
			$bdate=$this->input->post('dob');
			$cdate=date('Y-m-d');
			$birth_date=date_create($bdate);
			$current_date=date_create($cdate);
			$diff=date_diff($birth_date,$current_date);
			$checkdate= $diff->format("%y");
			if($checkdate<18 || $checkdate>35)
			{
				$msg="<div class='alert alert-danger'><strong>Failed!</strong> Age should be in between 18 - 35  Years</div>";
				$this->session->set_flashdata('flashmsg',$msg);
				redirect(base_url().'trainee/traineeupdate');
				exit();
			}
			// update code here
			if($id!='')
			{ 
					$uploadimage=$_FILES['uploadimage']['name'];
					$extsign = pathinfo($_FILES['uploadimage']['name'],PATHINFO_EXTENSION);
					if($uploadimage != '') 
					{	
					    $rname=rand(1111111,999999999);
				    	$date=date('Y-m-d');
					    $uploadimage='traineeregistration'.$rname.$date.'.'.$extsign;
					   
						$config['upload_path']          = './public/assets/mainpanel/images/traineeregistration/';
						$config['allowed_types'] = 'jpg|png|jpeg|JPG|PNG|JPEG';
						$config['max_size']             = 500;
						$config['file_name']  = $uploadimage;
						
						$this->load->library('upload', $config);
						
						if ( ! $this->upload->do_upload('uploadimage'))
						{
							$error = $this->upload->display_errors();
							$flashmsg='<div class="alert alert-danger">
							  <strong>Failed!</strong>'.$error.'
							</div>';
							$this->session->set_flashdata('flashmsg',$flashmsg);
							redirect(base_url().'trainee/traineeupdate');
							exit();
						}
					}
				
				
					if($this->traineeupdatemodel->traineeedit($id,$uploadimage))
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
		else{
				$msg="<div class='alert alert-danger'><strong>RESTRICTED!</strong> Can not Update Trainee!!</div>";
				$this->session->set_flashdata('flashmsg',$msg);
				redirect(base_url().'trainee/traineeupdate');
				exit();
			}
		
		
		}
		
		redirect(base_url().'trainee/traineeupdate');
	}
	
	public function edit()
	{
		$key=trim($this->input->post('key'));
		$searchby=$this->input->post('searchby');
		if($searchby=='uid'){
			$where=array('aadhar'=>$key);
		}
		else if($searchby=='tid'){
			$where=array('id'=>$key);
		}
		
		if($this->session->userdata('code')	=='C' )
			$where['center']=$this->session->userdata('institution_id');
		else if($this->session->userdata('code')	=='SC' )
			$where['subcenter']=$this->session->userdata('institution_id');
		
		$alldata=array();
		$tresult=$this->db->get_where('fddi_trainee_registration',$where);
		$check= $tresult->num_rows();
		if(!$check){
			$alldata['response']='F';
			$alldata['response_msg']='Please Check Search key!No Data Found!';
			echo json_encode($alldata);exit;die;
		}
		
		$data= $tresult->row();
		//$getsubcenters=$this->db->get_where('fddi_subcenter',array('center_id'=>$data->center,'status'=>1));
		$getsubcenters=$this->db->order_by('subcenter_name')->select('fddi_subcenter.subcenter_id, fddi_subcenter.subcenter_name')->join('dpr_subcenter','fddi_subcenter.subcenter_id=dpr_subcenter.subcenter_id')->get_where('fddi_subcenter',array('center_id'=>$data->center,'dpr_id'=>$data->dpr,'fddi_subcenter.subcenter_id'=>$data->subcenter,'active'=>1));
		
		$alldata['eid']=base64_encode($data->id);
		$alldata['dpr']=$data->dpr;
		$alldata['centerid']=$data->center;
		
		//$getcenters=$this->db->get_where('fddi_center',array('dpr'=>$data->dpr,'active'=>1));
		$getcenters=$this->db->order_by('center_name')->select('fddi_center.*, dpr_center.dpr_id')->join('dpr_center','dpr_center.center_id=fddi_center.id')->get_where('fddi_center',array('dpr_id'=>$data->dpr,'fddi_center.id'=>$data->center,'active'=>1));
		foreach($getcenters->result() as $getcenter)
		{
			$alldata['center'][]='<option value="'.$getcenter->id.'">'.$getcenter->center_name.'</option>';
		}
		
		$alldata['subcenterid']=$data->subcenter;
		$alldata['uploaded_image']=$data->uploaded_image;
		foreach($getsubcenters->result() as $getsubcenter)
		{
			$alldata['subcenter'][]='<option value="'.$getsubcenter->subcenter_id.'">'.$getsubcenter->subcenter_name.'</option>';
		}
		$alldata['courseid']=$data->course;
		$getcourses=$this->db->get_where('master_course',array('status'=>1));
		foreach($getcourses->result() as $getcourse)
		{
			$alldata['course'][]='<option value="'.$getcourse->course_id.'">'.$getcourse->course_name.'</option>';
		}
		$alldata['t_fname']=$data->t_first_name;
		$alldata['t_mname']=$data->t_middle_name;
		$alldata['t_lname']=$data->t_last_name;
		$alldata['f_fname']=$data->f_first_name;
		$alldata['f_mname']=$data->f_middle_name;
		$alldata['f_lname']=$data->f_last_name;
		$alldata['f_occupation']=$data->f_occupation;
		$alldata['f_contactno']=$data->f_contactno;
		$alldata['aadhar']=$data->aadhar;
		$alldata['dob']=$data->dob;
		$alldata['category']=$data->category;
		$alldata['religion']=$data->religion;
		$alldata['marital_status']=$data->marital_status;
		$alldata['id_document']=$data->id_document;
		$alldata['document_no']=$data->document_no;
		$alldata['address']=$data->address;
		$alldata['bplnumber']=$data->bplnumber;
		$alldata['bplfield']='<input type="text" class="form-control input-sm" id="bplcode" name="bplcode" value="'.$data->bplnumber.'" data-validation="required" data-validation-error-msg="This Field is required">';
		$alldata['state']=$data->state;
		
		$alldata['districtid']=$data->district;
		$getdistricts=$this->db->order_by('district_name','ASC')->get_where('lgd_districts',array('state_code'=>$data->state));
		
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
		
		$alldata['phone']=$data->phone;
		$alldata['pin']=$data->pin;
		$alldata['email']=$data->email;
		$alldata['mobile']=$data->mobile;
		$alldata['education']=$data->education;
		$alldata['education_stream']=$data->education_stream;
		$alldata['pass_year']=$data->pass_year;
		$alldata['mark_obtain']=$data->mark_obtain;
		$alldata['institute']=$data->institute;
		$alldata['skill']=$data->skill;
		$alldata['active']=$data->active;
		$alldata['gender']=$data->gender;
		$alldata['handicapped']=$data->handicapped;
		$alldata['objective']=$data->objective;
		$alldata['current_employment']=$data->current_employment;
		$alldata['company_address']=$data->company_address;
		$alldata['company_contact']=$data->company_contact;
		$alldata['company_email']=$data->company_email;
		$alldata['t_bankname']=$data->t_bankname;
		$alldata['t_bankbranch']=$data->t_bankbranch;
		$alldata['t_accountno']=$data->t_accountno;
		$alldata['t_ifsccode']=$data->t_ifsccode;
		
		echo json_encode($alldata);
		
	}
	
/* 	public function delete()
	{
		$uid=$this->uri->segment('4');
		if($this->traineeregmodel->dprcreatedelete($uid))
		{
			echo "Y";
		}
	} */
	
	public function search()
	{
		$searchkey=$this->input->post('searchkey');
		$this->db->select('*');
		$this->db->like('t_first_name',$searchkey);
		$this->db->like('t_last_name',$searchkey);
		$this->db->from('fddi_trainee_registration');
		$query=$this->db->get();
		foreach($query->result() as $rowdata)
		{
			echo "<option value='".$rowdata->id.' '.$rowdata->t_first_name.' '.$rowdata->t_middle_name.' '.$rowdata->t_last_name."'>";
		}
	}
}
