<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Other extends CI_Controller {

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

	 // added dpr  in center sub center faculty, agency , 
	 
	function __construct() {
		 parent::__construct();
	}
	 
	public function signout()
	{
		$this->session->sess_destroy();
		redirect(base_url().'login');
	}
	
	/* public function getdistrict()
	{
		$stateid=$this->input->post('stateid');
		$getdistricts=$this->db->get_where('fddi_district',array('STATES_ID'=>$stateid,'STATUS'=>1));
		echo '<option value="">Select District</option>';
		foreach($getdistricts->result() as $getdistrict)
		{
			echo '<option value="'.$getdistrict->DISTRICT_ID.'">'.$getdistrict->NAME.'</option>';
		}
	} */
	
	public function getdistrict()
	{
		$stateid=$this->input->post('stateid');
		$getdistricts=$this->db->order_by('district_name')->get_where('lgd_districts',array('state_code'=>$stateid));
		echo '<option value="">Select District</option>';
		foreach($getdistricts->result() as $getdistrict)
		{
			echo '<option value="'.$getdistrict->district_code.'">'.$getdistrict->district_name.'</option>';
		}
	}
	/* 
	public function getblock()
	{
		$districtid=$this->input->post('districtid');
		$getblocks=$this->db->get_where('fddi_block',array('DISTRICT_ID'=>$districtid,'STATUS'=>1));
		
		echo '<option value="">Select Block</option>';
		
		foreach($getblocks->result() as $getblock)
		{
			echo '<option value="'.$getblock->BLOCK_ID.'">'.$getblock->BLOCK_NAME.'</option>';
		}
	} */
	public function getblock()
	{
		$districtid=$this->input->post('districtid');
		$getblocks=getBlockList($districtid);
		
		echo '<option value="">Select Block</option>';
		
		foreach($getblocks as $getblock)
		{
			echo '<option value="'.$getblock->block_code.'">'.$getblock->block_name.'</option>';
		}
	}
	/* 
	public function getvillage()
	{
		$blockid=$this->input->post('blockid');
		$getvillages=$this->db->get_where('fddi_village',array('BLOCK_ID'=>$blockid,'STATUS'=>1));
		
		echo '<option value="">Select Block</option>';
		
		foreach($getvillages->result() as $getvillage)
		{
			echo '<option value="'.$getvillage->VILLAGE_ID.'">'.$getvillage->VILLAGE_NAME.'</option>';
		}
	}
	 */
	public function getvillage()
	{
		$blockid=$this->input->post('blockid');
		$getvillages=getVillageList($blockid);
		
		echo '<option value="">Select Block</option>';
		
		foreach($getvillages as $getvillage)
		{
			echo '<option value="'.$getvillage->village_code.'">'.$getvillage->village_name.'</option>';
		}
	}
	
	public function getcenter()
	{
		$dprid=$this->input->post('dprid');
		
		if($this->session->userdata('code')	=='C' )
			$this->db->where('fddi_center.id',$this->session->userdata('institution_id'));
		else if($this->session->userdata('code')	=='SC' )
			$this->db->where('subcenter_id',$this->session->userdata('institution_id'))->join('fddi_subcenter','fddi_subcenter.center_id=fddi_center.id');
		else 
			echo '<option value="">Select Center</option>';
		
		$getcenters=$this->db->order_by('center_name')->select('fddi_center.*, dpr_center.dpr_id')->join('dpr_center','dpr_center.center_id=fddi_center.id')->get_where('fddi_center',array('dpr_id'=>$dprid,'fddi_center.active'=>1));
		
		foreach($getcenters->result() as $getcenter)
		{
			echo '<option value="'.$getcenter->id.'">'.$getcenter->center_name.'</option>';
		}
	}
	
	public function getagency()
	{
		$dpr=$this->input->post('dpr');
		$courseid=$this->input->post('courseid');
		$subcenterid=$this->input->post('subcenterid');
		//$dprid=$this->db->get_where('fddi_subcenter',array('subcenter_id'=>$subcenterid))->row('dpr');
		$getagencys=$this->db->order_by('companyname')->select('master_addagency.agency_id, master_addagency.companyname')->join('dpr_agency','master_addagency.agency_id=dpr_agency.agency_id')->get_where('master_addagency',array('dpr_id'=>$dpr,'master_addagency.status'=>1));
		echo '<option value="">Select Agency</option>';
		foreach($getagencys->result() as $getagency)
		{
			echo '<option value="'.$getagency->agency_id.'" data-course="'.$courseid.'">'.$getagency->companyname.'</option>';
		}
	}
	
	public function getassessagency()
	{
		$dprid=$this->input->post('dprid');
		$getagencys=$this->db->select('master_addagency.*, dpr_agency.dpr_id')->order_by('companyname')->join('dpr_agency','dpr_agency.agency_id=master_addagency.agency_id')->get_where('master_addagency',array('dpr_id'=>$dprid,'master_addagency.status'=>1));
		echo '<option value="">Select Agency</option>';
		foreach($getagencys->result() as $getagency)
		{
			echo '<option value="'.$getagency->agency_id.'">'.$getagency->companyname.'</option>';
		}
	}
	
	public function getsubcenter()
	{
		$centerid=$this->input->post('centerid');
		$dpr=$this->input->post('dpr');
		if($this->session->userdata('code')	=='C' )
			$this->db->where('center_id',$this->session->userdata('institution_id'));
		else if($this->session->userdata('code')	=='SC' )
			$this->db->where('fddi_subcenter.subcenter_id',$this->session->userdata('institution_id'));
		else 
			echo '<option value="">Select Sub Center</option>';
		
		
		$getsubcenters=$this->db->order_by('subcenter_name')->select('fddi_subcenter.subcenter_id, fddi_subcenter.subcenter_name')->join('dpr_subcenter','fddi_subcenter.subcenter_id=dpr_subcenter.subcenter_id')->get_where('fddi_subcenter',array('fddi_subcenter.center_id'=>$centerid,'dpr_id'=>$dpr,'active'=>1));
		
		foreach($getsubcenters->result() as $getsubcenter)
		{
			echo '<option value="'.$getsubcenter->subcenter_id.'">'.$getsubcenter->subcenter_name.'</option>';
		}
	}
	
	public function getfaculty()
	{
		$courseid=$this->input->post('courseid');
		$subcenterid=$this->input->post('subcenterid');
		$dpr=$this->input->post('dpr');
		
		
		$centerid=$this->db->get_where('fddi_subcenter',array('subcenter_id'=>$subcenterid))->row('center_id');
		$getfacultys=$this->db->order_by('name')->select('fddi_faculty_reg.faculty_id, fddi_faculty_reg.name,fddi_faculty_reg.course')->join('dpr_faculty','fddi_faculty_reg.faculty_id=dpr_faculty.faculty_id')->get_where('fddi_faculty_reg',array('dpr_id'=>$dpr,'center'=>$centerid,'fddi_faculty_reg.active'=>1));
		echo '<option value="">Select Faculty</option>';
		foreach($getfacultys->result() as $getfaculty)
		{
			$course=$getfaculty->course;
			$course=explode(',',$course);
			if (in_array($courseid, $course))
			{
			  echo '<option value="'.$getfaculty->faculty_id.'" data-fac="'.$getfaculty->name.'">'.$getfaculty->name.'</option>';
			}
			
		}
	}
	
	public function checkfaculty()
	{
		//$date=date('Y-m-d');
		$sdate=$this->input->post('sdate');
		$edate=$this->input->post('edate');
		$facultyid=$this->input->post('facultyid');
		$facultyname=$this->input->post('facultyname');
		
		
		$max_batch_faculty =  $this->db->get_where('setting_master',array('id'=>'1'))->row('value');
		//$this->db->where("( (startdate BETWEEN '$sdate' AND '$edate' ) OR (enddate   BETWEEN '$sdate' AND '$edate') )");
		$this->db->where("(startdate <= '$edate' AND enddate >='$edate' )");
		$result = $this->db->get_where('fddi_batch',array('faculty'=>$facultyid));
		//echo $this->db->last_query();
		$count = $result->num_rows();
		//$enddate=$this->db->order_by('enddate','DESC')->get_where('fddi_batch',array('faculty'=>$facultyid))->row('enddate');
		//$batchname=$this->db->order_by('enddate','DESC')->get_where('fddi_batch',array('faculty'=>$facultyid))->row('batchname');
		//$endate=strtotime($enddate);
		//$cdate=strtotime($date);
		if($count >= $max_batch_faculty)
		{
			echo "Mr/Ms. $facultyname is already allocated $count batch(es) during $sdate - $edate!";
		}
		else{
			echo "N";
		}

	}
	
	public function getassessee()
	{
		$dpr=$this->input->post('dpr');
		$agencyid=$this->input->post('agencyid');
		$courseid=$this->input->post('courseid');
		$getassesses=$this->db->order_by('name')->select('master_add_assessee.id, master_add_assessee.name, master_add_assessee.course')->join('dpr_assessee','master_add_assessee.id=dpr_assessee.assessee_id')->get_where('master_add_assessee',array('dpr_id'=>$dpr,'agency'=>$agencyid,'active'=>1));
		echo '<option value="">Select Assessee</option>';
		foreach($getassesses->result() as $getassesse)
		{
			$course=$getassesse->course;
			$course=explode(',',$course);
			if (in_array($courseid, $course))
			{
				echo '<option value="'.$getassesse->id.'">'.$getassesse->name.'</option>';
			}
		}
	}
	
	public function getcourse()
	{
		$subcenterid=$this->input->post('subcenterid');
		$dpr=$this->input->post('dpr');
		if($subcenterid!="")
		{
			/* if($this->session->userdata('code')	=='C' )
				$this->db->where('center_id',$this->session->userdata('institution_id'));
			else if($this->session->userdata('code')	=='SC' )
				$this->db->where('subcenter_id',$this->session->userdata('institution_id'));
			else  */
				echo '<option value="">Select Course</option>';
			
			$subcentercourse=$this->db->get_where('dpr_subcenter',array('subcenter_id'=>$subcenterid,'dpr_id'=>$dpr))->row('course');
			$coursearray=explode(",",$subcentercourse);
			
			foreach($coursearray as $coursevalue)
			{
				$getcourses=$this->db->get_where('master_course',array('status'=>1,'course_id'=>$coursevalue));
				foreach($getcourses->result() as $coursedata)
				{
					echo '<option value="'.$coursedata->course_id.'" data-uid="'.$subcenterid.'">'.$coursedata->course_name.'</option>';
				}
			}
		}
	}
	
	public function getbatch()
	{
		$courseid=$this->input->post('courseid');
		$subid=$this->input->post('subid');
		$dpr=$this->input->post('dpr');
		
		
		if($this->session->userdata('code')	=='C' )
			$this->db->where('center',$this->session->userdata('institution_id'));
		else if($this->session->userdata('code')	=='SC' )
			$this->db->where('subcenter',$this->session->userdata('institution_id'));
		else
			echo '<option value="">Select Batch</option>';
		
			$getbatches=$this->db->get_where('fddi_batch',array('dpr'=>$dpr,'subcenter'=>$subid,'course'=>$courseid,'status'=>1));
			
			foreach($getbatches->result() as $getbatch)
			{
				echo '<option value="'.$getbatch->batch_id.'">'.$getbatch->batchname.'</option>';
			}
		
	}
	
	public function gettrainee()
	{
		
		$courseid=$this->input->post('courseid');
		$subcenter=$this->input->post('subcenter');
		$dpr=$this->input->post('dpr');
		$this->db->where('subcenter',$subcenter);
		$this->db->where('course',$courseid);
		$this->db->where('dpr',$dpr);
		
		$this->db->select('fddi_trainee_registration.id,t_first_name,t_last_name');
		
		
		$this->db->where('fddi_trainee_batch.trainee_id IS NULL');
		$this->db->join('fddi_trainee_batch','fddi_trainee_registration.id = fddi_trainee_batch.trainee_id','left');
		$gettrainees=$this->db->get_where('fddi_trainee_registration',array('active'=>1));
		
		$batchlimit =  $this->db->where('dpr',$dpr)->get('master_training_duration')->row('batchlimit');
		/* $courseid=$this->input->post('courseid');
		$gettrainees=$this->db->get_where('fddi_trainee_registration',array('course'=>$courseid,'active'=>1)); */
		$i=0;$selected=' selected ';
		foreach($gettrainees->result() as $gettrainee)
		{
			$i++;
			
			echo '<option value="'.$gettrainee->id.'" '.$selected.'>'.$gettrainee->t_first_name.' '.$gettrainee->t_last_name.' ('.$gettrainee->id.')</option>';
			if($i==$batchlimit){
				break;
				$selected='';
			}
		}
		
	}
	
	public function getalltraineeplacment()
	{
		
		$courseid=$this->input->post('courseid');
		$subcenter=$this->input->post('subcenter');
		$dpr=$this->input->post('dpr');
		$batch=$this->input->post('batch');
		
		$min_ojt_hr=getMinOJT($dpr);
		
		$this->db->where('fddi_trainee_batch.batch_id',$batch);
		$this->db->where('fddi_trainee_registration.subcenter',$subcenter);
		$this->db->where('fddi_trainee_registration.course',$courseid);
		$this->db->where('fddi_trainee_registration.dpr',$dpr);
		$this->db->where("fddi_trainee_registration.industrial_attendance >= $min_ojt_hr");
		$this->db->where('placement_details.trainee_id IS NULL');
		
		$this->db->select('fddi_trainee_registration.id,t_first_name,t_last_name');
		
		$this->db->join('placement_details',"fddi_trainee_registration.id = placement_details.trainee_id",'left');
		$this->db->join('trainee_result',"fddi_trainee_registration.id = trainee_result.trainee_id AND trainee_result.result='PASS'");
		$this->db->join('fddi_trainee_batch','fddi_trainee_registration.id = fddi_trainee_batch.trainee_id');
		$gettrainees=$this->db->get_where('fddi_trainee_registration',array('active'=>1));
		
		
		foreach($gettrainees->result() as $gettrainee)
		{
			echo '<option value="'.$gettrainee->id.'" >'.$gettrainee->t_first_name.' '.$gettrainee->t_last_name.' ('.$gettrainee->id.')</option>';
		}
		
	}
	
	public function getalltrainee()
	{
		
		$courseid=$this->input->post('courseid');
		$subcenter=$this->input->post('subcenter');
		$dpr=$this->input->post('dpr');
		$batch=$this->input->post('batch');
		
		$this->db->where('fddi_trainee_batch.batch_id',$batch);
		$this->db->where('subcenter',$subcenter);
		$this->db->where('course',$courseid);
		$this->db->where('dpr',$dpr);
		
		$this->db->select('fddi_trainee_registration.id,t_first_name,t_last_name');
		
		
		
		$this->db->join('fddi_trainee_batch','fddi_trainee_registration.id = fddi_trainee_batch.trainee_id');
		$gettrainees=$this->db->get_where('fddi_trainee_registration',array('active'=>1));
		
		
		foreach($gettrainees->result() as $gettrainee)
		{
			echo '<option value="'.$gettrainee->id.'" >'.$gettrainee->t_first_name.' '.$gettrainee->t_last_name.' ('.$gettrainee->id.')</option>';
		}
		
	}
	
	public function getindusattendance()
	{
			$vid=$this->input->post('vid');
			$subcenterid=$this->input->post('subcenterid');
			$type=$this->input->post('type');
			$dpr=$this->input->post('dpr');
			$lists="";
			//$getbatches=$this->db->get_where('fddi_batch',array('batch_id'=>$vid,'status'=>1))->row();
			//$traineelists=unserialize($getbatches->trainee);
			if($type=='batch')
			{
				$traineelists=$this->db->get_where('fddi_trainee_batch',array('batch_id'=>$vid))->result();
			}
			else if($type=='subcenter')
			{
				$traineelists=$this->db->get_where('fddi_trainee_registration',array('subcenter'=>$vid,'dpr'=>$dpr))->result();
				
			}
			else if($type=='course')
			{
				$traineelists=$this->db->get_where('fddi_trainee_registration',array('course'=>$vid,'subcenter'=>$subcenterid,'dpr'=>$dpr))->result();
			}
			
			foreach($traineelists as $traineelist)
			{	
				if($type=='batch'){
					$gettrainees=$this->db->get_where('fddi_trainee_registration',array('id'=>$traineelist->trainee_id))->row();
				}
				if($type=='subcenter'){
					$gettrainees=$this->db->get_where('fddi_trainee_registration',array('id'=>$traineelist->id))->row();
				}
				if($type=='course'){
					$gettrainees=$this->db->get_where('fddi_trainee_registration',array('id'=>$traineelist->id))->row();
				}
				$dpr=$this->db->get_where('dpr_create',array('dpr_id'=>$gettrainees->dpr))->row('dpr_name');
				$center=$this->db->get_where('fddi_center',array('id'=>$gettrainees->center))->row('center_name');
				$subcenter=$this->db->get_where('fddi_subcenter',array('subcenter_id'=>$gettrainees->subcenter))->row('subcenter_name');
				$course=$this->db->get_where('master_course',array('course_id'=>$gettrainees->course))->row('course_name');
				
				$lists.='<tr class="active">
					<td class="tabledata">'.$gettrainees->id.'</td>
					<td class="tabledata">'.$gettrainees->t_first_name.'</td>
					<td class="tabledata">'.$gettrainees->f_first_name.'</td>
					<td class="tabledata">'.$gettrainees->dob.'</td>
					<td class="tabledata">'.$gettrainees->address.'</td>
					<td class="tabledata">'.$gettrainees->aadhar.'</td>
					<td class="tabledata">'.$dpr.'</td>
					<td class="tabledata">'.$center.'</td>
					<td class="tabledata">'.$subcenter.'</td>
					<td class="tabledata">'.$course.'</td>
					<td class="tabledata"><a href="'.base_url().'attendance/industrial/industrialdetails/'.$gettrainees->id.'" target="_blank()" style="cursor:pointer" class="showdetails">Show</a></td>
					
				</tr>';
			}
			echo $lists;
		
	}
	
	public function getcenterattendance()
	{
			$vid=$this->input->post('vid');
			$subcenterid=$this->input->post('subcenterid');
			$type=$this->input->post('type');
			$dpr=$this->input->post('dpr');
			$lists="";
			//$getbatches=$this->db->get_where('fddi_batch',array('batch_id'=>$vid,'status'=>1))->row();
			//$traineelists=unserialize($getbatches->trainee);
			if($type=='batch')
			{
				$traineelists=$this->db->get_where('fddi_trainee_batch',array('batch_id'=>$vid))->result();
			}
			else if($type=='subcenter')
			{
				$traineelists=$this->db->get_where('fddi_trainee_registration',array('subcenter'=>$vid,'dpr'=>$dpr))->result();
				
			}
			else if($type=='course')
			{
				$traineelists=$this->db->get_where('fddi_trainee_registration',array('course'=>$vid,'subcenter'=>$subcenterid,'dpr'=>$dpr))->result();
			}
			
			foreach($traineelists as $traineelist)
			{	
				if($type=='batch'){
					$gettrainees=$this->db->get_where('fddi_trainee_registration',array('id'=>$traineelist->trainee_id))->row();
				}
				if($type=='subcenter'){
					$gettrainees=$this->db->get_where('fddi_trainee_registration',array('id'=>$traineelist->id))->row();
				}
				if($type=='course'){
					$gettrainees=$this->db->get_where('fddi_trainee_registration',array('id'=>$traineelist->id))->row();
				}
				$dpr=$this->db->get_where('dpr_create',array('dpr_id'=>$gettrainees->dpr))->row('dpr_name');
				$center=$this->db->get_where('fddi_center',array('id'=>$gettrainees->center))->row('center_name');
				$subcenter=$this->db->get_where('fddi_subcenter',array('subcenter_id'=>$gettrainees->subcenter))->row('subcenter_name');
				$course=$this->db->get_where('master_course',array('course_id'=>$gettrainees->course))->row('course_name');
				
				$lists.='<tr class="active">
					<td class="tabledata">'.$gettrainees->id.'</td>
					<td class="tabledata">'.$gettrainees->t_first_name.'</td>
					<td class="tabledata">'.$gettrainees->f_first_name.'</td>
					<td class="tabledata">'.$gettrainees->dob.'</td>
					<td class="tabledata">'.$gettrainees->address.'</td>
					<td class="tabledata">'.$gettrainees->aadhar.'</td>
					<td class="tabledata">'.$dpr.'</td>
					<td class="tabledata">'.$center.'</td>
					<td class="tabledata">'.$subcenter.'</td>
					<td class="tabledata">'.$course.'</td>
					<td class="tabledata"><a href="'.base_url().'attendance/center/centerdetails/'.$gettrainees->id.'" target="_blank()" style="cursor:pointer" class="showdetails">Show</a></td>
					
				</tr>';
			}
			echo $lists;
		
	}
	
	public function getresbatch()
	{
			$subcenterid=$this->input->post('subcenterid');
		
			$getbatches=$this->db->get_where('fddi_batch',array('subcenter'=>$subcenterid,'status'=>1));
			echo '<option value="">Select Batch</option>';
			foreach($getbatches->result() as $getbatch)
			{
				echo '<option value="'.$getbatch->batch_id.'">'.$getbatch->batchname.'</option>';
			}
	}
	
	public function gettraineeallotment()
	{
		$dprid=$this->input->post('dprid');
		$approved_trainee=$this->db->select('approved_trainee')->get_where('dpr_create',array('dpr_id'=>$dprid))->row('approved_trainee');
		$alloted_trainee=$this->db->select('sum(trainee_limit) as alloted_trainee')->group_by('dpr_id')->get_where('dpr_allotment',array('dpr_id'=>$dprid))->row('alloted_trainee');
		$alloted_trainee = ($alloted_trainee) ? $alloted_trainee : 0;
		$remaining_trainee = $approved_trainee - $alloted_trainee;
		$gettraineeallotments=$this->db->order_by('allotment_id','DESC')->get_where('dpr_allotment',array('dpr_id'=>$dprid));

		$table='<div class="row">
				<div class="col-md-4 allotment">
					<h5 class="allotmenthead">Approved Trainees:&emsp;'.$approved_trainee.'</h5>
				</div>
				<div class="col-md-4 allotment">
					<h5 class="allotmenthead">Allotted Trainees:&emsp;'.$alloted_trainee.'</h5>
				</div>
				<div class="col-md-4 allotment">
					<h5 class="allotmenthead">Remaining Trainees:&emsp;'.$remaining_trainee.'</h5>
				</div>
			</div>
			<hr style="border-top:1px solid #e4e2e2">
			<table class="table table-bordered" id="mydata" style="border:none;">
			<thead>
			  <tr>
				<th class="tableheaddata">Center ID</th>
				<th class="tableheaddata">Center Name</th>
				<th class="tableheaddata">Trainee Limit</th>
				<th class="tableheaddata">Select</th>
				<th class="tableheaddata">Delete</th>
			  </tr>
			</thead>
			<tbody>';
		foreach($gettraineeallotments->result() as $gettraineeallotment)
		{
			$center=$this->db->get_where('fddi_center',array('id'=>$gettraineeallotment->center_id))->row('center_name');
			
			$table.='<tr class="active" id="r_'.$gettraineeallotment->allotment_id.'">
				<td class="tabledata">'.$gettraineeallotment->allotment_id.'</td>
				<td class="tabledata">'.$center.'</td>
				<td class="tabledata">'.$gettraineeallotment->trainee_limit.'</td>
				<td class="tabledata"><a href="#" style="cursor:pointer" class="select" data-uid="'.base64_encode($gettraineeallotment->allotment_id).'">Select</a></td>
				<td class="tabledata"><a href="#" style="cursor:pointer" class="delete" data-uid="'.$gettraineeallotment->allotment_id.'">Delete</a></td>
			  </tr>';
		}
		$table.='</tbody>
		  </table>';
		  echo $table;
	}
	
	public function test(){
		$this->load->library('fddi_lib');
		$this->fddi_lib->sendMail('azadhussain16@yahoo.in','Welcome To FDDI Development ','Hello how are you , This is to inform you that your cent has been enrolled successfully and your user name and password is 23456789',$variables=array(),$attachment='');
		
	}
	
	public function getfacultyview()
	{
			$vid=$this->input->post('vid');
			$dpr=$this->input->post('dpr');
			$type=$this->input->post('type');
			$lists="";
			if($type=='dpr')
			{ 
				$getlists=$this->db->select('fddi_faculty_reg.*,dpr_faculty.dpr_id')->join('dpr_faculty','fddi_faculty_reg.faculty_id=dpr_faculty.faculty_id')->get_where('fddi_faculty_reg',array('dpr_id'=>$vid));
				//$getlists=$this->db->get_where('fddi_faculty_reg',array('dpr'=>$vid)); 
			}
			else if($type=='center')
			{ 
				$getlists=$this->db->select('fddi_faculty_reg.*,dpr_faculty.dpr_id')->join('dpr_faculty','fddi_faculty_reg.faculty_id=dpr_faculty.faculty_id')->get_where('fddi_faculty_reg',array('dpr_id'=>$dpr,'center'=>$vid));
				//$getlists=$this->db->get_where('fddi_faculty_reg',array('center'=>$vid)); 
			}
			foreach($getlists->result() as $rowdata){
				
			$dpr=$this->db->get_where('dpr_create',array('dpr_id'=>$rowdata->dpr_id))->row('dpr_name');
			$center=$this->db->get_where('fddi_center',array('id'=>$rowdata->center))->row('center_name');
			
			if($rowdata->active==1)
			{
				$status='<p style="color:green;font-size:14px;">Acive</p>';
			}
			else{
				$status='<p style="color:red;font-size:14px;">In-Acive</p>';
			}
			
				$lists.=' <tr class="active">
							<td class="tabledata">'.$dpr.'</td>
							<td class="tabledata">'.$rowdata->name.'</td>
							<td class="tabledata">'.$rowdata->aadharnumber.'</td>
							<td class="tabledata">'.$center.'</td>
							<td class="tabledata">'.$rowdata->mobile.'</td>
							<td class="tabledata">'.$rowdata->email.'</td>
							<td class="tabledata">'.$status.'</td>
							<td class="tabledata"><a href="#" style="cursor:pointer" class="select" data-uid="'.base64_encode($rowdata->faculty_id).'">Select</a></td>
							
							<td class="tabledata"><a href="#" style="cursor:pointer" class="delete" data-uid="'.$rowdata->faculty_id.'">Delete</a></td>
						  </tr>';
			}
			echo $lists;
		
	}
	
	public function getbatchview()
	{
			$vid=$this->input->post('vid');
			$type=$this->input->post('type');
			$lists="";
			if($type=='dpr')
			{ $getlists=$this->db->get_where('fddi_batch',array('dpr'=>$vid)); }
			else if($type=='center')
			{ $getlists=$this->db->get_where('fddi_batch',array('center'=>$vid)); }
			else if($type=='subcenter')
			{ $getlists=$this->db->get_where('fddi_batch',array('subcenter'=>$vid)); }
					
					foreach($getlists->result() as $rowdata){
					
					$center=$this->db->get_where('fddi_center',array('id'=>$rowdata->center))->row('center_name');
					$subcentercenter=$this->db->get_where('fddi_subcenter',array('subcenter_id'=>$rowdata->subcenter))->row('subcenter_name');
					$coursename=$this->db->get_where('master_course',array('course_id'=>$rowdata->course))->row('course_name');
					$agency=$this->db->get_where('master_addagency',array('agency_id'=>$rowdata->agency))->row('companyname');
					if($rowdata->approval=='P')
					{
						$approval="<p style='color:#d88d18;font-size:15px;'>Pending</p>";
					}
					else if($rowdata->approval=='A')
					{
						$approval="<p style='color:#1db740;font-size:15px;'>Approved</p>";
					}
					else if($rowdata->approval=='R')
					{
						$approval="<p style='color:#de0606;font-size:15px;'>Reject</p>";
					}
					$trainee=$this->db->where('batch_id',$rowdata->batch_id)->count_all_results('fddi_trainee_batch');
				$actions='';
				
				if(getUserType()=='MA')
					$actions.='<a href="#" style="cursor:pointer" class="approve" data-uid="'.$rowdata->batch_id.'">Approve</a> | <a href="#" style="cursor:pointer" class="reject" data-uid="'.$rowdata->batch_id.'">Reject</a> | <a href="#" style="cursor:pointer" class="delete" data-uid="'.$rowdata->batch_id.'">Delete</a>';
				if(getUserType()=='C')
					$actions.=' <a href="#" style="cursor:pointer" class="delete" data-uid="'.$rowdata->batch_id.'">Delete</a>';
				
			
				$lists.=' <tr class="active" id="r_'.$rowdata->batch_id.'">
					<td class="tabledata">'.$rowdata->batch_id.'</td>
					<td class="tabledata">'.$rowdata->batchname.'</td>
					<td class="tabledata">'.$rowdata->batchlimit.'</td>
					<td class="tabledata">'.$rowdata->startdate.'</td>
					<td class="tabledata">'.$rowdata->enddate.'</td>
					<td class="tabledata">'.$center.'</td>
					<td class="tabledata">'.$subcentercenter.'</td>
					<td class="tabledata">'.$coursename.'</td>
					<td class="tabledata">'.$trainee.'</td>
					<td class="tabledata">'.$approval.'</td>
					<td class="tabledata">'.$agency.'</td>
					<td class="tabledata">'.$rowdata->assessmentdate.'</td>
					<td class="tabledata"><a href="#" style="cursor:pointer" class="select" data-uid="'.base64_encode($rowdata->batch_id).'">Select</a></td>
					
					<td class="tabledata">'.$actions.'</td>
				  </tr>';
			}
			echo $lists;
	}
	
	public function getcenterview()
	{
			$vid=$this->input->post('vid');
			$type=$this->input->post('type');
			$lists="";
			if($type=='dpr')
			{ 
				$getlists=$this->db->select('fddi_center.*,dpr_center.dpr_id')->join('dpr_center','fddi_center.id=dpr_center.center_id')->get_where('fddi_center',array('dpr_id'=>$vid));
				//$getlists=$this->db->get_where('fddi_center',array('dpr'=>$vid)); 
			}
		
				foreach($getlists->result() as $rowdata){
			
				$statename=$this->db->get_where('lgd_states',array('state_code'=>$rowdata->center_state))->row('state_name');
				$districtname=$this->db->get_where('lgd_districts',array('district_code'=>$rowdata->center_district))->row('district_name');
						
			
				$lists.=' <tr class="active">
					<td class="tabledata">'.$rowdata->id.'</td>
					<td class="tabledata">'.$rowdata->center_name.'</td>
					<td class="tabledata">'.$rowdata->address.'</td>
					<td class="tabledata">'.$statename.'</td>
					<td class="tabledata">'.$districtname.'</td>
					<td class="tabledata">'.$rowdata->create_date.'</td>
					<!--<td class="tabledata"><?=$rowdata->pin;?></td>-->
					<td class="tabledata">'.$rowdata->inchargename.'</td>
					<td class="tabledata">'.$rowdata->contactnumber.'</td>
					<td class="tabledata">'.$rowdata->email.'</td>
					<!--<td class="tabledata"><?=$rowdata->signature;?></td>-->
					<td class="tabledata"><a href="#" style="cursor:pointer" class="select" data-uid="'.base64_encode($rowdata->id).'">Select</a></td>
					
					<td class="tabledata"><a href="#" style="cursor:pointer" class="delete" data-uid="'.$rowdata->id.'">Delete</a></td>
				  </tr>';
			}
			echo $lists;
		
	}
	
	public function getsubcenterview()
	{
			$vid=$this->input->post('vid');
			$dpr=$this->input->post('dpr');
			$type=$this->input->post('type');
			$lists="";
			
			if($type=='dpr')
			{ 
				$getlists=$this->db->select('fddi_subcenter.*,dpr_subcenter.dpr_id')->join('dpr_subcenter','fddi_subcenter.subcenter_id=dpr_subcenter.subcenter_id')->get_where('fddi_subcenter',array('dpr_id'=>$vid));
				//$getlists=$this->db->get_where('fddi_subcenter',array('dpr'=>$vid));
			}
			else if($type=='center')
			{ 
				$getlists=$this->db->select('fddi_subcenter.*,dpr_subcenter.dpr_id')->join('dpr_subcenter','fddi_subcenter.subcenter_id=dpr_subcenter.subcenter_id')->get_where('fddi_subcenter',array('dpr_id'=>$dpr,'center_id'=>$vid));
				//$getlists=$this->db->get_where('fddi_subcenter',array('center_id'=>$vid)); 
			}
			
			
				foreach($getlists->result() as $rowdata){
			
				$statename=$this->db->get_where('lgd_states',array('state_code'=>$rowdata->subcenter_state))->row('state_name');
				$districtname=$this->db->get_where('lgd_districts',array('district_code'=>$rowdata->subcenter_district))->row('district_name');
						
			
				$lists.='  <tr class="active">
						<td class="tabledata">'.$rowdata->subcenter_id.'</td>
						<td class="tabledata">'.$rowdata->subcenter_name.'</td>
						<td class="tabledata">'.$rowdata->subcenter_address.'</td>
						<td class="tabledata">'.$statename.'</td>
						<td class="tabledata">'.$districtname.'</td>
						<td class="tabledata">'.$rowdata->pin.'</td>
						<td class="tabledata">'.$rowdata->created_date.'</td>
						<td class="tabledata">'.$rowdata->device_imei.'</td>
						<td class="tabledata"><a href="#" style="cursor:pointer" class="select" data-uid="'.base64_encode($rowdata->subcenter_id).'">Select</a></td>
						
						<td class="tabledata"><a href="#" style="cursor:pointer" class="delete" data-uid="'.$rowdata->subcenter_id.'">Delete</a></td>
					  </tr>';
			}
			echo $lists;
		
	}
	
	public function getagencyview()
	{
			$vid=$this->input->post('vid');
			$type=$this->input->post('type');
			$lists="";
			
			if($type=='dpr')
			{ 
				$getlists=$this->db->select('*')->join('dpr_agency','master_addagency.agency_id=dpr_agency.agency_id')->get_where('master_addagency',array('dpr_agency.dpr_id'=>$vid));
			}
			
			
				foreach($getlists->result() as $rowdata){
			
				$statename=$this->db->get_where('lgd_states',array('state_code'=>$rowdata->state))->row('state_name');
				$districtname=$this->db->get_where('lgd_districts',array('district_code'=>$rowdata->district))->row('district_name');
				$dprname=$this->db->get_where('dpr_create',array('dpr_id'=>$rowdata->dpr_id))->row('dpr_name');
						
			
				$lists.='<tr class="active">
					<td class="tabledata">'.$dprname.'</td>
					<td class="tabledata">'.$rowdata->companyname.'</td>
					<td class="tabledata">'.$rowdata->contactperson.'</td>
					<td class="tabledata">'.$statename.'</td>
					<td class="tabledata">'.$districtname.'</td>
					<td class="tabledata">'.$rowdata->pin.'</td>
					<td class="tabledata">'.$rowdata->contactnumber.'</td>
					<td class="tabledata">'.$rowdata->email.'</td>
					<td class="tabledata">'.$rowdata->city.'</td>
					<td class="tabledata"><a href="#" style="cursor:pointer" class="select" data-uid="'.base64_encode($rowdata->agency_id).'">Select</a></td>
					<td class="tabledata"><a href="#" style="cursor:pointer" class="delete" data-uid="'.$rowdata->agency_id.'">Delete</a></td>
				  </tr>';
			}
			echo $lists;
		
	}
	
	public function getassagency()
	{
		$dpr=$this->input->post('dprid');
		$getagencys=$this->db->order_by('companyname')->select('master_addagency.agency_id, master_addagency.companyname')->join('dpr_agency','master_addagency.agency_id=dpr_agency.agency_id')->get_where('master_addagency',array('dpr_id'=>$dpr));
		echo '<option value="">Select Agency</option>';
		foreach($getagencys->result() as $getagency)
		{
			echo '<option value="'.$getagency->agency_id.'">'.$getagency->companyname.'</option>';
		}
	}
	
	public function getassesseview()
	{
			$vid=$this->input->post('vid');
			$dpr=$this->input->post('dpr');
			$type=$this->input->post('type');
			$lists="";
			
			
			if($type=='dpr')
			{ 
				$getlists=$this->db->select('master_add_assessee.*,dpr_assessee.dpr_id')->join('dpr_assessee','master_add_assessee.agency=dpr_assessee.assessee_id')->get_where('master_add_assessee',array('dpr_assessee.dpr_id'=>$dpr));
			}
			else if($type=='agency')
			{ 
				$getlists=$this->db->select('master_add_assessee.*,dpr_assessee.dpr_id')->join('dpr_assessee','master_add_assessee.agency=dpr_assessee.assessee_id')->get_where('master_add_assessee',array('dpr_assessee.dpr_id'=>$dpr,'master_add_assessee.agency'=>$vid));
			}
			
			
				foreach($getlists->result() as $rowdata){
			
					$dpr=$this->db->get_where('dpr_create',array('dpr_id'=>$rowdata->dpr_id))->row('dpr_name');
					$agency=$this->db->get_where('master_addagency',array('agency_id'=>$rowdata->agency))->row('companyname');
					$state=$this->db->get_where('lgd_states',array('state_code'=>$rowdata->state))->row('state_name');
					if($rowdata->active==1)
					{
						$status='<p style="color:green;font-size:14px;">Active</p>';
					}
					else{
						$status='<p style="color:red;font-size:14px;">In-Active</p>';
					}
						
			
				$lists.='<tr class="active">
							<td class="tabledata">'.$dpr.'</td>
							<td class="tabledata">'.$agency.'</td>
							<td class="tabledata">'.$rowdata->name.'</td>
							<td class="tabledata">'.$rowdata->aadharnumber.'</td>
							<td class="tabledata">'.$rowdata->email.'</td>
							<td class="tabledata">'.$rowdata->mobile.'</td>
							<td class="tabledata">'.$state.'</td>
							<td class="tabledata">'.$status.'</td>
							<td class="tabledata"><a href="#" style="cursor:pointer" class="select" data-uid="'.base64_encode($rowdata->id).'">Select</a></td>
							
							<td class="tabledata"><a href="#" style="cursor:pointer" class="delete" data-uid="'.$rowdata->id.'">Delete</a></td>
						  </tr>';
			}
			echo $lists;
		
	}
	
	
	public function getcompanyview()
	{
			$vid=$this->input->post('vid');
			$dpr=$this->input->post('dpr');
			$type=$this->input->post('type');
			$lists="";
			
			if($type=='dpr')
			{ 
				$getlists=$this->db->get_where('placement_company_reg',array('dpr'=>$dpr));
			}
			else if($type=='center')
			{ 
				$getlists=$this->db->get_where('placement_company_reg',array('dpr'=>$dpr,'center'=>$vid));
			}
			
			
				foreach($getlists->result() as $rowdata){
			
					$statename=$this->db->get_where('lgd_states',array('state_code'=>$rowdata->state))->row('state_name');
					$districtname=$this->db->get_where('lgd_districts',array('district_code'=>$rowdata->district))->row('district_name');
					$dprname=$this->db->get_where('dpr_create',array('dpr_id'=>$rowdata->dpr))->row('dpr_name');
						
			
				$lists.='<tr class="active">
						<td class="tabledata">'.$rowdata->id.'</td>
						<td class="tabledata">'.$dprname.'</td>
						<td class="tabledata">'.$rowdata->companyname.'</td>
						<td class="tabledata">'.$rowdata->contactperson.'</td>
						<td class="tabledata">'.$statename.'</td>
						<td class="tabledata">'.$districtname.'</td>
						<td class="tabledata">'.$rowdata->pin.'</td>
						<td class="tabledata">'.$rowdata->contactnumber.'</td>
						<td class="tabledata">'.$rowdata->email.'</td>
						<td class="tabledata">'.$rowdata->city.'</td>
						<td class="tabledata"><a href="#" style="cursor:pointer" class="select" data-uid="'.base64_encode($rowdata->id).'">Select</a></td>
						<td class="tabledata"><a href="'.base_url().'placements/companyreg/newletter/'.$rowdata->id.'" style="cursor:pointer">Upload</a></td>
					  </tr>';
			}
			echo $lists;
		
	}
	
	public function getcompany()
	{
		$centerid=$this->input->post('centerid');
		$dpr=$this->input->post('dpr');
		$getcompanys=$this->db->get_where('placement_company_reg',array('dpr'=>$dpr,'center'=>$centerid));
		echo '<option value="">Select Company</option>';
		foreach($getcompanys->result() as $getcompany)
		{
			echo '<option value="'.$getcompany->id.'">'.$getcompany->companyname.'</option>';
		}
	}
	
	public function getofferletter()
	{
			$companyid=$this->input->post('companyid');
			$lists="";
			
			$getlists=$this->db->get_where('placement_company_reg_upload',array('company_id'=>$companyid));
			$lists=' <table class="table table-bordered">
						<thead class="tableheaddata">
						  <tr>
							<th>Offer Letter Id</th>
							<th>Offer Letter No</th>
							<th>Date</th>
							<th>Name</th>
							<th>Select Only One</th>
						  </tr>
						</thead>
						<tbody style="background:#fff;font-weight:600">';
				foreach($getlists->result() as $rowdata){
			
			
				$lists.='<tr>
						<td>'.$rowdata->id.'</td>
						<td>'.$rowdata->letter_no.'</td>
						<td>'.$rowdata->letter_date.'</td>
						<td>'.$rowdata->upload_letter.'</td>
						<td><input type="radio" id="offerletterradio" name="offerletterradio" value="'.$rowdata->id.'" checked></td>
						
					  </tr>';
			}
			$lists.='</tbody>
					  </table>';
			echo $lists;
		
	}
	
	
	public function getplacefilter()
	{
			$type=$this->input->post('type');
			$dpr=$this->input->post('dpr');
			$vid=$this->input->post('vid');
			$lists="";
			
			if($type=='dpr')
			{
				$traineelists=$this->db->get_where('placement_details',array('dpr'=>$dpr))->result();
			}
			else if($type=='center')
			{
				$traineelists=$this->db->get_where('placement_details',array('dpr'=>$dpr,'center'=>$vid))->result();
			}
			else if($type=='subcenter')
			{
				$traineelists=$this->db->get_where('placement_details',array('dpr'=>$dpr,'subcenter'=>$vid))->result();
				
			}
			else if($type=='course')
			{
				$subcenterid=$this->input->post('subcenterid');
				$traineelists=$this->db->get_where('placement_details',array('dpr'=>$dpr,'subcenter'=>$subcenterid,'course'=>$vid))->result();
			}
			else if($type=='batch')
			{
				$traineelists=$this->db->get_where('placement_details',array('dpr'=>$dpr,'batch'=>$vid))->result();
			}
			
			foreach($traineelists as $gettrainees)
			{	
				
				$dpr=$this->db->get_where('dpr_create',array('dpr_id'=>$gettrainees->dpr))->row('dpr_name');
				$traineename=$this->db->get_where('fddi_trainee_registration',array('id'=>$gettrainees->trainee_id))->row();
				$center=$this->db->get_where('fddi_center',array('id'=>$gettrainees->center))->row('center_name');
				$subcenter=$this->db->get_where('fddi_subcenter',array('subcenter_id'=>$gettrainees->subcenter))->row('subcenter_name');
				$course=$this->db->get_where('master_course',array('course_id'=>$gettrainees->course))->row('course_name');
				$batch=$this->db->get_where('fddi_batch',array('batch_id'=>$gettrainees->course))->row('batchname');
				$company=$this->db->get_where('placement_company_reg',array('id'=>$gettrainees->company))->row('companyname');
				
				$lists.='<tr class="active" id="t'.$gettrainees->id.'">
					<td class="tabledata">'.$gettrainees->trainee_id.'</td>
					<td class="tabledata">'.$traineename->t_first_name.' '.$traineename->t_middle_name.' '.$traineename->t_last_name.'</td>
					<td class="tabledata">'.$dpr.'</td>
					<td class="tabledata">'.$center.'</td>
					<td class="tabledata">'.$subcenter.'</td>
					<td class="tabledata">'.$course.'</td>
					<td class="tabledata">'.$batch.'</td>
					<td class="tabledata">'.$company.'</td>
					<td class="tabledata">'.$gettrainees->objective.'</td>
					<td class="tabledata"><a href="#" style="cursor:pointer" class="delete" data-uid="'.$gettrainees->id.'">Delete</a></td>
					
				</tr>';
			}
			echo $lists;
		
	}
// controller ends here	
}
