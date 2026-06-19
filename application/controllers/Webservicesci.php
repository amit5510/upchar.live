<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*  error_reporting(E_ALL);
ini_set('display_errors', 1);  */
class Webservicesci extends CI_Controller {

	
	public function __construct(){
		parent::__construct();
		$this->load->model('User_Model');
		//$this->load->library('Sm_lib');
		//$this->output        ->set_content_type('application/json');
		header('Content-type: application/json');
		
	}
	
	
	function replace_null($array)
    {
        foreach ($array as $key => $value) 
        {
            if(is_array($value))
                $array[$key] = $this->replace_null($value);
            else
            {
                if (is_null($value))
                    $array[$key] = "";
            }
        }
        return $array;
    }

	public function json_output($array)
	{
		$array=$this->replace_null($array);
		echo json_encode($array,JSON_UNESCAPED_UNICODE); 
	}

	
	public function sociallogin(){
		$email =$this->input->post('email');
		$first_name =$this->input->post('first_name');
		$last_name =$this->input->post('last_name');
		$sex =($this->input->post('sex')) ? $this->input->post('sex') :'M';
		$oauth_uid =$this->input->post('social_id');
		$social_type =$this->input->post('social_type');
		if(!empty($email) and !empty($oauth_uid)){
		$this->load->model('socialmodel');		
		$customer_id = $this->socialmodel->checkUser($oauth_uid,$first_name,$last_name,$email,$social_type,$sex,'','');
					
		$query="select USERID,`MOBILE`,EMAIL,FNAME,LNAME,APPROVED,STATUS from  userlogin where USERID='".$customer_id."'";
					
		$result = $this->db->query($query) ;
					//$num_rowsn = $result->num_rows();
		$row = $result->result_array();
		$userdata=$row;
				
		if(!empty($_POST['mobile_type']) and !empty($_POST['notification_token'])){
				
			$queryn = "select * FROM user_device WHERE USER_ID='$customer_id' and DEVICE_ID='" .$_POST['notification_token'] . "' and DEVICE_TYPE= '".$_POST['mobile_type']."' and `USER_TYPE`='C'";
						
			$resultn = $this->db->query($queryn) ;
			$num_rowsn = $resultn->num_rows();
			if ($num_rowsn ==0 ) {
				$form_datan = array(
									'USER_ID' => $customer_id,
									'USER_TYPE' => 'C',
									'DEVICE_ID' => $_POST['notification_token'],
									'DEVICE_TYPE' => $_POST['mobile_type'],
									'STATUS' => '1',
									'DATE' => date('Y-m-d') 
				);
			$this->db->insert('user_device', $form_datan);
			}			
		}
		$success = array('status' => "Success", "msg" => "Successfully Registered","OTP"=>$otp,"data"=>$userdata);
		$this->json_output($success);
		}else{
				$error = array('status' => "Failed", "msg" => "Please Provide Valid Input");
				$this->json_output($error);
		}
	}
	
	
	public function verifyforgototp(){
		$mobile =$this->input->post('mobile');
		$otp =$this->input->post('otp');
		$this -> db -> select(' USERID ');
        $this -> db -> from('userlogin');
        $this -> db -> where('MOBILE', $mobile);       
        $this -> db -> or_where('EMAIL', $mobile);       
        $this -> db -> limit(1);
        $userid = $this -> db -> get()->row('USERID');
		$login = $this->User_Model->verifyforgototp($userid,$otp);
		if($login=='SUCCESS'){
			$response=array('status'=>'success','msg'=>'OTP Sent To Registered Mobile','userid'=>$userid);
		}else if($login=='INVALID'){
			$response=array('status'=>'invalid','msg'=>'Invalid OTP');
		}else if($login=='INVALID'){
			$response=array('status'=>'failed','msg'=>'Invalid OTP');
		}else {
			$response=array('status'=>'failed','msg'=>'Something went wrong');
		}
		echo json_encode($response);
		
	}
	
	
	public function changepass(){
		$userid =$this->input->post('userid');
		$login = $this->User_Model->changepass($userid);
		if($login=='SUCCESS'){
			$response=array('status'=>'success','msg'=>'Changed Successfully');
		}else if($login=='INVALID'){
			$response=array('status'=>'invalid','msg'=>'Invalid Mobile or Email');
		}else if($login=='FAILED'){
			$response=array('status'=>'failed','msg'=>'Something went wrong');
		}else {
			$response=array('status'=>'failed','msg'=>'Something went wrong');
		}
		echo json_encode($response);
	}
	
