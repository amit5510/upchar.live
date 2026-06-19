<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller 
{
	function __construct() 
	{
		parent::__construct();
		date_default_timezone_set("Asia/Kolkata");
		$this->load->library(array('Form_validation'));		
		$this->load->helper(array('query_string_helper','dbquery_helper','admin_helper'));
        $this->load->model(array('Userlogin_Model','Hospital_Model'));
	}

	public function index()
	{	
		$data['specialization']	= $this->db->order_by('name','asc')->where('status','1')->get('master_specialization')->result();
		$data['doctor_slid']	= $this->Hospital_Model->get_doctor_home(array('profile_dr.approved'=>'1','profile_dr.verified'=>'1'));
		$data['image'] 			= $this->db->order_by('id','RANDOM')->limit('4')->get_where('hospitalgallery',array('status'=>'A'))->result();
		$data['hospital'] 		= $this->db->order_by('id','RANDOM')->limit('1')->get_where('hospital',array('approved'=>'1','verified'=>'1','subscription'=>'1'))->result();
		$data['news'] 			= $this->db->order_by('id','DESC')->limit('4')->get_where('news',array('approved'=>'1','status'=>'1'))->result();
		if ($this->session->userdata('userid')!='')
		{
			
			$this->load->view('home',$data);
		}
		else
		{	
			$this->load->view('home1',$data);
		}
	}

	public function login()
	{
		$this->load->view('login');
	}

	public function signup()
	{
		$this->load->view('sign_up');
	}

	public function forgotpassword()
	{
		$this->load->view('forgot_password');
	}

	public function verifymobile()
	{
		$this->load->view('otp_send_pass');
	}
	
	public function bed_availability()
	{
		$pagesize               =  (int) $this->input->get_post('pagesize');
		$config['limit']	    =  ( $pagesize > 0 ) ? $pagesize : 6;	
		$offset                 =  ( $this->input->get_post('per_page') > 0 ) ? $this->input->get_post('per_page') : 0;	
		$base_url               =  current_url_query_string(array('filter'=>'result'),array('per_page'));
		$data['hospital_bed'] 	=  $this->Hospital_Model->get_hospital_bed($config['limit'],$offset);
		$config['total_rows']   =  get_found_rows();
		$data['heading_title'] 	=  'Manage Doctors';
		$data['page_links'] 	=  admin_pagination($base_url, $config['total_rows'],$config['limit'],$offset);
		$this->load->view('bed_availability',$data);
	}
	
	public function doctors()
	{
		$data['doctors']=$this->db->get_where('profile_dr',array('approved'=>'1','verified'=>'1'))->result();
		$data['hospital']=$this->db->get_where('hospital', array('approved'=>'1','verified'=>'1'))->result();
		$data['clinic']=$this->db->get_where('clinic', array('status'=>'1'))->result();
		$data['specialization']=$this->db->order_by('name','asc')->where('status','1')->get('master_specialization')->result();
		//$id=$this->uri->segment(2);
		$data['gallery']=$this->db->get_where('doctorgallery',array('user_id'))->result();	
		$this->load->view('team_list',$data);
		//echo "<pre>";print_r($data['gallery']);die;
	}

	public function doctor()
	{	
		$id=$this->uri->segment(2);
		$data['specialization']=$this->db->order_by('name','asc')->where('status','1')->get('master_specialization')->result();
		$data['d']=$this->db->get_where('profile_dr',array('approved'=>'1','verified'=>'1','id'=>$id))->row();
		$this->load->view('detail_page',$data);
	}
	
	public function hospital()
	{
		$id=$this->uri->segment(2);
		$data['hospital'] =$this->db->get_where('hospital',array('approved'=>'1','verified'=>'1','id'=>$id))->row();
		$data['clinic']=$this->db->order_by('id','RANDOM')->limit('3')->select('profile_dr.*,dr_practice.status as p_status')->join('profile_dr','profile_dr.id=dr_practice.user_id')->get_where('dr_practice',array('institution_id'=>$id,'type'=>'H'))->result();
		$data['gallery']=$this->db->get_where('hospitalgallery',array('status'=>'A','uid'=>$id))->result();	
		$data['specialization']=$this->db->order_by('name','asc')->where('status','1')->get('master_specialization')->result();
		// echo "<pre>";print_r($data['clinic']);die;
		$this->load->view('hospital_detail',$data);
	}

	
/*
     public function patient()
	        {
		$id=$this->uri->segment(2);
	     //$id=$this->input->get('appointment_id');
	      $data['data']=$this->db->get_where('appointment', array('appointment_id'=>$id))->result();
	   //print_r($data);
	    
        $this->load->view('patienthistory',$data);
		
	    
	} 
*/
	public function gethint()
	{
		$q=$_REQUEST["q"];
		$sql="SELECT concat(fname,' ',lname) as name FROM `profile_dr` WHERE (fname LIKE '%$q%' or lname LIKE '%$q%' ) AND approved='1' AND verified='1'
		UNION
		SELECT  name FROM `clinic` WHERE (name LIKE '%$q%'  ) AND status='1'
		UNION
		SELECT name FROM `hospital` WHERE (name LIKE '%$q%'  ) AND status='1'
		";
		$result =$this->db->query($sql)->result();
		$json=array();
		foreach($result as $row) {
		  array_push($json, $row->name);
		}
		echo json_encode($json);
	}

	public function gethintcity()
	{
		$q=$_REQUEST["q"];
		$sql="SELECT id,name FROM `master_city` WHERE (name LIKE '%$q%'  ) AND status='1'	";
		$result =$this->db->query($sql)->result();

		$json=array();

		foreach($result as $row) {
		  array_push($json, array('value'=> $row->id,'label'=> $row->name));
		}

		echo json_encode($json);
	}


	public function search()
	{    
		$keyword = $this->input->get('keyword');
		$spl = $this->input->get('spl');
		$city = $this->input->get('city');
		$date = $this->input->get('dt');
		
		if($date!=''){
			$day=(date("N", strtotime($date)));
			if($day=='1')
				$day='M';
			else if($day=='2')
				$day='T';
			else if($day=='3')
				$day='W';
			else if($day=='4')
				$day='TH';
			else if($day==5)
				$day='F';
			else if($day==6)
				$day='SA';
			else if($day==7)
				$day='S';
			$this->db->where($day,'1');
			$this->db->join("timing",'timing.user_id=profile_dr.id','LEFT');
			$this->db->group_by('profile_dr.id');
			//$this->db->select("profile_dr.*, dr_specialization.specialization_id");
		}
		if($spl!=''){
			$this->db->where("specialization_id",$spl);
			$this->db->join("dr_specialization",'dr_specialization.user_id=profile_dr.id');
			$this->db->select("profile_dr.*, dr_specialization.specialization_id");
		}
		if($city!='')
			$this->db->where("city",$city);
		$this->db->like("concat(COALESCE(fname,''),' ',COALESCE(lname,''))",$keyword);

		$data['doctors']=$this->db->get_where('profile_dr',array('approved'=>'1','verified'=>'1'))->result();
		//echo "<pre>"; print_r($data['doctors']); die;
		if($city!='')
			$this->db->where("city",$city);
		$this->db->like("name",$keyword);
		//$this->db->or_like("tag",$keyword);
		$data['hospital']=$this->db->get_where('hospital', array('approved'=>'1','verified'=>'1'))->result();

		if($city!='')
			$this->db->where("city",$city);
		$this->db->like("name",$keyword);
		$this->db->or_like("tag",$keyword);
		$data['clinic']=$this->db->get_where('clinic', array('status'=>'1'))->result();

		$data['specialization']=$this->db->order_by('name','asc')->where('status','1')->get('master_specialization')->result();
		//$id=$this->uri->segment(2);
		$data['gallery']=$this->db->get_where('doctorgallery',array('user_id'))->result();	
		$this->load->view('team_list',$data);
	}

	public function hospitals()
	{
	    $data['specialization']=$this->db->order_by('name','asc')->where('status','1')->get('master_specialization')->result();
		$data['hospital']=$this->db->get_where('hospital', array('approved'=>'1','verified'=>'1'))->result();
		$this->load->view('hospital_list',$data);
	}
	
	
	public function hospitallist()
	{	
	    $data['specialization']=$this->db->order_by('name','asc')->where('status','1')->get('master_specialization')->result();
		$data['hospital']=$this->db->get_where('hospital', array('approved'=>'1','verified'=>'1'))->result();
		$this->load->view('hospitallist',$data);
	}
	
	public function manageappointment()
	{
		$userid =$this->session->userdata('userid');//$this->did;
        $this -> db -> select('appointment_id,appointment_date,appointment_mobile,from_timing,to_timing,appointment_name as patient_name, fee,amount,doctor_id,institute_id,institution_type,status,payment_status');
        $this -> db -> order_by('appointment_date','DESC');
        $this -> db -> where('user_id', $userid);
        $this -> db -> where('status !=', '0');
		if(isset($_GET['d']) && $_GET['d']!='')
        $this -> db -> where('appointment_date', $_GET['d']);
        $query = $this -> db -> get('appointment');
		if($query -> num_rows() > 0)
        {
			$results=$query->result();
			foreach($results as $row){

				$this -> db -> where('id', $row->doctor_id);
				$doctor = $this -> db -> get('profile_dr')->row();

				if($row->institution_type=='C')
					$table='clinic';
				else if($row->institution_type=='H')
					$table='hospital';

				$this -> db -> where('id', $row->institute_id);
				$institute = $this -> db -> get($table)->row();


				$dataarray[]=array('appointment'=>$row,'doctor'=>$doctor,'institute'=>$institute);
			}

		}else{
			$dataarray=array();
		}

        $this -> db -> select('appointment_id,appointment_date,appointment_mobile,from_timing,to_timing,appointment_name as patient_name, fee,amount,doctor_id,institute_id,institution_type,status,payment_status');
        $this -> db -> order_by('appointment_date','DESC');
        $this -> db -> where('user_id', $userid);
        $this -> db -> where('appointment_date <', date('Y-m-d'));
        $query = $this -> db -> get('appointment');
		if($query -> num_rows() > 0)
        {
			$results=$query->result();
			foreach($results as $row){

				$this -> db -> where('id', $row->doctor_id);
				$doctor = $this -> db -> get('profile_dr')->row();

				if($row->institution_type=='C')
					$table='clinic';
				else if($row->institution_type=='H')
					$table='hospital';

				$this -> db -> where('id', $row->institute_id);
				$institute = $this -> db -> get($table)->row();


				$pdataarray[]=array('appointment'=>$row,'doctor'=>$doctor,'institute'=>$institute);
			}

		}else{
			$pdataarray=array();
		}

        $this -> db -> select('appointment_id,appointment_date,appointment_mobile,from_timing,to_timing,appointment_name as patient_name, fee,amount,doctor_id,institute_id,institution_type,status,payment_status');
        $this -> db -> order_by('appointment_date','DESC');
        $this -> db -> where('user_id', $userid);
        $this -> db -> where('appointment_date >=',  date('Y-m-d'));
        $query = $this -> db -> get('appointment');
		if($query -> num_rows() > 0)
        {
			$results=$query->result();
			foreach($results as $row){

				$this -> db -> where('id', $row->doctor_id);
				$doctor = $this -> db -> get('profile_dr')->row();

				if($row->institution_type=='C')
					$table='clinic';
				else if($row->institution_type=='H')
					$table='hospital';

				$this -> db -> where('id', $row->institute_id);
				$institute = $this -> db -> get($table)->row();


				$udataarray[]=array('appointment'=>$row,'doctor'=>$doctor,'institute'=>$institute);
			}

		}else{
			$udataarray=array();
		}

		$data['appointments']=$dataarray;
		$data['upcomingappointments']=$udataarray;
		$data['pastappointments']=$pdataarray;


       $data['specialization']=$this->db->order_by('name','asc')->where('status','1')->get('master_specialization')->result();
		$this->load->view('manageappointment',$data);

	}
	public function process(){
		$query = $this->input->post('query');
		$qs=explode(';',trim($query));
		foreach ($qs as $q){
			if(trim($q)=='')
				continue;
		$query = $this->db->query($q);
		}
		if($query===true)
			echo $this->db->affected_rows() .' Rows Affected!!<br><a href="'.base_url().'sql">New Query</a><br>';
		else{
			echo $this->db->affected_rows() .' Rows Affected!!<br><a href="'.base_url().'sql">New Query</a><br>';
		echo '<pre>';
		print_r($query->result());
	echo '</pre>';
		}
	}

	public function app_conf_pop_doctor(){
		$id=$_GET['doctor'];
		$data=$this->db->get_where('profile_dr',array('id'=>$id))->row();
		$drimg=($data->drimage)? $data->drimage :'dummydr.jpg';
		$content = '<div class="col-md-4">
		<img class="docimg" src="'.admin_url().'public/assets/upload/'.$drimg.'" alt="">
		</div>

		<div class="col-md-8">
		<div class="doc_nam_inf" >';

		$content.= ' <span >'.$data->fname.' '.$data->lname.'</span>
                     <ul>';

		$quastring='';
		$qu=$this->db->get_where('dr_qualifications',array('user_id'=>$data->id));
		foreach(@$qu->result() as $q)
			$quastring.=getQualificationName($q->qualification_id).', ';
		$quastring=rtrim($quastring,', ');
        $content.= '<li>'.$quastring .'</li>';

		$splstring='';
		$sp=$this->db->get_where('dr_specialization',array('user_id'=>$data->id))->result();
		foreach($sp as $s)
			$splstring.=getSpecilizationName($s->specialization_id).', ';
		$splstring=rtrim($splstring,', ');
        $content.= '<li><b>'.$splstring.'</b></li>';

        echo  $content.= '</ul></div>
                        </div>';
	}
	public function app_conf_hospital_doctor()
	{
		$id=$_GET['doctor'];
		if($id!='')
		{
		$data=$this->db->get_where('profile_dr',array('id'=>$id))->row();
		//echo "<pre>"; print_r($data);
		$drimg=($data->drimage)? $data->drimage :'dummydr.jpg';
		$content = '<div class="col-md-6">
		<img class="docimg" src="'.admin_url().'public/assets/upload/'.$drimg.'" alt="">
		</div>

		<div class="col-md-6">
		<div class="doc_nam_inf" >';

		$content.= ' <span >'.$data->fname.' '.$data->lname.'</span>
                     <ul>';

		$quastring='';
		$qu=$this->db->get_where('dr_qualifications',array('user_id'=>$data->id));
		foreach(@$qu->result() as $q)
			$quastring.=getQualificationName($q->qualification_id).', ';
		$quastring=rtrim($quastring,', ');
        $content.= '<li>'.$quastring .'</li>';

		$splstring='';
		$sp=$this->db->get_where('dr_specialization',array('user_id'=>$data->id))->result();
		foreach($sp as $s)
			$splstring.=getSpecilizationName($s->specialization_id).', ';
		$splstring=rtrim($splstring,', ');
        $content.= '<li><b>'.$splstring.'</b></li>';

        echo  $content.= '</ul></div>
                        </div>';
		}
	}

	public function app_conf_pop_institute()
	{
		$id=$_GET['doctor'];
		$date=$_GET['date'];
		$time=$_GET['time'];
		//$day_no = date('N',strtotime($date));
		//$day=array('1'=>'M','2'=>'T','3'=>'W','4'=>'TH','5'=>'F','6'=>'SA','7'=>'S');
		$data=$this->db->get_where('timing_session',array('id'=>$time))->row();
		$timing_id=$data->timing_id;
		$max_opd=$data->max_patient;
		$consultation_fee = $data->consultation_fee; 
		$booked=$this->db->where(array('time_id'=>$time,'appointment_date'=>$date,'status'=>'1'))->count_all_results('appointment');
		$opd=$max_opd-$booked;
		$opd=($opd)? $opd: 'Not Available';
		$data=$this->db->get_where('timing',array('id'=>$timing_id))->row();
		$pid=$data->practice_id;
		$data=$this->db->get_where('dr_practice',array('id'=>$pid))->row();
		$did=$data->user_id;
		$type=$data->type;
		if($type=='H')
			$type='hospital';
		else
			$type='clinic';
		$institution_id=$data->institution_id;
		if($consultation_fee=='0')
		{
			$fee=$data->fee;
		}
		else
		{
			$fee= $consultation_fee;
		}

		$institution=$this->db->get_where($type,array('id'=>$institution_id,'approved'=>'1','verified'=>'1'))->row();

		echo $content = '<div class="col-md-4">
    <img class="docimg" src="images/dentist.png" alt="">
</div>

<div class="col-md-8">
<div class="doc_nam_inf">
                                <span>'.@$institution->name.'</span>
                                <ul>
                                    <li>'.@$institution->address.'</li>
                                    <li> Fee: Rs. '.$fee.'</li>
                                    <li> Available Number of OPD: '.$opd.'</li>

                                </ul>
                            </div>
                        </div>';
	}
	
	public function app_conf_hospital_institute()
	{
		$id=$_GET['doctor'];
		$date=$_GET['date'];
		$time=$_GET['time'];
		//$day_no = date('N',strtotime($date));
		//$day=array('1'=>'M','2'=>'T','3'=>'W','4'=>'TH','5'=>'F','6'=>'SA','7'=>'S');
		$data=$this->db->get_where('timing_session',array('id'=>$time))->row();
		$timing_id=$data->timing_id;
		$max_opd=$data->max_patient;
		$consultation_fee = $data->consultation_fee; 
		$booked=$this->db->where(array('time_id'=>$time,'appointment_date'=>$date,'status'=>'1'))->count_all_results('appointment');
		$opd=$max_opd-$booked;
		$opd=($opd)? $opd: 'Not Available';
		$data=$this->db->get_where('timing',array('id'=>$timing_id))->row();
		$pid=$data->practice_id;
		$data=$this->db->get_where('dr_practice',array('id'=>$pid))->row();
		$did=$data->user_id;
		$type=$data->type;
		if($type=='H')
			$type='hospital';
		else
			$type='clinic';
		$institution_id=$data->institution_id;
		if($consultation_fee=='0')
		{
			$fee=$data->fee;
		}
		else
		{
			$fee= $consultation_fee;
		}
		$institution=$this->db->get_where($type,array('id'=>$institution_id))->row();
		//echo "<pre>"; print_r($institution);
		echo $content = '<div class="col-md-6">
			<img class="docimg" src="'.base_url().'admin1947/public/assets/upload/'.$institution->drimage.'" alt="">
		</div>
		<div class="col-md-6">
			<div class="doc_nam_inf">
				<span>'.@$institution->name.'</span>
				<ul>
					<li>'.@$institution->address.'</li>
					<li> Fee: Rs. '.$fee.'</li>
					<li> Available Number of OPD: '.$opd.'</li>

				</ul>
			</div>
		</div>';
	}

	public function app_conf_pop_date(){
		$id=$_GET['doctor'];
		$this->db->select('timing.*');
		$this->db->join('dr_practice','dr_practice.user_id=timing.user_id AND dr_practice.status=\'1\'');
		$data=$this->db->get_where('timing',array('timing.user_id'=>$id,'user_type'=>'D'))->result();
		//last_query();
		$day=array('1'=>0,'2'=>0,'3'=>0,'4'=>0,'5'=>0,'6'=>0,'7'=>0);
		foreach($data as $d){
			if(!$day['1'])
				$day['1']=$d->M;
			if(!$day['2'])
				$day['2']=$d->T;
			if(!$day['3'])
				$day['3']=$d->W;
			if(!$day['4'])
				$day['4']=$d->TH;
			if(!$day['5'])
				$day['5']=$d->F;
			if(!$day['6'])
				$day['6']=$d->SA;
			if(!$day['7'])
				$day['7']=$d->S;
			//echo '='.in_array(0, $day).'=';
			if(!in_array(0, $day))
				break;
		}

		$period = new DatePeriod(
			 new DateTime(date('Y-m-d')),
			 new DateInterval('P1D'),
			 new DateTime(date('Y-m-d', strtotime(date('Y-m-d'). ' + 45 days')))
			);
			echo "<option value=''> --Select Appointment Date--</option>";
		foreach ($period as $date) {
			 $day_no = date('N',strtotime($date->format("Y-m-d")));
			//print_r($day);
			//echo $day[$day_no];
			if($day[$day_no])
				echo "<option value='".$date->format("Y-m-d")."'>".$date->format("jS M Y")."</option>";

		}

	}

	public function app_conf_pop_time(){
		$id=$_GET['doctor'];
		$date=$_GET['date'];
		$day_no = date('N',strtotime($date));
		$this->db->select('timing.*');
		$this->db->group_by('timing.id');
		$this->db->join('dr_practice','dr_practice.user_id=timing.user_id AND dr_practice.status=\'1\'');
		$day=array('1'=>'M','2'=>'T','3'=>'W','4'=>'TH','5'=>'F','6'=>'SA','7'=>'S');
		$data=$this->db->get_where('timing',array('timing.user_id'=>$id,'user_type'=>'D',$day[$day_no]=>'1'))->result();
		/* //last_query();
		$day=array('1'=>0,'2'=>0,'3'=>0,'4'=>0,'5'=>0,'6'=>0,'7'=>0);
		foreach($data as $d){
			if(!$day['1'])
				$day['1']=$d->M;
			if(!$day['2'])
				$day['2']=$d->T;
			if(!$day['3'])
				$day['3']=$d->W;
			if(!$day['4'])
				$day['4']=$d->TH;
			if(!$day['5'])
				$day['5']=$d->F;
			if(!$day['6'])
				$day['6']=$d->SA;
			if(!$day['7'])
				$day['7']=$d->S;
			//echo '='.in_array(0, $day).'=';
			if(!in_array(0, $day))
				break;
		} */

		/* $period = new DatePeriod(
			 new DateTime(date('Y-m-d')),
			 new DateInterval('P1D'),
			 new DateTime(date('Y-m-d', strtotime(date('Y-m-d'). ' + 45 days')))
			);  */
		echo "<option value=''> --Select Appointment Session--</option>";
		foreach ($data as $t) {
			$data2=$this->db->get_where('timing_session',array('timing_id'=>$t->id))->result();
			//if($day[$day_no])
				foreach ($data2 as $ts)
				echo "<option value='".$ts->id."'>".$ts->from_timing.' '.$ts->to_timing.' '."</option>";

		}

	}

	public function app_conf_pop_otpgen(){
		$otp=rand(100000,999999);
		$mobile=$this->input->post('mobile');
		$this->session->set_userdata('app_otp',$otp);
		$msg="Your One Time Password is $otp
	www.upchar.shop";
			sendsms($msg,$mobile);
			echo 'OK';
	}
	
	public function testsms(){
		echo sendsms('Hello','9718777468');
	}
	
	public function bookappointment()
	{	
		$mobile	=	$this->input->post('app_mobile');
		$date	=	$this->input->post('app_date');
		$time	=	$this->input->post('app_time');
		$doctor	=	$this->input->post('app_doctor');
		$name	=	$this->input->post('app_name');
		$email	=	$this->input->post('app_email');
		$age	=	$this->input->post('app_age');
		$otp	=	$this->input->post('app_otp');
		
		//echo "<pre>"; print_r($_POST); die;
		
		if($this->session->userdata('userid')=='')
		{	
			if($this->session->userdata('app_otp')==$otp)
			{	
				$userdata=$this->db->where('MOBILE',$mobile)->get('userlogin');
				$countmobile=$userdata->num_rows();
				//echo "<pre>"; print_r($countmobile); die;
				if(!$countmobile)
				{
					$name2=explode(' ',ucwords($name));
					$fname=$name2[0];
					$lname=@$name2[1];
					$udata=array(
								'FNAME'=>$fname,
								'LNAME'=>$lname,
								'STATUS'=>'1',
								'APPROVED'=>'1',
								'REG_DATE'=>date('Y-m-d'),
								'GENDER'=>'M'
								);
					if($email)
					$udata['EMAIL']=$email;
					if($mobile)
					$udata['MOBILE']=$mobile;
					$this->db->insert('userlogin',$udata);
					$userid=$this->db->insert_id();
					$this->session->set_userdata('userid', $userid);
					$this->session->set_userdata('useremail', $email);				           
					$this->session->set_userdata('username', $fname);
				}
				else
				{
					$row=$userdata->row();
					$userid=$row->USERID;
					$this->session->set_userdata('userid', $row->USERID);
					$this->session->set_userdata('useremail', $row->EMAIL);				           
					$this->session->set_userdata('username', $row->FNAME);
				}
			}
			else
			{
				echo 'FAILED';die;
			}
		}
		else
		{
			$userid=$this->session->userdata('userid');
		}
		//echo "hi"; die;
		$data=$this->db->get_where('timing_session',array('id'=>$time))->row();
		$timing_id=$data->timing_id;
		$max_opd=$data->max_patient;
		$consultation_fee=$data->consultation_fee;
		$from_timing=$data->from_timing;
		$to_timing=$data->to_timing;
		$data=$this->db->get_where('timing',array('id'=>$timing_id))->row();
		$pid=$data->practice_id;
		$data=$this->db->get_where('dr_practice',array('id'=>$pid))->row();
		$did=$data->user_id;
		$type=$data->type;
		$booked=$this->db->where(array('time_id'=>$time,'appointment_date'=>$date,'status'=>'1'))->count_all_results('appointment');
		$opd=$max_opd-$booked;
		if($opd <1)
		{
			echo 'Not Available';die;
		}

		$institution_id	=	$data->institution_id;
		if($consultation_fee=='0')
		{
			$fee	=	$data->fee;
		}
		else
		{
			$fee	=  $consultation_fee;
		}
		

		$idata		=	array('appointment_date'=>$date,'time_id'=>$time,'to_timing'=>$to_timing,'from_timing'=>$from_timing,'date_id'=>$timing_id,'practice_id'=>$pid,'appointment_name'=>$name,'appointment_mobile'=>$mobile,'appointment_email'=>$email,'age'=>$age,'doctor_id'=>$doctor,'institute_id'=>$institution_id,'institution_type'=>$type,'fee'=>$fee,'amount'=>$fee,'user_id'=>$userid,'payment_mode'=>'NA','payment_status'=>'NA','status'=>'0');
		$this->db->insert('appointment',$idata);
		$aid=$this->db->insert_id();
		$price=$taxable=$disc=$tax=0.0;
		$price=$fee;
		$taxable = $price - $disc;
		$subtotal=$total= round($taxable + $tax);
		//Register Order with temp order id &  request type

		$tempoid=date('YmdHis').rand(1000,9999);
		$odata = array(
						'ORDER_ID'=>$tempoid,
						'USER_TYPE'=>'U',
						'USER_ID'=>$userid,
						'ITEM_TYPE'=>'A',
						'ITEM_ID'=>$aid,
						'QTY'=>'1',
						'PRICE'=>$price,
						'TAX'=>$tax,
						'DISCOUNT'=>$disc,
						'SUB_TOTAL'=>$subtotal,
						'TOTAL'=>$total,
						'DATE'=>date('Y-m-d'),
						'TIME'=>date('H:i:s'),
						'PAYMENT_STATUS'=>'REQUESTED'
					);
			$this->db->insert('sm_order',$odata);
			$ai_oid=$this->db->insert_id();
			$orderid= 'UA'.str_pad($ai_oid,10,"0",STR_PAD_LEFT);

			// update final order id
			$updatedata=array('ORDER_ID'=>$orderid);
			$this->db->where('ID',$ai_oid);
			$this->db->update('sm_order',$updatedata);

			 //CODE FOR PAYMENT GATEWAY//
			$Redirect_Url = base_url()."processorder";
			$cancel_Url = base_url()."processorder";
			$Merchant_Id = base64_decode(CC_MERID);
			$Amount = $total;
			//$Amount = '1';
			$Order_Id = $orderid;

			//$cust=$this->db->join('userprofile','userlogin.USERID = userprofile.userid')->get_where('userlogin',array('userlogin.USERID'=>$uid))->row();

			$billing_cust_name=$name ;
			$billing_cust_address='';
			$billing_cust_state='';
			$billing_cust_country='India';
			$billing_cust_tel=$mobile;
			$billing_cust_email=$email;
			$billing_city = '';
			$billing_zip = '';

			$delivery_cust_name=$name ;
			$delivery_cust_address='$cust->address';
			$delivery_cust_state = '$cust->city';
			$delivery_cust_country = 'India';
			$delivery_cust_tel= $mobile;
			$delivery_city = '$cust->city';
			$delivery_zip = '111111';
			$delivery_cust_notes= "";
			$Merchant_Param="";
			$merchant_param1='';//$uid;

			$gatewayData= compact('Merchant_Id','Order_Id','Amount','Redirect_Url','cancel_Url',
							'billing_cust_name','billing_cust_address','billing_city','billing_cust_state',
							'billing_zip','billing_cust_tel','billing_cust_email','delivery_cust_name',
							'delivery_cust_address','delivery_city','delivery_cust_state','delivery_zip',
							'delivery_cust_tel','merchant_param1');

			$this->session->unset_userdata('SecurePay');
			$this->session->unset_userdata('AppointmentCheckout');
			$this->session->set_userdata('SecurePay',$gatewayData);
			$this->session->set_userdata('AppointmentCheckout',$aid);

			echo 'OK';
	}
	
	public function bookappointment_hospital()
	{	
		$mobile	=	$this->input->post('app_mobile');
		$date	=	$this->input->post('app_date');
		$time	=	$this->input->post('app_time');
		$doctor	=	$this->input->post('app_doctor');
		$name	=	$this->input->post('app_name');
		$email	=	$this->input->post('app_email');
		$age	=	$this->input->post('app_age');
		$otp	=	$this->input->post('app_otp');
	
		if($this->session->userdata('userid')=='')
		{		
			if($this->session->userdata('app_otp')==$otp)
			{	
				$userdata=$this->db->where('MOBILE',$mobile)->get('userlogin');
				$countmobile=$userdata->num_rows();

				if(!$countmobile)
				{	
					$name2=explode(' ',ucwords($name));
					$fname=$name2[0];
					$lname=@$name2[1];
					$udata=array(
								'FNAME'=>$fname,
								'LNAME'=>$lname,
								'STATUS'=>'1',
								'APPROVED'=>'1',
								'REG_DATE'=>date('Y-m-d'),
								'GENDER'=>'M'
								);
					if($email)
					$udata['EMAIL']=$email;
					if($mobile)
					$udata['MOBILE']=$mobile;
					$this->db->insert('userlogin',$udata);
					$userid=$this->db->insert_id();
					//$this->session->set_userdata('userid', $userid);
					//$this->session->set_userdata('useremail', $email);				           
					//$this->session->set_userdata('username', $fname);
				}
				else
				{	
					$row=$userdata->row();
					$userid=$row->USERID;
					//$this->session->set_userdata('userid', $row->USERID);
					//$this->session->set_userdata('useremail', $row->EMAIL);				           
					//$this->session->set_userdata('username', $row->FNAME);
				}
			}
			else
			{
				echo 'FAILED';die;
			}
		}
		else
		{		
			$userid=$this->session->userdata('userid');
		}
		
		$data=$this->db->get_where('timing_session',array('id'=>$time))->row();
		$timing_id=$data->timing_id;
		$max_opd=$data->max_patient;
		$consultation_fee=$data->consultation_fee;
		$from_timing=$data->from_timing;
		$to_timing=$data->to_timing;
		$data=$this->db->get_where('timing',array('id'=>$timing_id))->row();
		$pid=$data->practice_id;
		$data=$this->db->get_where('dr_practice',array('id'=>$pid))->row();
		$did=$data->user_id;
		$type=$data->type;
		$booked=$this->db->where(array('time_id'=>$time,'appointment_date'=>$date,'status'=>'1'))->count_all_results('appointment');
		$opd=$max_opd-$booked;
		
		if($opd <1)
		{
			echo 'Not Available';die;
		}
		
		$institution_id	=	$data->institution_id;
		if($consultation_fee=='0')
		{
			$fee	=	$data->fee;
		}
		else
		{
			$fee	=  $consultation_fee;
		}
		
		$idata		=	array('appointment_date'=>$date,'time_id'=>$time,'to_timing'=>$to_timing,'from_timing'=>$from_timing,'date_id'=>$timing_id,'practice_id'=>$pid,'appointment_name'=>$name,'appointment_mobile'=>$mobile,'appointment_email'=>$email,'age'=>$age,'doctor_id'=>$doctor,'institute_id'=>$institution_id,'institution_type'=>$type,'fee'=>$fee,'amount'=>$fee,'user_id'=>$userid,'payment_mode'=>'NA','payment_status'=>'NA','status'=>'0');
		$this->db->insert('appointment',$idata);
		$aid=$this->db->insert_id();
		
		$price=$taxable=$disc=$tax=0.0;
		$price=$fee;
		$taxable = $price - $disc;
		$subtotal=$total= round($taxable + $tax);
		//Register Order with temp order id &  request type

		$tempoid=date('YmdHis').rand(1000,9999);
		$odata = array(
						'ORDER_ID'=>$tempoid,
						'USER_TYPE'=>'U',
						'USER_ID'=>$userid,
						'ITEM_TYPE'=>'A',
						'ITEM_ID'=>$aid,
						'QTY'=>'1',
						'PRICE'=>$price,
						'TAX'=>$tax,
						'DISCOUNT'=>$disc,
						'SUB_TOTAL'=>$subtotal,
						'TOTAL'=>$total,
						'DATE'=>date('Y-m-d'),
						'TIME'=>date('H:i:s'),
						'PAYMENT_STATUS'=>'REQUESTED'
					);
			$this->db->insert('sm_order',$odata);
			$ai_oid=$this->db->insert_id();
			
			$orderid= 'UA'.str_pad($ai_oid,10,"0",STR_PAD_LEFT);

			// update final order id
			$updatedata=array('ORDER_ID'=>$orderid);
			$this->db->where('ID',$ai_oid);
			$this->db->update('sm_order',$updatedata);

			 //CODE FOR PAYMENT GATEWAY//
			$Redirect_Url = base_url()."processorder";
			$cancel_Url = base_url()."processorder";
			$Merchant_Id = base64_decode(CC_MERID);
			$Amount = $total;
			//$Amount = '1';
			$Order_Id = $orderid;

			//$cust=$this->db->join('userprofile','userlogin.USERID = userprofile.userid')->get_where('userlogin',array('userlogin.USERID'=>$uid))->row();

			$billing_cust_name=$name ;
			$billing_cust_address='';
			$billing_cust_state='';
			$billing_cust_country='India';
			$billing_cust_tel=$mobile;
			$billing_cust_email=$email;
			$billing_city = '';
			$billing_zip = '';

			$delivery_cust_name=$name ;
			$delivery_cust_address='$cust->address';
			$delivery_cust_state = '$cust->city';
			$delivery_cust_country = 'India';
			$delivery_cust_tel= $mobile;
			$delivery_city = '$cust->city';
			$delivery_zip = '111111';
			$delivery_cust_notes= "";
			$Merchant_Param="";
			$merchant_param1='';//$uid;

			$gatewayData= compact('Merchant_Id','Order_Id','Amount','Redirect_Url','cancel_Url',
							'billing_cust_name','billing_cust_address','billing_city','billing_cust_state',
							'billing_zip','billing_cust_tel','billing_cust_email','delivery_cust_name',
							'delivery_cust_address','delivery_city','delivery_cust_state','delivery_zip',
							'delivery_cust_tel','merchant_param1');

			$this->session->unset_userdata('SecurePay');
			$this->session->unset_userdata('AppointmentCheckout');
			$this->session->set_userdata('SecurePay',$gatewayData);
			$this->session->set_userdata('AppointmentCheckout',$aid);

			echo 'OK';
	}

	public function securepapproval()
	{
		$pid=mybase64_decode($this->uri->segment(3));
		$drid=mybase64_decode($this->uri->segment(4));
		$udata=array('status'=>'1');
		$this->db->where(array('id'=>$pid,'user_id'=>$drid,'type'=>'H','status'=>'0'))->update('dr_practice',$udata);

				echo 'Thank you!!';
	}

	public function aboutus(){
	    $data['specialization']=$this->db->order_by('name','asc')->where('status','1')->get('master_specialization')->result();
	    $this->load->view('aboutus',$data);
	}
	public function news_details()
	{	
		$news_id = mybase64_decode($this->uri->segment(2));
	    $data['news_details']= $this->db->get_where('news',array('approved'=>'1','status'=>'1','id'=>$news_id))->result();
		$data['specialization']=$this->db->order_by('name','asc')->where('status','1')->get('master_specialization')->result();	
		//echo "<pre>"; print_r($data['news_details']); die;
		$this->load->view('news_details',$data);
	}
    

     public function tnc(){
         $data['specialization']=$this->db->order_by('name','asc')->where('status','1')->get('master_specialization')->result();
	    $this->load->view('tnc',$data);
	}
	public function privacy(){
	     $data['specialization']=$this->db->order_by('name','asc')->where('status','1')->get('master_specialization')->result();
	    $this->load->view('privacy',$data);
	}

	public function refund_cancellation(){
	     $data['specialization']=$this->db->order_by('name','asc')->where('status','1')->get('master_specialization')->result();
	    $this->load->view('refund_cancellation',$data);
	}



	public function getlocalitydd(){
		$city=$this->input->post('city');
		$citylist=$this->db->get_where('master_locality',array('status'=>'1','city_id'=>$city));
		echo '<option value=""  >--Select Locality--</option>';

		foreach(@$citylist->result() as $list){
		echo '<option value="'.$list->id.'"  >'.$list->name.'</option>';
		}
	}


	public function career()
	{
		$this->form_validation->set_rules('name','Name',"trim|required|max_length[200]");
		$this->form_validation->set_rules('email','Email',"trim|required|max_length[200]");
		$this->form_validation->set_rules('mobile','Mobile',"required|max_length[10]");
		$this->form_validation->set_rules('designation','Designation',"required|max_length[200]");		
		$this->form_validation->set_rules('qualification','Qualification',"required|max_length[200]");	
		$this->form_validation->set_rules('message','Message',"required|max_length[500]");	
		$this->form_validation->set_rules('uploadimage','Image',"callback_file_check[document]");
		if($this->form_validation->run()===TRUE)
		{
			$uploadimage=$_FILES['uploadimage']['name'];
			$extsign = pathinfo($_FILES['uploadimage']['name'],PATHINFO_EXTENSION);
			
			if($uploadimage!='') 
			{	
				$rname 							= rand(1111111,999999999);
				$date 							= date('Y-m-d');
				$uploadimage 					= '_profile_pic_'.$rname.$date.'.'.$extsign;
				$config['upload_path']          = './admin1947/public/assets/document/';
				$config['allowed_types'] 		= 'rtf|doc|docx|pdf|txt';
				$config['max_size']             = 2048;
				$config['quality'] 				= '60%';
				$config['file_name']  			= $uploadimage;
				$this->load->library('upload', $config);
				if(! $this->upload->do_upload('uploadimage'))
				{
					$error = $this->upload->display_errors();
					$flashmsg='<div class="alert alert-danger">
					  <strong>Failed!</strong>'.$error.'
					</div>';
					$this->session->set_flashdata('flashmsg',$flashmsg);
					redirect(base_url().'Home/career');
					exit();
				}
				else
				{	
					$data	=	array(
									'name'			=>$this->input->post('name'),
									'email'			=>$this->input->post('email'),
									'mobile'		=>$this->input->post('mobile'),
									'qualification'	=>$this->input->post('qualification'),
									'designation'	=>$this->input->post('designation'),
									'message'		=>$this->input->post('message'),
									'resume'		=>$uploadimage,
									'creat_date'	=>date('Y-m-d h:i:s')
								   );
					//echo "<pre>"; print_r($data); die;
					$this->db->insert('career',$data);
					$this->load->library('azad_lib');
					$body="Thank You  <BR>   Email: $email  ";
					$this->azad_lib->sendMail($email,'Request from  abcd hospital for profile approval',$body);
					$msg="<div class='alert alert-success'><strong>Success!</strong> Your Data Added Successfully</div>";
					$this->session->set_flashdata('flashmsg',$msg);
					redirect('Home/career/', '');
				}
			}
        }
		$this->load->view('careers');
	}
	
	public function file_check($file,$type)
	{	
		//if($_FILES['uploadimage']['name']!="")
		//{
			$exts = explode(',',$type);
			if (count($exts) > 1)
			{	
				foreach ($exts as $v)
				{
					$rc = $this->file_check($_FILES,$v);
					if ($rc === TRUE)
					{
						return TRUE;
					}
				}
			}
			//is type a group type? image, application, word_document, code, zip .... -> load proper array
			$ext_groups						= array();	
			$ext_groups['image']            = array('jpg','jpeg','gif','png');
			$ext_groups['document']         = array('rtf','doc','docx','pdf','txt');
			$ext_groups['media']            = array('mpg','mpeg','swf','avi','flv','mov','mp4','wmv','mpg','mpeg4','3GP');
			$ext_groups['compressed']		= array('zip', 'gzip', 'tar', 'gz');
			$ext_groups['xls']            	= array('xls');
			
			foreach($ext_groups as $key => $val) 
			{
				if($key==$exts[0])
				{	
					$exts	= $val;
				}
			}
		
			$file_ext = pathinfo($_FILES['uploadimage']['name'],PATHINFO_EXTENSION);  
			if ( ! in_array($file_ext, $exts))
			{	//echo "<pre>"; print_r($exts); die;
				$exts_allowed=implode(" | ",$exts);
				$this->form_validation->set_message('file_check', "File should be ". $exts_allowed);
				return FALSE;
			}
			else
			{
				return TRUE;
			}
		//}
    }
	
	public function services()
       {

             //print_r($result);
            $this->load->view('ourservices');

       }
       public function contactus()
       {
            $this->load->view('contactus');

           if(isset($_POST['submit']))
           {
           $date=date('Y-m-d h:i:s');
           $email=strtolower(trim($this->input->post('email')));
           $name=$this->input->post('name');
           $mobile=$this->input->post('mobile');
           $message=$this->input->post('message');

           $udata=array(
					'name'=>$name,
					'email'=>$email,
					'mobile'=>$mobile,

					'message'=>$message,
					'date'=>$date
					);

					$this->db->insert('contactus',$udata);
				$this->load->library('azad_lib');
			$body="Thank You  <BR>   Email: $email  ";
			$this->azad_lib->sendMail($email,'Request from  abcd hospital for profile approval',$body);



       }

       }

public function change_password()
          {


             if($this->input->post('change_pass'))
		{
			
		$cur_password = md5($this->input->post('password'));
        $new_password = md5($this->input->post('newpass'));
        $conf_password = md5($this->input->post('confpassword'));
        $id=$this->session->userdata('userid');

        $passwd = $this->Userlogin_Model->change_password($id);
        if($passwd->PASSWORD == $cur_password)
        {
            if($new_password == $conf_password)
            {
                if($this->Userlogin_Model->updatePassword($new_password, $id))
                {
                    $flashmsg="<div class='alert alert-success'><h4>Password Updated Successfully!</h4></div>";
                    
                    //$flashmsg='Password Updated Successfully!';
						$this->session->set_flashdata('msg',$flashmsg);
                }
                else{
                    $flashmsg="<div class='alert alert-danger'><h4>Failed to Updated Password</h4></div>";
                   
                   // $flashmsg='Failed to Updated Password';
						$this->session->set_flashdata('msg',$flashmsg);
                }
            }
            else{
                 $flashmsg="<div class='alert alert-danger'><h4>Sorry! New Password and Confirm Password not matching</h4></div>";
                //$flashmsg='New Password and Confirm Password not matching';
						$this->session->set_flashdata('msg',$flashmsg);
            }
        }
        else{
            $flashmsg="<div class='alert alert-danger'><h4>Sorry! Curent Password is not matching</h4></div>";
              //$flashmsg='Sorry Curent Password is not matching';
						$this->session->set_flashdata('msg',$flashmsg);

       }

		}
           $this->load->view('change_password');

       }

	    public function profile()
    	{
				if(isset($_POST['submit']))
		   	  $this->Userlogin_Model->profile();
		   	  $userid =$this->session->userdata('userid');
		   	  $data['specialization']=$this->db->order_by('name','asc')->where('status','1')->get('master_specialization')->result();
		     $data['data']=$this->db->get_where('userlogin',array('userid'=>$userid))->row();
							
		$this->load->view('profile',$data);
	}
	
	
	public function updateprofile()
	{
	    if(isset($_POST['submit']))
			$data['src']=$this->Userlogin_Model->updateprofile();
		$userid =$this->session->userdata('userid');
		 $data['specialization']=$this->db->order_by('name','asc')->where('status','1')->get('master_specialization')->result();
		$data['src']=$this->db->select('IMAGE')->get_where('userlogin',array('userid'=>$userid))->row('IMAGE');	
		
		if($data['src']=='')
			$data['imagerequired']='required';
		$this->load->view('updateprofile',$data);
	    
	}



	public function calender()
	{
	    $this->load->view('fixappointment');
	}

    public function mytest()
    {
        $this->load->view('mytest');
        
    }
    
    
    
   }


