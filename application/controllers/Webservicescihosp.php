<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*  error_reporting(E_ALL);
ini_set('display_errors', 1);  */
class Webservicescihosp extends CI_Controller {

	
	public function __construct(){
		parent::__construct();
		$this->load->model('Hospitaluser_Model');
		//$this->load->library('Sm_lib');
		//$this->output        ->set_content_type('application/json');
		header('Content-type: application/json');
		
		//print_r($_POST);
		if($this->input->post('hospuserid')!='')
		{
		 $this->did=$this->db->where('uid',$this->input->post('hospuserid'))->get('hospital')->row()->id;//last_query();
		}/* else{echo 'NA';} */
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

	
	public function changepass(){
		$userid =$this->input->post('userid');
		$login = $this->Hospitaluser_Model->changepass($userid);
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
	
	public function forgotpass(){
		$mobile =$this->input->post('mobile');
		//print_r($_REQUEST);
		//print_r($_POST);
		$login = $this->Hospitaluser_Model->forgotpass($mobile);
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
	
	
	public function verifyforgototp(){
		$mobile =$this->input->post('mobile');
		$otp =$this->input->post('otp');
		$this -> db -> select(' USERID ');
        $this -> db -> from('hospitallogin');
        $this -> db -> where('MOBILE', $mobile);       
        $this -> db -> or_where('EMAIL', $mobile);       
        $this -> db -> limit(1);
        $userid = $this -> db -> get()->row('USERID');
		$login = $this->Hospitaluser_Model->verifyforgototp($userid,$otp);
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
	
	
	public function resendotp(){
		$mobile =$this->input->post('mobile');
		$login = $this->Hospitaluser_Model->resendotp($mobile);
		if($login=='SUCCESS'){
			$response=array('status'=>'success','msg'=>'OTP Sent To Registered Mobile');
		}else {
			$response=array('status'=>'failed','msg'=>'Something went wrong');
		}
		echo json_encode($response);
	}
		
	public function managedoctor()
	{ //all practice approved+pending
		$clinic=$this->db->select('profile_dr.*,dr_practice.status as p_status')->join('profile_dr','profile_dr.id=dr_practice.user_id')->get_where('dr_practice',array('institution_id'=>$this->did,'type'=>'H'))->result();
		$data=array();
		foreach($clinic as $p){
			if($p->p_status==1){$stat= 'Approved & Active';}else{$stat= 'Approval Pending';}
			
			$quastring=array();
			$qu=$this->db->get_where('dr_qualifications',array('user_id'=>$p->id));
			foreach(@$qu->result() as $q)
				$quastring[]=getQualificationName($q->qualification_id);
			
			$splstring=array(); 
			$sp=$this->db->get_where('dr_specialization',array('user_id'=>$p->id))->result();
			foreach($sp as $s)
				$splstring[]=getSpecilizationName($s->specialization_id);
			
			$data[]=array('id'=>$p->id,'name'=>$p->fname.' '.$p->lname,'mobile'=>$p->mobile,'address'=>getCityName($p->city),'status'=>$stat,'status_code'=>$p->p_status,
			'specialization'=>$splstring,
			'qualification'=>$quastring,
			'experience'=>$p->exp,
			'image'=>admin_url().'public/assets/upload/'.$p->drimage
			);
		}		
		$response=array('status'=>'success','msg'=>'Successfully','data'=>$data);
		$this->json_output($response);							 
	}
	
	public function manageappointment()
	{
		$userid =$this->did;
        $this -> db -> select('appointment_id,appointment_date,appointment_mobile,appointment_email,from_timing,to_timing,appointment_name as patient_name, fee,amount,doctor_id,institute_id,institution_type,status,payment_status');   
        $this -> db -> order_by('appointment_id');   
        $this -> db -> where('institute_id', $userid);   
        $this -> db -> where('institution_type', 'H');
		$this -> db -> where('status !=', '0');     
		if(isset($_GET['d']) && $_GET['d']!='')
        $this -> db -> where('appointment_date', $_GET['d']);   
        $query = $this -> db -> get('appointment');
		if($query -> num_rows() > 0)
        {
			$results=$query->result();
			foreach($results as $row){
				
				$this -> db -> where('id', $row->doctor_id);   
				$institute = $this -> db -> get('profile_dr')->row();
				
				$dataarray[]=array('appointment'=>$row,'institute'=>$institute);
			}
			
		}else{
			$dataarray=array();
		}
		
		$data=array();
		foreach($dataarray as $p){ 
			if($p['appointment']->status==1){$stat= 'Booked';}else if($p['appointment']->status==2) {$stat= 'Cancelled';}else {$stat= 'Unknown';}
			$data[]=array(
					'appointment_date'=>$p['appointment']->appointment_date,
					'from_timing'=>$p['appointment']->from_timing,
					'to_timing'=>$p['appointment']->to_timing,
					'doctor_id'=>$p['appointment']->doctor_id,
					'doctor'=>$p['institute']->fname.' '.$p['institute']->lname,
					'patient_name'=>$p['appointment']->patient_name,
					'appointment_email'=>$p['appointment']->appointment_email,
					'appointment_mobile'=>$p['appointment']->appointment_mobile,
					'fee'=>$p['appointment']->amount,
					'appointment_id'=>$p['appointment']->appointment_id,
					'payment_status'=>$p['appointment']->payment_status,
					'status'=>$stat,
					'status_code'=>$p['appointment']->status);
		}		
		$response=array('status'=>'success','msg'=>'Successfully','data'=>$data);
		echo json_encode($response);							
	}
	
	
	public function checkdoctor(){
		$key = strtolower($this->input->post('searchkey'));
		$this -> db -> select(' * ');
        //$this -> db -> from('hospitallogin');
        $this -> db -> where('email', $key);        
		$this -> db -> or_where('mobile', $key);
		
		$d=$this->db->get_where('profile_dr',array())->row();
		//last_query();
		 if($d){
			$drarray=array();
			$drarray['drid']=$d->id;
			$drarray['gender']=$d->gender;
			$drarray['city']=$d->city;
			$drarray['regd_no']=$d->regd_no;
			$drarray['regd_council']=$d->regd_council;
			$drarray['regd_year']=$d->regd_year;
			$drarray['college']=$d->college;
			$drarray['year']=$d->year;
			$drarray['exp']=$d->exp;
			$drarray['email']=$d->email;
			$drarray['mobile']=$d->mobile;
			$drarray['name']=$d->fname.' '.$d->lname;
			$drarray['image']=admin_url().'public/assets/upload/'.$d->drimage;
			
			
			$quastring=array();
			$qu=$this->db->get_where('dr_qualifications',array('user_id'=>$d->id));
			foreach(@$qu->result() as $q)
				$quastring[]=($q->qualification_id);
			
			$splstring=array(); 
			$sp=$this->db->get_where('dr_specialization',array('user_id'=>$d->id))->result();
			foreach($sp as $s)
				$splstring[]=($s->specialization_id);
			
			$drarray['specialization']=$splstring;			
			$drarray['qualification']=$quastring;			
			$drarray['experience']=$d->exp;
			
			
			$response=array('status'=>'success','msg'=>'Doctor Detail Successfully Listed','data'=>$drarray);
		 
			echo json_encode($response); 
		
		}else{	
			$response=array('status'=>'failed','msg'=>'');
			echo json_encode($response); 
		}
		
	}
	
	
		
	public function upchardoctor(){ //alldoctor
		/* $keyword = $this->input->post('keyword');
		$spl = $this->input->post('spl');
		$city = $this->input->post('city');
		 */
		/* if($spl!=''){
			$this->db->where("specialization_id",$spl);
			$this->db->join("dr_specialization",'dr_specialization.user_id=profile_dr.id');
			$this->db->select("profile_dr.*, dr_specialization.specialization_id");
		}
		if($city!='')
			$this->db->where("city",$city);
		
		if($keyword!='')
		$this->db->like("concat(fname,' ',lname)",$keyword);
		 */
		$doctors=$this->db->get_where('profile_dr',array('approved'=>'1','verified'=>'1'))->result();
		$doctors=$this->db->select('profile_dr.*,dr_practice.status as p_status')->join('dr_practice','profile_dr.id=dr_practice.user_id AND institution_id=\''.$this->did.'\' AND type=\'H\' ','left')->get_where('profile_dr',array('approved'=>'1','verified'=>'1'))->result();
		$data=array();
		 foreach($doctors as $d){ 
			$drarray=array();
			$drarray['drid']=$d->id;
			$drarray['name']=$d->fname.' '.$d->lname;
			$drarray['image']=admin_url().'public/assets/upload/'.$d->drimage;
			
			if($d->p_status==null){$stat= 'Link To Hospital';}else if($d->p_status==1){$stat= 'UnLink Doctor';}else{$stat= 'Link Request Pending';}
			$drarray['button_text']=$stat;
			$drarray['status_code']=$d->p_status;
			
			$quastring=array();
			$qu=$this->db->get_where('dr_qualifications',array('user_id'=>$d->id));
			foreach(@$qu->result() as $q)
				$quastring[]=getQualificationName($q->qualification_id);
			
			$splstring=array(); 
			$sp=$this->db->get_where('dr_specialization',array('user_id'=>$d->id))->result();
			foreach($sp as $s)
				$splstring[]=getSpecilizationName($s->specialization_id);
			
			$drarray['city']=getCityName($p->city);			
			$drarray['specialization']=$splstring;			
			$drarray['qualification']=$quastring;			
			$drarray['experience']=$d->exp;
			
			/* 
			$practdata=$this->db->get_where('dr_practice',array('user_id'=>$d->id,'status'=>'1'));
			$practcount=$practdata->num_rows(); 
			$pract=$practdata->row(); 
			if($pract->type=='C')
				$institution_table='clinic';
			else if($pract->type=='H')
				$institution_table='hospital';
							
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
				
			$drarray['practice_services']=$servicesstring; */
			
			$data['doctors'][]=$drarray;
		 }
		 
		 $response=array('status'=>'success','msg'=>'Listed Doctor Successfully','data'=>$data);
		 
		$this->json_output($response); 
	}
	
	public function linkeddoctor(){ // only approvedlinked todoctor
		/* $keyword = $this->input->post('keyword');
		$spl = $this->input->post('spl');
		$city = $this->input->post('city');
		 */
		/* if($spl!=''){
			$this->db->where("specialization_id",$spl);
			$this->db->join("dr_specialization",'dr_specialization.user_id=profile_dr.id');
			$this->db->select("profile_dr.*, dr_specialization.specialization_id");
		}
		if($city!='')
			$this->db->where("city",$city);
		
		if($keyword!='')
		$this->db->like("concat(fname,' ',lname)",$keyword);
		 */
		//$doctors=$this->db->get_where('profile_dr',array('approved'=>'1','verified'=>'1'))->result();
		$doctors=$this->db->select('profile_dr.*,dr_practice.status as p_status,dr_practice.id as practice_id')->join('dr_practice','profile_dr.id=dr_practice.user_id AND institution_id=\''.$this->did.'\' AND type=\'H\' AND dr_practice.status=\'1\' ')->get_where('profile_dr',array('approved'=>'1','verified'=>'1'))->result();
		$data=array();
		 foreach($doctors as $d){ 
			$drarray=array();
			$drarray['drid']=$d->id;
			$drarray['name']=$d->fname.' '.$d->lname;
			$drarray['image']=admin_url().'public/assets/upload/'.$d->drimage;
			
			if($d->p_status==null){$stat= 'Link To Hospital';}else if($d->p_status==1){$stat= 'UnLink Doctor';}else{$stat= 'Link Request Pending';}
			$drarray['button_text']=$stat;
			$drarray['status_code']=$d->p_status;
			
			$timingarray=array();
			$timings=$this->db->select('id,S,M,T,W,TH,F,SA')->get_where('timing', array('status'=>'1','user_type'=>'D','user_id'=>$d->id,'practice_id'=>$d->practice_id))->result();
			foreach($timings as $timing){
				$sessionarray=array();
				$sessions=$this->db->select('from_timing,to_timing')->get_where('timing_session', array('status'=>'1','timing_id'=>$timing->id))->result();
				foreach($sessions as $session){
					$sessionarray[]=$session;
				}
				$timingarray[]=array('days'=>$timing,'sessions'=>$sessionarray);
			}
			
			$quastring=array();
			$qu=$this->db->get_where('dr_qualifications',array('user_id'=>$d->id));
			foreach(@$qu->result() as $q)
				$quastring[]=getQualificationName($q->qualification_id);
			
			$splstring=array(); 
			$sp=$this->db->get_where('dr_specialization',array('user_id'=>$d->id))->result();
			foreach($sp as $s)
				$splstring[]=getSpecilizationName($s->specialization_id);
				
			$drarray['city']=getCityName($p->city);
			$drarray['specialization']=$splstring;			
			$drarray['qualification']=$quastring;			
			$drarray['experience']=$d->exp;
			$drarray['timing']=$timingarray;
			
			/* 
			$practdata=$this->db->get_where('dr_practice',array('user_id'=>$d->id,'status'=>'1'));
			$practcount=$practdata->num_rows(); 
			$pract=$practdata->row(); 
			if($pract->type=='C')
				$institution_table='clinic';
			else if($pract->type=='H')
				$institution_table='hospital';
							
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
				
			$drarray['practice_services']=$servicesstring; */
			
			$data['doctors'][]=$drarray;
		 }
		 
		 $response=array('status'=>'success','msg'=>'Listed Doctor Successfully','data'=>$data);
		 
		$this->json_output($response); 
	}
	
	public function doctordetail(){
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
	
	
	public function update_dr_time_fee(){
		$drid=($this->input->post('drid'));//check if loged in 
		$fee = $this->input->post('fee');
		
		$mon = $this->input->post('mon');
		$tue = $this->input->post('tue');
		$wed = $this->input->post('wed');
		$thu = $this->input->post('thu');
		$fri = $this->input->post('fri');
		$sat = $this->input->post('sat');
		$sun = $this->input->post('sun');
		
		$max_patient = $this->input->post('max_patient');
		$from = $this->input->post('fromtime');
		$to = $this->input->post('totime');
		$hiddenday = $this->input->post('no_of_day');
		
		$pid=$this->db->where(array('type'=>'H','user_id'=>$drid,'institution_id'=>$this->did))->get('dr_practice')->row()->id;;
		
		$this->db->where(array('type'=>'H','user_id'=>$drid,'institution_id'=>$this->did))->set('fee',$fee)->update('dr_practice');
		if($pid)
		$this->db->query("DELETE `timing`,`timing_session` FROM `timing` INNER JOIN `timing_session`  ON timing_session.timing_id=timing.id WHERE user_id='".$drid."' AND user_type='D' AND practice_id='".$pid."';");
		for($key2=0;$key2<$hiddenday;$key2++){
			$mon[$key2]=(@$mon[$key2])? 1 : 0;
			$tue[$key2]=(@$tue[$key2])? 1 : 0;
			$wed[$key2]=(@$wed[$key2])? 1 : 0;
			$thu[$key2]=(@$thu[$key2])? 1 : 0;
			$fri[$key2]=(@$fri[$key2])? 1 : 0;
			$sat[$key2]=(@$sat[$key2])? 1 : 0;
			$sun[$key2]=(@$sun[$key2])? 1 : 0;
			
			if(!$mon[$key2] && !$tue[$key2] && !$wed[$key2] && !$thu[$key2] && !$fri[$key2] && !$sat[$key2] && !$sun[$key2] )
				continue;
			
			$timingdata=array('practice_id'=>$pid,'user_id'=>$drid,'M'=>$mon[$key2],'T'=>$tue[$key2],	'W'=>$wed[$key2],'TH'=>$thu[$key2],	'F'=>$fri[$key2],	'SA'=>$sat[$key2],	'S'=>$sun[$key2],	'status'=>'1');
			$this->db->insert('timing',$timingdata);
			
			$sessions=$from[$key2];
			$tid= $this->db->insert_id();
			foreach($sessions as $key3=>$value){
				if($from[$key2][$key3]=='' || $from[$key2][$key3]=='')
					continue;
				$sessiondata = array('timing_id'=>$tid,'from_timing'=>$from[$key2][$key3],'to_timing'=>$to[$key2][$key3],'max_patient'=>$max_patient[$key2][$key3],'status'=>'1');
				$this->db->insert('timing_session',$sessiondata);
						
			}
				
		}
		
		$response=array('status'=>'success','msg'=>'Successfully');
		$this->json_output($response);
	}
	
	public function update_time(){
		
		$mon = $this->input->post('mon');
		$tue = $this->input->post('tue');
		$wed = $this->input->post('wed');
		$thu = $this->input->post('thu');
		$fri = $this->input->post('fri');
		$sat = $this->input->post('sat');
		$sun = $this->input->post('sun');
			
		$from = $this->input->post('fromtime');
		$to = $this->input->post('totime');
		$hiddenday = $this->input->post('no_of_day');
		
		$this->db->query("DELETE `timing`,`timing_session` FROM `timing` INNER JOIN `timing_session`  ON timing_session.timing_id=timing.id WHERE user_type='H' AND `user_id`='".$this->did."';");
		//last_query();die;
		for($key2=0;$key2<$hiddenday;$key2++){
			$mon[$key2]=(@$mon[$key2])? 1 : 0;
			$tue[$key2]=(@$tue[$key2])? 1 : 0;
			$wed[$key2]=(@$wed[$key2])? 1 : 0;
			$thu[$key2]=(@$thu[$key2])? 1 : 0;
			$fri[$key2]=(@$fri[$key2])? 1 : 0;
			$sat[$key2]=(@$sat[$key2])? 1 : 0;
			$sun[$key2]=(@$sun[$key2])? 1 : 0;
			
			if(!$mon[$key2] && !$tue[$key2] && !$wed[$key2] && !$thu[$key2] && !$fri[$key2] && !$sat[$key2] && !$sun[$key2] )
				continue;
			
			$timingdata=array('user_id'=>$this->did,'user_type'=>'H','M'=>$mon[$key2],'T'=>$tue[$key2],	'W'=>$wed[$key2],'TH'=>$thu[$key2],	'F'=>$fri[$key2],	'SA'=>$sat[$key2],	'S'=>$sun[$key2],	'status'=>'1');
			$this->db->insert('timing',$timingdata);
			
			$sessions=$from[$key2];
			$tid= $this->db->insert_id();
			foreach($sessions as $key3=>$value){
				if($from[$key2][$key3]=='' || $from[$key2][$key3]=='')
					continue;
				$sessiondata = array('timing_id'=>$tid,'from_timing'=>$from[$key2][$key3],'to_timing'=>$to[$key2][$key3],'status'=>'1');
				$this->db->insert('timing_session',$sessiondata);
						
			}
				
		}
		
		$response=array('status'=>'success','msg'=>'Successfully');
		$this->json_output($response);
	}
	
	public function linkdoctor()
	{
		$already=$this->input->post('link');
		$drid=$this->input->post('link2');
	   
	   if($already==1 && $drid!=''){
		   
		   $result=$this->db->where(array('type'=>'H','institution_id'=>$this->did,'user_id'=>$drid))->get('dr_practice');
			$count=$result->num_rows();
			if($count){
				$practiceid=$result->row()->id;
				$response=array('status'=>'failed','msg'=>'Already linked to the hospital!');

				
			}else{
				$udata=array('institution_id'=>$this->did,'user_id'=>$drid,'type'=>'H','status'=>'0');
				$this->db->insert('dr_practice',$udata);
				$practiceid=$this->db->insert_id();
				//email to dr to approve link 
				$data=$this->db->get_where('profile_dr',array('id'=>$drid))->row();
				$this->load->library('azad_lib');
		 	$body="Request from  abcd hospital for profile approval   ".base_url().'home/securepapproval/'.mybase64_encode($practiceid).'/'.mybase64_encode($drid).'';
			$this->azad_lib->sendMail($data->email,'Request from  abcd hospital for profile approval',$body);
				$response=array('status'=>'success','msg'=>'Successfully Linked to the hospital!');	
			}
	   }else{
		   
		   $email=strtolower(trim($this->input->post('email')));
		
		$mobile=trim($this->input->post('mobile'));
		$countemail=$this->db->where('EMAIL',$email)->count_all_results('hospitallogin');
		$countmobile=$this->db->where('MOBILE',$mobile)->count_all_results('hospitallogin');
		if($countemail > 0  && $email!='')
		{
			$response=array('status'=>'failed','msg'=>'EmailId Already Registered ! ');
		}
		else if($countmobile > 0 && $mobile!='')
		{
			$response=array('status'=>'failed','msg'=>'Mobile No. Already Registered ! ');
		}
		else if($mobile!='' || $email!='')
		{
			$fullname=$this->input->post('name');
			$name=explode(' ',ucwords($fullname));
			$fname=$name[0];
			$lname=@$name[1];
			$otp=rand(100000,999999);
			$pass=md5($otp);
			
			$udata=array(
					'PASSWORD'=>$pass,
					'FNAME'=>$fname,
					'LNAME'=>$lname,
					
					'STATUS'=>'0',
					'APPROVED'=>'1',
					'OTP'=>$otp,
					'REG_DATE'=>date('Y-m-d'),
					'GENDER'=>'M'
					); 
			if($email)
			$udata['EMAIL']=$email;
			if($mobile)
			$udata['MOBILE']=$mobile;
			if($this->db->insert('doctorlogin',$udata))
			{   
				$thisid = $this->db->insert_id();
				
		   
		   $udata=array('email'=>$this->input->post('email'),'mobile'=>$this->input->post('mobile'),'fname'=>$this->input->post('name'),'gender'=>$this->input->post('gender'),'city'=>$this->input->post('city'),'regd_no'=>$this->input->post('regno'),'regd_council'=>$this->input->post('council'),'regd_year'=>$this->input->post('ryear'),'college'=>$this->input->post('college'),'exp'=>$this->input->post('exp'),'year'=>$this->input->post('year'),'user_id'=>$thisid);
			$this->db->insert('profile_dr',$udata);
			
			$drid=$this->db->insert_id();
			$specialisation = $this->input->post('specialisation');
			foreach($specialisation as $s){
				$spldata[]=array('user_id'=>$drid,'specialization_id'=>$s);
			}
			$qualification =$this->input->post('qualification');
			foreach($qualification as $q){
				$qualdata[]=array('user_id'=>$drid,'qualification_id'=>$q);
			}
			$this->db->insert_batch('dr_qualifications',$qualdata);
			$this->db->insert_batch('dr_specialization',$spldata);
			
			$udata=array('institution_id'=>$this->did,'user_id'=>$drid,'type'=>'H','status'=>'0');
			$this->db->insert('dr_practice',$udata);
			$practiceid=$this->db->insert_id();
			//email to dr to claim approve link with login
			$this->load->library('azad_lib');
			$body="Request from  abcd hospital for profile approval <BR>   Login: $mobile / $otp  ".base_url().'home/securepapproval/'.mybase64_encode($practiceid).'/'.mybase64_encode($drid).'';
			$this->azad_lib->sendMail($email,'Request from  abcd hospital for profile approval',$body);
			/* $msg="Dear ".$name[0].", Wecome to Upcharr medical solutions. Your otp is $otp
thank you for being a part of Upchar.";
			sendsms($msg,$mobile); */
			$response=array('status'=>'success','msg'=>'Successfully Added & Linked to the hospital!');	
			}else{
				$response=array('status'=>'failed','msg'=>'Failed to add doctor!');	
			}
		}else{
			$response=array('status'=>'failed','msg'=>'Invalid Data!');	
		}
	   }
		 
			echo json_encode($response); 
	}
	
	public function unlinkdoctor()
	{
		$already=$this->input->post('link');
	   $drid=$this->input->post('link2');
	   
	   if($already==1 && $drid!=''){
		   
		   $result=$this->db->where(array('type'=>'H','institution_id'=>$this->did,'user_id'=>$drid))->delete('dr_practice');
			if($result){
				
				$response=array('status'=>'Alert','msg'=>'Doctor Profile UnLinked from the Hospital!');
				
			}else{
				 $response=array('status'=>'Opps','msg'=>'Something went wrong');
			}
	   }else{
		   $response=array('status'=>'Opps','msg'=>'Something went wrong');
	   }
	   echo json_encode($response); 
	      
	}
	
	
	public function profile_upload(){
		if($this->input->post('name'))
			$udata['name']=$this->input->post('name');
		if($this->input->post('locality'))
			$udata['location']=$this->input->post('locality');
		if($this->input->post('city'))
			$udata['city']=$this->input->post('city');
		if($this->input->post('email'))
			$udata['email']=$this->input->post('email');
		if($this->input->post('city'))
			$udata['mobile']=$this->input->post('mobile');
		if($this->input->post('mobile'))
			$udata['address']=$this->input->post('address');
		
		if($this->input->post('about'))
			$udata['about']=$this->input->post('about');
		if($this->input->post('short_about'))
			$udata['short_about']=$this->input->post('short_about');
	/* 	if($this->input->post('regd_no'))
			$udata['regd_no']=$this->input->post('regd_no');
		if($this->input->post('regd_council'))
			$udata['regd_council']=$this->input->post('regd_council');
		if($this->input->post('regd_year'))
			$udata['regd_year']=$this->input->post('regd_year');
		if($this->input->post('exp'))
			$udata['exp']=$this->input->post('exp');
		if($this->input->post('year'))
			$udata['year']=$this->input->post('year');
		if($this->input->post('college'))
			$udata['college']=$this->input->post('college'); */
		
		$uploadimage=$_FILES['profileimg']['name'];
		$uploadregproof=$_FILES['regproofimg']['name'];
		$uploadidproof=$_FILES['idproofimg']['name'];
		$uploadmicproof=$_FILES['mic']['name'];
		
		$rname=rand(1111111,999999999);
		$date=date('Ymd');
		$config['upload_path']= $_SERVER['DOCUMENT_ROOT'].'/admin1947/public/assets/upload/';
		$config['allowed_types'] = 'jpg|png|jpeg|JPG|PNG|JPEG';
		$config['max_size']= 0;
		$config['quality'] = '50%';
		if($uploadimage != '') 
		{	
			$extsign = pathinfo($_FILES['profileimg']['name'],PATHINFO_EXTENSION);
			$uploadimage='disp_profile_pic_'.$rname.$date.'.'.$extsign;
			
			$config['file_name']  = $uploadimage;
			$this->load->library('upload', $config);
					
			if ( ! $this->upload->do_upload('profileimg'))
			{
				$error = $this->upload->display_errors();
				$response=array('status'=>'failed','msg'=>$error);
				echo json_encode($response);
				exit();
			}else{
				$udata['drimage']=$uploadimage;
			}
		}
		if($uploadregproof != '') 
		{	
			$extsign = pathinfo($_FILES['regproofimg']['name'],PATHINFO_EXTENSION);
			$uploadregproof='hospital_proof_pic_'.$rname.$date.'.'.$extsign;
			
			$config['file_name']  = $uploadregproof;
			$this->load->library('upload', $config);
					
			if ( ! $this->upload->do_upload('regproofimg'))
			{
				$error = $this->upload->display_errors();
				$response=array('status'=>'failed','msg'=>$error);
				echo json_encode($response);
				exit();
			}else{
				$udata['med_reg_proof']=$uploadregproof;
			}
		}
		if($uploadidproof != '') 
		{	
			$extsign = pathinfo($_FILES['idproofimg']['name'],PATHINFO_EXTENSION);
			$uploadidproof='dr_id_proof_'.$rname.$date.'.'.$extsign;
			
			$config['file_name']  = $uploadidproof;
			$this->load->library('upload', $config);
					
			if ( ! $this->upload->do_upload('idproofimg'))
			{
				$error = $this->upload->display_errors();
				$response=array('status'=>'failed','msg'=>$error);
				echo json_encode($response);
				exit();
			}else{
				$udata['id_proof']=$uploadidproof;
			}
		}
		if($uploadmicproof != '') 
		{	
			$extsign = pathinfo($_FILES['mic']['name'],PATHINFO_EXTENSION);
			$uploadmicproof='dr_mic_proof_'.$rname.$date.'.'.$extsign;
			
			$config['file_name']  = $uploadmicproof;
			$this->load->library('upload', $config);
					
			if ( ! $this->upload->do_upload('mic'))
			{
				$error = $this->upload->display_errors();
				$response=array('status'=>'failed','msg'=>$error);
				echo json_encode($response);
				exit();
			}else{
				$udata['mic_proof']=$uploadmicproof;
			}
		}
		
		$this->db->where('id',$this->did)->update('hospital',$udata);
		
		
		$response=array('status'=>'success','msg'=>'Successfully');
		echo json_encode($response);
		
		
	}
	
	public function profile_fetch(){
		
		$profile=$this->db->select('hospital.*,master_city.name as cityname,master_locality.name as locality_name ')->where('hospital.id',$this->did)->join('master_city','city=master_city.id')->join('master_locality','location=master_locality.id')->get_where('hospital',array())->result_array();
		
		$timingarray=array();
			$timings=$this->db->select('id,S,M,T,W,TH,F,SA')->get_where('timing', array('status'=>'1','user_type'=>'H','user_id'=>$this->did))->result();
			foreach($timings as $timing){
				$sessionarray=array();
				$sessions=$this->db->select('from_timing,to_timing')->get_where('timing_session', array('status'=>'1','timing_id'=>$timing->id))->result();
				foreach($sessions as $session){
					$sessionarray[]=$session;
				}
				$timingarray[]=array('days'=>$timing,'sessions'=>$sessionarray);
			}
		/* $data_spl=$this->db->select('specialization_id,name')->join('master_specialization','specialization_id=master_specialization.id')->get_where('dr_specialization',array('user_id'=>$this->did))->result_array();
		$data_qua=$this->db->select('qualification_id,name')->join('master_degree','qualification_id=master_degree.id')->get_where('dr_qualifications',array('user_id'=>$this->did))->result_array();
		 */
		
		$response=array('status'=>'success','msg'=>'Successfully','profile'=>$profile,'timing'=>$timingarray,'url'=>admin_url().'public/assets/upload/');
		echo json_encode($response);
		
		
	}
	
	
	
	
	
	
	
	public function adddoctor()
	{
		if(isset($_POST['submit']))
			$this->Hospital_Model->profile_step1();
		
		$data['data']=$this->db->get_where('profile_dr',array('user_id'=>$this->did))->row();			
		/* $data_spl=$this->db->select('specialization_id')->get_where('dr_specialization',array('user_id'=>$this->did))->result_array();
		$data['data_spl']= array_map (function($value){
					return $value['specialization_id'];
				} , $data_spl);	 */	
		$this->load->view('hospitalpanel/adddoctor',$data);
	}
	public function  updatedoctor()
	{
		$did=mybase64_decode($this->uri->segment(3));
		 if(isset($_POST['submit']))
			$this->Hospital_Model->profile_consultant_fee();
		
		$data['practice']=$this->db->get_where('dr_practice',array('type'=>'H','user_id'=>$did,'institution_id'=>$this->did))->row();
		
		$timings=$this->db->get_where('timing',array('user_id'=>$did,'user_type'=>'D','practice_id'=>$data['practice']->id));
		$data['timing_count']=$timings->num_rows();
		$data['timings']=$timings->result();
		
		$this->load->view('hospitalpanel/profile_consultant_fee',$data);
	}
	
	
    

/*
	public function managepractice()
	{
		//if(isset($_POST['submit']))
		//	$this->Doctor_Model->profile_step2();
		$clinic=$this->db->select('clinic.*,dr_practice.id as practice_id,fee as practicefee')->join('clinic','clinic.id=dr_practice.institution_id')->get_where('dr_practice',array('user_id'=>$this->did,'type'=>'C'))->result();	//last_query();
		$hospital=$this->db->select('hospital.*,dr_practice.id as practice_id,fee as practicefee')->join('hospital','hospital.id=dr_practice.institution_id')->get_where('dr_practice',array('user_id'=>$this->did,'type'=>'H'))->result();//	last_query();
		$data=array();
		
		foreach($clinic as $p){
			$data[]=array('id'=>$p->practice_id,'name'=>$p->name,'address'=>$p->address);
		}
		foreach($hospital as $p){ 
			$data[]=array('id'=>$p->practice_id,'name'=>$p->name,'address'=>$p->address);
		} 
		$response=array('status'=>'success','msg'=>'Successfully','data'=>$data);
		echo json_encode($response);
	}
	
	
	
	public function manageownclinic()
	{
		//if(isset($_POST['submit']))
		//	$this->Doctor_Model->profile_step2();
		$clinic=$this->db->select('clinic.*,clinic_claimed.status as claim_status')->join('clinic','clinic.id=clinic_claimed.clinic_id')->get_where('clinic_claimed',array('did'=>$this->did))->result();	
		$data=array();
		 foreach($clinic as $p){ 
			if($p->claim_status=='P'){$stat= 'Pending';}else{$stat= 'Approved';}
			$data[]=array('id'=>$p->practice_id,'name'=>$p->name,'address'=>$p->address,'status'=>$stat);
			
		 } 
		 $response=array('status'=>'success','msg'=>'Successfully','data'=>$data);
		echo json_encode($response);
	}
	
	
	
	public function manageappointment()
	{
		
		
		$userid =$this->did;
        $this -> db -> select('appointment_id,appointment_date,appointment_mobile,from_timing,to_timing,appointment_name as patient_name, fee,amount,doctor_id,institute_id,institution_type,status');   
        $this -> db -> order_by('appointment_id');   
        $this -> db -> where('doctor_id', $userid);   
        if(isset($_POST['date']) && $_POST['date']!='')
        $this -> db -> where('appointment_date', $_POST['date']);   
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
				
				$dataarray[]=array('appointment'=>$row,'institute'=>$institute);
			}
			
		}else{
			$dataarray=array();
		}
		
		
		//$data['appointments']=$dataarray;
		
		foreach($dataarray as $p){ 
			if($p['appointment']->status=='1'){$stat='Booked';}else if($p['appointment']->status=='2'){$stat='Booked';} 
			$data[]=array('date'=>$p['appointment']->appointment_date,'fromtime'=>$p['appointment']->from_timing,'totiming'=>$p['appointment']->to_timing,'hospital'=>$$p['institute']->name,'patient_name'=>$p['appointment']->patient_name,'amount'=>$p['appointment']->amount,'appointment_id'=>$p['appointment']->appointment_id,'appointment_mobile'=>$p['appointment']->appointment_mobile,'status'=>$stat);
		
		}
		 $response=array('status'=>'success','msg'=>'Successfully','data'=>$data);
		echo json_encode($response);
		
	}
	 */
	
	
	
	
	
	
	
	
	
	
	
	//--------------------------------------
	
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
	
	public function getlocality()
	{
		$cid    =$_GET['cid']; 
		$sql="SELECT id,name FROM master_locality WHERE status='1' AND city_id=$cid";
		$result =$this->db->query($sql)->result();
		$json=array();
		foreach($result as $row) 
		{
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
						
		$response=array('status'=>'success','msg'=>'Listed Successfully','data'=>$dataarray);
		 
		$this->json_output($response);
	}
	
	public function appointment_date(){
		$id=$_GET['doctor'];
		$this->db->join('dr_practice','dr_practice.user_id=timing.user_id AND dr_practice.status=\'1\'');
		$data=$this->db->get_where('timing',array('user_id'=>$id,'user_type'=>'D'))->result();
		
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
		$this->db->join('dr_practice','dr_practice.user_id=timing.user_id AND dr_practice.status=\'1\'');
		$day=array('1'=>'M','2'=>'T','3'=>'W','4'=>'TH','5'=>'F','6'=>'SA','7'=>'S');
		$data=$this->db->get_where('timing',array('user_id'=>$id,'user_type'=>'D',$day[$day_no]=>'1'))->result();
		
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
		$email=$this->input->post('app_email');
		$userid=$this->input->post('userid');
		//$otp=$this->input->post('app_otp');
		
		$data=$this->db->get_where('timing_session',array('id'=>$time))->row();
		$timing_id=$data->timing_id;
		$data=$this->db->get_where('timing',array('id'=>$timing_id))->row();
		$pid=$data->practice_id;
		$data=$this->db->get_where('dr_practice',array('id'=>$pid))->row();
		$did=$data->user_id;
		$type=$data->type;
		/* if($type=='H')
			$type='hospital';
		else
			$type='clinic'; */
		$institution_id=$data->institution_id;
		$fee=$data->fee;
		
		
		$idata=array('appointment_date'=>$date,'time_id'=>$time,'date_id'=>$timing_id,'practice_id'=>$pid,'appointment_name'=>$name,'appointment_mobile'=>$mobile,'appointment_email'=>$email,'doctor_id'=>$doctor,'institute_id'=>$institution_id,'institution_type'=>$type,'fee'=>$fee,'amount'=>$fee,'user_id'=>$userid);
		$this->db->insert('appointment',$idata);
		$aid=$this->db->insert_id();
		$msg="Your Appoint booked successfully! Appointment ID# $aid
	WWW.UPCHAR.COM";
			sendsms($msg,$mobile);
		$response=array('status'=>'success','msg'=>'Book Successfully','appointmentid'=>$aid);
		 
		$this->json_output($response); 
	}

	
	public function sociallogin(){
		$email =$this->input->post('email');
		$first_name =$this->input->post('first_name');
		$last_name =$this->input->post('last_name');
		$sex =$this->input->post('sex');
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
	
	
	/* public function index()
	{
		$this->load->view('login',@$data);
	} */

	
/* 	public function login()
	{
		$email = strtolower($this->input->post('email'));
		$password = md5($this->input->post('password'));
        $login = $this->User_Model->login($email,$password);
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

 */
}