	public function forgotpass()
	{
		$mobile =$this->input->post('mobile');
		$login = $this->User_Model->forgotpass($mobile);
		if($login=='SUCCESS'){
			$response=array('status'=>'success','msg'=>'OTP Sent To Registered Mobile');
		}else if($login=='INVALID'){
			$response=array('status'=>'invalid','msg'=>'Invalid Mobile or Email');
		}else if($login=='FAILED'){
			$response=array('status'=>'failed','msg'=>'Something went wrong');
		}else {
			$response=array('status'=>'failed','msg'=>'Something went wrong');
		}
		echo json_encode($response);
	}
	
	public function resendotp(){
		$mobile =$this->input->post('mobile');
		$login = $this->User_Model->resendotp($mobile);
		if($login=='SUCCESS'){
			$response=array('status'=>'success','msg'=>'OTP Sent To Registered Mobile');
		}else {
			$response=array('status'=>'failed','msg'=>'Something went wrong');
		}
		echo json_encode($response);
	}
	
	public function doctorlist()
	{
		$keyword 	= $this->input->get_post('keyword');
		$spl 		= $this->input->get_post('spl');
		$city 		= $this->input->get_post('city');
		$hospital 	= $this->input->get_post('hospital');
		
		if($hospital!='')
		{
			$this->db->where("institution_id",$hospital);
			$this->db->join("dr_practice",'dr_practice.user_id=profile_dr.id');
			$this->db->select("profile_dr.*, dr_practice.institution_id");
		}
		if($spl!='')
		{
			$this->db->where("specialization_id",$spl);
			$this->db->join("dr_specialization",'dr_specialization.user_id=profile_dr.id');
			$this->db->select("profile_dr.*, dr_specialization.specialization_id");
		}
		if($city!='')
			$this->db->where("city",$city);
		
		if($keyword!='')
		$this->db->like("concat(COALESCE(fname,''),' ',COALESCE(lname,''))",$keyword);
		$doctors=$this->db->get_where('profile_dr',array('approved'=>'1','verified'=>'1'))->result();
		$data=array();
		 foreach($doctors as $d){ 
			$drarray=array();
			$drarray['drid']=$d->id;
			$drarray['name']=$d->fname.' '.$d->lname;
			$drarray['image']=admin_url().'public/assets/upload/'.$d->drimage;
			
			
			$quastring=array();
			$qu=$this->db->get_where('dr_qualifications',array('user_id'=>$d->id));
			foreach(@$qu->result() as $q)
				$quastring[]=getQualificationName($q->qualification_id);
			
			$splstring=array(); 
			$sp=$this->db->get_where('dr_specialization',array('user_id'=>$d->id))->result();
			foreach($sp as $s)
				$splstring[]=getSpecilizationName($s->specialization_id);
			
			$drarray['specialization']=$splstring;			
			$drarray['qualification']=$quastring;			
			$drarray['experience']=$d->exp;
			
			
			$practdata=$this->db->get_where('dr_practice',array('user_id'=>$d->id,'status'=>'1'));
			$practcount=$practdata->num_rows(); 
			$pract=$practdata->row(); 
			if($pract->type=='C')
				$institution_table='clinic';
			else if($pract->type=='H')
				$institution_table='hospital';
					
			if($instition_table!=''){
			$institutiondata=$this->db->get_where($institution_table, array('id'=>$pract->institution_id,'status'=>'1'));
			$institutioncount=$institutiondata->num_rows();
			$institution=$institutiondata->row();
			
			$drarray['practice_type']=$institution_table;
			$drarray['practice_count']=$practcount;
			$drarray['practice_name']=$institution->name;
			$drarray['practice_address']=$institution->address;
			$drarray['practice_fee']=$pract->fee;
			
			$inst_service=$this->db->select('master_services.name')->join('master_services','master_services.id=instition_services.services_id')->get_where('instition_services',array('institution_id'=>$pract->institution_id,'institution_type'=>$pract->type))->result();
			$servicesstring=array(); 
			foreach($inst_service as $is)
				$servicesstring[]=$is->name;
				
			$drarray['practice_services']=$servicesstring;
			} 
			$data['doctors'][]=$drarray;
		 }
		 
		 $response=array('status'=>'success','msg'=>'Listed Doctor Successfully','data'=>$data);
		 
		$this->json_output($response); 
	}
	
	public function get_doctorlist_hospital_list()
	{
		$keyword 	= $this->input->get_post('keyword');
		$spl 		= $this->input->get_post('spl');
		$city 		= $this->input->get_post('city');
		
		if($spl!='')
		{
			$this->db->where("specialization_id",$spl);
			$this->db->join("dr_specialization",'dr_specialization.user_id=profile_dr.id');
			$this->db->select("profile_dr.*, dr_specialization.specialization_id");
		}
		if($city!='')
			$this->db->where("city",$city);
		
		if($keyword!='')
		$this->db->like("concat(COALESCE(fname,''),' ',COALESCE(lname,''))",$keyword);
		
		$doctors=$this->db->get_where('profile_dr',array('approved'=>'1','verified'=>'1'))->result();
		// last_query();
		$data=array();
		 foreach($doctors as $d){ 
			$drarray=array();
			$drarray['drid']=$d->id;
			$drarray['name']=$d->fname.' '.$d->lname;
			$drarray['image']=admin_url().'public/assets/upload/'.$d->drimage;
			
			
			$quastring=array();
			$qu=$this->db->get_where('dr_qualifications',array('user_id'=>$d->id));
			foreach(@$qu->result() as $q)
				$quastring[]=getQualificationName($q->qualification_id);
			
			$splstring=array(); 
			$sp=$this->db->get_where('dr_specialization',array('user_id'=>$d->id))->result();
			foreach($sp as $s)
				$splstring[]=getSpecilizationName($s->specialization_id);
			
			$drarray['specialization']=$splstring;			
			$drarray['qualification']=$quastring;			
			$drarray['experience']=$d->exp;
			
			
			$practdata=$this->db->get_where('dr_practice',array('user_id'=>$d->id,'status'=>'1'));
			$practcount=$practdata->num_rows(); 
			$pract=$practdata->row(); 
			
			if($pract->type=='C')
				$institution_table='clinic';
			else if($pract->type=='H')
				$institution_table='hospital';
					
			if($instition_table!=''){
			$institutiondata=$this->db->get_where($institution_table, array('id'=>$pract->institution_id,'status'=>'1'));
			$institutioncount=$institutiondata->num_rows();
			$institution=$institutiondata->row();
			
			$drarray['practice_type']=$institution_table;
			$drarray['practice_count']=$practcount;
			$drarray['practice_name']=$institution->name;
			$drarray['practice_address']=$institution->address;
			$drarray['practice_fee']=$pract->fee;
			
			$inst_service=$this->db->select('master_services.name')->join('master_services','master_services.id=instition_services.services_id')->get_where('instition_services',array('institution_id'=>$pract->institution_id,'institution_type'=>$pract->type))->result();
			$servicesstring=array(); 
			foreach($inst_service as $is)
				$servicesstring[]=$is->name;
				
			$drarray['practice_services']=$servicesstring;
			} 
			$data['doctors'][]=$drarray;
		 }
		 if($city!='')
			$this->db->where("city",$city);
		 if($keyword!='')
		 $this->db->like("name",$keyword);
		 $hospital =$this->db->get_where('hospital', array('approved'=>'1','verified'=>'1'))->result();
		 foreach($hospital as $h)
		 { 
			$timingarray=array();
			$timings=$this->db->select('id,S,M,T,W,TH,F,SA')->get_where('timing', array('status'=>'1','user_type'=>'H','user_id'=>$h->id))->result();
			foreach($timings as $timing){
				$sessionarray=array();
				$sessions=$this->db->select('from_timing,to_timing')->get_where('timing_session', array('status'=>'1','timing_id'=>$timing->id))->result();
				foreach($sessions as $session){
					$sessionarray[]=$session;
				}
				$timingarray[]=array('days'=>$timing,'sessions'=>$sessionarray);
			}
			
			$data['hospital'][]=array('id'=>$h->id,'name'=>$h->name,'city'=>getCityName($h->city),'location'=>getlocalityName($h->location),'address'=>$h->address,'email'=>$h->email,'website'=>$h->website,'mobile'=>$h->mobile,'display_image'=>$h->drimage,'status'=>$h->status,'timing'=>$timingarray,'imageurl'=>admin_url().'public/assets/upload/');
			
		 }
		 $response=array('status'=>'success','msg'=>'Listed Record Successfully','data'=>$data);
		 
		$this->json_output($response); 
	}
	
	public function get_hospital_list()
	{
		$keyword 	= $this->input->get_post('keyword');
		$city 		= $this->input->get_post('city');

		 if($city!='')
			$this->db->where("city",$city);
		 if($keyword!='')
		 $this->db->like("name",$keyword);
		 $hospital =$this->db->get_where('hospital', array('approved'=>'1','verified'=>'1'))->result();
		 foreach($hospital as $h)
		 { 
			$timingarray=array();
			$timings=$this->db->select('id,S,M,T,W,TH,F,SA')->get_where('timing', array('status'=>'1','user_type'=>'H','user_id'=>$h->id))->result();
			foreach($timings as $timing){
				$sessionarray=array();
				$sessions=$this->db->select('from_timing,to_timing')->get_where('timing_session', array('status'=>'1','timing_id'=>$timing->id))->result();
				foreach($sessions as $session){
					$sessionarray[]=$session;
				}
				$timingarray[]=array('days'=>$timing,'sessions'=>$sessionarray);
			}
			
			$data['hospital'][]=array('id'=>$h->id,'name'=>$h->name,'city'=>getCityName($h->city),'location'=>getlocalityName($h->location),'address'=>$h->address,'email'=>$h->email,'website'=>$h->website,'mobile'=>$h->mobile,'display_image'=>$h->drimage,'status'=>$h->status,'timing'=>$timingarray,'imageurl'=>admin_url().'public/assets/upload/');
			
		 }
		 $response=array('status'=>'success','msg'=>'Listed Record Successfully','data'=>$data);
		 
		$this->json_output($response); 
	}
	
	
	
	public function doctordetail()
	{
		$id = $this->input->post('id');
		$d=$this->db->get_where('profile_dr',array('approved'=>'1','verified'=>'1','id'=>$id))->row();
		//$data=array();
		// foreach($doctors as $d){ 
			$drarray=array();
			$drarray['drid']=$d->id;
			$drarray['name']=$d->fname.' '.$d->lname;
			$drarray['image']=admin_url().'public/assets/upload/'.$d->drimage;
			
			
			$quastring=array();
			$qu=$this->db->get_where('dr_qualifications',array('user_id'=>$d->id));
			foreach(@$qu->result() as $q)
				$quastring[]=getQualificationName($q->qualification_id);
			
			$splstring=array(); 
			$sp=$this->db->get_where('dr_specialization',array('user_id'=>$d->id))->result();
			foreach($sp as $s)
				$splstring[]=getSpecilizationName($s->specialization_id);
			
			$drarray['specialization']=$splstring;			
			$drarray['qualification']=$quastring;			
			$drarray['experience']=$d->exp;
			
			
			$practdata=$this->db->get_where('dr_practice',array('user_id'=>$d->id,'status'=>'1'));
			$practcount=$practdata->num_rows(); 
			$practs=$practdata->result(); 
			foreach($practs as $pract){
				$drarray2=array();
			if($pract->type=='C')
				$institution_table='clinic';
			else if($pract->type=='H')
				$institution_table='hospital';
							
			$institutiondata=$this->db->get_where($institution_table, array('id'=>$pract->institution_id,'status'=>'1'));
			$institutioncount=$institutiondata->num_rows();
			$institution=$institutiondata->row();
			$drarray2['practice_fee']=$pract->fee;
			$drarray2['practice_type']=$institution_table;
			//$drarray['practice_count']=$practcount;
			$drarray2['practice_name']=$institution->name;
			$drarray2['practice_address']=$institution->address;
			
			
			$inst_service=$this->db->select('master_services.name')->join('master_services','master_services.id=instition_services.services_id')->get_where('instition_services',array('institution_id'=>$pract->institution_id,'institution_type'=>$pract->type))->result();
			$servicesstring=array(); 
			foreach($inst_service as $is)
				$servicesstring[]=$is->name;
				
			$drarray2['practice_services']=$servicesstring;
			$drarray['practices'][]=$drarray2;
			}
			//$data['doctors']=$drarray;
		 //}
		 
		 $response=array('status'=>'success','msg'=>'Doctor Detail Successfully Listed','data'=>$drarray);
		 
		$this->json_output($response); 
	}
	
	public function getlocality()
	{
		//$q=$_REQUEST["q"]; 
		//$sql="SELECT id,name FROM `master_city` WHERE (name LIKE '%$q%'  ) AND status='1'	";
		$sql="SELECT id,name FROM `master_locality` WHERE status='1'	";
		$result =$this->db->query($sql)->result();
		
		$json=array();

		foreach($result as $row) {
		  array_push($json, array('value'=> $row->id,'label'=> $row->name));
		}

		echo json_encode($json);
	}
	
	public function getcity()
	{
		//$q=$_REQUEST["q"]; 
		//$sql="SELECT id,name FROM `master_city` WHERE (name LIKE '%$q%'  ) AND status='1'	";
		$sql="SELECT id,name FROM `master_city` WHERE status='1'	";
		$result =$this->db->query($sql)->result();
		
		$json=array();

		foreach($result as $row) {
		  array_push($json, array('value'=> $row->id,'label'=> $row->name));
		}

		echo json_encode($json);
	}
	
	public function getspecialization()
	{
		//$q=$_REQUEST["q"]; 
		//$sql="SELECT id,name FROM `master_city` WHERE (name LIKE '%$q%'  ) AND status='1'	";
		$sql="SELECT id,name FROM `master_specialization` WHERE status='1'	";
		$result =$this->db->query($sql)->result();
		
		$json=array();

		foreach($result as $row) {
		  array_push($json, array('value'=> $row->id,'label'=> $row->name));
		}

		echo json_encode($json);
	}
	
	public function geteducation()
	{
		//$q=$_REQUEST["q"]; 
		//$sql="SELECT id,name FROM `master_city` WHERE (name LIKE '%$q%'  ) AND status='1'	";
		$sql="SELECT id,name FROM `master_degree` WHERE status='1'	";
		$result =$this->db->query($sql)->result();
		
		$json=array();

		foreach($result as $row) {
		  array_push($json, array('value'=> $row->id,'label'=> $row->name));
		}

		echo json_encode($json);
	}
	
	public function getcouncil()
	{
		//$q=$_REQUEST["q"]; 
		//$sql="SELECT id,name FROM `master_city` WHERE (name LIKE '%$q%'  ) AND status='1'	";
		$sql="SELECT id,name FROM `master_council` WHERE status='1'	";
		$result =$this->db->query($sql)->result();
		
		$json=array();

		foreach($result as $row) {
		  array_push($json, array('value'=> $row->id,'label'=> $row->name));
		}

		echo json_encode($json);
	}
	
	
	public function app_conf_pop_doctor(){
		$id=$_GET['doctor'];
		$data=$this->db->get_where('profile_dr',array('id'=>$id))->row();
		
		$content = '<div class="col-md-4">    
		<img src="'.admin_url().'public/assets/upload/'.$data->drimage.'" alt="">
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
	
	public function appointment_institute(){
		$id=$_GET['doctor'];
		$date=$_GET['date'];
		$time=$_GET['time'];
		//$day_no = date('N',strtotime($date));
		//$day=array('1'=>'M','2'=>'T','3'=>'W','4'=>'TH','5'=>'F','6'=>'SA','7'=>'S');
		$data=$this->db->get_where('timing_session',array('id'=>$time))->row();
		$timing_id=$data->timing_id;
		
		$max_opd=$data->max_patient;
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
		$fee=$data->fee;
		
		$institution=$this->db->get_where($type,array('id'=>$institution_id))->row();
		
		$dataarray['name']=$institution->name;
		$dataarray['address']=$institution->address;
		$dataarray['fee']=$fee;
		$dataarray['type']=$type;
		$dataarray['fee']=$fee;
		$dataarray['opd']=$opd;
						
		$response=array('status'=>'success','msg'=>'Listed Successfully','data'=>$dataarray);
		 
		$this->json_output($response);
	}
	
	public function appointment_date(){
		$id=$_GET['doctor'];
		$this->db->select('timing.*');
		$this->db->join('dr_practice','dr_practice.user_id=timing.user_id AND dr_practice.status=\'1\'');
		$data=$this->db->get_where('timing',array('timing.user_id'=>$id,'user_type'=>'D'))->result();
		
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
			
			if(!in_array(0, $day))
				break;
		}
		
		$period = new DatePeriod(
			 new DateTime(date('Y-m-d')),
			 new DateInterval('P1D'),
			 new DateTime(date('Y-m-d', strtotime(date('Y-m-d'). ' + 45 days')))
			); 
			
			$datelist=array();
		foreach ($period as $date) {
			 $day_no = date('N',strtotime($date->format("Y-m-d")));
			
			if($day[$day_no])
				$datelist[]= $date->format("Y-m-d");
			
		}
		
		$response=array('status'=>'success','msg'=>'Listed Successfully','data'=>$datelist);
		 
		$this->json_output($response); 
		
	}
	
	public function appointment_time(){
		$id=$_GET['doctor'];
		$date=$_GET['date'];
		$day_no = date('N',strtotime($date));
		$day=array('1'=>'M','2'=>'T','3'=>'W','4'=>'TH','5'=>'F','6'=>'SA','7'=>'S');
		$this->db->select('timing.*');
		$this->db->group_by('timing.id');
		$this->db->join('dr_practice','dr_practice.user_id=timing.user_id AND dr_practice.status=\'1\'');
		$data=$this->db->get_where('timing',array('timing.user_id'=>$id,'user_type'=>'D',$day[$day_no]=>'1'))->result();
		
		$datelist=array();
		foreach ($data as $t) {
			$data2=$this->db->get_where('timing_session',array('timing_id'=>$t->id))->result();
			
				foreach ($data2 as $ts) 
				$datelist[]= array('time_id'=>$ts->id,'timing_from'=>$ts->from_timing,'timing_to'=>$ts->to_timing);
			
		}
		$response=array('status'=>'success','msg'=>'Listed Successfully','data'=>$datelist);
		 
		$this->json_output($response); 
	}
	
	public function book_appointment(){
		$mobile=$this->input->post('app_mobile');
		$date=$this->input->post('app_date');
		$time=$this->input->post('app_time');
		$doctor=$this->input->post('app_doctor');
		$name=$this->input->post('app_name');
		$age=$this->input->post('app_age');
		$email=$this->input->post('app_email');
		$userid=$this->input->post('userid');
		//$otp=$this->input->post('app_otp');
		
		$data=$this->db->get_where('timing_session',array('id'=>$time))->row();
		$from_timing=$data->from_timing;
		$to_timing=$data->to_timing;
		$timing_id=$data->timing_id;
		$max_opd=$data->max_patient;
		$data=$this->db->get_where('timing',array('id'=>$timing_id))->row();
		$pid=$data->practice_id;
		$data=$this->db->get_where('dr_practice',array('id'=>$pid))->row();
		$did=$data->user_id;
		$type=$data->type;
		/* if($type=='H')
			$type='hospital';
		else
			$type='clinic'; */
		
		$booked=$this->db->where(array('time_id'=>$time,'appointment_date'=>$date,'status'=>'1'))->count_all_results('appointment');
		$opd=$max_opd-$booked;
		if($opd <1){
			$response=array('status'=>'failed','msg'=>'OPD Not Available');		 
			$this->json_output($response); 
			die;
		}
		
		$institution_id=$data->institution_id;
		$fee=$data->fee;
		
		
		$idata=array('appointment_date'=>$date,'time_id'=>$time,'to_timing'=>$to_timing,'from_timing'=>$from_timing,'date_id'=>$timing_id,'practice_id'=>$pid,'appointment_name'=>$name,'age'=>$age,'appointment_mobile'=>$mobile,'appointment_email'=>$email,'doctor_id'=>$doctor,'institute_id'=>$institution_id,'institution_type'=>$type,'fee'=>$fee,'amount'=>$fee,'user_id'=>$userid,'payment_mode'=>'NA','payment_status'=>'NA','status'=>'0');
		$this->db->insert('appointment',$idata);
		$aid=$this->db->insert_id();
		/***************************************/
		
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

		/* $msg="Your Appoint booked successfully! Appointment ID# $aid
	WWW.UPCHAR.COM";
			sendsms($msg,$mobile); */
		$response=array('status'=>'success','msg'=>'RequestProcessing','appointmentid'=>$aid,'orderid'=>$orderid,'checkout_amount'=>$total);
		 
		$this->json_output($response); 
	}
	public function app_checkout(){
		$userid =$this->input->post('userid');
		$AppointmentCheckout =$this->input->post('appointmentid');
		$orderid =$this->input->post('orderid');
		$appointment_datas=$this->db->get_where('appointment',array('status'=>'0','appointment_id'=>$AppointmentCheckout,'user_id'=>$userid));
		$appointment_count=$appointment_datas->num_rows();
		$appointment_data=$appointment_datas->row();
		if($appointment_count==0){
			$response=array('status'=>'failed','msg'=>'Invalid Request');		 
			 
		}else{
			$response=array('status'=>'success','msg'=>'display checkout page','data'=>$appointment_data,'orderid'=>$orderid,'hospital'=>getInstituteName($appointment_data->institute_id,$appointment_data->institution_type),'doctor'=>getDoctorName($appointment_data->doctor_id),'payment_info'=>['subtotal'=>$appointment_data->fee,'total'=>$appointment_data->fee]);
		 
		
		}
		
		$this->json_output($response);
	}
	
	
	public function process_myapp_o_cod()
	{
		$userid =$this->input->post('userid');
		$OrderId =$this->input->post('orderid');
		$appid =$this->input->post('aid');
		$order=$this->db->where(array('ORDER_ID'=>$OrderId))->get('sm_order')->row();
			
		$aid=$order->ITEM_ID;
		$paystatus=$order->PAYMENT_STATUS; //cross check 
		$ordertotal=$order->TOTAL;// compare total with the amount recieved
		
		$appointment_data=$this->db->where(array('appointment_id'=>$aid,'user_id'=>$userid))->get('appointment')->row();
		
		if(count($appointment_data) ==0 || $appid!=$aid){
			$response=array('status'=>'failed','msg'=>'Invalid Request');
		}else{
		$mobile=$appointment_data->appointment_mobile;
		$msg="Your Appointment booked successfully! Appointment# $aid
			Please Pay the Fee Rs. $ordertotal at Counter,  Request# $OrderId
			WWW.UPCHARR.COM";
			sendsms($msg,$mobile);
		
		$updatedata=array('PAYMENT_STATUS'=>'COC');
		$this->db->where('ORDER_ID',$OrderId);
		$this->db->update('sm_order',$updatedata);
		
		$updateuserdata=array('checkout_id'=>'0','payment_status'=>'UNPAID','payment_mode'=>'COC','status'=>'1');
		$this->db->where('appointment_id',$aid);
		$this->db->update('appointment',$updateuserdata);
		
		$response=array('status'=>'success','msg'=>'Thank you! The Appointment detail has been sent to the registered  mobile no.');; 
		}
		$this->json_output($response);
		
	}
	

	public function update_profile(){
		$userid =$this->input->post('userid');
		 $login = $this->User_Model->update_profile($userid);
		if($login=='SUCCESS'){
			$response=array('status'=>'success','msg'=>'Updated Successfully');
		}else if($login=='INVALID'){
			$response=array('status'=>'failed','msg'=>'Invalid User');
		}else if($login=='FAILED'){
			$response=array('status'=>'failed','msg'=>'Something went wrong');
		}else if($login=='MOBILE'){
			$response=array('status'=>'failed','msg'=>'Mobile Already Exist');
		}else if($login=='EMAIL'){
			$response=array('status'=>'failed','msg'=>'Email Already Exist');
		}else {
			$response=array('status'=>'failed','msg'=>'Something went wrong');
		}
		echo json_encode($response);
	}
	
	public function get_profile(){
		$userid =$this->input->post('userid');
		
        $this -> db -> where('USERID', $userid);   
        $query = $this -> db -> get('userlogin');
		if($query -> num_rows() > 0)
        {
			$data=$query->row();
			$response=array('status'=>'success','msg'=>'Listed Successfully','url'=>base_url().'assets/userimages/','data'=>$data);
		}else{
			$response=array('status'=>'failed','msg'=>'Invalid User');
		}
		echo json_encode($response);
	}
	
	public function get_appointment(){
		
		$userid =$this->input->post('userid');
        $this -> db -> select('appointment_id,appointment_date,from_timing,to_timing,appointment_name as patient_name,age, fee,appointment.amount,appointment.payment_mode,doctor_id,institute_id,institution_type,payment_status,book_date,pay_date,cancel_date,appointment.status,ck.orderid,ck.trakingid,ck.bankrefno,ck.paymentmod,ck.date');   
        $this -> db -> order_by('appointment_id');   
        $this -> db -> where('appointment.user_id', $userid);   
		$this -> db -> where('appointment.status !=', '0');  
		$this -> db -> join('sm_checkout ck', 'ck.id=appointment.checkout_id','left');  
        $query = $this -> db -> get('appointment');
		if($query -> num_rows() > 0)
        {
			$results=$query->result();
			foreach($results as $row){
				if($row->institution_type=='C')
					$table='clinic';
				else if($row->institution_type=='H')
					$table='hospital';
				
				$this -> db -> where('id', $row->institute_id);   
				$institute = $this -> db -> get($table)->row();
				//$d=$this->db->get_where('profile_dr',array('id'=>$row->doctor_id))->row();
					$d=$this->db->get_where('profile_dr',array('approved'=>'1','verified'=>'1','id'=>$row->doctor_id))->row();
					//$data=array();
					// foreach($doctors as $d){ 
						$drarray=array();
						$drarray['drid']=$d->id;
						$drarray['name']=$d->fname.' '.$d->lname;
						$drarray['image']=admin_url().'public/assets/upload/'.$d->drimage;
						
						
						$quastring=array();
						$qu=$this->db->get_where('dr_qualifications',array('user_id'=>$d->id));
						foreach(@$qu->result() as $q)
							$quastring[]=getQualificationName($q->qualification_id);
						
						$splstring=array(); 
						$sp=$this->db->get_where('dr_specialization',array('user_id'=>$d->id))->result();
						foreach($sp as $s)
							$splstring[]=getSpecilizationName($s->specialization_id);
						
						$drarray['specialization']=$splstring;			
						$drarray['qualification']=$quastring;			
						$drarray['experience']=$d->exp;
						
						
				$data[]=array('appointment'=>$row,'institute'=>$institute,'doctor'=>$drarray);
			}
			$response=array('status'=>'success','msg'=>'Listed Successfully','data'=>$data);
		}else{
			$response=array('status'=>'failed','msg'=>'No Appointment Found');
		}
		echo json_encode($response);
	}
	
	public function cancel_appointment(){
		$appointment_id=$this->input->post('appointment_id');
		$userid=$this->input->post('userid');
		$reason=$this->input->post('reason');
		$this -> db -> set('status', '2');
		$this -> db -> set('cancel_date', date('Y-m-d H:i:s'));
		$this -> db -> set('cancel_by', 'U');
		$this -> db -> set('cancel_reason', $reason);
		$res=$this->db->where(array('appointment_id'=>$appointment_id,'user_id'=>$userid,'status'=>'1'))->update('appointment');
		if($res){
			$response=array('status'=>'success','msg'=>'Canceled Successfully');
		}else{
			$response=array('status'=>'failed','msg'=>'Failed');
		}
		echo json_encode($response);
	}
	
	
    public function index()
	{
		$this->load->view('login',@$data);
	} 
	
 	public function login()
	{   
		$email = strtolower($this->input->get_post('email'));
		$password = md5($this->input->get_post('password'));
        $login = $this->User_Model->login($email,$password);
       // print_r( $login); die;
		if($login=='SUCCESS'){
			$response=array('status'=>'success','msg'=>'Logged in Successfully');
		}else if($login=='OTP'){
			$response=array('status'=>'otp','msg'=>'Please Verify Mobile no');
		}else if($login=='BLOCKED'){
			$response=array('status'=>'failed','msg'=>'User Blocked by Administrator!');
		}else {
			$response=array('status'=>'failed','msg'=>'Incorrect Email or Password');
		}
		echo json_encode($response);
	}
	
	
	public function register()
    {
		$response = $this->User_Model->register();
		echo json_encode($response);
	}
	
	public function logout()
    {
        $this->session->sess_destroy();
        redirect('/');
    }

 
 

 
 function moveToScreen() {
        Android.moveToNextScreen();
    }


 
 
}




